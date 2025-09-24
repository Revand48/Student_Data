@props(['active' => ''])

<nav x-data="{ open: false, scrolled: false }"
     x-on:scroll.window="scrolled = window.scrollY > 10"
     :class="scrolled ? 'shadow-xl bg-[#0b2e66] backdrop-blur' : 'bg-[#0b2e66]'"
     class="sticky top-0 z-50 text-white transition-all duration-300">

  <!-- baris atas -->
  <div class="hidden md:block text-[#0b2e66] bg-[#f1c848]">
    <div class="max-w-7xl mx-auto px-6 py-1 text-xs">
      <span class="opacity-80">Disiplin | Berprestasi</span>
    </div>
  </div>

  <!-- bar utama -->
  <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

    <!-- Logo -->
    <a href="#beranda" class="flex items-center gap-3">
      <img src="{{ asset('img/one/logo.png') }}"
           alt="Logo"
           class="h-12 w-auto object-contain hover:scale-105 transition-transform duration-300">
      <div class="hidden sm:block">
        <h1 class="text-lg font-bold tracking-wide">StudentData</h1>
        <p class="text-xs opacity-80">Official SMKN 2 MOJOKERTO</p>
      </div>
    </a>

    <!-- Desktop menu -->
    <ul class="hidden md:flex items-center gap-2">
      @foreach(['Beranda'=>'#beranda', 'Tentang'=>'#tentang', 'Data'=>'#data', 'Kontak'=>'#kontak', 'Lokasi'=>'#lokasi'] as $label=>$target)
        <li>
          <a href="{{ $target }}"
             class="px-4 py-2 rounded-md text-sm font-medium relative overflow-hidden
                    {{ $active === $label ? 'bg-blue-700' : 'hover:bg-blue-800' }}
                    transition-all duration-300 group">
            <span class="relative z-10">{{ $label }}</span>
            <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-white
                         group-hover:w-full transition-all duration-400"></span>
          </a>
        </li>
      @endforeach
    </ul>

    <!-- Mobile hamburger -->
    <button @click="open = !open"
            class="md:hidden p-2 rounded-md hover:bg-blue-800 transition">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24">
        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16"/>
        <path x-show="open" stroke-linecap="round" stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
  </div>

  <!-- Mobile menu -->
  <div x-show="open"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="opacity-0 -translate-y-4"
       x-transition:enter-end="opacity-100 translate-y-0"
       x-transition:leave="transition ease-in duration-200"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0 -translate-y-2"
       class="md:hidden bg-blue-800/90 backdrop-blur">
    <ul class="px-6 pb-4 pt-2 space-y-2">
      @foreach(['Beranda'=>'#beranda', 'Tentang'=>'#tentang', 'Data'=>'#data', 'Kontak'=>'#kontak', 'Lokasi'=>'#lokasi'] as $label=>$target)
        <li>
          <a href="{{ $target }}"
             @click="open = false"
             class="block px-3 py-2 rounded-md hover:bg-blue-700 transition">
            {{ $label }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</nav>

@once
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endonce
