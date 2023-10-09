@extends('adminlte::page')
    @section('content')
      <div class="card">
         
          <div class="card-body">
            @include('admin.pages.plans.partials_.erros')
            <form action="{{route('details.plans.store',$plan->url)}}" class="form-group" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">nome do detalhe</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <button class="btn btn-dark">Cadastrar detalhe do plano</button>
                </div>
            </form>
        </div>
      </div>
        @endsection
