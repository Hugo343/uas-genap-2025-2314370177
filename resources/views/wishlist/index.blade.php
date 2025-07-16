@extends('layouts.app')

@section('title', 'Wishlist')

@section('content')
<div class="container mt-4">
    <h3>Wishlist Kamu</h3>
    <ul class="list-group">
        @forelse($favorites as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->product->name }}
                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </li>
        @empty
            <li class="list-group-item">Belum ada produk favorit.</li>
        @endforelse
    </ul>
</div>
@endsection
