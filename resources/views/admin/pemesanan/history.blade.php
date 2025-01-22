@extends('partials.admin_template')

@section('title-page')
    Pemesanan
@endsection

@section('content') 
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Riwayat Pemesanan</h1>
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>ID Pelanggan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Harga</th>
                            <th>Total Pesanan</th>
                            <th>Status</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($data as $pemesanan)
                        @php
                            $detail = json_decode($pemesanan->detail_pesanan, true); //ubah string ke array$pemesanan->detail_pesanan;
                            $jumlah_pesanan = count($detail);
                        @endphp
                            <tr >
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemesanan->id_pelanggan }}</td>
                                <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                                <td>{{ $pemesanan->total_harga }}</td>
                                <td>{{ $jumlah_pesanan }}</td>
                                <td>{{ $pemesanan->status }}</td>
                                {{-- <td>
                                    <a href="{{ route('pemesanan.detail', $pemesanan->id) }}" class="btn btn-info">Detail</a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection