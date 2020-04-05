<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Student Invvoation Team Login</title>
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
  <img src="logo.jpg" alt="Logo" width="20%"/>
</nav>
  
<div id="loginform">
<h1>Student Innovation Team Login</h1>
<form action="loginauth.php" method="post">
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
</body>
</html>




