@extends('base')

@section('page-content')
<br><br><br><br>
    <div class='fancy_border card'>
        <h1 style='color:#ffe4e4;'>hello. </h1>

        <br><br>
        <form action="/"  method="post">
            @csrf
            <div class="input-group mb-3">
                <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Email">
            </div>

            <div class="input-group mb-3">
                <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password">
            </div>

            <div class="input-group mb-3">
                <input class="btn btn-outline-primary" type="submit">
            </div>
        </form>

        <label class="muted">Use one of these emails</label>
        <div style="padding-left:10px;border-left:2px solid grey;">
            @foreach($users as $user)
                <label class="muted-more" >{{ $user->email }}</label>
            @endforeach
        </div>

        <br><br>
        <div class="container-fluid text-center muted" >Don't have an account? <a href="{{ url('register') }}">Register Here</a></div>

    </div>
@endsection
