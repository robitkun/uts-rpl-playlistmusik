@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Detail Lagu: {{ $song->title }}</h1>

    <div class="mb-4">
        <strong class="text-lg">Album:</strong>
        <p class="text-gray-700">{{ $song->album->title ?? 'Tidak ada album' }}</p>
    </div>

    <div class="mb-4">
        <strong class="text-lg">Durasi:</strong>
        <p class="text-gray-700">{{ $song->duration }}</p>
    </div>

    <a href="{{ route('songs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Kembali ke Daftar Lagu</a>
</div>
@endsection
