@extends('partials.admin_template')

@section('title-page')
    Keuangan
@endsection

@section('content')

    <div class="container-md mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Form Catatan Keuangan</div>
                    <div class="card-body">
                        <form action="{{route('keuangan.store')}}" class="form" method="POST" onsubmit="return stripFormatting(this)">
                            @csrf
                            @method('POST')
                            <div class="form-item">
                                <label for="tanggal" class="form-label">Tanggal Pencatatan</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="Pemasukan">Pemasukan</option>
                                    <option value="Pengeluaran">Pengeluaran</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label for="Jumlah" class="form-label">Jumlah(RP)</label>
                                <input type="numbers" name="jumlah" id="numberInput" class="form-control" oninput="formatCurrency(this)" required>
                            </div>
                            <button type="submit" class="btn btn-success form-control mt-2">Simpan</button>
                            <button type="reset" class="btn btn-danger form-control mt-2">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Data Keuangan</div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah(RP)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keuangans as $keuangan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$keuangan->tanggal}}</td>
                                        <td>{{$keuangan->kategori}}</td>
                                        <td>{{$keuangan->keterangan}}</td>
                                        <td>{{$keuangan->jumlah}}</td>
                                        <td>
                                            
                                            <a href="{{ route('keuangan.edit', $keuangan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('keuangan.destroy', $keuangan->id) }}" method="POST" style="display: inline-block;">
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