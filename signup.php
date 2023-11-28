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
    <title>SIGNUP FORM</title>
  </head>
  <body>
  <div class="wrapper wrapper-register">
        <div class="logo">
            <img src="images/logo1.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Signup In Clothing Store
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
        <form class="p-3 mt-3" method="POST" action="code.php">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="name" id="name" placeholder="Username" autofocus required>
            </div>

            <div class="form-field d-flex align-items-center">
            <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required maxlength="8">
                
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="retype_password" id="retype_password" placeholder="Retype Password" maxlength="8" required>
            </div>

            <button type="submit" name="signup" class="btn mt-3">Register</button>
            <a  class="text-center text-danger d-flex justify-content-center mt-3 fw-bold" href="login.php">Already have an account -> Login</a>
        </form>
       
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>