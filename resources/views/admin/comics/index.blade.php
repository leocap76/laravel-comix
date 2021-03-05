@extends('layouts.app')

@section('content')
    @if(!empty($session["message"]))
        <div class="alert alert-success">
            {{ $session["message"] }}
        </div>
    @endif

    <div class="container">
    <h1>tutti i fumetti</h1>
    <a href="{{ route('admin.comics.create')  }}" class="btn btn-primary float-right mb-4">crea nuovo fumetto</a>
    <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>categoria</th>
                    <th>prezzo</th>
                    <th><copertina/th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($comics as $comic)
                <tr>
                    <td>{{  $comic->id }}</td>
                    <td>{{  $comic->title }}</td>
                    <td>{{  $comic->category->name }}</td>
                    <td>{{  $comic->price }}</td>
                    <td>
                        <img src="{{  asset('storage/'. $comic->image_cover) }}" alt="{{  $comic->image_title }}">
                    </td>
                    <td>
                        <a href="{{ route('admin.comics.show', $comic->id) }}" class="btn btn-info">mostra</a>
                    </td>

                    <td><a href="{{ route('admin.comics.edit', $comic->id) }}" class="btn btn-success">modifica</a></td>

                    <td><a href="" class="btn btn-danger">elimina</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        
        </div>

@endsection