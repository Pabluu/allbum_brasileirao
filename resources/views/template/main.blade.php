<head>
    <meta charset="UTF-8">
    <title>@yield("titulo_aba")</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark">
            <a class="nav-link font-color-a" href="/posicao">Posicao</a>
            <a class="nav-link font-color-a" href="/clube">Clube</a>
            <a class="nav-link font-color-a" href="/jogador">Jogador</a>
        </nav>

        <div>
            <div class="formulario">
                <form action="" class='form-group col-7'>
                    <input type="text" class='form-control'>
                    <button class='form-control'>Salvar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>