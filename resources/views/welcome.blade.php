<x-header></x-header>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar></x-navbar>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6 mt-4">
            <!-- Cards Section -->
            <div class="grid grid-cols-2 gap-4 lg:col-span-2">
                <!-- Card 1 -->
                <a href="#"
                    class="block bg-[#48A6A7] text-white p-5 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-102 transition-all duration-300 transform relative group">

                    <!-- Link Hover Title -->
                    <span
                        class="absolute top-3 right-4 text-sm text-white underline opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Lihat selengkapnya
                    </span>

                    <div class="flex items-center space-x-3">
                        <div class="bg-white text-gray-900 p-2 rounded-full">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-3xl font-bold">357</h3>
                        <p class="text-sm">Dosen Aktif</p>
                    </div>
                </a>

                <!-- Card 2 -->
                <a href="#"
                    class="block bg-white text-[#006A71] p-5 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-102 transition-all duration-300 transform relative group">

                    <!-- Link Hover Title -->
                    <span
                        class="absolute top-3 right-4 text-sm text-[#006A71] underline opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Lihat selengkapnya
                    </span>

                    <div class="flex items-center space-x-3">
                        <div class="bg-[#006A71] text-white p-2 rounded-full">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm.5 5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm0 5c.47 0 .917-.092 1.326-.26l1.967 1.967a1 1 0 0 0 1.414-1.414l-1.817-1.818A3.5 3.5 0 1 0 11.5 17Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-3xl font-bold">357</h3>
                        <p class="text-sm">Penelitian Dosen Aktif</p>
                    </div>
                </a>

                <!-- Card 3 -->
                <a href="#"
                    class="block bg-white text-[#006A71] p-5 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-102 transition-all duration-300 transform relative group">

                    <!-- Link Hover Title -->
                    <span
                        class="absolute top-3 right-4 text-sm text-[#006A71] underline opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Lihat selengkapnya
                    </span>

                    <div class="flex items-center space-x-3">
                        <div class="bg-[#006A71] text-white p-2 rounded-full">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11 9a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" />
                                <path fill-rule="evenodd"
                                    d="M9.896 3.051a2.681 2.681 0 0 1 4.208 0c.147.186.38.282.615.255a2.681 2.681 0 0 1 2.976 2.975.681.681 0 0 0 .254.615 2.681 2.681 0 0 1 0 4.208.682.682 0 0 0-.254.615 2.681 2.681 0 0 1-2.976 2.976.681.681 0 0 0-.615.254 2.682 2.682 0 0 1-4.208 0 .681.681 0 0 0-.614-.255 2.681 2.681 0 0 1-2.976-2.975.681.681 0 0 0-.255-.615 2.681 2.681 0 0 1 0-4.208.681.681 0 0 0 .255-.615 2.681 2.681 0 0 1 2.976-2.975.681.681 0 0 0 .614-.255ZM12 6a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M5.395 15.055 4.07 19a1 1 0 0 0 1.264 1.267l1.95-.65 1.144 1.707A1 1 0 0 0 10.2 21.1l1.12-3.18a4.641 4.641 0 0 1-2.515-1.208 4.667 4.667 0 0 1-3.411-1.656Zm7.269 2.867 1.12 3.177a1 1 0 0 0 1.773.224l1.144-1.707 1.95.65A1 1 0 0 0 19.915 19l-1.32-3.93a4.667 4.667 0 0 1-3.4 1.642 4.643 4.643 0 0 1-2.53 1.21Z" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-3xl font-bold">357</h3>
                        <p class="text-sm">Penghargaan Dosen Aktif</p>
                    </div>
                </a>

                <!-- Card 4 -->
                <a href="#"
                    class="block bg-white text-[#006A71] p-5 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-102 transition-all duration-300 transform relative group">

                    <!-- Link Hover Title -->
                    <span
                        class="absolute top-3 right-4 text-sm text-[#006A71] underline opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Lihat selengkapnya
                    </span>

                    <div class="flex items-center space-x-3">
                        <div class="bg-[#006A71] text-white p-2 rounded-full">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-3xl font-bold">357</h3>
                        <p class="text-sm">Pengabdian Dosen Aktif</p>
                    </div>
                </a>

            </div>

            <!-- Review Panel -->
            <div class="bg-white p-6 rounded-2xl shadow-lg">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Pengajuan Ditolak</h2>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm">
                            <span>Penelitian</span>
                            <span>80%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-[#F4A261] h-2 rounded-full" style="width: 80%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span>Penghargaan</span>
                            <span>17%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-[#F4A261] h-2 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span>Pengabdian</span>
                            <span>3%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-[#F4A261] h-2 rounded-full" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mt-6">
                    Berikut adalah statistik pengajuan yang ditolak, dalam kategori penelitian, penghargaan, dan
                    pengabdian.
                    <br> Anda dapat melihat detailnya pada halaman masing-masing kategori.
                </p>
            </div>
        </div>

        <!-- Grafik Rekognisi Dosen -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 mt-4">
            <!-- Penelitian -->
            <div class="bg-white p-4 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold mb-2 text-center">Rekognisi Penelitian</h3>
                <canvas id="chartPenelitian" class="w-10"></canvas>
            </div>

            <!-- Penghargaan -->
            <div class="bg-white p-4 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold mb-2 text-center">Rekognisi Penghargaan</h3>
                <canvas id="chartPenghargaan"></canvas>
            </div>

            <!-- Pengabdian -->
            <div class="bg-white p-4 rounded-xl shadow-lg">
                <h3 class="text-lg font-semibold mb-2 text-center">Rekognisi Pengabdian</h3>
                <canvas id="chartPengabdian"></canvas>
            </div>
        </div>

        <script>
            const options = {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            };

            const labels = ['Pengajuan', 'Ditolak', 'Aktif'];

            const dataPenelitian = {
                labels: labels,
                datasets: [{
                    label: 'Penelitian',
                    data: [25, 10, 40],
                    backgroundColor: ['#2A9D8F', '#E76F51', '#E9C46A']
                }]
            };

            const dataPenghargaan = {
                labels: labels,
                datasets: [{
                    label: 'Penghargaan',
                    data: [18, 7, 30],
                    backgroundColor: ['#2A9D8F', '#E76F51', '#E9C46A']
                }]
            };

            const dataPengabdian = {
                labels: labels,
                datasets: [{
                    label: 'Pengabdian Masyarakat',
                    data: [20, 5, 35],
                    backgroundColor: ['#2A9D8F', '#E76F51', '#E9C46A']
                }]
            };

            new Chart(document.getElementById('chartPenelitian'), {
                type: 'pie',
                data: dataPenelitian,
                options: options
            });

            new Chart(document.getElementById('chartPenghargaan'), {
                type: 'pie',
                data: dataPenghargaan,
                options: options
            });

            new Chart(document.getElementById('chartPengabdian'), {
                type: 'pie',
                data: dataPengabdian,
                options: options
            });
        </script>


        <!-- Tabel Data Dosen -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Data Dosen</h2>
                <a href="#" class="text-sm text-[#006A71] font-semibold hover:underline">Lihat semua</a>

            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-[#9ACBD0]">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama</th>
                            <th scope="col" class="px-4 py-3">NIDN</th>
                            <th scope="col" class="px-4 py-3">Program Studi</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <td class="px-4 py-3 font-medium text-gray-900">Dr. Rina Wijaya</td>
                            <td class="px-4 py-3">19800531</td>
                            <td class="px-4 py-3">Teknik Informatika</td>
                            <td class="px-4 py-3 text-green-600">Aktif</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <td class="px-4 py-3 font-medium text-gray-900">Prof. Joko Santoso</td>
                            <td class="px-4 py-3">19770123</td>
                            <td class="px-4 py-3">Sistem Informasi</td>
                            <td class="px-4 py-3 text-green-600">Aktif</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-4 py-3 font-medium text-gray-900">Ir. Dewi Rahmawati</td>
                            <td class="px-4 py-3">19891010</td>
                            <td class="px-4 py-3">Teknik Elektro</td>
                            <td class="px-4 py-3 text-yellow-600">Cuti</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>


</body>

</html>
