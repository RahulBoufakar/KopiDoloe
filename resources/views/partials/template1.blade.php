<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopi Doloe</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body style="background-color: #2C1612">
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    @include('partials.navigasi')
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
</body>
</html>
