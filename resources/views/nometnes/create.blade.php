@extends('layouts.app')

@section('content')

@guest
<h3 style="text-align:center; margin-bottom:1em;">Jaunas nometnes var pievienot tikai nometnes darbinieki :)</h3>
@else

@if(Auth::user()->loma_id == 1)

<h1 style="text-align:center; margin-bottom:1em;">Nometnes</h1>

    {{ Form::open(['action' => 'NometneController@store', 'method' => 'post']) }}
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::text('nosaukums', '', ['class'=>'form-control', 'placeholder'=>'Nosaukums'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em; ">
            {{Form::date('sakums', '', ['class'=>'form-control', 'placeholder'=>'Sākuma datums'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::date('beigas', '', ['class'=>'form-control', 'placeholder'=>'Beigu datums'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::text('vieta', '', ['class'=>'form-control', 'placeholder'=>'Norises vieta'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::number('dalib_sk', '', ['class'=>'form-control', 'placeholder'=>'Dalībnieku skaits'])}}
        </div>
        <div class="form-group" style="width: 36rem; margin-left:2em;">
            {{Form::text('apraksts', '', ['class'=>'form-control', 'placeholder'=>'Nometnes apraksts'])}}
        </div>
        <div style="margin-left:2em"> {{Form::submit('Izveidot', ['class'=>'btn btn-success'])}} </div>
    {{ Form::close() }}

    


@else
<h3 style="text-align:center; margin-bottom:1em;">Jaunas nometnes var pievienot tikai nometnes darbinieki :)</h3>

@endif
@endguest
@endsection
