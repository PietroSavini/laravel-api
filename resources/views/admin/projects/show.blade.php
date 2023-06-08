@extends('layouts.admin')

@section('content')
<div class="show">
    <div class="ms_container content-show">
        <div class="text-center py-3">
            <h3>{{$project->title}}</h3>
            <hr>
        </div>
        <div class="project-info">
            <p class="project-description  text-center">{{$project->description}}</p>
            <p class="text-start">tags: </p>
        </div>
        <hr>
        <div class="actions">
            <a href="{{route('admin.projects.index')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
            <a href="" class="btn btn-warning m-2"><i class="fa-solid fa-pen-to-square"></i></a>
            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
        </div>
    </div>

</div>
    
@endsection