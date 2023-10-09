@extends('adminlte::page')
@section('title',"Detalhes do Perfil , {$profiles->name}")
@section('content_header')
    <h1>Dashboard</h1>
    @stop
@section('content')

<div class="card-header bg-light">
    @include('admin.pages.plans.partials_.erros')
    <p>Bem vindo</p>  
</div>
    <div class="card-body bg-light">
        <ul>
            <li><strong>{{$profiles->name}}</strong></li>
            <li><strong>{{$profiles->description}}</strong></li>
        </ul>
    </div>
    
    <form action="{{route('profiles.destroy',$profiles->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <a href="{{route('profiles.index')}}" class="btn btn-dark">Voltar</a>
       <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
@endsection

    

 
