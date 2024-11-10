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
   
    <div class="container pt-3 m-3">
        @if(session('status'))
        <p class="btn btn-success">{{session('status')}}</p>
        @endif 
        </div>
    <!-- Contenu principal -->
    
    <div class="container d-flex justify-content-center align-items-center " style="min-height:100vh ">
        
                  
                <!-- Formulaire d'ajout d'articles -->
                <form method="post" class="border p-3 shadow rounded" style="width:450px " action="{{route('login')}}">
                    <h3 class="text-center">Connectez-vous à votre compte</h3>
                    @csrf
                    <div class=" mb-3">
                        
                            <!-- Lien de redirection vers Google -->
                            <a href="{{ route('socilate.redirect', 'google') }}" title="Connexion/Inscription avec Google" class="btn btn-dark w-100 mb-3 "  >
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
                                  </svg>
                                Connexion avec Google
                            </a>
                        
                            <!-- Lien de redirection vers Facebook -->
                            <a href="" title="Connexion/Inscription avec Facebook" class="btn btn-primary w-100 mb-3 "  >
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                  </svg>
                                Connexion avec Facebook
                            </a>
                    
                            <!-- Lien de redirection vers Github -->
                            <a href="{{ route('socilate.redirect', 'github') }}" title="Connexion/Inscription avec Github" class="btn btn-light w-100 mb-3 "  >
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                                  </svg>
                                Connexion avec Github
                            </a>
                        
                    </div>
                   
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse électronique:</label>
                        <input type="email" placeholder="exemple@gmail.com" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email">
                    </div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>   
                    @enderror
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de pass:</label>
                        <input type="password" placeholder="votre mot de pass" class="form-control @error('email') is-invalid @enderror" id="password" name="password" >
                    </div>
                    @error('password')
                    <span class="text-danger">{{$message}}</span>   
                    @enderror
                    @if(Session::get('message_error'))
                    <p class="text-danger">
                      <b>{{Session::get('message_error')}}</b>
                    </p>
                    
                    @endif
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="remember" id="remember">
                        <label class="form-check-label" for="remember" name="remember">Se souviens de moi</label>
                      </div>
                      <p><a href="{{route('forget.password.get')}}">Mot de pass oublié</a></p>
                    <div class="m-3">
                    <button type="submit" class="btn btn-success w-100">Connexion</button>
                    </div>
                    <p class="float-end"><a href="{{route("register")}}">Créer un compte</a></p>
                </form>

                <!-- Ajoutez plus de contenu ici selon vos besoins -->
            </div>
            
    </div>

   
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>