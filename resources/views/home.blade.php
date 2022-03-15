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
                        <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<br><br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="grid-card" style="padding: 20px;">
                <h2 style='color:#ffe4e4;'> {{ $user->name }}</h2>
                <hr>
                <div style="padding:5px;line-height:10px;">
                        <p>Email: </p>
                        <p class="muted">{{ $user->email }}</p>
                        <p>ID: </p>
                        <p class="muted">{{ $user->id }}</p>
                        <p>Joined on: </p>
                        <p class="muted">{{ $user->created_at }}</p>
                </div>
                <a href="{{ url('/logout') }}" class="btn btn-outline-danger float-end">Logout</a>
            </div>
        </div>
        <div class="col">
            <div class="grid-card">
                <canvas id="myChart" class="chart-block"></canvas>
                <script>
                    const a = ("{{ $user->name }}".match(/a/ig)||[]).length;
                    const e = ("{{ $user->name }}".match(/e/ig)||[]).length;
                    const i = ("{{ $user->name }}".match(/i/ig)||[]).length;
                    const o = ("{{ $user->name }}".match(/o/ig)||[]).length;
                    const u = ("{{ $user->name }}".match(/u/ig)||[]).length;

                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['A', 'E', 'I', 'O', 'U'],
                            datasets: [{
                                label: '# of Data points',
                                data: [a, e, i, o, u],
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 206, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>        </div>
        <div class="col">
            <div class="grid-card" style="padding:20px;">
                <p>Cat Fact of the Day</p>
                <hr>
                <p class="muted">{{ $cat_fact }}</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="grid-card" style="padding:20px;height:500px;overflow-y:scroll;">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach($users as $usr)
                            <tr>
                                <th scope="row">{{ $usr->id }}</th>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
@endsection
