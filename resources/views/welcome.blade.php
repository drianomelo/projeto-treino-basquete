<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Treinamento DITIN</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <main class="main">
        <div class="main__flex">
            <h1 class="main__title">Projeto treinamento DITIN</h1>
            <p class="main__description">
                Esse projeto tem como finalidade aprender e praticar as quatros
                operações básicas utilizadas em uma base de dados (CRUD). A ideia do
                projeto é que o usuário possa se cadastrar nos treinos disponíveis, editar, visualizar e remover
                as informações.
            </p>
            <a href="{{ route('pessoas.index') }}" class="main__btn">Clique para entrar</a>
        </div>
    </main>
</body>

</html>
