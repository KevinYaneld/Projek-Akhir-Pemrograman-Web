<?php

include 'koneksi.php';
if(isset($_POST['register'])){
    $email = $_POST['email'];
    $username = $_POST['user'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpass'];

    if($password == $cpassword){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($conn,"SELECT username FROM loginn WHERE username = '$username'");
        $result_2 = mysqli_query($conn,"SELECT email FROM loginn WHERE email = '$email'"); 
        if(mysqli_fetch_assoc($result)){
            echo "
            <script>
                alert('Username telah digunakan. Silahkan Cari Lagi!')
                document.location.href = 'register.php';
            </script>";
            
        }
        elseif (mysqli_fetch_assoc($result_2)){
            echo "
            <script>
                alert('Email telah digunakan. Silahkan Cari Lagi!')
                document.location.href = 'register.php';
            </script>";
        }        
        else{
            $sql = "INSERT INTO loginn(email, username, psw) values ('$email','$username','$password')";
            $result = mysqli_query($conn,$sql);
        }

        if(mysqli_affected_rows($conn) > 0){
            echo "
            <script>
                alert('Registrasi Berhasil')
                document.location.href = 'login.php';
            </script>";
        }
        else{
            echo "
            <script>
                alert('Registrasi Gagal!')
                document.location.href = 'register.php';
            </script>";
        }

    }else{
        echo "<script>
            alert('Konfirmasi Password Anda Tidak Sesuai!');
            document.location.href = 'register.php';
        </script>";
    }
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="login.css">
</head>


<body>
    <div class="center">
        <h1>Register</h1>
        <form id="login-form" method="post">
            <div class="txt_field">
                <input type="email" name = "email" required>
                <span></span>
                <label>E-mail</label>
            </div>
            <div class="txt_field">
                <input type="text" name = "user" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name = "password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name = "cpass" required>
                <span></span>
                <label>Konfirmasi Password</label>
            </div>
            
        <input type="submit" name = "register" value="Register" style = "margin : 30px 0">
        </form>
    </div>
</body>
</html>