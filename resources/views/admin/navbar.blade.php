<nav id="navbar" class="fixed w-full bg-white/80 backdrop-blur-md shadow-md transition-transform duration-300 transform-gpu z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-[#0b2e66] hover:text-[#f1c848] transition-colors">DASHBOARD | StudentData</a>
        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="md:hidden flex items-center text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>
</nav>
