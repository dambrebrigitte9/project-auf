<head>
    <meta charset="UTF-8">
    <title>Interface d'Administration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
  
  </head>
<aside class="sidebar">
    <div class="logo">
        <img class="image1" src="{{ asset('images/e_book_logo.png') }}" alt="Description de l'image">
    </div>
    <ul class="menu">
        <li>
            <input type="checkbox" id="livre">
            <label for="livre" class="toggle-submenu">Gestion de Livre</label>
            <ul class="submenu">
                <li><a href="{{route('livre')}}">Ajouter Livre</a></li>
                <li><a href="{{route('historique_livre')}}">historique Livre</a></li>

            </ul>
            

        </li>
       
        <li>
            <input type="checkbox" id="utilisateurs">
            <label for="utilisateurs" class="toggle-submenu">Gestion de Panier</label>
            <ul class="submenu">
                <li><a href="#">Historique panier</a></li>
            </ul>
        </li>
        <li>
            <input type="checkbox"id="client" >
            <label for="client" class="toggle-submenu" >Gestion des client</label>
            <ul class="submenu">
                <li><a href="{{route('client')}}">historique clientelle</a></li>
            </ul>
        </li>

        <li>
            <input type="checkbox"id="emprunts" >
            <label for="emprunts" class="toggle-submenu" >Gestion des paiement</label>
            <ul class="submenu">
                <li><a href="{{route('afficher_paye')}}">Historique des paiements</a></li>
            </ul>
        </li>
    </ul>
    
   
  </aside>


 