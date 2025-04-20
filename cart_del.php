<?php
    session_start();
    include "admin/config.php";
    $uer_id = $_SESSION["USER_ID"];

    if(isset($_GET['del_id']) && !empty($_GET['del_id'])){
        
        $pId = $_GET['del_id'];
        $qry="DELETE FROM dm_cart WHERE cart_id = '".$pId."' AND cart_user_id = '$uer_id' ";
        $result = mysqli_query($conn,$qry);
        if($result){
        // header("Location:cart.php?success='successfully Deleted Product From Cart'");
            echo "<script>window.location.href='cart.php'</script>";
        }
    }
?>