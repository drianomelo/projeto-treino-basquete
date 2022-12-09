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
    <label for="nome" class="form-check-label">
        Nome:
        <input type="text" name="nome" id="nome" value="{{ $pessoa->nome ?? null }}"
            placeholder="Somente letras">
    </label>

    {!! Form::label('nome', 'Nome:', ['class' => 'form-check-label']) !!}
    {!! Form::text('nome', isset($pessoa) ? $pessoa->nome : null, [
        'class' => 'form-control',
        'placeholder' => 'Somente Letras',
        $form ?? null,
    ]) !!}
</body>

</html>

{{-- @if (isset($pessoa)){
    {{$pessoa}}
}
@endif

{{$treinos}} --}}
