<!DOCTYPE html>
<html lang="en">
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
    
    <div class="container d-flex justify-content-center align-items-center " style="min-height:100vh ">
                
               
                <!-- Formulaire d'ajout d'articles -->
                <form method="post" action="{{route('forget.password.post')}}"class="border p-3 shadow rounded" style="width:450px">
                    @csrf
                    
                     
                        
                  
                    <h3 class="text-center">Mot de pass oublié  </h3>
                    @if(session('status'))
                    <p class="btn btn-success">{{session('status')}}</p>
                    @endif 
                    @if(Session::get('message_error'))
                    <p class="text-danger">
                      <b>{{Session::get('message_error')}}</b>
                    </p>
                    @endif
  
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse électronique:</label>
                        <input type="email" placeholder="exemple@gmail.com" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>   
                    @enderror
                   
                    <button type="submit" class="btn btn-success w-100">Envoyer</button>
                    
                </form>

                <!-- Ajoutez plus de contenu ici selon vos besoins -->
            
           
    </div>

   
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
