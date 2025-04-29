<x-header></x-header>

<script>
    
</script>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar></x-navbar>

        <!-- Tabel Data Dosen -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mt-8">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10 mt-3">
                <!-- Tombol Tambah Dosen -->
                <button data-modal-target="tambahDosenModal" data-modal-toggle="tambahDosenModal" type="button"
                    class="flex items-center gap-2 bg-[#48A6A7] text-white px-4 py-2 rounded-lg hover:bg-[#006A71] transition duration-300 w-full md:w-auto">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Data Dosen
                </button>
            
                <!-- Bagian Pencarian dan Ekspor CSV -->
                <div class="flex flex-row  items-stretch sm:items-center gap-4 w-full md:w-auto">
                    <!-- Input Pencarian -->
                    <div class="relative w-full sm:w-64">
                        <input type="text" placeholder="Cari Dosen"
                            class="w-full border border-gray-400 rounded-lg px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-[#48A6A7]" />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-5 h-5 text-[#006A71]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M12.9 14.32a8 8 0 111.414-1.414l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387zM14 8a6 6 0 11-12 0 6 6 0 0112 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
            
                    <!-- Tombol Ekspor CSV -->
                    <button
                        class="flex items-center gap-2 bg-[#5F9AB8] text-white px-4 py-2 rounded-lg hover:bg-[#457B9D] transition duration-300 w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                        </svg>
                        CSV
                    </button>
                </div>
            </div>
            

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-[#9ACBD0]">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">NIDN</th>
                            <th scope="col" class="px-4 py-3">Program Studi</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <td class="px-4 py-3 font-medium text-gray-900">Dr. Rina Wijaya</td>
                            <td class="px-4 py-3">19800531</td>
                            <td class="px-4 py-3">Teknik Informatika</td>
                            <td class="px-4 py-3 text-green-600">Aktif</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-start gap-3">
                                    <!-- Button View -->
                                    <button class="relative group flex items-center justify-center w-10 h-10">
                                        <svg class="w-5 h-5 text-[#5F9AB8] group-hover:text-[#457B9D] transition"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 3C5 3 1 8 1 8s4 5 9 5 9-5 9-5-4-5-9-5zm0 8a3 3 0 110-6 3 3 0 010 6z" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-gray-100 text-gray-600 text-xs rounded py-1 px-2 whitespace-nowrap">
                                            Lihat
                                        </span>
                                    </button>

                                    <!-- Button Delete -->
                                    <button class="relative group flex items-center justify-center w-10 h-10">
                                        <svg class="w-5 h-5 text-[#EF4444] group-hover:text-[#DC2626] transition"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H2a1 1 0 100 2h1v11a2 2 0 002 2h10a2 2 0 002-2V6h1a1 1 0 100-2h-3V3a1 1 0 00-1-1H6zm3 5a1 1 0 012 0v7a1 1 0 11-2 0V7zm-4 0a1 1 0 012 0v7a1 1 0 11-2 0V7zm8 0a1 1 0 012 0v7a1 1 0 11-2 0V7z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-gray-100 text-gray-600 text-xs rounded py-1 px-2 whitespace-nowrap">
                                            Hapus
                                        </span>
                                    </button>
                                </div>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!--Modal Tambah Dosen-->
    <div id="tambahDosenModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-[#006A71]">
                        Tambah Data Dosen
                    </h3>
                    <button type="button"
                        class="bg-transparent text-red-400 hover:bg-gray-100 hover:text-red-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="tambahDosenModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 max-h-96 overflow-y-auto">
                    <form class="space-y-4" action="#">
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nama lengkap beserta gelar" required />
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nama lengkap beserta gelar" required />
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nama lengkap beserta gelar" required />
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nama lengkap beserta gelar" required />
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nama lengkap beserta gelar" required />
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <button data-modal-hide="tambahDosenModal" type="button"
                        class="text-white hover:text-[#457B9D] bg-[#5F9AB8] hover:bg-white focus:ring-4 focus:outline-none border-2 border-[#5F9AB8] hover:border-[#457B9D] focus:ring-[#457B9D] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Tambah Dosen</button>
                    <button data-modal-hide="tambahDosenModal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-[#DC2626] focus:outline-none bg-white hover:bg-[#EF4444] rounded-lg border-2 border-[#DC2626] hover:border-[#EF4444] hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
