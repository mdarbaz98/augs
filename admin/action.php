<?php include('include/config.php');
date_default_timezone_set('Asia/Kolkata');
session_start();
if($_POST['btn']=='loginUser'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE username=? AND password=?");
    $stmt->execute([$username, $password]);
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $id= $user_data[0]['id'];
    $userCount=$stmt->rowCount();
    if($userCount > 0){
        echo "login";
        $_SESSION['admin_is_login'] = $username;
        $_SESSION['admin_is_login_id'] = $id;
    }
  }
if($_POST['btn']=='image_update'){
  $id = $_POST['img_id'];
  $alt = $_POST['alt'];
  $title = $_POST['title'];
  $stmt = $conn->prepare("UPDATE images SET alt=?, title=? WHERE id=?");
  if($stmt->execute([$alt, $title, $id])){
    echo "updated";
  }
}
if($_POST['btn']=='addCategory'){
  $cat_name = $_POST['cat_name'];
  $title = $_POST['title'];
  $slug = $_POST['slug'];
  $content = $_POST['content'];
  $desc = $_POST['desc'];
  $img_id = $_POST['img_id'];
  $stmt = $conn->prepare("INSERT INTO category(img_id, name, title, slug, content, description, status) VALUES(?,?,?,?,?,?,?)");
  if($stmt->execute([$img_id, $cat_name, $title, $slug, $content, $desc, 1])){
    echo "inserted";
  }
}
if($_POST['btn']=='updateCategory'){
  $cat_id = $_POST['cat_id'];
  $cat_name = $_POST['cat_name'];
  $title = $_POST['title'];
  $slug = $_POST['slug'];
  $content = $_POST['content'];
  $desc = $_POST['desc'];
  $img_id = $_POST['img_id'];
  $stmt = $conn->prepare("UPDATE category SET img_id=?, name=?, title=?, slug=?, content=?, description=?, status=? WHERE id=?");
  if($stmt->execute([$img_id, $cat_name, $title, $slug, $content, $desc, 1, $cat_id])){
    echo "updated";
  }

}
if($_POST['btn']=='deleteCategory_id'){
    $update = $conn->prepare('DELETE FROM category WHERE id=?');
    $update->execute([$_POST['deleteCategory_id']]);
    echo 'deleted';
    }
// cta 
if($_POST['btn']=='addCta'){
    $title = $_POST['title'];
    $shrt_detail = $_POST['shrt_dtl'];
    $cat = $_POST['category'];
    $url = $_POST['field'];
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("INSERT INTO cta(img_id,title ,short_detail, cat, url,status) VALUES(?,?,?,?,?,?)");
    if($stmt->execute([$img_id, $title, $shrt_detail, $cat, $url,1])){
      echo "inserted";
    }
  }
   //   UPDATE
   if($_POST['btn']=='updateCta'){
    $cta_id=$_POST['cta_id'];
    $title = $_POST['title'];
    $shrt_detail = $_POST['shrt_dtl'];
    $cat = $_POST['category'];
    $url = $_POST['url'];
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("UPDATE cta SET img_id=?, title=?, short_detail=?, cat=?, url=?, status=? WHERE id=?");
    if($stmt->execute([$img_id, $title, $shrt_detail, $cat, $url, 1, $cta_id])){
      echo "updated";
    }
  }
  if($_POST['btn']=='deleteCta_id'){
      $update = $conn->prepare('DELETE FROM cta WHERE id=?');
      $update->execute([$_POST['deleteCta_id']]);
      echo "deleted";
  }
