<?php
session_start();
include "includes/header.php";
include "admin/config.php";

$pId = $_GET['p_id'];

//     $sql = "SELECT * FROM dm_products AS p 
//             INNER JOIN dm_categories AS c ON p.p_category_id = c.cat_id WHERE p_id = {$pId} ORDER BY p_id ASC";
//     $res = mysqli_query($conn,$sql);
//     $prod = mysqli_fetch_assoc($res);

  if(isset($_POST['addToCart'])){
    if(isset($_SESSION['USER_ID'])){
      $u_id = $_SESSION['USER_ID']; 
      $u_qty = $_POST['p_qty']; 
 
      $qry = "INSERT INTO dm_cart (cart_user_id,cart_product_id,cart_qty) VALUES ($u_id,$pId,$u_qty) ";
      $ress = mysqli_query($conn,$qry);
      // if($ress){
      //   header("location:cart.php");
      // }
    }
    else
    {
        $_SESSION['error']="Login Or Register First";
    }
  }

        if(isset($_SESSION['error']))
        {
          ?>
          <p class="login-box-msg text-danger" align="center"> <?php echo $_SESSION['error'] ?> </p>
          <?php
          unset($_SESSION['error']);      
        }
// ?>
<html lang="en">

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tank Top T-Shirt</strong></div>
        </div>
      </div>
    </div>  

    <form action="" method="POST">
      <div class="site-section">
        <div class="container">
          <div class="row">

            <?php
              include_once('admin/config.php');
              $qry="select * from products where 	id='".$pId."'";
              $result = mysqli_query($conn,$qry) or exit("Product select failed".mysqli_error($conn));

              $row=mysqli_fetch_array($result);
            ?>

            <div class="col-md-6">
              <img src="images/products/<?php echo $row['image']; ?>" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">
              <h2 class="text-black"><?php echo $row['product_name'];?></h2>
              <p><?php echo $row['product_description'];?></p>
              <p><strong class="text-primary h4">$ <?php echo $row['product_price'];?></strong></p> 
              <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div> 
                <input type="text" class="form-control text-center" name="p_qty" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>

            </div>
              <input type="hidden" name="pro_id" value="<?= $row['id'] ?>">
              <p><button name="addToCart" type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button></p> 
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  
  <?php include "includes/footer.php" ?>