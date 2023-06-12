@include('admin.partials.modal')
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
            <p class="text-start">tags:  @foreach ($project->technologies as $technology)
                <span>{{ $technology->name }}{{ $loop->last ? "." : "," }}</span>
            @endforeach </p>
            @if ($project->type)
            <p class="text-start">linguaggio principale: {{$project->type?->type}}</p>
            @else
            <p class="text-start ">linguaggio principale: <span class="small-warning">(attribuisci un linguaggio di programmazione nella sezione "modifica progetto")</span></p>
            @endif
        </div>
        <hr>
        <div class="actions">
            <a href="{{route('admin.projects.index')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i></a>
            <a href="{{route('admin.projects.edit',$project)}}" class="btn btn-warning m-2"><i class="fa-solid fa-pen-to-square"></i></a>
            <form class="d-inline-block" action="{{route('admin.projects.destroy', $project)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" projects-title="{{ $project->title }}"
                class="btn btn-danger ms_delete_btn"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

</div>
    
@endsection