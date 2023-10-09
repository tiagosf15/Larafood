@extends('adminlte::page')
    @section('content')
      <div class="card">
          <div class="card-body">
            <form action="{{route('plans.update',$plan->url)}}" class="form-group" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">nome</label>
                    <input type="text" name="name" value="{{$plan->name}}" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="">preço</label>
                    <input type="text" name="price" class="form-control" value="{{$plan->price}}" placeholder="preço">
                </div>
                <div class="form-group">
                    <label for="">descrição</label>
                    <input type="text" name="description" class="form-control" value="{{$plan->description}}" placeholder="descrição">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">salvar</button>
                </div>
            </form>
        </div>
      </div>
        @endsection
