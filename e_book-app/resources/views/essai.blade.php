@if(isset($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bibi{
            background-color: red;
            color: black;
        }
    </style>
</head>
<body>
    <div class="bibi">
        <p>Vous n'avez pas de mail sur notre site donc vous pouvez pas recuperer de mot de passe</p>
    </div>

    
</body>
</html>