<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/image/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    
    <main>
        <div class="wrapper">
           <section>
               <img src="/image/chef.png" alt="login">
           </section>
            <section> 
                <h1>MY RECIPE</h1> 
        <form method="POST" action="/login">
            @csrf            
        <input type="text" name="name" id="name" placeholder="Name">
        <input type="password" name="password" id="password" placeholder="Password">
        <button type="submit">Log in</button>
        </form>  
      
        
        @if(Session::has('message'))
<p class="mt-2 f_white">{{ Session::get('message') }}</p>
@endif    

@if(Session::has('error'))      
<p class="mt-2 f_white">{{ Session::get('error') }}</p>
@endif   

<span class="mt-3 f_white">Don't have a login? <a href="/user/register" class="f_white">Sign up</a></span>

    </div>
</section>
    </main>
    
</body>
</html>