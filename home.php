<?php 

include_once './file.php';


if(!isset($_SESSION['auth'])){
    redirect('login.php');
    die();
}

$sql = 'SELECT * from posts';

$result = mysqli_query($conn, $sql);

$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);




?>


<?php include_once './header.php' ?>

        <div class="container">
            <div class="row justify-content-center align-items-center" >
          
            <?php if(isset($_SESSION['message'])): ?>


            <div class="col-8 mt-3">

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['message'];

              unset($_SESSION['message']);
    ?> 

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>


              <?php endif; ?>
       

                 <?php foreach($posts as $post): ?> <!-- range(start,end,step) -->
                 <a href="#" class="text-black text-decoration-none">
      <div class="col-8 mt-3">
                    <div class="card">
                       
                        <div class="card-body">
                            <h3><?php echo $post['title']?></h3>
                            
                            <p><?php echo $post['body']?></p>
                            <i>time<b> :<?php echo date('j M,Y', strtotime($post['date'])) ?></b></i>

                         created by <b>  <?php 
                      $userId = $post['user_id'];
                      $sql = "SELECT * from users where `id`= '$userId' ";
                        $result = mysqli_query($conn, $sql);

                        $user = mysqli_fetch_assoc($result);

                        echo $user['Name'];
                    
                          ?></b>
                        </div>
                        
                        <div class="card-footer">
                    <div class="float-end">
                    <a href="./post-edit.php?post_id=<?php echo $post['id'] ?>" class="btn btn-outline-success">Edit</a>
                      
                   
                      <a href="./post-delete.php?post_id= <?php echo $post['id'] ?>" 
                      class="btn btn-outline-danger">Delete</a>

                   
                    </div>
                        </div>
                    </div>
                    </div>
                    </a>
                    <?php endforeach; ?>
                
            </div>
        </div>


<?php include_once './footer.php' ?>
