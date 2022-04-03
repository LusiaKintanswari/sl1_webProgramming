<?php
    session_start();
    include("config.php");

    $id = $_SESSION['idSes'];
    $str_query = "select*from profile where id='$id'";
    $query = mysqli_query($connection, $str_query);
    $data = mysqli_fetch_array($query);

    $namaDepan  = $data['namaDepan'];
    $namaTengah = $data['namaTengah'];
    $namaBelakang = $data['namaBelakang'];
    $nik = $data['nik'];
    $email = $data['email'];
    $noHP = $data['noHP'];
    $alamat = $data['alamat'];
    $kodePos = $data['kodePos'];
    $username = $data['username'];
    $tempatLahir = $data['tempatLahir'];
    $tanggalLahir = $data['tanggalLahir'];
    $wargaNegara = $data['wargaNegara'];
    $fotoProfil = $data['fotoProfil'];

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

    <?php
        

        $namaDepanErr = $namaTengahErr = $namaBelakangErr = $nikErr = "";
        $wargaNegaraErr = $emailErr = $noHPErr = $alamatErr = $kodePosErr = "";
        $usernameErr = $newPasswordErr = $cpasswordErr = $fotoProfilErr = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $canContinue = true;
        $gantiPassword = true;
        $gantiProfil = true;

        function endsWith($string, $endString){
            $len = strlen($endString);
            if ($len == 0) {
                return true;
            }
            return (substr($string, -$len) === $endString);
        }
    
        function startsWith ($string, $startString) {
            $len = strlen($startString);
            return (substr($string, 0, $len) === $startString);
        }
    
    
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        if (empty(test_input($_POST["namaDepan"]))){
            $namaDepanErr = "*Nama Depan harus diisi";
            $namaDepan = ""; $canContinue = false;
        }
        else {
            $namaDepan = test_input($_POST["namaDepan"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $namaDepan)) {
                $namaDepanErr = "*Nama Depan hanya dapat diiisi huruf";
                $canContinue = false;
            }
            else {
                $namaDepanErr = "";
            }
        }
        
        if (empty(test_input($_POST["namaTengah"]))){
            $namaTengahErr = "*Nama Tengah harus diisi";
            $namaTengah = ""; $canContinue = false;
        }
        else {
            $namaTengah = test_input($_POST["namaTengah"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $namaTengah)) {
                $namaTengahErr = "*Nama Tengah hanya dapat diiisi huruf";
                $canContinue = false;
            }
            else {
                $namaTengahErr = "";
            }
        }

        if (empty(test_input($_POST["namaBelakang"]))){
            $namaBelakangErr = "*Nama Belakang harus diisi";
            $namaBelakang = ""; $canContinue = false;
        }
        else {
            $namaBelakang = test_input($_POST["namaBelakang"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $namaBelakang)) {
                $namaBelakangErr = "*Nama Belakang hanya dapat diiisi huruf";
                $namaBelakang = ""; $canContinue = false;
            }
            else {
                $namaBelakangErr = ""; 
            }
        }

        $tempatLahir = test_input($_POST["tempatLahir"]);
        $tanggalLahir = test_input($_POST["tanggalLahir"]);
        $wargaNegara = test_input($_POST["wargaNegara"]);
        
        if (empty(test_input($_POST["nik"]))){
            $nikErr = "*NIK harus diisi";
            $nik = ""; $canContinue = false;
        }
        else {
            $nik = test_input($_POST["nik"]);
            if(strlen($nik) !=16 || !preg_match('~[0-9]+~', $nik)) {
                $nikErr = "*NIK harus 16 karakter angka";
                $nik = ""; $canContinue = false;
            }
            else {
                $nikErr = "";
            }
        }
        
        if (empty(test_input($_POST["email"]))){
            $emailErr = "*Email harus diisi";
            $email = ""; $canContinue = false;
        }
        else {
            $email = test_input($_POST["email"]);
            if(!endsWith($email,"@gmail.com")) {
                $emailErr = "*Email harus diakhiri \"@gmail.com\" ";
                $email = ""; $canContinue = false;
            }
            else {
                $emailErr = "";
            }
        }
        
        if (empty(test_input($_POST["noHP"]))){
            $noHPErr = "*No HP harus diisi";
            $noHP = ""; $canContinue = false;
        }
        else {
            $noHP = test_input($_POST["noHP"]);
            if(strlen($noHP) !=12 || !preg_match('~[0-9]+~', $noHP) || !startsWith($noHP, "08")) {
                $noHPErr = "*No HP harus 12 karakter angka diawali \"08\"";
                $noHP = ""; $canContinue = false;
            }
            else {
                $noHPErr = "";
            }
        }
        
        if (empty(test_input($_POST["alamat"]))){
            $alamatErr = "*Alamat harus diisi";
            $alamat = ""; $canContinue = false;
        }
        else {
            $alamat = test_input($_POST["alamat"]);
            if(strlen($alamat) <10) {
                $alamatErr = "*Alamat harus lebih dari 10 karakter";
                $alamat = ""; $canContinue = false;
            }
            else {
                $alamatErr = "";
            }
        }
    
        if (empty(test_input($_POST["kodePos"]))){
            $kodePosErr = "*Kode Pos harus diisi";
            $kodePos = ""; $canContinue = false;
        }
        else {
            $kodePos = test_input($_POST["kodePos"]);
            if(strlen($kodePos) !=5 || !preg_match('~[0-9]+~', $kodePos)) {
                $kodePosErr = "*Kode Pos harus terdiri dari 5 karakter angka";
                $kodePos = ""; $canContinue = false;
            }
            else {
                $kodePosErr = "";
            }
        }
        if (empty(test_input($_POST["username"]))){
            $usernameErr = "*Username harus diisi";
            $username = ""; $canContinue = false;
        }
        else {
            $username = test_input($_POST["username"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
                $usernameErr = "*Username harus terdiri dari huruf";
                $username = ""; $canContinue = false;
            }
            else {
                $usernameErr = "";
            }
        }
        
        
        
        if (empty(test_input($_POST["newPassword"]))){
            $gantiPassword = false;
            $newPasswordErr = "";
        }
        else {
            
            $newPassword = test_input($_POST["newPassword"]);
            
            
            if(strlen($newPassword) <5 || (!preg_match("/[a-z]/i", $newPassword) || !preg_match('~[0-9]+~', $newPassword))) {
                $newPasswordErr = "Password harus terdiri lebih dari 5 huruf & angka";
                $newPassword=""; $canContinue = false; $gantiPassword = false;
            }
            else {
                $newPasswordErr = "";
                $gantiPassword = true;
            }
        }

        $newFotoProfil = $_FILES["newFotoProfil"];
        if (!$newFotoProfil["tmp_name"]) {
            $gantiProfil = false;
        }
        else{
          if(!getimagesize($newFotoProfil["tmp_name"])){
            $fotoProfilErr = "*File harus berformat foto"; $canContinue = false;
            $gantiProfil = false;
          }
          else {
            $fotoProfilErr = ""; $canContinue = true;
            $gantiProfil = true;
          }
        }



        if($canContinue) {
            if(isset($_POST['edit'])){
                //update ke database

                $str_query = "update profile set 
                namaDepan = '".$_POST['namaDepan']."',
                namaTengah = '".$_POST['namaTengah']."',
                namaBelakang = '".$_POST['namaBelakang']."',
                nik = '".$_POST['nik']."',
                tempatLahir = '".$_POST['tempatLahir']."',
                tanggalLahir = '".$_POST['tanggalLahir']."',
                wargaNegara = '".$_POST['wargaNegara']."',
                email = '".$_POST['email']."',
                noHP = '".$_POST['noHP']."',
                alamat = '".$_POST['alamat']."',
                kodePos = '".$_POST['kodePos']."',
                username = '".$_POST['username']."'
                where id = '".$id."'";

                $query = mysqli_query($connection, $str_query);

                if($gantiPassword){

                    $str_query = "update profile set 
                    password = '".$_POST['newPassword']."'
                    where id = '".$id."'";

                    $query = mysqli_query($connection, $str_query);
                }

                if($gantiProfil){
                    $tmp_name = $newFotoProfil["tmp_name"];
                    $pic_name = $newFotoProfil["name"];
                    move_uploaded_file($tmp_name, "img/"."$pic_name");

                    $str_query = "update profile set 
                    fotoProfil = '"."img/".$_FILES["newFotoProfil"]["name"]."'
                    where id = '".$id."'";

                    $query = mysqli_query($connection, $str_query);
                }

                if($query){
                    echo "<script>";
                        echo "alert('Profil berhasil diupdate')";
                    echo "</script>";
        
                    echo "<script>";
                        echo "window.location='profile.php'";
                    echo "</script>";
                }
                else {
                    echo "<script>";
                        echo "alert('Profil gagal diupdate')";
                    echo "</script>";
        
                    echo "<script>";
                        echo "window.location='editProcess.php'";
                    echo "</script>";
                }
                
            }
        }

    }

    ?>

   <div class="title">Update Profile</div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        
        <table>
            <tr>
                <td><div class="field">Nama Depan</div></td>
                <td><input type="text" name="namaDepan" id="namaDepanID" value="<?php echo $namaDepan;?>"></td>
                <td><div class="field">Nama Tengah</div></td>
                <td><input type="text" name="namaTengah" id="namaTengahID" value="<?php echo $namaTengah;?>"></td>
                <td><div class="field">Nama Belakang</div></td>
                <td><input type="text" name="namaBelakang" id="namaID" value="<?php echo $namaBelakang;?>"></td>
            </tr>
            <tr>
                <td><div class="field">Tempat Lahir</div></td>
                <td><input type="text" name="tempatLahir" id="tempatLahirID" value="<?php echo $tempatLahir;?>"></td>
                <td><div class="field">Tanggal Lahir</div></td>
                <td><input type="date" name="tanggalLahir" id="tanggalLahirID" value="<?php echo $tanggalLahir;?>"></td>
                <td><div class="field">NIK</div></td>
                <td><input type="text" name="nik" id="nikID" value="<?php echo $nik;?>"></td>
            </tr>
            <tr>
                <td><div class="field">Warga Negara</div></td>
                <td><input type="text" name="wargaNegara" id="wargaNegaraID" value="<?php echo $wargaNegara;?>"></td>
                <td><div class="field">Email</div></td>
                <td><input type="text" name="email" id="email" value="<?php echo $email;?>"></td>
                <td><div class="field">No HP</div></td>
                <td><input type="text" name="noHP" id="noHPID" value="<?php echo $noHP;?>"></td>
            </tr>
            <tr>
                <td><div class="field">Alamat</div></td>
                <td><textarea name="alamat" id="alamatID" rows="100" cols="38" > <?php echo $alamat;?> </textarea></td>
                <td><div class="field">Kode Pos</div></td>
                <td><input type="text" name="kodePos" id="kodePosID" value="<?php echo $kodePos;?>"></td>
                <td><div class="field">Username</div></td>
                <td><input type="text" name="username" id="usernameID" value="<?php echo $username;?>"></td>
            </tr>

            <tr>

                <td><div class="field">New Password</div></td>
                <td><input type="password" name="newPassword" id="newPasswordID" ></td>
                
                <td>
                    <div class="field">Foto Profil</div>
                    <?php
                        $pic_name = $data['fotoProfil'];

                    ?>
                </td>
                <<td><input type="file" name="newFotoProfil" id="newFotoProfilID"></td>
                <td colspan="2"><div class="profile"><img src="<?php echo $pic_name ?>" alt=""></div></td>
            </tr>
            
        </table>  


        <div class="erorField">
            <span class="error"> <?php echo $namaDepanErr." ";?></span>
            <span class="error"> <?php echo $namaTengahErr." ";?></span>
            <span class="error"> <?php echo $namaBelakangErr." ";?></span>
            <span class="error"> <?php echo $nikErr." ";?></span>
        </div>

        <div class="erorField">
            <span class="error"> <?php echo $wargaNegaraErr." ";?></span>
            <span class="error"> <?php echo $emailErr." ";?></span>
            <span class="error"> <?php echo $noHPErr." ";?></span>
            <span class="error"> <?php echo $alamatErr." ";?></span>
        </div>

        <div class="erorField">
            <span class="error"> <?php echo $kodePosErr." ";?></span>
            <span class="error"> <?php echo $usernameErr." ";?></span>
            <span class="error"> <?php echo $newPasswordErr." ";?></span>
            <span class="error"> <?php echo $fotoProfilErr." ";?></span>
        </div>

        <div class="subtitle">
            <a href="./profile.php">Kembali</a>
            <input type="submit" class="submit" name="edit" value="Edit">
        </div>
        

    </form>
    
</body>
</html>