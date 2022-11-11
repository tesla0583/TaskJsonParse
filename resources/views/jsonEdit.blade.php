<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Edit JSON</title>
</head>
<body class="antialiased">
    <div>
        <form method="post" action="{{ route('json.update', $result->id) }}">
            @csrf
            @method('PUT')

            <p><label for="jsonText">Edit JSON:</label></p>
            <textarea id="jsonText" name="jsonText" rows="20" cols="50">
                {!! $result->data !!}
            </textarea>
            <br>

            <div class="text-center">
                <button type="submit">Сохранить</button>
            </div>

        </form>
    </div>
</body>
</html>