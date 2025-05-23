<x-header></x-header>

<script>
    function ubahPengabdian(id) {
        let jabatan = $("#jabatan").val();
        let tahun = $("#tahun").val();
        let dana = $("#dana").val();
        let sumber = $("#sumber").val();

        if (jabatan == "" || tahun == "" || dana == "" || sumber == "") {
            Swal.fire({
                title: "Info",
                text: "Semua field wajib diisi!",
                icon: "info",
                confirmButtonText: "Oke",
            }).then(() => {
                window.location.reload();
            });
        }

        $.ajax({
            type: "POST",
            url: "{{ route('update.pengabdian') }}",
            data: {
                _token: "{{ csrf_token() }}",
                jabatan: jabatan,
                id: id,
                tahun: tahun,
                besaran_dana: dana,
                sumber_dana: sumber,
                status: "Draft",
            },
            success: function(response) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Data pengabdian berhasil diubah!",
                    icon: "success",
                    confirmButtonText: "Oke",
                }).then(() => {
                    window.location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Gagal",
                    text: response.errors,
                    icon: "error",
                    confirmButtonText: "Oke",
                    customClass: {
                        confirmButton: 'btn app-btn-primary',
                        cancelButton: 'btn app-btn-secondary',
                    },
                });
            }
        });
    }

    function ajukanPengabdian(id) {
        let jabatan = $("#jabatan").val();
        let tahun = $("#tahun").val();
        let dana = $("#dana").val();
        let sumber = $("#sumber").val();

        if (jabatan == "" || tahun == "" || dana == "" || sumber == "") {
            Swal.fire({
                title: "Info",
                text: "Semua field wajib diisi!",
                icon: "info",
                confirmButtonText: "Oke",
            }).then(() => {
                window.location.reload();
            });
        }

        $.ajax({
            type: "POST",
            url: "{{ route('update.pengabdian') }}",
            data: {
                _token: "{{ csrf_token() }}",
                jabatan: jabatan,
                id: id,
                tahun: tahun,
                besaran_dana: dana,
                sumber_dana: sumber,
                status: "Diajukan",
            },
            success: function(response) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Pengabdian telah diajukan mohon menunggu notifikasi dari admin!",
                    icon: "success",
                    confirmButtonText: "Oke",
                }).then(() => {
                    window.location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Gagal",
                    text: response.errors,
                    icon: "error",
                    confirmButtonText: "Oke",
                    customClass: {
                        confirmButton: 'btn app-btn-primary',
                        cancelButton: 'btn app-btn-secondary',
                    },
                });
            }
        });
    }

    function setujuiPengabdian(id) {
        let jabatan = $("#jabatan").val();
        let tahun = $("#tahun").val();
        let dana = $("#dana").val();
        let sumber = $("#sumber").val();

        if (jabatan == "" || tahun == "" || dana == "" || sumber == "") {
            Swal.fire({
                title: "Info",
                text: "Semua field wajib diisi!",
                icon: "info",
                confirmButtonText: "Oke",
            }).then(() => {
                window.location.reload();
            });
        }

        $.ajax({
            type: "POST",
            url: "{{ route('update.pengabdian') }}",
            data: {
                _token: "{{ csrf_token() }}",
                jabatan: jabatan,
                id: id,
                tahun: tahun,
                besaran_dana: dana,
                sumber_dana: sumber,
                status: "Disetujui",
            },
            success: function(response) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Pengabdian telah disetujui!",
                    icon: "success",
                    confirmButtonText: "Oke",
                }).then(() => {
                    window.location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Gagal",
                    text: response.errors,
                    icon: "error",
                    confirmButtonText: "Oke",
                    customClass: {
                        confirmButton: 'btn app-btn-primary',
                        cancelButton: 'btn app-btn-secondary',
                    },
                });
            }
        });
    }

    function tolakPengabdian(id) {
        let jabatan = $("#jabatan").val();
        let tahun = $("#tahun").val();
        let dana = $("#dana").val();
        let sumber = $("#sumber").val();

        if (jabatan == "" || tahun == "" || dana == "" || sumber == "") {
            Swal.fire({
                title: "Info",
                text: "Semua field wajib diisi!",
                icon: "info",
                confirmButtonText: "Oke",
            }).then(() => {
                window.location.reload();
            });
        }

        $.ajax({
            type: "POST",
            url: "{{ route('update.pengabdian') }}",
            data: {
                _token: "{{ csrf_token() }}",
                jabatan: jabatan,
                id: id,
                tahun: tahun,
                besaran_dana: dana,
                sumber_dana: sumber,
                status: "Ditolak",
            },
            success: function(response) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Pengabdian telah ditolak!",
                    icon: "success",
                    confirmButtonText: "Oke",
                }).then(() => {
                    window.location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Gagal",
                    text: response.errors,
                    icon: "error",
                    confirmButtonText: "Oke",
                    customClass: {
                        confirmButton: 'btn app-btn-primary',
                        cancelButton: 'btn app-btn-secondary',
                    },
                });
            }
        });
    }

    function uploadFilePengabdian(pengabdian_id) {
        let namaFile = $('#namaFile').val();
        let fileInput = $('#filePengabdian')[0];
        let file = fileInput.files[0];

        if (namaFile === "") {
            $("#helpJudul")
                .text("Silahkan masukan nama file!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#namaFile").focus();
            return;
        }

        if (namaFile !== "") {
            $("#helpJudul")
                .text("")
                .removeClass("is-danger");
        }

        if (!file) {
            $("#helpFilePengabdian")
                .text("Silahkan pilih file terlebih dahulu!")
                .removeClass("is-safe")
                .addClass("is-danger");
            return;
        }

        if (file) {
            $("#helpFilePengabdian")
                .text("")
                .removeClass("is-danger");
        }

        let formSumberDaya = new FormData();
        formSumberDaya.append('_token', "{{ csrf_token() }}");
        formSumberDaya.append('namaFile', namaFile);
        formSumberDaya.append('pengabdian_id', pengabdian_id);
        formSumberDaya.append('file', file);

        $.ajax({
            type: "POST",
            url: "{{ route('upload.file.pengabdian') }}",
            data: formSumberDaya,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Bukti pengabdian berhasil diunggah!",
                    icon: "success",
                    confirmButtonText: "Oke",
                }).then(() => {
                    window.location.reload();
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Gagal",
                    text: "Terjadi kesalahan saat mengunggah file.",
                    icon: "error",
                    confirmButtonText: "Coba Lagi",
                });
            }
        });
    }

    function hapusFilePengabdian(file_id) {
        $.ajax({
            type: "GET",
            url: `/delete-file-pengabdian/${file_id}`,
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                Swal.fire({
                    title: "Berhasil",
                    text: "Bukti pengabdian berhasil dihapus!",
                    icon: "success",
                    confirmButtonText: "Oke",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            },
            error: function(xhr) {
                Swal.fire({
                    title: "Delete Failed",
                    text: xhr.responseText,
                    icon: "error",
                    confirmButtonText: "Oke",
                });
            }
        });
    }
</script>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar title="Detail Pengabdian"
            description="Pantau dan kelola pengabdian dari {{ $pengabdian->nama_dosen }}" />

        <div class="flex flex-col lg:flex-row gap-4 w-full h-[700px]">
            <!-- Layout 70% -->
            <div class="bg-white w-full lg:w-[70%] p-6 shadow rounded overflow-y-auto h-full">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-y-3 mb-4">
                    @php
                        $status = $pengabdian->status;
                        $warnaBorder = '';
                        $warnaTeks = '';

                        switch ($status) {
                            case 'Draft':
                                $warnaBorder = '#457B9D';
                                $warnaTeks = '#457B9D';
                                break;
                            case 'Diajukan':
                                $warnaBorder = '#F4A261';
                                $warnaTeks = '#F4A261';
                                break;
                            case 'Ditolak':
                                $warnaBorder = '#DC2626';
                                $warnaTeks = '#DC2626';
                                break;
                            case 'Disetujui':
                            case 'Diterima':
                                $warnaBorder = '#006A71';
                                $warnaTeks = '#006A71';
                                break;
                            default:
                                $warnaBorder = '#EF4444';
                                $warnaTeks = '#EF4444';
                                break;
                        }
                    @endphp

                    <div class="flex gap-4">
                        <h1 class="text-md py-1 font-semibold text-gray-900">Status Pengabdian</h1>
                        <div class="px-8 py-1 rounded-md" style="border: 2px solid {{ $warnaBorder }}">
                            <p class="text-sm font-medium" style="color: {{ $warnaTeks }}">{{ $status }}</p>
                        </div>
                    </div>

                    <!-- Tombol Edit Pengabdian -->
                    @if (Auth::user()->role == 'dosen')
                        <button type="button" onclick="addEdit()"
                            class="flex items-center gap-2 text-[#48A6A7] px-4 py-2 hover:text-[#006A71] transition duration-300 w-full md:w-auto hover:underline">
                            <!-- Icon Edit (Pencil) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M17.414 2.586a2 2 0 0 0-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 0 0 0-2.828zM4 15h12v2H4v-2z" />
                            </svg>
                            Edit Pengabdian
                        </button>
                    @endif

                    <script>
                        window.addEdit = function() {
                            $('input:disabled, select:disabled, textarea:disabled, button:disabled').each(function() {
                                $(this).removeAttr('disabled');
                            });
                            $('input, select, textarea, button').removeClass('cursor-not-allowed opacity-50');
                        }
                    </script>
                </div>
                <div class="mt-6">
                    <form class="space-y-4" action="#">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="w-full md:w-1/2 space-y-4">
                                <!-- Jabatan -->
                                <div>
                                    <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">Jabatan
                                        dalam Pengabdian</label>
                                    <input type="text" name="jabatan" id="jabatan"
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                        placeholder="Masukkan jabatan dalam pengabdian" value="{{ $pengabdian->jabatan }}" required
                                        disabled />
                                </div>
                    
                                <!-- Tanggal Pengabdian -->
                                <div>
                                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun
                                        Pengabdian</label>
                                    <input type="number" name="tahun" id="tahun"
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                        value="{{ $pengabdian->tahun }}" placeholder="Masukkan tahun pengabdian" min="2000" max="2025" required disabled />
                                </div>
                    
                                <!-- Besaran Dana -->
                                <div>
                                    <label for="dana" class="block mb-2 text-sm font-medium text-gray-900">Besaran
                                        Dana Pengabdian</label>
                                    <input type="number" name="dana" id="dana"
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                        placeholder="Masukkan dana pengabdian" value="{{ $pengabdian->besaran_dana }}" required
                                        disabled />
                                </div>
                            </div>
                            
                            <div class="w-full md:w-1/2 space-y-4">
                                <!-- Sumber Pengabdian -->
                                <div>
                                    <label for="sumber" class="block mb-2 text-sm font-medium text-gray-900">Sumber Dana
                                        Pengabdian</label>
                                    <textarea name="sumber" id="sumber"
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5 h-32 sm:h-54 resize-none"
                                        placeholder="Masukkan sumber dana pengabdian" required disabled>{{ $pengabdian->sumber_dana }}</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-12 border-t-2 border-gray-300">
                    <div class="flex items-center justify-between mb-4 mt-6">
                        <h1 class="text-xl font-semibold text-gray-900">Bukti Pengabdian</h1>
                        @if (Auth::user()->role == 'dosen')
                            <!-- Tombol Edit Pengabdian -->
                            <button data-modal-target="uploadBuktiPengabdianModal"
                                data-modal-toggle="uploadBuktiPengabdianModal" type="button"
                                class="flex items-center gap-2 text-[#48A6A7] px-4 py-2 hover:text-[#006A71] transition duration-300 w-full md:w-auto hover:underline">
                                <!-- Icon Edit (Pencil) -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                </svg>
                                Unggah Bukti
                            </button>
                        @endif
                    </div>

                    <!-- Bukti Pengabdian -->
                    <div class="mt-4 space-y-5">
                        <p class="text-sm text-gray-500">Unggah bukti pengabdian yang telah dilakukan. Pastikan file
                            yang
                            diunggah sesuai dengan format yang ditentukan.</p>

                        <!-- Kartu Bukti Pengabdian -->
                        @if ($filePengabdian->isEmpty())
                            <div class="text-center text-gray-500 font-medium p-4">
                                Anda belum mengunggah bukti pengabdian.
                            </div>
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                <!-- Card 1 -->
                                @foreach ($filePengabdian as $file)
                                    @php
                                        $tipe = '';
                                        if ($file->tipe == 'pdf') {
                                            $icon = 'https://cdn-icons-png.flaticon.com/512/337/337946.png';
                                            $tipe = 'PDF';
                                        } elseif ($file->tipe == 'docx') {
                                            $icon = 'https://cdn-icons-png.flaticon.com/512/337/337932.png';
                                            $tipe = 'DOCX';
                                        } elseif ($file->tipe == 'xlsx') {
                                            $icon = 'https://cdn-icons-png.flaticon.com/512/337/337947.png';
                                            $tipe = 'XLSX';
                                        } elseif ($file->tipe == 'gambar') {
                                            $icon = asset('storage/file_pengabdian/' . $file->nama_file); // tampilkan gambar asli
                                            $tipe = 'Gambar';
                                        } else {
                                            $icon = 'https://cdn-icons-png.flaticon.com/512/337/337940.png';
                                            $tipe = 'File';
                                        }

                                        $sizeKb = number_format($file->ukuran_file / 1024, 2); // ukuran KB
                                    @endphp

                                    <div
                                        class="bg-white rounded-lg shadow p-4 flex flex-col items-center text-center border-2 border-gray-100 shawdow-lg">
                                        <div
                                            class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mb-4 overflow-hidden">
                                            <img src="{{ $icon }}" alt="File Icon"
                                                class="w-12 h-12 object-contain">
                                        </div>
                                        <div class="flex flex-col items-start">
                                            <h3 class="text-sm text-gray-800 mb-4 text-start">{{ $file->nama_file }}
                                            </h3>
                                            <p class="text-sm text-gray-600">Type: {{ $tipe }}</p>
                                            <p class="text-sm text-gray-600 mb-4">Size: {{ $sizeKb }} KB</p>
                                        </div>

                                        <div class="flex gap-4">
                                            {{-- Tombol Hapus --}}
                                            <button type="button" onclick="hapusFilePengabdian('{{ $file->id }}')"
                                                class="relative group flex items-center justify-center w-10 h-10">
                                                <svg class="w-5 h-5 text-[#EF4444] group-hover:text-[#DC2626] transition"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H2a1 1 0 100 2h1v11a2 2 0 002 2h10a2 2 0 002-2V6h1a1 1 0 100-2h-3V3a1 1 0 00-1-1H6zm3 5a1 1 0 012 0v7a1 1 0 11-2 0V7zm-4 0a1 1 0 012 0v7a1 1 0 11-2 0V7zm8 0a1 1 0 012 0v7a1 1 0 11-2 0V7z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span
                                                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                                    Hapus
                                                </span>
                                            </button>

                                            {{-- Tombol Download --}}
                                            <a href="{{ route('download.file.pengabdian', $file->id) }}"
                                                class="relative group flex items-center justify-center w-10 h-10">
                                                <svg class="w-5 h-5 text-[#5F9AB8] group-hover:text-[#457B9D] transition"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill="currentColor"
                                                        d="M3 16a2 2 0 002 2h10a2 2 0 002-2v-3h-2v3H5v-3H3v3zm7-1a1 1 0 001-1V5a1 1 0 10-2 0v9a1 1 0 001 1zm-3-3a1 1 0 011.707-.707L10 13.586l1.293-1.293A1 1 0 1112.707 13.707l-2 2a1 1 0 01-1.414 0l-2-2A1 1 0 017 12z" />
                                                </svg>
                                                <span
                                                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                                    Download
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if (Auth::user()->role == 'dosen')
                            <div class="flex justify-end">
                                <div class="flex items-center justify-between gap-4 mt-4 mb-4">
                                    <button type="button" onclick="ubahPengabdian('{{ $pengabdian->id }}')"
                                        class="cursor-not-allowed opacity-50 bg-[#5F9AB8] border-2 border-[#457B9D] hover:bg-white text-white hover:text-[#457B9D] font-medium py-2 px-4 rounded-lg transition duration-300">
                                        Ubah Pengabdian
                                    </button>
                                    @if ($pengabdian->status != 'Diajukan')
                                        <button type="button" onclick="ajukanPengabdian('{{ $pengabdian->id }}')"
                                            class="bg-[#48A6A7] border-2 border-[#006A71] hover:bg-white text-white hover:text-[#006A71] font-medium py-2 px-4 rounded-lg transition duration-300">
                                            Ajukan Pengabdian
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->role == 'admin' && $pengabdian->status != 'Draft')
                            <div class="flex justify-start">
                                <div class="flex items-center justify-between gap-4 mt-4 mb-4">
                                    <button type="button" onclick="setujuiPengabdian('{{ $pengabdian->id }}')"
                                        class="bg-[#48A6A7] border-2 border-[#006A71] hover:bg-white text-white hover:text-[#006A71] font-medium py-2 px-4 rounded-lg transition duration-300">
                                        Setujui Pengabdian
                                    </button>
                                    <button type="button" onclick="tolakPengabdian('{{ $pengabdian->id }}')"
                                        class="bg-[#EF4444] border-2 border-[#DC2626] hover:bg-white text-white hover:text-[#DC2626] font-medium py-2 px-4 rounded-lg transition duration-300">
                                        Tolak Pengabdian
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

            </div>

            <!-- Layout 30% (atas-bawah) -->
            <div class="w-full lg:w-[30%] flex flex-col gap-4 h-full">
                <div class="bg-white w-full p-4 shadow rounded overflow-y-auto h-[50%]">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-900 font-semibold">Komentar</p>

                        <!-- Tombol tambah komentar dengan dropdown -->
                        <div class="relative group">
                            @if (Auth::user()->role == 'admin')
                                <!-- Tombol utama -->
                                <button id="dropdownKomentarButton" data-dropdown-toggle="dropdownKomentar"
                                    class="flex items-center justify-center w-10 h-10 transition">
                                    <svg class="w-6 h-6 text-[#5F9AB8] group-hover:text-[#457B9D] transition-colors"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14m-7 7V5" />
                                    </svg>
                                </button>
                            @endif

                            <!-- Tooltip -->
                            <span
                                class="absolute z-50 top-full left-1/2 transform -translate-x-1/2 mt-2 bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                Tambah Komentar
                            </span>

                            <!-- Dropdown tambah komentar -->
                            <div id="dropdownKomentar"
                                class="z-50 hidden w-75 sm:w-72 md:w-75 absolute right-0 mt-3 bg-white rounded-lg border border-gray-200 shadow-lg p-4">
                                <form action="#" method="POST" class="space-y-3">
                                    <label for="komentar"
                                        class="block text-sm font-medium text-gray-700">Komentar:</label>
                                    <textarea id="komentar" name="komentar" rows="4"
                                        class="w-full p-2 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Tulis komentar Anda..."></textarea>
                                    <p id="helpKomentar" class="help is-hidden text-xs mb-4 text-red-400"></p>
                                    <button type="button" onclick="addKomentar('{{ $pengabdian->id }}')"
                                        class="w-full text-white bg-[#5F9AB8] hover:bg-[#457B9D] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center transition">
                                        Kirim Komentar
                                    </button>
                                </form>
                                <script>
                                    function addKomentar(pengabdian_id) {
                                        let komentar = $('#komentar').val();

                                        if (komentar == "") {
                                            $("#helpKomentar")
                                                .text("Silahkan masukan komentar!")
                                                .removeClass("is-safe")
                                                .addClass("is-danger");
                                            $("#komentar").focus();
                                            return;
                                        }

                                        if (komentar != "") {
                                            $("#helpKomentar")
                                                .text("")
                                                .removeClass("is-danger");
                                        }

                                        $.ajax({
                                            url: "{{ route('add.komentar.pengabdian') }}",
                                            type: 'POST',
                                            data: {
                                                isi_komentar: komentar,
                                                pengabdian_id: pengabdian_id,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Berhasil',
                                                    text: 'Komentar berhasil ditambahkan!',
                                                }).then(() => {
                                                    location.reload();
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error',
                                                    text: 'Terjadi kesalahan saat menambahkan data!',
                                                });
                                            }
                                        });
                                    }
                                </script>
                            </div>
                        </div>

                    </div>

                    <div class="space-y-4">
                        @if ($komentarPengabdian->isEmpty())
                            <div class="text-center text-gray-500 font-medium p-4">
                                Belum ada komentar.
                            </div>
                        @else
                            @foreach ($komentarPengabdian as $data)
                                <div class="bg-gray-100 p-4 rounded-lg shadow-md max-w-md w-full">
                                    <!-- Profil, Nama & Tombol -->
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center gap-3">
                                            <!-- Foto Profil -->
                                            <img src="{{ asset($data->foto_profile) }}" alt="User"
                                                class="w-10 h-10 rounded-full object-cover">

                                            <!-- Nama dan Tanggal -->
                                            <div>
                                                <p class="text-sm font-semibold text-gray-800">
                                                    {{ $data->nama_lengkap }}
                                                </p>
                                                <p class="text-xs text-gray-500">{{ $data->create_at }}</p>
                                            </div>
                                        </div>
                                        <!-- Tombol Ceklis -->
                                        @if (Auth::user()->role == 'admin')
                                            <button type="button" onclick="deleteKomentar('{{ $data->id }}')"
                                                class="relative group w-6 h-6 flex items-center justify-center bg-green-100 hover:bg-green-200 rounded-full transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span
                                                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                                    Telah Selesai
                                                </span>
                                            </button>
                                        @endif
                                    </div>
                                    <!-- Isi Komentar -->
                                    <p class="text-sm text-gray-800 mb-1">{{ $data->komentar }}</p>
                                </div>
                            @endforeach
                        @endif
                        <script>
                            function deleteKomentar(komentar_id) {
                                $.ajax({
                                    url: `/delete-komentar-pengabdian/${komentar_id}`,
                                    type: 'GET',
                                    data: {
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil',
                                            text: 'Komentar berhasil dihapus!',
                                        }).then(() => {
                                            location.reload();
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'Terjadi kesalahan saat menghapus komentar!',
                                        });
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>

                <div class="bg-white w-full p-4 shadow rounded overflow-y-auto h-[50%]">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-900 font-semibold">Kolaborasi</p>

                        <!-- Tombol tambah kolaborasi -->
                        <div class="relative group">
                            @if (Auth::user()->role == 'dosen')
                                <button id="dropdownKolaborasiButton" data-dropdown-toggle="dropdownKolaborasi"
                                    class="flex items-center justify-center w-10 h-10 transition">
                                    <svg class="w-6 h-6 text-[#5F9AB8] group-hover:text-[#457B9D] transition-colors"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif

                            <!-- Tooltip -->
                            <span
                                class="absolute z-50 top-full left-1/2 transform -translate-x-1/2 mt-2 bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                Tambah Kolaborasi
                            </span>

                            <!-- Dropdown tambah kolaborasi -->
                            <div id="dropdownKolaborasi"
                                class="z-50 hidden w-75 sm:w-72 md:w-75 absolute right-0 mt-3 bg-white rounded-lg border border-gray-200 shadow-lg p-4 space-y-4">
                                <!-- User Kolaborasi -->
                                @foreach ($dosen as $data)
                                    <div class="flex items-center gap-4 w-full p-4 bg-gray-100 rounded-lg shadow-lg">
                                        <!-- Foto Profil -->
                                        <img src="{{ asset($data->foto_profile) }}" alt="User"
                                            class="w-10 h-10 rounded-full object-cover">
                                        <div class="flex justify-between w-full items-center">
                                            <p class="text-gray-900 font-medium text-sm">{{ $data->nama_lengkap }}</p>
                                            <!-- Button Tambah -->
                                            @if (Auth::user()->role == 'dosen')
                                                <button type="button"
                                                    onclick="addKolaborasi('{{ $data->id }}', '{{ $pengabdian->id }}')"
                                                    class="flex items-center justify-center w-10 h-10">
                                                    <svg class="w-5 h-5 text-[#48A6A7] hover:text-[#006A71] transition"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M5 12h14m-7 7V5" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <script>
                                    function addKolaborasi(dosen_id, pengabdian_id) {

                                        $.ajax({
                                            url: "{{ route('add.kolaborasi.pengabdian') }}",
                                            type: 'POST',
                                            data: {
                                                dosen_id: dosen_id,
                                                pengabdian_id: pengabdian_id,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Berhasil',
                                                    text: 'Kolaborasi berhasil ditambahkan!',
                                                }).then(() => {
                                                    location.reload();
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error',
                                                    text: 'Terjadi kesalahan saat menambahkan data!',
                                                });
                                            }
                                        });
                                    }

                                    function deleteKolaborasi(kolaborasi_id) {
                                        $.ajax({
                                            url: `/delete-kolaborasi-pengabdian/${kolaborasi_id}`,
                                            type: 'GET',
                                            data: {
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Berhasil',
                                                    text: 'Kolaborasi berhasil dihapus!',
                                                }).then(() => {
                                                    location.reload();
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error',
                                                    text: 'Terjadi kesalahan saat menghapus kolaborasi!',
                                                });
                                            }
                                        });
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <!-- User Kolaborasi -->
                        @if ($kolaborator->isEmpty())
                            <div class="text-center text-gray-500 font-medium p-4">
                                Anda belum menambahkan kolaborator.
                            </div>
                        @else
                            @foreach ($kolaborator as $data)
                                <div class="flex items-center gap-4 w-full p-4 bg-gray-100 rounded-lg shadow-lg">
                                    <!-- Foto Profil -->
                                    <img src="{{ asset($data->dosen->foto_profile) }}" alt="User"
                                        class="w-10 h-10 rounded-full object-cover">
                                    <div class="flex justify-between w-full items-center">
                                        <p class="text-gray-900 font-medium text-sm">{{ $data->dosen->nama_lengkap }}
                                        </p>
                                        @if (Auth::user()->role == 'dosen')
                                            <!-- Button Delete -->
                                            <button type="button" onclick="deleteKolaborasi('{{ $data->id }}')"
                                                class="relative group flex items-center justify-center w-10 h-10">
                                                <svg class="w-5 h-5 text-[#EF4444] group-hover:text-[#DC2626] transition"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H2a1 1 0 100 2h1v11a2 2 0 002 2h10a2 2 0 002-2V6h1a1 1 0 100-2h-3V3a1 1 0 00-1-1H6zm3 5a1 1 0 012 0v7a1 1 0 11-2 0V7zm-4 0a1 1 0 012 0v7a1 1 0 11-2 0V7zm8 0a1 1 0 012 0v7a1 1 0 11-2 0V7z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span
                                                    class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                                    Hapus Kolaborasi
                                                </span>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--Modal Unggah Bukti Pengabdian-->
    <div id="uploadBuktiPengabdianModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-[#006A71]">
                        Unggah Bukti Pengabdian
                    </h3>
                    <button type="button"
                        class="bg-transparent text-red-400 hover:bg-gray-100 hover:text-red-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="uploadBuktiPengabdianModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 max-h-96 overflow-y-auto">
                    <form class="space-y-4" action="#">
                        <div>
                            <label for="namaFile" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                File</label>
                            <input type="text" name="namaFile" id="namaFile"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nama file" required />
                            <p id="helpJudul" class="help is-hidden text-xs mt-2 text-red-400"></p>
                        </div>
                        <!-- Upload Bukti Pengabdian (Drag & Drop) -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Unggah Bukti Pengabdian</label>

                            <div id="drop-area"
                                class="flex flex-col items-center justify-center w-full p-6 border-2 border-dashed border-gray-300 rounded-lg bg-gray-100 hover:border-gray-400 cursor-pointer hover:bg-gray-200 transition">
                                <p class="text-sm text-gray-700 mt-4">Tarik dan letakkan gambar atau file di sini atau
                                    klik untuk unggah</p>
                                <input type="file" id="filePengabdian" multiple class="hidden"
                                    onchange="handleFiles(this.files)">
                                <button type="button" onclick="document.getElementById('filePengabdian').click()"
                                    class="mt-4 mb-6 text-white bg-[#48A6A7] hover:bg-[#006A71] font-medium rounded px-4 py-1 text-sm">
                                    Pilih File
                                </button>
                            </div>
                            <p id="helpFilePengabdian" class="help is-hidden text-xs mt-2 mb-4 text-red-400"></p>
                            <!-- Preview File -->
                            <div id="preview" class="mt-4 space-y-4"></div>
                        </div>

                        <script>
                            const dropArea = document.getElementById('drop-area');
                            const preview = document.getElementById('preview');

                            dropArea.addEventListener('dragover', (e) => {
                                e.preventDefault();
                                dropArea.classList.add('bg-gray-200');
                            });

                            dropArea.addEventListener('dragleave', () => {
                                dropArea.classList.remove('bg-gray-200');
                            });

                            dropArea.addEventListener('drop', (e) => {
                                e.preventDefault();
                                dropArea.classList.remove('bg-gray-200');
                                const files = e.dataTransfer.files;
                                handleFiles(files);
                            });

                            function handleFiles(files) {
                                for (const file of files) {
                                    const fileItem = document.createElement('div');
                                    fileItem.className = 'p-4 border rounded bg-white shadow-sm relative';

                                    const closeBtn = document.createElement('button');
                                    closeBtn.innerHTML = '×';
                                    closeBtn.className = 'absolute top-2 right-2 text-red-500 hover:text-red-700 text-xl font-bold';
                                    closeBtn.onclick = () => fileItem.remove();

                                    if (file.type.startsWith('image/')) {
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            fileItem.innerHTML = `
                                      <img src="${e.target.result}" class="object-cover rounded mb-2 border" />
                                      <p class="font-medium break-words">${file.name}</p>
                                      <p class="text-sm text-gray-600">Type: ${file.type || 'Unknown'}</p>
                                      <p class="text-sm text-gray-600">Size: ${(file.size / 1024).toFixed(2)} KB</p>
                                    `;
                                            fileItem.appendChild(closeBtn);
                                            preview.appendChild(fileItem);
                                        };
                                        reader.readAsDataURL(file);
                                    } else {
                                        fileItem.innerHTML = `
                                    <div class="flex items-center gap-2">
                                      <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 2a1 1 0 00-1 1v1H5a1 1 0 00-1 1v10a2 2 0 002 2h6a2 2 0 002-2V5a1 1 0 00-1-1h-2V3a1 1 0 00-1-1H8z" />
                                      </svg>
                                      <div>
                                        <p class="font-medium break-words">${file.name}</p>
                                        <p class="text-sm text-gray-600">Type: ${file.type || 'Unknown'}</p>
                                        <p class="text-sm text-gray-600">Size: ${(file.size / 1024).toFixed(2)} KB</p>
                                      </div>
                                    </div>
                                  `;
                                        fileItem.appendChild(closeBtn);
                                        preview.appendChild(fileItem);
                                    }
                                }
                            }
                        </script>

                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b gap-4">
                    <button type="button" onclick="uploadFilePengabdian('{{ $pengabdian->id }}')"
                        class="bg-[#5F9AB8] border-2 border-[#457B9D] hover:bg-white text-white hover:text-[#457B9D] font-medium py-2 px-4 rounded-lg transition duration-300">
                        Unggah Bukti Pengabdian
                    </button>
                    <button data-modal-hide="uploadBuktiPengabdianModal"
                        class="bg-[#EF4444] border-2 border-[#DC2626] hover:bg-white text-white hover:text-[#DC2626] font-medium py-2 px-4 rounded-lg transition duration-300">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
