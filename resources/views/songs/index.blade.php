@extends('layouts.app')

@section('content')
<head>
    <!-- Tambahkan CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800">Daftar Lagu</h1>
    <a href="{{ route('songs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4 inline-block hover:bg-blue-600">Tambah Lagu</a>

    <table class="min-w-full mt-6 bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">#</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Judul</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Album</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Durasi</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $song->title }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $song->album->title ?? 'Tidak ada album' }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $song->duration }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        <a href="{{ route('songs.show', $song->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-blue-600">Lihat</a>
                        <a href="{{ route('songs.edit', $song->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus lagu ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
