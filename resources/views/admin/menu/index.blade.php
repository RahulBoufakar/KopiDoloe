@extends('partials.admin_template')

@section('title-page')
    Menu
@endsection

@section('content')

<div class="container-md mt-1">
    <div class="row">
        <div class="col-md-10 mx-auto">
                <a href="{{route('menu.create')}}" class="btn btn-primary " style="width: 200px">Tambah Menu</a>
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