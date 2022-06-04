<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid product_page">
				<!--     start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<div>
								<h4 class="mb-sm-0 font-size-18">Add CTA</h4></div>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
									<li class="breadcrumb-item active">Add Product</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<!-- end page title -->
				<form id="updateCta">
                <?php 
                $stmt= $conn->prepare("SELECT * FROM `cta` WHERE id=?");                               
                $stmt->execute([$_GET['id']]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row)
                { ?>  
					<div class="row">
						<div class="card">
							<!-- <div class="header">
								<h4 class="card-title mb-4">Features</h4> </div> -->
							<div class="card-body">
								<div class="d-flex  my-4">
									<div class="form-group mx-3  w-100">
										<label for="Title" class="form-label"> Title</label>
										<input type="text" class="form-control " id="title" name="title" value="<?php echo $row['title'] ?>"> </div>
									<div class="form-group  w-100">
										<label for="horizontal-firstname-input">Short Details</label>
										<input type="text" class="form-control" id="shrt_dtl" name="shrt_dtl" value="<?php echo $row['short_detail'] ?>"> </div>
								</div>
								<div class=" d-flex my-4 mx-2">
							

       <div class="form-group my-2 mx-2  w-100">
        <label class="form-label"> Select Category </label>
        <?php $stmt = $conn->prepare("SELECT * FROM `category` WHERE status=?");
            $stmt->execute([1]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
		<select class="form-control sel_cat" id="category" name="category" title="Please select Category">
            <option value="">Pick a Category... </option>
            <?php foreach ($data as $data) {
            ?> <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
            <?php } ?>
            </select>
        </div>

                
    
									<div class="form-group ml-2  w-100">
										<label for="horizontal-firstname-input" class="col-form-label">Add Prouct Page Url</label>
										<input type="text" class="form-control" id="url" name="url" value="<?php echo $row['url'] ?>" > </div>
								</div>
								<?php
                      $stmt1 = $conn->prepare("SELECT * FROM `images` WHERE id=?");
                      $stmt1->execute([$row['img_id']]);
                      $img_data = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                      if(!empty($img_data)){
                      $image = $img_data[0]['path'];
                      $alt = $img_data[0]['alt'];

                    }else{
                        $image = "https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png";
                        $alt="feature click image";
                        }

                      ?>
                <div class="blog-img-box" data-toggle="modal" data-target="#exampleModal">  
                <img src="<?php echo $image ?>"alt="<?php echo $alt ?>" class="image_path">
                 </div>
                 <input type="hidden" class="image_id" name="img_id" value="<?php echo $row['img_id'] ?>"/>  
				 <div class=" d-flex justify-content-center"><button type="button" class="btn btn-danger float-center my-3"  onclick="removeFeatureimage(<?php echo $row['id'] ?>)">Remove Image</button> </div>
                 <div class="customefeature_image">
                 <!-- <img src="" alt="" class="image_path"> -->
                 </div>
								<!-- Drop Box -->
								<div class="submit-btns clearfix d-flex">      
                                <input type="hidden" name="cta_id" value="<?php echo $row['id'] ?>">     
               		 <input type="hidden" name="btn" value="updateCta">
                		<input type="submit" class="post-btn float-left" name="blog_publish" value="Publish">
               		 <!-- <button class="discard-btn" type="submit"> <i class="fa fa-trash" aria-hidden="true"></i>Discard</button> -->
               		 </div>
							</div>
						</div>
					</div>
					<!-- end card body -->
                    <?php } ?>
				</form>
			</div>
			<!-- end card -->
		</div>
		<!-- end col -->
	</div>
	<!-- end row -->
	</div>
	<!-- container-fluid -->
	</div>
	<!-- End Page-content -->
	<script>
		///cta form

	</script>
	<script>
	function blog_img_pathUrl(input) {
		$('#blog-img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
	}
	</script>
	<?php
    include('include/footer.php');
}else{
    echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
	}
 ?>