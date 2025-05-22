<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Publikasi;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Models\FilePublikasi;
use App\Models\KomentarPublikasi;
use Illuminate\Support\Facades\DB;
use App\Models\KolaboratorPublikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PublikasiController extends Controller
{
    public function viewPagePublikasi()
    {
        if (Auth::user()->role === 'admin') {
            $publikasi = Publikasi::all();
        } else {
            $publikasi = Publikasi::where('dosen_id', Auth::user()->dosen->id)->get();
        }

        return view('dashboard.publikasi-dosen.publikasi', compact('publikasi'));
    }

    public function detailDataPublikasi($id)
    {
        $publikasi = Publikasi::where('id', $id)->first();
        $filePublikasi = FilePublikasi::where('publikasi_id', $publikasi->id)->get();
        $komentarPublikasi = KomentarPublikasi::where('publikasi_id', $publikasi->id)->get();
        $dosen = Dosen::all();
        $kolaborator = KolaboratorPublikasi::where('publikasi_id', $publikasi->id)->get();

        return view('dashboard.publikasi-dosen.detail-publikasi', [
            'publikasi' => $publikasi,
            'filePublikasi' => $filePublikasi,
            'komentarPublikasi' => $komentarPublikasi,
            'dosen' => $dosen,
            'kolaborator' => $kolaborator,
        ]);
    }

    public function updateDataPublikasi(Request $request)
    {
        $request->validate([
            'kontributor' => 'required|string',
            'judul' => 'required|string',
            'jenis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun' => 'required|integer',
            'status' => 'nullable|string',
        ]);

        $publikasi = Publikasi::find($request->id);
        if (!$publikasi) {
            return response()->json(['error' => 'Data publikasi tidak ditemukan'], 404);
        }
        
        $publikasi->kontributor = $request->kontributor;
        $publikasi->judul = $request->judul;
        $publikasi->tahun = $request->tahun;
        $publikasi->jenis = $request->jenis;
        $publikasi->tahun = $request->tahun;
        if ($request->status) {
            $publikasi->status = $request->status;
        }
        $publikasi->update();

        $user = $publikasi->dosen->user;

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
                'komentar' => "Data publikasi dari " . $user->dosen->nama_lengkap . " telah diajukan untuk diperiksa.",
                'created_at' => now(),
                'url' => 'detail-publikasi/' . $id,
            ]);
        } elseif ($request->status === 'Ditolak') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => $user->id,
                'komentar' => "Data publikasi anda telah ditolak silahkan cek kembali.",
                'created_at' => now(),
                'url' => 'detail-publikasi/' . $id,
            ]);
        } elseif ($request->status === 'Disetujui') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => $user->id,
                'komentar' => "Data publikasi anda telah disetujui cek detail publikasi.",
                'created_at' => now(),
                'url' => 'detail-publikasi/' . $id,
            ]);
        }
        return response()->json(['message' => 'Data Publikasi berhasil diperbarui!'], 200);
    }

    public function addDataPublikasi(Request $request)
    {
        $request->validate([
            'kontributor' => 'required|string',
            'judul' => 'required|string',
            'jenis' => 'required|string',
            'penerbit' => 'required|string',
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

        $publikasi = new Publikasi();
        $publikasi->dosen_id = $dosen->id;
        $publikasi->nama_dosen = $dosen->nama_lengkap;
        $publikasi->kontributor = $request->kontributor;
        $publikasi->judul = $request->judul;
        $publikasi->tahun = $request->tahun;
        $publikasi->jenis = $request->jenis;
        $publikasi->penerbit = $request->penerbit;
        $publikasi->status = 'Draft';
        $publikasi->save();

        return response()->json(['message' => 'Data Publikasi berhasil ditambahkan!'], 200);
    }

    public function searchDataPublikasi(Request $request)
    {
        $request->validate(rules: [
            'keyword' => 'required|string',
        ]);

        $keyword = $request->get('keyword');
        $results = Publikasi::where('nama_dosen', 'LIKE', '%' . $keyword . '%')
            ->orWhere('kontributor', 'LIKE', '%' . $keyword . '%')
            ->orWhere('judul', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jenis', 'LIKE', '%' . $keyword . '%')
            ->orWhere('penerbit', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tahun', 'LIKE', '%' . $keyword . '%')
            ->orWhere('status', 'LIKE', '%' . $keyword . '%')
            ->get();

        return response()->json($results);
    }

    public function downloadDataPublikasi()
    {
        $data = Publikasi::all();

        $fileName = 'data_publikasi.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = ['Nama Lengkap', 'Kontributor', 'Judul', 'Jenis Publikasi', 'Penerbit', 'Tahun', 'Status'];

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->nama_dosen,
                    $row->kontributor,
                    $row->judul,
                    $row->jenis,
                    $row->penerbit,
                    $row->tahun,
                    $row->status,
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function deleteDatapublikasi($id)
    {
        DB::beginTransaction();
        try {
            Filepublikasi::where('publikasi_id', $id)->delete();
            Kolaboratorpublikasi::where('publikasi_id', $id)->delete();
            Komentarpublikasi::where('publikasi_id', $id)->delete();
            publikasi::where('id', $id)->delete();

            DB::commit();
            return response()->json(['message' => 'Data dosen berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function uploadFilePublikasi(Request $request)
    {
        $request->validate([
            'namaFile' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,docx,ppt,xlsx,xls,jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('file');
        $fileSize = $file->getSize();
        $fileName = $request->namaFile . '-' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = 'storage/images/file-publikasi/' . $fileName;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        $file->move(public_path('storage/images/file-publikasi'), $fileName);
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

        $filePublikasi = FilePublikasi::create([
            'publikasi_id' => $request->publikasi_id,
            'file_path' => $filePath,
            'nama_file' => $fileName,
            'tipe' =>  $tipe,
            'size' => $fileSize,
            'uploaded_at' => now(),
        ]);

        return response()->json(['success' => 'File publikasi berhasil diunggah.'], 200);
    }

    function deleteFilePublikasi($id)
    {
        $file_publikasi = FilePublikasi::find($id);
        $filePath = public_path($file_publikasi->file_path);
        if ($file_publikasi) {
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $file_publikasi->delete();
        }
        return response()->json(['success' => 'File publikasi berhasil dihapus.'], 200);
    }

    public function downloadFilePublikasi($id)
    {
        $file_publikasi = FilePublikasi::findOrFail($id);

        $filePath = public_path($file_publikasi->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath, basename($filePath));
        } else {
            return response()->json(['error' => 'File tidak ditemukan.'], 404);
        }
    }

    public function addKomentarPublikasi(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
            'publikasi_id' => 'required|string',
        ]);

        $admin = Auth::user()->admin;

        if (!$admin) {
            return response()->json(['error' => 'Admiin tidak ditemukan'], 404);
        }

        $publikasi = Publikasi::find($request->publikasi_id);
        if (!$publikasi) {
            return response()->json(['error' => 'Data publikasi tidak ditemukan'], 404);
        }

        $user = $publikasi->dosen->user;
        $publikasi_id = $request->publikasi_id;
        $isi_komentar = $request->isi_komentar;

        $db_komentar = new KomentarPublikasi();
        $db_komentar->foto_profile = $admin->foto_profile;
        $db_komentar->nama_lengkap = $admin->nama_lengkap;
        $db_komentar->publikasi_id = $publikasi_id;
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
            'komentar' => "Publikasi anda telah mendapatkan komentar  \"" . $isi_komentar . "\" silahkan cek detail publikasi.",
            'created_at' => now(),
            'url' => 'detail-publikasi/' . $publikasi_id,
        ]);

        return response()->json(['message' => 'Komentar berhasil ditambahkan!'], 200);
    }

    public function deleteKomentarPublikasi($id)
    {
        $deleted = KomentarPublikasi::where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Data komentar publikasi berhasil dihapus.'], 200);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan atau gagal dihapus.'], 404);
        }
    }

    public function addKolaborasiPublikasi(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|string',
            'publikasi_id' => 'required|string',
        ]);

        $dosen_id = $request->dosen_id;
        $publikasi_id = $request->publikasi_id;

        $kolaborator = new KolaboratorPublikasi();
        $kolaborator->dosen_id = $dosen_id;
        $kolaborator->publikasi_id = $publikasi_id;
        $kolaborator->save();

        $dosen = Dosen::find($request->dosen_id);
        
        $publikasi = Publikasi::find($request->publikasi_id);
        if (!$publikasi) {
            return response()->json(['error' => 'Data publikasi tidak ditemukan'], 404);
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
            'komentar' => "Anda telah ditambahkan sebagai kolaborator publikasi \"" . $publikasi->judul . "\" silahkan cek detail publikasi.",
            'created_at' => now(),
            'url' => 'detail-publikasi/' . $publikasi_id,
        ]);

        return response()->json(['message' => 'Komentar berhasil ditambahkan!'], 200);
    }

    public function deleteKolaborasiPublikasi($id)
    {
        $deleted = KolaboratorPublikasi::where('id', operator: $id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Data kolaborator publikasi berhasil dihapus.'], 200);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan atau gagal dihapus.'], 404);
        }
    }

}

