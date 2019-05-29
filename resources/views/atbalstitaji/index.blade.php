@extends('layouts.app')

@section('content')
<h1 style="text-align:center; margin-bottom:1em;">Atbalstītāji</h1>
@guest

        <br> 
         @foreach($atbalstitajs as $atbalstitaj)
            <div style="align-content:center; display:inline-block"> 
            <div class="card card-body mb-5 ml-5; width:15em;">
            <h3> {{$atbalstitaj->nosaukums}} </h3>
            <hr>
            <p> {{$atbalstitaj->majaslapa}} </p> 
            </div>  
            </div> 
        @endforeach
    {{$atbalstitajs->links()}}
@else

    @if(Auth::user()->loma_id == 1)
    <a class="btn btn-success btn-lg d-inline-flex ml-5" href="/atbalstitaji/create">Pievienot jaunu atbalstītāju</a> 
        <br> 
         @foreach($atbalstitajs as $atbalstitaj)
            <div style=" display:inline-block;"> 
            <div class="card card-body mb-5 ml-5" style="width:15em; display:inline-block;" >
            <a href="/atbalstitaji/{{$atbalstitaj->id}}"> <h3> {{$atbalstitaj->nosaukums}} </h3> </a>
            <hr>
            <p> {{$atbalstitaj->majaslapa}} </p> 
            <hr>
            <a class="btn btn-warning" href="/atbalstitaji/{{$atbalstitaj->id}}/edit">Rediģēt</a>
            {!!Form::open(['action'=>['AtbalstitajController@destroy', $atbalstitaj->id], 'method'=>'post'])!!}
            {{Form::hidden('_method', 'delete')}}
            {{Form::submit('Dzēst', ['class'=>'btn btn-danger mt-1'])}}
            {!!Form::close() !!}
            </div>  
            </div> 
        @endforeach
    {{$atbalstitajs->links()}}
    
@else
 
        <br> 
         @foreach($atbalstitajs as $atbalstitaj)
            <div style="align-content:center; display:inline-block;"> 
            <div class="card card-body mb-5 ml-5" style="width:15em; display:inline-block;" >
            <a href="/atbalstitaji/{{$atbalstitaj->id}}"> <h3> {{$atbalstitaj->nosaukums}} </h3> </a>
            <hr>
            <p> {{$atbalstitaj->majaslapa}} </p> 

            </div>  
            </div> 
        @endforeach
    {{$atbalstitajs->links()}}

@endif    
@endguest
@endsection