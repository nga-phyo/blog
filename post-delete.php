<?php 

include_once './file.php';


if(!isset($_GET['post_id'])){

    redirect('home.php');
}


  $id = $_GET['post_id'];

 $sql = "DELETE FROM posts where `id` = '$id'";

 $result = mysqli_query($conn, $sql);

    if($result){

        $_SESSION['message'] = 'A post is delete success';
    }else{
      
        $_SESSION['message'] = 'A post is\'n delete ';
    }

 
 redirect('home.php');

 


 

?>