<?php include('./include/header.php') ?>
<section class="section_productpage">
   <div class="blog_tabs">
     <div class="tabs-section">
       
     <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php   $stmt = $conn->prepare("SELECT * FROM `category` ORDER BY id DESC limit 6");
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
                    <button class="nav-link <?php echo $class ?> tabsbtn" id="psycho-<?php echo $i ?>-tab" data-bs-toggle="tab"
                        data-bs-target="#psycho-<?php echo $i ?>" type="button" role="tab" aria-controls="psycho-<?php echo $i ?>"
                        aria-selected="true">
                        <?php echo $data['short_name'] ?>
                    </button>
                </li>
            <?php ++$i; } ?>    
          </ul>

       <div class="tab-content" id="myTabContent">
       <?php   $stmt = $conn->prepare("SELECT * FROM `category` ORDER BY id DESC limit 6");
                    $stmt->execute();
                    $i=0;
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $class="";
                    foreach ($data as $data){
                    
                        if($i==0){
                            $class="show active";
                        }else {
                            $class="";
                        }
            ?>
         <!-- first tab  -->
         <div class="tab-pane fade <?php echo $class ?>" id="psycho-<?php echo $i ?>" role="tabpanel"
                    aria-labelledby="psycho-<?php echo $i ?>-tab">
                    <div class="mt-5 mb-5">
                <h1 class="text-center"><?php echo $data['name'] ?></h1>
                <p class="text-center"><?php echo $data['description'] ?></p>
            </div>
           <!-- 1 -->
           <div class="categorysection2">
             <div class="container">
               <div class="row">
               <?php
                                $stmt = $conn->prepare("SELECT * FROM `product` ORDER BY id DESC limit 8");
                                $stmt->execute();
                                $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($data1 as $data_pro)
                                {	$stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                                  $stmt_img->execute([$data_pro['img_id']]);
                                  $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
                                    if (!empty($img_data)) {
                                    $image = $img_data[0]['path']; 
                                    $alt = $img_data[0]['alt'];
                                    }else{
                                      $image="Not Found";
                                      $alt="Not Found";
                                    }								 
					    ?>
                 <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                   <div class="categorybox_inside">
                     <div class="categorybox_img">
                     <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img">
                     <!-- <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt=""> -->
                     </div>
                     <div class="categorydetail_content">
                       <h2><?php echo $data_pro['name'] ?></h2>
                       <div class="cd_span">
                       <?php echo $data_pro['shrt_desc'] ?>
                       </div>
                      
                     </div>
                     <div class="cd_button">
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
                 <button class="">View More</button>
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