<x-header></x-header>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar title="Dashboard" description="Pantau dan kelola data dosen secara efisien" />

        <!-- Statistik Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-6 mt-4">
            <!-- Card 1 -->
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

        <!-- Statistik Chart -->
        <div class="flex flex-col lg:flex-row gap-4 w-full">
            <!-- Grafik Rekognisi -->
            <div class="bg-white w-full lg:w-[70%] p-6 shadow-lg rounded-lg overflow-y-auto h-full">
                <!-- Judul -->
                <h2 class="text-xl font-semibold text-[#006A71] mb-6 border-b border-gray-200 pb-2">
                    Grafik Rekognisi (2020–2025)
                </h2>

                <!-- Chart Container -->
                <div class="relative h-[250px] md:h-[285px]">
                    <canvas id="rekognisiChart"></canvas>
                </div>
            </div>

            <!-- Script Chart.js -->
            <script>
                const ctx = document.getElementById('rekognisiChart').getContext('2d');
            
                const rekognisiBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['2020', '2021', '2022', '2023', '2024', '2025'],
                        datasets: [
                            {
                                label: 'Publikasi',
                                data: [50, 70, 80, 95, 100, 120],
                                backgroundColor: 'rgba(42, 157, 143, 0.8)', // #2A9D8F
                                borderRadius: 10,
                                barPercentage: 0.6,
                                categoryPercentage: 0.6,
                            },
                            {
                                label: 'HKI',
                                data: [20, 25, 30, 40, 45, 50],
                                backgroundColor: 'rgba(231, 111, 81, 0.8)', // #E76F51
                                borderRadius: 10,
                                barPercentage: 0.6,
                                categoryPercentage: 0.6,
                            },
                            {
                                label: 'Penelitian',
                                data: [60, 65, 70, 80, 90, 100],
                                backgroundColor: 'rgba(233, 196, 106, 0.8)', // #E9C46A
                                borderRadius: 10,
                                barPercentage: 0.6,
                                categoryPercentage: 0.6,
                            },
                            {
                                label: 'Pengabdian',
                                data: [40, 50, 55, 60, 70, 75],
                                backgroundColor: 'rgba(95, 154, 184, 0.8)', // #5F9AB8
                                borderRadius: 10,
                                barPercentage: 0.6,
                                categoryPercentage: 0.6,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: '#374151',
                                    font: {
                                        size: 14,
                                        weight: '500'
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: '#006A71',
                                titleColor: '#fff',
                                bodyColor: '#fff',
                                borderColor: '#e5e7eb',
                                borderWidth: 1
                            }
                        },
                        scales: {
                            x: {
                                offset: true,
                                ticks: {
                                    color: '#4B5563',
                                    font: { size: 13 }
                                },
                                grid: {
                                    display: false
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#4B5563',
                                    font: { size: 13 }
                                },
                                grid: {
                                    color: '#E5E7EB'
                                }
                            }
                        }
                    }
                });
            </script>


            <div class="w-full lg:w-[30%] flex flex-col gap-4 h-full">
                <!-- Review Panel -->
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Pengajuan Ditolak</h2>
                    <div class="space-y-4">
                        
                        <div>
                            <div class="flex justify-between text-sm">
                                <span>Publikasi</span>
                                <span>3%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                <div class="bg-[#F4A261] h-2 rounded-full" style="width: 20%"></div>
                            </div>
                        </div>
                        
                        <div>
                            <div class="flex justify-between text-sm">
                                <span>Hak Kekayaan Intelektual</span>
                                <span>3%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                <div class="bg-[#F4A261] h-2 rounded-full" style="width: 20%"></div>
                            </div>
                        </div>
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
                    </div>
                    <p class="text-sm text-gray-600 mt-6">
                        Berikut adalah statistik pengajuan yang ditolak, dalam kategori penelitian, penghargaan, dan
                        pengabdian.
                        <br> Anda dapat melihat detailnya pada halaman masing-masing kategori.
                    </p>
                </div>
            </div>
        </div>

        <!-- Tabel Data Dosen -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mt-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Data Dosen</h2>
                <a href="#" class="text-sm text-[#006A71] font-semibold hover:underline">Lihat semua</a>

            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-[#9ACBD0]">
                        <tr>
                            <th scope="col" class="px-4 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-4 py-3">NIP</th>
                            <th scope="col" class="px-4 py-3">Fakultas</th>
                            <th scope="col" class="px-4 py-3">Program Studi</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Nomer Telepon</th>
                            <th scope="col" class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <td class="px-4 py-3 font-medium text-gray-900">Dr. Rina Wijaya</td>
                            <td class="px-4 py-3">19800531</td>
                            <td class="px-4 py-3">Teknologi Informasi</td>
                            <td class="px-4 py-3">Teknik Informatika</td>
                            <td class="px-4 py-3">dosen@gmail.com</td>
                            <td class="px-4 py-3">19800531</td>
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
                        
                        <tr class="bg-white border-b">
                            <td class="px-4 py-3 font-medium text-gray-900">Dr. Rina Wijaya</td>
                            <td class="px-4 py-3">19800531</td>
                            <td class="px-4 py-3">Teknologi Informasi</td>
                            <td class="px-4 py-3">Teknik Informatika</td>
                            <td class="px-4 py-3">dosen@gmail.com</td>
                            <td class="px-4 py-3">19800531</td>
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

                        <tr class="bg-white border-b">
                            <td class="px-4 py-3 font-medium text-gray-900">Dr. Rina Wijaya</td>
                            <td class="px-4 py-3">19800531</td>
                            <td class="px-4 py-3">Teknologi Informasi</td>
                            <td class="px-4 py-3">Teknik Informatika</td>
                            <td class="px-4 py-3">dosen@gmail.com</td>
                            <td class="px-4 py-3">19800531</td>
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
            </div>
        </div>

    </main>


</body>

</html>
