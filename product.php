<?php include('./include/header.php') ?>
<section class="section_productpage">
   <div class="blog_tabs">
     <div class="tabs-section">
       <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item" role="presentation">
           <button class="nav-link active  tabsbtn" id="psycho-1-tab" data-bs-toggle="tab" data-bs-target="#psycho-1" type="button" role="tab" aria-controls="psycho-1" aria-selected="true"> PE </button>
         </li>
         <li class="nav-item" role="presentation">
           <button class="nav-link  tabsbtn" id="psycho-2-tab" data-bs-toggle="tab" data-bs-target="#psycho-2" type="button" role="tab" aria-controls="psycho-2" aria-selected="false"> ED </button>
         </li>
       </ul>
       <div class="tab-content" id="myTabContent">
         <!-- first tab  -->
         <div class="tab-pane fade show active" id="psycho-1" role="tabpanel" aria-labelledby="psycho-1-tab">
           <div class="blog-heading-content">
             <h1 class="text-center before position-relative">PE Products</h1>
           </div>
           <!-- 1 -->
           <div class="categorysection2">
             <div class="container">
               <div class="row">
               <?php
                                $stmt = $conn->prepare("SELECT * FROM `product`  ORDER BY id DESC limit 8");
                                $stmt->execute();
                                $i=1;
                                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($data as $data)
                                {	$stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
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
                 <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                   <div class="categorybox_inside">
                     <div class="categorybox_img">
                     <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img">
                     <!-- <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt=""> -->
                     </div>
                     <div class="categorydetail_content">
                       <h2><?php echo $data['name'] ?></h2>
                       <div class="cd_span">
                       <?php echo $data['shrt_desc'] ?>
                       </div>
                      
                     </div>
                     <div class="cd_button">
                       <p>
                         <span>$<?php echo $data['prc'] ?></span>
                       </p>
                       <button>View</button>
                     </div>
                   </div>
                 </div>
                 <?php $i++;} ?>
               </div>
               <div class="outerline">
                 <button class="">View More</button>
               </div>
             </div>
           </div>
         </div>
         <!-- second tab  -->
         <div class="tab-pane fade" id="psycho-2" role="tabpanel" aria-labelledby="psycho-2-tab"> 
         <div class="blog-heading-content">
             <h1 class="text-center before position-relative">ED Products</h1>
           </div>
           <!-- 1 -->
           <div class="categorysection2">
             <div class="container">
               <div class="row">
               <?php
                                $stmt = $conn->prepare("SELECT * FROM `product`  ORDER BY id DESC limit 8");
                                $stmt->execute();
                                $i=1;
                                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($data as $data)
                                {	$stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
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
                 <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                   <div class="categorybox_inside">
                     <div class="categorybox_img">
                     <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img">
                     <!-- <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt=""> -->
                     </div>
                     <div class="categorydetail_content">
                       <h2><?php echo $data['name'] ?></h2>
                       <div class="cd_span">
                       <?php echo $data['shrt_desc'] ?>
                       </div>
                      
                     </div>
                     <div class="cd_button">
                       <p>
                         <span>$<?php echo $data['prc'] ?></span>
                       </p>
                       <button>View</button>
                     </div>
                   </div>
                 </div>
                 <?php $i++;} ?>
               </div>
               <div class="outerline">
                 <button class="">View More</button>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
    <?php include('./include/footer.php') ?>