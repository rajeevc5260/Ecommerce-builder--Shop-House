<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Shop House | Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="index.php" method="post">
				<img src="img/avatar.svg">
				<h2 class="title">LOG IN</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="email" placeholder="Email" class="input" name="email"  value="" required="required">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" placeholder="Password" name="password" required="required" class="input" value="" >
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" name="login" value="Login">
				<div class="register">
					<h5>Are you new to Here?</h5>
					<a href="../Signup.html">Create an account</a>
				</div>
            </form>
        </div>
        <?php
            if (isset($_POST["login"]))
            {
                 $email=$_POST["email"];
                 $password=$_POST["password"];
                 if($email!="" &&$password!="")
                 {
                     $sql="SELECT fullname,email,password FROM usersignup WHERE email='$email' AND password='$password'";
                     $result=$con->query($sql);
                    // print_r($result);
                    if($result->num_rows==1 )
                    {
                        header("location:../../../User dashboard/index.html");
                    }
                    else
                    {
                        echo "<p class='error'> invalid user</p>"; 
                    }
                 }
                 
            }
            ?>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
