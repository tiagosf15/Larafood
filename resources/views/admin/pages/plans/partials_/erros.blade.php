@if($errors->any())
@foreach ($errors->all() as $item)
<div class="bg-warning">    
    <p>{{$item}}</p>
</div>
@endforeach
@endif

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error')}}
    </div>    
@endif