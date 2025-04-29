<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekognisi Dosen</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <!-- Tombol hamburger hanya untuk mobile -->
    <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-700 rounded-lg sm:hidden focus:outline-none focus:ring-2 focus:ring-gray-200"
        @click="sidebarOpen = !sidebarOpen">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-8 h-8" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <!-- Sidebar -->
    <aside id="separator-sidebar" :class="sidebarOpen ? 'w-64' : 'w-0 md:w-16'"
        class="fixed top-0 left-0 z-40 h-screen transition-all duration-300 bg-gray-100 sm:translate-x-0 overflow-hidden"
        aria-label="Sidebar">

        <!-- Tombol toggle sidebar -->
        <div
            class="flex items-center justify-between px-3 py-4 border-b border-gray-400 border-opacity-100 sm:justify-center">
            <a href="#" class="flex items-center">
                <!-- Tulisan ini hanya tampil saat sidebar terbuka -->
                <span class="self-center text-xl font-semibold whitespace-nowrap text-[#006A71] px-2"
                    x-show="sidebarOpen" x-transition>Rekognisi Dosen</span>
            </a>
            <div class="flex justify-end py-2">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-lg hover:bg-white hover:shadow-xl">
                    <svg class="w-6 h-6 text-gray-900 hover:text-[#006A71]" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m6 10 1.99994 1.9999-1.99994 2M11 5v14m-7 0h16c.5523 0 1-.4477 1-1V6c0-.55228-.4477-1-1-1H4c-.55228 0-1 .44772-1 1v12c0 .5523.44772 1 1 1Z" />
                    </svg>
                </button>
            </div>
        </div>


        <!-- Menu sidebar -->
        <div class="h-full px-2 py-4 overflow-y-auto">
            <ul class="space-y-5 font-medium pb-4">
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
                        <div
                            class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                            <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="ms-3" x-show="sidebarOpen" x-transition>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
                        <div
                            class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                            <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path fill-rule="evenodd"
                                    d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="ms-3" x-show="sidebarOpen" x-transition>Dosen</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center p-2 bg-[#48A6A7] text-gray-100 hover:text-gray-900 rounded-lg font-semibold text-sm shadow-xl hover:bg-white group">
                        <div
                            class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                            <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm.5 5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm0 5c.47 0 .917-.092 1.326-.26l1.967 1.967a1 1 0 0 0 1.414-1.414l-1.817-1.818A3.5 3.5 0 1 0 11.5 17Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <span class="ms-3" x-show="sidebarOpen" x-transition>Penelitian</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
                        <div
                            class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                            <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M11 9a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" />
                                <path fill-rule="evenodd"
                                    d="M9.896 3.051a2.681 2.681 0 0 1 4.208 0c.147.186.38.282.615.255a2.681 2.681 0 0 1 2.976 2.975.681.681 0 0 0 .254.615 2.681 2.681 0 0 1 0 4.208.682.682 0 0 0-.254.615 2.681 2.681 0 0 1-2.976 2.976.681.681 0 0 0-.615.254 2.682 2.682 0 0 1-4.208 0 .681.681 0 0 0-.614-.255 2.681 2.681 0 0 1-2.976-2.975.681.681 0 0 0-.255-.615 2.681 2.681 0 0 1 0-4.208.681.681 0 0 0 .255-.615 2.681 2.681 0 0 1 2.976-2.975.681.681 0 0 0 .614-.255ZM12 6a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M5.395 15.055 4.07 19a1 1 0 0 0 1.264 1.267l1.95-.65 1.144 1.707A1 1 0 0 0 10.2 21.1l1.12-3.18a4.641 4.641 0 0 1-2.515-1.208 4.667 4.667 0 0 1-3.411-1.656Zm7.269 2.867 1.12 3.177a1 1 0 0 0 1.773.224l1.144-1.707 1.95.65A1 1 0 0 0 19.915 19l-1.32-3.93a4.667 4.667 0 0 1-3.4 1.642 4.643 4.643 0 0 1-2.53 1.21Z" />
                            </svg>
                        </div>
                        <span class="ms-3" x-show="sidebarOpen" x-transition>Penghargaan</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
                        <div
                            class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                            <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path fill-rule="evenodd"
                                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="ms-3" x-show="sidebarOpen" x-transition>Pengabdian</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
                        <div
                            class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                            <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path fill-rule="evenodd"
                                    d="M7 9v6a4 4 0 0 0 4 4h4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h1v2Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M13 3.054V7H9.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 13 3.054ZM15 3v4a2 2 0 0 1-2 2H9v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-3Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="ms-3" x-show="sidebarOpen" x-transition>Surat Tugas</span>
                    </a>
                </li>
            </ul>

            <ul class="pt-4 mt-2  font-medium border-t border-gray-400">
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
                        <div
                            class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                            <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                        </div>
                        <span class="ms-3" x-show="sidebarOpen" x-transition>Sign Up</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <!-- Header Dashboard -->
        <div class="flex items-center justify-between mb-6">

            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-sm text-gray-600">Pantau dan kelola data dosen secara efisien</p>
            </div>

            <div class="flex justify-end space-x-6">
                <!-- Notifiaction Dropdown Component -->
                <div class="relative mt-2">
                    <!-- Notification Button -->
                    <button id="notifButton" class="relative peer">
                        <!-- Bell Icon -->
                        <svg class="w-10 h-10 text-[#006A71]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                        </svg>

                        <!-- Notification Badge -->
                        <span
                            class="absolute -top-1 -right-1 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">3</span>
                    </button>

                    <!-- Dropdown Notification -->
                    <div
                        class="absolute right-0 mt-2 w-72 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 scale-95 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-300 origin-top-right z-50 invisible peer-focus:visible">
                        <div class="flex justify-between border-b border-gray-400">
                            <p class="px-4 py-3 font-semibold text-gray-900">Notifikasi</p>
                            <a href="#"
                                class="px-4 py-3 text-sm text-[#006A71] font-medium cursor-pointer hover:underline">Lihat
                                semua</a>
                        </div>

                        <ul class="max-h-80 overflow-y-auto">
                            <li class="flex items-start space-x-3 px-4 py-3 text-sm hover:bg-gray-100 cursor-pointer">
                                <img src="assets/images/user.png" alt="User"
                                    class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <p class="font-semibold text-gray-800">Fajar Rahman</p>
                                    <p class="text-gray-600">Pesan baru diterima</p>
                                    <p class="text-gray-600 mt-2">12-01-2024</p>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3 px-4 py-3 text-sm hover:bg-gray-100 cursor-pointer">
                                <img src="assets/images/user.png" alt="User"
                                    class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <p class="font-semibold text-gray-800">Sinta Dewi</p>
                                    <p class="text-gray-600">Update sistem tersedia</p>
                                    <p class="text-gray-600 mt-2">12-01-2024</p>
                                </div>
                            </li>
                            <li class="flex items-start space-x-3 px-4 py-3 text-sm hover:bg-gray-100 cursor-pointer">
                                <img src="assets/images/user.png" alt="User"
                                    class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <p class="font-semibold text-gray-800">Andi Wijaya</p>
                                    <p class="text-gray-600">Pengingat rapat pukul 15.00</p>
                                    <p class="text-gray-600 mt-2">12-01-2024</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Profile Dropdown Component -->
                <div class="relative">
                    <!-- Profile Button -->
                    <button class="flex items-center space-x-2 peer">
                        <img src="assets/images/user.png" alt="Profile"
                            class="w-12 h-12 rounded-full border-2 border-[#006A71]">
                        <!-- Dropdown Icon -->
                        <svg class="w-4 h-4 text-[#006A71]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        class="absolute right-0 w-65 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 scale-95 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-300 origin-top-right z-50 invisible peer-focus:visible">
                        <div class="px-6 py-2 space-y-2">
                            <p class="text-sm font-semibold text-gray-800">Nama Pengguna</p>
                            <p class="text-sm text-gray-700">Role: Admin</p>
                        </div>
                        <div class="border-t border-gray-400"></div>
                        <ul class="py-1">
                            <li>
                                <a href="#"
                                    class="flex items-center space-x-2 px-4 py-3 text-sm text-gray-900 hover:bg-gray-100 transition-colors">
                                    <!-- Profile Icon -->
                                    <svg class="w-5 h-5 text-[#006A71]" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 1115 0H4.5z" />
                                    </svg>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center space-x-2 px-4 py-3 text-sm text-gray-900 hover:bg-gray-100 transition-colors">
                                    <!-- Logout Icon -->
                                    <svg class="w-5 h-5 text-[#E76F51]" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3H6.75A2.25 2.25 0 004.5 5.25v13.5A2.25 2.25 0 006.75 21H13.5a2.25 2.25 0 002.25-2.25V15M18 12h-9m0 0l3.75-3.75M9 12l3.75 3.75" />
                                    </svg>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>


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
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                <a href="#"
                    class="text-sm text-[#006A71] font-semibold hover:underline">Lihat semua</a>

            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
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
