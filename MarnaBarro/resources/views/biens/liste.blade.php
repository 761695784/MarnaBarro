<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Biens Immobiliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container text-center">
            <h1>Hello, world!</h1> <hr>
            <a href="/ajouter" class="btn btn-primary">Ajouter un bien</a><hr>
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>   
        @endif   
            <div class="row">
              <div class="row">
                @foreach($biens as $bien)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset ($bien->image)}}" class="card-img-top" alt="bien one">
                        <div class="card-body">
                            <h5 class="card-title" >{{$bien->nom}}</h5>
                            <h6 class="card-title"   style="color: rgb(233, 168, 28)"><u><strong>Catégorie</strong></u>  {{$bien->categorie}}</h6>
                            <p class="card-text" style="color: blue"><u><strong>Adresse</strong></u> : {{$bien->adresse}} </p>
                            <p class="card-text" style="color: green"><u><strong>Publié le</strong></u> : {{$bien->DatePubli}} </p>
                          
                            <p class="card-text">{{ substr($bien->description, 0,100) }}</p>
                            @if($bien->statut)
                            <span class="badge bg-success">Occupé</span>
                        @endif <br/><br/>
                          
                        <a href="  #" class="btn btn-info">Voir plus</a> <br> 
                        {{-- {{ route('details', $bien->id) }}  --}}
                                
                            <hr>
                            <a href="modifier_bien/{{$bien->id}}" class="btn btn-warning">Modifier</a>
                            <a href="supprimer_bien/{{$bien->id}}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </body>
    </html>