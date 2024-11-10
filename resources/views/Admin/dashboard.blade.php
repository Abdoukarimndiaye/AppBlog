<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container pt-3">
        <a href="{{route('Admin.articles.create')}}" class="btn btn-success">Ajouter un article</a>
        <hr>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    
                    <td>Titre </td>
                    <td>Article</td>
                    <td>Modifier</td>
                    <td>supprimer</td>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                   
                    <td>{{$article->title}}</td>
                    <td><a href="{{route('article',$article)}}">voir l'article</a>
                    <td><a href="{{route('Admin.articles.edit',$article)}}" class="btn btn-success">modifier</a>
                    <td >
                        <form method="post" action="{{route('Admin.articles.destroy',$article)}}" >
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-danger" value="Supprimer" onclick="confirmation(event)" >
                        </form>
    
                    </td>
                </tr>
                @endforeach
            </tbody>
            
           
            
        </table>
        <div class="container d-flex justify-content-center">
            {{$articles->links()}}
            
        </div>
    </div>
   

    
</body>
<script >
    function confirmation(ev){
        ev.preventDefault();
        var urlToredirect = ev.currentTarget.getAttribute('href');
        console.log(urlToredirect);
        swal({
            'title':'etes vous sur de supprimer ce article';
            'text': 'vous ne pourrez pas annuler cette suppression';
            'icon':'danger';
            'button':true;
            'dangerMode':true

        })
        .then((willcancel)=>{

            if(willcancel){
                window.location.href=urlToredirect;
            }
        });
        
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  

</html>