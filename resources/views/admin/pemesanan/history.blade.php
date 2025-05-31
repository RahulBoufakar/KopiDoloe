@extends('partials.admin_template')

@section('title-page')
    Pemesanan
@endsection

@section('content') 
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Riwayat Pemesanan</h1>
                
                <!-- Filter Feature -->
                <div class="d-flex justify-content-end mb-4">
                    <div class="d-flex align-items-center gap-2">
                        <div class="form-group mb-2 mr-2">
                            <label for="start_date" class="mr-2">Start-Date:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                        </div>
                        <div class="form-group mb-2 mr-2">
                            <label for="end_date" class="mr-2">End-Date:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                        </div>
                        <button type="button" class="btn btn-primary mb-2" id="filterButton" style="height: auto;">Filter</button>
                    </div>
                </div>
                
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>ID Pelanggan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Harga</th>
                            <th>Total Pesanan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="pemesananTable">
                        @foreach($data as $pemesanan)
                        @php
                            $detail = json_decode($pemesanan->detail_pesanan, true); // Convert string to array
                            $jumlah_pesanan = count($detail);
                        @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemesanan->id_pelanggan }}</td>
                                <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                                <td>{{ $pemesanan->total_harga }}</td>
                                <td>{{ $jumlah_pesanan }}</td>
                                <td>{{ $pemesanan->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('filterButton').addEventListener('click', function() {
            var startDate = document.getElementById('start_date').value;
            var endDate = document.getElementById('end_date').value;
            var tableBody = document.getElementById('pemesananTable');
            var rows = tableBody.getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var tanggalPemesanan = rows[i].getElementsByTagName('td')[2].innerText;
                var tanggalPemesananDate = new Date(tanggalPemesanan);

                if ((startDate && tanggalPemesananDate < new Date(startDate)) || (endDate && tanggalPemesananDate > new Date(endDate))) {
                    rows[i].style.display = 'none';
                } else {
                    rows[i].style.display = '';
                }
            }
        });
    </script>
@endsection
