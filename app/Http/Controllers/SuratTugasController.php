<?php

namespace App\Http\Controllers;

use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratTugasController extends Controller
{
    public function viewSuratTugas()
    {
        return view('dashboard.surat-tugas.surat-tugas');
    }
    
    public function previewSuratTugas(Request $request)
    {
        $data = $request->all();
        return view('dashboard.surat-tugas.preview-surat-tugas', compact('data'));
    }

    public function downloadSuratTugas(Request $request)
    {
        $data = $request->all();
        $pdf = Pdf::loadView('dashboard.surat-tugas.preview-surat-tugas', compact('data'));
        return $pdf->download('surat-tugas-rekognisi.pdf');
    }
}
