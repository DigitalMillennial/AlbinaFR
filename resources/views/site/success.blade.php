@extends('layouts.site') 
@section('content')
    <div class="container text-center mt-5">
       @if(isset($student))
    <h2>Merci, {{ $student->prenom }} {{ $student->nom }} !</h2>
@else
    <p>{{ $message ?? 'Merci pour votre paiement.' }}</p>
@endif


        <a href="/" class="btn btn-primary mt-3">Вернуться на главную</a>
    </div>
@endsection
