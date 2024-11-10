@extends('layouts.template')
@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
<form  method="post" action="{{route('dashboard')}}" class="container border shadow rounded pt-3 " style="width: 600px;height:auto">
    @csrf
    <h3 class="text-center">Mise à jour de votre mot pass </h3>
   
<div class="mb-3">
    <label for="current_password" class="form-label">Mot de pass actuel:</label>
    <input type="password"  id="current_password"class="form-control @error('current_password') is-invalid @enderror" name="current_password" >
</div>
@error('current_password')
<span class="text-danger">{{$message}}</span>   
@enderror
<div class="mb-3">
    <label for="password" class="form-label">Nouveau mot de pass:</label>
    <input type="password"  id="password"class="form-control @error('password') is-invalid @enderror" name="password" >
</div>
@error('password')
<span class="text-danger">{{$message}}</span>   
@enderror
<div class="mb-3">
    <label for="password_confirmation" class="form-label">Mot de pass actuel:</label>
    <input type="password"  id="password_confirmation"class="form-control @error('password') is-invalid @enderror" name="password_confirmation" >
</div>
<div class="mb-3">
    <button class="btn btn-success w-100">mettre à jour</button>
</div>
</form>
</div>
     
    
@endsection
