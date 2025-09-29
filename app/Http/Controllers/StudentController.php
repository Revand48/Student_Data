<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // ✅ Daftar siswa + filter
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('name')) {
            $query->where('nama', 'like', '%'.$request->name.'%');
        }
        if ($request->filled('kelas')) {
            $query->where('kelas', 'like', '%'.$request->kelas.'%');
        }
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->jurusan);
        }

        $siswa = $query->orderBy('nama')->paginate(10)->withQueryString();

        return view('admin.siswa.index', compact('siswa'));
    }

    // ✅ Form tambah siswa
    public function create()
    {
        return view('admin.siswa.create');
    }

    // ✅ Simpan siswa baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'          => 'required|string|max:255',
            'nisn'          => 'nullable|string|max:50|unique:students,nisn',
            'kelas'         => 'nullable|string|max:50',
            'jurusan'       => 'nullable|string|in:LPS,DKV,APHP,KULINER,RPL',
            'alamat'        => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
        ]);

        Student::create($data);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // ✅ Form edit siswa
    public function edit(Student $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    // ✅ Update siswa (jurusan tidak hilang kalau kosong)
    public function update(Request $request, Student $siswa)
    {
        $data = $request->validate([
            'nama'          => 'required|string|max:255',
            'nisn'          => 'nullable|string|max:50|unique:students,nisn,' . $siswa->id,
            'kelas'         => 'nullable|string|max:50',
            'jurusan'       => 'nullable|string|in:LPS,DKV,APHP,KULINER,RPL',
            'alamat'        => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
        ]);

        // ⚡ Kalau jurusan tidak diisi, tetap pakai nilai lama
        if (empty($data['jurusan'])) {
            $data['jurusan'] = $siswa->jurusan;
        }

        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    // ✅ Hapus siswa
    public function destroy(Student $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
