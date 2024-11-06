@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Artist</h1>
    </div>

    <!-- Form Edit Artist -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('artists.update', $artist->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Field Nama -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama Artist:</label>
                <input type="text" name="name" id="name" value="{{ $artist->name }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- Field Genre -->
            <div class="mb-4">
                <label for="genre" class="block text-gray-700">Genre (Opsional):</label>
                <input type="text" name="genre" id="genre" value="{{ $artist->genre }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-end">
                <a href="{{ route('artists.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Batal</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
