@extends('partials.admin_template')

@section('title-page')
    Menu
@endsection

@section('content')
    <div class="container-md mt-3">
        <div class="row">
            <div class="col-md-6 mx-auto mb-3">
                <div class="card">
                    <h1 class="card-header mx-auto">Ubah Data Menu</h1>
                    <div class="card-body">
                        <div class="col-md-6 mx-auto">
                            <img class="img img-thumbnail offset-1 bg-dark" src="{{ asset($menu->gambar) }}" style="width: 200px" alt="Menu Image">
                        </div>
                        <form action="{{route('menu.update', $menu)}}" method="POST" enctype="multipart/form-data" onsubmit="return stripFormatting(this)">
                            @csrf
                            @method('PUT')
                            <div class="form-item">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{$menu->name}}">
                            </div>
                            <div class="form-item">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="numberInput" class="form-control" required value="{{$menu->harga}}" oninput="formatCurrency(this)">
                            </div>
                            <div class="form-item">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" required value="{{$menu->deskripsi}}">
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
                            <button type="submit" class="btn btn-success form-control mt-2">Update</button>
                            <button type="reset" class="btn btn-danger form-control mt-2">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection