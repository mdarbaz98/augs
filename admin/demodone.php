<?php 
  include('include/config.php');
  $getimgid = $conn->prepare('SELECT * FROM product WHERE id = 17');
  $getimgid->execute();
  while($row=$getimgid->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['img_id'];
  }
  $imgid = 22;
  $id = $id.','.$imgid;
  $getimgid = $conn->prepare('UPDATE product SET img_id = ? WHERE id = 17');
  $getimgid->execute([$id]);