//   cta ends here
//product
if($_POST['btn']=='addProduct'){
    $name="";
    if(isset($_POST['pro_name'])){
        $name=$_POST['pro_name'];
    }else{
        $name="";
    }
    $descri = $_POST['pro_desc'];
    $shrt_descri = $_POST['shrt_desc'];
    $slug = $_POST['slug'];
    $strn = $_POST['strn'];
    $prc = $_POST['prc'];
    $link = $_POST['link'];
    $cat = $_POST['category'];   
    $img_id = $_POST['img_id'];
    $draft=0;
    if(isset($_POST['draft'])){
        $draft = $_POST['draft'];
    }else{
        $draft = 1;
    }
    $PostDate="";
    if(isset($_POST['PostDate'])){
        $PostDate = date("Y-m-d H:i", strtotime($_POST['PostDate']));
    }else{
        $PostDate = "";
    }

    
    $stmt = $conn->prepare("INSERT INTO product(img_id, name ,pro_desc,shrt_desc, strnt, prc,slug, link, cat_id, PostDate, status) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    if($stmt->execute([$img_id, $name, $descri, $shrt_descri,$strn, $prc, $slug, $link, $cat, $PostDate, $draft])){
      echo "inserted";
    }
  }
  if($_POST['btn']=='updateProduct'){
    $product_id=$_POST['product_id'];
    $name = $_POST['pro_name'];
    $descri = $_POST['pro_desc'];
    $shrt_descri = $_POST['shrt_desc'];
    $strn = $_POST['strn'];
    $prc = $_POST['prc'];
    $slug = $_POST['slug'];
    $link = $_POST['link'];
    $cat = $_POST['category'];   
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("UPDATE product SET img_id=?, name=?, pro_desc=?, shrt_desc=?, strnt=?, prc=?,slug=?,link=?,cat_id=?, status=? WHERE id=?");
    if($stmt->execute([$img_id, $name, $descri,$shrt_descri, $strn, $prc, $slug, $link,$cat,1,$product_id])){
      echo "updated";
    }
  }
//   upload product
if($_POST['btn']=='uploadProduct_id'){
    $update = $conn->prepare('UPDATE product SET status=1 WHERE id=?');
    $update->execute([$_POST['uploadProduct_id']]);
    echo 'uploaded';
    }
  // Trash product
  if($_POST['btn']=='trashProduct_id'){
    $update = $conn->prepare('UPDATE product SET status=0 WHERE id=?');
    $update->execute([$_POST['trashProduct_id']]);
    echo 'trashed';
    }

    // Permanent delete product
    if($_POST['btn']=='deleteProduct_id'){
        $update = $conn->prepare('DELETE FROM product WHERE id=?');
        $update->execute([$_POST['deleteProduct_id']]);
        echo 'deleted';
        }
//   product ends here
//user
if($_POST['btn']=='addUser'){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];  
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("INSERT INTO user(img_id,name ,username,password,status) VALUES(?,?,?,?,?)");
    if($stmt->execute([$img_id, $name, $username,  $pwd,1])){
      echo "inserted";
    }
  }
