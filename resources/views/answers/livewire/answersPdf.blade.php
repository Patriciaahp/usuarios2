<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Answers PDF</title>
    <h1>Answers</h1>
</head>
<body>
<table class="table">
    <thead class="thead">
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Label</th>
        <th scope="col">Answer</th>
        <th scope="col">Created At</th>
        <th scope="col">Session</th>
    </tr>
    </thead>
    <tbody>
    @foreach($answers as $answer)
        <tr>
            <td>{{$answer->id}}</td>
            <td>{{$answer->label}}</td>
            <td>{{$answer->answer}}</td>
            <td>{{$answer->created_at}}</td>
            <td>{{$answer->session_id}}</td>

        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .table {
        margin-left: auto;
        margin-right: auto;
    }

    * {
        text-align: center;
        align-items: center;
    }

</style>
