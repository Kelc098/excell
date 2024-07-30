<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
    <title>ejemplo</title>
</head>
<body>
<head>
    <nav>
        <ul>
            <li><a href="{{route('import')}}">import</a></li>
            <li><a href="{{route('export')}}">export</a></li>
        </ul>
    </nav>
    <form method="POST" action="{{route('import')}}" enctype="multipart/form-data">
        <h3>Importacion</h3>
        @csrf
        <input type="file" name="document_csv"/>
        <input type="submit" value="import csv"/>
    </form>
</head>
<main>
    @forelse ( $product as $product )
        <article>
            <head>
                {{$product->name}}

            </head>
            {{$product->document}}
            <footer>
                {{$product->password}}$
            </footer>
        </article>
    @empty
        <p>No data</p>
    @endforelse
</main>


</body>
</html>
