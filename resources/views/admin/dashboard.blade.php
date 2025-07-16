@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-4">
    <h2>Dashboard Admin</h2>

    <div class="row text-center my-4">
        <div class="col-md-4">
            <div class="card bg-light p-3">
                <h5>Total Pengguna</h5>
                <h3>{{ $userCount }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light p-3">
                <h5>Total Produk</h5>
                <h3>{{ $productCount }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light p-3">
                <h5>Total Pesanan</h5>
                <h3>{{ $orderCount }}</h3>
            </div>
        </div>
    </div>

    <hr>

    <h4>Produk Terbaru</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Dipublish</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>Rp{{ number_format($product->price) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->is_publish ? 'Ya' : 'Tidak' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Pesanan Terbaru</h4>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentOrders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>Rp{{ number_format($order->total_price) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
