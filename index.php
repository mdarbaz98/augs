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
                	                    { ?><a href="<?php echo $data['slug'] ?>"><button><?php echo $data['short_name'] ?></button></a><?php }	?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section_middle">
			<div class="middle_heading">
				<h3>AUGS: American Urogynecologic Society</h3>
				<p>In July 2014, the American Urogynecologic Society (AUGS) and the International Urogynecological Association (IUGA) jointly hosted their annual scientific meetings in Washington, DC at the Washington Convention Center. The joint meeting served as the largest venue for those in the field of urogynecology and Female Pelvic Medicine and Reconstructive Surgery to come together for education, networking and sharing.</p>
				<p>AUGS-IUGA, two big names in the world of urogynaecology, have come together to make a potent change in people’s lives. We believe “Health Literacy” is essential for impacting societal health.</p>
				<p>Information is what educates the community and makes them strong. Here at AUGS-IUGA, keenly observed and highly researched health content is served to reach and give society a better perspective on their conditions.</p>
			</div>
			<div class="container pt-3 pb-2">
    <div id="accordionPanelsStayOpenExample" class="accordion">
        <div class="accordion-item mb-3">
            <h2 id="panelsStayOpen-heading-1" class="accordion-header"><button class="accordion-button" type="button"
                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-1" aria-expanded="true"
                    aria-controls="panelsStayOpen-collapse-1"> 1. How Is Our Information Useful?</button></h2>
            <div id="panelsStayOpen-collapse-1" class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-heading-1">
                <div class="accordion-body">
                    <p>When supplied and presented in its purest and natural form, information makes a difference.
                        AUGS-IUGA provides unadulterated and authentic information that professionals in the field only
                        write and also adds a pinch of creativity, colourfulness, and relatable language that comforts
                        and engages the user to understand.</p>
                    <p>The content is specified according to both Men’s and Women’s conditions to find what they are
                        looking for quickly.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item mb-3">
            <h2 id="panelsStayOpen-heading-3" class="accordion-header"><button class="accordion-button collapsed"
                    type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-3"
                    aria-expanded="false" aria-controls="panelsStayOpen-collapse-3"> 2. What Urogynaecological
                    Conditions Do We Focus On?
                </button></h2>
            <div id="panelsStayOpen-collapse-3" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-heading-3">
                <div class="accordion-body">
                    <p>AUGS-IUGA perceive conditions as small obstacles in life. We focus on a wide variety of Sexual
                        conditions and urogynaecological issues. We have categorized urological, gynaecology, and sexual
                        conditions for a better view and easy to execute information, so the readers can quickly solve
                        their problems and be “Health Literate.”</p>
                </div>
            </div>
        </div>
        <div class="accordion-item mb-3">
            <h2 id="panelsStayOpen-heading-4" class="accordion-header"><button class="accordion-button collapsed"
                    type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-4"
                    aria-expanded="false" aria-controls="panelsStayOpen-collapse-4"> 3. The Urogynaecology Conditions We
                    Focus on include
                </button></h2>
            <div id="panelsStayOpen-collapse-4" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-heading-4">
                <div class="accordion-body">
                    <span><strong>Male:</strong></span>
                    <p><strong>Premature Ejaculation: </strong>We understand and participate in your feelings, providing
                        you with the right direction to tackle PE with self-confidence and scientific methods. With our
                        regularly updated blogs and other content, you will amaze yourself with lots of easy to use
                        daily ways that benefit you to overcome this condition. </p>
                    <p><strong>Premature Ejaculation: </strong>We understand and participate in your feelings, providing
                        you with the right direction to tackle PE with self-confidence and scientific methods. With our
                        regularly updated blogs and other content, you will amaze yourself with lots of easy to use
                        daily ways that benefit you to overcome this condition. </p>
                    <p><strong>Erectile Dysfunction:</strong> Don’t be hard on yourself; it’s natural and curable. Just
                        follow our simple instructions. ED is a common situation faced by many people, the articles on
                        our website will help your unheard doubts, questions, and confusions and offer you a firm
                        solution to your condition.</p>
                    <p><strong>Arousal Disorder: </strong> the disorder as minor trouble. AUGS-IUGA can assist you in
                        making your sexual life more happening. Arousal disorders need proper guidance. The content is
                        always accurate and easy to understand with the best professional expertise. We specialize in
                        making information easy to use and making the user execute successfully in life.</p>
                    <span><strong>Female:</strong></span>
                    <p><strong>Low Libido:</strong> Increasing Libido problems can turn into irritation. A proper way
                        can get you to regain your interest; it’s simple with our result-driven approach. Women often
                        don’t open up their problems, especially regarding sex. AUGS-IUGA gives you the freedom and
                        privacy to explore the possibilities of solutions available on our site. </p>
                    <p>UTI- All the UTI concerns can be easily solved and taken care of. AUGS-IUGA venture makes sure
                        that you get yourself clear about your condition and work with a positive approach. UTI
                        conditions are hard to identify in the first stages due to a lack of knowledge. Our
                        content-driven approach fulfils this knowledge gap and automatically drives you towards good
                        health.</p>
                    <p><strong>Contraceptives:</strong> It’s a complicated and confusing part; with less guidance,
                        people turn to various methods unknowingly and can pull unwanted pregnancies. If you are not
                        fully aware of something, you are less confident. Here We build your confidence to make you
                        entirely regarding contraceptives. You will get answers to all your questions about
                        contraception here at one stop. </p>
                </div>
            </div>
        </div>
        <div class="accordion-item mb-3">
            <h2 id="panelsStayOpen-heading-5" class="accordion-header"><button class="accordion-button collapsed"
                    type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-5"
                    aria-expanded="false" aria-controls="panelsStayOpen-collapse-5"> 4. How We Are Going To Help </button>
            </h2>
            <div id="panelsStayOpen-collapse-5" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-heading-5">
                <div class="accordion-body">
                    <p>With our researched and accurate data done by our Team makes readers feel connected and find
                        their answers, indirectly catering to their unrevealed self-doubts and thoughts. Our website is
                        built with simplicity. With delicate and easy navigation, users can unconsciously find their
                        solutions by themselves. That’s where the magic of information happens. AUGS-IUGA is not only a
                        site. It can be your health journal, problem solver, knowledge provider, or as close as a
                        personal guide.</p>
                </div>
            </div>
        </div>
        <div class="accordion-item mb-3">
            <h2 id="panelsStayOpen-heading-6" class="accordion-header"><button class="accordion-button collapsed"
                    type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse-6"
                    aria-expanded="false" aria-controls="panelsStayOpen-collapse-6"> 5. What is our goal regarding these
                    conditions? </button></h2>
            <div id="panelsStayOpen-collapse-6" class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-heading-6">
                <div class="accordion-body">
                    <p>Treat the condition & add value to readers’ lives.
                        Modern science has proved that it is possible to tackle conditions with firm results. We follow
                        the same principle and try to achieve the goal of serving people through our content. Diseases
                        are half cured when you have the clarification about it, such clarity you can achieve through
                        our website, and you will be proficiently able to handle or safeguard yourselves to live life to
                        the fullest.</p>
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
