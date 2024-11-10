
@extends('layouts.template')
@section('content')


    
<section class="section-5  py-5">
    <div class="container py-3">
        <div class="row my-3">
            <div class="col-md-8">
                <div class="header-img">
                    <img src="{{str_starts_with($article->thumbnail, 'http') ? $article->thumbnail:asset('storage/'.$article->thumbnail)}}" alt="" class="w-100">
                </div>
                <div class="section-text">
                    <h3 class="mt-3 mb-3">{{$article->title}}</h3>
                    <p >{{$article->content}}</p>
                    @if($article->category)
                    <b><a  style="text-decoration:none"href="{{route('articles.category',$article->category)}}" class="text-success">{{$article->category->name}}</a></b>
                      @endif
                      </div>
                      @if($article->tags->isNotEmpty())
                      @foreach($article->tags as $tag)
                      
                      <a href="{{route('articles.tag',$tag)}}" class="badge bg-success" style="text-decoration:none ">
                      {{$tag->name}}
                      </a>
                      
                      
                      @endforeach
                      @endif
                      <div class="mt-2 ">
                      <small>{{$article->created_at}}</small>
                      </div>
                </div>
                
               
        
                @auth
                <div class="mb-4">
                    <form action="{{route('article.comment',$article)}}" method="post" >
       
                        <label for="content">votre Commentaire<span class="text-danger">*</span></label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" rows="10" cols="30" placeholder="commentez..."  name="content">
                        </textarea>
                        @error('comment')
                        <span class="text-danger">{{$message}}</span>   
                       @enderror
                       
                        <div class="mt-3">
                        <button type="submit" class="btn btn-success" name="envoyer">Envoyer</button>
                        </div>
                    </form>

                </div>
               
                <div class='meta py-4 '>
                    @foreach($article->comments as $comment)
                    <div>
                      <img src="{{Gravatar::get($comment->users->email)}}" class=" w-10 h-10 rounded-circle" alt="" width="50" />
                    </div>
                    <h4>{{$comment->users->name}}</h4>
                    <p>{{$comment->content}}</p>
                    <small>il y a {{$comment->created_at->diffForHumans()}}</small>
                   
                  
                    <hr/>
                    @endforeach
      
                  </div>
               
                 
                  
            </div>
         
               
            @endauth
               
           
        </div>
      
    </div>
  </section>
  



</div>

</div>
</section>



    
@endsection
