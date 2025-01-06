@extends('partials.template_edit')

@section('content')

    <div class="container-md mt-3">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <h1 class="card-header">Ubah Data Keuangan</h1>
                    <div class="card-body">
                        <form action="{{route('keuangan.update', $keuangan)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-item">
                                <label for="tanggal" class="form-label">Tanggal Pencatatan</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required value="{{$keuangan->tanggal}}">
                            </div>
                            <div class="form-item">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required value="{{$keuangan->kategori}}">
                                    <option value="Pemasukan">Pemasukan</option>
                                    <option value="Pengeluaran">Pengeluaran</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" required value="{{$keuangan->keterangan}}">
                            </div>
                            <div class="form-item">
                                <label for="Jumlah" class="form-label">Jumlah(RP)</label>
                                <input type="number" name="jumlah" id="Jumlah" class="form-control" required value="{{$keuangan->jumlah}}">
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