//   UPDATE
  if($_POST['btn']=='updateUser'){
    $user_id=$_POST['user_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];  
    $img_id = $_POST['img_id'];
    $stmt = $conn->prepare("UPDATE user SET img_id=?, name=?, username=?, password=?, status=? WHERE id=?");
    if($stmt->execute([$img_id, $name, $username,  $pwd, 1, $user_id])){
      echo "updated";
    }
  }


//   DELETE
  if($_POST['btn']=='deleteUser_id'){
    $update = $conn->prepare('DELETE FROM user WHERE id=?');
    $update->execute([$_POST['deleteUser_id']]);
    echo 'deleted';
    }
//   user ends here
 // Trash enquiry
 if($_POST['btn']=='trashEnquiry_id'){
    $update = $conn->prepare('UPDATE enquiry SET status=0 WHERE id=?');
    $update->execute([$_POST['trashEnquiry_id']]);
    echo 'trashed';
    }
//   DELETE enquiry
if($_POST['btn']=='deleteEnquiry_id'){
    $update = $conn->prepare('DELETE FROM  enquiry WHERE id=?');
    $update->execute([$_POST['deleteEnquiry_id']]);
    echo 'deleted';
    }
 // post start here
// delete post
if($_POST['btn']=='deletePost_id'){
    $update = $conn->prepare('DELETE FROM post WHERE id=?');
    $update->execute([$_POST['deletePost_id']]);
    echo 'deleted';
    }
 //   upload post
if($_POST['btn']=='uploadPost_id'){
    $update = $conn->prepare('UPDATE post SET status=1 WHERE id=?');
    $update->execute([$_POST['uploadPost_id']]);
    echo 'uploaded';
    }

   
// trash post
if($_POST['btn']=='trashPost_id'){
    $update = $conn->prepare('UPDATE post SET status=0 WHERE id=?');
    $update->execute([$_POST['trashPost_id']]);
    echo 'trashed';
    }

    
    if($_POST['btn']=="addPost"){
        $title="";
        if(isset($_POST['title'])){
            $title = trim_data($_POST['title']);
        }
        else{
            $title="";
        }
        $seo_title="";
        if(isset($_POST['seo_title'])){
            $seo_title = trim_data($_POST['seo_title']);
        }
        else{
            $seo_title="";
        }
        $slug="";
        if(isset($_POST['slug'])){
            $slug = strtolower(str_replace(" ","-",$_POST['slug']));
        }
        else{
            $slug="";
        }
        $meta_desc="";
        if(isset($_POST['meta_desc'])){
            $meta_desc = trim_data($_POST['meta_desc']);
        }
        else{
            $meta_desc="";
        }
        $content="";
        if(isset($_POST['content'])){
            $content = $_POST['content'];
        }else{
            $content="";
        }
        if(isset($_POST['bot_robot'])){
            $bot_robot = ($_POST['bot_robot']);
        }
        $bot_robot_value="";
        if(!empty($bot_robot)){
            $bot_robot_value  = implode(", ",$bot_robot);            
        }
        else{
            $bot_robot_value = "0";
        }
        if(isset($_POST['max_snippet'])){
            $max_snippet = $_POST['max_snippet'];
        }
        else{
             $max_snippet = "max-snippet:";
        }
        if(isset($_POST['max_video'])){
        $max_video =($_POST['max_video']);
        }
        else{
            $max_video = "max-video:";
        }

        if(isset($_POST['max_image'])){
        $max_image=$_POST['max_image'];
        }
        else{
            $max_image="max-image:";
        }
            $max_snippet_value =$_POST['max_snippet_value'];   
            $concat_snippet = $max_snippet.$max_snippet_value;
            $max_video_value =$_POST['max_video_value'];
            $concat_video = $max_video.$max_video_value;    
            $max_image_value =$_POST['max_image_value'];
            $concat_image = $max_image.$max_image_value;
            $advance_bot = $bot_robot_value.", ".$concat_snippet.", ".$concat_video.", ".$concat_image;
            
            $img_id=0;
            if(isset($_POST['img_id'])){
                $img_id = $_POST['img_id'];
            }
            else{
                $img_id=0;
            }
            $cat_id="";
            if(isset($_POST['category'])){
                $cat_id = $_POST['category'];
            }
            else{
                $cat_id="";
            }

            $description="";
            if(isset($_POST['description'])){
                $description = trim_data($_POST['description']);
            }
            else{
                $description="";
            }
            $PostDate="";
            if(isset($_POST['PostDate'])){
                $PostDate = date("Y-m-d H:i", strtotime($_POST['PostDate']));
            }
            else{
                $PostDate="";
            }
            $draft=1;
            if(isset($_POST['draft'])){
                $draft = $_POST['draft'];
            }
            else{
                $draft = 1;
            }
                $stmt1 = $conn->prepare("INSERT INTO post(title, seo_title, slug, meta_desc, content, img_id, cat_id, bot_rank, description, uploaded_on, status) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                if($stmt1->execute([$title, $seo_title, $slug, $meta_desc, $content, $img_id, $cat_id, $advance_bot, $description, $PostDate, $draft]))
                {
                            echo "inserted";
                }
            
    }//add post end

    // trash 

    // update post start
    if($_POST['btn']=="updatePost"){
        $post_id=$_POST['post_id'];
        $title="";
        if(isset($_POST['title'])){
            $title = trim_data($_POST['title']);
        }
        else{
            $title="";
        }
        $seo_title="";
        if(isset($_POST['seo_title'])){
            $seo_title = trim_data($_POST['seo_title']);
        }
        else{
            $seo_title="";
        }
        $slug="";
        if(isset($_POST['slug'])){
            $slug = strtolower(str_replace(" ","-",$_POST['slug']));
        }
        else{
            $slug="";
        }
        $meta_desc="";
        if(isset($_POST['meta_desc'])){
            $meta_desc = trim_data($_POST['meta_desc']);
        }
        else{
            $meta_desc="";
        }
        $content="";
        if(isset($_POST['content'])){
            $content = $_POST['content'];
        }else{
            $content="";
        }
        if(isset($_POST['bot_robot'])){
            $bot_robot = ($_POST['bot_robot']);
        }
        $bot_robot_value="";
        if(!empty($bot_robot)){
            $bot_robot_value  = implode(", ",$bot_robot);            
        }
        else{
            $bot_robot_value = "0";
        }
        if(isset($_POST['max_snippet'])){
            $max_snippet = $_POST['max_snippet'];
        }
        else{
             $max_snippet = "max-snippet:";
        }
        if(isset($_POST['max_video'])){
        $max_video =($_POST['max_video']);
        }
        else{
            $max_video = "max-video:";
        }
        if(isset($_POST['max_image'])){
        $max_image=$_POST['max_image'];
        }
        else{
            $max_image="max-image:";
        }
            $max_snippet_value =$_POST['max_snippet_value'];   
            $concat_snippet = $max_snippet.$max_snippet_value;
            $max_video_value =$_POST['max_video_value'];
            $concat_video = $max_video.$max_video_value;    
            $max_image_value =$_POST['max_image_value'];
            $concat_image = $max_image.$max_image_value;
            $advance_bot = $bot_robot_value.", ".$concat_snippet.", ".$concat_video.", ".$concat_image;
            $img_id=0;
            if(isset($_POST['img_id'])){
                $img_id = $_POST['img_id'];
            }
            else{
                $img_id=0;
            }
            $cat_id="";
            if(isset($_POST['category'])){
                $cat_id = $_POST['category'];
            }
            else{
                $cat_id="";
            }
            $description="";
            if(isset($_POST['description'])){
                $description = trim_data($_POST['description']);
            }
            else{
                $description="";
            }
            $PostDate="";
            if(isset($_POST['PostDate'])){
                $PostDate = date("Y-m-d H:i", strtotime($_POST['PostDate']));
            }
            else{
                $PostDate="";
            }
            $draft=1;
            if(isset($_POST['draft'])){
                $draft = $_POST['draft'];
            }
            else{
                $draft = 1;
            }

  $stmt = $conn->prepare("UPDATE post SET title=?, seo_title=?, slug=?, meta_desc=?, content=?, img_id=?, cat_id=?, bot_rank=?, description=?, uploaded_on=?, status=? WHERE id=?");
  if($stmt->execute([$title, $seo_title, $slug, $meta_desc, $content, $img_id, $cat_id, $advance_bot, $description, $PostDate, $draft, $post_id])){
    echo "updated";
  }

//   $stmt = $conn->prepare("UPDATE category SET img_id=?, name=?, title=?, slug=?, content=?, description=?, status=? WHERE id=?");
//   if($stmt->execute([$img_id, $cat_name, $title, $slug, $content, $desc, 1, $cat_id])){
//     echo "updated";
//   }

                // $stmt1 = $conn->prepare("INSERT INTO post(title, seo_title, slug, meta_desc, content, img_id, cat_id, bot_rank, description, uploaded_on, status) 
                // VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                // if($stmt1->execute([$title, $seo_title, $slug, $meta_desc, $content, $img_id, $cat_id, $advance_bot, $description, $PostDate, $draft]))
                // {
                //             echo "inserted";
                // }
            
    }//update post end





    function trim_data($text) {
      // $text = trim($data); //<-- LINE 31
       if(is_array($text)) {
           return array_map('trim_data', $text);
       }

       $text = preg_replace("/(\r\n|\n|\r)/", "\n", $text); // cross-platform newlines
       $text = preg_replace("/\n\n\n\n+/", "\n", $text); // take care of duplicates 
      
       $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
       $text = stripslashes($text);
      
       $text = str_replace ( "\n", " ", $text );
       $text = str_replace ( "\t", " ", $text );
      
       return $text;
   }
?>