@extends('layouts.admin')

@section('title', 'Daftar Siswa')

@section('content')
<div class="min-h-[90dvh] bg-gray-50">
    <div class="ml-0 md:ml-72 lg:ml-64 xl:ml-56 2xl:ml-48 pt-20 pb-5 px-3">

        {{-- Konten utama --}}
        <main class="flex-1 p-6">

            {{-- ➜ x-data ditempatkan di div paling luar --}}
            <div x-data="{ openDelete:false, deleteId:null, deleteName:'' }">

                {{-- Header & tombol Tambah --}}
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold">Kelola Siswa</h1>
                    <a href="{{ route('siswa.create') }}"
                       class="bg-green-600 text-white px-4 py-2 rounded shadow">
                        + Tambah Siswa
                    </a>
                </div>

                {{-- Alerts --}}
                @if(session('success'))
                    <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Filter --}}
                <form method="GET" action="{{ route('siswa.index') }}"
                      class="mb-4 flex gap-2 flex-wrap">
                    <input type="text" name="name" value="{{ request('name') }}"
                           placeholder="Cari nama..."
                           class="border p-2 rounded w-1/3 min-w-[180px]">
                    <input type="text" name="kelas" value="{{ request('kelas') }}"
                           placeholder="Kelas (contoh: 10A)"
                           class="border p-2 rounded w-1/6 min-w-[120px]">
                    <select name="jurusan" class="border p-2 rounded w-1/6 min-w-[140px]">
                        <option value="">-- Semua Jurusan --</option>
                        <option value="lps"     {{ request('jurusan')=='lps'     ? 'selected' : '' }}>LPS</option>
                        <option value="dkv"     {{ request('jurusan')=='dkv'     ? 'selected' : '' }}>DKV</option>
                        <option value="aphp"    {{ request('jurusan')=='aphp'    ? 'selected' : '' }}>APHP</option>
                        <option value="kuliner" {{ request('jurusan')=='kuliner' ? 'selected' : '' }}>Kuliner</option>
                        <option value="rpl"     {{ request('jurusan')=='rpl'     ? 'selected' : '' }}>RPL</option>
                    </select>

                    <button type="submit" class="bg-yellow-400 px-3 py-2 rounded">Filter</button>
                    <a href="{{ route('siswa.index') }}" class="bg-gray-200 px-3 py-2 rounded">Reset</a>
                </form>

                {{-- Tabel --}}
                <div class="bg-white shadow rounded overflow-hidden">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left">#</th>
                                <th class="px-4 py-3 text-left">Nama</th>
                                <th class="px-4 py-3 text-left">NISN</th>
                                <th class="px-4 py-3 text-left">Kelas</th>
                                <th class="px-4 py-3 text-left">Jurusan</th>
                                <th class="px-4 py-3 text-left">Alamat</th>
                                <th class="px-4 py-3 text-left">Tanggal Lahir</th>
                                <th class="px-4 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siswa as $item)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="px-4 py-3">
                                        {{ $loop->iteration + ($siswa->currentPage()-1) * $siswa->perPage() }}
                                    </td>
                                    <td class="px-4 py-3">{{ $item->nama }}</td>
                                    <td class="px-4 py-3">{{ $item->nisn }}</td>
                                    <td class="px-4 py-3">{{ $item->kelas }}</td>
                                    <td class="px-4 py-3 uppercase">{{ $item->jurusan }}</td>
                                    <td class="px-4 py-3">
                                        {{ \Illuminate\Support\Str::limit($item->alamat, 60) }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $item->tanggal_lahir ? $item->tanggal_lahir->format('d M Y') : '-' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex flex-col gap-2">
                                            {{-- Edit --}}
                                            <a href="{{ route('siswa.edit', $item->id) }}"
                                               class="px-3 py-2 bg-yellow-400 rounded text-sm text-center">
                                                Edit
                                            </a>

                                            {{-- Hidden delete form --}}
                                            <form id="delete-form-{{ $item->id }}"
                                                  action="{{ route('siswa.destroy', $item->id) }}"
                                                  method="POST" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            {{-- Tombol Hapus --}}
                                            <button
                                                @click="openDelete = true;
                                                        deleteId = {{ $item->id }};
                                                        deleteName = '{{ $item->nama }}' "
                                                class="px-3 py-2 bg-red-500 text-white rounded text-sm">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-12 text-center text-gray-500">
                                        Belum ada data siswa
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="p-4">
                        {{ $siswa->links() }}
                    </div>
                </div>

                {{-- ############################################
                     MODAL KONFIRMASI (sekarang di dalam x-data)
                     ############################################ --}}
                <div x-show="openDelete" x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
                    <div @click.away="openDelete = false"
                         class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                        <h3 class="text-lg font-semibold mb-2">Konfirmasi Hapus</h3>
                        <p class="mb-4 text-gray-600">
                            Yakin ingin menghapus siswa: <strong x-text="deleteName"></strong> ?
                        </p>

                        <div class="flex justify-end gap-2">
                            {{-- Batal --}}
                            <button @click="openDelete = false"
                                    class="px-4 py-2 rounded bg-gray-200">
                                Batal
                            </button>

                            {{-- Ya, Hapus --}}
                            <button
                                @click="document.getElementById('delete-form-'+deleteId).submit()"
                                class="px-4 py-2 rounded bg-red-500 text-white">
                                Ya, Hapus
                            </button>
                        </div>
                    </div>
                </div>
                {{-- ###############  akhir modal  ################ --}}

            </div> {{-- /x-data --}}
        </main>
    </div>
</div>
@endsection
