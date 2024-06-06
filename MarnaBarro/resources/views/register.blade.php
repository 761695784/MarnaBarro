<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    
</body>
</html>

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
        <a class="navbar-brand" href="/">ImmoBien</a>
        
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

    <!--Pour les messages generals d'action -->
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>   
@endif

   <!--Pour les messages spécifique d'un attribut -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <form action="{{route('register')}}"  method="POST" class="form-group col-5" style="margin: 0 auto; padding:2rem">
@csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" aria-describedby="emailHelp" required>
       
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
          </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control   @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" aria-describedby="emailHelp" required>
          @error('email')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror

        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" required>
          @error('password')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
        </div>
     
        <button type="submit" class="btn btn-dark ">Envoyer</button>
      </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>