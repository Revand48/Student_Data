@extends('layouts.admin')

@section('title', 'Lihat Contact')

@section('content')
<div class="min-h-[90dvh] bg-gray-50 ml-0 md:ml-72 lg:ml-64 xl:ml-56 2xl:ml-48 pt-20 pb-5 px-6">
    {{-- grid 3 kolom --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
        @forelse($contacts as $contact)
            <div class="flex w-[300px] h-[254px] bg-white overflow-hidden rounded-lg shadow-lg flex-col">
                {{-- header --}}
                <div class="flex items-center w-full gap-2.5 p-2.5">
                    <div class="w-[9px] h-[9px] rounded-full shadow-inner" style="background-color: #f1c848;"></div>
                    <div class="w-[9px] h-[9px] rounded-full shadow-inner" style="background-color: #1e3a8a;"></div>
                    <div class="w-[9px] h-[9px] rounded-full shadow-inner" style="background-color: #f1c848;"></div>
                </div>

                {{-- body --}}
                <div class="flex-1 flex flex-col justify-start p-3 gap-1 bg-[#f1c848] rounded-b-lg text-white overflow-hidden">
                    <h3 class="font-bold text-lg truncate">{{ $contact->name }}</h3>
                    <p class="text-sm truncate"><strong>Email:</strong> {{ $contact->email }}</p>
                    <p class="text-sm truncate"><strong>Subject:</strong> {{ $contact->subject }}</p>
                    <p class="text-sm mt-1 overflow-auto"><strong>Message:</strong> {{ $contact->message }}</p>
                </div>
            </div>
        @empty
            <p class="text-gray-500 col-span-full">Belum ada kontak yang masuk.</p>
        @endforelse
    </div>
</div>
@endsection
