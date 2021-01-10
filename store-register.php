<?php 
    include 'dbcon.php';
    require 'function.php';
    
    // var_dump($_POST);die;
    if(register($_POST) >0 ){
        echo ' <script>
        alert("register berhasil");
        document.location.href="register.php";
        </script>';
    }
    else{
        echo ' <script>
        alert("register gagal");
        document.location.href="register.php";
        </script>';
    }
?>