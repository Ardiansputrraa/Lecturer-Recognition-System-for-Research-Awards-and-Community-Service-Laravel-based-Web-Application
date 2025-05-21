<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Notifikasi;
use App\Models\Penelitian;
use Illuminate\Http\Request;
use App\Models\FilePenelitian;
use App\Models\KomentarPenelitian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\KolaboratorPenelitian;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PenelitianController extends Controller
{
    public function viewPagePeneleitian()
    {
        if (Auth::user()->role === 'admin') {
            $penelitian = Penelitian::all();
        } else {
            $penelitian = Penelitian::where('dosen_id', Auth::user()->dosen->id)->get();
        }

        return view('dashboard.penelitian-dosen.penelitian', compact('penelitian'));
    }

    public function detailDataPeneleitian($id)
    {
        $penelitian = Penelitian::where('id', $id)->first();
        $filePenelitian = FilePenelitian::where('penelitian_id', $penelitian->id)->get();
        $komentarPenelitian = KomentarPenelitian::where('penelitian_id', $penelitian->id)->get();
        $dosen = Dosen::all();
        $kolaborator = KolaboratorPenelitian::where('penelitian_id', $penelitian->id)->get();

        return view('dashboard.penelitian-dosen.detail-penelitian', [
            'penelitian' => $penelitian,
            'filePenelitian' => $filePenelitian,
            'komentarPenelitian' => $komentarPenelitian,
            'dosen' => $dosen,
            'kolaborator' => $kolaborator,
        ]);
    }

    public function updateDataPenelitian(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string',
            'judul' => 'required|string',
            'tahun' => 'required|integer',
            'besaran_dana' => 'nullable|numeric',
            'sumber_dana' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $penelitian = Penelitian::find($request->id);
        if (!$penelitian) {
            return response()->json(['error' => 'Data penelitian tidak ditemukan'], 404);
        }

        $penelitian->jabatan = $request->jabatan;
        $penelitian->judul = $request->judul;
        $penelitian->tahun = $request->tahun;
        $penelitian->besaran_dana = $request->besaran_dana;
        $penelitian->sumber_dana = $request->sumber_dana;
        if ($request->status) {
            $penelitian->status = $request->status;
        }
        $penelitian->update();

        $user = $penelitian->dosen->user;

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
                'komentar' => "Data penelitian dari " . $user->dosen->nama_lengkap . " telah diajukan untuk diperiksa.",
                'created_at' => now(),
                'url' => 'detail-penelitian/' . $id,
            ]);
        } elseif ($request->status === 'Ditolak') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => $user->id,
                'komentar' => "Data penelitian anda telah ditolak silahkan cek kembali.",
                'created_at' => now(),
                'url' => 'detail-penelitian/' . $id,
            ]);
        } elseif ($request->status === 'Disetujui') {
            Notifikasi::create([
                'nama_pengirim' => $userSend->nama_lengkap,
                'profile_pengirim' => $userSend->foto_profile,
                'user_id' => $user->id,
                'komentar' => "Data penelitian anda telah disetujui cek detail penelitian.",
                'created_at' => now(),
                'url' => 'detail-penelitian/' . $id,
            ]);
        }
        return response()->json(['message' => 'Data Penelitian berhasil diperbarui!'], 200);
    }

    public function addDataPenelitian(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string',
            'judul' => 'required|string',
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

        $penelitian = new Penelitian();
        $penelitian->dosen_id = $dosen->id;
        $penelitian->nama_dosen = $dosen->nama_lengkap;
        $penelitian->jabatan = $request->jabatan;
        $penelitian->judul = $request->judul;
        $penelitian->tahun = $request->tahun;
        $penelitian->besaran_dana = $request->dana;
        $penelitian->sumber_dana = $request->sumber;
        $penelitian->status = 'Draft';
        $penelitian->save();

        return response()->json(['message' => 'Data Penelitian berhasil ditambahkan!'], 200);
    }

    public function searchDataPenelitian(Request $request)
    {
        $request->validate(rules: [
            'keyword' => 'required|string',
        ]);

        $keyword = $request->get('keyword');
        $results = Penelitian::where('nama_dosen', 'LIKE', '%' . $keyword . '%')
            ->orWhere('jabatan', 'LIKE', '%' . $keyword . '%')
            ->orWhere('judul', 'LIKE', '%' . $keyword . '%')
            ->orWhere('tahun', 'LIKE', '%' . $keyword . '%')
            ->orWhere('besaran_dana', 'LIKE', '%' . $keyword . '%')
            ->orWhere('sumber_dana', 'LIKE', '%' . $keyword . '%')
            ->orWhere('status', 'LIKE', '%' . $keyword . '%')
            ->get();

        return response()->json($results);
    }

    public function downloadDataPenelitian()
    {
        $data = Penelitian::all();

        $fileName = 'data_penelitian.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = ['Nama Lengkap', 'Jabatan', 'Judul', 'Besaran Dana', 'Sumber Dana', 'Status'];

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->nama_dosen,
                    $row->jabadan,
                    $row->judul,
                    $row->besaran_dana,
                    $row->sumber_dana,
                    $row->status,
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function deleteDataPenelitian($id)
    {
        DB::beginTransaction();
        try {
            FilePenelitian::where('penelitian_id', $id)->delete();
            KolaboratorPenelitian::where('penelitian_id', $id)->delete();
            KomentarPenelitian::where('penelitian_id', $id)->delete();
            Penelitian::where('id', $id)->delete();

            DB::commit();
            return response()->json(['message' => 'Data dosen berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function uploadFilePenelitian(Request $request)
    {
        $request->validate([
            'namaFile' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,docx,ppt,xlsx,xls,jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('file');
        $fileSize = $file->getSize();
        $fileName = $request->namaFile . '-' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = 'storage/images/file-penelitian/' . $fileName;
        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }
        $file->move(public_path('storage/images/file-penelitian'), $fileName);
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

        $filePenelitian = FilePenelitian::create([
            'penelitian_id' => $request->penelitian_id,
            'file_path' => $filePath,
            'nama_file' => $fileName,
            'tipe' =>  $tipe,
            'size' => $fileSize,
            'uploaded_at' => now(),
        ]);

        return response()->json(['success' => 'File penelitian berhasil diunggah.'], 200);
    }

    function deleteFilePenelitian($id)
    {
        $file_penelitian = FilePenelitian::find($id);
        $filePath = public_path($file_penelitian->file_path);
        if ($file_penelitian) {
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $file_penelitian->delete();
        }
        return response()->json(['success' => 'File penelitian berhasil dihapus.'], 200);
    }

    public function downloadFilePenelitian($id)
    {
        $file_penelitian = FilePenelitian::findOrFail($id);

        $filePath = public_path($file_penelitian->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath, basename($filePath));
        } else {
            return response()->json(['error' => 'File tidak ditemukan.'], 404);
        }
    }

    public function addKomentarPenelitian(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required|string',
            'penelitian_id' => 'required|string',
        ]);

        $admin = Auth::user()->admin;

        if (!$admin) {
            return response()->json(['error' => 'Admiin tidak ditemukan'], 404);
        }

        $penelitian = Penelitian::find($request->penelitian_id);
        if (!$penelitian) {
            return response()->json(['error' => 'Data penelitian tidak ditemukan'], 404);
        }

        $user = $penelitian->dosen->user;
        $penelitian_id = $request->penelitian_id;
        $isi_komentar = $request->isi_komentar;

        $db_komentar = new KomentarPenelitian();
        $db_komentar->foto_profile = $admin->foto_profile;
        $db_komentar->nama_lengkap = $admin->nama_lengkap;
        $db_komentar->penelitian_id = $penelitian_id;
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
            'komentar' => "Penelitian anda telah mendapatkan komentar  \"" . $isi_komentar . "\" silahkan cek detail penelitian.",
            'created_at' => now(),
            'url' => 'detail-penelitian/' . $penelitian_id,
        ]);

        return response()->json(['message' => 'Komentar berhasil ditambahkan!'], 200);
    }

    public function deleteKomentarPenelitian($id)
    {
        $deleted = KomentarPenelitian::where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Data komentar penelitian berhasil dihapus.'], 200);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan atau gagal dihapus.'], 404);
        }
    }

    public function addKolaborasiPenelitian(Request $request)
    {
        $request->validate([
            'dosen_id' => 'required|string',
            'penelitian_id' => 'required|string',
        ]);

        $dosen_id = $request->dosen_id;
        $penelitian_id = $request->penelitian_id;

        $kolaborator = new KolaboratorPenelitian();
        $kolaborator->dosen_id = $dosen_id;
        $kolaborator->penelitian_id = $penelitian_id;
        $kolaborator->save();

        $dosen = Dosen::find($request->dosen_id);
        
        $penelitian = Penelitian::find($request->penelitian_id);
        if (!$penelitian) {
            return response()->json(['error' => 'Data penelitian tidak ditemukan'], 404);
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
            'komentar' => "Anda telah ditambahkan sebagai kolaborator penelitian oleh " . $penelitian->nama_dosen . " silahkan cek detail penelitian.",
            'created_at' => now(),
            'url' => 'detail-penelitian/' . $penelitian_id,
        ]);

        return response()->json(['message' => 'Komentar berhasil ditambahkan!'], 200);
    }

    public function deleteKolaborasiPenelitian($id)
    {
        $deleted = KolaboratorPenelitian::where('id', operator: $id)->delete();
        if ($deleted) {
            return response()->json(['success' => 'Data kolaborator penelitian berhasil dihapus.'], 200);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan atau gagal dihapus.'], 404);
        }
    }

}
