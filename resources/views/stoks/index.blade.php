@extends('partials.template1')

@section('content')

    <div class="container-md mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Form Tambah Stok</div>
                    <div class="card-body">
                        <form action="{{route('stoks.store')}}" class="form" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-item">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label for="jumlah" class="form-label">Jumlah Barang</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label for="harga" class="form-label">harga Barang</label>
                                <input type="number" name="harga" id="harga" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label for="tanggal_kadaluwarsa" class="form-label">tanggal_kadualwarsa</label>
                                <input type="date" name="tanggal_kadaluwarsa" id="tanggal_kadaluwarsa" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success form-control mt-2">Simpan</button>
                            <button type="reset" class="btn btn-danger form-control mt-2">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Data Stok</div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Tanggal Kadaluwarsa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stoks as $stok)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$stok->nama_barang}}</td>
                                        <td>{{$stok->jumlah}}</td>
                                        <td>{{$stok->harga}}</td>
                                        <td>{{$stok->tanggal_kadaluwarsa}}</td>
                                        <td>
                                            
                                            <a href="{{ route('stoks.edit', $stok->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('stoks.destroy', $stok->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>                                        
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