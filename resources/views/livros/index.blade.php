@extends('layouts.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Nome do Livro</td>
          <td>Nome Original do Livro</td>
          <td>Gênero do Livro</td>
          <td>Sinopse do Livro</td>
          <td>Quantidade de Páginas</td>
          <td>Ano de pub do Livro</td>
          <td>Editora</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($livros as $livro)
        <tr>
            <td>{{$livro->nome_livro}}</td>
            <td>{{$livro->nome_original}}</td>
            <td>{{$livro->genero_livro}}</td>
            <td>{{$livro->sinopse_livro}}</td>
            <td>{{$livro->paginas_livro}}</td>
            <td>{{$livro->anopub_livro}}</td>
            <td>{{$livro->editora_livro}}</td>
            
            <td><a href="{{ route('livros.edit', $livro->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('livros.destroy', $livro->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection