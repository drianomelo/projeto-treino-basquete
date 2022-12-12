<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treinos</title>
</head>

<body>
    <table class="table">
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
                    <td>{{ $pessoa->posicao->nome }}</td>
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
</body>

</html>
{{-- {{ $pessoas }} --}}
