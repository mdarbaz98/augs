<?php  include('admin/include/config.php');
    include ('./include/header.php') ?>


    
    <section class="post__page pt-5 pt-md-0">
      <div
        class="post-banner-section d-flex justify-content-center align-items-center p-md-5"
      >
        <div class="container-fluid">
<<<<<<< HEAD
          <h2 class="text-center position-relative mx-auto my-5">everything you need to know about Sildenafil for PE</h2>
=======
          <?php
          $sql = "SELECT * FROM `post` WHERE status=1 AND id=15";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $i=1;
          $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
          if (!empty($data)) {
          foreach ($data as $data)
          {  $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
             $stmt_img->execute([$data['img_id']]);
             $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
             if (!empty($img_data)) {
              $image = $img_data[0]['path']; 
              $alt = $img_data[0]['alt'];
            }else{
              $image="Not Found";
              $alt="Not Found";
             }
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $content = $data['content'];
            }
          }
          ?>
          <h2 class="before position-relative mx-auto my-5">Paroxetine</h2>
>>>>>>> af21973e769d1fbe7369b1e1a80fa69c410bb86c
          <img
            class="post-banner-img"
            src="admin/<?php echo $image ?>"
            alt="<?php echo $alt ?>"
          />
          <p class="mt-2">Publish : 23-01-2020</p>
        </div>
      </div>
      <div class="post-content-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-12">
              <div class="TBC-container">
                  <div>
                    <div class="accordion mobile-tbc accordion-flush" id="mobile-table-of-content">
                    <div class="accordion-item d-block d-lg-none">
                        <h2 class="accordion-header" id="flush-headingOne">
                          <button class="accordion-button post-sticky-accordion-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Table Of Content
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#mobile-table-of-content">
                          <div class="accordion-body p-md-0 pt-md-3">
                            <ul class="table-of-content list-unstyled mb-md-5" id="table-of-content-for-mobile">
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <h2 class="before position-relative mx-auto my-5 d-none d-lg-block">
                  Table of content
                </h2>
                <ul class="table-of-content list-unstyled mb-md-5 d-none d-lg-block" id="table-of-content">
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <div class="container p-0 overflow-hidden">
                <div class="blog-body">
                    <?php echo $content ?>
                </div>
                <div class="accordion bottom-accordion-section" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                    <h2
                      class="accordion-header accordian-heading"
                      id="panelsStayOpen-headingOne"
                    >
                      <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#post-accordian-1"
                        aria-expanded="true"
                        aria-controls="post-accordian-1"
                      >
                        Accordion Item
                      </button>
                    </h2>
                    <div
                      id="post-accordian-1"
                      class="accordion-collapse collapse show"
                      aria-labelledby="panelsStayOpen-headingOne"
                    >
                      <div class="accordion-body">
                        <p>
                          <span
                            >Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatum provident quo placeat officia
                            veniam in iusto quas dolor animi, suscipit fugit
                            illum modi voluptatibus maxime asperiores. Iusto,
                            dolores eligendi? Esse.</span
                          ><span
                            >Repudiandae architecto, harum iste nemo minus
                            nostrum doloremque? Sit, ipsum corrupti saepe sed
                            est voluptatum nihil repellendus quo nobis nesciunt
                            ipsa laboriosam similique vitae excepturi quos.
                            Repudiandae dolores beatae iste.</span
                          ><span
                            >Optio consequuntur inventore minima, placeat eos
                            reiciendis aspernatur doloribus repellendus
                            deleniti, sint iusto officiis ea, dolorum dolorem
                            earum cum non perferendis. Dolor dolorem magni fugit
                            dolorum, quibusdam quidem nobis nulla.</span
                          >
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2
                      class="accordion-header accordian-heading"
                      id="panelsStayOpen-headingTwo"
                    >
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo"
                      >
                        Accordion Item
                      </button>
                    </h2>
                    <div
                      id="panelsStayOpen-collapseTwo"
                      class="accordion-collapse collapse"
                      aria-labelledby="panelsStayOpen-headingTwo"
                    >
                      <div class="accordion-body">
                        <p>
                          <span
                            >Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatum provident quo placeat officia
                            veniam in iusto quas dolor animi, suscipit fugit
                            illum modi voluptatibus maxime asperiores. Iusto,
                            dolores eligendi? Esse.</span
                          ><span
                            >Repudiandae architecto, harum iste nemo minus
                            nostrum doloremque? Sit, ipsum corrupti saepe sed
                            est voluptatum nihil repellendus quo nobis nesciunt
                            ipsa laboriosam similique vitae excepturi quos.
                            Repudiandae dolores beatae iste.</span
                          ><span
                            >Optio consequuntur inventore minima, placeat eos
                            reiciendis aspernatur doloribus repellendus
                            deleniti, sint iusto officiis ea, dolorum dolorem
                            earum cum non perferendis. Dolor dolorem magni fugit
                            dolorum, quibusdam quidem nobis nulla.</span
                          >
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2
                      class="accordion-header accordian-heading"
                      id="panelsStayOpen-headingThree"
                    >
                      <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree"
                        aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree"
                      >
                        Accordion Item
                      </button>
                    </h2>
                    <div
                      id="panelsStayOpen-collapseThree"
                      class="accordion-collapse collapse"
                      aria-labelledby="panelsStayOpen-headingThree"
                    >
                      <div class="accordion-body">
                        <p>
                          <span
                            >Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Voluptatum provident quo placeat officia
                            veniam in iusto quas dolor animi, suscipit fugit
                            illum modi voluptatibus maxime asperiores. Iusto,
                            dolores eligendi? Esse.</span
                          ><span
                            >Repudiandae architecto, harum iste nemo minus
                            nostrum doloremque? Sit, ipsum corrupti saepe sed
                            est voluptatum nihil repellendus quo nobis nesciunt
                            ipsa laboriosam similique vitae excepturi quos.
                            Repudiandae dolores beatae iste.</span
                          ><span
                            >Optio consequuntur inventore minima, placeat eos
                            reiciendis aspernatur doloribus repellendus
                            deleniti, sint iusto officiis ea, dolorum dolorem
                            earum cum non perferendis. Dolor dolorem magni fugit
                            dolorum, quibusdam quidem nobis nulla.</span
                          >
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-12">r</div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="section-2">
          <h2 class="text-center my-4 mb-0 before position-relative m-auto">
            Related Blogs
          </h2>
          <div class="home-blog-section py-5 p-md-5 mb-5 mb-md-4">
            <div class="owl-carousel owl-theme" id="post-owl-carousel">
              <div class="blog-card">
                <a href="">
                  <div class="blog-card-img-div">
                    <img
                      src="https://images.assetsdelivery.com/compings_v2/luismolinero/luismolinero1909/luismolinero190917934.jpg"
                      alt="blog-image"
                    />
                  </div>
                  <div class="blog-desc-sec pb-3 px-3 px-md-5">
                    <h1 class="my-2">Know about levitra</h1>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Facere, at?
                    </p>
                    <button class="sq-btn">READ MORE</button>
                  </div>
                </a>
              </div>
              <div class="blog-card">
                <a href="">
                  <div class="blog-card-img-div">
                    <img
                      src="https://images.assetsdelivery.com/compings_v2/luismolinero/luismolinero1909/luismolinero190917934.jpg"
                      alt="blog-image"
                    />
                  </div>
                  <div class="blog-desc-sec pb-3 px-3 px-md-5">
                    <h1 class="my-2">Know about levitra</h1>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Facere, at?
                    </p>
                    <button class="sq-btn">READ MORE</button>
                  </div>
                </a>
              </div>
              <div class="blog-card">
                <a href="">
                  <div class="blog-card-img-div">
                    <img
                      src="https://images.assetsdelivery.com/compings_v2/luismolinero/luismolinero1909/luismolinero190917934.jpg"
                      alt="blog-image"
                    />
                  </div>
                  <div class="blog-desc-sec pb-3 px-3 px-md-5">
                    <h1 class="my-2">Know about levitra</h1>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Facere, at? em, ipsum dolor sit amet consectetur
                      adipisicing elit. Facere, at em, ipsum dolor sit amet
                      consectetur adipisicing elit. Facere, at
                    </p>
                    <button class="sq-btn">READ MORE</button>
                  </div>
                </a>
              </div>
              <div class="blog-card">
                <a href="">
                  <div class="blog-card-img-div">
                    <img
                      src="https://images.assetsdelivery.com/compings_v2/luismolinero/luismolinero1909/luismolinero190917934.jpg"
                      alt="blog-image"
                    />
                  </div>
                  <div class="blog-desc-sec pb-3 px-3 px-md-5">
                    <h1 class="my-2">Know about levitra</h1>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Facere, at?
                    </p>
                    <button class="sq-btn">READ MORE</button>
                  </div>
                </a>
              </div>
              <div class="blog-card">
                <a href="">
                  <div class="blog-card-img-div">
                    <img
                      src="https://images.assetsdelivery.com/compings_v2/luismolinero/luismolinero1909/luismolinero190917934.jpg"
                      alt="blog-image"
                    />
                  </div>
                  <div class="blog-desc-sec pb-3 px-3 px-md-5">
                    <h1 class="my-2">Know about levitra</h1>
                    <p>
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Facere, at?
                    </p>
                    <button class="sq-btn">READ MORE</button>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
    <?php include ('./include/footer.php') ?>
