<?php 
    session_start();
    // include "admin/config.php";
  $cat_id = $_REQUEST['cat_id'];
    // $sql = "SELECT * FROM products AS p 
    //         INNER JOIN categories AS c ON p.id = c.id WHERE p.id = $cat_id  ORDER BY p.id ASC";
    // $res = mysqli_query($conn,$sql);
    // $subcatrow = mysqli_fetch_all($res,MYSQLI_ASSOC); 
    

include "includes/header.php";
?>
<html lang="en">

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 order-2">
            <div class="row mb-5">

              <?php
                    include_once('admin/config.php');
                    $qry="select * from products where 	catid='".$cat_id."'";
                    $result = mysqli_query($conn,$qry) or exit("Product select failed".mysqli_error($conn));

                    while($row=mysqli_fetch_array($result))
                    {
                        $catqry="select cat_nm from categories where id='".$cat_id."'";
                        $catresult = mysqli_query($conn,$catqry) or exit("category select failed".mysqli_error($conn));

                        $catrow=mysqli_fetch_array($catresult);

                ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="product_detail.php?p_id=<?= $row['id'] ?>"><img src="images/products/<?php echo $row['image']; ?>" alt="Image placeholder" class="product_image img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="product_detail.php?p_id=<?= $row['id'] ?>"><?php echo $catrow['cat_nm'];?></a></h3>
                    <p class="mb-0"><?php echo $row['product_name'];?></p>
                    <p class="mb-0"><?php echo $row['product_description'];?></p>
                    <p class="text-primary font-weight-bold">$<?php echo $row['product_price'];?></p>
                  </div>
                </div>
              </div> 
            <?php } ?>
            </div> 
          </div>
        </div>

        
        
      </div>
    </div>

  </div>
<?php  include "includes/footer.php"; ?>