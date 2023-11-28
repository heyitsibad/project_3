<?php 
include "connection.php";
session_start();
// Register Form
if(isset($_POST['signup'])){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $retype_password = $_POST['retype_password'];

   if($password == $retype_password){
        // Insert Query
        $run = mysqli_query($con,"INSERT INTO registers(name,email,password,role)VALUES('$name','$email','$password','User')");

        if($run){
            $_SESSION['success'] = "Account Created Successfully";
            header('location:signup.php');
        }else{
            $_SESSION['msg'] = "Account Not Created";
            header('location:signup.php');
        }
        
   }else{
        $_SESSION['msg'] = "Password And Retypeword Not Match";
        header('location:signup.php');
   }
}

// Login COding
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $FetchData = mysqli_query($con,"SELECT * FROM registers WHERE email = '$email' AND password='$password'");

    if($isDataExists = mysqli_num_rows($FetchData) > 0){
        
        while($data = mysqli_fetch_assoc($FetchData)){
            
            // Admin Or User
            if($data['role'] == "Admin"){
                $_SESSION['name'] = $data['name'];
                header('location:Admin_Dashboard/pageManagment.php?index');

            } else{
                $_SESSION['id'] = $data['id'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['email']= $data['email'];;
                header('location:shoping-cart.php');
            }
        }
    }else{
        $_SESSION['msg'] = "Email Or Password Not Correct";
        header('location:login.php');
    }
}


// Add Category

if(isset($_POST['addCategory'])){
    $file_name = $_FILES['category_file']['name'];
    $file_size = $_FILES['category_file']['size']; //Bytes
    $file_extension = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    $tmp_name = $_FILES['category_file']['tmp_name'];

    $destinatin = "Admin_Dashboard/Images/".$file_name;

   if($file_extension == "png" OR $file_extension == "jpeg" OR $file_extension == "jpg" OR $file_extension == "jfif"){
    
    // Valid Size
        if($file_size <= 2000000){
                // Move File To Destination
                if(move_uploaded_file($tmp_name,$destinatin)){
                    // Insert Query
                    $c_name = $_POST['category_name'];
                    $run = mysqli_query($con,"INSERT INTO category(c_name,c_image)VALUES('$c_name','$file_name')");
                    if($run){
                        $_SESSION['success'] = "Category Added Successfully";
                        header('location:Admin_Dashboard/pageManagment.php?category');
                    }else{
                        $_SESSION['error'] = "Category Not Added";
                        header('location:Admin_Dashboard/pageManagment.php?category');
                    }

                }else{
                    $_SESSION['error'] = "File Not Uploaded";
                    header('location:Admin_Dashboard/pageManagment.php?category');
                }
        }else{
            $_SESSION['error'] = "File Size Must Be Less Then 2MB";
            header('location:Admin_Dashboard/pageManagment.php?category');
        }
   }else{
        $_SESSION['error'] = "File Type Must Be jpg Or png Or jfif";
        header('location:Admin_Dashboard/pageManagment.php?category');
   }
}

// Add Product

if(isset($_POST['addProduct'])){
    $file_name = $_FILES['product_file']['name'];
    $file_size = $_FILES['product_file']['size']; //Bytes
    $file_extension = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    $tmp_name = $_FILES['product_file']['tmp_name'];

    $destinatin = "Admin_Dashboard/Images/".$file_name;

   if($file_extension == "png" OR $file_extension == "jpeg" OR $file_extension == "jpg" OR $file_extension == "jfif"){
    
    // Valid Size
        if($file_size <= 2000000){
                // Move File To Destination
                if(move_uploaded_file($tmp_name,$destinatin)){
                    // Insert Query
                    
                    $run = mysqli_query($con,"INSERT INTO product(p_name,p_desc,p_price,p_qty,p_status,p_category,p_image)VALUES('".$_POST['p_name']."','".$_POST['p_desc']."','".$_POST['p_price']."','".$_POST['p_qty']."','".$_POST['p_status']."','".$_POST['p_category']."','$file_name')");

                    if($run){
                        $_SESSION['success'] = "Product Added Successfully";
                        header('location:Admin_Dashboard/pageManagment.php?product');
                    }else{
                        $_SESSION['error'] = "Product Not Added";
                        header('location:Admin_Dashboard/pageManagment.php?product');
                    }

                }else{
                    $_SESSION['error'] = "File Not Uploaded";
                    header('location:Admin_Dashboard/pageManagment.php?product');
                }
        }else{
            $_SESSION['error'] = "File Size Must Be Less Then 2MB";
            header('location:Admin_Dashboard/pageManagment.php?product');
        }
   }else{
        $_SESSION['error'] = "File Type Must Be jpg Or png Or jfif";
        header('location:Admin_Dashboard/pageManagment.php?product');
   }
}


// Search With Ajax

if(isset($_POST['search'])){
    $search = $_POST['search'];

    $GetData = mysqli_query($con,"SELECT * FROM product WHERE p_name like '%$search%' OR p_category like '%$search%'");
   
    if($IsDataExists = mysqli_num_rows($GetData) > 0){


        while($data = mysqli_fetch_assoc($GetData)){

            $isAvailatable = "";
            if($data['p_qty'] > 0){
                $isAvailatable = "<span class='badge rounded-pill bg-primary'>In-Stock</span>";
            }else{
                $isAvailatable = "<span class='badge rounded-pill bg-danger'>Out-Of-Stock</span>";
            }
            
        echo "<div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women'>
                            
                            <div class='block2'>
                                <div class='block2-pic hov-img0'>
                                    <img src='Admin_Dashboard/Images/".$data['p_image']."' alt='IMG-PRODUCT' style='width: 300px;height:400px'>
        
                                    <a href='product-detail.php?id=".$data['id']."' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                                        Quick View
                                    </a>
                                </div>
        
                                <div class='block2-txt flex-w flex-t p-t-14'>
                                    <div class='block2-txt-child1 flex-col-l'>
                                        <a href='product-detail.html' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                                        ".$data['p_name']."
                                        </a>
        
        
                                        <span class='stext-105 cl3'>
                                        ".$data['p_price']."
                                        </span>
                                    </div>
        
                                    <div class='block2-txt-child2 flex-r p-t-3'>
                                        <a href='#' class='btn-addwish-b2 dis-block pos-relative js-addwish-b2 me-5'>
                                            $isAvailatable
                                
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
        
        }


    }else{
        echo "<script>
                alert('Product Not Available Yet!')
        </script>";
    }
}


