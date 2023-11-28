<?php
session_Start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <title>LOGIN FORM</title>
  </head>
  <body>
  <div class="wrapper">
        <div class="logo">
            <img src="images/logo1.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Clothing Store Login Portal
        </div>
        <?php 
            // Session Set Or Not Set
            if(isset($_SESSION['msg'])){
                echo "<div class='alert alert-danger' role='alert'>$_SESSION[msg]</div>";
                unset($_SESSION['msg']);
            }

            if(isset($_SESSION['success'])){
                echo "<div class='alert alert-success' role='alert'>$_SESSION[success]</div>";
                unset($_SESSION['success']);
            }
        ?>
        <form class="p-3 mt-3" action="code.php" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="email" placeholder="Email" required autofocus>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required minlength="6" maxlength="8">
                <span class="fa-solid fa-eye me-3" onclick="showPassword()"></span>
            </div>
            <a href="">
                <span class="d-flex justify-content-end text-primary fs-6">Forgot Password</span>
            </a>
            <button type="submit" name="login" class="btn mt-3">Login</button>
            
        </form>
        <div class="text-center fs-6">
            <a href="signup.php">Create Account</a>
        </div>

        <div class="container">
            <div class="row">
                <div class="col text-center mt-5 shadow p-3">
                
                <h5 class="text-center fs-6 text-danger fw-bold">
                       
                        Signin With Google 
                        <img class="img-fluid mt-2 p-2 shadow m-0 ms-3" src="images/google.png" alt="" style="width: 100px;">
                    </h5>
                    
                </div>
            </div>
        </div>
       
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>