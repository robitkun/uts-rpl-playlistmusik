@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Detail Artist</h1>
    </div>

    <!-- Detail Artist -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">{{ $artist->name }}</h2>
        
        <div class="mb-4">
            <strong>Genre:</strong>
            <p class="text-gray-700">{{ $artist->genre ?? 'Tidak Diketahui' }}</p>
        </div>
        
        <div class="mb-4">
            <strong>Dibuat Pada:</strong>
            <p class="text-gray-700">{{ $artist->created_at->format('d M Y') }}</p>
        </div>

        <div class="mb-4">
            <strong>Diperbarui Pada:</strong>
            <p class="text-gray-700">{{ $artist->updated_at->format('d M Y') }}</p>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-start mt-6">
            <a href="{{ route('artists.edit', $artist->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-yellow-600">Edit</a>
            <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus artist ini?')" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Hapus</button>
            </form>
            <a href="{{ route('artists.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md ml-2 hover:bg-gray-600">Kembali</a>
        </div>
    </div>
</div>
@endsection
