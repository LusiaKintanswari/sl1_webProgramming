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
        <div class="menu"><a href="./home.php">Home</a></div>
        <div class="menuSelected"><a href="">Profile</a></div>
        <div class="logout"><a href="index.php">Log Out</a></div>
    </div>
    
    <div class="profileDetail">

        <table>
            <tr>
                <td><div class="field">Nama Depan</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['namaDepanSes'];
                    ?>
                </td>
                <td><div class="field">Nama Tengah</div></td>
                <td class="field2">
                    <?php
                        if (isset($_SESSION['namaTengahSes']) !="") echo $_SESSION['namaTengahSes'];
                    ?>
                </td>
                <td><div class="field">Nama Belakang</div></td>
                <td class="field2">
                    <?php
                        if (isset($_SESSION['namaBelakangSes']) !="") echo $_SESSION['namaBelakangSes'];
                    ?>
                    
                </td>
            </tr>
            <tr>
                <td><div class="field">Tempat Lahir</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['tempatLahirSes'];
                    ?>
                </td>
                <td><div class="field">Tgl Lahir</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['tanggalLahirSes'];
                    ?>
                </td>
                <td><div class="field">NIK</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['nikSes'];
                    ?>
                </td>
            </tr>
            <tr>
                <td><div class="field">Warga Negara</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['wargaNegaraSes'];
                    ?>
                </td>
                <td><div class="field">Email</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['emailSes'];
                    ?>
                </td>
                <td><div class="field">No HP</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['noHPSes'];
                    ?>
                </td>
            </tr>
            <tr>
                <td><div class="field">Alamat</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['alamatSes'];
                    ?>
                </td>
                <td><div class="field">Kode Pos</div></td>
                <td class="field2">
                    <?php
                        echo $_SESSION['kodePosSes'];
                    ?>
                </td>
                <td><div class="field">Foto Profil</div></td>
                
            </tr>
            <tr>
                <td><div class="field"></div></td>
                <td><div class="field"></div></td>
                <td><div class="field"></div></td>
                <td><div class="field"></div></td>
                <td colspan="2"><div class="profile"><img src="./img/profile.png" alt=""></div></td>
            </tr>
            
        </table>
    </div>

</body>
</html>