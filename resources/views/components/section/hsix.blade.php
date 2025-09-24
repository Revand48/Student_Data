<!-- Location Section -->
<section  id="lokasi" class="relative py-13 text-gray-900 overflow-hidden">
    <!-- Background lingkaran gradasi -->
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="w-[1200px] h-[1200px] rounded-full bg-[#f1c848] opacity-20 blur-3xl"></div>
    </div>

    <div class="relative container mx-auto px-6">
            <!-- Judul -->
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <div class="text-center mb-13 transition-all duration-[1500ms] ease-out transform"
                :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-10'">
            <h2 class="text-3xl font-bold leading-tight font-pj sm:text-4xl xl:text-5xl">
                <span class="inline-block text-transparent bg-gradient-to-r from-[#f1c848] to-yellow-400 bg-clip-text animate-pulse">Temukan</span>
                <span class="text-gray-900 dark:text-slate-100"> Kami</span>
            </h2>
            <p class="mt-4 text-base leading-7 text-gray-600 dark:text-slate-300 sm:mt-6">
                Kunjungi lokasi kami dan rasakan suasana belajar dengan akses mudah di Kota Mojokerto
            </p>
            </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 animate-fadeIn">
            <!-- MAP Card -->
            <div
                class="md:col-span-2 bg-white border border-[#f1c848]/40 rounded-lg shadow-md overflow-hidden hover:scale-[1.01] hover:shadow-xl hover:-translate-y-1 transition-all duration-500 ease-in-out relative min-h-[400px]"
            >
                <!-- Maps Embed -->
                <div class="relative w-full overflow-hidden rounded-t-lg h-80 md:h-full">
                    <iframe
                        src="https://maps.google.com/maps?width=600&height=400&hl=en&q=smkn%202%20mojokerto&t=&z=16&ie=UTF8&iwloc=B&output=embed"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        class="w-full h-full"
                    ></iframe>
                </div>

                <!-- Info -->
                <div class="absolute bottom-0 left-0 right-0 flex flex-col md:flex-row md:items-end justify-between gap-4 p-5 text-sm bg-white rounded-b-lg backdrop-blur-sm">
                    <div class="flex-1">
                        <p class="font-semibold text-[#0b2e66]">DaSis - SMKN 2 Mojokerto</p>
                        <p class="leading-tight text-gray-600">
                            Jl. Pulorejo, Pulorejo, Prajurit Kulon,<br>
                            Kota Mojokerto, Jawa Timur 61326, Indonesia.
                        </p>
                        <a href="https://maps.app.goo.gl/5YPCsqjtcmP3m61H9"
                           target="_blank"
                           class="inline-flex items-center mt-2 font-medium transition duration-300 text-[#f1c848] hover:text-[#d4a92b] group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 transition-transform duration-300 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 10-2.828-2.828l-8 8a2 2 0 102.828 2.828l8-8zM8 12a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                            Petunjuk Arah
                        </a>
                    </div>

                    <div class="flex flex-col items-end space-y-1">
                        <img
                            src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&margin=5&data=https://maps.app.goo.gl/5YPCsqjtcmP3m61H9"
                            alt="QR Code Lokasi SMKN 2 Mojokerto"
                            class="border rounded shadow-sm border-[#f1c848]/40"
                        >
                        <p class="text-xs leading-tight text-right text-gray-500">
                            <strong>QR Code Maps</strong>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Informasi Lain -->
            <div class="space-y-6">
                <!-- Transportasi -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-[#f1c848]/40 hover:-translate-y-1 hover:shadow-xl transition-all duration-500">
                    <h3 class="text-xl font-semibold text-[#0b2e66] mb-4 flex items-center">
                        <i class="fas fa-bus-alt text-[#f1c848] mr-2"></i> Transportasi Umum
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="fas fa-motorcycle text-[#0b2e66] mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Dari Gresik</h4>
                                <p class="text-gray-600">Naik Trans Jatim Koridor 3 dari Terminal Bunder ke Terminal Kertajaya Mojokerto.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-car text-[#0b2e66] mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Dari Surabaya</h4>
                                <p class="text-gray-600">Naik Trans Jatim Koridor 2 dari Halte Kota Surabaya ke Terminal Kertajaya Mojokerto.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parkir -->
                <div class="bg-white p-6 rounded-lg shadow-md border border-[#f1c848]/40 hover:-translate-y-1 hover:shadow-xl transition-all duration-500">
                    <h3 class="text-xl font-semibold text-[#0b2e66] mb-4 flex items-center">
                        <i class="fas fa-parking text-[#f1c848] mr-2"></i> Parkir Kendaraan
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="fas fa-motorcycle text-[#0b2e66] mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Motor</h4>
                                <p class="text-gray-600">Area parkir motor tersedia di gerbang utama belok kiri.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-car text-[#0b2e66] mr-3 mt-1"></i>
                            <div>
                                <h4 class="font-medium text-gray-800">Mobil</h4>
                                <p class="text-gray-600">Area parkir mobil tersedia di gerbang utama belok kanan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
