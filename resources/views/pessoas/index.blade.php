<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treinos disponíveis</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <main class="main">
        <div class="main__card">
            <img src="img/prancheta.png" alt="">
            <a href="{{ route('pessoas.create') }}" class="main__btn">Inscrever-se</a>
            <div class="main__infos">
                <table>
                    <thead>
                        <tr>
                            <th class="coluna" scope="col">Nome</th>
                            <th class="coluna" scope="col">Posição</th>
                            <th class="coluna" scope="col">Altura</th>
                            <th class="coluna" scope="col">Peso</th>
                            <th class="coluna" scope="col">Ações</th>
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
                </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
{{-- {{ $pessoa }} --}}
