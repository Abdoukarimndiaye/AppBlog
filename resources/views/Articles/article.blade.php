
@extends('layouts.template')
@section('content')
<div class="row  ">
    
    <div class="col-md-8 ">
        <h3>{{$article->title}}</h3>
        <img src="{{str_starts_with($article->thumbnail, 'http') ? $article->thumbnail:asset('storage/'.$article->thumbnail)}}" alt="l'image de {{$article->thumbnail}}" class="w-100" >
        <p>{{$article->content}}</p>
        <div class="mt-2">
            @if($article->category)
      <b><a style="text-decoration:none"href="{{route('articles.category',$article->category)}}" class="text-black">{{$article->category->name}}</a></b>
        @endif
        </div>
        @if($article->tags->isNotEmpty())
        @foreach($article->tags as $tag)
        
        <a href="{{route('articles.tag',$tag)}}" class="badge bg-success" style="text-decoration:none ">
        {{$tag->name}}
        </a>
        
        
        @endforeach
        @endif
        <div class="mt-3 ">
        <small>{{$article->created_at}}</small>
        </div>
        @auth
       <p>{{$comments}} commentaires</p>
       
       <form action="{{ route('like.Article', $article->id) }}"
        method="post" >
        @csrf
        <button class="btn btn-light px-4 py-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
            <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
          </svg>
            {{ $article->likeCount }} j'aime
        </button>
    </form>
       </div>
    <form action="{{ route('unlike.Article', $article->id) }}"
        method="post">
    @csrf
       <button
       class="{{ $article->liked() ? 'block' : 'hidden'  }} px-4 py-2 text-white btn btn-danger">
       <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
        <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.38 1.38 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51q.205.03.443.051c.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.9 1.9 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2 2 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.2 3.2 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.8 4.8 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591"/>
      </svg>
      j'annule
     </button>
    </form>
    
        <p>nombre de vues: </p>
       
        
        
            <form action="{{route('article.comment',$article)}}" method="post" >
                @csrf
                <label for="content">votre Commentaire:</label>
                <textarea class="form-control @error('comment') is-invalid @enderror" rows="5" placeholder="commentez..."  name="content">
                </textarea>
                @error('comment')
                <span class="text-danger">{{$message}}</span>   
               @enderror
               
                <div class="mt-3">
                <button type="submit" class="btn btn-success" name="envoyer">Envoyer</button>
                </div>
            </form>
            @endauth
        </div>
        @auth
        <div class="commentaire mt-3">
        <div class="card">
            @foreach($article->comments as $comment)
            <div class="card-body">
                <img src="{{Gravatar::get($comment->users->email)}}" class=" w-10 h-10 rounded-circle" alt=>
                <H2 ><b>{{$comment->users->name}}</b></H2>

               
                <p>{{$comment->content}}</p>
                <small>il y a {{$comment->created_at->diffForHumans()}}</small>
                
                
            </div>
            <div class="card-footer">

            </div>
           
            @endforeach
        </div>
        @endauth
      
       
        
    </div>
    
</div>

   

    
@endsection
