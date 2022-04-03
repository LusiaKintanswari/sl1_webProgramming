<?php
    session_start();
    include("config.php");

    $id = $_SESSION['idSes'];
    $str_query = "select*from profile where id='$id'";
    $query = mysqli_query($connection, "$str_query");
    $data = mysqli_fetch_array($query);

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
                        echo $data['namaDepan'];
                    ?>
                </td>
                <td><div class="field">Nama Tengah</div></td>
                <td class="field2">
                    <?php
                        echo $data['namaTengah'];
                    ?>
                </td>
                <td><div class="field">Nama Belakang</div></td>
                <td class="field2">
                    <?php
                        echo $data['namaBelakang'];
                    ?>
                    
                </td>
            </tr>
            <tr>
                <td><div class="field">Tempat Lahir</div></td>
                <td class="field2">
                    <?php
                        echo $data['tempatLahir'];
                    ?>
                </td>
                <td><div class="field">Tgl Lahir</div></td>
                <td class="field2">
                    <?php
                        echo $data['tanggalLahir'];
                    ?>
                </td>
                <td><div class="field">NIK</div></td>
                <td class="field2">
                    <?php
                        echo $data['nik'];
                    ?>
                </td>
            </tr>
            <tr>
                <td><div class="field">Warga Negara</div></td>
                <td class="field2">
                    <?php
                        echo $data['wargaNegara'];
                    ?>
                </td>
                <td><div class="field">Email</div></td>
                <td class="field2">
                    <?php
                        echo $data['email'];
                    ?>
                </td>
                <td><div class="field">No HP</div></td>
                <td class="field2">
                    <?php
                        echo $data['noHP'];
                    ?>
                </td>
            </tr>
            <tr>
                <td><div class="field">Alamat</div></td>
                <td class="field2">
                    <?php
                        echo $data['alamat'];
                    ?>
                </td>
                <td><div class="field">Kode Pos</div></td>
                <td class="field2">
                    <?php
                        echo $data['kodePos'];
                    ?>
                </td>
                <td><div class="field">Foto Profil</div></td>
                
            </tr>
            <tr>
                <td><div class="field"></div></td>
                <td><div class="field"></div></td>
                <td><div class="field"></div></td>
                <td><div class="field"></div></td>
                    <?php
                        $pic_name = $data['fotoProfil'];

                    ?>
                <td colspan="2"><div class="profile"><img src="<?php echo $pic_name ?>" alt=""></div></td>
            </tr>
            <tr><td>
            <div class="subtitle">
                <a href='./editProcess.php?id=<?php echo $id ?>'>Edit</a>
            </div>
            </td></tr>
            
        </table>
    </div>

</body>
</html>