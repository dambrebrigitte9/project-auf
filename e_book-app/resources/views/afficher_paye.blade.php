<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }

        .table-stylisee {
            width: 100%;
            /* Définit la largeur de la table à 100% de son conteneur */
            border-collapse: collapse;
            /* Fusionne les bordures des cellules pour un aspect plus net */
            border: 2px solid #333;
            /* Ajoute une bordure de 2px solide autour de la table */
        }

        .table-stylisee th,
        .table-stylisee td {
            padding: 10px;
            /* Ajoute un espace intérieur de 10px aux cellules de la table */
            border: 1px solid #999;
            /* Ajoute une bordure de 1px solide autour des cellules */
            text-align: center;
            /* Centre le texte dans les cellules */
        }

        .table-stylisee th {
            background-color: rgb(217, 25, 25);
            /* Change la couleur de fond des cellules d'en-tête */
            color: #fff;
            /* Change la couleur du texte des cellules d'en-tête en blanc */
        }
    </style>
</head>

<body>
    @extends('layoute.app')
    @section('content')
    <main class="content">
        <header class="header">
            {{-- <h1>Espace Admin didié a l'administratreur</h1> --}}
            <h1>Historique des payes</h1>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table-stylisee ">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Numero de carte</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Date d'expiration</th>
                                <th scope="col">cvv</th>
                                <th scope="col">Nom sur la carte</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payers as $payes)
                            <tr>

                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $payes->card_number }}</td>
                                <td>{{ $payes->montant }}</td>
                                <td>{{ $payes->expiry_date }}</td>
                                <td>{{ $payes->cvv }}</td>
                                <td>{{ $payes->name_on_card }}</td>
                                <td>

                                    <a href="#" type="button"><i class=" btn btn-warning">Modify</i> </a>
                                    <br>
                                    <br>
                                    <form action="{{ route('delete', $payes->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>


                                </td>






                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>


    </main>


    @endsection

</body>

</html>