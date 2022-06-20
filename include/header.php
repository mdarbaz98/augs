<?php
date_default_timezone_set('Asia/Kolkata');
include('admin/include/config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $seoTitle; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="http://192.168.00.115/augs/">
        <!-- owl carousel  -->
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />
        <!-- owl carousel  -->
        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Font Awesome  -->
        <!-- Bootstrap CDN  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <!-- Bootstrap CDN  -->
        <link rel="stylesheet" href="./css/style.css">
        <meta name="description" content="<?php echo $seoDescription ?>" />
  <meta name="robots" content="<?php echo $robot ?>" />
  <link rel="canonical" href="<?php echo $canonical; ?>" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="<?php echo $ogtype; ?>" />
  <meta property="og:title" content="<?php echo $ogtitle; ?>" />
  <meta property="og:description" content="<?php echo $ogdescription; ?>" />
  <meta property="og:url" content="<?php echo $ogcurrenturl; ?>" />
  <meta property="og:site_name" content="AUGS" />
  <!-- <meta property="og:updated_time" content="<?php //echo $lastupdate; ?>" />
  <meta property="og:image" content="<?php //echo $ogimage; ?>" />
  <meta property="og:image:secure_url" content="<?php //echo $sogimage; ?>" />
  <meta property="og:image:alt" content="<?php //echo $ogimagealt ?>" /> -->
  <?php
    if($page=="post"){
  ?>
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "<?php echo $ogtitle; ?>",
      },  
      "publisher": {
        "@type": "Organization",
        "name": "AUGS",
        "logo": {
          "@type": "ImageObject",
          "url": "assets/augs-logo.png"
        }
      },
      "datePublished": ""
    }
  </script>
  <?php
    }else{
  ?>
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "WebSite",
      "name": "Practical Anxiety Solutions",
      "url": "https://practicalanxietysolutions.com/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "{search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
<?php
    }
?>
    </head>
    <body>
        <header>
            <section class="header">
            <nav class="navbar fixed-top py-md-3 px-md-4 navbar-expand-lg ">
              <div class="container-fluid">
              <a href="/" class="col-lg-3"><svg version="1.1" id="Layer_1" class="website-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 624.6 267.6" style="enable-background:new 0 0 624.6 267.6; width: 100px" xml:space="preserve">
              <style type="text/css">
                .st0{fill:#FFFFFF;}
              </style>
              <g>
                <path class="st0" d="M139.4,108.4c-1.2,1.5-2.1,2.7-3,3.8c-12.8,15.8-33.3,21.8-52,15.1c-19.2-6.8-31.6-24.3-31.5-44.6
                  c0.1-19.9,12.7-37.2,31.7-44c10.8-3.8,21.5-2.8,32.3,0.4c1.1-1.7,0.5-3.6,0.5-5.3c0.2-10.1-0.2-20.2,0.1-30.2
                  c-6.2-1.3-13.1-2-20.6-2c-7.9,0-15.2,1-21.8,2.8C41.4,15,17.7,46.1,17.1,81.2c-0.9,46.3,36.5,84.4,82.8,84.3
                  c20.8-0.1,39-7.2,54.6-20.9c1.2-1.1,3.2-1.8,1.3-4.3C148.2,131,143,120.3,139.4,108.4z"/>
                <path class="st0" d="M296.4,1.9c0.9,0.3,1.5,0.7,1.6,1.3c0.4,1.6-2.8,3.8-7.1,4.8c-4.3,1-8.1,0.5-8.5-1.1c-0.1-0.3,0-0.5,0.1-0.8
                  c0.6,1.1,3.5,1.4,6.6,0.6c3.4-0.8,5.9-2.5,5.6-3.8c-0.2-0.7-1-1.1-2.3-1.2c0.4,0,0.7,0,1.1,0c0,0,0,0-0.1,0
                  c-16.4,0-31.6,30.9-31.6,38.1s8.1,15.6,17.5,15.6s11.1-6.3,14.1-6.3c3.2,0,6.2,6.3,14.6,6.3s16.7-8.6,16.7-15.6
                  C324.8,33.1,311.5,5.2,296.4,1.9z"/>
                <path class="st0" d="M491.9,194.3V72.1c-5.7-44.9-51.2-77.7-95.7-69.2c-44.6,8.5-73.4,48.5-67.3,93.7
                  c7.2,53.5,67.1,85.9,115.9,62.8c2.5-1.2,3.3-2.6,3.3-5.3c-0.1-12.3,0-24.6-0.1-37c0-1.2,0.7-2.6-0.6-3.6
                  c-17.1,20.1-42.5,22.2-61.2,10.9c-18.5-11.2-27-34.1-20.2-54.6c7-21.2,27.7-34.5,50-32.1c21.3,2.3,38.5,19.8,41.1,41.8
                  c0.6,1.8,0.3,3.6,0.3,5.4c0,36.5,0,72.9,0,109.4L491.9,194.3L491.9,194.3z"/>
                <path class="st0" d="M457.4,157.2c0.1,36.5,0.1-12.8,0,23.7c0,1.8,0.3,3.7-0.3,5.4c-2.6,22.1-19.8,39.6-41.1,41.9
                  c-22.3,2.4-43-10.8-50-32.1c-1.8-5.6-2.5-11.3-2.3-16.9h-35.5c-1,40.9,26.7,75.8,68.1,83.7c44.5,8.5,90-24.3,95.7-69.2v-36.5
                  L457.4,157.2L457.4,157.2z"/>
                <path class="st0" d="M283.8,76.1h-8.1l0.1,9.4c-0.4,8.9-3.5,17.8-9.2,25.4c-12,16.1-32.7,22.9-51.5,17
                  c-19.6-6.1-32.8-23.9-33.1-45.1c-0.2-14.6-3.7-28.3-11.1-40.9c-10.2-17.5-24.8-29.5-44.3-36.7c0,13,0,25.5,0,37.9
                  c0,1.6,0.8,2.4,1.9,3.2c12.9,10.4,17.7,24.1,18.2,40.3c1.4,48.1,45.9,85.2,93.4,78.3c36.2-5.3,65.3-33.9,70.4-69.2
                  c0.5-3.4,0.8-6.9,0.9-10.3V42h-35.8v34.1"/>
                <path class="st0" d="M607.6,115.1c-1.1-6.6-3.6-12.8-7.1-18.4c-17.1-23-56.6-13-59.1-38.3c0-0.1,0-0.1,0-0.2c0-0.2,0-0.3,0-0.5
                  c0-0.1,0-0.3,0-0.4c0-0.4,0-0.8,0-1.2c0-0.1,0-0.2,0-0.3c0-0.6,0-1.2,0.1-1.6c0.8-6.8,5.3-12.6,12-14.8c0.3-0.1,0.8-0.2,1.2-0.3
                  c0.5-0.1,0.9-0.2,1.4-0.2c0.7-0.1,1.5-0.1,2.2-0.1c7.5,0,14.3,4.8,16.7,11.9c0.7,2,1,4.1,0.9,6.3l-0.3,7.4l32.8-0.4l0.1-6.8
                  c0.1-9.7-2.4-18.8-7-26.5c-1.8-2.8-16.3-24.6-43.4-24.6c-24.8,0.2-46.5,19.3-49.3,43.5l0,0.4l0,4.4c0,0.2,0,0.4,0,0.7
                  c0.1,3.7,0.4,7.1,0.9,10.3c0.2,1.1,0.4,2.1,0.7,3.2l0.1,0.3c0.3,1,0.5,1.9,0.9,2.8l0.1,0.3l0,0.1c2.7,7.8,7.2,14.7,12.9,20.3
                  c18.1,13.5,46,7.9,50.7,26c0.3,1,0.5,1.9,0.6,3c0.1,0.9,0.1,1.9,0.1,2.8c0,0,0,0.1,0,0.1c0,0.1,0,0.1,0,0.1c0,0.1,0,0.1,0,0.2
                  c0,0.3,0,0.6-0.1,0.8c-0.8,6.8-5.3,12.6-12,14.8c-0.3,0.1-0.8,0.2-1.2,0.3c-0.5,0.1-0.9,0.2-1.4,0.2c-0.7,0.1-1.5,0.1-2.2,0.1
                  c-7.5,0-14.3-4.8-16.7-11.9c-0.7-2-1-4.1-0.9-6.3l0.3-7.4l-32.8,0.4l-0.1,6.8c-0.1,10.6,2.9,20.4,8.2,28.6c2,2.9,9,12.1,20.9,17.8
                  c3.8,1.7,7.8,3,12.1,3.9v0.1c2.7,0.5,5.5,0.8,8.5,0.8h0.7c24.8-0.2,46.5-19.3,49.3-43.5l0-0.4l0-4.4
                  C608.2,121.4,608,118.1,607.6,115.1z"/>
              </g>
              </svg></a>
              <!-- <a class="navbar-brand me-4" href=""><img class="logo-img" src="./assets/images/augs-logo.png" alt="logo"></a> -->
                <button class="navbar-toggler header-btn-1 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4 mx-auto text-center">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                      </a>
                      <ul class="dropdown-menu mx-auto" aria-labelledby="navbarDropdown">
                      <?php   $stmt = $conn->prepare("SELECT * FROM `category` ORDER BY id DESC limit 6");
                                                    $stmt->execute();
                                                    $i=0;
                                                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    $class="";
                                                    foreach ($data as $data){ ?>
                                                      <li class="mb-3"><a href="<?php echo $data['slug'] ?>"><?php echo $data['name'] ?></a></li>
                                                    <?php } ?>
                      </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="product">Product</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="blogs">Blogs</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                    </li>
                    
                  </ul>
                  <!-- <form class="header-form d-flex" onsubmit="return false">
                           <input class="form-control search-input me-2" type="search" placeholder="Search here..." aria-label="Search">
                           <button class="header-search-btn btn text-white" type="submit"><img src="./assets/images/search-interface-symbol.png" alt=""></button>
                           <div class="wrapper">
                           <ul class="text-black list-unstyled autoCom-Box">
                            <?php
                              // $selectBlog1=$conn->prepare("SELECT * FROM post WHERE status ='1' order by title asc");
                              // $selectBlog1->execute(); 
                              // $countCat1 = $selectBlog1->rowCount(); 
                              // if($countCat1>0){
                              //   while($row1=$selectBlog1->fetch(PDO::FETCH_ASSOC)){ 
                              //   $title1 = $row1['title'];
                              //   $slug1 = $row1['slug'];
                            ?>
                             <li class="searched_list"><a href="<?php// echo $slug1 ?>"><?php// echo $title1 ?></a></li> 
                             <?php
                              //   }
                              // }
                              // else{
                                  ?><li>NO Search Result</li>
                                  <?php 
                              //}
                            ?>
                                

                             </ul>
                           </div>
                         </form> -->
                </div>
                <form class="header-form d-flex col-lg-3" onsubmit="return false">
                           <input class="form-control search-input" type="search" placeholder="Search here..." aria-label="Search">
                           <button class="header-search-btn btn text-white" type="submit"><img src="./assets/images/search-interface-symbol.png" alt=""></button>
                           <div class="wrapper">
                           <ul class="text-black list-unstyled autoCom-Box">
                            <?php
                              $selectBlog1=$conn->prepare("SELECT * FROM product WHERE status ='1' order by title asc");
                              $selectBlog1->execute(); 
                              $countCat1 = $selectBlog1->rowCount(); 
                              if($countCat1>0){
                                while($row1=$selectBlog1->fetch(PDO::FETCH_ASSOC)){ 
                                $name = $row1['name'];
                            ?>
                             <li class="searched_list"><a href="<?php echo $name ?>"><?php echo $name ?></a></li> 
                             <?php
                                }
                              }
                              else{
                                  ?><li>NO Search Result</li>
                                  <?php 
                              }
                            ?>
                            <?php
                              $selectBlog1=$conn->prepare("SELECT * FROM post WHERE status ='1' order by title asc");
                              $selectBlog1->execute(); 
                              $countCat1 = $selectBlog1->rowCount(); 
                              if($countCat1>0){
                                while($row1=$selectBlog1->fetch(PDO::FETCH_ASSOC)){ 
                                $title1 = $row1['title'];
                                $slug1 = $row1['slug'];
                            ?>
                             <li class="searched_list"><a href="<?php echo $slug1 ?>"><?php echo $title1 ?></a></li> 
                             <?php
                                }
                              }
                              else{
                                  ?><li>NO Search Result</li>
                                  <?php 
                              }
                            ?>
                                

                             </ul>
                           </div>
                         </form>
                         <button class="navbar-toggler header-btn-2 d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars text-white"></i>
                        </button>
              </div>
            </nav>




                <!-- <nav class="navbar fixed-top py-md-3 px-md-4 navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-center align-content-center">
                            <button class="btn menu-open-btn text-white ">
                              <i class="fa-solid fa-bars"></i>
                              </button>
                              <a class="navbar-brand" href=""><img class="logo-img" src="./assets/images/augs-logo.png" alt="logo"></a>
                        </div>
                         <form class="header-form d-flex" onsubmit="return false">
                           <input class="form-control search-input me-2" type="search" placeholder="Search here..." aria-label="Search">
                           <button class="header-search-btn btn text-white" type="submit"><img src="./assets/images/search-interface-symbol.png" alt=""></button>
                           <div class="wrapper">
                           <ul class="text-black list-unstyled autoCom-Box">
                            <?php

                              // $selectBlog1=$conn->prepare("SELECT * FROM post WHERE status ='1' order by title asc");
                              // $selectBlog1->execute(); 
                              // $countCat1 = $selectBlog1->rowCount(); 
                              // if($countCat1>0){
                              //   while($row1=$selectBlog1->fetch(PDO::FETCH_ASSOC)){ 
                              //   $title1 = $row1['title'];
                              //   $slug1 = $row1['slug'];
                            ?>
                             <li class="searched_list"><a href="<?php //echo $slug1 ?>"><?php //echo $title1 ?></a></li> 
                             <?php
                              //   }
                              // }
                              // else{
                                  ?><li>NO Search Result</li>
                                  <?php 
//                              }
                            ?>
                                

                             </ul>
                           </div>
                         </form>
                    </div>
                  </nav> -->
            </section>
            <section class="side_Bar">
                <div class="py-3 px-4">
                    <div class="mb-4 m-md-0">
                        <button class="btn text-white menu-close-btn"><i class="fa-solid fa-xmark"></i></button>
                        <a class="text-white" href="./index.php"><img class="logo-img" src="./assets/images/augs-logo.png" alt=""></a>
                    </div>
                    <div>
                        <ul class="list-unstyled">
                            <li class="menu-list"><div>
                                <div>
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                Conditions
                                            </button>
                                          </h2>
                                          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">   
                                            <ul class="list-unstyled menu-inner-ul pl-0-">
                                            <?php   $stmt = $conn->prepare("SELECT * FROM `category` ORDER BY id DESC limit 6");
                                                    $stmt->execute();
                                                    $i=0;
                                                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    $class="";
                                                    foreach ($data as $data){ ?>
                                                      <li class="mb-3"><a href="category/<?php echo $data['slug'] ?>"><?php echo $data['name'] ?></a></li>
                                                    <?php } ?>
                                           </ul>
                                            </div>
                                          </div>
                                        </div>


                            <li class="menu-list">
                              <h2 class="menu-links"><a href="product">Product</a></h2>
                          </li>
                          <li class="menu-list">
                              <h2 class="menu-links"><a href="blogs">Blogs</a></h2>
                          </li>

                            <li class="menu-list">
                              <h2 class="menu-links"><a href="about">About Us</a></h2>
                          </li>
                            <li class="menu-list">
                              <h2 class="menu-links"><a href="contact">Contact Us</a></h2>
                          </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="over overlay_Div"></section>
        </header>
      