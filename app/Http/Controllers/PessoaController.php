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
        $this->posicaos = ['PG', 'SG', 'SF', 'PF', 'C'];
        $this->nivels = ['Iniciante', 'Intermediário', 'Avançado'];
        $this->atributos = new Atributo;
        $this->treinos = Treino::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = $this->pessoas->all();
        $treinos = $this->treinos;

        return view('pessoas.index', compact('pessoas', 'treinos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posicaos = $this->posicaos;
        $nivels = $this->nivels;
        $treinos = $this->treinos->pluck('endereco', 'id');

        return view('pessoas.form', compact('treinos', 'posicaos', 'nivels'));
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
            'posicao' => $this->posicaos[$request->posicao],
            'nivel' => $this->nivels[$request->nivel],
            'atributo_id' => $this->atributos->create([
                //Chave estrangeira na tabela principal
                'altura' => $request->altura,
                'peso' => $request->peso,
                'idade' => $request->idade,
                'telefone' => $request->telefone,
            ])->id,
        ]);

        // if (isset($pessoas)) {
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
                $pessoa->treinoRelationship()->attach($treino_id);
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
        $nivels = $this->nivels;
        $posicaos = $this->posicaos;

        return view('pessoas.form', compact('pessoa', 'treinos', 'form', 'nivels', 'posicaos'));
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
        $nivels = $this->nivels;
        $posicaos = $this->posicaos;

        return view('pessoas.form', compact('pessoa', 'treinos', 'nivels', 'posicaos'));
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
            'posicao' => $this->posicaos[$request->posicao],
            'nivel' => $this->nivels[$request->nivel],
            'atributo_id' => tap($this->atributos->find($pessoa->atributo->id))->update([
                //Chave estrangeira na tabela principal
                'altura' => $request->altura,
                'peso' => $request->peso,
                'idade' => $request->idade,
                'telefone' => $request->telefone,
            ])->id,
        ]);

        //Muitos para muitos
        $treinos_id = $request->treino;

        $pessoa->treinoRelationship()->sync(null);

        if (isset($treinos_id)) {
            foreach ($treinos_id as $treino_id) {
                $pessoa->treinoRelationship()->attach($treino_id);
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
        $pessoa = $this->pessoas->find($id);
        $pessoa->atributo->delete();
        $pessoa->delete();

        return redirect()->route('pessoas.index');
    }
}
