<?php    
 session_start();
 include "includes/config.php"; 
if(isset($_SESSION['USER_ID'])){
    header("Location:index.php");  
}
  extract($_POST);
    
    $errMsg = "";
    $erdmname = "";  
    $errPassword = ""; 

    if(isset($login)){ 

        if(empty($email)){
            $errEmail =  "Please enter Email...";
        }  

        if(empty($c_password)){
            $errPassword =  "Please enter Password...";
        } 

        if(empty($errEmail) && empty($errPassword)){
                $conn = mysqli_connect("localhost","root","","manev_mobile");
                $qry = "SELECT * FROM dm_users WHERE users_email = '$email' AND users_password = '$c_password' ";
                $res = mysqli_query($conn,$qry);
                $row = mysqli_fetch_assoc($res); 
                $rows = mysqli_num_rows($res);
                if($rows == 1){
                  $_SESSION['USER_ID'] = $row['users_id'];
                  $_SESSION['USER_NAME'] = $row['users_fname'].' '.$row['users_lname'];
                  header("Location:index.php");
                }else{
                    $errMsg =  "Invalid Email Or Password.";
                }
        }

    }
    
    include "includes/header.php";
?>   
<div class="col-md-7 offset-3">

            <form action="#" method="POST">
              
              <div class="p-3 p-lg-5 border">
                <?php if(isset($errMsg) && !empty($errMsg)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Fail !&ensp;</strong><?=$errMsg?>
                    </div>
                <?php  } ?>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                    <span class="text-danger"><?=$errEmail ?? "" ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_password" class="text-black">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="c_password" name="c_password" placeholder="">
                    <span class="text-danger"><?=$errPassword ?? "" ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12 text-center">
                    <input type="submit" name="login" class="btn btn-primary btn-lg" value="Login">
                  </div>
                </div>
              </div>
            </form>
</div>

<?php include "includes/footer.php"; ?>