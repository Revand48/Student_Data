@props(['siswa' => null, 'action', 'method' => 'POST'])

<form action="{{ $action }}" method="POST" class="min-h-[90dvh] ">
    @csrf
    @if(in_array(strtoupper($method), ['PUT','PATCH','DELETE']))
        @method($method)
    @endif

    <div class="ml-0 md:ml-72 lg:ml-64 xl:ml-56 2xl:ml-48 pt-20 pb-5 px-6">
        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $siswa->nama ?? '') }}" class="mt-1 block w-full border p-2 rounded" required>
            @error('nama') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">NISN</label>
            <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn ?? '') }}" class="mt-1 block w-full border p-2 rounded">
            @error('nisn') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Kelas</label>
            <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas ?? '') }}" class="mt-1 block w-full border p-2 rounded">
            @error('kelas') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Jurusan</label>
            <select name="jurusan" class="mt-1 block w-full border p-2 rounded">
                <option value="">-- Pilih Jurusan --</option>
                @foreach(['LPS','DKV','APHP','KULINER','RPL'] as $j)
                    <option value="{{ $j }}" {{ old('jurusan', $siswa->jurusan ?? '') == $j ? 'selected' : '' }}>
                        {{ strtoupper($j) }}
                    </option>
                @endforeach
            </select>
            @error('jurusan') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium">Alamat</label>
            <textarea name="alamat" class="mt-1 block w-full border p-2 rounded" rows="3">{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
            @error('alamat') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', isset($siswa->tanggal_lahir) ? $siswa->tanggal_lahir->format('Y-m-d') : '') }}" class="mt-1 block w-full border p-2 rounded">
            @error('tanggal_lahir') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="mt-4 flex gap-2 justify-end">
        <a href="{{ route('siswa.index') }}" class="px-4 py-2 rounded bg-gray-200">Batal</a>
        <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white">Simpan</button>
    </div>
</form>
