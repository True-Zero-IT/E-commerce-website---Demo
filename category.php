<?php include "includes/header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 order-2">
            <div class="row mb-5">
                <?php
                    include_once('admin/config.php');
                    $qry="select * from products order by id desc";
                    $result = mysqli_query($conn,$qry) or exit("Product select failed".mysqli_error($conn));

                    while($row=mysqli_fetch_array($result))
                    {

                        $catqry="select cat_nm from categories where id='".$row['catid']."'";
                        $catresult = mysqli_query($conn,$catqry) or exit("category select failed".mysqli_error($conn));

                        $catrow=mysqli_fetch_array($catresult);

                        $subcatqry="select subcategory_name from subcategories where id='".$row['subcatid']."'";
                        $subcatresult = mysqli_query($conn,$subcatqry) or exit("category select failed".mysqli_error($conn));

                        $subcatrow=mysqli_fetch_array($subcatresult);
                ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="product_detail.php?p_id=<?= $row['id'] ?>"><img src="images/products/<?php echo $row['image']; ?>" alt="Image placeholder" class="product_image img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="product_detail.php?p_id=<?= $row['id'] ?>"><?php echo $catrow['cat_nm'];?></a></h3>
                    <h3><a href="product_detail.php?p_id=<?= $row['id'] ?>"><?php echo $subcatrow['subcategory_name'];?></a></h3>
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
</body>
</html>

<?php include "includes/footer.php"; ?>