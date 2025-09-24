@extends('layouts.auth')

@section('title', 'Login Sekolah')

@section('content')
<div class="relative w-full h-screen flex items-center justify-center font-['Raleway'] overflow-hidden group bg-white">

    <!-- Background Top -->
    <div class="absolute inset-0">
        <div class="absolute w-[200vmax] h-[200vmax] bg-[#0b2e66] rotate-45 opacity-70 top-1/2 left-1/2
            -translate-x-1/2 -translate-y-1/2 transition-all duration-500
            ease-[cubic-bezier(0.445,0.05,0,1)] delay-200
            group-hover:ml-[200px] group-hover:origin-[-200px_50%]">
        </div>
        <div class="absolute w-[200vmax] h-[200vmax] bg-[#f1c848] rotate-[135deg] opacity-70 top-1/2 left-1/2
            -translate-x-1/2 -translate-y-1/2 transition-all duration-500
            ease-[cubic-bezier(0.445,0.05,0,1)] delay-200
            group-hover:ml-[200px] group-hover:origin-[-200px_50%]">
        </div>
    </div>

    <!-- Background Bottom -->
    <div class="absolute inset-0">
        <div class="absolute w-[200vmax] h-[200vmax] bg-[#0b2e66] -rotate-45 opacity-70 top-1/2 left-1/2
            -translate-x-1/2 -translate-y-1/2 transition-all duration-500
            ease-[cubic-bezier(0.445,0.05,0,1)] delay-200
            group-hover:ml-[200px] group-hover:origin-[-200px_50%]">
        </div>
        <div class="absolute w-[200vmax] h-[200vmax] bg-[#f1c848] -rotate-[135deg] opacity-70 top-1/2 left-1/2
            -translate-x-1/2 -translate-y-1/2 transition-all duration-500
            ease-[cubic-bezier(0.445,0.05,0,1)] delay-200
            group-hover:ml-[200px] group-hover:origin-[-200px_50%]">
        </div>
    </div>

    <!-- Login Form -->
    <div class="relative z-20 w-[400px] max-w-[90%] bg-white p-8 rounded-xl shadow-lg border-2 border-[#0b2e66] text-center opacity-0
        transition-all duration-500 ease-[cubic-bezier(0.445,0.05,0,1)] group-hover:opacity-100 delay-200">

        <h2 class="text-2xl font-bold text-[#0b2e66] mb-6">Login</h2>

        <!-- tampilkan pesan error -->
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="flex flex-col gap-4">
            @csrf
            <input type="text" name="username" placeholder="Username"
                value="{{ old('username') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#0b2e66] outline-none" required>

            <input type="password" name="password" placeholder="Password"
                class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#0b2e66] outline-none" required>

            <button type="submit"
                class="mt-4 w-full py-3 bg-[#f1c848] text-[#0b2e66] font-semibold rounded hover:bg-[#eabf3e] transition">
                Login
            </button>
        </form>
    </div>
</div>
@endsection
