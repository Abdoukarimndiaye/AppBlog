@extends('layouts.template')
@section('content')

</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <!-- Ajoutez vos articles ici -->
            @forelse ($articles as $article)
            <div class="card mb-3">
                <img src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail:asset('storage/'.$article->thumbnail)}}" alt="l'image de couverture" class="card-img-top" alt="Image de l'article">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->excerpt}}</p>
                    <div class="mt-2">
                    @if($article->category)
                    <b><a href="{{route('articles.category',$article->category)}}" style="text-decoration: none" class="text-black">{{$article->category->name}}</a></b>
                    @endif
                    </div>
                    <div class="mt-2">
                    @if($article->tags->isNotEmpty())
                    @foreach($article->tags as $tag)
                    <a href="{{route('articles.tag',$tag)}}" class="badge bg-success" style="text-decoration: none">
                      {{$tag->name}}
                    </a>
                    @endforeach
                    @endif
                    </div>
                    <div class="mt-2">
                    <a href="{{route('article',$article)}}" class="btn btn-dark" wire:navigate>Lire la suite</a>
                    </div>
                    
                </div>
            </div>
            @empty
            <p class="text-center">Aucun resultat trouvé !</p>
            @endforelse
        </div>
        <div class="col-lg-4">
            <h2>À la une</h2>
            <!-- Ajoutez des éléments à la une ici -->
            <div class="card">
                <img src="image-featured.jpg" class="card-img-top" alt="Image à la une">
                <div class="card-body">
                    <h5 class="card-title">Article à la une</h5>
                    <p class="card-text">Description de l'article à la une.</p>
                    <a href="#" class="btn btn-primary">Lire la suite</a>
                </div>
            </div>
            <!-- Ajoutez d'autres éléments à la une de la même manière -->
        </div>
    </div>
</div>

<section class='section-3 bg-light py-5'>
    <div class="container py-5">
       <div class="section-header text-center">
       <span>BLOGS</span>
       <h2>Lorem ipsum dolor </h2>
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
     </div>
   <div class="row pt-4">
    @forelse ($articles as $article)
   <div class="col-lg-4 col-md-6 col-ms-12">
    <div class="card mb-5 shadow-sm mx-auto"style="width: 20rem; height:auto">
      <img src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail:asset('storage/'.$article->thumbnail)}}" alt="" class="img-fluid">
      <div class="card-body">
        <div class="card-title">
          <h5>{{$article->title}}</h5>
        </div>
        <div class="card-text">
          <p style="font-size: 1rem">{{$article->excerpt}} </p>
        </div>
        <a href="{{route('article',$article)}}"class="btn btn-primary small">lire plus...</a>
      </div>
    </div>
   </div>
   @empty
   <p class="text-center">Aucun resultat trouvé !</p>
   @endforelse
 
 


    
   </div>
    </div>

   </section>
            <div class="container m-3">
                <div class=" d-flex justify-content-center ">
                 {{$articles->links()}}
                </div>
          
    
@endsection