<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\ValidationException;

class DosenController extends Controller
{
    public function viewManageDosen()
    {
        Gate::authorize('viewPage', User::class);

        $dosen = Dosen::all();
        return view('dashboard.kelola-dosen.dosen', compact('dosen'));
    }

    public function detailDataDosen($id, Dosen $dosen)
    {
        Gate::authorize('viewPage', User::class);
        
        $dosen = Dosen::where('id', $id)->first();
        return view('dashboard.kelola-dosen.detail-dosen', ['dosen' => $dosen]);
    }

    public function updateDataDosen(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nip' => 'nullable|string|unique:dosen,nip,' . $request->id,
        ]);        

        if ($validator->fails()) {
            if ($validator->errors()->has('email')) {
                return response()->json(['message' => 'Email sudah digunakan!'], 422);
            }
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $id = $request->id;
        $dosen = Dosen::where('id', $id)->first();

        if ($request->hasFile('foto')) {
            if ($dosen->foto_profile && Storage::exists($dosen->foto_profile)) {
                Storage::delete($dosen->foto_profile);
            }

            $image = $request->file('foto');
            $imageName = $dosen->nama_lengkap . '.' . $image->getClientOriginalExtension();
            $path = 'storage/images/profiles/' . $imageName;
            $image->move(public_path('storage/images/profiles'), $imageName);

            $dosen->foto_profile = $path;
        }

        if ($request->nip !== null) {
            $dosen->nip = $request->nip;
        }

        $dosen->nama_lengkap = $request->namaLengkap;

        $dosen->fakultas = $request->fakultas;
        $dosen->prodi = $request->prodi;
        $dosen->no_telepon = $request->nomerTelpon;

        $dosen->update();

        return response()->json(['msg' => 'Data Mahasiswa Berhasil Diubah.'], 200);

    }

    public function addDataDosen(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nip' => 'required|string|unique:dosen,nip',
            'fakultas' => 'required',
            'prodi' => 'required',
            'no_telepon' => 'nullable|string',
            'foto_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "dosen",
        ]);

        Dosen::create([
            'user_id' => $user->id,
            'nama_lengkap' => $request->namaLengkap,
            'foto_profile' => 'storage/images/profiles/profile.jpeg',
            'nip' => $request->nip,
            'fakultas' => $request->fakultas,
            'prodi' => $request->prodi,
            'no_telepon' => $request->nomerTelepon,
        ]);

        return response()->json(['message' => 'Registrasi berhasil.'], 200);
    }

    public function searchDataDosen(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string',
        ]);

        $keyword = $request->get('keyword');
        $results = Dosen::where('nama_lengkap', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nip', 'LIKE', '%' . $keyword . '%')
            ->orWhere('fakultas', 'LIKE', '%' . $keyword . '%')
            ->orWhere('prodi', 'LIKE', '%' . $keyword . '%')
            ->orWhere('no_telepon', 'LIKE', '%' . $keyword . '%')
            ->get();

        return response()->json($results);
    }

    public function downloadDataDosen()
    {
        $data = Dosen::all();

        $fileName = 'data_dosen.csv';

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$fileName",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = ['Nama Lengkap', 'NIP', 'Fakultas', 'Prodi', 'Nomer Telepon'];

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->nama_lengkap,
                    $row->nip,
                    $row->fakultas,
                    $row->prodi,
                    $row->no_telepon,
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function deleteDataDosen($id)
    {

        DB::beginTransaction();
        try {
            Dosen::where('user_id', $id)->delete();

            User::where('id', $id)->delete();

            DB::commit();
            return response()->json(['message' => 'Data dosen berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function readNotifikasi(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
        ]);

        $notifikasi = Notifikasi::find($request->id);
        if (!$notifikasi) {
            return response()->json(['error' => 'Notifikasi tidak ditemukan'], 404);
        }

        $notifikasi->status = "read";
        $notifikasi->update();

        return response()->json(['message' => 'Notifikasi telah dibaca!'], 200);
    }

}
