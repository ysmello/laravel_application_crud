<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false"          aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
            <span class="navbar-text">Icones e barra de pesquisa</span>
        </div>
    </nav>
    <div class="row m-0">
        <nav class="col-2 border-right p-0">
            <div class="media align-items-center p-3 mt-3">
                <img src="/images/thumb-login.jpg" alt="..." width="60px" height="60px" class="rounded-circle">
                <div class="media-body ml-3">
                    <h4 class="p-0 m-0">Yuri</h4>
                    <p class="text-muted p-0 m-0">Web designer</p>
                </div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">MENU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active link-menu" href="/admin"><i class="fas fa-home icons-menu"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active link-menu" href="{{ route('clients.index') }}"><i class="fas fa-users icons-menu"></i>Clientes</a>
                </li>
            </ul>
        </nav>
        <div class="col-10 wrapper p-0">
            @yield('body')
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>