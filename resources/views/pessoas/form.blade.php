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
    {!! Form::label('nome', 'Nome:', ['class' => 'form-check-label']) !!}
    {!! Form::text('nome', isset($pessoa) ? $pessoa->nome : null, [
        'class' => 'form-control',
        'placeholder' => 'Somente Letras',
        $form ?? null,
    ]) !!}

    {!! Form::label('nivel_de_experiencia', 'Nivel de experiência:', ['class' => 'form-check-label']) !!}
    {!! Form::select('nivel_de_experiencia', ['Iniciante', 'Intermediário', 'Avançado']) !!}

</body>

</html>

{{-- @if (isset($pessoa))
    {
    {{ $pessoa }}
    }
@endif

{{ $treinos }} --}}
