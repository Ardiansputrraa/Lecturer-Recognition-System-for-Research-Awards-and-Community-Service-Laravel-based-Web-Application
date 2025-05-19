<x-header></x-header>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar title="Dashboard" description="Pantau dan kelola data dosen secara efisien" />

        <div class="bg-white w-full p-6 shadow-lg rounded">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-4">
                <div class="flex items-center justify-start gap-6">
                    <a href="/kelola-dosen"
                        class="relative group text-[#48A6A7] hover:text-[#006A71] transition duration-300 ease-in-out ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                        <span
                            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                            Kembali
                        </span>
                    </a>
                    <h1 class="text-xl font-semibold text-gray-900">Detail Dosen</h1>
                </div>
                <!-- Tombol Edit Dosen -->
                <button type="button" onclick="addEdit()"
                    class="flex items-center gap-2 bg-[#48A6A7] text-white px-4 py-2 rounded-lg hover:bg-[#006A71] transition duration-300 w-full md:w-auto">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M17.414 2.586a2 2 0 0 0-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 0 0 0-2.828zM4 15h12v2H4v-2z" />
                    </svg>
                    Edit Dosen
                </button>
                <script>
                    window.addEdit = function () {
                        $('input:disabled, select:disabled, textarea:disabled, button:disabled').each(function () {
                            $(this).removeAttr('disabled');
                        });
                        $('input, select, textarea, button').removeClass('cursor-not-allowed opacity-50');
                    }
                </script>
            </div>

            <div class="mt-6">
                <div class="flex flex-col md:flex-row gap-6 items-start">
                    <!-- Profile Image -->
                    <div class="w-full md:w-1/5">
                        <img src="{{ asset(Auth::user()->getTableDatabase()->foto_profile) }}" alt="Profile Photo"
                            class="w-full aspect-square object-cover rounded-full border-4 border-[#48A6A7] shadow-lg" />
                    </div>

                    <!-- Form Section -->
                    <div class="w-full md:w-3/4">
                        <form class="space-y-4" action="#">
                            <!-- Row 1 -->
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="w-full md:w-1/2">
                                    <label for="namaLengkap" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        Lengkap</label>
                                    <input type="text" name="namaLengkap" id="namaLengkap"
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                        placeholder="Masukkan nama lengkap beserta gelar"
                                        value="{{ Auth::user()->getTableDatabase()->nama_lengkap }}" required disabled />
                                </div>
                                <div class="w-full md:w-1/2">
                                    <label for="nip"
                                        class="block mb-2 text-sm font-medium text-gray-900">NIP</label>
                                    <input type="text" name="nip" id="nip"
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                        placeholder="Masukkan NIP" value="{{ Auth::user()->getTableDatabase()->nip }}" required disabled />
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="w-full md:w-1/2">
                                    <label for="fakultas"
                                        class="block mb-2 text-sm font-medium text-gray-900">Fakultas</label>
                                    <select
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                        id="fakultas" name="fakultas" disabled>
                                        <option disabled selected>Pilih Fakultas</option>
                                        <option value="Fakultas Kedokteran"
                                            {{ Auth::user()->getTableDatabase()->fakultas == 'Fakultas Kedokteran' ? 'selected' : '' }}>
                                            Fakultas Kedokteran</option>
                                        <option value="Fakultas Kedokteran Gigi"
                                            {{ Auth::user()->getTableDatabase()->fakultas == 'Fakultas Kedokteran Gigi' ? 'selected' : '' }}>
                                            Fakultas Kedokteran Gigi</option>
                                        <option value="Fakultas Psikologi"
                                            {{ Auth::user()->getTableDatabase()->fakultas == 'Fakultas Psikologi' ? 'selected' : '' }}>
                                            Fakultas Psikologi</option>
                                        <option value="Fakultas Ekonomi dan Bisnis"
                                            {{ Auth::user()->getTableDatabase()->fakultas == 'Fakultas Ekonomi' ? 'selected' : '' }}>
                                            Fakultas Ekonomi dan Bisnis</option>
                                        <option value="Fakultas Teknologi Informasi"
                                            {{ Auth::user()->getTableDatabase()->fakultas == 'Fakultas Teknologi Informasi' ? 'selected' : '' }}>
                                            Fakultas Teknologi Informasi</option>
                                        <option value="Fakultas Hukum"
                                            {{ Auth::user()->getTableDatabase()->fakultas == 'Fakultas Hukum' ? 'selected' : '' }}>
                                            Fakultas Hukum</option>
                                    </select>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900">Program
                                        Studi</label>
                                    <select
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                        id="prodi" name="prodi" disabled>
                                        <option disabled selected>Pilih Program Studi</option>
                                        <option value="Prodi Kedokteran"
                                            {{ Auth::user()->getTableDatabase()->prodi == 'Prodi Kedokteran' ? 'selected' : '' }}>
                                            Prodi Kedokteran</option>
                                        <option value="Prodi Kedokteran Gigi"
                                            {{ Auth::user()->getTableDatabase()->prodi == 'Prodi Kedokteran Gigi' ? 'selected' : '' }}>
                                            Prodi Kedokteran Gigi</option>
                                        <option value="Prodi Psikologi"
                                            {{ Auth::user()->getTableDatabase()->prodi == 'Prodi Psikologi' ? 'selected' : '' }}>
                                            Prodi Psikologi</option>
                                        <option value="Prodi Akutansi"
                                            {{ Auth::user()->getTableDatabase()->prodi == 'Prodi Akutansi' ? 'selected' : '' }}>
                                            Prodi Akutansi</option>
                                        <option value="Prodi Manajemen"
                                            {{ Auth::user()->getTableDatabase()->prodi == 'Prodi Manajemen' ? 'selected' : '' }}>
                                            Prodi Manajemen</option>
                                        <option value="Prodi Teknik Informatika"
                                            {{ Auth::user()->getTableDatabase()->prodi == 'Prodi Teknik Informatika' ? 'selected' : '' }}>
                                            Prodi Teknik Informatika</option>
                                        <option value="Prodi Perpustakaan Sains Informasi"
                                            {{ Auth::user()->getTableDatabase()->prodi == 'Prodi Perpustakaan Sains Informasi' ? 'selected' : '' }}>
                                            Prodi Perpustakaan Sains Informasi</option>
                                        <option value="Prodi Hukum"
                                            {{ Auth::user()->getTableDatabase()->prodi == 'Prodi Hukum' ? 'selected' : '' }}>
                                            Prodi Hukum</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 3 -->
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="w-full md:w-1/2">
                                    <label for="nomerTelpon" class="block mb-2 text-sm font-medium text-gray-900">Nomer
                                        Telepon</label>
                                    <input type="number" name="nomerTelpon" id="nomerTelpon"
                                        class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                        placeholder="Masukkan nomer telepon" value="{{ Auth::user()->getTableDatabase()->no_telepon }}" required disabled />
                                </div>
                                <div class="w-full md:w-1/2">
                                    <label for="foto" class="block mb-2 text-sm font-medium text-gray-900">Unggah
                                        Foto Baru</label>
                                    <input type="file" id="foto" name="foto"
                                        class="block w-full bg-gray-100 border border-gray-400 text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                           file:rounded-lg file:border-0 file:text-sm file:font-medium rounded-lg mb-4
                                           file:bg-[#48A6A7] file:text-white hover:file:bg-[#3f9293]
                                           transition-all duration-200"
                                        disabled />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end mb-4">
                <button id="update" type="button" onclick="updateDosen()" disabled
                    class="flex items-center gap-2 cursor-not-allowed opacity-50 bg-[#5F9AB8] text-white px-4 py-2 rounded-lg hover:bg-white hover:text-[#457B9D] border-2 border-[#457B9D] transition duration-300 w-full md:w-auto">
                    Simpan Perubahan
                </button>
                <button id="cancel" type="button" disabled onclick="window.location.reload()"
                    class="flex items-center gap-2 cursor-not-allowed opacity-50 bg-[#EF4444] text-white px-4 py-2 rounded-lg hover:bg-white hover:text-[#DC2626] border-2 border-[#DC2626] transition duration-300 w-full md:w-auto ml-4">
                    Batal Perubahan
                </button>
            </div>

            <script>
                window.getData = function () {
                    let form_data = new FormData();
                    let id = @json(Auth::user()->getTableDatabase()->id);
                    let file = $("#foto")[0].files[0];
                    let namaLengkap = $("#namaLengkap").val() || (@json(Auth::user()->getTableDatabase()->nama_lengkap) === null ?
                        "Masukkan nama lengkap beserta gelar" : @json(Auth::user()->getTableDatabase()->nama_lengkap));
                    let nip = $("#nip").val() || (@json(Auth::user()->getTableDatabase()->nip) === null ? "Masukkan NIP" : @json(Auth::user()->getTableDatabase()->nip));
                    let fakultas = $("#fakultas").val() || @json(Auth::user()->getTableDatabase()->fakultas);
                    let prodi = $("#prodi").val() || @json(Auth::user()->getTableDatabase()->prodi);
                    let nomerTelpon = $("#nomerTelpon").val() ||
                        (@json(Auth::user()->getTableDatabase()->no_telpon) === null ? "Masukkan nomer telepon" : @json(Auth::user()->getTableDatabase()->no_telpon));
            
                    form_data.append("_token", "{{ csrf_token() }}");
                    form_data.append("id", id);
                    form_data.append("foto", file);
                    form_data.append("namaLengkap", namaLengkap);
                    form_data.append("fakultas", fakultas);
                    form_data.append("prodi", prodi);
                    if ($("#nip").val() != "") {
                        form_data.append("nip", nip);
                    }
                    form_data.append("nomerTelpon", nomerTelpon);
            
                    return form_data;
                }
            
                window.updateDosen = function () {
                    console.log("Data yang akan dikirim:", getData());
                    $.ajax({
                        type: "POST",
                        url: "{{ route('update.dosen') }}",
                        data: getData(),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data dosen berhasil diubah!",
                                icon: "success",
                                confirmButtonText: "Oke",
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function (xhr) {
                            const response = JSON.parse(xhr.responseText);
                            if (response.message === "NIP sudah digunakan!") {
                                Swal.fire({
                                    title: "Update Gagal",
                                    text: "NIP tersebut telah terdaftar. Silakan gunakan NIP lain!",
                                    icon: "error",
                                    confirmButtonText: "Oke",
                                    customClass: {
                                        confirmButton: 'btn app-btn-primary',
                                        cancelButton: 'btn app-btn-secondary',
                                    },
                                });
                            } else {
                                console.log("Error lain:", response.errors);
                            }
                        }
                    });
                }
            </script>
            

        </div>

    </main>


</body>

</html>
