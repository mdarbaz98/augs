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
								<h4 class="mb-sm-0 font-size-18">Add Product</h4></div>
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
				<form id="updateProduct">
						<?php 
						$stmt= $conn->prepare("SELECT * FROM `product` WHERE id=?");                               
						$stmt->execute([$_GET['id']]);
						$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $row)
						{ ?>  
						<div class="row">
							<div class="col-xl-8">
								<div class="card">
									<div class="card-body">
									<h4 class="card-title mb-4">Content</h4>
										<div class="form-group    w-100">
											<textarea id="content" name="content" class="form-control" rows="40"><?php echo $row['content'] ?></textarea>
										</div>
										<div class="form-group short mt-2  w-100">
												<label for="horizontal-firstname-input">Product Description</label>
												<textarea id="shrt_desc" name="shrt_desc" class="form-control" rows="40" ><?php echo $row['shrt_desc'] ?></textarea>
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
											<input type="text" class="form-control " id="pro_name" name="pro_name" value="<?php echo $row['name'] ?>" >
										</div>
										<div class=" mt-1 w-100">
											<label for="horizontal-firstname-input">Product Slug</label>
											<input type="text" class="form-control" id="slug" name="slug" value="<?php echo $row['slug'] ?>" > 
										</div>	
										<div class=" w-100 ">
													<label for="horizontal-firstname-input" class="col-form-label">Title</label>
													<input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'] ?>">
										</div>	
										<div class=" w-100 ">
													<label for="horizontal-firstname-input" class="col-form-label">Seo Title</label>
													<input type="text" class="form-control" id="seo_title" name="seo_title" value="<?php echo $row['seo_title'] ?>">
										</div>	
										<div class=" w-100 ">
											<label for="horizontal-firstname-input" class="col-form-label">Strength</label>
											<input type="text" class="form-control" id="strn" name="strn" value="<?php echo $row['strnt'] ?>" >
										</div>	
										<div class="w-100">
											<label for="horizontal-firstname-input" class="col-form-label">Price</label>
											<input type="text" class="form-control" id="prc" name="prc" value="<?php echo $row['prc'] ?>" > 
										</div>	
										<div class=" w-100">
											<label for="horizontal-firstname-input" class="col-form-label">Link</label>
											<input type="text" class="form-control" id="link" name="link"  value="<?php echo $row['link'] ?>"> 
										</div>
										<div class=" mt-1">
										<div class="form-group w-100">
												<label class="form-label"> Select Category </label>
												<?php 	$stmt = $conn->prepare("SELECT * FROM `category` WHERE status=?");
														$stmt->execute([1]);
														$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
													?>
													<select class="form-control sel_cat" id="category" name="category" title="Please select Category">
														<option value="">Pick a Category... </option>
														<?php foreach ($data as $data) {
            											?> 
														<option value="<?php echo $data['id']; ?>" <?php if ($data['id'] == $row['cat_id']) echo ' selected="selected"'; ?> ><?php echo $data['name']; ?></option>
           											 <?php } ?>
													</select>
										</div>
										<div class=" w-100 ">
													<textarea class="form-control"  id="description" name="description"  rows="3"><?php echo $data['description']  ?></textarea>
										</div>
										<!-- Upload Image -->
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
										<div class="blog-img-box  w-100 " data-toggle="modal" data-target="#exampleModal"> 
											<img src="<?php echo $image ?>"alt="<?php echo $alt ?>" class="image_path"></div>
											<input type="hidden" class="image_id" name="img_id" value="<?php echo $row['img_id'] ?>"/>  
											<h5>Set Feature Image</h5> 
										</div>
										<div class=" d-flex justify-content-center"><button type="button" class="btn btn-danger float-center my-3">Remove Image</button> </div>
										<div class=" float-right">
											<div class="customefeature_image"> <img src="" alt="" class="image_path"> 
											</div>
										</div>
										<!-- save to darft -->
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
										<!-- button -->
										<div class="submit-btns mt-1 clearfix d-flex">
											<input type="hidden" name="product_id" value="<?php echo $row['id'] ?>">        
											<input type="hidden" name="btn" value="updateProduct">
											<input type="submit" class="post-btn float-left" name="blog_publish" value="Publish">
										</div>
							</div>
						</div>
					  <?php  } ?>
					</form>
	</div>
	<!-- end row -->
	</div>
	<!-- container-fluid -->
	</div>
	<!-- End Page-content -->

	<?php
    include('include/footer.php');
}else{
    echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
	}
 ?>