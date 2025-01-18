@extends('partials.template_pemesanan')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center my-3 fw-bold">Invoice Pembayaran</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td colspan="3">Id Pemesanan: {{$data->id}}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Tanggal Pemesanan: {{$data->tanggal_pemesanan}}</td>
                            </tr>
                            <tr>
                                <td>No</td>
                                <td>Menu</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->detail_pesanan as $menu)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $menu->name}}</td>
                                    <td>{{ $menu->quantity}}</td>
                                    <td>{{ $menu->price}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">Total Harga : {{ $data->total_harga}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection