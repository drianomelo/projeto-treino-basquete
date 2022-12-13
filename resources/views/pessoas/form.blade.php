<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($pessoa))
        <title>Treino - Visualização do treino</title>
    @else
        <title>Treino - Inscrição no treino</title>
    @endif
</head>

<body>
    @csrf

    @if (isset($pessoa))
        {!! Form::open(['route' => ['pessoas.update', $pessoa->id], 'method' => 'PUT', 'name' => 'form']) !!}
    @else
        {!! Form::open(['route' => 'pessoas.store', 'method' => 'POST', 'name' => 'form']) !!}
    @endif

    {!! Form::label('nome', 'Nome:', ['class' => 'form-check-label']) !!}
    {!! Form::text('nome', isset($pessoa) ? $pessoa->nome : null, [
        'class' => 'form-control',
        'placeholder' => 'Somente Letras',
        $form ?? null,
    ]) !!}

    {!! Form::label('altura', 'Altura:', ['class' => 'form-check-label']) !!}
    {!! Form::text('altura', isset($pessoa) ? $pessoa->atributo->altura : null, [
        'class' => 'form-control',
        'placeholder' => 'Somente números',
        $form ?? null,
    ]) !!}

    {!! Form::label('peso', 'Peso:', ['class' => 'form-check-label']) !!}
    {!! Form::text('peso', isset($pessoa) ? $pessoa->atributo->peso : null, [
        'class' => 'form-control',
        'placeholder' => 'Somente números',
        $form ?? null,
    ]) !!}

    {!! Form::label('idade', 'Idade:', ['class' => 'form-check-label']) !!}
    {!! Form::text('idade', isset($pessoa) ? $pessoa->atributo->idade : null, [
        'class' => 'form-control',
        'placeholder' => 'Somente números',
        $form ?? null,
    ]) !!}

    {!! Form::label('telefone', 'Telefone:', ['class' => 'form-check-label']) !!}
    {!! Form::text('telefone', isset($pessoa) ? $pessoa->atributo->telefone : null, [
        'class' => 'form-control',
        'placeholder' => 'Somente números',
        $form ?? null,
    ]) !!}

    {!! Form::label('nivel', 'Nivel de Experiência: ', ['class' => 'form-check-label']) !!}
    {!! Form::select('nivel', $nivels, isset($pessoa) && $pessoa->nivel !== null ? $pessoa->nivel : null, [
        'class' => 'form-control',
        'placeholder' => 'Selecione uma Posição',
        $form ?? null,
    ]) !!}

    {!! Form::label('posicao', 'Posição: ', ['class' => 'form-check-label']) !!}
    {!! Form::select('posicao', $posicaos, isset($pessoa) && $pessoa->posicao !== null ? $pessoa->posicao : null, [
        'class' => 'form-control',
        'placeholder' => 'Selecione uma Posição',
        $form ?? null,
    ]) !!}

    @foreach ($treinos as $treino)
        {!! Form::label('treino[]', $treino, ['class' => 'labelmargem']) !!}
        {!! Form::checkbox(
            'treino[]',
            $loop->iteration,
            isset($pessoa) ? $pessoa->treino->find($loop->iteration) !== null : null,
            ['id' => "treino$loop->iteration", isset($form) ? $form : null],
        ) !!}
    @endforeach

    {!! Form::submit('Salvar', ['class' => 'btn btn-sucess'], $form ?? null) !!}

    {!! Form::close() !!}

</body>

</html>
