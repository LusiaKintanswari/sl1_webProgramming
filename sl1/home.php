<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMoney</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="appName">MyMoney</div>
        <div class="menuSelected"><a href="">Home</a></div>
        <div class="menu"><a href="profile.php">Profile</a></div>
        <div class="logout"><a href="index.php">Log Out</a></div>
    </div>

    <div class="homeMessage">Hello 
        <?php
            echo $_SESSION['namaDepanSes'];
            
            if (isset($_SESSION['namaTengahSes']) !="") echo " ".$_SESSION['namaTengahSes'];
            if (isset($_SESSION['namaBelakangSes']) !="") echo " ".$_SESSION['namaBelakangSes'];

        ?>
        
    </div>

    
    
</body>
</html>