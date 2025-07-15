@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <h1>Daftar Produk</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Publish</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category->name }}</td>
                <td>Rp {{ number_format($p->price) }}</td>
                <td>{{ $p->is_publish ? 'Ya' : 'Tidak' }}</td>
                <td>
                    <a href="{{ route('products.show', $p) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('products.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
