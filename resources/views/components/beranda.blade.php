@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

    <x-section.hone />
    <x-section.htwo />
    <x-section.hthree />
    <x-section.hfour :students="$students" />
    <x-section.hfive />
    <x-section.hsix />

@endsection
