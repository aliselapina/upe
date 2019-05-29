@extends('layouts.app')

@section('content')

<h1 style="text-align:center; margin-bottom:1em;">Lietotāji</h1>
@guest

        <br> 
         @foreach($users as $user)
            <div style="align-content:center; display:inline-block"> 
            <div class="card card-body mb-5 ml-5; width:15em;">
            <h3> {{$user->name}} </h3>
            <hr>
            <p> {{$user->email}} </p> 
            </div>  
            </div> 
        @endforeach



@else

    @if(Auth::user()->loma_id == 1)
    <a class="btn btn-success btn-lg d-inline-flex ml-5" href="/users/create">Pievienot jaunu lietotāju</a> 
        <br> 
         @foreach($users as $user)
            <div style=" display:inline-block;"> 
            <div class="card card-body mb-5 ml-5" style="width:15em; display:inline-block;" >
            <a href="/users/{{$user->id}}"> <h3> {{$user->name}} </h3> </a>
            <hr>
            <p> {{$user->email}} </p> 
            <hr>
            <a class="btn btn-warning" href="/users/{{$user->id}}/edit">Rediģēt</a>
            {!!Form::open(['action'=>['UserController@destroy', $user->id], 'method'=>'post'])!!}
            {{Form::hidden('_method', 'delete')}}
            {{Form::submit('Dzēst', ['class'=>'btn btn-danger mt-1'])}}
            {!!Form::close() !!}
            </div>  
            </div> 
        @endforeach
    
    
@else
 
        <br> 
         @foreach($users as $user)
            <div style="align-content:center; display:inline-block;"> 
            <div class="card card-body mb-5 ml-5" style="width:15em; display:inline-block;" >
            <a href="/users/{{$user->id}}"> <h3> {{$user->name}} </h3> </a>
            <hr>
            <p> {{$user->email}} </p> 

            </div>  
            </div> 
        @endforeach
  

@endif    
@endguest
@endsection