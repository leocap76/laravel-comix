@extends('layouts.app')

@section('content')
    <div class="container"> 
    <div class="clearfix mb-4">
        <h1 float-left>modifica del fumetto "{{ $comic->title }}"</h1>
        <a href="{{ route('admin.comics.index')  }}" class="btn btn-primary float-right mb-4">elenco fumetti</a>
     </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            
            </div>
        @endif

        <form action="{{ route('admin.comics.update'), $comic->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf 
             
             <div class="form-group">
                <label for="title"> title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
             </div>

             <div class="form-group">
                <label for="price"> prezzo</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
             </div>

             <div class="form-group">
                <label for="body"> testo</label>
                <textarea name="body" id="body" rows="10" class="form-control">{{ $comic->body }}</textarea>
             </div>

             <div class="form-group">
                <label for="image"> immagine elenco</label>
                @if(!empty($comic->image))
                <img class="d-block" src="{{ asset('storage/' . $comic->image) }}" alt="{{ $comic->title}}">
                @endif
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
             </div>

             <div class="form-group">
                <label for="image"> immagine hero</label>
                <img class="img-fluid d-block" src="{{ asset('storage/' . $comic->image_hero) }}" alt="{{ $comic->title}}">
                <input type="file" class="form-control" id="image_hero" name="image_hero" accept="image/*">
             </div>

             <div class="form-group">
                <label for="image"> immagine cover</label>
                <img class="d-block" src="{{ asset('storage/' . $comic->image_cover) }}" alt="{{ $comic->title}}">
                <input type="file" class="form-control" id="image_cover" name="image_cover" accept="image/*">
             </div>

             <div class="form-group">
                <label for="title"> categoria</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">scegli la categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}"

                            @if ($category->id == $comic->category_id)
                                selected
                            @endif

                        >{{ $category->name}}</option>
                    @endforeach
                </select>

             </div>

             <div class="form-group">
                <label for="characters"> personaggi</label>
                <select class="form-control" name="characters[]" id="characters" multiple>
                    
                    @foreach($characters as $character)
                        <option value="{{ $character->id}}"
                            
                        @if ($comic->characters->contains(character->id))
                                selected
                            @endif

                        >{{ $character->name}}</option>
                    @endforeach
                </select>

             </div>

             <input type="submit" value="crea" class="btn btn-primary">
        </form>

        <!-- <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        </table> -->
    </div>
    
@endsection