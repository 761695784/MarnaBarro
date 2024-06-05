<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modification d'un bien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center">Modifier un article</h1>
          
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


        <form action="/modifier/traitement" method="POST">
            @csrf
         
         <input type="text" name="id" style="display: none;" value="{{ $biens->id }}">
         
         
            <div class="mb-3">
            <label for="image" class="form-label">Image du bien </label>
            <input class="form-control" type="string" name="image" value="{{$biens->image}}" >
          </div>
          <div class="mb-3">
            <label for="nom" class="form-label">nom</label>
            <input type="text" class="form-control" name="nom" placeholder="Entrez le nom" value="{{$biens->nom}}">
          </div>

          <div class="mb-3">
            <label for="categorie" class="form-label">Categorie</label>
            <input type="text" class="form-control" name="categorie" value="{{$biens->categorie}}"  >
          </div>

          <div class="mb-3">
            <label for="Adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" name="adresse" value="{{$biens->adresse}}"  >
          </div>

          <div class="mb-3">
            <label for="Adresse" class="form-label">Date publication</label>
            <input type="date" class="form-control" name="DatePubli" value="{{$biens->DatePubli}}"  >
          </div>


          <div class="mb-3">
            <input type="checkbox" class="form-check-input" name="statut"    {{ $biens->statut ? 'checked' : '' }}>
            <label for="statut" class="form-check-label">Occupé</label>
        </div>
          <div class="mb-3">
            <label for="Description" class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="10" placeholder="Entrez la description de l'article" >{{$biens->description}} </textarea>
          </div>

        


          <button type="submit" class="btn btn-primary">Modifier</button>
          <a href="/liste" class="btn btn-danger">Revenir a la liste des biens</a>
        </form>
      
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>