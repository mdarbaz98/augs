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
        <base href="http://localhost/augs/">
        <!-- owl carousel  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
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
                <nav class="navbar fixed-top py-md-3 px-md-4 navbar-expand-lg">
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
                    </div>
                  </nav>
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
                                                    <li class="mb-3"><a href="">Premature Ejaculation</a></li>
                                                    <li class="mb-3"><a href="">Erectile Dysfunction</a></li>
                                                </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                              Products
                                            </button>
                                          </h2>
                                          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                              <ul class="list-unstyled menu-inner-ul pl-0-">
                                                <li></li>
                                                <li class="mb-3"><a href="./productpage.php">Product Dysfunction</a></li>
                                                <li class="mb-3"><a href="./productpage.php">Product Dysfunction</a></li>
                                            </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                              Blogs
                                            </button>
                                          </h2>
                                          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                              <ul class="list-unstyled menu-inner-ul pl-0-">
                                                <li class="mb-3"><a href="./post.php">Erectile Dysfunction</a></li>
                                                <li class="mb-3"><a href="./blog.php">Erectile Dysfunction</a></li>
                                            </ul>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div></li>
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
      