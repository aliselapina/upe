@extends('layouts.app')

@section('content')
<h1 style="text-align:center; margin-bottom:1em;">Atbalstītāji</h1>
@guest
<a class="btn btn-success btn-lg d-inline-flex ml-5" href="/atbalstitaji/create">Pievienot jaunu atbalstītāju</a> 
        <br> 
         @foreach($atbalstitajs as $atbalstitaj)
            <div style="align-content:center"> 
            <div class="card card-body mb-5 ml-5"  >
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
            <div style="align-content:center; display:inline-block;"> 
            <div class="card card-body mb-5 ml-5" style="width:15em;" >
            <h3> {{$atbalstitaj->nosaukums}} </h3>
            <hr>
            <p> {{$atbalstitaj->majaslapa}} </p> 
            <hr>
            <a class="btn btn-warning btn-lg d-inline-flex ml-5" href="/atbalstitaji/{{$atbalstitaj->id}}/edit">Rediģēt</a>
            </div>  
            </div> 
        @endforeach
    {{$atbalstitajs->links()}}
    
@else
<a class="btn btn-success btn-lg d-inline-flex ml-5" href="/atbalstitaji/create">Pievienot jaunu atbalstītāju</a> 
        <br> 
         @foreach($atbalstitajs as $atbalstitaj)
            <div style="align-content:center"> 
            <div class="card card-body mb-5 ml-5"  >
            <a href="/atbalstitaj/{{$atbalstitaj->id}}"> <h3> {{$atbalstitaj->nosaukums}} </h3> </a> 
            <hr>
            <p> {{$atbalstitaj->majaslapa}} </p> 

            </div>  
            </div> 
        @endforeach
    {{$atbalstitajs->links()}}

@endif    
@endguest
@endsection