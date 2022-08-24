<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Shop house |Admin login </title>
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/images/favicon.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">ADMIN LOGIN</p>
              <form action="index.php" method="POST">
                  <div class="form-group">
                    <label for="username" class="sr-only">username</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Username" required="required">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" required="required">
                  </div>
                  <button class="btn btn-block login-btn mb-4" name="login"> Login
                  </button>
                  <a href="#!" class="forgot-password-link">Forgot password?</a>
              </form>
            </div>
            
            <?php
            if (isset($_POST["login"]))
            {
                 $email=$_POST["email"];
                 $password=$_POST["password"];
                 if($email!="" &&$password!="")
                 {
                     $sql="SELECT id,email,password FROM adminlogin WHERE email='$email' AND password='$password'";
                     $result=$con->query($sql);
                    // print_r($result);
                    if($result->num_rows==1 )
                    {
                        header("location: ../../Admin Dashboard/index.html");
                    }
                    else
                    {
                        echo "<p class='error'> invalid user</p>"; 
                    }
                 }
                 
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
