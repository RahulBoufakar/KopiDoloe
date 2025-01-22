@extends('partials.admin_template')

@section('title-page')
    Stok
@endsection

@section('content')

    <div class="container-md mt-3">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Form Tambah Stok</div>
                    <div class="card-body">
                        <form action="{{ route('stoks.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="menu_id">Nama Menu</label>
                                <select name="menu_id" id="menu_id" class="form-control text-black" required>
                                    <option value="">Pilih Menu</option>
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection