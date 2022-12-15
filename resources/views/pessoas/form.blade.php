<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($pessoa))
        <title>Treino - Visualização do treino</title>
        <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    @else
        <title>Treino - Inscrição no treino</title>
        <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    @endif
</head>

<body>
    <main class="main">
        <a href="{{ route('pessoas.index') }}" class="main__seta"><img src="../img/seta.png" alt=""></a>
        <img src="../img/prancheta.png" alt="" class="main__img">

        <div class="main__form">
            @csrf

            @if (isset($pessoa))
                {!! Form::open(['route' => ['pessoas.update', $pessoa->id], 'method' => 'PUT', 'name' => 'form']) !!}
            @else
                {!! Form::open(['route' => 'pessoas.store', 'method' => 'POST', 'name' => 'form']) !!}
            @endif

            <h2>Dados pessoais</h2>
            <div class="main__form-text">
                {!! Form::label('nome', 'Nome:', ['class' => 'main__label']) !!}
                {!! Form::text('nome', isset($pessoa) ? $pessoa->nome : null, [
                    'class' => 'main__input',
                    'placeholder' => 'Somente Letras',
                    'required',
                    $form ?? null,
                ]) !!}
            </div>

            <div class="main__form-text">
                {!! Form::label('altura', 'Altura:', ['class' => 'main__label']) !!}
                {!! Form::text('altura', isset($pessoa) ? $pessoa->atributo->altura : null, [
                    'class' => 'main__input',
                    'placeholder' => 'Somente números',
                    'required',
                    $form ?? null,
                ]) !!}
            </div>

            <div class="main__form-text">
                {!! Form::label('peso', 'Peso:', ['class' => 'main__label']) !!}
                {!! Form::text('peso', isset($pessoa) ? $pessoa->atributo->peso : null, [
                    'class' => 'main__input',
                    'placeholder' => 'Somente números',
                    'required',
                    $form ?? null,
                ]) !!}
            </div>

            <div class="main__form-text">
                {!! Form::label('idade', 'Idade:', ['class' => 'main__label']) !!}
                {!! Form::text('idade', isset($pessoa) ? $pessoa->atributo->idade : null, [
                    'class' => 'main__input',
                    'placeholder' => 'Somente números',
                    'required',
                    $form ?? null,
                ]) !!}
            </div>

            <div class="main__form-text-t">
                {!! Form::label('telefone', 'Telefone:', ['class' => 'main__label']) !!}
                {!! Form::text('telefone', isset($pessoa) ? $pessoa->atributo->telefone : null, [
                    'class' => 'main__input',
                    'placeholder' => 'Somente números',
                    'required',
                    $form ?? null,
                ]) !!}
            </div>

            <h2 class="main__title">Dados do treino</h2>
            <div class="main__form-select">
                <div>
                    {!! Form::label('nivel', 'Nivel de Experiência: ', ['class' => 'main__label-select left']) !!}
                    <div class="div-select">
                        {!! Form::select('nivel', $nivels, isset($pessoa) && $pessoa->nivel !== null ? $pessoa->nivel : null, [
                            'class' => 'main__select select-left',
                            'required',
                            $form ?? null,
                        ]) !!}
                    </div>
                </div>

                <div>
                    {!! Form::label('posicao', 'Posição: ', ['class' => 'main__label-select right']) !!}
                    <div class="div-select">
                        {!! Form::select('posicao', $posicaos, isset($pessoa) && $pessoa->posicao !== null ? $pessoa->posicao : null, [
                            'class' => 'main__select select-right',
                            'required',
                            $form ?? null,
                        ]) !!}
                    </div>
                </div>
            </div>

            <h2 class="main__title-treino">Treinos</h2>
            <div class="main__checkbox-flex">
                @foreach ($treinos as $treino)
                    <div>
                        {!! Form::label('treino[]', $treino, ['class' => 'main__label-checkbox']) !!}
                        {!! Form::checkbox(
                            'treino[]',
                            $loop->iteration,
                            isset($pessoa) ? $pessoa->treino->find($loop->iteration) !== null : null,
                            ['class' => 'main__checkbox', 'id' => "treino$loop->iteration", 'required', isset($form) ? $form : null],
                        ) !!}
                    </div>
                @endforeach
            </div>

            <div class="main__btns">
                {!! Form::submit('Salvar', ['class' => 'main__btn'], $form ?? null) !!}

                {!! Form::close() !!}

                @if (isset($pessoa))
                    {!! Form::open([
                        'route' => ['pessoas.destroy', $pessoa->id],
                        'method' => 'DELETE',
                        'name' => 'form',
                        'class' => 'form-btn',
                    ]) !!}
                    {!! Form::submit('Excluir', ['class' => 'main__btn excluir', $form ?? null]) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </main>

</body>

</html>
