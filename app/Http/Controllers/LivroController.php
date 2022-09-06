<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Livro;

class LivroController extends Controller
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
        $livros = Livro::all();

        // abrindo a tela de consulta e enviando os
        // serviços como um parâmetro
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // direcionando para a tela de cadastro
        return view('livros.create');
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
            'nome_livro' => 'required',
            'nome_original' => 'required',
            'genero_livro' => 'required',
            'sinopse_livro' => 'required',
            'paginas_livro' => 'required',
            'anopub_livro' => 'required',
            'editora_livro' => 'required'
        ]);

        // criando (gravando) o livro
        $livro = Livro::create($validateData);

        // redirecionando a página após a gravação
        return redirect('/livros')->with('success', 'Livro cadastrado com sucesso!');
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
        $livros = Livro::findOrFail($id);

        return view('livros/edit', compact('livros'));
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
            'nome_livro' => 'required',
            'nome_original' => 'required',
            'genero_livro' => 'required',
            'sinopse_livro' => 'required',
            'paginas_livro' => 'required',
            'anopub_livro' => 'required',
            'editora_livro' => 'required'
        ]);

        Livro::whereId($id)->update($validateData);

        return redirect('/livros')->with('success', 'Informações sobre o livro alteradas com sucesso!');
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
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return redirect('/livros')->with('success', 'livro excluído com sucesso!');
    }
}
