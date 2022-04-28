<head>
    <meta charset="UTF-8">
    <title>@yield("titulo_aba")</title>

    <!-- BOOTSTRAP.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- BOOTSTRAP ICONS.CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <style>
        .navbar {
            background-image: linear-gradient(to right, #eb5600, #823000, #000000);
        }

        .nav-link {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="nav-link font-color-a" href="/posicao">Posicao</a>
            <a class="nav-link font-color-a" href="/clube">Clube</a>
            <a class="nav-link font-color-a" href="/jogador">Jogador</a>
        </nav>

        @yield("formulario")
        @yield('tabela_posicao')
    </div>
</body>

</html>