<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send Data Ke Blade Template</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>
        Welcome!
    </h1>
    <ul>
        <li>{{$user['nama']}}</li>
        <li>{{$user['umur']}}</li>
        <li>{{$user['query']}}</li>
        <!-- ternary -->
        <li>{{$user['kondisi'] ? "Kondisi = true" : "Kondisi = false "}}
        </li>
        <p> --blade for loop-- </p>
        @for($i = 0; $i < 4; $i++) <li> {{$i}}</li>
            @endfor
    </ul>
    <script src="scripts.js"></script>
</body>

</html>