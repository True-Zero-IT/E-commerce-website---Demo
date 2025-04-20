<?php  
session_start();
    extract($_POST);
    
    $errMsg = "";
    $erdmname = "";
    $errLname = "";
    $errEmail = "";
    $errContact = "";
    $errCity = "";
    $errPassword = "";
    $errConfirmPass = "";

    if(isset($register)){
        if(empty($fname)){
            $erdmname =  "Firstname";
        }

        if(empty($lname)){
            $errLname =  "lastname";
        }

        if(empty($email)){
            $errEmail =  "email";
        }

        if(empty($mo_number)){
            $errContact =  "contact";
        }

        if(empty($city)){
            $errCity =  "city";
        }

        if(empty($password)){
            $errPassword =  "pass";
        }

        if(empty($confirm)){
            $errConfirmPass =  "confirmpass";
        }


        if(empty($erdmname) && empty($errLname) && empty($errEmail) && empty($errContact) && empty($errCity) && empty($errPassword) && empty($$errConfirmPass)){
                $conn = mysqli_connect("localhost","root","","manev mobile");
                $qry = "INSERT INTO dm_users (users_fname,users_lname,users_email,users_contect,users_city,users_password) 
                VALUES ('$fname','$lname','$email','$mo_number','$city','$password')";
                $res = mysqli_query($conn,$qry);
                if($res){
                    header("Location:login.php");
                }
        }

    }
    
    include "includes/header.php";
    ?>  
<div class="col-md-7 offset-3">
    
            <form action="#" method="post">
              
            <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fname" name="fname">
                    <span class="text-danger"><?=$erdmname ?? "" ?></span>
                  </div>
                  <div class="col-md-6">
                    <label for="lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="lname" name="lname">
                    <span class="text-danger"><?=$errLname ?? "" ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                    <span class="text-danger"><?=$errEmail ?? "" ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="mo_number" class="text-black">Mobile Number <span class="text-danger">*</span></label>
                    <input type="mo_number" class="form-control" id="mo_number" name="mo_number" placeholder="">
                    <span class="text-danger"><?=$errContact ?? "" ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="city" class="text-black">City </label>
                    <input type="text" class="form-control" id="city" name="city">
                    <span class="text-danger"><?=$errCity ?? "" ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="password" class="text-black">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="">
                    <span class="text-danger"><?=$errPassword ?? "" ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="confirm" class="text-black">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="confirm" name="confirm" placeholder="">
                    <span class="text-danger"><?=$errConfirmPass ?? "" ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                    <input type="submit" name="register" class="btn btn-primary btn-lg" value="Register">
                  </div>
                </div>
              </div>
            </form>
</div>
</html>
<?php include "includes/footer.php"; ?>