<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Atributo;
use App\Models\Treino;
use App\Models\Modalidade;
use App\Models\Posicao;


class PessoaController extends Controller
{
    /**
     * Instantiate a new controller instace.
     *
     * @param \App\Models\Pessoa $pessoas
     * @return void
     */
    public function __construct(Pessoa $pessoas)
    {
        $this->pessoas = $pessoas;
        $this->atributos = new Atributo;
        $this->posicaos = new Posicao;
        $this->treinos = Treino::all()->pluck('endereco', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = $this->pessoas->all();

        return view('pessoas.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $treinos = $this->treinos;

        return view('pessoas.form', compact('treinos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pessoa = $this->pessoas->create([
            'nome' => $request->nome,
            'posicao_id' => $this->posicaos->create([
                'nome' => $request->nome,
            ])->id,
            'atributo_id' => $this->atributos->create([
                //Chave estrangeira na tabela principal
                'altura' => $request->altura,
                'peso' => $request->peso,
                'idade' => $request->idade,
                'nivel_de_experiencia' => $request->nivel_de_experiencia,
                'telefone' => $request->telefone,
            ])->id,
        ]);

        // if (isset($treinos)) {
        //     $modalidades_id = $request->modalidade;
        //     foreach ($modalidades_id as $modalidade_id) {
        //         Modalidade::where($modalidade_id, 'id')->first()->update([
        //             'pessoa_id' => $pessoa->id,
        //         ]);
        //     }
        // }

        //Muitos para muitos
        $treinos_id = $request->treino;

        if (isset($treinos_id)) {
            foreach ($treinos_id as $treino_id) {
                $pessoa->treino()->attach($treino_id);
            }
        }

        return redirect()->route('pessoas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = 'disabled';

        $pessoa = $this->pessoas->find($id);
        $treinos = $this->treinos;

        return view('pessoas.form', compact('pessoa', 'treinos', 'form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pessoa = $this->pessoas->find($id);
        $treinos = $this->treinos;

        return view('pessoas.form', compact('pessoa', 'treinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pessoa = $this->pessoas->find($id);
        $pessoa->update([
            'nome' => $request->nome,
            'posicao_id' => $this->posicaos->find($pessoa->posicao->id)->update([
                'nome' => $request->nome,
            ])->id,
            'atributo_id' => $this->atributos->find($pessoa->atributo->id)->update([
                //Chave estrangeira na tabela principal
                'altura' => $request->altura,
                'peso' => $request->peso,
                'idade' => $request->idade,
                'nivel_de_experiencia' => $request->nivel_de_experiencia,
                'telefone' => $request->telefone,
            ])->id,
        ]);

        //Muitos para muitos
        $treinos_id = $request->treino;

        $pessoa->treino()->sync(null);

        if (isset($treinos_id)) {
            foreach ($treinos_id as $treino_id) {
                $pessoa->treino()->attach($treino_id);
            }
        }

        return redirect()->route('pessoas.show', $pessoa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoas = $this->pessoas->find($id)->delete();

        return redirect()->route('pessoas.index');
    }
}
