<?php
include('include/header.php');
include('include/sidenav.php');
include('include/config.php');
?>
<?php if (!empty ($_SESSION['admin_is_login'])){ ?>
	<div class="main-content">
		<div class="page-content">
			<div class="container-fluid">
				<div class="row"><!--     start page title -->
					<div class="col-12">
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<div>
								<h4 class="mb-sm-0 font-size-18">Add Product</h4></div>
							<div class="page-title-right">
								<?php
									$stmt_draft = $conn->prepare("SELECT count(*) FROM `product` WHERE status=2");
									$stmt_draft->execute();
									$draft_rows = $stmt_draft->fetchColumn();
									
									$stmt_trash = $conn->prepare("SELECT count(*) FROM `product` WHERE status=0");
									$stmt_trash->execute();
									$trash_rows = $stmt_trash->fetchColumn();
								?>
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="product_draft.php">Draft (<?php echo $draft_rows ?>)</a></li>
									<li class="breadcrumb-item active"><a href="product_trash.php">Trash (<?php echo $trash_rows ?>)</a></li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="category-search mb-3">
						<input type="search" id="product_search_table" placeholder="search..">
						<div class="posz"> <i class="fa-solid fa-magnifying-glass"></i> </div>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="header-btn d-flex justify-content-end   mt-3">
									<button class="btn btn-primary text-white mb-3"><a href="add_product.php" style="color: white;">Add Product<span>  <i class="fas fa-plus"></i></span></a></button>
								</div>
							</div>
							<div id="datatable_wrapper" class="bloglisting dataTables_wrapper dt-bootstrap4 no-footer">
								<div class="row">
									<div class="col-sm-12" style="overflow-y:auto;">
										<table id="datatable" class="table table-bordered">
											<thead>
												<tr role="row">
													<th>Sr No.</th>
													<th>Image</th>
													<th>Category</th>
													<th>Product Name</th>
													<th>Price</th>
													<th>Uploaded_on</th>
													<th>View</th>
													<th>Edit</th>
													<th>Delete</th>
												</tr>
											</thead>
											<tbody>
												<?php
													  	$per_page = 10;
															$stmt = $conn->prepare("SELECT * FROM `product` WHERE status=1 ORDER BY id DESC");
															$stmt->execute();
															$number_of_rows = $stmt->fetchColumn();
															$page = ceil($number_of_rows/$per_page);
															$start=0;	
															$current_page=1;
															if(isset($_GET['start'])){
																$start= $_GET['start'];
																$current_page=$start;	
																$start--;
																$start = $start*$per_page;
															}
																$sql = "SELECT * FROM `product` WHERE status=1 ORDER BY id DESC LIMIT $start,$per_page";
																$stmt = $conn->prepare($sql);
																$stmt->execute();
																$i=1;
																$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
																if (!empty($data)) {
																foreach ($data as $data)
																{
																	if($data['front_img']){
																	$front_id=$data['front_img'];
																	}else{
																	$front_id=1;
																	}
																$stmt1 = $conn->prepare("SELECT * FROM `images` WHERE id=?");
																$stmt1->execute([$front_id]);
																$img_data = $stmt1->fetchAll(PDO::FETCH_ASSOC);?>
														<tr class="odd">
														<td class="sorting_1 dtr-control" tabindex="0">
															<?php echo $i; ?>
														</td>
														<td><img src="<?php echo $img_data[0]['path']; ?>" alt="<?php echo $img_data[0]['alt']; ?>" class="custome_img"></td>
														<td>
														<?php
															 $stmt_cat = $conn->prepare("SELECT * FROM `category` WHERE id=?");
															 $stmt_cat->execute([$data['cat_id']]);
															 $cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
															 if (!empty($cat_data)) {
																$cat_name = $cat_data[0]['name']; 
															}else{
																$cat_name="Not Found";
															 }
															 echo $cat_name;
															 ?>

														</td>
														<td>
															<?php echo $data['name'] ?>
														</td>
														<td>
															<?php echo $data['prc'] ?>
														</td>
														<td>
															<?php echo $data['PostDate'] ?>
														</td>
														<td><a href="http://localhost/augs/<?php echo $data['slug']; ?>" class="btn btn-info"><i class="fa-solid fa-eye"></i></td>
														<td><a href="product_update.php?id=<?php echo $data['id']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></td>                                   
                                  						<td><a class="btn btn-danger" href="javascript:void(0)" onclick="trashProduct(<?php echo $data['id']; ?>)"><i class="fas fa-trash-alt"></i></a></td>
													</tr>
													<?php $i++; } }?>
											</tbody>
										</table>
									</div>
									<p class="pagination_status">Showing 1 to 10 of 10 entries</p>
									<ul class="pagination pagination justify-content-end mt-3">
										<li class="page-item <?php if($current_page <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="category_listing.php?start=<?php echo $current_page-1 ?>" class='button'>Previous</a></li>
										<?php for($j=1; $j<=$page; $j++){
													    $class="";
													    if($current_page == $j){
														  $class = "active";?>
											<li class="page-item <?php echo $class; ?>">
												<a class="page-link" href="category_listing.php?start=<?php echo $j; ?>">
													<?php echo $j ?>
												</a>
											</li>
											<?php } }?>
											<li class="page-item <?php if($current_page >= $page) { echo 'disabled'; } ?>"><a class="page-link" href="category_listing.php?start=<?php echo $current_page+1 ?>" class='button'>NEXT</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
include('include/footer.php');
}else{
    echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
	}
?>