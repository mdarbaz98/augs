<?php include('./include/header.php') ?>
    <section class="product__page pt-5">
      <div class="top-section py-md-5 pt-5 pb-2">
        <div class="container">
          <div class="product-section">
            <div class="container-fluid shadow p-md-0 overflow-hidden">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="product-img">
                    <img
                      src="https://images.unsplash.com/photo-1620987278429-ab178d6eb547?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDF8fHByb2R1Y3R8ZW58MHx8MHx8&w=1000&q=80"
                      alt="product image"
                    />
                    <button>Buy Now</button>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="product-desc p-4 ps-0">
                    <h1>Premature Ejaculation</h1>
                    <div class="d-flex gap-4 py-md-3 py-3">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star-half"></i>
                    </div>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Magni voluptatibus cum illo, vero, dolorem, dignissimos
                      maxime eum dolor libero ullam esse totam earum quisquam
                      tempore atque sapiente. Beatae, at nihil.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-section pt-5 pb-4">
        <h2 class="before position-relative mx-auto">Products Content</h2>
        <div class="container pt-5 pb-2">
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseOne"
                  aria-expanded="true"
                  aria-controls="panelsStayOpen-collapseOne"
                >
                  What is PEs
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseOne"
                class="accordion-collapse collapse show"
                aria-labelledby="panelsStayOpen-headingOne"
              >
                <div class="accordion-body">
                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, rerum cum reiciendis fugiat officiis, suscipit ducimus minima illo omnis, accusamus fuga? Delectus laborum, distinctio, fuga laboriosam tenetur, soluta eveniet voluptate quis dolore atque vel temporibus? Sint perferendis accusantium a, reiciendis quos voluptas recusandae assumenda odio ex facere neque et repudiandae nisi autem sed id. Sapiente in, aliquid id beatae deleniti officiis possimus molestiae eveniet fugit perferendis quibusdam illo recusandae quia aperiam consequatur vel incidunt ex vero facilis nobis quas quaerat. Aspernatur quaerat, esse cum atque id quae asperiores deleniti itaque?</p>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseTwo"
                  aria-expanded="false"
                  aria-controls="panelsStayOpen-collapseTwo"
                >
                  FAQ's
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseTwo"
                class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingTwo"
              >
                <div class="accordion-body">
                  <strong>This is the second item's accordion body.</strong> It
                  is hidden by default, until the collapse plugin adds the
                  appropriate classes that we use to style each element. These
                  classes control the overall appearance, as well as the showing
                  and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also
                  worth noting that just about any HTML can go within the
                  <code>.accordion-body</code>, though the transition does limit
                  overflow.
                </div>
              </div>
            </div>
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button
                  class="accordion-button collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#panelsStayOpen-collapseThree"
                  aria-expanded="false"
                  aria-controls="panelsStayOpen-collapseThree"
                >
                  Conclusion
                </button>
              </h2>
              <div
                id="panelsStayOpen-collapseThree"
                class="accordion-collapse collapse"
                aria-labelledby="panelsStayOpen-headingThree"
              >
                <div class="accordion-body">
                  <strong>This is the third item's accordion body.</strong> It
                  is hidden by default, until the collapse plugin adds the
                  appropriate classes that we use to style each element. These
                  classes control the overall appearance, as well as the showing
                  and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also
                  worth noting that just about any HTML can go within the
                  <code>.accordion-body</code>, though the transition does limit
                  overflow.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="section-2">
            <h2 class="text-center my-4 mb-0 before position-relative m-auto">Recent Blogs</h2>
            <div class="home-blog-section py-5 px-4 p-md-5 mb-5 mb-md-0">
              <div class="owl-carousel owl-theme" id="product-owl-carousel">
              <?php
                            $stmt = $conn->prepare("SELECT * FROM `post`where `cat_id`= 4 ORDER BY id DESC limit 6");
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
                <div class="blog-card">
                  <a href="">
                    <div class="blog-card-img-div"> <img src="admin/<?php echo $image ?>" alt="<?php echo $alt  ?>" class="custome_img">  </div>
                  <div class="blog-desc-sec px-3 pb-3">
                    <h1 class="my-2"><?php echo $data['title'] ?> </h1>
                    <p><?php echo $data['description'] ?></p>
                    <button class="sq-btn">READ MORE</button>
                  </div> 
                  </a>
                </div>

                <?php $i++;} ?>
              </div>
            </div>
          </div>
      </div>
    </section>
    <?php include('./include/footer.php') ?>