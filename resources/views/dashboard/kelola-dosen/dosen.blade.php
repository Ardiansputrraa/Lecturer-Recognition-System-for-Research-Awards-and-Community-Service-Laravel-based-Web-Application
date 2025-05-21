<x-header></x-header>

<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            let query = $(this).val();
            if (query != "") {
                searchDataDosen(query);
            } else {
                window.location.reload();
            }
        });
    });

    function searchDataDosen(query) {
        $.ajax({
            url: "{{ route('search.dosen') }}",
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
                keyword: query,
            },
            success: function(data) {
                console.log(data);
                let tabelDosen = $("#tabelDosen");
                tabelDosen.empty();

                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        let tabelTemp = `<tr class="bg-white border-b">
                                <td class="px-4 py-3">${i + 1}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">${data[i]["nama_lengkap"]}</td>
                                <td class="px-4 py-3">${data[i]["nip"]}</td>
                                <td class="px-4 py-3">${data[i]["fakultas"]}</td>
                                <td class="px-4 py-3">${data[i]["prodi"]}</td>
                                <td class="px-4 py-3">${data[i]["no_telepon"]}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-start gap-3">
                                        <!-- Button View -->
                                        <a href="/detail-dosen/${data[i]["id"]}"
                                            class="relative group flex items-center justify-center w-10 h-10">
                                            <svg class="w-5 h-5 text-[#5F9AB8] group-hover:text-[#457B9D] transition"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 3C5 3 1 8 1 8s4 5 9 5 9-5 9-5-4-5-9-5zm0 8a3 3 0 110-6 3 3 0 010 6z" />
                                            </svg>
                                            <span
                                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                                Lihat
                                            </span>
                                        </a>   

                                        <!-- Button Delete -->
                                        <button class="relative group flex items-center justify-center w-10 h-10" onclick="deleteDataDosen('${data[i]["user_id"]}')">
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
                            </tr>`
                        $("#tabelDosen").append(tabelTemp);
                    }

                } else {
                    tabelDosen.append(
                        '<tr class="bg-white border-b"><td colspan="9" class="text-center">Tidak ada data ditemukan</td></tr>'
                    );
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat memuat data.');
            }
        });
    }

    function addDosen() {
        let namaLengkap = $("#namaLengkap").val();
        let nip = $("#nip").val();
        let fakultas = $("#fakultas").val();
        let prodi = $("#prodi").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let nomerTelepon = $("#nomerTelepon").val();

        if (namaLengkap === "") {
            $("#helpNama")
                .text("Silahkan masukan nama lengkap!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#namaLengkap").focus();
            return;
        } else {
            $("#helpNama").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (nip === "") {
            $("#helpNip")
                .text("Silahkan masukan NIP!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#nip").focus();
            return;
        } else {
            $("#helpNip").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (fakultas === "") {
            $("#helpFakultas")
                .text("Silahkan pilih fakultas!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#fakultas").focus();
            return;
        } else {
            $("#helpFakultas").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (prodi === "") {
            $("#helpProdi")
                .text("Silahkan pilih program studi!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#prodi").focus();
            return;
        } else {
            $("#helpProdi").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (email === "") {
            $("#helpEmail")
                .text("Silahkan masukan email!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#email").focus();
            return;
        } else {
            $("#helpEmail").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (password === "") {
            $("#helpPassword")
                .text("Silahkan masukan password!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#password").focus();
            return;
        } else {
            $("#helpPassword").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (password.length < 8) {
            $("#helpPassword")
                .text("Password minimal 8 karakter!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#password").focus();
            return;
        } else {
            $("#helpPassword").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (password.length > 20) {
            $("#helpPassword")
                .text("Password maksimal 20 karakter!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#password").focus();
            return;
        } else {
            $("#helpPassword").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (password.search(/[0-9]/) < 0) {
            $("#helpPassword")
                .text("Password harus mengandung angka!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#password").focus();
            return;
        } else {
            $("#helpPassword").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (nomerTelepon.length > 15) {
            $("#helpNomerTelepon")
                .text("Nomer telepon maksimal 15 digit!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#nomerTelepon").focus();
            return;
        } else {
            $("#helpNomerTelepon").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (nomerTelepon === "") {
            $("#helpNomerTelepon")
                .text("Silahkan masukan nomer telepon!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#nomerTelepon").focus();
            return;
        } else {
            $("#helpNomerTelepon").text("").removeClass("is-safe").addClass("is-danger");
        }

        if (nomerTelepon.length < 10) {
            $("#helpNomerTelepon")
                .text("Nomer telepon minimal 10 digit!")
                .removeClass("is-safe")
                .addClass("is-danger");
            $("#nomerTelepon").focus();
            return;
        } else {
            $("#helpNomerTelepon").text("").removeClass("is-safe").addClass("is-danger");
        }

        $.ajax({
            type: "POST",
            url: "{{ route('add.dosen') }}",
            data: {
                _token: "{{ csrf_token() }}",
                namaLengkap: namaLengkap,
                nip: nip,
                fakultas: fakultas,
                prodi: prodi,
                email: email,
                password: password,
                nomerTelepon: nomerTelepon,
            },
            success: function(response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: "Data dosen berhasil titambahkan!",
                    confirmButtonText: "Oke",
                }).then(() => {
                    window.location.reload();
                });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                if (xhr.status === 422) {
                    console.log(xhr.responseJSON);
                    let errors = xhr.responseJSON.errors;
                    if (errors.nip) {
                        $("#helpNip")
                            .text("NIP telah digunakan!")
                            .removeClass("is-safe")
                            .addClass("is-danger");
                        $("#nip").focus();
                        return;
                    } else if (errors.nip) {
                        console.log(errors.namaLengkap)
                    } else if (errors.email) {
                        $("#helpEmail")
                            .text("Email telah digunakan!")
                            .removeClass("is-safe")
                            .addClass("is-danger");
                        $("#email").focus();
                        return;
                    } else if (errors.fakultas) {
                        console.log(errors.fakultas)
                    } else if (errors.prodi) {
                        console.log(errors.prodi)
                    } else if (errors.nomerTelepon) {
                        console.log(errors.nomerTelepon)
                    } else if (errors.password) {
                        console.log(errors.password)
                    } else if (errors.role) {
                        console.log(errors.role)
                    }
                }

            }
        });
    }

    function deleteDataDosen(user_id) {
            $.ajax({
                type: "GET",
                url: `/delete-dosen/${user_id}`,
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data dosen berhasil dihapus!",
                        icon: "success",
                        confirmButtonText: "Oke",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Delete Failed",
                        text: xhr.responseText,
                        icon: "error",
                        confirmButtonText: "Oke",
                    });
                }
            });
        }

</script>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar title="Data Dosen" description="Pantai dan kelola data dosen aktif dan tidak aktif di sini." />

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
                        <input type="text" placeholder="Cari Dosen" id="search"
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
                    <a href="{{ route('download.dosen') }}"
                        class="flex items-center gap-2 bg-[#5F9AB8] text-white px-4 py-2 rounded-lg hover:bg-[#457B9D] transition duration-300 w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                        </svg>
                        CSV
                    </a>
                </div>
            </div>


            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-700 uppercase bg-[#9ACBD0]">
                        <tr>
                            <th scope="col" class="px-4 py-3">No</th>
                            <th scope="col" class="px-4 py-3">Nama Lengkap</th>
                            <th scope="col" class="px-4 py-3">NIP</th>
                            <th scope="col" class="px-4 py-3">Fakultas</th>
                            <th scope="col" class="px-4 py-3">Program Studi</th>
                            <th scope="col" class="px-4 py-3">Nomer Telepon</th>
                            <th scope="col" class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabelDosen">
                        @foreach ($dosen as $data)
                            <tr class="bg-white border-b">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $data->nama_lengkap }}</td>
                                <td class="px-4 py-3">{{ $data->nip }}</td>
                                <td class="px-4 py-3">{{ $data->fakultas }}</td>
                                <td class="px-4 py-3">{{ $data->prodi }}</td>
                                <td class="px-4 py-3">{{ $data->no_telepon }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-start gap-3">
                                        <!-- Button View -->
                                        <a href="{{ url('/detail-dosen/' . $data->id) }}"
                                            class="relative group flex items-center justify-center w-10 h-10">
                                            <svg class="w-5 h-5 text-[#5F9AB8] group-hover:text-[#457B9D] transition"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 3C5 3 1 8 1 8s4 5 9 5 9-5 9-5-4-5-9-5zm0 8a3 3 0 110-6 3 3 0 010 6z" />
                                            </svg>
                                            <span
                                                class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block bg-white border border-gray-300 shadow-lg text-gray-700 text-xs rounded-lg py-2 px-3 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-200">
                                                Lihat
                                            </span>
                                        </a>                                        

                                        <!-- Button Delete -->
                                        <button class="relative group flex items-center justify-center w-10 h-10" onclick="deleteDataDosen('{{ $data->user_id }}')">
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
                        @endforeach
                    </tbody>
                </table>
            </div>

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

    </main>

    <!--Modal Tambah Dosen-->
    <div id="tambahDosenModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-[#006A71]">
                        Tambah Data Dosen
                    </h3>
                    <button type="button"
                        class="bg-transparent text-red-400 hover:bg-gray-100 hover:text-red-600 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="tambahDosenModal">
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
                            <label for="namaLengkap" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Lengkap</label>
                            <input type="text" name="namaLengkap" id="namaLengkap"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nama lengkap beserta gelar" />
                            <p id="helpNama" class="help is-hidden text-xs mt-2 text-red-400"></p>
                        </div>
                        <div>
                            <label for="nip" class="block mb-2 text-sm font-medium text-gray-900">NIP</label>
                            <input type="text" name="nip" id="nip"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan NIP" />
                            <p id="helpNip" class="help is-hidden text-xs mt-2 text-red-400"></p>
                        </div>
                        <div>
                            <label for="fakultas"
                                class="block mb-2 text-sm font-medium text-gray-900">Fakultas</label>
                            <select
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                id="fakultas" name="fakultas">
                                <option value="" disabled selected>Pilih Fakultas</option>
                                <option value="Fakultas Kedokteran">
                                    Fakultas Kedokteran</option>
                                <option value="Fakultas Kedokteran Gigi">
                                    Fakultas Kedokteran Gigi</option>
                                <option value="Fakultas Psikologi">
                                    Fakultas Psikologi</option>
                                <option value="Fakultas Ekonomi dan Bisnis">
                                    Fakultas Ekonomi dan Bisnis</option>
                                <option value="Fakultas Teknologi Informasi">
                                    Fakultas Teknologi Informasi</option>
                                <option value="Fakultas Hukum">
                                    Fakultas Hukum</option>
                            </select>
                            <p id="helpFakultas" class="help is-hidden text-xs mt-2 text-red-400"></p>
                        </div>
                        <div>
                            <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900">Program
                                Studi</label>
                            <select
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                id="prodi" name="prodi">
                                <option value="" selected>Pilih Program Studi</option>
                                <option value="Prodi Kedokteran">
                                    Prodi Kedokteran</option>
                                <option value="Prodi Kedokteran Gigi">
                                    Prodi Kedokteran Gigi</option>
                                <option value="Prodi Psikologi">
                                    Prodi Psikologi</option>
                                <option value="Prodi Akutansi">
                                    Prodi Akutansi</option>
                                <option value="Prodi Manajemen">
                                    Prodi Manajemen</option>
                                <option value="Prodi Teknik Informatika">
                                    Prodi Teknik Informatika</option>
                                <option value="Prodi Perpustakaan Sains Informasi">
                                    Prodi Perpustakaan Sains Informasi</option>
                                <option value="Prodi Hukum">
                                    Prodi Hukum</option>
                            </select>
                            <p id="helpProdi" class="help is-hidden text-xs mt-2 text-red-400"></p>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan email" />
                            <p id="helpEmail" class="help is-hidden text-xs mt-2 text-red-400"></p>
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan password" />
                            <p id="helpPassword" class="help is-hidden text-xs mt-2 text-red-400"></p>
                        </div>
                        <div>
                            <label for="nomerTelepon" class="block mb-2 text-sm font-medium text-gray-900">Nomer
                                Telepon</label>
                            <input type="number" name="nomerTelepon" id="nomerTelepon"
                                class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                                placeholder="Masukan nomer telepon" />
                            <p id="helpNomerTelepon" class="help is-hidden text-xs mt-2 text-red-400"></p>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b gap-4">
                    <button type="button" onclick="addDosen()"
                        class="bg-[#5F9AB8] border-2 border-[#457B9D] hover:bg-white text-white hover:text-[#457B9D] font-medium py-2 px-4 rounded-lg transition duration-300">
                        Tambah Dosen
                    </button>
                    <button data-modal-hide="tambahDosenModal"
                        class="bg-[#EF4444] border-2 border-[#DC2626] hover:bg-white text-white hover:text-[#DC2626] font-medium py-2 px-4 rounded-lg transition duration-300">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
