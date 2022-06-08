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
						<div class="page-title-box d-sm-flex align-items-center justify-content-between">
							<div>
								<h4 class="mb-sm-0 font-size-18">Add CTA</h4></div>
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);">Draft</a></li>
									<li class="breadcrumb-item active">Trash</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="category-search mb-3">
						<input type="search" id="category-search-input" placeholder="serach..">
						<div class="posz"> <i class="fa-solid fa-magnifying-glass"></i> </div>
					</div>
				</div>
				<!-- end page title -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row"><!-- start add  cta btn -->
									<div class="header-btn d-flex justify-content-end   mt-3">
										<button class="btn btn-primary text-white mb-3"><a href="add_cta.php" style="color: white;">Add CTA<span>  <i class="fas fa-plus"></i></span></a></button>
									</div>
								</div><!--end  add cta btn -->	
								<div id="datatable_wrapper" class="bloglisting dataTables_wrapper dt-bootstrap4 no-footer">
									<div class="row">
										<div class="col-sm-12" style="overflow-y:auto;">
											<table id="datatable" class="table table-bordered">
												<thead>
													<tr role="row">
														<th>Sr No.</th>
														<th>Image</th>
														<th>Title</th>
														<th>Short Details</th>
														<th>Category</th>
														<th>Product Url</th>
														<th>View</th>
														<th>Edit</th>
														<th>Delete</th>
													</tr>
												</thead>
												<tbody>
													<?php
															$per_page = 10;
																$stmt = $conn->prepare("SELECT * FROM `cta` ORDER BY id DESC");
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
																$sql = "SELECT * FROM `cta` ORDER BY id DESC LIMIT $start,$per_page";
																$stmt = $conn->prepare($sql);
																$stmt->execute();
																$i=1;
																$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
																if (!empty($data)) {
																foreach ($data as $data)
																{  $stmt1 = $conn->prepare("SELECT * FROM `images` WHERE id=?");
																$stmt1->execute([$data['img_id']]);
																$img_data = $stmt1->fetchAll(PDO::FETCH_ASSOC);
													?>
														<tr class="odd">
															<td class="sorting_1 dtr-control" tabindex="0">
																<?php echo $i; ?>
															</td>
															<td><img src="<?php echo $img_data[0]['path']; ?>" alt="<?php echo $img_data[0]['alt']; ?>" class="custome_img"></td>
															<td>
																<?php echo $data['title'] ?>
															</td>
															<td>
																<?php echo $data['short_detail'] ?>
															</td>
															<td>
																<?php echo $data['cat'] ?>
															</td>
															<td>
																<?php echo $data['url'] ?>
															</td>
															<td><a href="cta_update.php?id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i></td>
																<td><a href="cta_update.php?id=<?php echo $data['id']; ?>" class="btn btn-success"><i class="fas fa-edit"></i></td>                                   
															<td><a class="btn btn-danger" href="javascript:void(0)" onclick="deleteCta(<?php echo $data['id']; ?>)"><i class="fas fa-trash-alt"></i></a></td>
														</tr>
														<?php $i++; } }?>
												</tbody>
											</table>
										</div>
										<p class="pagination_status">Showing 1 to 10 of 10 entries</p>
										<ul class="pagination pagination justify-content-end mt-3">
											<li class="page-item <?php if($current_page <= 1){ echo 'disabled'; } ?>"><a class="page-link" href="category_listing.php?start=<?php echo $current_page-1 ?>" class='button'>Previous</a></li>
											<?php 
												for($j=1; $j<=$page; $j++){
													$class="";
													if($current_page == $j){
													$class = "active";
											?>
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
							</div><!-- end card body -->
						</div><!-- end card -->
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container-fluid -->
		</div><!--end page-content -->
	</div><!--end main-content -->
	<?php
include('include/footer.php');
					}else{
				echo "<script>window.location='http://localhost/augs/admin/index.php'</script>";
	}
?>