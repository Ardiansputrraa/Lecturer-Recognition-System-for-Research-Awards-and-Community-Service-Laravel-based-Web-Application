<x-header></x-header>

<script></script>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar title="Dashboard" description="Pantau dan kelola data dosen secara efisien" />

        <!-- Tabel Data Pengabdian Dosen -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mt-8">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 mt-4">
                <!-- Tombol Tambah Pengabdian Dosen -->
                <button data-modal-target="tambahPengabdianModal" data-modal-toggle="tambahPengabdianModal" type="button"
                    class="flex items-center gap-2 bg-[#48A6A7] text-white px-4 py-2 rounded-lg hover:bg-[#006A71] transition duration-300 w-full md:w-auto">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Pengabdian Dosen
                </button>

                <!-- Bagian Pencarian dan Ekspor CSV -->
                <div class="flex flex-row  items-stretch sm:items-center gap-4 w-full md:w-auto">
                    <!-- Input Pencarian -->
                    <div class="relative w-full sm:w-64">
                        <input type="text" placeholder="Cari Pengabdian Dosen"
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

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-12">
                <div class="text-sm font-medium text-center text-gray-700 border-b-2 border-[#457B9D]">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="me-2">
                            <a href="detail-pengabdian-dosen"
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-[#457B9D] hover:border-b-3 hover:border-[#457B9D]">Semua
                                Status</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-[#457B9D] hover:border-b-3 hover:border-[#457B9D]">Draft</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-[#457B9D] hover:border-b-3 hover:border-[#457B9D]">Diajukan</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-[#457B9D] hover:border-b-3 hover:border-[#457B9D]">Ditolak</a>
                        </li>
                        <li class="me-2">
                            <a href="#"
                                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-[#457B9D] hover:border-b-3 hover:border-[#457B9D]">Diterima</a>
                        </li>
                    </ul>
                </div>

                <!-- Dropdown Tahun Pengabdian Dosen -->
                <div class="w-full max-w-xs">
                    <select id="tahunPengabdian" name="tahunPengabdian"
                        class="mt-1 block w-full px-4 py-2 rounded-md border-2 border-[#48A6A7] focus:border-[#006A71] focus:ring-[#006A71] sm:text-sm">
                        <option value="">Pilih Tahun Pengabdian</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <!-- Tambahkan tahun lain sesuai kebutuhan -->
                    </select>
                </div>

            </div>

            <!-- Tabel Pengabdian Dosen -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-[#9ACBD0]">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-4 py-3">Jabatan dalam Pengabdian</th>
                            <th scope="col" class="px-4 py-3">Tahun Pengabdian</th>
                            <th scope="col" class="px-4 py-3">Besaran Dana</th>
                            <th scope="col" class="px-4 py-3">Sumber Dana</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <td class="px-4 py-3 font-medium text-gray-900">Dr. Rina Wijaya</td>
                            <td class="px-4 py-3">Ketua</td>
                            <td class="px-4 py-3">2025</td>
                            <td class="px-4 py-3">Rp. 58.500.000</td>
                            <td class="px-4 py-3">UIN Maulana Malik Ibrahim Malang</td>
                            <td class="px-4 py-3 text-[#DC2626]">Ditolak</td>
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
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
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
                                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                            Hapus
                                        </span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination Table -->
                <div class="flex items-center justify-between mt-8">
                    <span class="text-sm text-gray-700">Menampilkan 1 dari 10 data</span>
                    <nav aria-label="Page navigation example">
                        <ul class="flex items-center -space-x-px h-8 text-sm gap-4">
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-700 bg-gray-100 border border-gray-400 rounded-s-lg hover:bg-gray-100 hover:text-[#006A71] hover:border-[#006A71]">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-gray-100 border border-gray-400 hover:bg-gray-100 hover:text-[#006A71] hover:border-[#006A71]">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-gray-100 border border-gray-400 hover:bg-gray-100 hover:text-[#006A71] hover:border-[#006A71]">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-white border border-[#48A6A7] bg-[#48A6A7]">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-gray-100 border border-gray-400 hover:bg-gray-100 hover:text-[#006A71] hover:border-[#006A71]">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-gray-100 border border-gray-400 hover:bg-gray-100 hover:text-[#006A71] hover:border-[#006A71]">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-700 bg-gray-100 border border-gray-400 rounded-e-lg hover:bg-gray-100 hover:text-[#006A71] hover:border-[#006A71]">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>

    </main>

    <!--Modal Tambah Dosen-->
    <div id="tambahPengabdianModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-[#006A71]">
                        Tambah Pengabdian Dosen
                    </h3>
                    <button type="button"
                        class="bg-transparent text-red-400 hover:bg-gray-100 hover:text-red-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="tambahPengabdianModal">
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
                            <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">Jabatan dalam
                                Pengabdian</label>
                            <input type="text" name="jabatan" id="jabatan"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukkan jabatan dalam pengabdian" required />
                        </div>
                        <div>
                            <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun
                                Pengabdian</label>
                            <input type="number" name="tahun" id="tahun"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukkan tahun pengabdian" min="2000" max="2025" required />
                        </div>
                        <div>
                            <label for="dana" class="block mb-2 text-sm font-medium text-gray-900">Besaran Dana
                                Pengabdian</label>
                            <input type="number" name="dana" id="dana"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukkan dana pengabdian" required />
                        </div>
                        <div>
                            <label for="sumber" class="block mb-2 text-sm font-medium text-gray-900">Sumber Dana
                                Pengabdian</label>
                            <textarea name="sumber" id="sumber"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5 h-32 resize-none"
                                placeholder="Masukkan sumber dana pengabdian" required></textarea>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b gap-4">
                    <button
                        class="bg-[#5F9AB8] border-2 border-[#457B9D] hover:bg-white text-white hover:text-[#457B9D] font-medium py-2 px-4 rounded-lg transition duration-300">
                        Tambah Pengabdian
                    </button>
                    <button data-modal-hide="tambahPengabdianModal"
                        class="bg-[#EF4444] border-2 border-[#DC2626] hover:bg-white text-white hover:text-[#DC2626] font-medium py-2 px-4 rounded-lg transition duration-300">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
