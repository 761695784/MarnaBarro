<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails de l'article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>   
@endif

  <ul>
    @foreach($errors->all() as $error)
        <li class="alert alert-danger">
           {{$error}}
        </li>
    @endforeach
  </ul>

<form method="post" action="/update/comment/{{$comment->id}}">
    @csrf
    
    <div class="mb-3">
        <label for="Auteur" class="form-label">Auteur</label>
        <input type="text" class="form-control" name="auteur" placeholder="Entrer votre nom" required value="{{ $comment->auteur}}" >
    </div>
    <div class="mb-3">
        <label for="commentaire" class="form-label">Commentaire</label>
        <textarea class="form-control" name="contenu" rows="3" placeholder="Entrer votre commentaire" required  >{{ $comment->contenu }}</textarea>
    </div>
    <button class="btn btn-primary" > Envoyer</button>

    <a href="/liste" class="btn btn-danger">Annuler</a>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

