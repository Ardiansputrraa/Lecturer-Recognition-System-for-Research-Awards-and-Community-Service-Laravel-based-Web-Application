@props(['title' => 'Dashboard', 'description' => 'Pantau dan kelola data dosen secara efisien'])

<script>
    function readNotification(id, url) {
        $.ajax({
            url: "{{ route('read.notifikasi') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            success: function(response) {
                window.location.href = "/" + url;
            },
            error: function(xhr, status, error) {
                console.log("Terjadi kesalahan saat menandai notifikasi sebagai dibaca.");
            }
        });
    }
    </script>
<!-- Navbar -->
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">{{ $title }}</h1>
        <p class="text-sm text-gray-600">{{ $description }}</p>
    </div>

    <div class="flex justify-end space-x-6">
        <!-- Notifiaction Dropdown Component -->
        <div class="relative mt-2">
            <!-- Notification Button -->
            <button id="notifButton" class="relative peer">
                <!-- Bell Icon -->
                <svg class="w-10 h-10 text-[#006A71]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.133 12.632v-1.8a5.406 5.406 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.955.955 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z" />
                </svg>

                <!-- Notification Badge -->
                <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">{{ $unreadCount }}</span>
            </button>

            <!-- Dropdown Notification -->
            <div
                class="absolute right-0 mt-2 w-95 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 scale-95 peer-focus:opacity-100 peer-focus:scale-100 transition-all duration-300 origin-top-right z-50 invisible peer-focus:visible">
                <div class="flex justify-center border-b border-gray-400">
                    <p class="px-4 py-3 font-semibold text-gray-900">Notifikasi</p>
                    {{-- <a href="#"
                        class="px-4 py-3 text-sm text-[#006A71] font-medium cursor-pointer hover:underline">Lihat
                        semua</a> --}}
                </div>

                <ul class="max-h-100 overflow-y-auto">
                    @foreach ($notifikasi as $data)
                        <button type="button" onclick="readNotification('{{ $data->id }}', '{{ $data->url }}')" class="block">
                            <li class="flex items-start space-x-3 px-4 py-3 text-sm cursor-pointer {{ $data->status === 'read' ? 'bg-gray-100' : 'hover:bg-gray-100' }}">
                                <img src="{{ asset($data->profile_pengirim) }}" alt="User"
                                    class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <p class="font-semibold text-gray-800 text-left mb-1">
                                        {{ $data->nama_pengirim ?? 'Pengguna' }}</p>
                                    <p class="text-gray-600 text-left">{{ $data->komentar }}</p>
                                    <div class="flex items-center space-x-4 mt-2">
                                        <span
                                            class="text-gray-600">{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</span>
                                        <span
                                            class="text-gray-600">{{ \Carbon\Carbon::parse($data->created_at)->format('H:i') }}</span>
                                    </div>
                                </div>
                            </li>
                        </button>
                    @endforeach

                </ul>
            </div>
        </div>

        <!-- Profile Dropdown Component -->
        <div class="relative">
            <!-- Profile Button -->
            <button class="flex items-center space-x-2 peer">
                <img src="{{ asset(Auth::user()->getTableDatabase()->foto_profile) }}" alt="Profile"
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
                <div class="px-6 py-2 space-y-2 mt-2">
                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->getTableDatabase()->nama_lengkap }}
                    </p>
                    <p class="text-sm text-gray-700">{{ Auth::user()->role }}</p>
                </div>
                <div class="border-t border-gray-400"></div>
                <ul class="py-1">
                    @if (Auth::user()->role == 'dosen')
                        <li>
                            <a href="/profile"
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
                    @endif
                    <li>
                        <button type="button" onclick="logout()"
                            class="flex items-center w-full space-x-2 px-4 py-3 text-sm text-gray-900 hover:bg-gray-100 transition-colors">
                            <!-- Logout Icon -->
                            <svg class="w-5 h-5 text-[#E76F51]" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3H6.75A2.25 2.25 0 004.5 5.25v13.5A2.25 2.25 0 006.75 21H13.5a2.25 2.25 0 002.25-2.25V15M18 12h-9m0 0l3.75-3.75M9 12l3.75 3.75" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </li>
                    <script>
                        window.logout = function() {
                            $.ajax({
                                url: "{{ route('logout') }}",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Berhasil",
                                        text: "Anda berhasil logout!",
                                        confirmButtonText: "Oke",
                                    }).then(() => {
                                        window.location.href = "/";
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.log("Terjadi kesalahan saat logout. Silakan coba lagi.")
                                }
                            });
                        };
                    </script>
                </ul>
            </div>
        </div>
    </div>
</div>
