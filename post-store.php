<?php 

    include_once './file.php';

    $_SESSION['errors'] = [];
    

 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

       $userId = $_SESSION['auth']['id'];
       $title = $_POST['title'];
       $body = $_POST['body'];
    
       if(!$title){
          $_SESSION['errors']['title'] = 'title is required';
       }

       if(!$body){
          $_SESSION['errors']['body'] = 'body is required';
       }


       if(count($_SESSION['errors']) > 0 ){

          redirect('create-post.php');
       }

       $sql = "INSERT INTO posts(`title`,`body`,`user_id`) values('$title', '$body', '$userId')";

      $result = mysqli_query($conn, $sql);
          

   }

   redirect('home.php');
   

    