<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>JSON</title>
</head>
<body class="antialiased">
    <div>
        <table>
            <tr>
                <td width="100px;">JSON ID</td>
                <td width="50px;" colspan="2" align="center">ACTION</td>
                <td width="50px;"></td>
            </tr>
            @foreach($jsons as $json)
                <tr>
                    <td>
                        <a href="{{ route('json.show', $json->id )}}">{{$json->id}}</a>
                    </td>
                    <td>
                        <form method="GET" action="{{ route('json.edit', $json->id) }}">
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('json.destroy', $json->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <br>

    </div>
</body>
</html>