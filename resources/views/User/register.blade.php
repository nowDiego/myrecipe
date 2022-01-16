<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>User</title>
    <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <link rel="stylesheet" href="{{asset('css/user.css')}}">
</head>
<body>
    <main>
        <div class="wrapper">        
            <img src="/image/chef_.png" alt="recipe">
        <form method="POST" action='/user'>
        @csrf
     
        <div >
    <label for="name" class="form-label">Name:</label>
    <input type="text" name="name" id="name" placeholder="name"  class="form-control">
    @if($errors->has('name'))
    <div class="error f_red">{{ $errors->first('name') }}</div>
@endif    
</div>

      <div >
    <label for="email" class="form-label">E-mail:</label>
    <input type="email" name="email" id="email" placeholder="e-mail"  class="form-control">
    @if($errors->has('email'))
    <div class="error f_red">{{ $errors->first('email') }}</div>
@endif   
</div>
    <div class="mb-2">
    <label for="password" class="form-label">Password:</label>
    <input type="password" name="password" id="password" placeholder="password"  class="form-control">
    @if($errors->has('password'))
    <div class="error f_red">{{ $errors->first('password') }}</div>
@endif   
</div>
    
<div>
    <button type="submit">Register</button>
</div>
  
@if(Session::has('error'))      
<p class="mt-2"><center>{{ Session::get('error') }}</center></p>
@endif    

    </form>
</div>
    </main>
      
</body>
</html>