<!DOCTYPE html>
<html lang="en">

<body>
  @extends('layout.app') {{-- pour appeler notre dossier layout qui contient notre header et footer--}}
  @section('content')
  <!-- Structure de base du carrousel Bootstrap -->
  <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="slide" src="{{ asset('images/slide1.jpg')}}" class="d-block w-100" alt="Image 1">

      </div>
      <div class="carousel-item">
        <img class="slide" src="{{ asset('images/slide2.jpg')}}" class="d-block w-100" alt="Image 1">
      </div>
      <div class="carousel-item">
        <img class="slide" src="{{ asset('images/slide0.jpg')}}" class="d-block w-100" alt="Image 1">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

      </div>
      <span class="visually-hidden">Suivant</span>
    </button>
  </div>


  <section class="coorectif">
    <div>
      <h1>Nos livres disponibles</h1>
      


    </div>

    <div class="container">
      <legend>Fraîchement sorti, livre neuf maintenant disponible pour achat lecture</legend>
      <div class="row">
        <!-- Premier cadre -->
        {{-- <div class="col-md-3">
          <div class="book">
            <div class="book-image">
              <img src="{{asset('images/slide0.jpg')}}" alt="Image du livre">
            </div>
            <div class="book-details">
              <h2>Titre du livre</h2>
              <p>Description du livre</p>
              <p>Nom de l'auteur</p>
              <p>Prix : $XX.XX</p>
              <div class="cart-icon">
                <i class="panier">ajouter au panier</i>
                <i class="fas fa-shopping-cart"></i>
              </div>
            </div>
          </div>
        </div> --}}



        @foreach( $livres as $livre)
        <div class="col-md-3">
          <div class="book">
            <div class="book-image">
              <img src="{{ asset('storage/' . $livre->image_path) }}" alt="Nom de votre image">
            </div>
            <div class="book-details">
              <div class="flex flexi">
                <p class="titre">Titre : </p>
                <h2 class="soutitre"> {{ $livre->titre }}</h2>
              </div>

              <div class="flex">
                <p class="des">Description: </p>
                <p class="">{{ $livre->description }} </p>
              </div>

              <div class="flex">
                <p class="des">Prix :</p>
                <p class="emet"> {{ $livre->prix_livre }} FCFA</p>
              </div>

              <div class="flex">
                <p class="des">Auteur :</p>
                <p>{{ $livre->auteur }}</p>
              </div>

              <div class="cart-icon">
                <form action="/panier" method="post">
                  @csrf
                  <input type="hidden" name="livre_id" value="{{ $livre->id }}">

                  {{-- <input type="hidden" name="titre" value="{{ $livre->titre }}">
                  <input type="hidden" name="description" value="{{ $livre->description }}">
                  <input type="hidden" name="prix_livre" value="{{ $livre->prix_livre }}">
                  <input type="hidden" name="auteur" value="{{ $livre->auteur }}">
                  <input type="hidden" name="image_path" value="{{ $livre->image_path }}">--}}

                  <button type="submit" class="btn btn-success"> ajouter au panier <i
                      class="fas fa-shopping-cart"></i></button>

                </form>

              </div>
            </div>
          </div>
        </div>
        @endforeach




      </div>

    </div>

  </section>


  @endsection


</body>

</html>