@extends('layouts.admin')
@section('title','Edit Siswa')
@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Siswa</h1>
    @include('admin.siswa.form', ['action' => route('siswa.update', $siswa->id), 'method' => 'PUT', 'siswa' => $siswa])
</div>
@endsection
