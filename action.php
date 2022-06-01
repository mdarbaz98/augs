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
?>