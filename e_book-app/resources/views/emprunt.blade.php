<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .containerr {
            margin-top: 150px;
        }

        /* Styles pour la mise en page et la présentation */



        /* header {
  background-color: #333;
  color: #fff;
  padding: 20px;
} */

        h1 {
            margin: 0;
            font-size: 32px;
        }

        h2 {
            font-weight: normal;
            font-size: 16px;
            background-color: #ffffff;
            /* width: 30%; */
        }

        h2:hover {
            cursor: pointer;
            background-color: white;

        }

        h4 {
            text-decoration: underline;
            margin-left: 10px;
            border: 1px black;

        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        .emprunt-section {
            background-color: #f1eaee;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
            margin-left: 400px;
            width: 40%;
            color: black;
            margin-bottom: 200px;

        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="number"],
        form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 3px;
            border: 1px solid #ccc;
            justify-content: center;
        }

        form button {
            background-color: #ffffff;
            color: #150303;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #a40b0b;
        }

        .alrt {
            border: 1px solide black;
            font-weight: bold;
            color: red;
            align-items: center;
            text-align: center;

        }
       
    </style>
</head>

<body>
    @extends('layout.app')
    @section('content')
    <div class="containerr">
        <h4>Conditions d'emprunter de Livre :</h4>
        <div class="container mt-4">
            <div class="alrt ">
                <p>Bienvenue dans notre bibliothèque en ligne ! Nous sommes ravis de vous offrir une
                    vaste sélection de livres captivants. Avant d'emprunter, veuillez prendre connaissance de nos
                    conditions :</p>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-light p-4">
                        <h2>1. Durée d'Emprunt</h2>
                        <p>Profitez de nos livres pendant une période flexible allant jusqu'à 30 jours. Vous avez la
                            liberté de choisir
                            la durée qui correspond le mieux à votre rythme de lecture.</p>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-4">
                        <h2>2. Retard et Pénalités</h2>
                        <p>Nous comprenons que parfois la vie peut être imprévisible. Cependant, afin de garantir
                            l'accès équitable à
                            nos livres pour tous nos membres, veuillez respecter les délais. Des frais minimes peuvent
                            être appliqués en
                            cas de retard dans le retour d'un livre.</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-light p-4">
                        <h2>3. Renouvellement</h2>
                        <p>Si vous avez besoin de plus de temps pour terminer votre livre, vous pouvez renouveler votre
                            emprunt en
                            ligne, sous réserve de disponibilité.</p>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-4">
                        <h2>4. Disponibilité</h2>
                        <p>Certains livres très demandés peuvent avoir des listes d'attente. Si un livre n'est pas
                            disponible
                            immédiatement, vous pouvez le réserver et recevoir une notification dès qu'il sera à nouveau
                            disponible.
                        </p>

                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-light p-4">
                        <h2>5. Soin des Livres</h2>
                        <p>Nous vous encourageons à prendre soin des livres empruntés afin de garantir qu'ils restent en
                            excellent état
                            pour les autres lecteurs.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-4">
                        <h2>Phrase final</h2>
                        <p>Nous espérons que ces conditions rendront votre expérience de lecture agréable et sans
                            tracas. Explorez notre
                            collection et plongez-vous dans les mondes fascinants offerts par nos livres !</p>

                    </div>
                </div>
            </div>
        </div>



    </div>

    <section class="emprunt-section">
        <button onclick="genererFormulaire()"> Cliquez pour Emprunter</button>

        <div id="formulaireEmprunt" style="display: none;">

            <form action="#" method="POST">
                <label for="nom-livre">Nom du Livre:</label>
                <input type="text" id="nom-livre" name="nom-livre" required>

                <label for="date-emprunt">Date d'emprunt:</label>
                <input type="date" id="date-emprunt" name="date-emprunt" required>

                <label for="duree-emprunt">Durée d'emprunt (en jours):</label>
                <input type="number" id="duree-emprunt" name="duree-emprunt" min="1" required>

                <button type="submit">Emprunter</button>
            </form>
        </div>

    </section>



    @endsection
    <script>
        function genererFormulaire() {
        var formulaire = document.getElementById("formulaireEmprunt");
        formulaire.style.display = "block";
    }
    </script>



</body>

</html>