
<!doctype html>
<html lang="fr">
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
          <a class="navbar-brand align-items-center text-warning" href="#">ImmoBien</a>
          
          <!-- Bouton de basculement pour les appareils mobiles -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <!-- Liens de navigation -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link text-warning" href="#">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-warning" href="#">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <h1 style="text-align:center" class="m-2"> Ajouter un bien </h1>


    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">

            <form action="/sauvegarde"  method="POST" >  
              @csrf           
                <div class="mb-3 d-flex flex-column">
                    <label for="image" class="form-label">URL image</label>
                    <input type="text" class="form-control" name="image" id="image">
                  </div> 
              <div class="d-flex justify-content-between ">
                <div class="mb-3 d-flex flex-column col-7">
                    <label for="nom" class="form-label">le type de bien</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                  </div>
                  <div class="mb-3 col-4 ">
                    <label for="categorie" class="form-label">Sélectionnez une catégorie</label>
                    <select class="form-select" id="categorie" name="categorie">
                      <option value="Luxe">Luxe</option>
                      <option value="Standard">Standard</option>
                    </select>
                  </div>
       
              </div>

              <div class="mb-3 d-flex flex-column ">
                <label for="addresse" class="form-label"> l'addresse </label>
                <input type="text" class="form-control" name="adresse" id="adresse" >
              </div>
   
              <!-- Bouton radio -->
              <div class="mb-3">
                  <input class="form-check-input" type="radio" name=" statut" id=" status" value="1">
                  <label class="form-check-label" for=" status" > Occupé</label>
                  <input class="form-check-input" type="radio" name=" statut" id=" status" value="0">
                  <label class="form-check-label" for=" status1" > vide</label>
              </div>            
            
              
  
            
              <div class="mb-3">
                <label for="date_publier" class="form-label">Date</label>
                <input type="date" name="DatePubli" class="form-control" >
              </div>
                       
             
              <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="description"></textarea>
              </div>
              <!-- Bouton d'envoi -->
              <button type="submit" class="btn btn-dark text-warning">Envoyer</button>
            </form>
          </div>
        </div>
      </div>
<!--
            ('nom'); //
            description');
            ('status')-
            ('categorie'); 
            ('addresse');
            ('image');
          ('date_publier'); -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


