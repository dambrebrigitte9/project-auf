<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="iE=edge">
    <title>Document</title>
    <style>
        .container{
            margin-bottom:500px;
        }
        .containerr{
            margin-top:100px;

        }

        .recapitulatif {
            font-size: 27px;
            font-weight: bold;
            color: black;
            background-color: rgb(236, 229, 228);
            padding: 4px;
            text-align: center;
            width: 77vw;
        }

        .recapitulatif:hover {
            background-color: rgb(94, 150, 113);
            cursor: pointer;


        }



h1 {
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"] ,input[type="date"]{
    width:400px;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #841818;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #ff0000;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #1e7c19;
}

.card-title{
          background-color: red;
          color: white;
          padding: 10px;
          font-size: 20px;
      }
    </style>
</head>

<body>
    @extends('layout.app')
    @section('content')

    <div class="containerr">
        <div>
            <h1 class="recapitulatif">Paiement</h1>
        </div>

    </div>


        <div class="container ">
            <form action="{{route ('paye')}}" method="POST">
                @csrf
                <h1 class="card-title">Formulaire de Paiement</h1>
                <div class="form-group">
                    <label for="card_number">Numéro de carte:</label>
                    <input type="text" id="card_number" name="card_number" placeholder="Ex: 4111 1111 1111 1111"
                        required>
                </div>
                <div class="form-group">
                    <label for="expiry_date"> Montant:</label>
                    <input type="text" id="montant" value="{{ Cart::total() }}" name="montant" placeholder="{{ Cart::total() }}" required>
                </div>
                <div class="form-group">
                    <label for="expiry_date">Date d'expiration:</label>
                    <input type="date" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" placeholder="Ex:123" required>
                </div>
                <div class="form-group">
                    <label for="name_on_card">Nom sur la carte:</label>
                    <input type="text" id="name_on_card" name="name_on_card" placeholder="Entrez le nom sur la carte"
                        required>
                </div>
                <button type="submit">Valider le Paiement</button>
            </form>
        </div>



    @endsection

</body>

</html>