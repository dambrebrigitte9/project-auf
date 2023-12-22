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
        .perdu{
            margin-top: 29px;
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
            @if(session('error'))
            <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

        </div>
        <fieldset>
            <p class="ins">Se connecter sur un compte</p>
            <hr>
            <form action="/connect" method="post">
                @csrf

                <div class="entrer">
                    <label for="">Adresse Email</label>
                    <input type="email" name="email" id="" required>
                </div>
                <div class="entrer">
                    <label for="">Mot de passe </label>
                    <input type="password" name="password" id="" required>
                </div>

                <button type="submit" class="btn btn-warning envoyer"> connexion</button>
                <div class="perdu">
                    <a href="{{ route('request') }}">Mot de passe perdu?</a>
                </div>
                <div class="entrer">
                    <p class="confidentiel">En créant vous connectant, vous acceptez les conditions d'utilisation et de
                        vente de
                        E_boo , notre politique relative aux cookies ainsi
                        que notre politique relative aux publicités ciblées par centres d’intérêts.</p>
                </div>
                <div>
                    <hr>
                    <p>Creer un compte ? <a href="{{route ('inscription')}}">Inscription</a></p>
                </div>


            </form>
        </fieldset>

        <div class="espace">

        </div>

    </div>

        @endsection


</body>

</html>