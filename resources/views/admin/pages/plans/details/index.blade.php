@extends('adminlte::page')
@section("title','Detalhes do Plano {$plan->name}")
@section('content_header')
    <h1>Detalhes do Plano {{$plan->name}} <a href="{{route('details.plans.createdetail', $plan->url)}}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
    @stop
@section('content')


 <p>Bem vindo</p>  
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.plans.index', $plan->url)}}">Detalhes</a></li>
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
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail) 
                        <tr>
                           <td> {{$detail->name}}</td>
                           <td>
                               <a href="{{route('details.plans.edit', [$plan->url, $detail->id])}}" class="btn btn-warning">Editar</a>
                               <a href="{{route('details.plans.show', [$plan->url, $detail->id])}}" class="btn btn-primary">Amostrar</a>
                           </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div class="card-footer">
                @if (isset($filters))
                {!!$details->appends($filters)->links()!!}
                @else
                {!!$details->links()!!}
                    
                @endif
            </div>
        </div>
    </div>
@stop
    
