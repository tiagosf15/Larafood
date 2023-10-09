@extends('adminlte::page')
    @section('content')
      <div class="card">
          <div class="card-body">
            @include('admin.pages.plans.partials_.erros')
            <form action="{{route('permission.update' , $permissions->id)}}" class="form-group" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">nome</label>
                    <input type="text" name="name" value="{{$permissions->name}}" class="form-control" placeholder="Nome">
                </div>
                
                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text" name="description" value="{{$permissions->description}}" class="form-control" placeholder="Descrição">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">salvar</button>
                </div>
            </form>
        </div>
      </div>
        @endsection
