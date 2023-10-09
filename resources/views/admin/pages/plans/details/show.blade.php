@extends('adminlte::page')
@section('title',"Detalhes do Planos , {$details->name}")
@section('content_header')
    <h1>Dashboard</h1>
    @stop
@section('content')

<div class="card-header bg-light">
    <p>Bem vindo</p>  
</div>
    <div class="card-body bg-light">
        <ul>
            <li><strong>{{$details->name}}</strong></li>
        </ul>
    </div>
    
    <form action="{{route('details.plans.destroy',[$plan->url,$details->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <a href="{{route('details.plans.index',$plan->url)}}" class="btn btn-dark">Voltar</a>
       <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
@endsection

    

 
