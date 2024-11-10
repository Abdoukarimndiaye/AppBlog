<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" href="{{asset('css/style.css')}}">




<style>
  
@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

body{
              font-family: "Rubik", sans-serif;
}

h1{
              font-size: 4.5rem;
}
h2 {
              font-size: 3rem;
}
h3 {
              font-size: 2rem;
}
p{
              font-size: 1.2rem;
}
ul{
     margin-left: 0;
     padding-left: 0;
     
}
ul li {
     list-style: none;
}
ul li a{
     text-decoration: none;
     color: white;
    
}
ul li a:hover{
     color: mediumseagreen;
}
.large{
    padding: 10px 20px;
}
.small{
    padding: 10px 15px;
}

header .nav-link{
             text-transform: uppercase;
             font-size: 1rem;
             color: #000;
             font-weight: 500;
             margin-left: 20px;

}
header .logo{
          text-transform: uppercase;
          font-weight: 500;
          font-size: 1rem;

}

   

.section-header span{
    color: rgb(224, 31, 31);
    font-size: 1.2em;
    font-weight: 500;
    padding: 10px;
    text-transform: uppercase;

}

.section-1 .hero{
     background-image: url('../images/blog.jpg');
         background: linear-gradient(to right,rgba(0,0,0,0.8),rgba(0,0,0,0)),url('../images/blog.jpg');
         min-height: 800px;
         color: white;
         

}
.section-1 .hero span{
          color:mediumseagreen;
          font-size: 1.5rem;
          font-weight: 500;

}
a.btn-primary{
     background-color: mediumseagreen;
     border: 1px solid mediumseagreen ;
     font-size: 1em;
     font-weight: 500;
     text-transform: uppercase;
     margin-bottom: 20px;

}
a.btn-primary:hover{
     background-color:rgb(224, 31, 31); 
     color: white;
}
a.btn-secondary:hover{
     background-color:mediumseagreen; 
     color: white;
}
a.large{
     
          padding: 10px 20px;
     
}
a.small{
     padding: 10px 15px;
}
a.btn-secondary{
     
          background-color: rgb(224, 31, 31);
          border: 1px solid rgb(224, 31, 31);
          font-size: 1em;
          font-weight: 500;
          text-transform: uppercase;
          margin-bottom: 20px;
     
         
}

.section-2 img{
     
}
.section-2 span{
     color: mediumseagreen;
          font-size: 1rem;
          text-transform: uppercase;
          display: block;
          padding-bottom: 10px;
          font-weight: 500;

}
        
.section-3.card img{
     height: 280px;
    }
    .section-3 .card .card-body a{
     text-decoration: none;

    }
    .section-3 .card .card-body a.title{
     color:black;
     font-size: 1.2rem;
    }


  /*footer*/  
footer{
     background-color:#222725 ;
     color: white;

}
footer h3{
          font-size: 1.5em;
          color: mediumseagreen;
     }

footer ul{
     margin-left: 0;
     padding-left: 0;
}

footer ul li{
     padding: 5px 0;
}
footer ul li a {
          color:white;
          font-size: 1.2em;
          text-decoration: none;

}
.section-4 .hero{
     background-image: url('../images/blog.jpg');
         background: linear-gradient(to right,rgba(0,0,0,0.8),rgba(0,0,0,0)),url('../images/blog.jpg');
         min-height: 800px;
         color: white;
         

}
  
</style>



    <title>Document</title>
    @livewireStyles
</head>

<body> 

 
    <header>
      <div class="container py-3">
          <nav class="navbar navbar-expand-lg bg">
          
                <a class="navbar-brand logo" href="{{route('index')}}">Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Contact</a>
                    </li>
                    @guest
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('register')}}">Inscription</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('login')}}" class="btn btn-primary">Connexion</a>
                    </li>
                    @endguest
                    @auth
                    @if(auth()->user()->roles=="admin")
                    <li class="nav-item">
                      <a class="nav-link " href="{{route('Admin.articles.index')}}" wire:navigate tabindex="-1" aria-disabled="true">Gestion des articles</a>
                    </li>
                    @endif
                    <form method="post" action="{{route('logout')}}" class="nav-item">
                      @method('delete')
                      @csrf
                    <button class="nav-link">Déconnecter</button>
                    </form>
                        
                    @endauth
                   
                    
                    
                    
                  </ul>
                  
                  
                </div>
              </div>
            </nav>
            </header>

      
            <section class="section-1">
              <div class="hero d-flex align-items-center">
                <div class="container-fluid">
                  <div class="text-center">
                    <h1>Bienvenu </h1>
                    <span>Des informations  à temps réel</span>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br/>
                       Ea at, recusandae saepe est non explicabo facere quam <br/>
                       quo libero distinctio, laudantium consequatur provident,<br/>
                        eum sapiente iste exercitationem inventore. Dolore, modi!</p>
                  <div class="mt-4">
                <a class='btn btn-primary large '>Contactez-nous</a>
                <a class='btn btn-secondary ms-2 large'>Articles</a>
                  </div>
                
                  </div>
                </div>
             
              </div>
              </section>
    <div class="container ">
        @yield('content')
    
    </div>
            
       
  
 
 
  <footer>
    <div class="container py-5">
      <div class="row">
        <div class="col-md-3">
          <h3 class='mb-3'>Blog</h3>
          <div class='pe-5'>
             <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
             Fugiat, quis quas eligendi necessitatibus iste similique veniam in.
              Corporis porro minus inventore repellendus,
             sunt nobis perspiciatis ea atque molestiae dolores animi.</p>
          </div>
         

        </div>
         <div class="col-md-3">
          <h3 class='mb-3'>Categories</h3>
          <ul>
            @foreach($categories as $category)   
            <li><a href='{{route('articles.category',$category)}}'>{{$category->name}}</a></li>
           
            @endforeach
          </ul>
          
        </div>
        <div class="col-md-3">
          <h3 class='mb-3'>Liens</h3>
          <ul>
            <li><a href=''>Accueil</a></li>
            <li><a href="">A propos de nous</a></li>
            <li><a href="">Nos projects</a></li>
            <li><a href="">Contactez-nous</a></li>
            <li><a href="">Blogs</a></li>
          </ul>
          
        </div>
         <div class="col-md-3">
          <h3 class='mb-3'>Contactez-nous</h3>
          <ul>
            <li>
              <a href=''>78-436-36-64</a>
            </li>
             <li>
              <a href="">info@exple.com</a>
            </li>
          </ul>
          <p>Dakar,Grand-yoff <br/> cite-millionnaire</p>
          
        </div>
         
          
        </div>
        <hr/>
        <div class='text-center pt-4'>copyright &copy; 2024 Abdou karim Ndiaye engineer. All rights reserved</div>
      </div>

    </div>
  </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     
</body>
</html>