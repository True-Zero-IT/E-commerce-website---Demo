<?php 
    session_start();
    include "includes/header.php";
    if(!isset($_SESSION["USER_ID"])){
      header("Location:login.php");
    }
    $uid = $_SESSION['USER_ID'];

    $sql = "SELECT * FROM dm_users WHERE users_id = $uid";
    $res = mysqli_query($conn,$sql);
    $users = mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <a href="product_detail.php?p_id=<?= $Product['users_id'] ?>"><img src="images/products/<?= $Product['user_image']?>" alt="Admin" class="rounded-circle" width="150"></a>
                    <div class="mt-3">
                      <h4><?=$_SESSION['USER_NAME']?></h4>
                      <p class="text-secondary mb-1">User</p> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php foreach ($users as $u) { ?>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?=$u['users_fname'].' '.$u['users_lname']?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                       <?=$u['users_email']?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?=$u['users_contect']?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">City</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?=$u['users_city']?>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            <?php } ?>


            </div>
          </div>

        </div>
    </div>

<?php include "includes/footer.php"; ?>