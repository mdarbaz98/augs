<?php include('admin/include/config.php');
      include('./include/header.php');
?>
    <section class="section_blogpage">
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
                    <div class="blog-heading-content">
                <h1><?php echo $data['name'] ?></h1>
                <p><?php echo $data['description'] ?></p>
            </div>
                    <?php
                            $stmt = $conn->prepare("SELECT * FROM `post` WHERE cat_id=? ORDER BY id DESC limit 6");
                            $stmt->execute([$data['id']]);
                            $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($data1 as $data_post)
                            {	
                                $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                                $stmt_img->execute([$data_post['img_id']]);
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
       
        <!-- 1 -->
        <div class="container blog-section">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 blog-section-inside1">
                    <div class="blog-section_img">
                    <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img">                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 blog-section-inside2">
                  <span class="span1">
                      <?php
							$stmt_cat = $conn->prepare("SELECT * FROM `category` WHERE id=?");
							$stmt_cat->execute([$data_post['cat_id']]);
							$cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
							if (!empty($cat_data)) {
							$cat_name = $cat_data[0]['name']; 
							}else{
							$cat_name="Not Found";
							}
							echo $cat_name;
															 ?></span>
                    <h1><?php echo $data_post['title']?></h1>
                    <span class="span2">Published <?php echo $data_post['uploaded_on']?></span>
                    <p><?php echo $data_post['description']?></p>
                    <a href="<?php echo $data_post['slug']?>"><button>Read more</button></a>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="outerline">
            <a href="">
            <button class="">View More</button>
            </a>
        </div>               
    </div>
    <?php ++$i; } ?>  
            </div>
        </div>
    </div>
</section>
    <?php include('./include/footer.php') ?>