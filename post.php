<?php include('admin/include/config.php');
    $page="post";
    $slug = $_GET['slug'];

    $post = $conn->prepare('SELECT * FROM post WHERE slug=?');
    $post->execute([$slug]);
    echo $postCount=$post->rowCount();
    
    $product = $conn->prepare('SELECT * FROM product WHERE slug=?');
    $product->execute([$slug]);
    echo $productCount=$product->rowCount();


    // $selectpostId = $conn->prepare('SELECT * FROM post WHERE slug=?');
    // $selectpostId->execute([$slug]);

    if($postCount>0){  

    while($row=$post->fetch(PDO::FETCH_ASSOC)){
    $id = $row['id'];
    $title = $row['title'];
    $desc = $row['description'];
    // $name = $row['name'];
    $content = $row['content'];
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
    $ogimagealt = "$title - AUGS";
    include ('./include/header.php') ?>
    <section class="post__page pt-5 pt-md-0">
      <div
        class="post-banner-section d-flex justify-content-center align-items-center p-md-5"
      >
        <div class="container-fluid">
          <?php
          $stmt = $conn->prepare("SELECT * FROM `post` WHERE status=1 AND id=?");
          $stmt->execute([$id]);
          $i=1;
          $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
          if (!empty($data)) {
          foreach ($data as $data)
          {  $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
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
          <h2 class="before position-relative mx-auto my-5">Paroxetine</h2>
          <img class="post-banner-img" src="admin/<?php echo $image ?>" alt="<?php echo $alt ?>"/>
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
                <h2 class="before position-relative mx-auto my-5 d-none d-lg-block">
                  Table of content
                </h2>
                <ul class="table-of-content list-unstyled mb-md-5 d-none d-lg-block" id="table-of-content">
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="container p-0 overflow-hidden">
                <div class="blog-body">
                    <?php echo $content ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12">r</div>
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
                        $stmt = $conn->prepare("SELECT * FROM `post` ORDER BY id DESC limit 6");
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
                <a href="">
                  <div class="blog-card-img-div">
                  <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img">
                  </div>
                  <div class="blog-desc-sec pb-3 px-3 px-md-5">
                    <h1 class="my-2"><?php echo $data['title'] ?></h1>
                    <p>
                    <?php echo $data['description'] ?>
                    </p>
                    <button class="sq-btn">READ MORE</button>
                  </div>
                </a>
              </div>
              <?php $i++;} ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include ('./include/footer.php');
    }elseif($productCount>0){
      while($row=$product->fetch(PDO::FETCH_ASSOC)){
        $id = $row['id'];
        $title = $row['title'];
        $desc = $row['description'];
        // $name = $row['name'];
        $content = $row['content'];
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
        $ogimagealt = "$title - AUGS";
        include ('./include/header.php') ?>
         <section class="product__page pt-5">
      <div class="top-section py-md-5 pt-5 pb-2">
        <div class="container">
          <div class="product-section">
            <div class="container-fluid shadow p-md-0 overflow-hidden">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="product-img">
                    <img
                      src="https://images.unsplash.com/photo-1620987278429-ab178d6eb547?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDF8fHByb2R1Y3R8ZW58MHx8MHx8&w=1000&q=80"
                      alt="product image"
                    />
                    <button>Buy Now</button>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="product-desc p-4 ps-0">
                    <h1>Premature Ejaculation</h1>
                    <div class="d-flex gap-4 py-md-3 py-3">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star-half"></i>
                    </div>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Magni voluptatibus cum illo, vero, dolorem, dignissimos
                      maxime eum dolor libero ullam esse totam earum quisquam
                      tempore atque sapiente. Beatae, at nihil.
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
          <!-- <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseOne"
                  aria-expanded="true"
                  aria-controls="panelsStayOpen-collapseOne"
                >
                  What is PEs
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseOne"
                class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingOne"
              >
                <div class="accordion-body">
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, rerum cum reiciendis fugiat officiis, suscipit ducimus minima illo omnis, accusamus fuga? Delectus laborum, distinctio, fuga laboriosam tenetur, soluta eveniet voluptate quis dolore atque vel temporibus? Sint perferendis accusantium a, reiciendis quos voluptas recusandae assumenda odio ex facere neque et repudiandae nisi autem sed id. Sapiente in, aliquid id beatae deleniti officiis possimus molestiae eveniet fugit perferendis quibusdam illo recusandae quia aperiam consequatur vel incidunt ex vero facilis nobis quas quaerat. Aspernatur quaerat, esse cum atque id quae asperiores deleniti itaque?</p>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseTwo"
                  aria-expanded="false"
                  aria-controls="panelsStayOpen-collapseTwo"
                >
                  FAQ's
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingTwo"
              >
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It
                  is hidden by default, until the collapse plugin adds the
                  appropriate classes that we use to style each element. These
                  classes control the overall appearance, as well as the showing
                  and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also
                  worth noting that just about any HTML can go within the
                  <code>.accordion-body</code>, though the transition does limit
                  overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseThree"
                  aria-expanded="false"
                  aria-controls="panelsStayOpen-collapseThree"
                >
                  Conclusion
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingThree"
              >
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It
                  is hidden by default, until the collapse plugin adds the
                  appropriate classes that we use to style each element. These
                  classes control the overall appearance, as well as the showing
                  and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also
                  worth noting that just about any HTML can go within the
                  <code>.accordion-body</code>, though the transition does limit
                  overflow.
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="section-2">
            <h2 class="text-center my-4 mb-0 before position-relative m-auto">Recent Blogs</h2>
            <div class="home-blog-section py-5 px-4 p-md-5 mb-5 mb-md-0">
              <div class="owl-carousel owl-theme" id="product-owl-carousel">
              <?php
                            $stmt = $conn->prepare("SELECT * FROM `post`where `cat_id`= 4 ORDER BY id DESC limit 6");
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
                  <a href="">
                    <div class="blog-card-img-div"> <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img">  </div>
                  <div class="blog-desc-sec px-3 pb-3">
                    <h1 class="my-2"><?php echo $data['title'] ?> </h1>
                    <p><?php echo $data['description'] ?></p>
                    <button class="sq-btn">READ MORE</button>
                  </div> 
                  </a>
                </div>

                <?php $i++;} ?>
              </div>
            </div>
          </div>
      </div>
    </section>
    <?php include('./include/footer.php') ?>
  
   <?php  }
    else{
      echo "not found";
    }
     ?>
