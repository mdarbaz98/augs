<?php 
	include('admin/include/config.php');
    $page="category";
    $cat = $_GET['cat'];
    $selectCatId = $conn->prepare('SELECT * FROM category WHERE slug=?');
    $selectCatId->execute([$cat]);
    while($row=$selectCatId->fetch(PDO::FETCH_ASSOC)){
    $catid = $row['id'];
    $title = $row['title'];
    $desc = $row['description'];
    $name = $row['name'];
    $content = $row['content'];
    $cat_img_id = $row['img_id'];
    $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE status=1 AND id=?");
    $stmt_img->execute([$cat_img_id]);
    $img_data_cat = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
    $img_path = $img_data_cat[0]['path'];
    $img_alt = $img_data_cat[0]['alt'];    
}
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
$ogimagealt = "$name - AUGS";

include('./include/header.php');
?>
    <section class="categoryproductED">
        <div class="categorysection1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 categorysection1_inside1">
                        <img class="mt-5 pt-4" src="admin/<?php echo $img_path ?>"
                            alt="<?php echo $img_alt ?>">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 categorysection1_inside2">
                    <?php echo $content ?>
                    <a class="moreless-button" id="read-more-btn">Read more...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="categorysection2">
            <h2 class="text-center before position-relative">Products</h2>
            <div class="container">
                <div class="row">
                     <?php
                        $stmt = $conn->prepare("SELECT * FROM `product` WHERE status=1 AND cat_id=? ORDER BY id DESC limit 4");
                        $stmt->execute([$catid]);
                        $i=1;
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($data as $data){?>

                            <div class="col-lg-3 col-sm-12 col-md-6 categorybox">
                                <div class="categorybox_inside">
                                    <div class="categorybox_img">        
                                        <div class="owl-carousel owl-theme product-image" id="">
                                            <?php 
                                            $img_id = $data['img_id'];
                                            $sql = "SELECT * FROM `images` WHERE status=1 AND id IN ($img_id)";
                                            $stmt_img = $conn->prepare($sql);
                                            $stmt_img->execute();
                                            $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($img_data as $img_val){ ?>
                                            <div class="item"><img src="admin/<?php echo $img_val['path'] ?>" alt="<?php echo $img_val['alt']  ?>" class="custome_img"></div>
                                            <?php } ?>    
                                        </div>
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
                               <a href="<?php echo $data['slug'] ?>"><button>View</button></a>
                            </div>
                        </div>
                    </div>
                    <?php $i++;} ?>
                    <!--  -->
            </div>
        </div>
        <!-- 3 -->
        <div class="container-fluid">
            <div class="section-2">
                <h2 class="text-center my-4  mb-0 before position-relative m-auto">Related Blogs</h2>
                <div class="home-blog-section py-5 mb-5 mx-5 mb-md-0">
                    <div class="owl-carousel owl-theme" id="categoryproduct-owl-carousel">
                    <?php
                                $stmt = $conn->prepare("SELECT * FROM `post` WHERE cat_id=? ORDER BY id DESC");
                                $stmt->execute([$catid]);
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
                            <a href="<?php echo $data['slug'] ?>">
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