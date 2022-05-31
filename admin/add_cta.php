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
				<form id="cta_form">
					<div class="row">
						<div class="card">
							<!-- <div class="header">
								<h4 class="card-title mb-4">Features</h4> </div> -->
							<div class="card-body">
								<div class="d-flex  my-4">
									<div class="form-group mx-3  w-100">
										<label for="Title" class="form-label"> Title</label>
										<input type="text" class="form-control " id="title" name="title" placeholder="Title"> </div>
									<div class="form-group  w-100">
										<label for="horizontal-firstname-input">Short Details</label>
										<input type="text" class="form-control" id="shrt_dtl" name="shrt_dtl" placeholder="Short Details"> </div>
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
										<input type="text" class="form-control" id="field" name="field" placeholder="https://abc.com"> </div>
								</div>
								<!-- Drop Box -->
								<div class="d-flex justify-content-center rounded">
								<div class="blog-img-box  w-50 mx-3 rounded" data-toggle="modal" data-target="#exampleModal">
								 <img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png" alt="feature click image">
									<h5>Set Feature Image</h5> </div>
								
							 </div>
							 <input type="hidden" class="image_id" name="img_id" />
								<div class="customefeature_image w-75  ml-5"> <img src="" alt="" class="image_path">
							 </div>
								<!-- Drop Box -->
								<div class="submit-btns clearfix d-flex">           
               		 <input type="hidden" name="btn" value="addCta">
                		<input type="submit" class="post-btn float-left" name="blog_publish" value="Publish">
               		 <!-- <button class="discard-btn" type="submit"> <i class="fa fa-trash" aria-hidden="true"></i>Discard</button> -->
               		 </div>
							</div>
						</div>
					</div>
					<!-- end card body -->
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
    echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";    }
 ?>