<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
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
            <div class="category-image">   
                       
                <img src="/image/image_category.png" alt="chef">
            </div> 

            @if(Session::has('message'))  

            @include('Components.success')
               
            @else
       <form  method="POST" action="/category/update/{{$category->id}}">
        @csrf
        @method('PUT')

        @if(Session::has('error'))      
        @include('Components.alert')
        @endif 
     
        
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name Category:</label>
        <input type="text" name="name" id="name" placeholder="name" class="form-control" value="{{ $category->name }}">
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug:</label>
            <input type="text" name="slug" id="slug" placeholder="slug" class="form-control" value="{{ $category->slug }}">
    </div>
       <button type="submit" class="btn btn-primary">Save</button>
       </form>
       @endif

    </div>
    </main>
    <footer></footer>
    
</body>
</html>