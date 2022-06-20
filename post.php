<?php include 'admin/include/config.php';

$slug = $_GET['slug'];
$post = $conn->prepare('SELECT * FROM post WHERE slug=?');
$post->execute([$slug]);
echo $postCount = $post->rowCount();

$product = $conn->prepare('SELECT * FROM product WHERE slug=?');
$product->execute([$slug]);
echo $productCount = $product->rowCount();

$category = $conn->prepare('SELECT * FROM category WHERE slug=?');
$category->execute([$slug]);
echo $categoryCount = $category->rowCount();

// $selectpostId = $conn->prepare('SELECT * FROM post WHERE slug=?');
// $selectpostId->execute([$slug]);

if ($postCount > 0) {

    $page = "post";
    while ($row = $post->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $title = $row['title'];
        $desc = $row['description'];
        // $name = $row['name'];
        $content = $row['content'];
    }
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // Page Meta Auto Insertion Starts Here
    $robot = "index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large";
    $seoTitle = $title;
    $seoDescription = $desc;
    $canonical = $actual_link;
    $ogtype = "article";
    $ogtitle = $seoTitle;
    $ogdescription = $seoDescription;
    $ogcurrenturl = $actual_link;
    // $lastupdate = "2021-11-19T09:50:24+00:00";
    // $ogimage = "https://practicalanxietysolutions.com/wp-content/uploads/2021/11/man-running-in-brain-300x176.jpg";
    // $sogimage = "https://practicalanxietysolutions.com/wp-content/uploads/2021/11/man-running-in-brain-300x176.jpg";
    $ogimagealt = "$title - AUGS";
    include './include/header.php';
    ?>
    <section class="post__page pt-5 mt-lg-5 pt-md-0">
      <div
        class="post-banner-section d-flex justify-content-center align-items-center"
      >
        <div class="container">
          <?php
          $stmt = $conn->prepare("SELECT * FROM `post` WHERE status=1 AND id=?");
          $stmt->execute([$id]);
          $i = 1;
          $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
          if (!empty($data)) {
          foreach ($data as $data)
          {  $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE status=1 AND id=?");
             $stmt_img->execute([$data['img_id']]);
             $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
             if (!empty($img_data)) {
              $image = $img_data[0]['path']; 
              $alt = $img_data[0]['alt'];
            }else{
              $image="Not Found";
              $alt="Not Found";
             }
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $content = $data['content'];
            }
            }
          ?>
          <!-- <h2 class="text-center position-relative mx-auto my-md-5">Paroxetine</h2> -->
          <img class="post-banner-img mt-lg-4" src="admin/<?php echo $image ?>" alt="<?php echo $alt ?>"/>
          <p class="mt-2">Publish : 23-01-2020</p>
        </div>

      </div>
      <div class="post-content-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-12">
              <div class="TBC-container">
                  <div>
                    <div class="accordion mobile-tbc accordion-flush" id="mobile-table-of-content">
                    <div class="accordion-item d-block d-lg-none">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button post-sticky-accordion-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Table Of Content
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#mobile-table-of-content">
                          <div class="accordion-body p-md-0 pt-md-3">
                            <ul class="table-of-content list-unstyled mb-md-5" id="table-of-content-for-mobile">
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <h2 class="before position-relative mx-auto my-3 d-none d-lg-block">
                  Table of content
                </h2>
                <ul class="table-of-content list-unstyled mb-md-5 d-none d-lg-block" id="table-of-content">
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="container p-0 overflow-hidden">
                <div class="blog-body">
                    <?php echo $content; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12"></div>
          </div>
        </div>
      </div>
      
      <div class="container-fluid">
        <div class="section-2">
          <h2 class="text-center my-4 mb-0 before position-relative m-auto">
            Related Blogs
          </h2>
          <div class="home-blog-section py-5 p-md-5 mb-5 mb-md-4">
            <div class="owl-carousel owl-theme" id="post-owl-carousel">
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM `post` WHERE status=1 AND cat_id=? ORDER BY id DESC limit 6");
                        $stmt->execute([$data['cat_id']]);
                        $i=1;
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($data as $data)
                        {	
                      $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                      $stmt_img->execute([$data['img_id']]);
                      $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
                      if (!empty($img_data))
                              {
                        $image = $img_data[0]['path']; 
                      $alt = $img_data[0]['alt'];
                      }else{
                      $image="Not Found";
                      $alt="Not Found";
                      }								 
                  	?>
              <div class="blog-card">
                  <div class="blog-card-img-div">
                  <img src="admin/<?php echo $image; ?>" alt="<?php echo $alt; ?>" class="custome_img">
                  </div>
                  <div class="blog-desc-sec pb-3 px-3 px-md-5">
                    <h1 class="my-2"><?php echo $data['title']; ?></h1>
                    <p>
                    <?php echo $data['description']; ?>
                    </p>
                    <a href="<?php echo $data['slug']; ?>"><button class="sq-btn">READ MORE</button></a>
                  </div>
              </div>
              <?php $i++;
                    }
                    ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include './include/footer.php';
} elseif ($productCount > 0) {

    $page = "product";
    while ($row = $product->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $title = $row['title'];
        $desc = $row['description'];
        $content = $row['content'];
        $name = $row['name'];
        if ($row['img_id']) {
            echo $img_id = $row['img_id'];
        } else {
            $img_id = 1;
        }
        echo $front_img_id = $row['front_img'];
        echo "<br>";
        $imgArray = explode(',', $img_id);
        $updatedid = array_diff($imgArray, explode(',', $front_img_id));
        echo $updatedid = implode(',', $updatedid);
    }
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // Page Meta Auto Insertion Starts Here
    $robot = "index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large";
    $seoTitle = $title;
    $seoDescription = $desc;
    $canonical = $actual_link;
    $ogtype = "article";
    $ogtitle = $seoTitle;
    $ogdescription = $seoDescription;
    $ogcurrenturl = $actual_link;
    // $lastupdate = "2021-11-19T09:50:24+00:00";
    // $ogimage = "https://practicalanxietysolutions.com/wp-content/uploads/2021/11/man-running-in-brain-300x176.jpg";
    // $sogimage = "https://practicalanxietysolutions.com/wp-content/uploads/2021/11/man-running-in-brain-300x176.jpg";
    $ogimagealt = "$title - AUGS";
    include './include/header.php';
    ?>
    <section class="product__page pt-5">
      <div class="top-section py-md-5 pt-5 pb-2">
        <div class="container">
          <div class="product-section">
            <div class="container-fluid shadow p-md-0 overflow-hidden">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="product-img">

                  <div class="owl-carousel owl-theme product-image" id="">
                                            <?php 
                                            if(empty($img_id)){
                                              $img_id=1;
                                            }else{ $img_id;}

                                            $sql = "SELECT * FROM `images` WHERE status=1 AND id IN ($img_id) ";
                                            $stmt_img = $conn->prepare($sql);
                                            $stmt_img->execute();
                                            $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($img_data as $img_val) { ?>
                                            <div class="item"><img src="admin/<?php echo $img_val['path']; ?>" alt="<?php echo $img_val['alt']; ?>" class="custome_img"></div>
                                            <?php }
                                            ?>    
                  </div>


                    <!-- <img
                      src="https://images.unsplash.com/photo-1620987278429-ab178d6eb547?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDF8fHByb2R1Y3R8ZW58MHx8MHx8&w=1000&q=80"
                      alt="product image"
                    /> -->
                    <button>Buy Now</button>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="product-desc p-4 ps-0">
                    <h1><?php echo $name; ?></h1>
                    <div class="d-flex gap-4 py-md-3 py-3">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star-half"></i>
                    </div>
                    <p>
                    <?php echo $desc; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-section pt-5 pb-4">
        <h2 class="before position-relative mx-auto">Products Content</h2>
        <div class="container pt-5 pb-2">
          <?php echo $content; ?>
        </div>
        <div class="section-2">
            <h2 class="text-center my-4 mb-0 before position-relative m-auto">Recent Blogs</h2>
            <div class="home-blog-section py-5 px-4 p-md-5 mb-5 mb-md-0">
              <div class="owl-carousel owl-theme" id="product-owl-carousel">
                <?php
                            echo $sql ="SELECT * FROM `post` where status=1 AND `cat_id`= '$cat_id' ORDER BY id DESC limit 6";  
                            $cat_id=$row['name'];
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $i=1;
                            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($data as $data)
                            {	
                                $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                              $stmt_img->execute([$data['img_id']]);
                              $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
                              if (!empty($img_data))
                                {
                                  $image = $img_data[0]['path']; 
                                $alt = $img_data[0]['alt'];
                                }else{
                                $image="Not Found";
                                $alt="Not Found";
                                }								 
	              ?>
                <div class="blog-card">

                    <div class="blog-card-img-div"> <img src="admin/<?php echo $image; ?>" alt="<?php echo $alt; ?>" class="custome_img">  </div>
                  <div class="blog-desc-sec px-3 pb-3">
                    <h1 class="my-2"><?php echo $data['title']; ?> </h1>
                    <p><?php echo $data['description']; ?></p>
                    <a href="<?php echo $data['slug']; ?>"><button class="sq-btn">READ MORE</button></a>
                  </div> 
                
                </div>

                <?php $i++;
                }
                ?>
              </div>

            </div>
          </div>
      </div>
    </section>
    <?php include './include/footer.php'; ?>
  
   <?php
} elseif ($categoryCount > 0) {

    $page = "category";
    $cat = $_GET['slug'];
    // $selectCatId = $conn->prepare('SELECT * FROM category WHERE slug=?');
    // $selectCatId->execute([$cat]);
    while($row=$category->fetch(PDO::FETCH_ASSOC)){
    $catid = $row['id'];
    $title = $row['title'];
    $desc = $row['description'];
    $category_name = $row['name'];
    $content = $row['content'];
    
    $cat_img_id = $row['img_id'];

    $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE status=1 AND id=?");
    $stmt_img->execute([$cat_img_id]);
    $img_data_cat = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($img_data_cat)){
      $img_path = $img_data_cat[0]['path'];
      $img_alt = $img_data_cat[0]['alt'];
    }else{
      $img_path = "no img";
      $img_alt = "please set image";
    }
    
}
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Page Meta Auto Insertion Starts Here
$robot="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large";
$seoTitle = $title;
$seoDescription = $desc;
$canonical = $actual_link;
$ogtype = "article";
$ogtitle = $seoTitle;
$ogdescription = $seoDescription;
$ogcurrenturl = $actual_link;
// $lastupdate = "2021-11-19T09:50:24+00:00";
// $ogimage = "https://practicalanxietysolutions.com/wp-content/uploads/2021/11/man-running-in-brain-300x176.jpg";
// $sogimage = "https://practicalanxietysolutions.com/wp-content/uploads/2021/11/man-running-in-brain-300x176.jpg";
$ogimagealt = "$category_name - AUGS";

    include './include/header.php';
    ?>
    <section class="categoryproductED">
        <div class="categorysection1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 categorysection1_inside1">
                        <img class="mt-5 shadow" src="admin/<?php echo $img_path; ?>" alt="<?php echo $img_alt; ?>">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 categorysection1_inside2">
                    <?php echo $content; ?>
                    <a class="moreless-button" id="read-more-btn">Read more...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="categorysection2">
            <h2 class="text-center before position-relative">Products</h2>
            <div class="container">
                <div class="row">
                     <?php
                     $stmt = $conn->prepare("SELECT * FROM `product` WHERE status=1 AND cat_id=? ORDER BY id DESC limit 4");
                     $stmt->execute([$catid]);
                     $i = 1;
                     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                     foreach ($data as $data) { ?>

                            <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                                <div class="categorybox_inside">
                                    <div class="categorybox_img">        
                                            <?php
                                            $img_id = $data['img_id'];
                                            if ($data['front_img']) {
                                                $front_img_id = $data['front_img'];
                                            } else {
                                                $front_img_id = 1;
                                            }
                                            $sql = "SELECT * FROM `images` WHERE status=1 AND id IN ($front_img_id)";
                                            $stmt_img = $conn->prepare($sql);
                                            $stmt_img->execute();
                                            $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
                                            if (!empty($img_data)) {
                                                foreach ($img_data as $img_val) { ?>
                                            <img src="admin/<?php echo $img_val['path']; ?>" alt="<?php echo $img_val['alt']; ?>" class="custome_img">
                                            <?php }
                                            } else {
                                                echo "no images";
                                            }
                                            ?>    
                                      </div>
                                
                            <div class="categorydetail_content">
                            <span class="rounded-pill btn btn-dark btn-sm" style="font-size:10px;"><?php echo $category_name ?></span>
                                <h2 class="text-center"><?php echo $data['name'] ?></h2>
                                <div class="cd_span">
                                    <!-- <i class="fa-solid fa-circle"></i> -->
                                    <span><?php echo $data['shrt_desc']; ?></span>
                                </div>
                                <!-- <div class="cd_span">
                                    <i class="fa-solid fa-circle"></i>
                                    <span>Effective for 62-82% of men</span>
                                </div> -->
                            </div>
                            <div class="cd_button">
                                <p>from <span>$<?php echo $data['prc']; ?></span></p>
                               <a href="<?php echo $cat . "/" . $data['slug']; ?>"><button>View</button></a>
                            </div>
                        </div>
                    </div>
                    <?php $i++;}
                     ?>
                    <!--  -->
            </div>
            <a href="product"><button class="my-5 mx-auto rounded-pill">View All</button></a>
        </div>
        <!-- 3 -->
        <div class="container-fluid">
            <div class="section-2">
                <h2 class="text-center my-4  mb-0 before position-relative m-auto">Related Blogs</h2>
                <div class="home-blog-section py-5 mb-5 mx-0 mx-md-5 mb-md-0 px-md-5 px-0">
                    <div class="owl-carousel owl-theme" id="categoryproduct-owl-carousel">
                    <?php
                                $stmt = $conn->prepare("SELECT * FROM `post` WHERE status=1 AND cat_id=? ORDER BY id DESC");
                                $stmt->execute([$catid]);
                                $i=1;
                                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($data as $data)
                                {	$stmt_img = $conn->prepare("SELECT * FROM `images` WHERE status=1 AND id=?");
									$stmt_img->execute([$data['img_id']]);
									$img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
										if (!empty($img_data)) {
										$image = $img_data[0]['path']; 
										$alt = $img_data[0]['alt'];
										}else{
											$image="Not Found";
											$alt="Not Found";
										}								 
					?>
                        <div class="blog-card">
                            <a href="<?php echo $data['slug']; ?>">
                                <div class="blog-card-img-div"><img src="admin/<?php echo $image; ?>" alt="<?php echo $alt; ?>" class="custome_img"></div>
                                <div class="blog-desc-sec px-5 pb-3">
                                    <h1 class="my-2"><?php echo $data['title']; ?></h1>
                                    <p><?php echo $data['description']; ?></p>
                                    <button class="sq-btn">READ MORE</button>
                                </div>
                            </a>
                        </div>
                        <?php $i++;
                    }
                    ?>
                    </div>
                </div>

                <div class="outerline">
                   <a href="./blog.php">
                   <button class="">View All</button>
                   </a>
                </div>
            </div>
        </div>   
    </section>
    <?php include './include/footer.php'; ?>
  <?php
} else {
    echo "<script>window.location='404'</script>";
    exit();
}
?>
