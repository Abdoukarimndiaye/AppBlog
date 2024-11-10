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


<div class="container d-flex justify-content-center align-items-center " style="min-height:100vh ">
<form action="{{ route('reset.password.post') }}"class="border p-3 shadow rounded" style="width:450px" method="POST">
    @csrf
  <H1 class="text-center">Réinitialisation le mot de pass</H1>
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="mb-3">
        <label for="email" class="form-label">Adresse électronique:</label>
        <input type="email"  id="email"class="form-control @error('email') is-invalid @enderror" name="email" >
    </div>
    @error('email')
    <span class="text-danger">{{$message}}</span>   
    @enderror

    <div class="mb-3">
        <label for="password" class="form-label">Mot de pass:</label>
        <input type="password"  id="password"class="form-control @error('password') is-invalid @enderror" name="password" >
    </div>
    @error('password')
    <span class="text-danger">{{$message}}</span>   
    @enderror
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Mot de pass de pconfirmation:</label>
        <input type="password"  id="password_confirmation"class="form-control @error('password') is-invalid @enderror" name="password_confirmation" >
    </div>
    @error('password_confirmation')
    <span class="text-danger">{{$message}}</span>   
    @enderror
    <div class="mb-3">
        <button class="btn btn-success w-100">réunitialiser</button>
    </div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>