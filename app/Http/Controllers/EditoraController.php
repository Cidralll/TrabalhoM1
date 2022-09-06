<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Editora;

class EditoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // direcionando para a tela de consulta

        // criando um objeto para receber os registros
        $editoras = Editora::all();

        // abrindo a tela de consulta e enviando os
        // serviços como um parâmetro
        return view('editoras.index', compact('editoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // direcionando para a tela de cadastro
        return view('editoras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // realizando uma validação nos campos e
        // a gravação dos dados

        // definindo o padrão para a validação dos campos
        $validateData = $request->validate([
            'nome_editora' => 'required',
            'estado_editora' => 'required'
        ]);

        // criando (gravando) a editora
        $editora = Editora::create($validateData);

        // redirecionando a página após a gravação
        return redirect('/editoras')->with('success', 'Editora cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // recuperando o registro no banco e enviando
        // para a tela de edição/atualização
        $editora = Editora::findOrFail($id);

        return view('editoras/edit', compact('editora'));
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
        // definindo o padrão para a validação dos campos
        $validateData = $request->validate([
            'nome_editora' => 'required',
            'estado_editora' => 'required'
        ]);

        Editora::whereId($id)->update($validateData);

        return redirect('/editoras')->with('success', 'Informações sobre a editora alteradas com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // apagando o registro
        $editora = Editora::findOrFail($id);
        $editora->delete();
        return redirect('/editoras')->with('success', 'Editora excluída com sucesso!');
    }
}
