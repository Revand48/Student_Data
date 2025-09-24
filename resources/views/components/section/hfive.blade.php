<section id="kontak" class="py-13 relative">
    <div class="absolute inset-0 flex items-center justify-center overflow-hidden pointer-events-none">
        <div class="w-[1200px] h-[1200px] rounded-full bg-gradient-to-b from-[#0b2e66] to-[#f1c848] opacity-20 blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6">
        <div class="text-center mb-13">
            <h2 class="text-3xl font-bold sm:text-4xl xl:text-5xl">
                <span class="text-yellow-400">Kontak</span> Kami
            </h2>
            <p class="mt-4 text-base text-gray-600 sm:mt-6">
                Dapat Menghubungi dan Kritik Kami Melalui Informasi dibawah ini
            </p>
        </div>

         {{-- Pesan sukses --}}
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Pesan error --}}
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white/70 backdrop-blur-sm p-8 rounded-lg shadow-md hover:shadow-lg transition">
                

                {{-- Form Kontak --}}
                <form method="POST" action="{{ route('kontak.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#f1c848] focus:border-transparent transition duration-300">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Alamat Email</label>
                        <input type="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#f1c848] focus:border-transparent transition duration-300">
                    </div>
                    <div class="mb-6">
                        <label for="senject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                        <select name="subject" class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#f1c848] focus:border-transparent transition duration-300">
                            <option value="">Pilih Subjek</option>
                            <option value="Komplain" {{ old('subject')=='Komplain'?'selected':'' }}>Komplain</option>
                            <option value="Pertanyaan" {{ old('subject')=='Pertanyaan'?'selected':'' }}>Pertanyaan</option>
                            <option value="Saran" {{ old('subject')=='Saran'?'selected':'' }}>Saran</option>
                            <option value="Lainnya" {{ old('subject')=='Lainnya'?'selected':'' }}>Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <textarea name="message" rows="5" placeholder="Pesan"
                                class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#f1c848] focus:border-transparent transition duration-300">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#f1c848] text-white py-3 rounded hover:bg-yellow-500 transition duration-300">
                        Kirim Pesan
                    </button>
            </div>




            <!-- Info Kontak -->
            <div>
                <div class="bg-white/70 backdrop-blur-sm p-8 rounded-lg shadow-md mb-8">
                    <h3 class="text-xl font-semibold mb-4">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-xl text-red-500 mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-medium">Alamat</h4>
                                <p>Jl. Pulorejo, Kec. Prajurit Kulon, Kota Mojokerto 61328</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone-alt text-xl text-yellow-500 mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-medium">Telepon</h4>
                                <p>(0321) 322 867</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-xl text-gray-600 mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-medium">Email</h4>
                                <p>smkn2mojokerto@gmail.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-search text-xl text-gray-600 mr-4 mt-1"></i>
                            <div>
                                <h4 class="font-medium">Website</h4>
                                <p>https://www.smkn2mojokerto.sch.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white/70 backdrop-blur-sm p-8 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Jam Operasional</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span>Senin - Jumat</span><span>07:30 - 15:00</span>
                        </div>
                        <div class="flex justify-between border-b border-gray-200 pb-2">
                            <span>Sabtu</span><span>08:00 - 11:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Minggu</span><span class="text-red-500">Libur</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t-2 border-b-2 mt-10 h-2 border-[#0b2e66] flex-grow"></div>
</section>
