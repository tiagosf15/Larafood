@extends('adminlte::page')
@section('title','Perfis')
@section('content_header')
    <h1>Dashboard <a href="{{route('permission.create')}}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
    @stop
@section('content')


 <p>Bem vindo</p>  
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('permission.index')}}">Permissões</a></li>
    </ol>
    <div class="card">
        <div class="card-header">
            <form action="{{route('permission.search')}}" method="POST" class="form form-inline">
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
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission) 
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td><a class="btn btn-warning" href="{{route('permission.show', $permission->id)}}">VER</a>
                            <a class="btn btn-primary" href="{{route('permission.edit' , $permission->id)}}">editar</a>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                @if (isset($filters))
                {!!$permissions->appends($filters)->links()!!}
                @else
                {!!$permissions->links()!!}
                    
                @endif
            </div>
        </div>
    </div>
@stop
    
