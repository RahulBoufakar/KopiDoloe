@extends('partials.admin_template')

@section('title-page')
    Stok
@endsection

@section('content')

    <div class="container-md mt-3">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <a href="{{route('stoks.create')}}" class="btn btn-primary mb-1 ">Tambah Stok</a>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stoks as $stok)
                                    <tr>
                                        <td>{{ $stok->id }}</td>
                                        <td>{{ $stok->nama_barang }}</td>
                                        <td>{{ $stok->jumlah }}</td>
                                        <td>{{ $stok->updated_at }}</td>
                                        @if($stok->jumlah <= 0)
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    Restock
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Update Stock</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('stoks.update', $stok)}}" method="POST" class="form">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="jumlah" class="form-label">Jumlah</label>
                                                                    <input type="number" name="jumlah" id="jumlah" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
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

@section('script')
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script>
@endsection