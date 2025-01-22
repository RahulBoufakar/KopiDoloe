@extends('partials.template_pemesanan')

@section('content')

    <div class="container-md">
        <div class="row">
            <div class="col-md-4">
                <div class="card rounded-5" style="background-color: #CD9D8B" id="menu-navigasi">
                    <div class="card-title my-2 border-bottom boreder-light border-5 pb-3" style="display: flex; justify-content: center;">
                        <img src="{{asset('asset/kopi_lurus.png')}}" alt="Kopi" style="width: 150px" class="img-menu rounded-circle shadow-sm border border-2 border-dark">
                    </div>
                    <div class="card-body text-center" >
                        <div class="row">
                            <div class="menu-navigasi">
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <a class="text-decoration-none text-black" href="{{route('main')}}">
                                        <h3>Home</h3>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-3 px-5">
                                        <a class="text-decoration-none text-light" href="{{route('pemesanan.index')}}" >
                                            <h3 style="background-color: #844E39; border-radius: 10px;">Pemesanan</h3>
                                        </a>
                                    </div>
                                </div>
                                @auth
                                @if (Auth::user()->role == 'admin')
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <a class="text-decoration-none text-light" href="{{route('keuangan.index')}}">
                                        <h3>Keuangan</h3>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <a class="text-decoration-none text-light" href="{{route('stoks.index')}}">
                                            <h3>Stok</h3>
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @endauth
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-3 px-5">
                                        <a class="text-decoration-none text-light" href="{{route('pemesanan.history')}}" >
                                            <h3>Riwayat Pemesanan</h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-3">
                                        <form action="{{route('logout')}}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-decoration-none text-light btn fs-3 border-top border-3">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container-md sub-menu-container px-0">
                    <div class="row col-md-12">
                        <div class="menu-banner" id="menu-banner">
                            <p class="fw-bold">Menu Kopi Doloe</p>
                            <p class="fs-5">Pilih Menu favorite Anda</p>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="sub-menu-title border-bottom border-2 border-dark fw-bold fs-4 mt-4">MAKANAN</h5>
                        <div class="col-md-12 mt-2">
                            <div class="sub-menu">
                                <div class="row">
                                    @php $i=1; @endphp
                                    @foreach ($menus as $menu )
                                        @if($menu->kategori == 'Makanan')
                                            @if ($i % 5 == 0)
                                            <div class="row">
                                            @endif
                                            <div class="col-md-3">
                                                <div class="menu-item border border-1 border-dark">
                                                    <div class="menu-item-image">
                                                        <img class="img mt-1" src="{{asset($menu->gambar)}}" alt="" style="width: 150px">
                                                    </div>
                                                    <div class="menu-item-detail mx-2 mb-2">
                                                        <h5 class="menu-item-title mt-1">
                                                            <span class="menu-item-title-text fw-bold fs-6">{{$menu->name}}</span>
                                                        </h5>
                                                        <div class="d-flex flex-row align-items-center gap-2">
                                                        <div class="quantity-controls" id="controls-{{$menu->id}}" style="display: none;">
                                                            <button class="btn btn-sm btn-outline-secondary" onclick="decreaseQuantity({{$menu->id}})">-</button>
                                                            <span id="quantity-{{$menu->id}}">0</span>
                                                            <button class="btn btn-sm btn-outline-secondary" onclick="increaseQuantity({{$menu->id}})">+</button>
                                                        </div>
                                                        @if (isset($stocks[$menu->id]) && $stocks[$menu->id] > 0)
                                                            <button class="btn btn-rounded button-beli fw-bold" id="button-{{ $menu->id }}" type="button" onclick="showQuantityControls({{ $menu->id }}, '{{ $menu->name }}', {{ $menu->harga }})">
                                                                Beli
                                                            </button>
                                                        @else
                                                            <span class="text-danger fw-bold">Stok Habis</span>
                                                        @endif
                                                        <span>Rp. {{number_format($menu->harga, '0', ',', '.')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($i % 5 == 0)
                                            </div>
                                            @endif
                                            @php $i++; @endphp
                                        @endif
                                    @endforeach                               
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="sub-menu-title border-bottom border-2 border-dark fw-bold fs-4 mt-4">Minuman</h5>
                        <div class="col-md-12 mt-2">
                            <div class="sub-menu">
                                <div class="row">
                                    @php $i=1; @endphp
                                    @foreach ($menus as $menu )
                                        @if($menu->kategori == 'Minuman')
                                            @if ($i % 5 == 0)
                                            <div class="row">
                                            @endif
                                            <div class="col-md-3">
                                                <div class="menu-item border border-1 border-dark">
                                                    <div class="menu-item-image">
                                                        <img class="img mt-1" src="{{asset($menu->gambar)}}" alt="" style="width: 150px">
                                                    </div>
                                                    <div class="menu-item-detail mx-2 mb-2">
                                                        <h5 class="menu-item-title mt-1">
                                                            <span class="menu-item-title-text fw-bold fs-6">{{$menu->name}}</span>
                                                        </h5>
                                                        <div class="d-flex flex-row align-items-center gap-2">
                                                        <div class="quantity-controls" id="controls-{{$menu->id}}" style="display: none;">
                                                            <button class="btn btn-sm btn-outline-secondary" onclick="decreaseQuantity({{$menu->id}})">-</button>
                                                            <span id="quantity-{{$menu->id}}">0</span>
                                                            <button class="btn btn-sm btn-outline-secondary" onclick="increaseQuantity({{$menu->id}})">+</button>
                                                        </div>
                                                        @if (isset($stocks[$menu->id]) && $stocks[$menu->id] > 0)
                                                            <button class="btn btn-rounded button-beli fw-bold" id="button-{{ $menu->id }}" type="button" onclick="showQuantityControls({{ $menu->id }}, '{{ $menu->name }}', {{ $menu->harga }})">
                                                                Beli
                                                            </button>
                                                        @else
                                                            <span class="text-danger fw-bold">Stok Habis</span>
                                                        @endif
                                                        <span>Rp. {{number_format($menu->harga, '0', ',', '.')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($i % 5 == 0)
                                            </div>
                                            @endif
                                            @php $i++; @endphp
                                        @endif
                                        @endforeach                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script src="{{ asset('/script.js') }}"></script>
@endsection
