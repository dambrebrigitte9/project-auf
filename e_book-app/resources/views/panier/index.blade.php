<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <style>
      .container {
         margin-bottom: 250px;
         margin-top: 100px
      }

      .image {
         height: 30px;
         height: 30px;
      }

      .vide {
         margin-bottom: 300px;
      }

      .videe {
         border: 1px solid black;
         background-color: rgb(48, 161, 106);
         height: 50%;
         color: white;
         text-align: center
      }
      .card{
         margin-right: 100px;
         width: 500px;
      }
      .card-title{
          background-color: red;
          color: white;
          padding: 10px;
          font-size: 20px;
      }
      /* .col-md-6{
      margin-bottom: 100px;   
      } */
      .sauter{
         margin-top: 500px;
      }
      .recapitulatif{
         font-size: 27px;
         font-weight: bold;
         color: black;
         background-color: rgb(236, 229, 228);
         padding: 4px;
         text-align: center;
         width: 77vw;
      }
      .recapitulatif:hover{
         background-color: rgb(94, 150, 113);
         cursor: pointer;


      }
      .tatalpaye{
         font-size: 20px;
         color:rgb(0, 129, 19);
         cursor: pointer;
         
      }
   </style>
</head>

<body>
   @extends('layout.app')
   @section('content')
   @if(Cart::count() >0)
   

   <div class="container">
      <div>
         <h1 class="recapitulatif">Liste de mes produits</h1>
      </div>

      <table id="productTable">

         <tr>
            <th>Produit</th>
            <th>Description</th>
            <th>Prix</th>
            <th>auteur</th>
            <th>Quantité</th>
            <th>Action</th>
         </tr>

         @foreach (Cart::content() as $item)
         <tr>
            <td>
               <img class="image" src="{{ asset('storage/' . $item->options->image_path) }}" alt="Nom de votre image">
               <span>{{ $item->name }}</span>
            </td>
            <td>{{ $item->options->description }} </td>
            <td>{{ $item->price }} FCFA</td>
            <td>{{ $item->options->auteur }}</td>
            <td><input type="text" value="{{ $item->qty }}" min="1"></td>
            {{-- <td><button class="incrementBtn">+</button></td> --}}
            <div>
               <form action="{{route('destroy',$item->rowId)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <td><button type="submit" class="removeBtn">Retirer</button></td>
               </form>
            </div>
         </tr>
         @endforeach


      </table>
   </div>




   @else
   <div class="col_md_12">
      <p class="vide"></p>
      <p class="videe"> VOTRE PANIER EST VIDE </p>

   </div>
   @endif



   <div class="container">
      <div>
         <h1 class="recapitulatif">Recapitulatif Achat</h1>
      
      </div>

      <div class="row">
         <div class="col-md-6">
            <div class="card">
               <div class="card-body">
                  <h5 class="card-title">Votre Panier</h5>
                  <p class="card-text">
                  <table class="table table-bordered">
                     <tr>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Taxe</th>
                        <th>Total</th>
                     </tr>
                     @foreach (Cart::content() as $item)
                     <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }} FCFA</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->tax }} FCFA</td>  {{--17.34% --}}
                        <td>{{ $item->total }} FCFA</td>
                      
                     </tr>
                     @endforeach
                     <tr>
                        <td colspan="4" class="text-right">Total  a payer :</td>
                        <td class="tatalpaye">{{ Cart::total() }} FCFA</td>
                     </tr>
                  </table>
                  </p>
                  <div>
                     <form action="/paiement" method="post">
                        @csrf
                        <button  class="btn btn-danger" type="submit">passez a la caisse</button>


                     </form>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-6">
            <div class="card">
               
            </div>
         </div>
         
      </div>
   </div>

   <div class="sauter">

   </div>










   @endsection

</body>

</html>


