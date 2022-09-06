@extends('layouts.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar dados da Editora
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
      <form method="post" action="{{ route('editoras.update', $editora->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nome_editora">Nome da editora:</label>
              <input type="text" class="form-control" name="nome_editora" value="{{ $editora->tipo }}"/>
          </div>
          <div class="form-group">
            <label for="estado_editora">Estado da editora:</label>
            <input type="text" class="form-control" name="estado_editora" value="{{ $editora->descricao }}"/>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Atualizar Dados</button>
      </form>
  </div>
</div>
@endsection