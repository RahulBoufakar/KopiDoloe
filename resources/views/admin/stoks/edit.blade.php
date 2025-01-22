@extends('partials.admin_template')

@section('title-page')
    Stoks
@endsection

@section('content')

    <div class="container-md mt-3">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <h1 class="card-header">Ubah Data Stok</h1>
                    <div class="card-body">
                        <form action="{{route('stoks.update', $stok)}}" method="POST" onsubmit="return stripFormatting(this)">
                            @csrf
                            @method('PUT')
                            <div class="form-item">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama" class="form-control" required value="{{$stok->nama_barang}}">
                            </div>
                            <div class="form-item">
                                <label for="jumlah" class="form-label">Jumlah Barang</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required value="{{$stok->jumlah}}">
                            </div>
                            <div class="form-item">
                                <label for="harga" class="form-label">harga Barang</label>
                                <input type="number" name="harga" id="numberInput" class="form-control" required value="{{$stok->harga}}" oninput="formatCurrency(this)">
                            </div>
                            <div class="form-item">
                                <label for="tanggal_kadaluwarsa" class="form-label">tanggal_kadualwarsa</label>
                                <input type="date" name="tanggal_kadaluwarsa" id="tanggal_kadaluwarsa" class="form-control" required value="{{$stok->tanggal_kadaluwarsa}}">
                            </div>
                            <button type="submit" class="btn btn-success form-control mt-2">Update</button>
                            <button type="reset" class="btn btn-danger form-control mt-2">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection