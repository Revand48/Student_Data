@props(['students'])

<section class="relative py-13" id="data">
    <!-- Background lingkaran gradasi -->
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="w-[1200px] h-[1200px] rounded-full bg-[#0b2e66] opacity-20 blur-3xl"></div>
    </div>

    <div class="px-6 mx-auto max-w-7xl lg:px-8">
        <div class="text-center mb-13 transition-all duration-[1500ms] ease-out transform"
             :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-10'">
            <h2 class="text-3xl font-bold leading-tight font-pj sm:text-4xl xl:text-5xl">
                <span class="inline-block text-transparent bg-gradient-to-r from-[#f1c848] to-yellow-400 bg-clip-text animate-pulse">Tabel</span>
                <span class="text-gray-900 dark:text-slate-100"> Data </span>
                <span class="inline-block text-transparent bg-gradient-to-r from-[#f1c848] to-yellow-400 bg-clip-text animate-pulse">Siswa</span>
            </h2>
            <p class="mt-4 text-base leading-7 text-gray-600 dark:text-slate-300 sm:mt-6">
                Berikut adalah data siswa yang terdaftar di website Student Data SMKN 2 Mojokerto.
            </p>
        </div>

        <div class="relative container mx-auto px-6">
            <!-- Filter -->
            <form method="get" action="{{ route('students.index') }}" class="mb-6"
                  x-data="{
                      nama: '{{ request('nama') }}',
                      kelas: '{{ request('kelas') }}',
                      jurusan: '{{ request('jurusan') }}',
                      resetFilters() {
                          this.nama = '';
                          this.kelas = '';
                          this.jurusan = '';
                          this.$el.submit();
                      }
                  }">
                <div class="flex flex-wrap items-end gap-4 mb-4">
                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" name="nama" x-model="nama"
                               class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                               placeholder="Cari nama...">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <input type="text" name="kelas" x-model="kelas"
                               class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                               placeholder="Cari kelas...">
                    </div>

                    <div class="flex flex-col">
                        <label class="text-sm font-medium text-gray-700 mb-1">Jurusan</label>
                        <select name="jurusan" x-model="jurusan"
                                class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="">Semua Jurusan</option>
                            <option value="LPS">LPS</option>
                            <option value="APHP">APHP</option>
                            <option value="DKV">DKV</option>
                            <option value="Kuliner">Kuliner</option>
                            <option value="RPL">RPL</option>
                        </select>
                    </div>

                    <button type="submit"
                            class="px-4 py-2 bg-yellow-400 text-white font-medium rounded hover:bg-yellow-500 transition">
                        Terapkan
                    </button>
                    <button type="button" @click="resetFilters()"
                            class="px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded hover:bg-gray-300 transition">
                        Reset
                    </button>
                </div>
            </form>

            <!-- Tabel -->
            <div class="overflow-x-auto relative z-10">
                <table class="w-full border border-yellow-300 rounded-lg shadow-sm overflow-hidden">
                    <thead class="bg-yellow-200 text-gray-900">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">No</th>
                            <th class="px-4 py-3 text-left font-semibold">Nama</th>
                            <th class="px-4 py-3 text-left font-semibold">NISN</th>
                            <th class="px-4 py-3 text-left font-semibold">Kelas</th>
                            <th class="px-4 py-3 text-left font-semibold">Jurusan</th>
                            <th class="px-4 py-3 text-left font-semibold">Alamat</th>
                            <th class="px-4 py-3 text-left font-semibold">Tanggal Lahir</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-yellow-200">
                        @forelse($students as $index => $student)
                            <tr class="hover:bg-yellow-100 transition">
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3">{{ $student->nama }}</td>
                                <td class="px-4 py-3">{{ $student->nisn }}</td>
                                <td class="px-4 py-3">{{ $student->kelas }}</td>
                                <td class="px-4 py-3">{{ $student->jurusan }}</td>
                                <td class="px-4 py-3">{{ $student->alamat }}</td>
                                <td class="px-4 py-3">{{ $student->tanggal_lahir }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-3 text-center">Tidak ada data ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 relative z-10">
                <div class="p-2 border-t dark:border-gray-700 w-full">
                    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
                        <div class="py-2 px-2 border rounded-lg border-[#0b2e66]">
                            {{ $students->links('pagination::tailwind') }}
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="border-t-2 border-b-2 mt-10 h-2 border-[#0b2e66] flex-grow"></div>
