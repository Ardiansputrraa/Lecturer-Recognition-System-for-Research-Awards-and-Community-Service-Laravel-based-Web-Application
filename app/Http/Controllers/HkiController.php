<?php

namespace App\Http\Controllers;

use App\Models\Hki;
use App\Models\User;
use App\Models\Dosen;
use App\Models\FileHki;
use App\Models\Notifikasi;
use App\Models\KomentarHki;
use Illuminate\Http\Request;
use App\Models\KolaboratorHki;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class HkiController extends Controller
{
    public function viewPageHki()
    {
        if (Auth::user()->role === 'admin') {
            $hki = Hki::all();
        } else {
            $hki = Hki::where('dosen_id', Auth::user()->dosen->id)->get();
        }

        return view('dashboard.hki-dosen.hki', compact('hki'));
    }

    public function detailDataHki($id)
    {
        $hki = Hki::where('id', $id)->first();
        $fileHki = FileHki::where('hki_id', $hki->id)->get();
        $komentarHki = KomentarHki::where('hki_id', $hki->id)->get();
        $dosen = Dosen::all();
        $kolaborator = KolaboratorHki::where('hki_id', $hki->id)->get();

        return view('dashboard.hki-dosen.detail-hki', [
            'hki' => $hki,
            'fileHki' => $fileHki,
            'komentarHki' => $komentarHki,
            'dosen' => $dosen,
            'kolaborator' => $kolaborator,
        ]);
    }

    public function updateDataHki(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'jenis' => 'required|string',
            'tahun' => 'required|integer',
            'status' => 'nullable|string',
        ]);

        $hki = Hki::find($request->id);
        if (!$hki) {
            return response()->json(['error' => 'Data hki tidak ditemukan'], 404);
        }

        $hki->judul = $request->judul;
        $hki->jenis = $request->jenis;
        $hki->tahun = $request->tahun;
        if ($request->status) {
            $hki->status = $request->status;
        }
        $hki->update();

        $user = $hki->dosen->user;

        $auth = Auth::user();

        if ($auth->role === 'admin') {
            $userSend = $auth->admin;
        } else {
            $userSend = $auth->dosen;
        }

        $id = $request->id;
        if ($request->status === 'Diajukan') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => 2,
                'komentar' => "Data hki dengan judul \"" . $request->judul . "\" telah diajukan untuk diperiksa.",
                'created_at' => now(),
                'url' => 'detail-hki/' . $id,
            ]);
        } elseif ($request->status === 'Ditolak') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => $user->id,
                'komentar' => "Data hki anda dengan judul \"" . $request->judul . "\" telah ditolak silahkan cek kembali.",
                'created_at' => now(),
                'url' => 'detail-hki/' . $id,
            ]);
        } elseif ($request->status === 'Disetujui') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => $user->id,
                'komentar' => "Data hki anda dengan judul \"" . $request->judul . "\" telah disetujui cek detail hki.",
                'created_at' => now(),
                'url' => 'detail-hki/' . $id,
            ]);
        }
        return response()->json(['message' => 'Data Hki berhasil diperbarui!'], 200);
    }

    public function addDataHki(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'jenis' => 'required|string',
            'tahun' => 'required|integer',
            'status' => 'nullable|string',
        ]);

        $user = Auth::user();
        if ($user->role !== 'dosen') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
        $dosen = Auth::user()->dosen;

        if (!$dosen) {
            return response()->json(['error' => 'Dosen tidak ditemukan'], 404);
        }

        $hki = new Hki();
        $hki->dosen_id = $dosen->id;
        $hki->nama_dosen = $dosen->nama_lengkap;
        $hki->hak_cipta = $dosen->nama_lengkap;
        $hki->judul = $request->judul;
        $hki->tahun = $request->tahun;
        $hki->jenis = $request->jenis;
        $hki->status = 'Draft';
        $hki->save();

        return response()->json(['message' => 'Data Hki berhasil ditambahkan!'], 200);
    }

    public function searchDataHki(Request $request)
    {
        $request->validate(rules: [
            'keyword' => 'required|string',
        ]);

        $keyword = $request->get('keyword');

        $user = Auth::user();
        if ($user->role !== 'dosen') {
            $results = Hki::where('nama_dosen', 'LIKE', '%' . $keyword . '%')
                ->orWhere('hak_cipta', 'LIKE', '%' . $keyword . '%')
                ->orWhere('judul', 'LIKE', '%' . $keyword . '%')
                ->orWhere('jenis', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tahun', 'LIKE', '%' . $keyword . '%')
                ->orWhere('status', 'LIKE', '%' . $keyword . '%')
                ->get();
        } else {
            $results = Hki::where(function ($query) use ($keyword) {
                $query->where('hak_cipta', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('judul', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('jenis', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('tahun', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('status', 'LIKE', '%' . $keyword . '%');
            })
                ->where('dosen_id', $user->dosen->id)
                ->get();
        }

        return response()->json($results);
    }

    public function downloadDataHki()
    {
        $data = Hki::all();

        $fileName = 'data_hki.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = ['Nama Lengkap', 'Nama Hak Cipta', 'Judul', 'Jenis Hki', 'Tahun', 'Status'];

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->nama_dosen,
                    $row->hak_cipta,
                    $row->judul,
                    $row->jenis,
                    $row->tahun,
                    $row->status,
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function deleteDataHki($id)
    {
        DB::beginTransaction();
        try {
            FileHki::where('hki_id', $id)->delete();
            KolaboratorHki::where('hki_id', $id)->delete();
            KomentarHki::where('hki_id', $id)->delete();
            Hki::where('id', $id)->delete();

            DB::commit();
            return response()->json(['message' => 'Data hki berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function uploadFileHki(Request $request)
    {
        $request->validate([
            'namaFile' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,docx,ppt,xlsx,xls,jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('file');
        $fileSize = $file->getSize();
        $fileName = $request->namaFile . '-' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = 'storage/file/file-hki/' . $fileName;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        $file->move(public_path('storage/file/file-hki'), $fileName);
        $tipe = 'none';
        if ($file->getClientMimeType() == 'application/pdf') {
            $tipe = 'pdf';
        } else if ($file->getClientMimeType() == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
            $tipe = 'docx';
        } else if ($file->getClientMimeType() == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            $tipe = 'xlsx';
        } else if (
            $file->getClientMimeType() == 'image/jpeg' ||
            $file->getClientMimeType() == 'image/png' ||
            $file->getClientMimeType() == 'image/jpg'
        ) {
            $tipe = 'gambar';
        }

        $fileHki = FileHki::create([
            'hki_id' => $request->hki_id,
            'file_path' => $filePath,
            'nama_file' => $fileName,
            'tipe' =>  $tipe,
            'size' => $fileSize,
            'uploaded_at' => now(),
        ]);

        return response()->json(['success' => 'File hki berhasil diunggah.'], 200);
    }
    function deleteFileHki($id)
    {
        $file_hki = FileHki::find($id);
        $filePath = public_path($file_hki->file_path);
        if ($file_hki) {
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $file_hki->delete();
        }
        return response()->json(['success' => 'File hki berhasil dihapus.'], 200);
    }

    public function downloadFileHki($id)
    {
        $file_hki = FileHki::findOrFail($id);

        $filePath = public_path($file_hki->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath, basename($filePath));
        } else {
            return response()->json(['error' => 'File tidak ditemukan.'], 404);
        }
    }

    public function addKomentarHki(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
            'hki_id' => 'required|string',
        ]);

        $admin = Auth::user()->admin;

        if (!$admin) {
            return response()->json(['error' => 'Admiin tidak ditemukan'], 404);
        }

        $hki = Hki::find($request->hki_id);
        if (!$hki) {
            return response()->json(['error' => 'Data hki tidak ditemukan'], 404);
        }

        $user = $hki->dosen->user;
        $hki_id = $request->hki_id;
        $isi_komentar = $request->isi_komentar;

        $db_komentar = new KomentarHki();
        $db_komentar->foto_profile = $admin->foto_profile;
        $db_komentar->nama_lengkap = $admin->nama_lengkap;
        $db_komentar->hki_id = $hki_id;
        $db_komentar->komentar = $request->isi_komentar;
        $db_komentar->save();

        $auth = Auth::user();

        if ($auth->role === 'admin') {
            $userSend = $auth->admin;
        } else {
            $userSend = $auth->dosen;
        }

        Notifikasi::create([
            'nama_pengirim' => $userSend->nama_lengkap,
            'profile_pengirim' => $userSend->foto_profile,
            'user_id' => $user->id,
            'komentar' => "Hki anda telah mendapatkan komentar  \"" . $isi_komentar . "\" silahkan cek detail hki.",
            'created_at' => now(),
            'url' => 'detail-hki/' . $hki_id,
        ]);

        return response()->json(['message' => 'Komentar berhasil ditambahkan!'], 200);
    }

    public function deleteKomentarHki($id)
    {
        $deleted = KomentarHki::where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Data komentar hki berhasil dihapus.'], 200);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan atau gagal dihapus.'], 404);
        }
    }

    public function addKolaborasiHki(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|string',
            'hki_id' => 'required|string',
        ]);

        $dosen_id = $request->dosen_id;
        $hki_id = $request->hki_id;

        $kolaborator = new KolaboratorHki();
        $kolaborator->dosen_id = $dosen_id;
        $kolaborator->hki_id = $hki_id;
        $kolaborator->save();

        $dosen = Dosen::find($request->dosen_id);

        $hki = Hki::find($request->hki_id);
        if (!$hki) {
            return response()->json(['error' => 'Data hki tidak ditemukan'], 404);
        }

        if (!$dosen) {
            return response()->json(['error' => 'Data dosen tidak ditemukan'], 404);
        }

        $user = $dosen->user;

        $auth = Auth::user();

        if ($auth->role === 'admin') {
            $userSend = $auth->admin;
        } else {
            $userSend = $auth->dosen;
        }

        Notifikasi::create([
            'nama_pengirim' => $userSend->nama_lengkap,
            'profile_pengirim' => $userSend->foto_profile,
            'user_id' => $user->id,
            'komentar' => "Anda telah ditambahkan sebagai kolaborator hki \"" . $hki->judul . "\" silahkan cek detail hki.",
            'created_at' => now(),
            'url' => 'detail-hki/' . $hki_id,
        ]);

        return response()->json(['message' => 'Komentar berhasil ditambahkan!'], 200);
    }

    public function deleteKolaborasiHki($id)
    {
        $deleted = KolaboratorHki::where('id', operator: $id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Data kolaborator hki berhasil dihapus.'], 200);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan atau gagal dihapus.'], 404);
        }
    }
}
