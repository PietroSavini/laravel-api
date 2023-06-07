@extends('layouts.admin')

@section('content')
<div class="ms_container">
    <h1>Bentornato {{ $user-> name }}!</h1>
    <p>questa è l'area personale dedicata agli amministratori, da qui potrai modificare i contenuti visuaizzati in pagina o crearne di nuovi!</p>
    <a href="{{route('admin.projects.index')}}"class="btn  btn-primary" >Inizia subito</a>
</div>
    
@endsection