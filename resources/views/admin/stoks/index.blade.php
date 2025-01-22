@extends('partials.admin_template')

@section('title-page')
    Stok
@endsection

@section('content')

    <div class="container-md mt-3">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <a href="{{route('stoks.create')}}" class="btn btn-primary">Tambah Stok</a>
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Data Stok</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Diperbarui</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stoks as $stok)
                                    <tr>
                                        <td>{{ $stok->id }}</td>
                                        <td>{{ $stok->nama_barang }}</td>
                                        <td>{{ $stok->jumlah }}</td>
                                        <td>{{ $stok->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection