@extends('layouts.app')

@section('content')

@guest
<h3 style="text-align:center; margin-bottom:1em;">Jaunus atbalstītājus var pievienot tikai nometnes darbinieki :)</h3>
@else

@if(Auth::user()->loma_id == 1)

<h1 style="text-align:center; margin-bottom:1em;">Atbalstītāji</h1>

    {{ Form::open(['action' => 'AtbalstitajController@store', 'method' => 'post']) }}
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::text('nosaukums', '', ['class'=>'form-control', 'placeholder'=>'Nosaukums'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em; ">
            {{Form::text('majaslapa', '', ['class'=>'form-control', 'placeholder'=>'Mājaslapa'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::number('numurs', '', ['class'=>'form-control', 'placeholder'=>'Telefona numurs'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::email('epasts', '', ['class'=>'form-control', 'placeholder'=>'E-pasts'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::text('atbalsta_veids', '', ['class'=>'form-control', 'placeholder'=>'Atbalsta veids'])}}
        </div>
        <div style="margin-left:2em"> {{Form::submit('Izveidot', ['class'=>'btn btn-success'])}} </div>
    {{ Form::close() }}

    


@else
<h3 style="text-align:center; margin-bottom:1em;">Jaunus atbalstītājus var pievienot tikai nometnes darbinieki :)</h3>

@endif
@endguest
@endsection
