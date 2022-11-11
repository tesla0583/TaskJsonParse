<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Show JSON</title>
</head>
<body class="antialiased">
    <div>
        {!! $result !!}

        <br>
        <a href="{{ route('json.index') }}">Home</a>
    </div>
</body>
</html>