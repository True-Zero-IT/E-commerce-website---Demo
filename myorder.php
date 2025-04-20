<?php
session_start();
include "includes/header.php";
include "admin/config.php";
if(!isset($_SESSION["USER_ID"])){
    header("Location:login.php");
  }
$uer_id = $_SESSION["USER_ID"];

$sql = "SELECT * FROM dm_orders WHERE ord_user_id = '$uer_id' ";
$res = mysqli_query($conn,$sql);
$allOrds = mysqli_fetch_all($res,MYSQLI_ASSOC);
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
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allOrds as $ord) { ?>
                    <tr class="text-center">
                        <th scope="row"><?= $i ?></th>
                        <td><?= $ord['ord_firstname'].' '.$ord['ord_lastname'] ?></td>
                        <td><?= $ord['ord_address'] ?></td>
                        <td><?= $ord['ord_email'] ?></td>
                        <td><?= $ord['ord_city'] ?></td>
                        <td><?= $ord['ord_mobile'] ?></td>
                        <td><?= $ord['ord_status'] ?></td>
                        <td>
                            <a href="order_detail.php?ord_id=<?= $ord['ord_id'] ?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                    </tr> 
                <?php  $i++;} ?>
            </tbody>
        </table>
    </div>


<?php  include "includes/footer.php"; ?>  