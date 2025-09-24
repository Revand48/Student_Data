@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="min-h-[90dvh] bg-gray-50">
    <main class="ml-0 md:ml-72 lg:ml-64 xl:ml-56 2xl:ml-48 pt-20 pb-5 px-6">

        <!-- Selamat Datang -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-[#0b2e66]">
                Selamat Datang, {{ Auth::user()->name ?? 'Admin' }} 👋
            </h1>
            <p class="text-gray-600 mt-1">Anda sedang mengakses dashboard admin.</p>
        </div>

        <!-- Grid Utama -->
        <div class="grid gap-6 lg:grid-cols-3">

            <!-- Kolom Kiri: Card Waktu Akses & Total Siswa -->
            <div class="flex flex-col gap-6">

                <!-- Card Waktu Akses -->
                <div class="py-6 px-4 rounded-xl bg-white shadow-md border-l-4 border-[#f1c848]">
                    <h3 class="text-lg font-bold text-[#0b2e66]">Waktu Akses</h3>
                    <p class="text-gray-600 text-sm">Anda terakhir mengakses dashboard pada:</p>
                    <h2 class="mt-4 text-2xl font-bold text-[#0b2e66]">
                        {{ now()->setTimezone('Asia/Jakarta')->format('H:i') }} WIB
                    </h2>
                    <p class="text-gray-500">
                        {{ now()->setTimezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}
                    </p>
                </div>


                <!-- Card Total Data Siswa -->
                <div class="py-6 px-4 rounded-xl bg-white shadow-md border-l-4 border-[#0b2e66]">
                    <h3 class="text-lg font-bold text-[#0b2e66]">Total Siswa</h3>
                    <p class="text-gray-600 text-sm">Jumlah data siswa terdaftar</p>
                    <h2 class="mt-4 text-3xl font-bold text-[#0b2e66]">
                        {{ $totalSiswa ?? 0 }}
                    </h2>
                </div>
            </div>

            <!-- Kolom Kanan: Kalender (Lebar 2 Kolom) --><div class="py-6 px-4 rounded-xl bg-white shadow-md border-l-4 border-[#004080] lg:col-span-2">

                <h3 class="text-lg font-bold text-[#0b2e66] mb-4">Kalender</h3>

                @php
                    $currentDate = now();
                    $startOfMonth = $currentDate->copy()->startOfMonth();
                    $endOfMonth = $currentDate->copy()->endOfMonth();
                    $startDayOfWeek = $startOfMonth->dayOfWeekIso; // Senin = 1
                    $daysInMonth = $endOfMonth->day;
                @endphp

                <!-- Header Hari -->
                <div class="grid grid-cols-7 text-center font-semibold text-gray-700">
                    <div>Senin</div>
                    <div>Selasa</div>
                    <div>Rabu</div>
                    <div>Kamis</div>
                    <div>Jum'at</div>
                    <div>Sabtu</div>
                    <div>Minggu</div>
                </div>

                <!-- Tanggal -->
                <div class="grid grid-cols-7 text-center mt-2 gap-1">
                    {{-- Spasi kosong sebelum tanggal 1 --}}
                    @for ($i = 1; $i < $startDayOfWeek; $i++)
                        <div></div>
                    @endfor

                    {{-- Loop Tanggal --}}
                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        @php
                            $date = $startOfMonth->copy()->addDays($day - 1);
                            $isToday = $date->isToday();
                        @endphp
                        <div class="py-2 {{ $isToday ? 'bg-[#0b2e66] text-white rounded-full font-bold' : 'text-gray-700' }}">
                            {{ $day }}
                        </div>
                    @endfor
                </div>
            </div>
        </div>

    </main>
</div>
@endsection
