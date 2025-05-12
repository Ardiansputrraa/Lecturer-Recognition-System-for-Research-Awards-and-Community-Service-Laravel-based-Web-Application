<x-header></x-header>

<script></script>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar></x-navbar>

        <div class="flex flex-col lg:flex-row gap-4 w-full h-[700px]">
            <!-- Layout 70% -->
            <div class="bg-white w-full lg:w-[70%] p-6 shadow rounded overflow-y-auto h-full">
                <div class="flex items-center justify-between mb-4">
                    <h1 class="text-xl font-semibold text-gray-900">Detail Pengabdian</h1>
                    <!-- Tombol Edit Pengabdian -->
                    <button data-modal-target="uploadBuktiPengabdianModal" data-modal-toggle="uploadBuktiPengabdianModal"
                        type="button"
                        class="flex items-center gap-2 text-[#48A6A7] px-4 py-2 hover:text-[#006A71] transition duration-300 w-full md:w-auto hover:underline">
                        <!-- Icon Edit (Pencil) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M17.414 2.586a2 2 0 0 0-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 0 0 0-2.828zM4 15h12v2H4v-2z" />
                        </svg>
                        Edit Pengabdian
                    </button>
                </div>
                <div class="mt-6">
                    <form class="space-y-4" action="#">
                        <!-- Baris 1 -->
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="w-full md:w-1/2">
                                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">Jabatan dalam
                                    Pengabdian</label>
                                <input type="text" name="jabatan" id="jabatan"
                                    class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                    placeholder="Masukkan jabatan dalam pengabdian" value="Ketua" required disabled />
                            </div>
                            <div class="w-full md:w-1/2">
                                <label for="dana" class="block mb-2 text-sm font-medium text-gray-900">Besaran Dana
                                    Pengabdian</label>
                                <input type="text" name="dana" id="dana"
                                    class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                    placeholder="Masukkan dana pengabdian" value="Rp. 58.500.000" required disabled />
                            </div>
                        </div>

                        <!-- Baris 2 -->
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="w-full md:w-1/2">
                                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul
                                    Pengabdian</label>
                                <textarea type="text" name="judul" id="judul"
                                    class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5 h-32 resize-none"
                                    placeholder="Masukkan judul pengabdian" required disabled>The Integration of Popular Culture in Islamic Dakwah for Gen Z; The Case Study of Ustadz Hanan Attaki and Ustadzah Oki Setiana Dewi’s Dakwah</textarea>
                            </div>
                            <div class="w-full md:w-1/2">
                                <label for="sumber" class="block mb-2 text-sm font-medium text-gray-900">Sumber Dana
                                    Pengabdian</label>
                                <textarea name="sumber" id="sumber"
                                    class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5 h-32 resize-none"
                                    placeholder="Masukkan sumber dana pengabdian" required disabled>UIN Maulana Malik Ibrahim Malang</textarea>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-12 border-t-2 border-gray-300">
                    <div class="flex items-center justify-between mb-4 mt-6">
                        <h1 class="text-xl font-semibold text-gray-900">Bukti Pengabdian</h1>
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
                    </div>

                    <!-- Bukti Pengabdian -->
                    <div class="mt-4 space-y-5">
                        <p class="text-sm text-gray-500">Unggah bukti pengabdian yang telah dilakukan. Pastikan file
                            yang
                            diunggah sesuai dengan format yang ditentukan.</p>

                        <!-- Kartu Bukti Pengabdian -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <!-- Card 1 -->
                            <div
                                class="bg-white rounded-lg shadow p-4 flex flex-col items-center text-center border-2 border-gray-100 shawdow-lg">
                                <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mb-4">
                                    <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" alt="PDF Icon"
                                        class="w-12 h-12">
                                </div>
                                <div class="flex flex-col items-start">
                                    <h3 class="text-sm text-gray-800 mb-4 text-start    ">surat tugas bersama di
                                        kabupaten indonesia</h3>
                                    <p class="text-sm text-gray-600">Type: PDF</p>
                                    <p class="text-sm text-gray-600 mb-4">Size: 7045525 KB</p>
                                </div>

                                <div class="flex gap-4">
                                    <button class="relative group flex items-center justify-center w-10 h-10">
                                        <svg class="w-5 h-5 text-[#48A6A7] group-hover:text-[#006A71] transition"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                            Edit
                                        </span>
                                    </button>

                                    <button class="relative group flex items-center justify-center w-10 h-10">
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

                                    <button class="relative group flex items-center justify-center w-10 h-10">
                                        <svg class="w-5 h-5 text-[#5F9AB8] group-hover:text-[#457B9D] transition"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                            Download
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <!-- Card 1 -->
                            <div
                                class="bg-white rounded-lg shadow p-4 flex flex-col items-center text-center border-2 border-gray-100 shawdow-lg">
                                <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mb-4">
                                    <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" alt="PDF Icon"
                                        class="w-12 h-12">
                                </div>
                                <div class="flex flex-col items-start">
                                    <h3 class="text-sm text-gray-800 mb-4 text-start    ">surat tugas bersama di
                                        kabupaten indonesia</h3>
                                    <p class="text-sm text-gray-600">Type: PDF</p>
                                    <p class="text-sm text-gray-600 mb-4">Size: 7045525 KB</p>
                                </div>

                                <div class="flex gap-4">
                                    <button class="relative group flex items-center justify-center w-10 h-10">
                                        <svg class="w-5 h-5 text-[#48A6A7] group-hover:text-[#006A71] transition"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                            Edit
                                        </span>
                                    </button>

                                    <button class="relative group flex items-center justify-center w-10 h-10">
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

                                    <button class="relative group flex items-center justify-center w-10 h-10">
                                        <svg class="w-5 h-5 text-[#5F9AB8] group-hover:text-[#457B9D] transition"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                            Download
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <!-- Card 1 -->
                            <div
                                class="bg-white rounded-lg shadow p-4 flex flex-col items-center text-center border-2 border-gray-100 shawdow-lg">
                                <div class="bg-gray-100 rounded-full w-20 h-20 flex items-center justify-center mb-4">
                                    <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" alt="PDF Icon"
                                        class="w-12 h-12">
                                </div>
                                <div class="flex flex-col items-start">
                                    <h3 class="text-sm text-gray-800 mb-4 text-start    ">surat tugas bersama di
                                        kabupaten indonesia</h3>
                                    <p class="text-sm text-gray-600">Type: PDF</p>
                                    <p class="text-sm text-gray-600 mb-4">Size: 7045525 KB</p>
                                </div>

                                <div class="flex gap-4">
                                    <button class="relative group flex items-center justify-center w-10 h-10">
                                        <svg class="w-5 h-5 text-[#48A6A7] group-hover:text-[#006A71] transition"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                            Edit
                                        </span>
                                    </button>

                                    <button class="relative group flex items-center justify-center w-10 h-10">
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

                                    <button class="relative group flex items-center justify-center w-10 h-10">
                                        <svg class="w-5 h-5 text-[#5F9AB8] group-hover:text-[#457B9D] transition"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                            Download
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <!-- Tambahkan card lainnya jika perlu -->

                        </div>

                        <div class="flex justify-end">
                            <div class="flex items-center justify-between gap-4 mt-4 mb-4">
                                <button
                                    class="bg-[#5F9AB8] border-2 border-[#457B9D] hover:bg-white text-white hover:text-[#457B9D] font-medium py-2 px-4 rounded-lg transition duration-300">
                                    Simpan Draft
                                </button>
                                <button
                                    class="bg-[#48A6A7] border-2 border-[#006A71] hover:bg-white text-white hover:text-[#006A71] font-medium py-2 px-4 rounded-lg transition duration-300">
                                    Ajukan Draft
                                </button>
                            </div>
                        </div>
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
                            <!-- Tombol utama -->
                            <button id="dropdownKomentarButton" data-dropdown-toggle="dropdownKomentar"
                                class="flex items-center justify-center w-10 h-10 transition">
                                <svg class="w-6 h-6 text-[#5F9AB8] group-hover:text-[#457B9D] transition-colors"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                            </button>

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
                                    <button type="submit"
                                        class="w-full text-white bg-[#5F9AB8] hover:bg-[#457B9D] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center transition">
                                        Kirim Komentar
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="space-y-2">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-lg max-w-md w-full">
                            <!-- Profil, Nama & Tombol -->
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <!-- Foto Profil -->
                                    <img src="assets/images/user.png" alt="User"
                                        class="w-10 h-10 rounded-full object-cover">

                                    <!-- Nama dan Tanggal -->
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">Fani Muh Ardian Saputra</p>
                                        <p class="text-xs text-gray-500">4 Okt 2022</p>
                                    </div>
                                </div>
                                <!-- Tombol Ceklis -->
                                <button
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
                            </div>
                            <!-- Isi Komentar -->
                            <p class="text-sm text-gray-800 mb-1">Hapus baris yang tidak memiliki konten dan rapihkan
                                formatnya!</p>
                        </div>

                    </div>
                </div>

                <div class="bg-white w-full p-4 shadow rounded overflow-y-auto h-[50%]">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-900 font-semibold">Kolaborasi</p>

                        <!-- Tombol tambah kolaborasi -->
                        <div class="relative group">
                            <button id="dropdownKolaborasiButton" data-dropdown-toggle="dropdownKolaborasi"
                                class="flex items-center justify-center w-10 h-10 transition">
                                <svg class="w-6 h-6 text-[#5F9AB8] group-hover:text-[#457B9D] transition-colors"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Tooltip -->
                            <span
                                class="absolute z-50 top-full left-1/2 transform -translate-x-1/2 mt-2 bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                Tambah Kolaborasi
                            </span>

                            <!-- Dropdown tambah kolaborasi -->
                            <div id="dropdownKolaborasi"
                                class="z-50 hidden w-75 sm:w-72 md:w-75 absolute right-0 mt-3 bg-white rounded-lg border border-gray-200 shadow-lg p-4 space-y-4">
                                <!-- User Kolaborasi -->
                                <div class="flex items-center gap-4 w-full p-4 bg-gray-100 rounded-lg shadow-lg">
                                    <!-- Foto Profil -->
                                    <img src="assets/images/user.png" alt="User"
                                        class="w-10 h-10 rounded-full object-cover">
                                    <div class="flex justify-between w-full items-center">
                                        <p class="text-gray-900 font-medium text-sm">Drs, Dr, Fani Muh Ardian S.kom,
                                            M.M</p>
                                        <!-- Button Tambah -->
                                        <button class="flex items-center justify-center w-10 h-10">
                                            <svg class="w-5 h-5 text-[#48A6A7] hover:text-[#006A71] transition"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- User Kolaborasi -->
                                <div class="flex items-center gap-4 w-full p-4 bg-gray-100 rounded-lg shadow-lg">
                                    <!-- Foto Profil -->
                                    <img src="assets/images/user.png" alt="User"
                                        class="w-10 h-10 rounded-full object-cover">
                                    <div class="flex justify-between w-full items-center">
                                        <p class="text-gray-900 font-medium text-sm">Drs, Dr, Fani Muh Ardian S.kom,
                                            M.M</p>
                                        <!-- Button Tambah -->
                                        <button class="flex items-center justify-center w-10 h-10">
                                            <svg class="w-5 h-5 text-[#48A6A7] hover:text-[#006A71] transition"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="space-y-2">
                        <!-- User Kolaborasi -->
                        <div class="flex items-center gap-4 w-full p-4 bg-gray-100 rounded-lg shadow-lg">
                            <!-- Foto Profil -->
                            <img src="assets/images/user.png" alt="User"
                                class="w-10 h-10 rounded-full object-cover">
                            <div class="flex justify-between w-full items-center">
                                <p class="text-gray-900 font-medium text-sm">Drs, Dr, Fani Muh Ardian S.kom, M.M</p>
                                <!-- Button Delete -->
                                <button class="relative group flex items-center justify-center w-10 h-10">
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
                            </div>
                        </div>

                        <!-- User Kolaborasi -->
                        <div class="flex items-center gap-4 w-full p-4 bg-gray-100 rounded-lg shadow-lg">
                            <!-- Foto Profil -->
                            <img src="assets/images/user.png" alt="User"
                                class="w-10 h-10 rounded-full object-cover">
                            <div class="flex justify-between w-full items-center">
                                <p class="text-gray-900 font-medium text-sm">Drs, Dr, Fani Muh Ardian S.kom, M.M</p>
                                <!-- Button Delete -->
                                <button class="relative group flex items-center justify-center w-10 h-10">
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
                            </div>
                        </div>

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
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                File</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nama file" required />
                        </div>
                        <!-- Upload Bukti Pengabdian (Drag & Drop) -->
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Unggah Bukti Pengabdian</label>
                          
                            <div id="drop-area"
                              class="flex flex-col items-center justify-center w-full p-6 border-2 border-dashed border-gray-300 rounded-lg bg-gray-100 hover:border-gray-400 cursor-pointer hover:bg-gray-200 transition">
                              <p class="text-sm text-gray-700 mt-4">Tarik dan letakkan gambar atau file di sini atau klik untuk unggah</p>
                              <input type="file" id="fileElem" multiple class="hidden" onchange="handleFiles(this.files)">
                              <button type="button" onclick="document.getElementById('fileElem').click()"
                                class="mt-4 mb-6 text-white bg-[#48A6A7] hover:bg-[#006A71] font-medium rounded px-4 py-1 text-sm">
                                Pilih File
                              </button>
                            </div>
                          
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
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="uploadBuktiPengabdianModal" type="button"
                        class="text-white hover:text-[#457B9D] bg-[#5F9AB8] hover:bg-white focus:ring-4 focus:outline-none border-2 border-[#5F9AB8] hover:border-[#457B9D] focus:ring-[#457B9D] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Unggah Bukti Pengabdian</button>
                    <button data-modal-hide="uploadBuktiPengabdianModal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-[#DC2626] focus:outline-none bg-white hover:bg-[#EF4444] rounded-lg border-2 border-[#DC2626] hover:border-[#EF4444] hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
