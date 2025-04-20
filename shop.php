<?php 
    session_start();
    include "includes/config.php";

    $sql = "SELECT * FROM products AS p 
            INNER JOIN categories AS c ON p.catid = c.id ORDER BY p.id ASC";
    $res = mysqli_query($conn,$sql);
    $allProducts = mysqli_fetch_all($res,MYSQLI_ASSOC);
    
    $sql2 = "SELECT * FROM categories ORDER BY id ASC";
    $res2 = mysqli_query($conn,$sql2);
    $allcat = mysqli_fetch_all($res2,MYSQLI_ASSOC); 
    

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
          <div class="col-md-9 order-2">

            <!-- <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      View By 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">Newest</a>
                      <a class="dropdown-item" href="#">Low to High</a>
                      <a class="dropdown-item" href="#">High to Low</a>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
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
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <?php
                $con  = mysqli_connect("localhost","root","","manev_mobile") or exit("not connect");
                $qry="select * from categories order by id ASC";
                $result = mysqli_query($con,$qry) or exit("category select failed".mysqli_error($con));
            ?>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="border p-4 rounded mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
              <ul class="list-unstyled mb-0">
              <?php  while($row=mysqli_fetch_array($result)) { ?>
                <li><a href="category_products.php?cat_id=<?php echo $row['id']?>"><?php echo $row['cat_nm']?></a></li> 
                <?php } ?>
              </ul>
            </div>

            <!-- <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>
            </div> -->

          </div>
        </div>
 
        
      </div>
    </div>

  </div>
<?php  include "includes/footer.php"; ?>