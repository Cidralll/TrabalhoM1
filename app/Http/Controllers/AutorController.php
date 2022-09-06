<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Autor;

class AutorController extends Controller
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
        $autores = Autor::all();

        // abrindo a tela de consulta e enviando os
        // serviços como um parâmetro
        return view('autores.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // direcionando para a tela de cadastro
        return view('autores.create');
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
            'nome_autor' => 'required',
            'nacion_autor' => 'required'
        ]);

        // criando (gravando) o autor
        $autor = Autor::create($validateData);

        // redirecionando a página após a gravação
        return redirect('/autores')->with('success', 'Autor cadastrado com sucesso!');
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
        $autor = Autor::findOrFail($id);

        return view('autores/edit', compact('autor'));
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
            'nome_autor' => 'required|max:45',
            'nacion_autor' => 'required|max:45'
        ]);

        Autor::whereId($id)->update($validateData);

        return redirect('/autores')->with('success', 'Informações sobre o autor alteradas com sucesso!');
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
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return redirect('/autores')->with('success', 'Autor excluído com sucesso!');
    }
}
