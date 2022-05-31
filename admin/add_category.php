<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<!--     start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between mx-4">
							<h4 class="mb-sm-0 font-size-18">Add Category</h4>
							<div class="page-title-right">
							</div>
						</div>
					</div>
				</div>
				<!-- end page title -->

 <form id="addCategory">           
    <div class="row">
    <div class="col-xl-8">
    <div class="card">
    <div class="card-body">
      <h4 class="card-title mb-4">Content</h4>        
                <div class="form-group  mx-2" style="position: relative;">
                <textarea id="content" name="content" class="form-control" rows="50" placeholder="Type here..."></textarea>
                <div style="position: absolute;top: 3px;right: 307px;z-index:1;">
                <div class="btn upload-btn content_upload" data-toggle="modal" data-target="#exampleModalContent">Image <i class="fa-solid fa-arrow-up-from-bracket"></i></div>            
                </div>
              </div>
                
    </div><!-- end card body -->
    </div> <!-- end card -->
    </div> <!-- end col -->


    <div class="col-xl-4">
       <div class="card">
        <div class="card-body" id="accordion">
        <div class="header">
         <h4 class="card-title mb-4">Features</h4>
         </div>
                <div class="form-group">
                <label for="Title" class="form-label">Name</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Enter Name">
                </div>    
                <div class="form-group">                          
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Title</label>
                <input type="text" class="form-control" id="title" name ="title" placeholder="SEO Title">
                </div>
                
                <div class="form-group">
                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Slug</label> <br>
                <input type="text" class="form-control" id="slug" name ="slug" placeholder="Enter Slug">
                </div> 
                <!-- <div class="form-group">
                <label for="focus Keywaord" class="sub-heading-title">Image</label>
                <input type="text" class="form-control" placeholder="Enter" id="focus_keyword" name="focus_keyword">
                </div> -->                
                <div class="form-group mt-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="3" id="desc" name="desc" placeholder="Enter Description"></textarea>
                </div>

                <div class="blog-img-box" data-toggle="modal" data-target="#exampleModal">
                <img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png"alt="feature click image">
                <h5>Set Feature Image</h5>
                </div>
                 <input type="hidden" class="image_id" name="img_id"/>  
                 <div class="customefeature_image">
                 <img src="" alt="" class="image_path">
                 </div>
                
                
      <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

                <div class="submit-btns clearfix d-flex">           
                <input type="hidden" name="btn" value="addCategory">
                <input type="submit" class="post-btn float-left" name="blog_publish" value="Publish">
                <!-- <button class="discard-btn" type="submit"> <i class="fa fa-trash" aria-hidden="true"></i>Discard</button> -->
                </div>


        </div>
    </div>
  </div>
      
   <!-- row  -->
  </div>
</form>



						<!-- end card -->
			</div>
					<!-- end col -->
        </div>
				<!-- end card body -->
	</div>
<?php
    include('include/footer.php');
  }else{
    echo "<script>window.location='http://localhost/admin/index.php'</script>";
    }
 ?>