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
</head>
<body>
    @include('Components.menu') 
    <main>
<div class="wrapper">   
<div class="table-responsive-sm"> 
<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Slug</th>
        <th></th>
        <th></th>
    </tr>
</thead>
<tbody>
    @foreach ($categories as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->slug}}</td> 
        <td><a href="{{url('/category/edit')}}/{{$item->id}} "><button class="btn btn-info">Edit</button></a></td>              
        <td><a href="{{url('/category/destroy')}}/{{$item->id}} "><button class="btn btn-danger">Delete</button></a></td>
    </tr>        
    @endforeach
</tbody>
</table>
</div>

</div>      

    </main>
    
</body>
</html>