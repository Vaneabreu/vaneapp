<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
        <title>Aprendible</title>
 </head>
 <body>
 <img src= "/vaneapp/public/assets/css/bootstrap4/hytech.png" class="float-left" height="100px" width= "px" type="text/css" href="/vaneapp/public/assets/css/bootstrap4/hytech.png">
    <h1><font face=georgia>Login Aprendible</font></h1>
    <form  action="http://localhost/vaneapp/public/api/login" method="POST">
        @csrf
        <label>
            <input name="email" type="email" placeholder="Email... ">
        <label><br>
        <label>
            <input  name="password" type="password" placeholder="Password...">
        <label><br>
         <button id="login-btn" type="submit">Login</button>

    </form>
<body>

    <script>

    </script>
</html>

