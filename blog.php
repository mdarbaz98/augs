<?php include('admin/include/config.php');
      include('./include/header.php');
?>
    <section class="section_blogpage">
    <div class="blog-heading-content">
            <h1>PE blogs</h1>
            <p>Bring a difference in your everyday life with our blogs and articles. We provide you thorough and verified information so you can live the best way possible.</p>
        </div>
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
															 $stmt_cat->execute([$data['cat_id']]);
															 $cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
															 if (!empty($cat_data)) {
																$cat_name = $cat_data[0]['name']; 
																}else{
																$cat_name="Not Found";
															 }
															 echo $cat_name;
															 ?></span>
                    <h1><?php echo $data['title']?></h1>
                    <span class="span2">Published <?php echo $data['uploaded_on']?></span>
                    <p><?php echo $data['description']?></p>
                    <button>Read more</button>
                </div>
            </div>
        </div>
        <?php $i++;} ?>
        <div class="outerline">
            <a href="">
            <button class="">View More</button>
            </a>
        </div>
    </section>
    <?php include('./include/footer.php') ?>