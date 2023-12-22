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
            <hr>
            <form action="/sendResetLinkEmail" method="post">
                @csrf

                <div class="entrer">
                    <label for="">Adresse Email</label>
                    <input type="email" name="email" id="" required>
                </div>


                <button type="submit" class="btn btn-warning envoyer"> connexion</button>


            </form>
        </fieldset>

        <div class="espace">

        </div>

    </div>

    @endsection


</body>

</html>