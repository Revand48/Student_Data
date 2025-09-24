@extends('layouts.admin')
@section('title','Tambah Siswa')
@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Siswa</h1>
    @include('admin.siswa.form', ['action' => route('siswa.store'), 'method' => 'POST', 'siswa' => null])
</div>
@endsection
