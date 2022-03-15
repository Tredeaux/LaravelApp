@extends('base')

@section('page-content')
<br><br><br><br>
    <div class='fancy_border card'>
        <h1 style='color:#ffe4e4;'>happy to see you join. </h1>

        <br><br>
        <form action="/register"  method="post">
            @csrf
            <div class="input-group mb-3">
                <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Name">
            </div>

            <div class="input-group mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email">
            </div>

            <div class="input-group mb-3">
                <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" pattern=".{8,}">
            </div>

            <div class="input-group mb-3">
                <input name="password2" type="password" class="form-control" placeholder="Retype Password" aria-label="Password2">
            </div>

            <div class="input-group mb-3">
                <input class="btn btn-outline-primary" type="submit">
            </div>
        </form>

        <br><br>
        <div class="container-fluid text-center muted" >Already have an account? <a href="{{ url('/') }}">Login Here</a></div>

    </div>
@endsection
