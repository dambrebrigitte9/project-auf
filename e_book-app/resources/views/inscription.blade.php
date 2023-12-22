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
    </style>
</head>

<body>
    <div class="body">
        @extends('layout.app')
        @section('content')
        <div class="container wire">
        </div>
        <fieldset>
            <p class="ins">Creer un compte</p>
            <hr>
            <form action="/inscrire" method="post">
                @csrf

                <div class="entrer">
                    <label for="">Nom et Prenom*</label>
                    <input type="text" name="nom_prenom" id="" required>
                </div>
                <div class="entrer">
                    <label for="">Numero de telephone*</label>
                    <input type="tel" name="telephone" id="" required>
                </div>
                <div class="entrer">
                    <label for="">Adresse Email*</label>
                    <input type="email" name="email" id="" required placeholder="email">
                </div>
                <div class="entrer">
                    <label for="">Mot de passe* </label>
                    <input type="password" name="password" id="" required>
                </div>
                <div class="entrer">
                    <label for="">Confirmer mot de passe*</label>
                    <input type="password" name="confirm_password" id="" required>
                </div>
                <button type="submit" class="btn btn-warning envoyer"> Envoyez</button>
                <div class="entrer">
                    <p class="confidentiel">En créant un compte, vous acceptez les conditions d'utilisation et de vente
                        de
                        E_boo , notre politique relative aux cookies ainsi
                        que notre politique relative aux publicités ciblées par centres d’intérêts.</p>
                </div>
                <div>
                    <hr>
                    <p>Vous possédez déjà un compte ? <a href="{{route ('connexion')}}">Identifiez-vous</a></p>
                </div>


            </form>
        </fieldset>
        <div class="espace">

        </div>

    </div>
    @endsection


</body>

</html>