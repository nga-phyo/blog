<?php 

    include_once './file.php';

    $errors = [];

 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

     
       $email = $_POST['email'];
       $password = $_POST['password'];

       if(!$email){
            $errors['email'] = 'Email is required';
       }

       if(!$password){
        $errors['password'] = 'Password is required';
       }

       if(!('email' == $email && 'password' == $password)){
       
        
        echo 'email or password is incorrect';
       }
    
      if(count($errors) == 0 ){

        $sql =  "SELECT * from users where `email` = '$email' and `password` = '$password' ";

        $result = mysqli_query($conn,$sql);
      
        if($user = mysqli_fetch_assoc($result)){

          
           $_SESSION['auth'] = [
            'id' => $user['ID'],
            'name' => $user['Name'],
            'email' => $user['Email'],
         
           ];

          

         
      redirect('home.php');
           
        }

        
    }
}
   

    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-4">

                <div class="card">
                <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">

                            <form action="" method="POST">

                            <div>

                            <input type="email" name="email"
                             class="form-control <?php if(isset($errors['email'])):?>is-invalid <?php endif ?>" 
                            placeholder="Enter your email">

                             <?php if(isset($errors['email'])) : ?>
                                <div class="invalid-feedback"> <?php echo $errors['email'] ?></div>
                                <?php  endif; ?><br>
                            </div>

                            <div>

                            <input type="password" name="password" class="form-control <?php if(isset($errors['password'])) : ?> is-invalid <?php endif ?> " 
                                 placeholder="Enter your password">
                                <?php if(isset($errors['password'])) : ?>
                                <div class="invalid-feedback"> <?php echo $errors['password'] ?></div>
                                <?php  endif; ?><br>
                            </div>

                                <button type="submit" class="btn btn-primary w-100" >Login</button>
                                
                            </form>

                        </div>
                   
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>