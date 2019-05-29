@extends('layouts.app')

@section('content')

@guest

@else

<h1 style="text-align:center; margin-bottom:1em;">Veiksmīga pietiekšanās nometnei!</h1>
<br><br>
<h2 style="text-align:center; margin-bottom:1em;">Drīzumā ar jums saiznāsimies :)</h2>

@endguest
@endsection 