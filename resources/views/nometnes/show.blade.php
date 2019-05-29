@extends('layouts.app')

@section('content')


@guest

@else
@if(Auth::user()->loma_id == 1)
<div style="margin-left: 2em;">
<a href="/nometnes" class="btn btn-secondary" style="display:inline-block">Atpakaļ</a>
   
    <br><br>
    <h1>{{$nometne->nosaukums}}</h1>
    <p>
    <b>Norises laiks: </b>
        {{$nometne->sakums}} - {{$nometne->beigas}}
        <br>
        <b>Norises vieta: </b>
        <br>
        {{$nometne->vieta}}
        <hr>
        <b> Nometnes apraksts: </b>  
        <br>
        {{$nometne->apraksts}}
    </p>
</div>
<br>    
{{ Form::open(['action' => 'ApplyController@store', 'method' => 'post']) }}
<input type="hidden" class="form-control" name="nometne_id" value=" {{$nometne->id}}"> 
<div style="margin-left:2em"> {{Form::submit('Pietiekties nometnei!', ['class'=>'btn btn-primary'])}} </div>
{{ Form::close() }}

<br> <br>
<h2 style="margin-left:2em;">Nometnes dalībnieki</h2>
<div>
        <li class="list-group">

</div>


@else
<div style="margin:2em; width: 98%">
<a href="/nometnes" class="btn btn-secondary" style="display:inline-block">Atpakaļ</a>
<br><br>
<h1>{{$nometne->nosaukums}}</h1>
    <p>
        <b>Norises laiks: </b>
        {{$nometne->sakums}} - {{$nometne->beigas}}
        <br>
        <b>Norises vieta: </b>
        <br>
        {{$nometne->vieta}}
        <hr>
        <b> Nometnes apraksts: </b>  
        <br>
        {{$nometne->apraksts}}
       
    </p>
</div>


@endif
@endguest
@endsection


