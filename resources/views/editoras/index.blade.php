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
          <td>Nome da editora</td>
          <td>Estado</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($editoras as $editora)
        <tr>
            <td>{{$editora->nome_editora}}</td>
            <td>{{$editora->estado_editora}}</td>
            
            <td><a href="{{ route('editoras.edit', $editora->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('editoras.destroy', $editora->id)}}" method="post">
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