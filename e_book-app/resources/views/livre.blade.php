<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    
    h1{
      text-align: center;
      background-color: royalblue;
    }
    .ajout{
      margin-right: 100px;
      font-size: 22px;
      color: black;
      background-color:  rgb(196, 57, 29);
      width: 350px;
    }

    /* form{
      height: auto;
      width: 350px;
      border: 1px solid black;
    } */
/*
    }
    input[type="text"],input[type="number"],input[type="file"]{
      width: 250px;
      margin-top: 20px;
      height: 20px;


    } */
  </style>
</head>

<body>
  @extends('layoute.app')
  @section('content')
  <main class="content">
    <header class="header">
      <h1>Espace Admin didié a l'administratreur</h1>
    </header>





    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis delectus fuga veniam dolore assumenda! Nostrum voluptas, corrupti inventore porro quae natus ducimus reprehenderit repudiandae culpa veritatis eveniet odio cumque reiciendis.</p>
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis delectus fuga veniam dolore assumenda! Nostrum voluptas, corrupti inventore porro quae natus ducimus reprehenderit repudiandae culpa veritatis eveniet odio cumque reiciendis.</p>
          <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis delectus fuga veniam dolore assumenda! Nostrum voluptas, corrupti inventore porro quae natus ducimus reprehenderit repudiandae culpa veritatis eveniet odio cumque reiciendis.</p>

        </div>
        <div class="col-md-6">
          <p class="ajout">Formulaire d'ajout de livre</p>
          <div class="container-fluid">
            <form action="/livrable" method="post" enctype="multipart/form-data">
              @csrf

              <div class="form-group">
                <label for="exampleFormControlInput1">Titre</label>
                <input type="text" class="form-control"  name="titre" placeholder="title" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <input type="text" class="form-control"  name="description" placeholder="description" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Prix_llivre</label>
                <input type="number" step="0.01" class="form-control"  name="prix_livre" placeholder="cout" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Auteur</label>
                <input type="text" class="form-control"  name="auteur" placeholder="nom_auteur" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">image</label>
                <input type="file" class="form-control"  name="image_path" placeholder="image du livre" required>
              </div>
      
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      
      
          </div>
        </div>
      </div>
    </div>

    
  </main>



  @endsection

</body>

</html>