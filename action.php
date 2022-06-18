<?php
date_default_timezone_set('Asia/Kolkata');
include('admin/include/config.php');
if($_POST['btn']=='addEnquiry'){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $desc = $_POST['msg'];
  $PostDate = date("Y-m-d H:i");
  $stmt = $conn->prepare("INSERT INTO enquiry(name, email, contact, msg , date, status) VALUES(?,?,?,?,?,?)");
  if($stmt->execute([$name, $email, $contact,  $desc, $PostDate, 1])){
    echo "inserted";
  }
}

if($_POST['btn']=='post_id')
    {
      $post_id = $_POST['post_id'];
      $cat_id = $_POST['cat_id'];
      $sql = "SELECT * FROM `post` WHERE cat_id=$cat_id AND id>=$post_id LIMIT 3";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $post_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $data="";
      foreach ($post_data as $post_data_val){
            $post_id = $post_data_val['id'];
            //echo $post_id = $data_post['id'];
            $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
            $stmt_img->execute([$post_data_val['img_id']]);
            $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($img_data))
            {
              $image = $img_data[0]['path']; 
              $alt = $img_data[0]['alt'];
              }else{
              $image="Not Found";
              $alt="Not Found";
              }								 
              $stmt_cat = $conn->prepare("SELECT * FROM `category` WHERE id=?");
              $stmt_cat->execute([$post_data_val['cat_id']]);
              $cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
              if (!empty($cat_data)) {
              $cat_name = $cat_data[0]['name']; 
              }else{
              $cat_name="Not Found";
              }
           
$data.="
<div class='col-sm-12 col-md-6 col-lg-6 blog-section-inside1'>
<div class='blog-section_img'><img src='admin/".$image."' alt='".$alt."' class='custome_img'></div>
</div>

<div class='col-sm-12 col-md-6 col-lg-6 blog-section-inside2'> <span class='span1'>".$cat_name."</span>
<h1>".$post_data_val['title']."</h1> <span class='span2'>Published ".$post_data_val['uploaded_on']."</span>
<p>".$post_data_val['description']."</p>
<a href='".$post_data_val['slug']."'><button>Read more</button></a>
</div>";
} 
  // $data.="<div class='outerline'>
  // <button onclick='viewMoreblog(".$post_id.")'>View More</button>
  // </div>
  // </div>";
  $arr_data = array('datahtml' => $data, 'last_id' => $post_id);
  sleep(0.5);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($arr_data);
}

if($_POST['btn']=='pro_id')
{ 
  $pro_id = $_POST['pro_id'];
  $cat_id = $_POST['cat_id'];
  $data="";
  $sql ="SELECT * FROM `product` WHERE cat_id=$cat_id AND id>=$pro_id limit 4";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $i=1;
  foreach ($data1 as $data_pro)
  {	
    $pro_id = $data_pro['id'];
    $stmt_img = $conn->prepare("SELECT * FROM `images` WHERE id=?");
    $stmt_img->execute([$data_pro['img_id']]);
    $img_data = $stmt_img->fetchAll(PDO::FETCH_ASSOC);
      if (!empty($img_data)) {
      $image = $img_data[0]['path']; 
      $alt = $img_data[0]['alt'];
      }else{
        $image="Not Found";
        $alt="Not Found";
      }
      $stmt_cat = $conn->prepare("SELECT * FROM `category` WHERE id=?");
      $stmt_cat->execute([$data_pro['cat_id']]);
      $cat_data = $stmt_cat->fetchAll(PDO::FETCH_ASSOC);
      if (!empty($cat_data)) {
      $cat_name = $cat_data[0]['name']; 
      }else{
      $cat_name="Not Found";
      }				 

      $data.="<div class='col-lg-3 col-sm-12 col-md-6 categorybox'>
            <div class='categorybox_inside'>
              
              <div class='categorybox_img'>
                <img src='$image' alt='".$alt."' class='custome_img'>
              </div>

              <div class='categorydetail_content'>
              <span class='badge badge-primary'>".$cat_name."</span>
                <h2>".$data_pro['name']."</h2>
                <div class='cd_span'>".$data_pro['shrt_desc']."</div>
              </div>

              <div class='cd_button pt-2'>
                <p><span>$".$data_pro['prc']."</span></p>
                <button>View</button>
              </div>

            </div>
          </div>";
          ++$i;
  } 

  $arr_data = array('datahtml' => $data, 'last_id' => $pro_id);
  sleep(0.5);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($arr_data);
}

?>