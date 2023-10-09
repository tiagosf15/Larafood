@extends('adminlte::page')
@section('title','Planos')
@section('content_header')
    <h1>Dashboard <a href="{{route('plans.create')}}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
    @stop
@section('content')

@include('admin.pages.plans.partials_.erros')
 <p>Bem vindo</p>  
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Home</a></li>
    </ol>
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" id="" placeholder="pesquisar" value="{{$filters['name'] ?? ''}}" class="form-control">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>preço</th>
                        <th>Descrição</th>
                        <th>Link</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan) 
                    <tr>
                        <td>{{$plan->name}}</td>
                        <td>R${{$plan->price}}</td>
                        <td>{{$plan->description}}</td>
                        <td><a class="btn btn-primary" href="{{route('details.plans.index', $plan->url)}}">DETALHES</td>
                        <td><a class="btn btn-warning" href="{{route('plans.show', $plan->url)}}">VER</td>
                        <td><a class="btn btn-primary" href="{{route('plans.edit', $plan->url)}}">editar</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                {!!$plans->appends($filters)->links()!!}
                @else
                {!!$plans->links()!!}
                    
                @endif
            </div>
        </div>
    </div>
@stop
    
