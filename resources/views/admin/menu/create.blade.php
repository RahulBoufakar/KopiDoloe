@extends('partials.admin_template')

@section('title-page')
    Menu
@endsection

@section('content')

    <div class="container-md mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Form Menu</div>
                    <div class="card-body">
                        <form action="{{route('menu.store')}}" class="form" method="POST" enctype="multipart/form-data" onsubmit="return stripFormatting(this)">
                            @csrf
                            @method('POST')
                            <div class="form-item">
                                <label for="nama" class="form-label">Nama Menu</label>
                                <input type="string" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label for="harga" class="form-label">Harga Menu</label>
                                <input type="string" name="harga" id="numberInput" class="form-control" oninput="formatCurrency(this)" required>
                            </div>
                            <div class="form-item">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                            </div>
                            <div class="form-item">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success form-control mt-2">Simpan</button>
                            <button type="reset" class="btn btn-danger form-control mt-2">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection