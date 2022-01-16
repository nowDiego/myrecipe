<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipe</title>
    <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/show.css')}}">
</head>
<body>
    @include('Components.menu') 
    <main>
        <div class="wrapper">
     
            <section class="card">  
                <legend> {{$recipe->name}}</legend>               
              <ul>
                @if($recipe->photo)
                <li>
                <img src="/image/_recipe/{{$recipe->photo}}" alt="{{$recipe->photo}}">
                </li>
                @endif            
           <li ><span class="card-title">Ingredient: </span>  {{$recipe->ingredient}}</li>
           <li ><span class="card-title">Preparation: </span>{{$recipe->preparation}}</li>
           <li><span class="card-title">Preparation Time: </span>{{$recipe->preparation_time}}</li>
           <li ><span class="card-title">Yield:</span> {{$recipe->yield}}</li>
           <li><span class="card-title">Observation:</span> {{$recipe->observation}}</li>
            
         
           <li ><span class="card-title">Category: </span> {{$recipe->category->name}}</li>
           <li ><span class="card-title">Status: </span> {{$recipe->status->name}}</li>
           
          </ul>

             </section>

    </div>
    </main>

    
</body>
</html>