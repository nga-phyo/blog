<?php 

include_once './file.php';




if(isset($_SESSION['auth'])){

    unset($_SESSION['auth']);
    // die();
    
}

redirect('login.php');

?>