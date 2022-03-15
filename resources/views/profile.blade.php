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
                        <a class="nav-link active" href="{{ url('/profile') }}">Profile</a>
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
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="grid-card" style="padding: 20px;">
                    <h2 style='color:#ffe4e4;'> {{ $user->name }}</h2>
                    <hr>
                    <div style="padding:5px;">
                        <table class="table table-dark table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row">ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Created At</th>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="download-button" class="btn btn-outline-primary">Download CSV</button>

                        <script>
                            function htmlToCSV(html, filename) {
                                var data = [];
                                var rows = document.querySelectorAll("table tr");

                                for (var i = 0; i < rows.length; i++) {
                                    var row = [], cols = rows[i].querySelectorAll("td, th");

                                    for (var j = 0; j < cols.length; j++) {
                                        row.push(cols[j].innerText);
                                    }

                                    data.push(row.join(","));
                                }

                                downloadCSVFile(data.join("\n"), filename);
                            }

                            function downloadCSVFile(csv, filename) {
                                var csv_file, download_link;
                                csv_file = new Blob([csv], {type: "text/csv"});
                                download_link = document.createElement("a");
                                download_link.download = filename;
                                download_link.href = window.URL.createObjectURL(csv_file);
                                download_link.style.display = "none";
                                document.body.appendChild(download_link);
                                download_link.click();
                            }

                            document.getElementById("download-button").addEventListener("click", function () {
                                var html = document.querySelector("table").outerHTML;
                                htmlToCSV(html, "profile.csv");
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
