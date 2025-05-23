<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Tugas Rekognisi</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.5;
            font-size: 12pt;
        }
        .center { text-align: center; }
        .header-logo { width: 80px; float: left; margin-right: 20px; }
        .kop { text-align: center; font-size: 14pt; }
        .line { border-top: 2px solid black; margin-top: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="kop">
        <img src="{{ public_path('assets/images/logo-yarsi.jpg') }}" class="header-logo">
        <div>
            <strong>Yayasan Universitas YARSI</strong><br>
            Menara Yarsi, Kota Jakarta Pusat Daerah Khusus Ibukota Jakarta– Indonesia,<br> 
            Telp. (021) 4206674 Email: pmbyarsi@yarsi.ac.<br>
            Website: pmbyarsi@yarsi.ac.id
        </div>
    </div>

    <div class="line"></div>

    <div class="center">
        <strong>SURAT TUGAS</strong><br>
        Nomor: 111/UN22.2/32/KP/2025
    </div>

    <br>

    <div>

    <p>Rektorat Universitas YARSI, dengan ini menugaskan:</p>

    <table>
        <tr><td>Nama</td><td>: {{ $data['nama'] }}</td></tr>
        <tr><td>NIP</td><td>: {{ $data['nip'] }}</td></tr>
        <tr><td>Pangkat/Golongan</td><td>: {{ $data['pangkat'] }}</td></tr>
        <tr><td>Jabatan</td><td>: {{ $data['jabatan'] }}</td></tr>
        <tr><td>Unit Kerja</td><td>: {{ $data['unit_kerja'] }}</td></tr>
    </table>

    <p>Untuk melaksanakan kegiatan sebagai berikut:</p>
    <p>{{ $data['acara'] }}</p>

    <p>Bertempat di: <strong>{{ $data['tempat'] }}</strong></p>

    <p>Waktu Pelaksanaan: {{ \Carbon\Carbon::parse($data['tanggalMulai'])->translatedFormat('d F Y') }} 
        s.d {{ \Carbon\Carbon::parse($data['tanggalAkhir'])->translatedFormat('d F Y') }}</p>

    <p>Penugasan ini berdasarkan: {{ $data['penugasan'] }}</p>

    <br>
    <p>Demikian surat ini dibuat untuk dapat dilaksanakan sebagaimana mestinya dan menyampaikan laporan.</p>

    <br><br>
    <div style="text-align: right;">
        Jakarta, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
        Rektor,<br><br><br><br>
        <strong>Prof. dr. Fasli Jalal, Ph.D.</strong><br>
        NIP: 196502031991031001
    </div>
</body>
</html>
