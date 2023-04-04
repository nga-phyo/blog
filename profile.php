<?php 

include_once './file.php';


if(!isset($_SESSION['auth'])){
    redirect('login.php');
    die();
}


?>


<?php include_once './header.php' ?>

 
<div class="row justify-content-center align-items-center mt-5">
    <div class="col-4">
    <div class="card">
    


    <div class="card-body">
    <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action"><?php echo $_SESSION['auth']['name'] ?></a>
  <a href="#" class="list-group-item list-group-item-action"><?php echo $_SESSION['auth']['email'] ?></a>
  
    </div>

    </div>


  <div class="card-footer">
       <a href="./profile-edit.php" class="btn btn-success"> Edit</a>
  </div>
   
    </div>
    </div>
   

    </div>




<?php include_once './footer.php' ?>