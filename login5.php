<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Faculty Staff Login</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link href="style.css" rel="stylesheet" type="text/css">
    <style>
        body {
            margin: 0;
        }
        nav {
            width: 100%;
            height: auto;
            background: white;
        }
    </style>
</head>  

<body>  
<nav>
    <a href="/index.html"><img src="logo.jpg" alt="Logo" width="20%"/></a>
</nav>
  
    
<!-- Login ----------     -->
<div class="row">      
    <div id="loginform" class="col-4">
    <h1>Faculty Staff Login</h1>
    <form action="login5auth.php" method="post">
        <label for="username">
            USERNAME
        </label><br>
        <input type="text" name="username" placeholder="Username" id="username" required style="margin-bottom:20px;">
        <label for="password">
            PASSWORD
        </label><br><br>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Login">
    </form>
    </div>
    
   
<!--Register -------    -->
    
    <div id="loginform" class="col-4">
        <h1>Faculty Staff Register</h1>
        <form action="register5.php" method="post" autocomplete="off">
            <label for="username">
				USERNAME
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required style="margin-bottom:20px;">
            <label for="password">
				PASSWORD
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required style="margin-bottom:20px;">
            <label for="email">
				EMAIL
            </label>
            <input type="email" name="email" placeholder="Email" id="email" required>
            <input type="submit" value="Register">
        </form>
    </div>
</div>
    
</body>
</html>

