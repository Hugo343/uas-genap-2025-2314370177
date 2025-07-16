@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="container mt-4">
    <h3>Riwayat Pesanan</h3>

    @forelse ($orders as $order)
        <div class="card mb-3">
            <div class="card-header">
                Pesanan #{{ $order->id }} - Status: <strong>{{ $order->status }}</strong>
            </div>
            <div class="card-body">
                <ul>
                    @foreach ($order->items as $item)
                        <li>{{ $item->product->name }} x{{ $item->quantity }} - Rp{{ number_format($item->price * $item->quantity) }}</li>
                    @endforeach
                </ul>
                <p>Total: <strong>Rp{{ number_format($order->total_price) }}</strong></p>
            </div>
        </div>
    @empty
        <p>Tidak ada pesanan.</p>
    @endforelse
</div>
@endsection
