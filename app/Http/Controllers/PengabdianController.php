<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Notifikasi;
use App\Models\Pengabdian;
use Illuminate\Http\Request;
use App\Models\FilePengabdian;
use App\Models\KomentarPengabdian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\KolaboratorPengabdian;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PengabdianController extends Controller
{
    public function viewPagePengabdian()
    {
        if (Auth::user()->role === 'admin') {
            $pengabdian = Pengabdian::all();
        } else {
            $pengabdian = Pengabdian::where('dosen_id', Auth::user()->dosen->id)->get();
        }

        return view('dashboard.pengabdian-dosen.pengabdian', compact('pengabdian'));
    }

    public function detailDataPengabdian($id)
    {
        $pengabdian = Pengabdian::where('id', $id)->first();
        $filePengabdian = FilePengabdian::where('pengabdian_id', $pengabdian->id)->get();
        $komentarPengabdian = KomentarPengabdian::where('pengabdian_id', $pengabdian->id)->get();
        $dosen = Dosen::all();
        $kolaborator = KolaboratorPengabdian::where('pengabdian_id', $pengabdian->id)->get();

        return view('dashboard.pengabdian-dosen.detail-pengabdian', [
            'pengabdian' => $pengabdian,
            'filePengabdian' => $filePengabdian,
            'komentarPengabdian' => $komentarPengabdian,
            'dosen' => $dosen,
            'kolaborator' => $kolaborator,
        ]);
    }

    public function updateDataPengabdian(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string',
            'tahun' => 'required|integer',
            'besaran_dana' => 'nullable|numeric',
            'sumber_dana' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $pengabdian = Pengabdian::find($request->id);
        if (!$pengabdian) {
            return response()->json(['error' => 'Data pengabdian tidak ditemukan'], 404);
        }

        $pengabdian->jabatan = $request->jabatan;
        $pengabdian->tahun = $request->tahun;
        $pengabdian->besaran_dana = $request->besaran_dana;
        $pengabdian->sumber_dana = $request->sumber_dana;
        if ($request->status) {
            $pengabdian->status = $request->status;
        }
        $pengabdian->update();

        $user = $pengabdian->dosen->user;

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
                'komentar' => "Data pengabdian telah diajukan untuk diperiksa.",
                'created_at' => now(),
                'url' => 'detail-pengabdian/' . $id,
            ]);
        } elseif ($request->status === 'Ditolak') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => $user->id,
                'komentar' => "Data pengabdian anda telah ditolak silahkan cek kembali.",
                'created_at' => now(),
                'url' => 'detail-pengabdian/' . $id,
            ]);
        } elseif ($request->status === 'Disetujui') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => $user->id,
                'komentar' => "Data pengabdian anda telah disetujui cek detail pengabdian.",
                'created_at' => now(),
                'url' => 'detail-pengabdian/' . $id,
            ]);
        }
        return response()->json(['message' => 'Data Pengabdian berhasil diperbarui!'], 200);
    }

    public function addDataPengabdian(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string',
            'tahun' => 'required|integer',
            'besaran_dana' => 'nullable|numeric',
            'sumber_dana' => 'nullable|string',
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

        $pengabdian = new Pengabdian();
        $pengabdian->dosen_id = $dosen->id;
        $pengabdian->nama_dosen = $dosen->nama_lengkap;
        $pengabdian->jabatan = $request->jabatan;
        $pengabdian->tahun = $request->tahun;
        $pengabdian->besaran_dana = $request->dana;
        $pengabdian->sumber_dana = $request->sumber;
        $pengabdian->status = 'Draft';
        $pengabdian->save();

        return response()->json(['message' => 'Data Pengabdian berhasil ditambahkan!'], 200);
    }

    public function searchDataPengabdian(Request $request)
    {
        $request->validate(rules: [
            'keyword' => 'required|string',
        ]);

        $keyword = $request->get('keyword');

        $user = Auth::user();
        if ($user->role !== 'dosen') {
            $results = Pengabdian::where('nama_dosen', 'LIKE', '%' . $keyword . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tahun', 'LIKE', '%' . $keyword . '%')
                ->orWhere('besaran_dana', 'LIKE', '%' . $keyword . '%')
                ->orWhere('sumber_dana', 'LIKE', '%' . $keyword . '%')
                ->orWhere('status', 'LIKE', '%' . $keyword . '%')
                ->get();
        } else {
            $results = Pengabdian::where(function ($query) use ($keyword) {
                $query->where('jabatan', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('tahun', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('besaran_dana', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('sumber_dana', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('status', 'LIKE', '%' . $keyword . '%');
            })
                ->where('dosen_id', $user->dosen->id)
                ->get();
        }

        return response()->json($results);
    }

    public function downloadDataPengabdian()
    {
        $data = Pengabdian::all();

        $fileName = 'data_pengabdian.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = ['Nama Lengkap', 'Jabatan', 'Tahun Pengabdian', 'Besaran Dana', 'Sumber Dana', 'Status'];

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->nama_dosen,
                    $row->jabadan,
                    $row->tahun,
                    $row->besaran_dana,
                    $row->sumber_dana,
                    $row->status,
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function deleteDataPengabdian($id)
    {
        DB::beginTransaction();
        try {
            FilePengabdian::where('pengabdian_id', $id)->delete();
            KolaboratorPengabdian::where('pengabdian_id', $id)->delete();
            KomentarPengabdian::where('pengabdian_id', $id)->delete();
            Pengabdian::where('id', $id)->delete();

            DB::commit();
            return response()->json(['message' => 'Data pengabdian berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function uploadFilePengabdian(Request $request)
    {
        $request->validate([
            'namaFile' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,docx,ppt,xlsx,xls,jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('file');
        $fileSize = $file->getSize();
        $fileName = $request->namaFile . '-' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = 'storage/file/file-pengabdian/' . $fileName;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        $file->move(public_path(path: 'storage/file/file-pengabdian'), $fileName);
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

        $filePengabdian = FilePengabdian::create([
            'pengabdian_id' => $request->pengabdian_id,
            'file_path' => $filePath,
            'nama_file' => $fileName,
            'tipe' =>  $tipe,
            'size' => $fileSize,
            'uploaded_at' => now(),
        ]);

        return response()->json(['success' => 'File pengabdian berhasil diunggah.'], 200);
    }

    function deleteFilePengabdian($id)
    {
        $file_pengabdian = FilePengabdian::find($id);
        $filePath = public_path($file_pengabdian->file_path);
        if ($file_pengabdian) {
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $file_pengabdian->delete();
        }
        return response()->json(['success' => 'File pengabdian berhasil dihapus.'], 200);
    }

    public function downloadFilePengabdian($id)
    {
        $file_pengabdian = FilePengabdian::findOrFail($id);

        $filePath = public_path($file_pengabdian->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath, basename($filePath));
        } else {
            return response()->json(['error' => 'File tidak ditemukan.'], 404);
        }
    }

    public function addKomentarPengabdian(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
            'pengabdian_id' => 'required|string',
        ]);

        $admin = Auth::user()->admin;

        if (!$admin) {
            return response()->json(['error' => 'Admiin tidak ditemukan'], 404);
        }

        $pengabdian = Pengabdian::find($request->pengabdian_id);
        if (!$pengabdian) {
            return response()->json(['error' => 'Data pengabdian tidak ditemukan'], 404);
        }

        $user = $pengabdian->dosen->user;
        $pengabdian_id = $request->pengabdian_id;
        $isi_komentar = $request->isi_komentar;

        $db_komentar = new KomentarPengabdian();
        $db_komentar->foto_profile = $admin->foto_profile;
        $db_komentar->nama_lengkap = $admin->nama_lengkap;
        $db_komentar->pengabdian_id = $pengabdian_id;
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
            'komentar' => "Pengabdian anda telah mendapatkan komentar  \"" . $isi_komentar . "\" silahkan cek detail pengabdian.",
            'created_at' => now(),
            'url' => 'detail-pengabdian/' . $pengabdian_id,
        ]);

        return response()->json(['message' => 'Komentar berhasil ditambahkan!'], 200);
    }

    public function deleteKomentarPengabdian($id)
    {
        $deleted = KomentarPengabdian::where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Data komentar pengabdian berhasil dihapus.'], 200);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan atau gagal dihapus.'], 404);
        }
    }

    public function addKolaborasiPengabdian(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|string',
            'pengabdian_id' => 'required|string',
        ]);

        $dosen_id = $request->dosen_id;
        $pengabdian_id = $request->pengabdian_id;

        $kolaborator = new KolaboratorPengabdian();
        $kolaborator->dosen_id = $dosen_id;
        $kolaborator->pengabdian_id = $pengabdian_id;
        $kolaborator->save();

        $dosen = Dosen::find($request->dosen_id);

        $pengabdian = Pengabdian::find($request->pengabdian_id);
        if (!$pengabdian) {
            return response()->json(['error' => 'Data pengabdian tidak ditemukan'], 404);
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
            'komentar' => "Anda telah ditambahkan sebagai kolaborator pengabdian silahkan cek detail pengabdian.",
            'created_at' => now(),
            'url' => 'detail-pengabdian/' . $pengabdian_id,
        ]);

        return response()->json(['message' => 'Komentar berhasil ditambahkan!'], 200);
    }

    public function deleteKolaborasiPengabdian($id)
    {
        $deleted = KolaboratorPengabdian::where('id', operator: $id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Data kolaborator pengabdian berhasil dihapus.'], 200);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan atau gagal dihapus.'], 404);
        }
    }
}
