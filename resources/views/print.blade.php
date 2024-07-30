<!DOCTYPE html>
<html>
<head>
    <title>Generar Excel</title>
</head>
<body>
    <h1>Generar Archivo Excel</h1>
    <form action="{{ route('generate.excel') }}" method="POST">
        @csrf
        <button type="submit">Generar Archivo Excel</button>
    </form>
</body>
</html>
