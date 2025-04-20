<?php
session_start();
include "includes/header.php";
include "admin/config.php";

$uer_id = $_SESSION["USER_ID"];

$sql = "SELECT * FROM products AS p 
        INNER JOIN dm_cart AS c ON p.id = c.cart_product_id WHERE cart_user_id = '$uer_id'";
    $res = mysqli_query($conn,$sql);
    $allProd = mysqli_fetch_all($res,MYSQLI_ASSOC);
    $tot = 0;

    extract($_POST);
    if(isset($_POST['place_ord'])){

      $u_id = $_SESSION['USER_ID'];
      $trans_id = time().uniqid(mt_rand());
      $pay_status = "Success";
      $ord_status = "Dipatches";
      $tot_price = $_SESSION['cart_total'];
      // echo $tot_price;

      $ordQry = "INSERT INTO dm_orders (ord_user_id,ord_transition_id,ord_firstname,ord_lastname,ord_address,ord_email,ord_mobile,ord_pincode,ord_city,ord_payment_type,ord_total_price,ord_payment_status,ord_status) 
              VALUES ('$u_id','$trans_id','$fname','$lname','$address','$email','$mobile','$pincode','$city','$pay_type','$tot_price','$pay_status','$ord_status')";
      $placed = mysqli_query($conn,$ordQry);

      $order_id = mysqli_insert_id($conn); 

      if($placed){
        foreach($allProd as $cartpro)
        {  
          $qry = "INSERT INTO dm_order_items (oi_order_id,oi_p_id,oi_qty,oi_price)
                  VALUES ($order_id,{$cartpro['cart_qty']},{$cartpro['id']},{$cartpro['product_price']})";
          $addorderitm = mysqli_query($conn,$qry);
          if($addorderitm){
            $sql = "DELETE FROM dm_cart WHERE cart_user_id = '$uer_id' ";
            $res = mysqli_query($conn,$sql);  
          }
        } 
        // header("location:thankyou");
        unset($_SESSION['cart_total']);
      } 
    }
 
?>
<html lang="en">

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

      <form action="" method="POST">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border"> 

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="fname">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="lname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_companynameemail" class="text-black">Email </label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="address" placeholder="Street address">
                </div>
              </div> 

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Pincode <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="pincode">
                </div>
                <div class="col-md-6">
                  <label for="city" class="text-black">City <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City">
                </div>
              </div>
               
              <div class="form-group row md-5">
                <div class="col-md-12">
                  <label for="phone" class="text-black">Phone<span class="text-danger">*</span> </label>
                  <input type="text" class="form-control" id="phone" name="mobile" placeholder="Enter Mobile Number">
                </div>
              </div>

            </div>
          </div>

          <div class="col-md-6"> 

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php foreach ($allProd as $p) { ?>
                        <tr>
                          <td><?= $p['product_name'] ?> <strong class="mx-2">x</strong> <?= $p['cart_qty'] ?></td>
                          <td>$ <?= number_format($p['product_price'] * $p['cart_qty']) ?></td>
                        </tr>
                      <?php 
                        $tot = $tot + ($p['product_price'] * $p['cart_qty']); 
                        $_SESSION['cart_total'] = $tot;
                        } ?>  
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>$ <?= number_format($tot) ?></strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <h3 class="text-black">Select Payment Type : </h3>
                  <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pay_type" value="cod" required>COD
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pay_type" value="card" required>CARD
                      </label>
                    </div>
                    <div class="form-check mb-4">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="pay_type" value="emi" required>EMI
                      </label>
                    </div>

                  <div class="form-group">
                    <button type="submit" name="place_ord" class="btn btn-primary btn-lg py-3 btn-block">Place Order</button>
                  </div>

                </div>
              </div>
            </div>


            <!-- <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">
                  
                  <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Apply</button>
                    </div>
                  </div>

                </div>
              </div>
            </div> -->

          </div>
        </div>
        </form>
      </div>
    </div>

    <?php 
    // unset($_SESSION['cart_total']);
  include "includes/footer.php";
  ?>  