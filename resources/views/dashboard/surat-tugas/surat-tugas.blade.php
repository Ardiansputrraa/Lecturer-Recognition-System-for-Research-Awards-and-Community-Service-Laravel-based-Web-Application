<x-header></x-header>

<body class="bg-gray-100" x-data="{ sidebarOpen: false }">

    <x-sidebar></x-sidebar>

    <!-- Konten utama -->
    <main :class="sidebarOpen ? 'sm:ml-64' : 'sm:ml-16'"
        class="transition-all duration-300 p-8 bg-gray-100 min-h-screen">

        <x-navbar title="Surat Tugas" description="Buat dan kelola surat tugas secara efisien" />

        <div class="bg-white w-full p-6 shadow-lg rounded">
            <form id="suratForm" method="POST" target="previewFrame">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            placeholder="Contoh: Dr. Aniyah Andarsa, S.H., M.H." required />
                    </div>

                    <!-- NIP -->
                    <div>
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900">NIP</label>
                        <input type="text" name="nip" id="nip"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            placeholder="Contoh: 198011232006042013" required />
                    </div>

                    <!-- Pangkat / Golongan -->
                    <div>
                        <label for="pangkat"
                            class="block mb-2 text-sm font-medium text-gray-900">Pangkat/Golongan</label>
                        <input type="text" name="pangkat" id="pangkat"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            placeholder="Contoh: IV/b" required />
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            placeholder="Contoh: Dosen Fakultas Hukum" required />
                    </div>

                    <!-- Unit Kerja -->
                    <div>
                        <label for="unit_kerja" class="block mb-2 text-sm font-medium text-gray-900">Unit Kerja</label>
                        <input type="text" name="unit_kerja" id="unit_kerja"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            placeholder="Contoh: Fakultas Hukum" required />
                    </div>

                    <!-- Tempat -->
                    <div>
                        <label for="tempat" class="block mb-2 text-sm font-medium text-gray-900">Tempat
                            Kegiatan</label>
                        <input type="text" name="tempat" id="tempat"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            placeholder="Contoh: Pengadilan Negeri Pontianak" required />
                    </div>

                    <!-- Tanggal Mulai-->
                    <div>
                        <label for="tanggalMulai" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                            Kegiatan</label>
                        <input type="date" name="tanggalMulai" id="tanggalMulai"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            min="{{ date('Y-m-d') }}" required />
                    </div>

                    <!-- Tanggal AKhir-->
                    <div>
                        <label for="tanggalAkhir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                            Kegiatan</label>
                        <input type="date" name="tanggalAkhir" id="tanggalAkhir"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            min="{{ date('Y-m-d') }}" required />
                    </div>

                    <!-- Acara -->
                    <div>
                        <label for="acara" class="block mb-2 text-sm font-medium text-gray-900">Keterangan /
                            Acara</label>
                        <textarea name="acara" id="acara" rows="3"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            placeholder="Contoh: Memberikan keterangan ahli sebagai saksi pada sidang di Pengadilan Negeri Pontianak..."
                            required></textarea>
                    </div>

                    <!-- Penugasan Berdasarkan -->
                    <div>
                        <label for="penugasan" class="block mb-2 text-sm font-medium text-gray-900">Penugasan
                            Berdasarkan</label>
                        <textarea name="penugasan" id="penugasan" rows="3"
                            class="bg-gray-100 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-[#48A6A7] focus:border-[#48A6A7] block w-full p-2.5"
                            placeholder="Contoh: Syarat permohonan dari..." required></textarea>
                    </div>
                </div>

                <div class="mt-8 flex gap-4 justify-end mb-2">
                    <button id="previewBtn" type="submit" formaction="{{ route('preview.surat') }}"
                        class="flex items-center gap-2 bg-[#48A6A7] text-white px-4 py-2 rounded-lg hover:bg-white hover:text-[#006A71] border-2 border-[#006A71] transition duration-300 w-full md:w-auto ml-4">
                        Lihat Hasil
                    </button>
                    <button id="downloadBtn" type="submit" formaction="{{ route('download.surat') }}"
                        class="flex items-center gap-2 bg-[#5F9AB8] text-white px-4 py-2 rounded-lg hover:bg-white hover:text-[#457B9D] border-2 border-[#457B9D] transition duration-300 w-full md:w-auto">
                        Download Surat Tugas
                    </button>
                </div>
            </form>
        </div>

        <!-- Preview Surat Tugas -->
        <div id="previewWrapper" class="hidden bg-white w-full mt-6 p-6 shadow-lg rounded">
            <iframe name="previewFrame" class="w-full h-[900px] border" style="min-height: 1100px;"></iframe>
        </div>

        <script>
            const form = document.getElementById('suratForm');
            const previewBtn = document.getElementById('previewBtn');
            const previewWrapper = document.getElementById('previewWrapper');

            form.addEventListener('input', () => {
                const isValid = [...form.querySelectorAll('input, textarea')].every(input => input.value.trim() !== '');
                previewBtn.disabled = !isValid;
                downloadBtn.disabled = !isValid;
            });

            previewBtn.addEventListener('click', function() {
                previewWrapper.classList.remove('hidden');
            });
        </script>

    </main>

</body>

</html>
