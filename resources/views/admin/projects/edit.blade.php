@extends('layouts.admin')

@section('content')

<div class="edit">

    <div class="ms_container">
        
        <form action="{{route('admin.projects.update',$project)}}" method="POST">
            @method('PUT')
            @csrf
            <h3>modifica del project :</h3>
            <h4 class="mb-3"> {{$project->title}}</h4>
            <div class="form-group">
                <label class="d-inline-block" for="img">nuovo titolo:</label>
                <input value="{{ old('title') }}" type="text" class="form-control  @error('title')is-invalid @enderror" 
                    id="img" name="title">
                
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
           
            <div class="form-group">
                <label  for="description" class="d-block">descrizione:</label>
                <textarea value="{{old('description')}}" name="description" id="description"  rows="3"></textarea>
            </div>
    
    
            <div class="actions">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                <a href="{{route('admin.projects.show',$project)}}" class="btn btn-warning m-2"><i class="fa-solid fa-rotate-left"></i></a>
            </div>
        </form>
        
    </div>
</div>
    
@endsection