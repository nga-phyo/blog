<?php 
    function dd($d){
        echo '<pre>';
        print_r($d);
        echo '</pre>';
        die();
    }


    function redirect($url){
        header("Location: $url");
        die();
    }


   
 ?>