<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
    <style>
    body{
        font-family: Arial, Helvetica, sans-serif;
      }
      form{
        font-family: Arial, Helvetica, sans-serif;

      }
      </style>
</head>
<body>

    <!-- Barre de navigation -->
   

    <!-- Contenu principal -->
    
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        
               
              
                <!-- Formulaire d'ajout d'articles -->
                <form method="Post" action="{{route('register')}}" class="border p-3 shadow rounded" style="width:450px">
                    @csrf
                    <h3 class="text-center">Inscrivez-vous </h3>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom:</label>
                        <input type="text" placeholder="votre nom"  class="form-control @error('nom') is-invalid @enderror" value="{{old('nom')}}" name="nom">
                    </div>
                    @error('nom')
                    <span class="text-danger">{{$message}}</span>   
                   @enderror

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse électronique:</label>
                        <input type="email" placeholder="votre adresse email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>   
                   @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de pass:</label>
                        <input type="password" placeholder="votre mot de pass"  id="password"class="form-control @error('password') is-invalid @enderror" name="password" >
                    </div>
                    @error('password')
                    <span class="text-danger">{{$message}}</span>   
                   @enderror
                   
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Mot de pass de confirmation</label>
                        <input type="password" placeholder="votre mot de pass de confirmation" class="form-control"  name="password_confirmation">
                    </div>
                   
                    
                   
                    
                    <button type="submit" class="btn btn-success w-100">inscrire</button>
                    <p class="mt-3"><a href="{{route('login')}}" class="float-end">Connectez-vous à votre compte</a>

                </form>
               
                <!-- Ajoutez plus de contenu ici selon vos besoins -->
            </div>
           
    </div>

   
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
