<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treinos disponíveis</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <main class="main">
        <div class="main__flex">
            <h2 class="main__title">Treinos disponíveis</h2>
            <div class="main__cards">
                @if (isset($pessoa))
                    @foreach ($treinos as $treino)
                        <div class="main__card">
                            <img src="img/prancheta.png" alt="">
                            <div class="main__infos">
                                <p class="main__address">Endereço: UFS</p>
                                <div class="main__time">
                                    <p>Horário de Início: 15:00</p>
                                    <p>Horário de Término: 17:00</p>
                                </div>
                                <p class="main__level">Nível: Todos</p>
                                <a href="{{ route('pessoas.show', $pessoa->id) }}">Inscritos</a>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- <div class="main__card">
                    <img src="img/prancheta.png" alt="">
                    <div class="main__infos">
                        <p class="main__address">Endereço: UFS</p>
                        <div class="main__time">
                            <p>Horário de Início: 15:00</p>
                            <p>Horário de Término: 17:00</p>
                        </div>
                        <p class="main__level">Nível: Todos</p>
                        <a href="{{ route('pessoas.show', $pessoa->id) }}">Inscritos</a>
                    </div>
                </div>
                <div class="main__card">
                    <img src="img/prancheta.png" alt="">
                    <img src="" alt="">
                    <div class="main__infos">
                        <p class="main__address">Endereço: UFS</p>
                        <div class="main__time">
                            <p>Horário de Início: 15:00</p>
                            <p>Horário de Término: 17:00</p>
                        </div>
                        <p class="main__level">Nível: Todos</p>
                        <a href="{{ route('pessoas.show', $pessoa->id) }}">Inscritos</a>
                    </div>
                </div> --}}
            </div>
            <a href="{{ route('pessoas.create') }}" class="main__btn">Inscrever-se</a>
        </div>
    </main>
    {{-- <table class="table">
            <thead>
                <h1>Lista de pessoas</h1>
                <a href="{{ route('pessoas.create') }}">Entrar</a>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Posição</th>
                    <th scope="col">Altura</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pessoas as $pessoa)
                    <tr>
                        <td>{{ $pessoa->nome }}</td>
                        <td>{{ $pessoa->posicao }}</td>
                        <td>{{ $pessoa->atributo->altura }}</td>
                        <td>{{ $pessoa->atributo->peso }}</td>
                        <td>
                            <a href="{{ route('pessoas.edit', $pessoa->id) }}">Editar</a>
                            <a href="{{ route('pessoas.show', $pessoa->id) }}">Visualizar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
</body>

</html>
{{-- {{ $pessoa }} --}}
