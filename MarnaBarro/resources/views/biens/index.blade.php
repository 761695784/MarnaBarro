<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <!-- Titre du site -->
          <a class="navbar-brand" href="#">ImmoBien</a>
          
          <!-- Bouton de basculement pour les appareils mobiles -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <!-- Liens de navigation -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <h1 style="text-align: center" class="m-2"> Bienvenu sur ImmoBien</h1>

      <div class=" m-5 d-flex flex-wrap gap-5  ">

        @foreach ($biens as $bien)
            
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
              <img src="{{asset ($bien->image)}}" class="card-img-top" alt="bien one">
              <div class="card-body">
                  <h5 class="card-title" >{{$bien->nom}}</h5>
                  <h6 class="card-title"   style="color: rgb(233, 168, 28)"><u><strong>Catégorie</strong></u>  {{$bien->categorie}}</h6>
                  <p class="card-text" style="color: blue"><u><strong>Adresse</strong></u> : {{$bien->addresse}} </p>
                  <p class="card-text" style="color: green"><u><strong>Publié le</strong></u> : {{$bien->DatePubli}} </p>
                
                  <p class="card-text">{{ substr($bien->description, 0,100) }}</p>
             <p> {{ $bien->status }}</p>
                
              <a href="" class="btn btn-info">Voir plus</a> <br> 
             
                      
                  <hr>
                  <a href="" class="btn btn-warning">Modifier</a>
                  <a href="" class="btn btn-danger">Supprimer</a>
              </div>
          </div>
      </div>
        @endforeach
      </div>

    <!--  ('nom'); //
      description');
      ('status')-
      ('categorie'); 
      ('addresse');
      ('image');
    ('date_publier'); -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>