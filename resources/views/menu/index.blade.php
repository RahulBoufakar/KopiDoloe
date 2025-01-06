@extends('partials.template1')

@section('content')

    <div class="container-md mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Form Menu</div>
                    <div class="card-body">
                        <form action="{{route('menu.store')}}" class="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-item">
                                <label for="nama" class="form-label">Nama Menu</label>
                                <input type="string" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-item">
                                <label for="harga" class="form-label">Harga Menu</label>
                                <input type="string" name="harga" id="harga" class="form-control" required>
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title text-center fw-bold border-bottom border-2 border-danger my-2">Data Menu</div>
                    <div class="card-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                {{-- @dd($menu) --}}
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <img src="{{ asset($menu->gambar) }}" style="width: 100px" alt="Menu Image">
                                        </td>
                                        <td>{{$menu->name}}</td>
                                        <td>{{$menu->harga}}</td>
                                        <td>{{$menu->deskripsi}}</td>
                                        <td>{{$menu->kategori}}</td>
                                        <td>                
                                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
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