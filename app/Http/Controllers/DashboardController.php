<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        /* ---------- 1. Ambil & validasi bulan/tahun ---------- */
        $month = (int) $request->query('month', Carbon::now()->month);
        $year  = (int) $request->query('year',  Carbon::now()->year);

        // Pastikan rentang valid
        $month = max(1, min(12, $month));
        $year  = max(1970, $year);

        /* ---------- 2. Objek Carbon untuk bulan tersebut ---------- */
        $date = Carbon::create($year, $month, 1);
        $today = Carbon::today();                    // untuk mark-up “hari ini” di kalender

        /* ---------- 3. Data kalender ---------- */
        $startOfCalendar = $date->copy()->startOfWeek(Carbon::SUNDAY); // Minggu pertama
        $daysInMonth     = $date->daysInMonth;

        /* ---------- 4. Navigasi bulan prev / next ---------- */
        $prev = $date->copy()->subMonth();
        $next = $date->copy()->addMonth();

        /* ---------- 5. Total siswa ---------- */
        $totalSiswa = Student::count();

        /* ---------- 6. Kirim ke view ---------- */
        return view('admin.dashboard', compact(
            'date', 'today', 'month', 'year',
            'startOfCalendar', 'daysInMonth',
            'prev', 'next', 'totalSiswa'
        ));
    }
}
