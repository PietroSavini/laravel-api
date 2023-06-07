@extends('layouts.admin')

@section('content')
<div class="ms_container">
    <h1>Bentornato {{ $user-> name }}!</h1>
    <p>questa è l'area personale dedicata agli amministratori, da qui potrai modificare i contenuti visuaizzati in pagina o crearne di nuovi!</p>
    <button class="btn  btn-primary">Inizia subito</button>
</div>
    
@endsection