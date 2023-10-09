@extends('adminlte::page')
@section('title',"Detalhes da Permission , {$permissions->name}")
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
            <li><strong>{{$permissions->name}}</strong></li>
            <li><strong>{{$permissions->description}}</strong></li>
        </ul>
    </div>
    
    <form action="{{route('permission.destroy',$permissions->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <a href="{{route('permission.index')}}" class="btn btn-dark">Voltar</a>
       <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
@endsection

    

 
