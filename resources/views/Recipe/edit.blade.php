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
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
</head>
<body>
    @include('Components.menu') 
    <main>
        <div class="wrapper">

                
    @if(Session::has('message'))  

    @include('Components.success')
       
    @else    

    <form method="POST" action="/recipe/update/{{$recipe->id}}" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
     
     
        @if(Session::has('error'))      
        @include('Components.alert')
        @endif   
        
          
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name Recipe:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$recipe->name}}">
            </div>
            
            <div class="mb-3 mt-3">
                <label for="ingredient" class="form-label">Ingredient:</label>
            <textarea name="ingredient" id="ingredient" cols="2" rows="2" class="form-control" >{{$recipe->ingredient}}</textarea>
        </div>

            <div class="mb-3 mt-3">
                <label for="preparation" class="form-label">Preparation:</label>            
            <textarea name="preparation" id="preparation" cols="2" rows="2" class="form-control" >{{$recipe->preparation}}</textarea>
        </div>

            <div class="mb-3 mt-3">
                <label for="preparation_time" class="form-label">Preparation Time:</label>
            <input type="text" name="preparation_time" id="preparation_time" class="form-control" value="{{$recipe->preparation_time}}">
        </div>

            <div class="mb-3 mt-3">
                <label for="yield" class="form-label">Yield:</label>
            <input type="text" name="yield" id="yield" class="form-control" value="{{$recipe->yield}}">
        </div>

            <div class="mb-3 mt-3">
                <label for="observation" class="form-label">Observation:</label>
            <textarea name="observation" id="observation" cols="2" rows="2" class="form-control" >{{$recipe->observation}}</textarea>
        </div>
           
        <div class="mb-3 mt-3">
                <label for="photo" class="form-label">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

  <div class="mb-3 mt-3">
                <label for="category" class="form-label">Category:</label>
            <select name="category" id="category" class="form-control" >
                @foreach ($categories as $item)  
                @if ($item->id == $recipe->category_id)
                <option value="{{$item->id}}" selected="true">{{$item->name}}</option>                                 
                @else
                <option value="{{$item->id}}">{{$item->name}}</option>      
                    
                @endif       
                               
               
                @endforeach
            </select>
        </div>

  <div class="mb-3 mt-3">
                <label for="status_recipe" class="form-label">Status:</label>
            <select name="status_recipe" id="status_recipe" class="form-control">>
                @foreach ($status_recipe as $item)               
                
                @if ($item->id == $recipe->status_recipes_id)
                <option value="{{$item->id}}" selected="true">{{$item->name}}</option>
                @else
                <option value="{{$item->id}}">{{$item->name}}</option>     
                    
                @endif 
             

              

                @endforeach
            </select>
        </div>

            <button type="submit" class="btn btn-primary">Save</button>

        </form>
        @endif
        

        <div class="recipe-image">   
                       
            <img src="/image/image_recipe.png" alt="chef">
        </div> 
    </div>
    </main>
 
</body>
</html>