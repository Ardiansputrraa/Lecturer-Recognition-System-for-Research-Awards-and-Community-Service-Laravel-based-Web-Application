<x-header></x-header>

<script></script>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar></x-navbar>

        <div class="flex flex-col lg:flex-row gap-4 w-full h-[500px]">
            <!-- Layout 70% -->
            <div class="bg-white w-full lg:w-[60%] p-4 shadow rounded overflow-y-auto h-full">
                <p class="text-gray-700 mb-2">Konten 70%</p>
                <!-- Contoh konten panjang -->
                <div class="space-y-2">
                    <p>Lorem ipsum dolor sit amet...</p>
                    <p>Lorem ipsum dolor sit amet...</p>
                    <p>Lorem ipsum dolor sit amet...</p>
                    <p>Lorem ipsum dolor sit amet...</p>
                    <p>Lorem ipsum dolor sit amet...</p>
                    <p>Lorem ipsum dolor sit amet...</p>
                    <p>Lorem ipsum dolor sit amet...</p>
                    <p>Lorem ipsum dolor sit amet...</p>
                </div>
            </div>

            <!-- Layout 30% (atas-bawah) -->
            <div class="w-full lg:w-[40%] flex flex-col gap-4 h-full">
                <div class="bg-white w-full p-4 shadow rounded overflow-y-auto h-[50%]">
                    <p class="text-gray-900 mb-4 font-semibold">Komentar</p>
                    <!-- Contoh konten panjang -->
                    <div class="space-y-2">
                        <div class="bg-gray-100 p-4 rounded-lg shadow-lg max-w-md w-full">
                            <!-- Profil, Nama & Tombol -->
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <!-- Foto Profil -->
                                    <img src="assets/images/user.png" alt="User" class="w-10 h-10 rounded-full object-cover">
                        
                                    <!-- Nama dan Tanggal -->
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">Fani Muh Ardian Saputra</p>
                                        <p class="text-xs text-gray-500">4 Okt 2022</p>
                                    </div>
                                </div>
                                <!-- Tombol Ceklis -->
                                <button class="w-8 h-8 flex items-center justify-center bg-green-100 hover:bg-green-200 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div> 
                            <!-- Isi Komentar -->
                            <p class="text-sm text-gray-800 mb-1">Hapus baris yang tidak memiliki konten dan rapihkan formatnya!</p>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow-lg max-w-md w-full">
                            <!-- Profil, Nama & Tombol -->
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <!-- Foto Profil -->
                                    <img src="assets/images/user.png" alt="User" class="w-10 h-10 rounded-full object-cover">
                        
                                    <!-- Nama dan Tanggal -->
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">Fani Muh Ardian Saputra</p>
                                        <p class="text-xs text-gray-500">4 Okt 2022</p>
                                    </div>
                                </div>
                                <!-- Tombol Ceklis -->
                                <button class="w-8 h-8 flex items-center justify-center bg-green-100 hover:bg-green-200 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div> 
                            <!-- Isi Komentar -->
                            <p class="text-sm text-gray-800 mb-1">Hapus baris yang tidak memiliki konten dan rapihkan formatnya!</p>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow-lg max-w-md w-full">
                            <!-- Profil, Nama & Tombol -->
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <!-- Foto Profil -->
                                    <img src="assets/images/user.png" alt="User" class="w-10 h-10 rounded-full object-cover">
                        
                                    <!-- Nama dan Tanggal -->
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">Fani Muh Ardian Saputra</p>
                                        <p class="text-xs text-gray-500">4 Okt 2022</p>
                                    </div>
                                </div>
                                <!-- Tombol Ceklis -->
                                <button class="w-8 h-8 flex items-center justify-center bg-green-100 hover:bg-green-200 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div> 
                            <!-- Isi Komentar -->
                            <p class="text-sm text-gray-800 mb-1">Hapus baris yang tidak memiliki konten dan rapihkan formatnya!</p>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-lg shadow-lg max-w-md w-full">
                            <!-- Profil, Nama & Tombol -->
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <!-- Foto Profil -->
                                    <img src="assets/images/user.png" alt="User" class="w-10 h-10 rounded-full object-cover">
                        
                                    <!-- Nama dan Tanggal -->
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800">Fani Muh Ardian Saputra</p>
                                        <p class="text-xs text-gray-500">4 Okt 2022</p>
                                    </div>
                                </div>
                                <!-- Tombol Ceklis -->
                                <button class="w-8 h-8 flex items-center justify-center bg-green-100 hover:bg-green-200 rounded-full transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586 4.707 9.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div> 
                            <!-- Isi Komentar -->
                            <p class="text-sm text-gray-800 mb-1">Hapus baris yang tidak memiliki konten dan rapihkan formatnya!</p>
                        </div>

                    </div>
                </div>

                <div class="bg-white w-full p-4 shadow rounded overflow-y-auto h-[50%]">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-gray-900 font-semibold">Kolaborasi</p>

                        <!-- Tombol dengan tooltip -->
                        <div class="relative group">
                            <button class="flex items-center justify-center w-10 h-10 transition">
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
</body>

</html>
