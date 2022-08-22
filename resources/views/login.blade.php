<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 100px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 10px 0;
  display: inline-block;
  border: none;
  background: #f5f4f4;
}



input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 10px;
}

/* Set a style for the submit button */
.loginbtn {
  background-color: #f5f4f4;
  color: white;
  padding: 10px 10px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.block {
  display: block;
  width: 15%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}
.block:hover {
  background-color: #ddd;
  color: black;
}


.registerbtn:hover {
  opacity: 1;
}


/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f5f4f4;
  text-align: center;
}
</style>
</head>
<body>


<form action="http://localhost/vaneapp/public/api/login" method="POST">
  <div class="container">
    
    <img src="/vaneapp/public/assets/css/bootstrap4/hytech.png" class="center" height="100px" width= "260px" type="text/css" href="/vaneapp/public/assets/css/bootstrap4/hytech.png">
    
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="password"><b>Password</b></label>

    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
  
    

   
    <button  id="login-btn" type="submit" class="block">Login</button> 
    

    </form>
<body>

    <script>

    </script>
</html>


