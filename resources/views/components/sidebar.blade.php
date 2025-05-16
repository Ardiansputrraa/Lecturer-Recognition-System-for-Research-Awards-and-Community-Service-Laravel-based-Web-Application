<!-- Tombol hamburger hanya untuk mobile -->
<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-700 rounded-lg sm:hidden focus:outline-none focus:ring-2 focus:ring-gray-200"
    @click="sidebarOpen = !sidebarOpen">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-8 h-8" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
            <span class="self-center text-xl font-semibold whitespace-nowrap text-[#006A71] px-2" x-show="sidebarOpen"
                x-transition>Rekognisi Dosen</span>
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
                <a href="/home"
                    class="sidebar-link flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
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
                <a href="/kelola-dosen"
                    class="sidebar-link flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
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
                <a href="/publikasi-dosen"
                    class="flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
                    <div
                        class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                        <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z"/>
                            <path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="ms-3" x-show="sidebarOpen" x-transition>Publikasi</span>
                </a>
            </li>

            <li>
                <a href="/hki-dosen"
                    class="flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
                    <div
                        class="shrink-0 flex items-center justify-center w-8 h-8 bg-white rounded-lg shadow-lg group-hover:bg-[#006A71]">
                        <svg class="w-4 h-4 text-[#006A71] transition duration-75 group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="ms-3" x-show="sidebarOpen" x-transition>Hak Kekayaan Intelektual</span>
                </a>
            </li>

            <li>
                <a href="/penelitian-dosen"
                class="sidebar-link flex items-center p-2 text-gray-900 rounded-lg font-semibold text-sm hover:bg-white hover:shadow-xl group">
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
                <a href="/pengabdian-dosen"
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
                <a href="/surat-tugas-dosen"
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
    </div>
</aside>

<script>
    $(document).ready(function () {
        $(".sidebar-link").on("click", function () {
            $(".sidebar-link").removeClass("bg-[#48A6A7] text-white shadow-xl hover:text-gray-900");
            $(this).addClass("bg-[#48A6A7] text-white shadow-xl hover:text-gray-900");
        });

        let currentUrl = window.location.pathname;
        $(".sidebar-link").each(function () {
            if ($(this).attr("href") === currentUrl) {
                $(this).addClass("bg-[#48A6A7] text-white shadow-xl hover:text-gray-900");
            }
        });
    });
</script>
