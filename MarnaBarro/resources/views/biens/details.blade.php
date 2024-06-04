<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails du Bien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>   
@endif  


<div class="container mt-5">
    <a href="/liste" class="btn btn-danger ">Retour à la liste</a>
    <h1>{{ $biens->nom }}</h1>
    <img src="{{ asset($biens->image) }}" class="img-fluid" alt="Image">
    <p><strong>Catégorie :</strong> {{ $biens->categorie }}</p>
    <p><strong>Adresse :</strong> {{ $biens->adresse }}</p>
    @if($biens->statut)
    <span class="badge bg-success">Occupé</span><br>
@endif<br>
    <p>{{ $biens->description}}</p>
    <p  class="badge text-bg-dark"  ><strong>Publié le :</strong> {{ $biens->DatePubli }}</p>

    <form method="POST" action="">
        {{-- {{ route('comments.store') }} --}}
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
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <a href="/liste" class="btn btn-danger">Annuler</a>
    </form>
   
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
