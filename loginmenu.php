<!DOCTYPE html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Halaman Login</title>
</head>
<body>
<?php
session_start();
require_once "koneksilogin.php";
require_once "helper.php";
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    //ambil data
    $user = (isset($_POST['username'])) ? $_POST['username'] : "";
    $pass = (isset($_POST['password'])) ? $_POST['password'] : "";
    
    //validasi
    $errCount =0;
    if ($user == "" || $pass ==""){
        set_message("Kolom Inputan Username dan Password tidak boleh kosong");
        $errCount +=1;
    }

    //cek login
    if ($errCount == 0){
        $pass = md5($pass);
        $SQL = "SELECT * FROM user WHERE username='".$user."' AND password='".$pass."'";

        $result = $conn ->query($SQL);
        if ($result->num_rows > 0){
            $u = $result->fetch_assoc();
            
            $_SESSION['login']['status'] = true;
            $_SESSION['login']['username'] = $u['username'];
            $_SESSION['login']['level'] = $u['level'];
            
            switch($u['level']){
                case 'Admin' :
                    header("location:index.php");
                    break;
                    default:
                    #code---
                    break;
            }
        } else{
            set_message("Gagal Login! Coba Lagi .");
        }

    }

}
?>

<h1>Halaman Login</h1>
<hr>
<h2>Login Untuk Merubah Menu</h2>
<form action="" method="post">
<label for="username">Username</label><br>
<input type="text" name="username"><br>
<label for="password">Password</label><br>
<input type="text" name="password"><br>
<input type="submit" value="login">
</form>
<a href ="index.html"><button>Kembali</button></a>
</body>
</html>