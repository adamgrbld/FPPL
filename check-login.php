<?php 
    include 'dbcon.php';
    require 'function.php';
    
    if(login($_POST)>0){ 
        $_SESSION['role'] = rolecek($_POST['email']);
        echo ' <script>
        document.location.href="index.php";
        </script>';
    }
    else{
        echo ' <script>
        alert("email atau password salah");
        document.location.href="login.php";
        </script>';
    }
?>