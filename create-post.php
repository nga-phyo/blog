
<?php

include_once './file.php' 


?>

<?php include_once './header.php' ?>


<div class="container">
 <div class="row justify-content-center align-items-center vh-100">

   <div class="col-6">
    <div class="card">
     <div class="card-header">
            <h4>Created a Posts</h4>
      </div>
       <div class="card-body">

       <form action="./post-store.php" method="POST">
<div class="mb-3">
  
<input type="text" name="title"
            class="form-control <?php if(isset($_SESSION['errors']['title'])):?>is-invalid <?php endif ?>" 
            placeholder="Enter your title">
            <?php if(isset($_SESSION['errors']['title'])) : ?>
            <div class="invalid-feedback"> <?php echo $_SESSION['errors']['title'] ?></div>
            <?php  endif; ?><br>
            </div>

            <div>


  <label class="form-label">body</label>
  <textarea class="form-control <?php if(isset($_SESSION['errors']['body'])): ?> is-invalid <?php endif ?> " rows="5" name="body" ></textarea>
  <?php if(isset($_SESSION['errors']['body'])): ?>
    <div class="invalid-feedback" ><?php  echo $_SESSION['errors']['body'] ?></div>
    <?php endif ?>

</div>

    </div>
     <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
     </div>

     </form>
      </div>
      </div>
  
  </div>
 </div>


<?php include_once './footer.php' ?>

