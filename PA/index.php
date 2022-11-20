<?php
session_start();
include 'koneksi.php';
if(isset($_SESSION['login'])){
    header("Location: user.php");
    exit;
}

?>

<?php
    include 'koneksi.php';
    if(isset($_POST['login'])){
        if($username = $_POST['user'] == "admin"){
            
                $username = $_POST['user'];
                $password = $_POST['password'];
                $result = mysqli_query($conn, "SELECT * FROM login_admin WHERE username_admin = '$username' OR email_admin = '$username'");

                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result);
                    
                    if(password_verify($password, $row['psw_admin'])){
                        $_SESSION['admin'] = $row;
                        header("Location: admin.php");
                        exit;
                    }
                }
                $error = true;
            }
        else{
                $username = $_POST['user'];
                $password = $_POST['password'];

                $result = mysqli_query($conn, "SELECT * FROM loginn WHERE username = '$username' OR email = '$username'");

                if(mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                    
                    if(password_verify($password, $row['psw'])){
                        $_SESSION['user'] = $row;
                        header("Location: user.php");
                        exit;
                    }
            }
            $error = true;
        }
    }
        

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@600&family=Playfair+Display:ital,wght@1,800&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    
</head>


<body>
    <style>
    .register{
        margin : 30px 0;
        text-align: center;
        font-size: 16px;
        color: black;
    }

    .register a{
        color : #2596be;
        text-decoration: none;
    }

    .register a:hover{
        text-decoration: underline;
    }
    </style>

    <div class="center">
        <h1>LOGIN</h1>
        <?php if(isset($error)){
            echo "<p align = center style='color:red;'> Username atau Password Salah!</p>";
        }?>
        <form id="login-form" method="post">
            <div class="txt_field">
                <input type="text" name = "user" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name = "password" required>
                <span></span>
                <label>password</label>
            </div>
            
        <input type="submit" name = "login" value="Login">
        <div class = "register">
                Belum Ada Akun? <a href="register.php">Register</a>
        </div>
        </form>
    </div>
</body>
</html>