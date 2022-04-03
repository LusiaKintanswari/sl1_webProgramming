<?php
    session_start();
    include("config.php");

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $str_query = "select*from profile where username='$username'";
        $query = mysqli_query($connection, "$str_query");
        $data = mysqli_fetch_array($query);

        if($data['password'] == $_POST['password']){
            $_SESSION['idSes'] = $data['id'];

            header("location:home.php");
        }
        else{
            // echo $_POST['username'] ." ". $_SESSION['usernameSes']." ".$_POST['password'] ." ". $_SESSION['passSes'];
            echo "<script>";
                echo "alert('Username dan Password tidak sesuai')";
            echo "</script>";

            echo "<script>";
                echo "window.location='login.php'";
            echo "</script>";
        }
        
    }
?>