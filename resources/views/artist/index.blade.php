@extends('layouts.app') <!-- pastikan menggunakan layout yang sesuai di proyek Anda -->

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Artist</h1>
        <a href="{{ route('artists.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah Artist</a>
    </div>

    <!-- Tabel Daftar Artist -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase">Nama</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase">Genre</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artists as $artist)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 border-b border-gray-200">{{ $artist->name }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{ $artist->genre ?? '-' }}</td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <a href="{{ route('artists.show', $artist->id) }}" class="text-blue-500 hover:underline mr-2">Lihat</a>
                        <a href="{{ route('artists.edit', $artist->id) }}" class="text-yellow-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
</div>
@endsection
