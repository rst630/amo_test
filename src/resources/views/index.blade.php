<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>test</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
    <body class="antialiased">
    @if(!$leads->isEmpty())
    <table>
        <thead>
        <tr>
        @foreach($leads[0]->toArray() as $head => $val)
            <th>{{$head}}</th>
        @endforeach
        </tr>
        </thead>
        <tbody>
    @foreach($leads->toArray() as $lead)
        <tr>
            @foreach($lead as $val)
                <td>
                    @if(is_array($val))
                        @json($val,JSON_PRETTY_PRINT)
                    @else
                    {{$val}}
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
        </tbody>
    </table>
    @endif
    </body>
</html>
