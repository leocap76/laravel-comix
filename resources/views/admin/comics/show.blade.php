@extends('layouts.app')

@section('content')
    <div class="container mb-5">

        <div class="clearfix my-4">
        <h1 class="float-left">dettaglio fumetto "{{ $comic->title }}"</h1>
        <a href="{{ route('admin.comics.index') }}" class="btn btn-primary float-right mb-4">elenco fumetto</a>
        </div>
        

        <table class="table table-striped table-bordered my-4">

            <!-- @foreach($comic->getAttributes() as $key => $value)
                <tr>
                    <td><strong>{{$key}}</strong></td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach -->
            <tr>
                <td><strong>ID</strong></td>
                <td>{{ $comic->id }}</td>
                
            </tr>
            <tr>
                <td><strong>CATEGORIA</strong></td>
                <td>{{ $comic->category->name }} ({{ $comic->category_id }})</td>
                
            </tr>
            <tr>
                <td><strong>immagine elenco</strong></td>
                <td><img src="{{ asset('storage/' . $comic->image) }}" alt="" style="max-width: 100px"></td>
            </tr>
            <tr>
                <td><strong>immagine Hero</strong></td>
                <td><img src="{{ asset('storage/' . $comic->image_hero) }}" alt="" style="max-width: 400px"></td>
            </tr>
            <tr>
                <td><strong>immagine cover</strong></td>
                <td><img src="{{ asset('storage/' . $comic->image_cover) }}" alt="" style="max-width: 100px"></td>
            </tr>
            <tr>
                <td><strong>prezzo</strong></td>
                <td>{{ $comic->price }}</td>
                
            </tr>
            <tr>
                <td><strong>testo</strong></td>
                <td>{{ $comic->body }}</td>
                
            </tr>
            <tr>
                <td><strong>personaggi</strong></td>
                <td>
                    <ul>
                        @foreach($comic->characters as $character)
                        <li>{{ $character->id }} - {{ $character->name }}</li>
                        @endforeach
                    </ul>
                </td>
                
            </tr>



        </table>
    </div>
@endsection