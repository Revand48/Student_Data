<section class="relative text-white overflow-hidden " id="beranda"
         style="background-image: url('{{ asset('img/one/bg.jpg') }}'); background-size: cover; background-position: center;">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-[#0b2e66]/80"></div>

    <!-- Ikon bergerak -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        {{-- 4 ikon sekitar gambar (lebih menyebar) --}}
        <img src="{{ asset('img/icon/i1.png') }}" class="absolute w-10 h-10 animate-float"
             style="top: 28%; left: 60%;" />
        <img src="{{ asset('img/icon/i2.png') }}" class="absolute w-10 h-10 animate-float"
             style="top: 58%; left: 66%;" />
        <img src="{{ asset('img/icon/i3.png') }}" class="absolute w-10 h-10 animate-float"
             style="top: 42%; left: 78%;" />
        <img src="{{ asset('img/icon/i4.png') }}" class="absolute w-10 h-10 animate-float"
             style="top: 30%; left: 88%;" />

        {{-- 3 ikon random di area bebas --}}
        <img src="{{ asset('img/icon/i5.png') }}" class="absolute w-9 h-9 animate-float"
             style="top: 15%; left: 18%;" />
        <img src="{{ asset('img/icon/i6.png') }}" class="absolute w-9 h-9 animate-float"
             style="top: 72%; left: 22%;" />
        <img src="{{ asset('img/icon/i7.png') }}" class="absolute w-9 h-9 animate-float"
             style="top: 12%; left: 82%;" />
    </div>

    <!-- Konten -->
    <div class="container mx-auto px-6 py-20 md:py-28 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between">

            <!-- Teks -->
            <div class="w-full md:w-1/2 mb-12 md:mb-0 pl-4 md:pl-10">
                <h1 class="text-7xl md:text-8xl font-extrabold leading-tight mb-6 tracking-tight">
                    <span class="block text-white">STUDENT</span>
                    <span class="block text-[#f1c848]">DATA</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-8">
                    Platform cerdas untuk <span class="text-[#f1c848] font-semibold">pendataan siswa</span>,
                    menghadirkan informasi yang rapi, akurat, dan mudah diakses dalam satu sistem terpadu.
                </p>

                <a href="#datasiswa"
                   class="group relative inline-flex items-center px-8 py-3 text-lg font-medium rounded-lg overflow-hidden">
                    <span class="absolute inset-0 bg-gradient-to-r from-[#f1c848] to-[#0b2e66] transition-all duration-500 group-hover:opacity-90"></span>
                    <span class="relative text-white">Lihat Data Siswa</span>
                    <svg class="w-6 h-6 ml-2 relative text-white group-hover:translate-x-1 transition-transform"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <!-- Foto hover effect -->
            <div class="w-full md:w-2/5 flex justify-center -mt-6">
                <div class="relative group">
                    <img src="{{ asset('img/one/siswav.png') }}" alt="Foto Siswa"
                         class="w-[340px] h-auto object-contain transform transition duration-500 group-hover:scale-110 group-hover:drop-shadow-[0_0_25px_#f1c848]">
                </div>
            </div>
        </div>
    </div>

    <!-- Wave bawah -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
                fill="white"/>
        </svg>
    </div>
</section>

<!-- Animasi floating -->
<style>
@keyframes float {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50% { transform: translateY(-15px) rotate(6deg); }
}
.animate-float {
  animation: float 7s ease-in-out infinite;
  opacity: 0.85;
}
</style>
