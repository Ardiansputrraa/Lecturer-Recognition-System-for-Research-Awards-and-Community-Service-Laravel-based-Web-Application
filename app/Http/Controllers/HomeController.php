<?php

namespace App\Http\Controllers;

use App\Models\Hki;
use App\Models\Dosen;
use App\Models\Publikasi;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function viewPageHome()
    {
        if (Auth::user()->role === 'admin') {
            $totalPublikasi = Publikasi::count();
            $totalPenelitian = Penelitian::count();
            $totalPengabdian = Pengabdian::count();
            $totalHki = Hki::count();

            $totalPublikasiAktif = Publikasi::where('status', 'Disetujui')->count();
            $totalPublikasiDitolak = Pengabdian::where('status', 'Ditolak')->count();

            $totalPenelitianiAktif = penelitian::where('status', 'Disetujui')->count();
            $totalPenelitianDitolak = Penelitian::where('status', 'Ditolak')->count();

            $totalPengabdianAktif = Pengabdian::where('status', 'Disetujui')->count();
            $totalPengabdianDitolak = Pengabdian::where('status', 'Ditolak')->count();

            $totalHkiAktif = Hki::where('status', 'Disetujui')->count();
            $totalHkiDitolak = Hki::where('status', 'Ditolak')->count();
        } else {
            $totalPublikasi = Publikasi::where('dosen_id', Auth::user()->dosen->id)->count();
            $totalPenelitian = Penelitian::where('dosen_id', Auth::user()->dosen->id)->count();
            $totalPengabdian = Pengabdian::where('dosen_id', Auth::user()->dosen->id)->count();
            $totalHki = Hki::where('dosen_id', Auth::user()->dosen->id)->count();

            $totalPublikasiAktif = Publikasi::where('dosen_id', Auth::user()->dosen->id)->where('status', 'Disetujui')->count();
            $totalPublikasiDitolak = Publikasi::where('dosen_id', Auth::user()->dosen->id)->where('status', 'Ditolak')->count();

            $totalPenelitianiAktif = Penelitian::where('dosen_id', Auth::user()->dosen->id)->where('status', 'Disetujui')->count();
            $totalPenelitianDitolak = Penelitian::where('dosen_id', Auth::user()->dosen->id)->where('status', 'Ditolak')->count();

            $totalPengabdianAktif = Pengabdian::where('dosen_id', Auth::user()->dosen->id)->where('status', 'Disetujui')->count();
            $totalPengabdianDitolak = Pengabdian::where('dosen_id', Auth::user()->dosen->id)->where('status', 'Ditolak')->count();

            $totalHkiAktif = Hki::where('dosen_id', Auth::user()->dosen->id)->where('status', 'Disetujui')->count();
            $totalHkiDitolak = Hki::where('dosen_id', Auth::user()->dosen->id)->where('status', 'Ditolak')->count();
        }

        $persenPublikasiDitolak = $totalPublikasi > 0 ? ($totalPublikasiDitolak / $totalPublikasi) * 100 : 0;
        $persenPenelitianDitolak = $totalPenelitian > 0 ? ($totalPenelitianDitolak / $totalPenelitian) * 100 : 0;
        $persenPengabdianDitolak = $totalPengabdian > 0 ? ($totalPengabdianDitolak / $totalPengabdian) * 100 : 0;
        $persenHkiDitolak = $totalHki > 0 ? ($totalHkiDitolak / $totalHki) * 100 : 0;

        $dosen = Dosen::take(3)->get();

        $years = range(2020, 2025);

        $publikasiByYear = Publikasi::select(DB::raw('tahun, COUNT(*) as total'))
            ->whereIn('tahun', $years)
            ->groupBy('tahun')
            ->pluck('total', 'tahun')
            ->toArray();

        $penelitianByYear = Penelitian::select(DB::raw('tahun, COUNT(*) as total'))
            ->whereIn('tahun', $years)
            ->groupBy('tahun')
            ->pluck('total', 'tahun')
            ->toArray();

        $pengabdianByYear = Pengabdian::select(DB::raw('tahun, COUNT(*) as total'))
            ->whereIn('tahun', $years)
            ->groupBy('tahun')
            ->pluck('total', 'tahun')
            ->toArray();

        $hkiByYear = Hki::select(DB::raw('tahun, COUNT(*) as total'))
            ->whereIn('tahun', $years)
            ->groupBy('tahun')
            ->pluck('total', 'tahun')
            ->toArray();

        return view('dashboard.home.home', [
            'dosen' => $dosen,
            'totalPublikasiAktif' => $totalPublikasiAktif,
            'totalPenelitianiAktif' => $totalPenelitianiAktif,
            'totalHkiAktif' => $totalHkiAktif,
            'totalPengabdianAktif' => $totalPengabdianAktif,
            'totalPublikasiDitolak' => $totalPublikasiDitolak,
            'totalPenelitianDitolak' => $totalPenelitianDitolak,
            'totalHkiDitolak' => $totalHkiDitolak,
            'totalPengabdianDitolak' => $totalPengabdianDitolak,
            'persenPublikasiDitolak' => $persenPublikasiDitolak,
            'persenPenelitianDitolak' => $persenPenelitianDitolak,
            'persenPengabdianDitolak' => $persenPengabdianDitolak,
            'persenHkiDitolak' => $persenHkiDitolak,
            'years' => $years,
            'publikasiByYear' => $publikasiByYear,
            'penelitianByYear' => $penelitianByYear,
            'pengabdianByYear' => $pengabdianByYear,
            'hkiByYear' => $hkiByYear,
        ]);
    }
}
