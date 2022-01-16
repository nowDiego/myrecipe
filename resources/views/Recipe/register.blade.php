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
          
    <form method="POST" action="/recipe" enctype='multipart/form-data'>
        @csrf

        @if(Session::has('error'))      
       @include('Components.alert')
       @endif         
       
         
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name Recipe:</label>
            <input type="text" name="name" id="name" class="form-control">
            @if($errors->has('name'))
            <div class="error f_red">{{ $errors->first('name') }}</div>
        @endif
            </div>
            
            <div class="mb-3 mt-3">
                <label for="ingredient" class="form-label">Ingredient:</label>
            <textarea name="ingredient" id="ingredient" cols="2" rows="2" class="form-control"></textarea>
            @if($errors->has('ingredient'))
            <div class="error f_red">{{ $errors->first('ingredient') }}</div>
        @endif
        </div>

            <div class="mb-3 mt-3">
                <label for="preparation" class="form-label">Preparation:</label>            
            <textarea name="preparation" id="preparation" cols="2" rows="2" class="form-control"></textarea>
            @if($errors->has('preparation'))
            <div class="error f_red">{{ $errors->first('preparation') }}</div>
        @endif
        </div>

            <div class="mb-3 mt-3">
                <label for="preparation_time" class="form-label">Preparation Time:</label>
            <input type="text" name="preparation_time" id="preparation_time" class="form-control">
            @if($errors->has('preparation_time'))
            <div class="error f_red">{{ $errors->first('preparation_time') }}</div>
        @endif
        </div>

            <div class="mb-3 mt-3">
                <label for="yield" class="form-label">Yield:</label>
            <input type="text" name="yield" id="yield" class="form-control">
            @if($errors->has('yield'))
            <div class="error f_red">{{ $errors->first('yield') }}</div>
        @endif
        </div>

            <div class="mb-3 mt-3">
                <label for="observation" class="form-label">Observation:</label>
            <textarea name="observation" id="observation" cols="2" rows="2" class="form-control"></textarea>
            @if($errors->has('observation'))
            <div class="error f_red">{{ $errors->first('observation') }}</div>
        @endif
        </div>
           
        <div class="mb-3 mt-3">
                <label for="photo" class="form-label">Photo:</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @if($errors->has('photo'))
            <div class="error f_red">{{ $errors->first('photo') }}</div>
        @endif
        </div>

  <div class="mb-3 mt-3">
                <label for="category" class="form-label">Category:</label>
            <select name="category" id="category" class="form-control">
                @foreach ($categories as $item)               
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @if($errors->has('category'))
            <div class="error f_red">{{ $errors->first('category') }}</div>
        @endif
        </div>

  <div class="mb-3 mt-3">
                <label for="status_recipe" class="form-label">Status:</label>
            <select name="status_recipe" id="status_recipe" class="form-control">
                @foreach ($status_recipe as $item)               
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @if($errors->has('status_recipe'))
            <div class="error f_red">{{ $errors->first('status_recipe') }}</div>
        @endif
        </div>

            <button type="submit" class="btn btn-primary">Register</button>

        </form>

        @endif 

        <div class="recipe-image">   
                       
            <img src="/image/image_recipe.png" alt="chef">
        </div>    
    </div>
    </main>
 
</body>
</html>