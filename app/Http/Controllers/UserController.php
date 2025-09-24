<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%'.$request->nama.'%');
        }
        if ($request->filled('kelas')) {
            $query->where('kelas', 'like', '%'.$request->kelas.'%');
        }
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->jurusan);
        }

        $students = $query->orderBy('nama')->paginate(10)->withQueryString();

        return view('components.beranda', compact('students'));
    }
}
