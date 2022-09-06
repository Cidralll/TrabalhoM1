@extends('layouts.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar dados do Livro
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('livros.update', $livros->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nome_livro">Nome do livro:</label>
              <input type="text" class="form-control" name="nome_livro" value="{{ $livros->nome_livro }}"/>
          </div>
          <div class="form-group">
            <label for="nome_original">Nome Original do Livro:</label>
            <input type="text" class="form-control" name="nome_original" value="{{ $livros->nome_original }}"/>
          </div>
          <div class="form-group">
            <label for="genero_livro">Gênero do Livro</label>
            <input type="text" class="form-control" name="genero_livro" value="{{ $livros->genero_livro }}"/>
          </div>
          <div class="form-group">
            <label for="sinopse_livro">Sinopse do Livro:</label>
            <input type="text" class="form-control" name="sinopse_livro" value="{{ $livros->sinopse_livro }}"/>
          </div>
          <div class="form-group">
            <label for="paginas_livro">Número de páginas:</label>
            <input type="text" class="form-control" name="paginas_livro" value="{{ $livros->paginas_livro }}"/>
          </div>
          <div class="form-group">
            <label for="anopub_livro">Ano de pub do Livro:</label>
            <input type="text" class="form-control" name="anopub_livro" value="{{ $livros->anopub_livro }}"/>
          </div>
          <div class="form-group">
            <label for="editora_livro">Editora:</label>
            <input type="text" class="form-control" name="editora_livro" value="{{ $livros->editora_livro }}"/>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Atualizar Dados</button>
      </form>
  </div>
</div>
@endsection