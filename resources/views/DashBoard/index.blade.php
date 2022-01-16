<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
    @include('Components.menu') 
    <main>
        <div class="wrapper">
           
            @if($latest)
            <h2>Latest recipes</h2>
            <section class="latest">
            
            @foreach ($latest as $item)      
           
            <div class="card" style="width: 18rem;">           
    
                <div class="card-body">
                  <h5 class="card-title">{{$item->name}}</h5>
                  <p class="card-text">{{$item->category->name}}</p>
                  <a href="recipe/show/{{$item->id}}" class="btn btn-danger">Read more</a>
                </div>
              </div>
                      
            @endforeach   
        </section>   
            @endif


        @if($suggestion)
        <h2>Recipe suggestions</h2>
        <section class="suggestion">           
        @foreach ($suggestion as $item)      
       
        <div class="card" style="width: 18rem;">           

            <div class="card-body">
              <h5 class="card-title">{{$item->name}}</h5>
              <p class="card-text">{{$item->category->name}}</p>
              <a href="recipe/suggestion/{{$item->id}}" class="btn btn-danger">Read more</a>
            </div>
          </div>
                  
        @endforeach   
    </section>   
        @endif
    </div>
    
    </main>
    <footer></footer>        
</body>
</html>