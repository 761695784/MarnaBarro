<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails du Bien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <!-- Titre du site -->
          <a class="navbar-brand" href="/">ImmoBien</a>
          
          <!-- Bouton de basculement pour les appareils mobiles -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <!-- Liens de navigation -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="/">Accueil</a>
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


      
   
    <div class="d-flex justify-content-end">
    
        <a href="/liste" class="btn btn-warning m-2" style="">Retour à la liste</a>
    </div>

<!-- la font -->

<div class="container mt-5">
    <!-- Présentation du Bien -->

    <div class="card mb-4">
        <img src="{{ asset($biens->image) }}" class="card-img-top" alt="Image du Bien">
        <div class="card-body">
            
            <h3 class="card-title">
               {{ $biens->nom }}
                <br>   @if  ($biens->statut)
                <span class="badge bg-success">Occupé</span>
            @endif</h3>
            <ul class="list-group list-group-flush">
            
                <li class="list-group-item"><strong>catégorie:</strong>  {{ $biens->categorie }}</li>
                <li class="list-group-item"><strong>Addresse:</strong> {{ $biens->adresse }}</li>
                <li class="list-group-item"><strong>Date:</strong>{{ $biens->DatePubli }}</li>
             
            </ul>
            <div class="mt-4">
                <h4>Description</h4>
                <p>{{ $biens->description }}</p>
            </div>
        </div>
    </div>
  <!-- fin de la présentation -->

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif  
    <!-- Formulaire et Réponses côte à côte -->
    <div class="row">
        <!-- Formulaire de contact -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Contactez-nous</h4>
                  <hr>
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="bien_id" value="{{ $biens->id }}">
            <div class="mb-3">
                <label for="Auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" name="auteur" placeholder="Entrer votre nom" required>
            </div>
            <div class="mb-3">
                <label for="commentaire" class="form-label">Commentaire</label>
                <textarea class="form-control" name="contenu" rows="3" placeholder="Entrer votre commentaire" required></textarea>
            </div>
            <div class="mb-3">
                <label for="publication" class="form-label">Date de Publication</label>
                <input type="date" class="form-control" name="DatePublication" required>
            </div>
            <button type="submit" class="btn btn-dark">Envoyer</button>
            <a href="/liste" class="btn btn-warning">Annuler</a>
        </form>
                </div>
            </div>
        </div>

        <!-- Réponses -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4> Commentaires</h4>
                    <hr>
                    @foreach($biens->comments as $comment) 
                 <div>
                    <input type="hidden" name="id" value="{{ $comment->id }}"> 
                    <h5 class="card-title">Auteur: {{ $comment->auteur }}</h5>
                    <p class="card-text">{{ $comment->contenu }}</p>
                    <p class=""><strong>Publié le :</strong> {{ $comment->DatePublication }}</p> <br>
                    @if(Auth::check())
                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-dark">Modifier</a>   
                 
                    <a href="{{ route('comments.destroy', $comment->id) }}" class="btn btn-warning">Supprimer</a>   
                       <hr>
                        @endif
                 </div>
                 @endforeach
            </div>
        </div>
    </div>
</div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
