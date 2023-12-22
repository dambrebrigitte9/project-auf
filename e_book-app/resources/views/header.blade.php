<div id="preloader">
  <div class="spinner">

  </div>
</div>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="..." crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{asset('css/livre.css')}}">
  <link rel="stylesheet" href="{{asset('css/panier.css')}}">



</head>


<nav class="navbar navbar-expand-lg navbar-light navbara navbarrr">
  <div class="container-fluid">
   
    <img class="image1" src="{{ asset('images/e_book_logo.png') }}" alt="Description de l'image">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-dark " aria-current="page" href="{{ route('index') }}">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Nos Cours<i class="fas fa-book"></i>
            </i>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item c" href="#">Scolaire </a></li>
            <li><a class="dropdown-item text-dark" href="#">Pre-scolaire</a></li>
            <li><a class="dropdown-item text-dark" href="#">Post-scolaire</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" aria-current="page" href="/emprunt">Help Badge</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="/afficherpanier">Mon Panier <span
              class="badge badge-pill badge-dark">{{Cart::count()}}</span> <i class="fas fa-shopping-cart icon_es"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Authentification<i class="fas fa-door-open"></i>
            </i>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-dark" href="{{route('inscription')}}">Inscription </a></li>
            <li><a class="dropdown-item text-dark" href="{{route('connexion')}}">Connexion</a></li>
            <li><a class="dropdown-item text-dark" href="{{route('profil')}}">deconexion</a></li>
          </ul>
        </li>

      </ul>
      <form class="d-flex">
        <input class=" search form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class=" btn btn-outline-info" type="submit"> <i class="fas fa-search"></i></button>
      </form>
    </div>
  </div>
  @if(session('client_name'))
  <p  classe="bienvenu">Bienvenue, {{ session('client_name') }} !</p>
  @endif
</nav>



<!-- Requis pour les fonctionnalités de Bootstrap (dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/preloader.js') }}"></script>
