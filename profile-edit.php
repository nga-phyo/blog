<?php 

include_once './file.php';

$id = $_SESSION['auth']['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);


$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (!$name) {
        $errors['name'] = 'The name is required.';
    }

    if(count($errors) == 0) {
        if($password) {
            $sql = "UPDATE users SET `name`='$name', `password`='$password' where `id`='$id'";
        } else {
            $sql = "UPDATE users SET `name`='$name' where `id`='$id'";
        }
    
        $result = mysqli_query($conn, $sql);

        redirect('profile-edit.php');
    }

}

?>



<?php include_once './header.php' ?>

<div class="container">
<div class="row justify-content-center align-items-center vh-100">
    <div class="col-4">

        <div class="card">
        <div class="card-header">
                    Edit
        </div>
        <div class="card-body">

            <form action="" method="POST">


            <div>

            <input type="text" name="name" 
                class="form-control <?php if(isset($errors['name'])):?>is-invalid <?php endif ?>" 
            placeholder="Enter your name">

                <?php if(isset($errors['name'])) : ?>
                <div class="invalid-feedback"> <?php echo $errors['name'] ?></div>
                <?php  endif; ?><br>
            </div>

            <div>

            <input type="password" name="password" class="form-control <?php if(isset($errors['password'])) : ?> is-invalid <?php endif ?> " 
                    placeholder="Enter your password">
                <?php if(isset($errors['password'])) : ?>
                <div class="invalid-feedback"> <?php echo $errors['password'] ?></div>
                <?php  endif; ?><br>
            </div>
                <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary " >Update</button>
                <a href="./profile-edit.php" class="btn btn-secondary">Cancle</a>
                
                    </div>
            </form>

        </div>
    
            
        </div>
    </div>
</div>
</div>


<?php include_once './footer.php' ?>