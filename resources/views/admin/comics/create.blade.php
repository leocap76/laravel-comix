@extends('layouts.app')

@section('content')
    <div class="container"> 
    <div class="clearfix mb-4">
        <h1 float-left>{{$title}}</h1>
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

        <form action="{{ route('admin.comics.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf 
             
             <div class="form-group">
                <label for="title"> title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
             </div>

             <div class="form-group">
                <label for="price"> prezzo</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
             </div>

             <div class="form-group">
                <label for="body"> testo</label>
                <textarea name="body" id="body" rows="10" class="form-control">{{ old('body') }}</textarea>
             </div>

             <div class="form-group">
                <label for="image"> inmagine elenco</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
             </div>

             <div class="form-group">
                <label for="image"> inmagine hero</label>
                <input type="file" class="form-control" id="image_hero" name="image_hero" accept="image/*">
             </div>

             <div class="form-group">
                <label for="image"> inmagine cover</label>
                <input type="file" class="form-control" id="image_cover" name="image_cover" accept="image/*">
             </div>

             <div class="form-group">
                <label for="title"> categoria</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">scegli la categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id}}">{{ $category->name}}</option>
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