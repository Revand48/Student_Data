<aside class="fixed top-16 left-0 w-full h-[calc(100vh-8rem)] bg-white shadow-md z-10 overflow-y-auto md:w-74 lg:w-66 xl:w-58 2xl:w-50">
  <div class="flex flex-col justify-between h-full p-4">

    <!-- User -->
    <div class="text-center">
      <img src="{{ asset('img/one/lg-admin.png') }}"
           class="w-16 h-16 mx-auto rounded-full object-cover border-4 border-[#0b2e66]" alt="User">
      <h5 class="mt-3 text-lg font-semibold text-[#0b2e66]">Admin</h5>
      <span class="text-sm text-gray-500">StudentData</span>
    </div>

    <!-- Menu -->
    <ul class="space-y-5">
      <li>
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-white bg-[#0b2e66] hover:bg-[#f1c848] hover:text-[#0b2e66] transition">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8v-10h-8v10zm0-18v6h8V3h-8z"/></svg>
          <span class="text-md font-medium">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ route('siswa.index') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-gray-700 hover:bg-[#f1c848] hover:text-[#0b2e66] transition">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2H2V5zM2 9h16v6a2 2 0 01-2 2H4a2 2 0 01-2-2V9z"/></svg>
          <span class="text-md">Data Siswa</span>
        </a>
      </li>
      <li>
        <a href="{{ route('dashboard.list_contacts') }}" class="flex items-center space-x-3 px-3 py-2 rounded-md text-gray-700 hover:bg-[#f1c848] hover:text-[#0b2e66] transition">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 9V5h2v6H9zM9 13h2v2H9v-2z"/></svg>
          <span class="text-md">Liat Contact</span>
        </a>
      </li>
    </ul>

        <!-- Logout -->
        <div class="border-t pt-4">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"
            class="flex items-center space-x-3 px-3 py-2 rounded-md text-gray-700 hover:bg-[#f1c848] hover:text-[#0b2e66] transition w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span class="text-sm">Logout</span>
            </button>
        </form>
        </div>


  </div>
</aside>