// Sorting By Low Price
 if(isset($_POST['sort_by_low_price'])){

    $GetData = mysqli_query($con,"SELECT * FROM product ORDER BY p_price ASC");

    while($data = mysqli_fetch_assoc($GetData)){
        $isAvailatable = "";
        if($data['p_qty'] > 0){
            $isAvailatable = "<span class='badge rounded-pill bg-primary'>In-Stock</span>";
        }else{
            $isAvailatable = "<span class='badge rounded-pill bg-danger'>Out-Of-Stock</span>";
        }
        
    echo "<div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women'>
                        
                        <div class='block2'>
                            <div class='block2-pic hov-img0'>
                                <img src='Admin_Dashboard/Images/".$data['p_image']."' alt='IMG-PRODUCT' style='width: 300px;height:400px'>
    
                                <a href='product-detail.php?id=".$data['id']."' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                                    Quick View
                                </a>
                            </div>
    
                            <div class='block2-txt flex-w flex-t p-t-14'>
                                <div class='block2-txt-child1 flex-col-l'>
                                    <a href='product-detail.html' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                                    ".$data['p_name']."
                                    </a>
    
    
                                    <span class='stext-105 cl3'>
                                    ".$data['p_price']."
                                    </span>
                                </div>
    
                                <div class='block2-txt-child2 flex-r p-t-3'>
                                    <a href='#' class='btn-addwish-b2 dis-block pos-relative js-addwish-b2 me-5'>
                                        $isAvailatable
                            
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>";
    }

}


// Sort By High Price

// Sorting By Low Price
if(isset($_POST['sort_by_high_price'])){

    $GetData = mysqli_query($con,"SELECT * FROM product ORDER BY p_price DESC");

    while($data = mysqli_fetch_assoc($GetData)){
        $isAvailatable = "";
        if($data['p_qty'] > 0){
            $isAvailatable = "<span class='badge rounded-pill bg-primary'>In-Stock</span>";
        }else{
            $isAvailatable = "<span class='badge rounded-pill bg-danger'>Out-Of-Stock</span>";
        }
        
    echo "<div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women'>
                        
                        <div class='block2'>
                            <div class='block2-pic hov-img0'>
                                <img src='Admin_Dashboard/Images/".$data['p_image']."' alt='IMG-PRODUCT' style='width: 300px;height:400px'>
    
                                <a href='product-detail.php?id=".$data['id']."' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                                    Quick View
                                </a>
                            </div>
    
                            <div class='block2-txt flex-w flex-t p-t-14'>
                                <div class='block2-txt-child1 flex-col-l'>
                                    <a href='product-detail.html' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                                    ".$data['p_name']."
                                    </a>
    
    
                                    <span class='stext-105 cl3'>
                                    ".$data['p_price']."
                                    </span>
                                </div>
    
                                <div class='block2-txt-child2 flex-r p-t-3'>
                                    <a href='#' class='btn-addwish-b2 dis-block pos-relative js-addwish-b2 me-5'>
                                        $isAvailatable
                            
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>";
    }

}


// Fetch Data By Range 1000 

if(isset($_POST['lessthanthousand'])){

    $GetData = mysqli_query($con,"SELECT * FROM product WHERE p_price BETWEEN 0 AND 1000");

    while($data = mysqli_fetch_assoc($GetData)){
        $isAvailatable = "";
        if($data['p_qty'] > 0){
            $isAvailatable = "<span class='badge rounded-pill bg-primary'>In-Stock</span>";
        }else{
            $isAvailatable = "<span class='badge rounded-pill bg-danger'>Out-Of-Stock</span>";
        }
        
    echo "<div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women'>
                        
                        <div class='block2'>
                            <div class='block2-pic hov-img0'>
                                <img src='Admin_Dashboard/Images/".$data['p_image']."' alt='IMG-PRODUCT' style='width: 300px;height:400px'>
    
                                <a href='product-detail.php?id=".$data['id']."' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
                                    Quick View
                                </a>
                            </div>
    
                            <div class='block2-txt flex-w flex-t p-t-14'>
                                <div class='block2-txt-child1 flex-col-l'>
                                    <a href='product-detail.html' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
                                    ".$data['p_name']."
                                    </a>
    
    
                                    <span class='stext-105 cl3'>
                                    ".$data['p_price']."
                                    </span>
                                </div>
    
                                <div class='block2-txt-child2 flex-r p-t-3'>
                                    <a href='#' class='btn-addwish-b2 dis-block pos-relative js-addwish-b2 me-5'>
                                        $isAvailatable
                            
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>";
    }

}

// Send Mail

if(isset($_POST['sendmail'])){
    $to = $_POST['email'];
    $subj = $_POST['subj'];
    $msg = $_POST['msg'];
    $sender = "talibmari123@gmail.com";
    mail($to,$subj,$msg,$sender);
}
?>