@extends('adminlte::page')
    @section('content')
      <div class="card">
          @include('admin.pages.plans.partials_.erros')
          <div class="card-body">
            <form action="{{route('plans.store')}}" class="form-group" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">nome</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="">preço</label>
                    <input type="text" name="price" class="form-control" placeholder="preço">
                </div>
                <div class="form-group">
                    <label for="">descrição</label>
                    <input type="text" name="description" class="form-control" placeholder="descrição">
                </div>
                <div class="form-group">
                    <button class="btn btn-dark">enviar</button>
                </div>
            </form>
        </div>
      </div>
        @endsection
