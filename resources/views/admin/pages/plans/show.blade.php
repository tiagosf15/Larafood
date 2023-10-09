@extends('adminlte::page')
@section('title',"Detalhes do Planos , {$plan->name}")
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
            <li><strong>{{$plan->name}}</strong></li>
            <li><strong>R${{number_format($plan->price,2,',','.')}}</strong></li>
            <li><strong>{{$plan->description}}</strong></li>
        </ul>
    </div>
    
    <form action="{{route('plans.delete',$plan->url)}}" method="POST">
        @csrf
        @method('DELETE')
        <a href="{{route('plans.index')}}" class="btn btn-dark">Voltar</a>
       <button type="submit" class="btn btn-danger">Deletar</button>
    </form>
@endsection

    

 
