<?php
    session_start();

    if(isset($_POST['login'])){
        if (($_POST['username']  == ($_SESSION['usernameSes'])) && ($_POST['password']  == ($_SESSION['passSes']))){

            header("location:home.php");
        }
        else{
            // echo $_POST['username'] ." ". $_SESSION['usernameSes']." ".$_POST['password'] ." ". $_SESSION['passSes'];
            header("location:login.php");
        }
    }
?>