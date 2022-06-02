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
									<h4 class="mb-sm-0 font-size-18">Add Product</h4> </div>
								<div class="page-title-right">
									<!-- <ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
										<li class="breadcrumb-item active">Add Product</li>
									</ol> -->
								</div>
							</div>
						</div>
					</div>
					<!-- end page title -->
					<form id="product_form">
						<div class="row">
							<div class="col-xl-8">
								<div class="card">
									<div class="card-body">
									<h4 class="card-title mb-4">Content</h4>
										<div class="form-group long    w-100">
												<textarea id="pro_desc" name="pro_desc" class="form-control" rows="40" placeholder="Type here..."></textarea>
										</div>
										<div class="form-group short mt-1  w-100">
												<label for="horizontal-firstname-input">Product Description</label>
												<textarea id="shrt_desc" name="shrt_desc" class="form-control" rows="40" placeholder="Type here..."></textarea>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="card">
									<div class="card-body">
										<div class="border-bottom">
											<h4 class="card-title mb-4">Features</h4> 
										</div>
										<div class=" mt-1  w-100">
												<label for="Title" class="form-label"> Product Name</label>
												<input type="text" class="form-control " id="pro_name" name="pro_name" placeholder="Enter Name">
										</div>
										<div class=" mt-1 w-100">
													<label for="horizontal-firstname-input">Product Slug</label>
													<input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug"> 
										</div>	

										
										<div class=" w-100 ">
													<label for="horizontal-firstname-input" class="col-form-label">Strength</label>
													<input type="text" class="form-control" id="strn" name="strn" placeholder="SEO Title">
										</div>	
										<div class="w-100">
														<label for="horizontal-firstname-input" class="col-form-label">Price</label>
														<input type="text" class="form-control" id="prc" name="prc" placeholder="SEO Title">
										</div>	
										<div class=" w-100">
													<label for="horizontal-firstname-input" class="col-form-label">Link</label>
													<input type="text" class="form-control" id="link" name="link" placeholder="SEO Title"> 
										</div>
										<div class=" mt-1">
											<div class=" w-100">
														<label class="form-label"> Select Category </label>
														<?php $stmt = $conn->prepare("SELECT * FROM `category` WHERE status=?");
                                 							$stmt->execute([1]);
                                 							$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                 						?>
													<select class="form-control sel_cat" id="category" name="category" title="Please select Category">
													<option value="">Pick a Category... </option>
																<?php foreach ($data as $data) {
                                   								 ?>
													<option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
													<?php } ?>
													</select>
											</div>
										</div>
										<div class="blog-img-box  w-100 " data-toggle="modal" data-target="#exampleModal"> 
											<img src="https://spruko.com/demo/sash/sash/assets/plugins/fancyuploder/fancy_upload.png" alt="feature click image">
											<h5>Set Feature Image</h5> 
										</div>
											<input type="hidden" class="image_id" name="img_id" />
										<div class=" float-right">
											<div class="customefeature_image"> <img src="" alt="" class="image_path"> 
											</div>
										</div>
										<div class="float-left saveDraft">
										<p class="text-center">Save To Draft</p>
										</div>
										<div class="">
										<label class="switch">
											<input type="checkbox" name="draft" id="draft" value="2"> <span class="slider round"></span> </label>
										</div>
										<div class=" w-100  showDate" style="display:none;">
											<input type="text" name="PostDate" class="form-control d-block mt-2 " value="Set Upload Date" id="datetimepicker" /> 
										</div>
									<div class="submit-btns mt-1 clearfix d-flex">
										<input type="hidden" name="btn" value="addProduct">
										<input type="submit" class="product-btn float-left ml-4" name="blog_publish" value="Publish">
									</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- container-fluid -->
		</div>
		<!-- End Page-content -->
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