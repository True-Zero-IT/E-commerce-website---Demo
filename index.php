<?php 
session_start();
include "includes/header.php";
include "admin/config.php";
$con  = mysqli_connect("localhost","root","","manev_mobile") or exit("not connect");

    $sql = "SELECT * FROM products AS p 
            INNER JOIN categories AS c ON p.catid = c.id ORDER BY catid ASC";
    $res = mysqli_query($conn,$sql);
    $allProducts = mysqli_fetch_all($res,MYSQLI_ASSOC);

    $sql2 = "SELECT * FROM categories ORDER BY id ASC LIMIT 0,3";
    $res2 = mysqli_query($conn,$sql2);
    $allcat = mysqli_fetch_all($res2,MYSQLI_ASSOC); 

?>
<!-- style="background-image: url(images/hero_1.jpg);" -->
<html lang="en">

<style>
  .slider-container {
  position: relative;
  overflow: hidden;
}

.site-blocks-cover {
  display: none; /* Hide all slides by default */
  height: 50vh; /* Full height for the slider */
  background-size: cover;
  background-position: center;
}

.site-blocks-cover.active {
  display: block; /* Show only the active slide */
}

.nav-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(255, 255, 255, 0.7);
  border: none;
  cursor: pointer;
}

#prev {
  left: 10px;
}

#next {
  right: 10px;
}
</style>

<?php
  $stmt = $con->prepare("SELECT * FROM slider");
  $stmt->execute();
  $sliderresult = $stmt->get_result();

  while ($sliderrow = $sliderresult->fetch_assoc()) {
?>
    <div class="site-blocks-cover" style="background-image: url(images/slider/<?php echo htmlspecialchars($sliderrow['image'], ENT_QUOTES, 'UTF-8'); ?>)" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2 text-white"><?php echo htmlspecialchars($sliderrow['name'], ENT_QUOTES, 'UTF-8'); ?></h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4 text-white"><?php echo htmlspecialchars($sliderrow['description'], ENT_QUOTES, 'UTF-8'); ?></p>
              <p>
                <a href="<?php echo htmlspecialchars($sliderrow['button_link'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  }
?>

<button id="prev" class="nav-button">❮</button>
<button id="next" class="nav-button">❯</button>

    <div class="site-section site-blocks-2">
      <div class="container">
            <div class="row justify-content-center mb-3">
              <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Categories</h2>
              </div>
            </div>
        <div class="row"> 
          <?php foreach ($allcat as $cat) { ?>  
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="" overflow="hidden">
              <a class="block-2-item" href="category_products.php?cat_id=<?= $cat['id'] ?>">
                <figure class="image">
                  <img src="images/categories/<?php echo $cat['cat_img'] ?>" alt="bad" class="img-fluid">
                </figure>
                <div class="text">
                  <!-- <span class="text-uppercase">Collections</span> -->
                  <h3><?= $cat['cat_nm'] ?></h3>
                </div>
              </a>
            </div>
          <?php } ?> 

        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

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
              <div class="item">
                <div class="block-4 text-center">
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

  <?php 
  include "includes/footer.php";
  ?>  
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.site-blocks-cover');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (i === index) {
                slide.classList.add('active');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length; // Cycle back to start
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length; // Cycle back to end
        showSlide(currentSlide);
    }

    document.getElementById('next').addEventListener('click', nextSlide);
    document.getElementById('prev').addEventListener('click', prevSlide);

    // Auto-slide every 5 seconds
    setInterval(nextSlide, 10000);

    // Show the first slide initially
    showSlide(currentSlide);
  });
</script>