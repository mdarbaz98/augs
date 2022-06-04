<?php include('./include/header.php') ?>
<?php include('admin/include/config.php')?>
        <section class="search_section">
            <div class="container">
                <div class="search_heading m-auto text-center">
                <h1>Search:D</h1>
                </div>
            </div>
            <div class="search_box_section">
            <div class="container-fluid box_fluid">
            <div class="row">
            <?php
          $stmt = $conn->prepare("SELECT * FROM `post` WHERE status=1 ORDER BY  id DESC limit 8");
          $stmt->execute();
          $i=1;
          $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
          if (!empty($data)) {
          foreach ($data as $data)
          {  $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
             $stmt_img->execute([$data['img_id']]);
             $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
             
            
            
          ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                    <a href="">
                        <div class="search_box">
                            <span class="ribbon"><?php echo $data['title'] ?></span>
                    <div class="seach_img">
                        <!-- <img src="https://pasimage.gumlet.io/assets/upload/Trazodone-control-center.jpg?w=300&dpr=1.0" alt=""> -->
                        <img src="<?php echo $img_data[0]['path']; ?>" alt="<?php echo $img_data[0]['alt']; ?>" class="custome_img">
                    </div>
                    <div class="search_content">
                        <h2><?php echo $data['seo_title'] ?></h2>
                        <p><?php echo $data['description'] ?></p>
                    </div>
                    <div class="search_date">
                        <p><span><i class="fa-solid fa-calendar-days"></i></span> <?php echo $data['uploade_date'] ?></p>
                    </div>
                    </div>
                    </a>
                </div>
                <?php $i++;} }?>
            </div>
        </div>
        <!-- <div class="container-fluid box_fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <div class="search_box">
                            <span class="ribbon">Health psychology</span>
                    <div class="seach_img">
                        <img src="https://pasimage.gumlet.io/assets/upload/Trazodone-control-center.jpg?w=300&dpr=1.0" alt="">
                    </div>
                    <div class="search_content">
                        <h2>Is Trazodone a controlled substance?</h2>
                        <p>Trazodone is not a controlled substance nor a narcotic. Before consuming Trazodone, you should be cautious with its addictiveness.</p>
                    </div>
                    <div class="search_date">
                        <p><span><i class="fa-solid fa-calendar-days"></i></span> 23 May 2022</p>
                    </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <div class="search_box">
                            <span class="ribbon">Health psychology</span>
                    <div class="seach_img">
                        <img src="https://pasimage.gumlet.io/assets/upload/Trazodone-control-center.jpg?w=300&dpr=1.0" alt="">
                    </div>
                    <div class="search_content">
                        <h2>Is Trazodone a controlled substance?</h2>
                        <p>Trazodone is not a controlled substance nor a narcotic. Before consuming Trazodone, you should be cautious with its addictiveness.</p>
                    </div>
                    <div class="search_date">
                        <p><span><i class="fa-solid fa-calendar-days"></i></span> 23 May 2022</p>
                    </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <div class="search_box">
                            <span class="ribbon">Health psychology</span>
                    <div class="seach_img">
                        <img src="https://pasimage.gumlet.io/assets/upload/Trazodone-control-center.jpg?w=300&dpr=1.0" alt="">
                    </div>
                    <div class="search_content">
                        <h2>Is Trazodone a controlled substance?</h2>
                        <p>Trazodone is not a controlled substance nor a narcotic. Before consuming Trazodone, you should be cautious with its addictiveness.</p>
                    </div>
                    <div class="search_date">
                        <p><span><i class="fa-solid fa-calendar-days"></i></span> 23 May 2022</p>
                    </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="">
                        <div class="search_box">
                            <span class="ribbon">Health psychology</span>
                    <div class="seach_img">
                        <img src="https://pasimage.gumlet.io/assets/upload/Trazodone-control-center.jpg?w=300&dpr=1.0" alt="">
                    </div>
                    <div class="search_content">
                        <h2>Is Trazodone a controlled substance?</h2>
                        <p>Trazodone is not a controlled substance nor a narcotic. Before consuming Trazodone, you should be cautious with its addictiveness.</p>
                    </div>
                    <div class="search_date">
                        <p><span><i class="fa-solid fa-calendar-days"></i></span> 23 May 2022</p>
                    </div>
                    </div>
                    </a>
                </div>
            </div>
        </div> -->
            </div>
        
        
        </section>
        <?php include('./include/footer.php') ?>