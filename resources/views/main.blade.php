@extends('partials.template1')

@section('content')
    <div class="container" id="banner-container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <div class="bg-primary text-white rounded-3 p-5 mt-1" id="banner">
                    <h1 class="display-4 fw-bold">Kedai Kopi Dolo</h1> 
                    <p class="lead fw-bold">Temukan Kenyamanan dalam Secangkir Kopi Sempurna.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3" id="menu">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-light fs-12" id="slogan-menu">Pesan Sekarang dan Nikmati Secangkir Kebahagiaan</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mx-auto">
                <ul id="menu-list" class="d-flex flex-row justify-content-between" style="font-family: 'Times New Roman', Times, serif">
                    <li class="menu-item" >
                        <img src="asset/kopi_jahe.png" alt="" class="img-menu rounded-circle border border-3 border-danger shadow-sm">
                        <div id="detail-menu" class="text-center text-dark bg-secondary mt-1 d-flex flex-column justify-content-center align-items-center">
                            <p class="nama_menu fw-bold mb-1">Kopi Jahe</p>
                            <p class="harga_menu mb-2">Rp. 5000</p>
                        </div>
                    </li>
                    <li class="menu-item" >
                        <img src="asset/kopi_susu.png" alt="" class="img-menu rounded-circle border border-3 border-danger shadow-sm">
                        <div id="detail-menu" class="text-center text-dark bg-secondary mt-1 d-flex flex-column justify-content-center align-items-center">
                            <p class="nama_menu fw-bold mb-1">Kopi Susu</p>
                            <p class="harga_menu mb-2">Rp. 10000</p>
                        </div>
                    </li>
                    <li class="menu-item" >
                        <img src="asset/Telur_gulung.png" alt="" class="img-menu rounded-circle border border-3 border-danger shadow-sm">
                        <div id="detail-menu" class="text-center text-dark bg-secondary mt-1 d-flex flex-column justify-content-center align-items-center">
                            <p class="nama_menu fw-bold mb-1">Telur Gulung</p>
                            <p class="harga_menu mb-2">Rp. 15000</p>
                        </div>
                    </li>
                    <li class="menu-item" >
                        <img src="asset/Martabak_telur.png" alt="" class="img-menu rounded-circle border border-3 border-danger shadow-sm">
                        <div id="detail-menu" class="text-center text-dark bg-secondary mt-1 d-flex flex-column justify-content-center align-items-center">
                            <p class="nama_menu fw-bold mb-1">Martabak Telur</p>
                            <p class="harga_menu mb-2">Rp. 5000</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection