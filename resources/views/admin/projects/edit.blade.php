@extends('layouts.admin')

@section('content')

<div class="edit">

    <div class="ms_container">
        
        <form action="{{route('admin.projects.update',$project)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h3>modifica del project :</h3>
            <h4 class="mb-3"> {{$project->title}}</h4>
            <div class="form-group">
                <label class="d-inline-block" for="img">nuovo titolo:</label>
                <input value="{{ $project->title}}" type="text" class="form-control  @error('title')is-invalid @enderror" 
                    id="img" name="title">
                
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
           
            <div class="form-group">
                <label  for="description" class="d-block">descrizione:</label>
                <textarea value="{{$project->description}}" name="description" id="description"  rows="3"></textarea>
            </div>
            
            <div class="form-group">
                <label for="type" >linguaggio di programmazione:</label>
                <select class="form-select" name="type_id" id="type" >
                    <option value="">seleziona un linguaggio</option>
                    @foreach($types as $type){
                        <option @selected($type->id == $project->type?->id) value="{{$type->id}}">{{$type->type}}</option>
                    }
                    @endforeach
                </select>
            </div>

            <div class="mb-3 technology-checkbox">
                <h4>seleziona tags relative al progetto:</h4>
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <label class="form-check-label" for="technology-{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            value="{{ $technology->id }}"
                            id="technology-{{ $technology->id }}" 
                            name="technologies[]" 
                            @checked(old('technologies')
                                    ? in_array($technology->id, old('technologies', []))
                                    : $project->technologies->contains($technology))>
                    </div>
                @endforeach
            </div>
            
            <div class="mb-3">
                <h4 class="mt-5">modifica immagine</h4>
                <label for="image"></label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                <a href="{{route('admin.projects.show',$project)}}" class="btn btn-warning m-2"><i class="fa-solid fa-rotate-left"></i></a>
            </div>
        </form>
        
    </div>
</div>
    
@endsection