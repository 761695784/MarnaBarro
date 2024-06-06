<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Biens Immobiliers</title>
    <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color:whitesmoke">
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
          @if(Auth::check())
          <form action="{{route('logout')}}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
            <button class="btn btn-warning m-1" type="submit" > Déconnexion</button>
      @endif
      @if(Auth::guest())
      <a class="btn btn-warning m-1" href="/login"> Se connecter</a>
  @endif
    

         </form>
        </div>
      </div>
    </nav>
    
  
    <div style="position: relative; width: 100%; height: 0; padding-top: 43.7500%;
    padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16);  overflow: hidden;
 will-change: transform;">
     <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
       src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAGHQzAsbO0&#x2F;-Bz4Z2pVGQK5NRL_Qx0xMA&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
     </iframe>
   </div><br>


<div class="d-flex justify-content-end" >
  @if(Auth::check())
  <a href="/ajouter" class="btn btn-warning m-4" style="float: right"  >Ajouter un bien</a>
@endif
</div>

 
<!--partie essai -->

<div class="container d-flex flex-wrap gap-5 " >
  @foreach($biens as $bien)

  <div class="card mb-3 m-2 p-2" style="width: 38rem; background-color:  " >
    <div class="d-flex ">
      <div class="col-md-7" style="">
        <img src="{{asset ($bien->image)}}" style=" width:18rem; heigth:15rem;" alt="...">
      </div>
      <div class="col-md-5">
        <div class="">   
          <h5 class="card-title" style="color: rgb(233, 168, 28)">{{$bien->nom}}</h5>
           <p class=""> {{ substr($bien->description, 0,100) }}</p>
          </div>
      </div>
    </div>
  
  <div class="d-flex justify-content-between " style="padding: 0.5rem 1rem ;">  
     <h6 class="card-title"   style="color: rgb(233, 168, 28)"><u><strong style="color:black;">Catégorie</strong></u> : {{$bien->categorie}}</h6>
    <h6 class="card-text" style="color:  rgb(233, 168, 28)"><u><strong style="color:black;">Adresse</strong></u> : {{$bien->adresse}} </h6>
   
  </div>
  <h6 class="card-text" style="text-align:start; color:  rgb(233, 168, 28); padding: 0rem 1rem ;"><u><strong style="color:black;">Publié le</strong></u> : {{$bien->DatePubli}} </h6>
    <div class="navbar p-1">
      <a href="{{ route('details', $bien->id) }}" class="btn btn-dark m-2" ><i class="fa-solid fa-info" style="color: #FFD43B;"></i></a> 
      <div>
        @if(Auth::check())
        <a href="modifier_bien/{{$bien->id}}" class="btn btn-dark m-2" ><i class="fa-solid fa-pen" style="color: #FFD43B;"></i></a>
        <a href="supprimer_bien/{{$bien->id}}" class="btn btn-dark m-2"  ><i class="fa-solid fa-trash" style="color: #c9200d;"></i></a>
      @endif
      </div>
    </div>
  </div>
  


  @endforeach
</div>





<!--partie essai fin -->
       

    {{-- <div class="container text-center p-2">
       
  @if (session('reussi'))
  <div class="alert alert-success">
      {{ session('reussi') }}
  </div>
@endif
 
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>   
        @endif   






            <div class="row">
              <div class="row">
                @foreach($biens as $bien)
                <div class="col-md-4 d-flex" >
                    <div class="card " style="width: 18rem;">
                        <img src="{{asset ($bien->image)}}" class="card-img-top" alt="bien one">
                        <div class="card-body">
                            <h5 class="card-title" >{{$bien->nom}}</h5>
                            <h6 class="card-title"   style="color: rgb(233, 168, 28)"><u><strong>Catégorie</strong></u> : {{$bien->categorie}}</h6>
                            <p class="card-text" style="color: blue"><u><strong>Adresse</strong></u> : {{$bien->adresse}} </p>
                            <p class="card-text" style="color: green"><u><strong>Publié le</strong></u> : {{$bien->DatePubli}} </p>
                          
                            <p class="card-text">{{ substr($bien->description, 0,100) }}</p>
                            @if($bien->statut)
                            <span class="badge bg-success">Occupé</span>
                        @endif <br/><br/>
                          
                        <a href="{{ route('details', $bien->id) }}" class="btn btn-info">Voir plus</a> <br> 
                       
                                
                            <hr>
                            <a href="modifier_bien/{{$bien->id}}" class="btn btn-warning">Modifier</a>
                            <a href="supprimer_bien/{{$bien->id}}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> --}}
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </body>
    </html>