<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Online Baznas Kab Pasaman</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link href="css/style1.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <style type="text/css">
    @media  screen and (min-width: 922px;){
        body {
    font-size: 16px; /* Atur ukuran font dasar */
}

h1 {
    font-size: 2em; /* Ukuran font h1 adalah 2 kali ukuran font dasar */
}

.container {
    width: 100%;
   min-height: 200px;
}

    .table {
        width: 50%;
    }


    }

    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-3">
        <button style="width: 7%" class="btn btn-mb btn-light" id="toggle-sidebar"><i class="fas fa-sliders-h"></i></button>
        <button class="navbar-toggler" type="button" data- toggle="collapse" data-target="#navbarTogglerDemo03" aria- controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">


        <span class="navbar-toggler-icon"></span>

        </button>
        <a class="navbar-brand" href="https://baznas.pasamankab.go.id/" target="_blank"><font color="white">BAZNAS KABUPATEN PASAMAN</font></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">


        </div>
        <a style="color:aliceblue; text-decoration:none; font-size:20px" class="text-right" href="{{url('/logout')}}">Log out</a>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
       </nav>

       <div class="container">
        @yield('content')
       </div>

       <div id="content">
        <main class="py-4">

        <div id="sidebar">
            <button class="btn btn-mb btn-light" id="hide-sidebar" align="center"><i class="fas fa-sliders-h"></i></button>
            <hr>
            <p><img src="gambar/Logo baznas.jpg" alt="logo" width="70">
                BAZNAS KAB. PASAMAN
                </p>
                <hr>
                <div class="text-center">
                    <p><a style="width: 100%;" class="btn btn-primary" href="{{route('home')}}"><i class="fas fa-tachometer-alt"></i> DASHBOARD</a></p>
                    <p><a style="width: 100%;" class="btn btn-secondary" href="{{route('user.index')}}"><i class="far fa-user"></i> USER</a></p>

            </div>

            <div class="container">




                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <font color="white"> Dropdown link</font>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('berobat.index')}}">BEROBAT</a>
                        <a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('beasiswa.index')}}">BEASISWA</a>
                        <a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('modalusaha.index')}}">MODAL USAHA</a>
                        <a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('peduli.index')}}">KKM/JOMPO</a>
                        <a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('imtaq.index')}}">IMTAQ</a>
                        <hr class="dropdown-divider">

                    </div>


                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('suratmasuk.index')}}"> SURAT MASUK</a></p>
                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('sptsppd.index')}}"> SPT & SPPD</a></p>
                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('ekspedisi.index')}}"> EKSPEDISI</a></p>
                <p><a style="color:aliceblue; text-decoration:none; font-size:20px" href="{{route('rekomendasi.index')}}"> REKOMENDASI</a></p>
            </div>

        </div>
        </main>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/myscript.js"></script>
    <script src="js/modalscr.js"></script>
    <script src="js/sidebar.js"></script>

    <!-- File: resources/views/layouts/app.blade.php -->

<!-- Tambahkan ini sebelum tag </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<footer>
   <p>BY MISBAHUDIN ZAKI</p>
</footer>
</body>
</html>
