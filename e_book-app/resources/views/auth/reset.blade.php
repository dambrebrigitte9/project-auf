
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .body {
            background-color: rgb(130, 218, 205);
        }

        .perdu {
            margin-top: 29px;
        }
        .message{
            background-color: red;
            color: black;
            text-align: center;
            
        }
      
    </style>
</head>

<body>
    <div class="body">

        @extends('layout.app')
        @section('content')
        <div class="container wire">
        </div>
        <div>
            @if (session('status'))
            <div class="message">
                {{ session('status') }}
            </div>
            @endif


        </div>
        <fieldset>
            <p class="ins">Recuperer son mot de passe</p>
            <form action="{{ route('password.update') }}"  method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="email" name="email" value="{{ $email }}">
                <input type="password" name="password" placeholder="Nouveau mot de passe"><br>
                <input type="password" name="password_confirmation" placeholder="Confirmez le mot de passe">
                <button class="btn btn-success" type="submit">Réinitialiser le mot de passe</button>
            </form>
        </fieldset>

        <div class="espace">

        </div>

    </div>

    @endsection


</body>

</html>



















