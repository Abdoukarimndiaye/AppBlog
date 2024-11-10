<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div class="container d-flex justify-content-center align-content-center" style="min-height: 100vh">
        
               
                <form method="POST" class="border p-5 shadow rounded" style="width: 600px" action="{{route('Admin.articles.update',$article)}}" enctype="multipart/form-data" >
                    <h3>Page de Modification d'article</h3>
    
                   @csrf
                   
                    @method('PATCH')
                   
                    <div class="mb-3">
                        <label for="title" class="form-label">titre de l'article:</label>
                        <input type="text" value="{{$article->title}}"  class="form-control @error('title') is-invalid @enderror"  name="title">
                    </div>
                    @error('title')
                    <span class="text-danger">{{$message}}</span>   
                
                   @enderror
                    
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug:</label>
                        <input type="text" value="{{$article->slug}}"  class="form-control @error('slug') is-invalid @enderror"  name="slug">
                    </div>
                    @error('slug')
                    <span class="text-danger">{{$message}}</span>   
                    @enderror
                    <div class="mb-3">
                        <label for="content" class="form-label">contenu:</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content" >{{$article->content}}</textarea>
                      </div>
                      @error('content')
                      <span class="text-danger">{{$message}}</span>   
                      @enderror
                    
                    
                      <div class="mb-3">
                        <label for="thumbnail" class="form-label">Image de couverture:</label>
                        <input class="form-control form-control-sm" id="thumbnail" type="file" name="thumbnail">
                      </div>
                      @error('thumbnail')
                     <span class="text-danger">{{$message}}</span>   
                     @enderror
                     <p>{{$article->thumbnail}}</p>
                    
                    @if($article->thumbnail)
                    <div>
                        <img src="{{asset('storage/'.$article->thumbnail)}}" style="max-width: 300px">
                    </div>
                    @endif
                    <p> categories:</p>
                     <select name="category_id"class="form-select form-select-sm  @error('categories') is-invalid @enderror">
        
                        @foreach($categories as $categorie)
                        <option value="{{$categorie->id}} {{$article->category_id==$categorie->id ?"selected":''}}">{{$categorie->name}}</option>
                        @endforeach
                     </select>
                     @error('category_id')
                     <span class="text-danger">{{$message}}</span>   
                     @enderror
                
                     <p>les étiquetes:</p>
                     <select  name="tag_ids[]" multiple="multiple"  class="form-select form-select-sm  @error('tags') is-invalid @enderror" >
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                     </select>
                     @error('tag_ids')
                     <span class="text-danger">{{$message}}</span>   
                     @enderror
                     
                  
                     <div class="mt-3 d-flex justify-content-end">
                     <button type="submit" class="btn btn-success btn-sm w-auto">Publié un article</button>
                     </div>
                     
                    </form>
                  
            </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  
</body>
</html>
