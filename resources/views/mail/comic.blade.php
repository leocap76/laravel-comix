<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dc Comics mail</title>
</head>
<body>
    <h1>{{ $comic->title}}</h1>
    <img src="{{ asset('storage/' . $comic->image_hero)}}" alt="{{ $comic->title}}" style="width: 100%">
    <div>
    {!! $comic->body !!}
    </div>
</body>
</html>