<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kopi Doloe</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body style="background-color: #2C1612">
    <div class="container-fluid">
        <div class="row align-items-center" style="height: 100vh">
            <div class="col-md-6">
                <img src="{{ asset('asset/kopi.png') }}" class="img" style="width: 90vh">
            </div>
            <div class="col-md-4">
                <div class="card rounded-5 text-light">
                    <div class="card-body rounded-5" style="background-image: linear-gradient(to right, #6b1f1f, #341c64);">
                        <h3 class="text-center mb-3">SIGN IN</h3>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3 fs-5">
                                <label for="username">Username:</label>
                                <input type="username" name="email" class="form-control" placeholder="Email...." @required(true)>
                            </div>
                            <div class="form-group fs-5">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" placeholder="Password..." @required(true)>
                            </div>
                            <div class="form-group">
                                <button class="form-control rounded-5 mt-4 w-50 mx-auto text-light fs-4" type="submit" class="btn" style="background-color: #B07C0C">Login</button>
                            </div>
                            <div class="form-group mt-2 d-flex justify-content-between">
                                <a href="{{route('password.request')}}" style="text-decoration: none; color: white">forget password</a>
                                <a style="text-decoration: none; color: white" href="{{route('register')}}">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>