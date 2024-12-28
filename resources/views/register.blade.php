<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laravel Simple Ecommerce</title>


    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom CSS file -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

    <style>
        p {
            margin-bottom: 0;
        }

        .margin-custom {
            margin-top: 10%;
        }

        .login-title {
            font-family: 'Poppins';
            font-size: 40px;
        }

        .sub-login-title {
            font-family: 'Poppins';
            font-size: 25px;
            color: gray
        }
        .title-form-login{
            font-family: 'Poppins';
            font-size: 30px;
            text-align: center;
        }
        .login-now{

        }
    </style>

</head>

<body>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm margin-custom d-flex justify-content-center">
                    <div>
                        <p class="login-title fw-bold">Welcome Back!</p>
                        <p class="sub-login-title fw-light color">Sign Up now to continue</p>
                        <img src="{{ url('asset/images/678 1.png') }}" alt="image" width="385px" height="400px">
                    </div>
                </div>
                <div class="col-sm margin-custom d-flex justify-content-center">
                    <div class="container-fluid w-75">
                        <p class="title-form-login fw-bold">Sign Up To UniMarket!</p>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="6+ Character" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-3">Register</button>
                        <div class="container d-flex justify-content-center mt-2">
                            <p class="me-1">Have any account?</p>
                            <a class="login-now" href="/login">Login Now</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </section>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('dropdown-toggle').dropdown()
        });
    </script> --}}
</body>
