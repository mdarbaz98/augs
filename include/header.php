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
              <a class="navbar-brand me-4" href=""><img class="logo-img" src="./assets/images/augs-logo.png" alt="logo"></a>
                <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4 mx-auto">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php   $stmt = $conn->prepare("SELECT * FROM `category` ORDER BY id DESC limit 6");
                                                    $stmt->execute();
                                                    $i=0;
                                                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    $class="";
                                                    foreach ($data as $data){ ?>
                                                      <li class="mb-3"><a href="category/<?php echo $data['slug'] ?>"><?php echo $data['name'] ?></a></li>
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
                         </form> -->
                </div>
                <form class="header-form d-flex" onsubmit="return false">
                           <input class="form-control search-input me-2" type="search" placeholder="Search here..." aria-label="Search">
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
                         <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
      