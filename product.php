<?php
	$page="product";
	$title = "Product";
    $desc = "AUGS Home";
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


include('./include/header.php') ?>
<section class="section_productpage pt-lg-5 ">
   <div class="blog_tabs">
     <div class="tabs-section">
       
     <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php   $stmt = $conn->prepare("SELECT * FROM `category` ORDER BY id DESC limit 4");
                    $stmt->execute();
                    $i=0;
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $class="";
                    foreach ($data as $data){
                        if($i==0){
                            $class="active";
                        }else {
                            $class="";
                        }
            ?>
            <li class="nav-item" role="presentation">
            <button class="nav-link <?php echo $class ?> tabsbtn" id="<?php echo $data['slug'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo $data['slug'] ?>" type="button" role="tab" aria-controls="<?php echo $data['slug'] ?>" aria-selected="true">
                        <?php echo $data['short_name'] ?>
                    </button>
                </li>
            <?php ++$i; } ?>    
          </ul>

       <div class="tab-content" id="myTabContent">
       <?php   $stmt = $conn->prepare("SELECT * FROM `category` ORDER BY id DESC limit 4");
                    $stmt->execute();
                    $i=0;
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $class="";
                    foreach ($data as $data){
                      $cat_id = $data['id'];
                        if($i==0){
                            $class="show active";
                        }else {
                            $class="";
                        }
            ?>
         <!-- first tab  -->
         <div class="tab-pane fade <?php echo $class ?>" id="<?php echo $data['slug'] ?>" role="tabpanel" aria-labelledby="<?php echo $data['slug'] ?>-tab">
                    <div class="mt-5 mb-5">
                <h1 class="text-center"><?php echo $data['name'] ?></h1>
                <p class="text-center"><?php echo $data['description'] ?></p>
            </div>
           <!-- 1 -->
           <div class="categorysection2 px-3 px-md-0">
             <div class="container">
               <div class="row" id="productAjaxdata">
               <?php
                      $stmt = $conn->prepare("SELECT * FROM `product` WHERE status=? AND cat_id=? ORDER BY id DESC limit 4");
                      $stmt->execute([1,$cat_id]);
                      $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($data1 as $data_pro)
                      {	
                                  $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                                  $stmt_img->execute([$data_pro['img_id']]);
                                  $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
                                    if (!empty($img_data)) {
                                    $image = $img_data[0]['path']; 
                                    $alt = $img_data[0]['alt'];
                                    }else{
                                      $image="Not Found";
                                      $alt="Not Found";
                                    }				
                          $stmt_cat = $conn->prepare("SELECT * FROM `category` WHERE id=?");
													$stmt_cat->execute([$data_pro['cat_id']]);
													$cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
													if (!empty($cat_data)) {
													$cat_name = $cat_data[0]['name']; 
													}else{
													$cat_name="Not Found";
													}				 
					    ?>
                 <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                   <div class="categorybox_inside">
                     <div class="categorybox_img">
                     <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img">
                     <!-- <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt=""> -->
                     </div>
                     <div class="categorydetail_content">
                       <span class="rounded-pill btn btn-dark btn-sm" style="font-size: 10px"><?php echo $cat_name ?></span>
                       <h2><?php echo $data_pro['name'] ?></h2>
                       <div class="cd_span">
                       <?php echo $data_pro['shrt_desc'] ?>
                       </div>
                      
                     </div>
                     <div class="cd_button pt-4">
                       <p>
                         <span>$<?php echo $data_pro['prc'] ?></span>
                       </p>
                       <button>View</button>
                     </div>
                   </div>
                 </div>

              <?php } ?>
               </div>
               <div class="outerline">
                 <button class="viewproduct" data-id="<?php echo $data_pro['id']; ?>" onclick="viewMoreproduct(this,<?php echo $data['id'] ?>,'<?php echo $data['slug'] ?>')">View More</button>
               </div>
             </div>
           </div>
         </div>
<?php ++$i; } ?> 

       </div>
     </div>

   </div>
 </section>
    <?php include('./include/footer.php') ?>