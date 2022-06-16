<?php
	$page="Blogs";
	$title = "Blogs";
    $desc = "Blogs of AUGS";
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
							<button class="nav-link <?php echo $class ?> tabsbtn" id="psycho-<?php echo $i ?>-tab" data-bs-toggle="tab" data-bs-target="#psycho-<?php echo $i ?>" type="button" role="tab" aria-controls="psycho-<?php echo $i ?>" aria-selected="true">
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
						<div class="tab-pane fade <?php echo $class ?> postAjaxdata" id="psycho-<?php echo $i ?>" role="tabpanel" aria-labelledby="psycho-<?php echo $i ?>-tab">
							<div class="blog-heading-content">
								<h1><?php echo $data['name'] ?></h1>
								<p>
									<?php echo $data['description'] ?>
								</p>
							</div>

								<!-- 1 -->
								<div class="container blog-section">
									<div class="row" id="postAjaxdata">
									<?php
                            $stmt = $conn->prepare("SELECT * FROM `post` WHERE cat_id=? ORDER BY id ASC limit 6");
                            $stmt->execute([$data['id']]);
                            $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($data1 as $data_post)
                            {	
								$post_id = $data_post['id'];
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
										<div class="col-sm-12 col-md-6 col-lg-6 blog-section-inside1">
											<div class="blog-section_img"> <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img"> </div>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 blog-section-inside2"> <span class="span1">
											<?php
													$stmt_cat = $conn->prepare("SELECT * FROM `category` WHERE id=?");
													$stmt_cat->execute([$data_post['cat_id']]);
													$cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
													if (!empty($cat_data)) {
													$cat_name = $cat_data[0]['name']; 
													}else{
													$cat_name="Not Found";
													}
													echo $cat_name; ?></span>
												<h1><?php echo $data_post['title']?></h1> <span class="span2">Published <?php echo $data_post['uploaded_on']?></span>
												<p>
													<?php echo $data_post['description']?>
												</p>
												<a href="<?php echo $data_post['slug']?>">
													<button>Read more</button>
												</a>
											</div>
											<?php } ?>
										</div>
									</div>

									<div class="outerline">
										<button class="" data-id="<?php echo $data_post['id']; ?>" id="viewpost" onclick="viewMoreblog(this,<?php $cat_id ?>)">View More</button>
									</div>
						</div>
						<?php ++$i; } ?>
				</div>
			</div>
		</div>
	</section>
	<?php include('./include/footer.php') ?>