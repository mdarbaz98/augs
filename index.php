<?php include('./include/header.php');
	  	include('admin/include/config.php');?>
	<section class="home__section pt-4">
		<div class="section-1">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-lg-7 order-lg-0 order-1">
						<div class="home__leftSection mt-lg-5">
							<h1 class="home_heading">Don't worry,down there it's time to look up!</h1>
							<div class="three-div-container">
								<div class="row">
									<div class="col">
										<div class="home-div div-1 text-center"> <span>u<small class="text-lowercase">p</small></span>
											<p>UP- Uplift your sexual desires and make a push towards your fantasies.</p>
										</div>
									</div>
									<div class="col">
										<div class=" home-div div-1 text-center"> <span>S<small class="text-lowercase">traight</small></span>
											<p>Straight- Unleash the beast inside you.</p>
										</div>
									</div>
									<div class="col">
										<div class=" home-div div-1 text-center"> <span>P<small class="text-lowercase">owerful</small></span>
											<p>Powerful- Enjoy the journey at your fullest.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-5">
						<div class="right__homeSection">
							<div class="image-div"> <img class="shadow" src="https://media.istockphoto.com/photos/young-smiling-handsome-man-in-casual-clothes-posing-isolated-on-blue-picture-id1249420269?k=20&m=1249420269&s=612x612&w=0&h=taSQreK8i8J_nt-NQR0SBGVhXXtNWAtJuXiBnHBNW0g=" alt="home-image"> </div>
							<div class="home-category-buttons-section pt-4 d-flex justify-content-center gap-2">
							<?php
                  $stmt = $conn->prepare("SELECT * FROM `category` limit 2");
                  $stmt->execute();
									$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($data as $data)
                	{ ?><a href="category/<?php echo $data['slug'] ?>"><button>PE</button></a><?php }	?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-2 pb-4">
			<h2 class="text-center my-5 mb-0 before position-relative m-auto">Recent Blogs</h2>
			<div class="home-blog-section py-5 px-4 p-md-5 mb-5 mb-md-0">
				<div class="owl-carousel owl-theme" id="home-owl-carousel">
					<?php
                                $stmt = $conn->prepare("SELECT * FROM `post` ORDER BY id DESC");
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
					<div class="blog-card">
						<a href="">
							<div class="blog-card-img-div"><img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img"></div>
							<div class="blog-desc-sec pb-3 px-3 px-md-5">
								<h1 class="my-2"><?php echo $data['title'] ?></h1>
								<p><?php echo $data['description'] ?></p>
								<a href="<?php echo $data['slug'] ?>"><button class="sq-btn">READ MORE</button></a>
							</div>
						</a>
					</div>
					<?php $i++;} ?>
				</div>
			</div>
		</div>
		<div class="section-3 px-2 py-5  p-md-4">
			<div class="container-fluid">
				<h3 class="d-block d-md-none text-center mb-5 before position-relative m-auto">Enquiry Form</h3>
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="left-section d-md-flex justify-content-center align-items-center h-100">
							<p class="mb-5">We aim to be a platform for people dealing with sexual dysfunction.</br> Stories,Suggestions & Medicine provided by us will be a game changer in your sex life.Stepping out of your mental space is a necessity for you to recover and gain back your sexual pleasure.</p>
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="right-section ms-auto">
							<h3 class="text-md-end text-center my-3 d-none d-md-block before position-relative">Enquiry Form</h3>
							<form class="form mt-4" id="enquiry">
								<div class="normal-form mb-2">
									<input type="text" class="form-control p-3" id="name" name="name" placeholder="Your name">
									<label for="name"></label>
								</div>
								<div class="normal-form mb-3">
									<input type="email" class="form-control p-3" id="email" name="email" placeholder="Your email address"> </div>
								<div class="normal-form mb-3">
									<input type="text" class="form-control p-3" id="contact" name="contact" placeholder="Your contact"> </div>
								<div class="normal-form mb-4">
									<textarea class="form-control p-3" placeholder="Leave a comment here" name="msg" id="msg"></textarea>
								</div>
								<div>
									<input type="hidden" name="btn" value="addEnquiry">
									<button type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('./include/footer.php') ?>
