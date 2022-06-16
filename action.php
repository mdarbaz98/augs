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
      $sql = "SELECT * FROM `post` WHERE id>=$post_id LIMIT 6";
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
?>