@extends('base')

@section('navbar')
    <nav style='padding:20px;' class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TREDX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('page-content')
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="grid-card" style="height:auto;padding:40px;text-align: center;">
                    <img style="border:4px solid lightgrey;width:200px;border-radius: 100%;" src="https://media-exp1.licdn.com/dms/image/C5603AQFIzgSciKce0Q/profile-displayphoto-shrink_400_400/0/1643877239917?e=1652313600&v=beta&t=7SXiXtDhyBHF6lrfF_oo6BtrUHgGElzqF7OdoUF_FSI">
                    <br><br>
                    <h3>You can check me out on LinkedIn</h3>
                    <br>
                    <a class="btn btn-primary" href="https://www.linkedin.com/in/tpitout/">LinkedIn</a>
                    <br><br><hr>
                    <h3>This site was built in</h3>
                    <img width=50 style='margin-right:10px;' src="https://laravel.com/img/logomark.min.svg"><img width=100 src="https://laravel.com/img/logotype.min.svg">
                    <br><br>
                    <img width=100 src="https://www.php.net/images/php8/logo_php8_1.svg">
                    <br><br>
                </div>
            </div>
        </div>
    </div>
@endsection
