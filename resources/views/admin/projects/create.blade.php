@extends('layouts.admin')

@section('content')

<div class="edit">

    <div class="ms_container">
        
        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <h3 class="mb-3">Nuovo progetto :</h3>
            
            <div class="form-group">
                <label class="d-inline-block" for="img">titolo:</label>
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

            <div class="form-group">
                <label for="type" >linguaggio di programmazione:</label>
                <select class="form-select" name="type_id" id="type" >
                    <option value="">seleziona un linguaggio</option>
                    @foreach($types as $type){
                        <option @selected(old('type_id') == $type->id) value="{{$type->id}}">{{$type->type}}</option>
                    }
                    @endforeach
                </select>
            </div>
    
    
            <div class="actions">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i></button>
                <a href="{{route('admin.projects.index')}}" class="btn btn-warning m-2"><i class="fa-solid fa-rotate-left"></i></a>
            </div>
        </form>
        
    </div>
</div>
    
@endsection