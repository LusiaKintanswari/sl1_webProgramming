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

   <div class="title">Login</div>

   <div class="loginForm">

       <form action="loginProcess.php" method="post">
           <table>
               <tr>
                   <td><div class="field">Username</div></td>
                   <td><input type="text" name="username" id="usernameID"></td>
                </tr>
                <tr></tr>
                <td><div class="field">Password</div></td>
                <td><input type="password" name="password" id="passwordID"></td>
            </tr>
            
        </table>

        <div class="subtitle">
            <a href="./index.php">Kembali</a>
            <input type="submit" class="submit" name="login" value="Login">
        </div>
        
        </form>
</div>
    
</body>
</html>