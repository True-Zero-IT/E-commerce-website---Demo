<?php
session_start();
include "includes/header.php";
include "admin/config.php";
if(!isset($_SESSION["USER_ID"])){
    header("Location:login.php");
  }
$uer_id = $_SESSION["USER_ID"];
$ord_id = $_GET['ord_id']; 

$sql = "SELECT * FROM dm_orders AS o 
        INNER JOIN dm_order_items AS oitm ON o.ord_id = oitm.oi_order_id 
        INNER JOIN products AS p ON p.id = oitm.oi_p_id  
        WHERE o.ord_user_id = '$uer_id' AND o.ord_id = '$ord_id' ";
$res = mysqli_query($conn,$sql);
$ords = mysqli_fetch_all($res,MYSQLI_ASSOC); 
$i=1;
?>

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">My Orders</strong></div>
            </div>
        </div>
    </div>


    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Buyer</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ords as $o) { ?>
                    <tr class="text-center">
                        <th scope="row"><?= $i ?></th>
                        <th scope="row"><img src="images/products/<?= $o['image'] ?>" width="80" height="120"></th>
                        <td><?= $o['product_name'] ?></td>
                        <td><?= $o['ord_firstname'].' '.$o['ord_lastname'] ?></td> 
                        <td><?= $o['oi_qty'] ?></td>
                        <td><?= $o['oi_price'] ?></td> 
                    </tr> 
                <?php  $i++;} ?>
            </tbody>
        </table>
    </div>


<?php  include "includes/footer.php"; ?>  