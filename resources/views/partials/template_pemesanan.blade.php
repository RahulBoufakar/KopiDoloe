<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Doloe</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>
<body style="background-color: #D9D9D9">
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    @include('partials.navigasi_kembali')
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        
    </footer>
    <!-- Include Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @yield('script')
</body>
</html>
