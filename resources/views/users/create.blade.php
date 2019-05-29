@extends('layouts.app')

@section('content')

@guest
<h3 style="text-align:center; margin-bottom:1em;">Jaunus lietotājus var pievienot tikai nometnes darbinieki :)</h3>
@else

@if(Auth::user()->loma_id == 1)

<h1 style="text-align:center; margin-bottom:1em;">Lietotāji</h1>

    {{ Form::open(['action' => 'UserController@store', 'method' => 'post']) }}
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Vārds'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em; ">
            {{Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'E-pasts'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::password('password', '', ['class'=>'form-control', 'placeholder'=>'Parole'])}}
        </div>
      
        <div style="margin-left:2em"> {{Form::submit('Izveidot', ['class'=>'btn btn-success'])}} </div>
    {{ Form::close() }}

@else
<h3 style="text-align:center; margin-bottom:1em;">Jaunus lietotājus var pievienot tikai nometnes darbinieki :)</h3>

@endif
@endguest
@endsection
