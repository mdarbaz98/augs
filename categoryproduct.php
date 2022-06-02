<?php include('./include/header.php');
	include('admin/include/config.php');
    echo $cat = $_GET['cat'];
?>
    <section class="categoryproductED">
        <div class="categorysection1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 categorysection1_inside1">
                        <img class="mt-5 pt-4" src="https://images.unsplash.com/photo-1581594693702-fbdc51b2763b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            alt="">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 categorysection1_inside2">
                        <h1>Premature Ejaculation</h1>
                        <h2>All you need to know about Premature Ejaculation</h2>
                        <p>Premature Ejaculation means when you experience orgasm before the desired time. It is a common situation a man faces. Around 40 percent of males undergo this situation. 
                            In Premature Ejaculation, a man can experience early orgasm before or between sexual intercourse, resulting in dissatisfaction with you and your partner. It can be depressing and stressful for a man, and there are several reasons that can raise PE, but firstly let’s normalize it for better understanding and your doubt clearance.
                        <span>
                        <a class="moreless-button">Read more...</a></span></p>
                        <div class="moretext" style="display: none;">
                            <h2>Are There Any Symptoms Of Premature Ejaculation?</h2>
                            <p>Premature Ejaculation is not a disease that has symptoms. Early ejaculation is itself a sign of PE. If you ejaculate nearly in a minute every time you have sex or masturbation, then there are chances of Premature Ejaculation. You need to observe these instances at the time you are having sexual intercourse. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="categorysection2">
            <h2 class="text-center before position-relative">Products</h2>
            <div class="container">
                <div class="row">
                     <?php
                                $stmt = $conn->prepare("SELECT * FROM `product` ORDER BY id DESC");
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
                            </div>
                            <div class="categorydetail_content">
                                <h2 class="text-center"><?php echo $data['name'] ?></h2>
                                <div class="cd_span">
                                    <!-- <i class="fa-solid fa-circle"></i> -->
                                    <span><?php echo $data['shrt_desc'] ?></span>
                                </div>
                                <!-- <div class="cd_span">
                                    <i class="fa-solid fa-circle"></i>
                                    <span>Effective for 62-82% of men</span>
                                </div> -->
                            </div>
                            <div class="cd_button">
                                <p>from <span>$<?php echo $data['prc'] ?></span></p>
                                <button>View</button>
                            </div>
                        </div>
                    </div>
                    <?php $i++;} ?>
                    <!-- <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                        <div class="categorybox_inside">
                            <div class="categorybox_img">
                                <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="">
                            </div>
                            <div class="categorydetail_content">
                                <h2>Sildenafil</h2>
                                <div class="cd_span">
                                    <i class="fa-solid fa-circle"></i>
                                    <span>Effective for 62-82% of men</span>
                                </div>
                                <div class="cd_span">
                                    <i class="fa-solid fa-circle"></i>
                                    <span>Works in 1hr and lasts 4-5hrs</span>
                                </div>
                            </div>
                            <div class="cd_button">
                                <p><span> $37.00</span></p>
                                <button>View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                        <div class="categorybox_inside">
                            <div class="categorybox_img">
                                <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="">
                            </div>
                            <div class="categorydetail_content">
                                <h2>Tadalafil</h2>
                                <div class="cd_span">
                                    <i class="fa-solid fa-circle"></i>
                                    <span>Can be taken with food</span>
                                </div>
                                <div class="cd_span">
                                    <i class="fa-solid fa-circle"></i>
                                    <span>Works in 30mins, lasts up</span>
                                </div>
                            </div>
                            <div class="cd_button">
                                <p><span> $15.00</span></p>
                                <button>View</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                        <div class="categorybox_inside">
                            <div class="categorybox_img">
                                <img src="https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                    alt="">
                            </div>
                            <div class="categorydetail_content">
                                <h2>Zopiclone</h2>
                                <div class="cd_span">
                                    <i class="fa-solid fa-circle"></i>
                                    <span>Lasts up to 4-5hrs</span>
                                </div>
                                <div class="cd_span">
                                    <i class="fa-solid fa-circle"></i>
                                    <span>Effective for 62-82% of men</span>
                                </div>
                            </div>
                            <div class="cd_button">
                                <p><span> $53.00</span></p>
                                <button>View</button>
                            </div>
                        </div>
                    </div> -->
                    
                </div>
                <div class="outerline">
                    <button class="">View All</button>
                </div>
            </div>
        </div>
        <!-- 3 -->
        <div class="container-fluid">
            <div class="section-2">
                <h2 class="text-center my-4  mb-0 before position-relative m-auto">Related Blogs</h2>
                <div class="home-blog-section py-5 mb-5 mx-5 mb-md-0">
                    <div class="owl-carousel owl-theme" id="categoryproduct-owl-carousel">
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
                                <div class="blog-desc-sec px-5">
                                    <h1 class="my-2"><?php echo $data['title'] ?></h1>
                                    <p><?php echo $data['description'] ?></p>
                                    <button class="sq-btn">READ MORE</button>
                                </div>
                            </a>
                        </div>
                        <?php $i++;} ?>
                    </div>
                </div>

                <div class="outerline">
                   <a href="./blog.php">
                   <button class="">View All</button>
                   </a>
                </div>
            </div>
        </div>   
    </section>
    <?php include('./include/footer.php') ?>