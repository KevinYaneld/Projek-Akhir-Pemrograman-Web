<?php

session_start();
include 'koneksi.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aboutus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="aboutus.css">
</head>
<body>
    
    <div class="bungkus">
        <header class="header">
            <div class="konten1">
                
                <div class="header2">
                    <button class="menuhp">Menu</button>
                    
                    <div class="menu_side" style="display:none" id="mySidebar">
                        <button onclick="tutup()" class="menu_side2">Close &times;</button>
                        <ul class="menu">
                            <li><a href="user.php">Home</a></li>
                            <li><a href="keranjang_asli.php">Keranjang</a></li>
                            <li><a href="#">About</a></li>
                            <li class="login"><a href="logout.php">Logout</a></li>
                            <!-- <li><img src = "moon.png" id = "darkmode"></li> -->
                        </ul>
                    </div>
                    <div class="w3-teal">
                    <button class="button_side" id="button_side1" onclick="w3_open()"><i class="bi bi-list"></i></button>
                    </div>  
                    <div class="header1">
                        <ul class="menu">
                            <li><a href="user.php">Home</a></li>
                            <li><a href="keranjang_asli.php">Keranjang</a></li>
                            <li><a href="#">About</a></li>
                            <li class="login"><a href="logout.php">Logout</a></li>
                            <li><img src = "moon.png" id = "darkmode"></li>
                        </ul>
                    </div>
                    <div class="row-2" >
                        <div class = "col-1">
                            <h2>ABOUT US</h2>
                            <P>KELOMPOK 3 INFORMATIKA A 2021</P>
                        </div>
                        <div class="col-2">
                            <img src="https://iili.io/ygdASS.png" class="image">
                        </div>
                    </div>
                </div>
                <!-- batas -->
                <div class="konten3">
                <h1 style = "margin-right: 10%;"align ="center" >ANGGOTA KELOMPOK</h1>
                    <div class="barang">
                        <div>
                            <div id="kamu">
                                <img  src="https://iili.io/ytxAUx.png"
                                alt="">
                            </a>
                            <p style= "text-align : center;"><br> Muh. Hafiz <br><br> 2109106045 </p>
                            </div>                  
                        </div>
                        <div>
                            <div id="kamu">
                                <img  src=" https://iili.io/ytx7RV.png"
                                alt="">
                            </a>
                            <p style= "text-align : center;"><br> M. Irsyadul Asyrof H. <br><br> 2109106047 <br><br> Ketua</p>
                            </div>                  
                        </div>
                        <div>
                            <div id="kamu">
                                <img  src=" https://iili.io/ytx5HQ.png"
                                alt="">
                            </a>
                            <p style= "text-align : center;"><br> Kevin Yaneld C. <br><br> 2109106031</p>
                            </div>                  
                        </div>
                    </div>
                </div>
                <!-- batas -->
            </div>
        </header>
    </div>
</body>

<footer style="height: 50px; bottom: 0px; width: 100%;
    line-height: 50px; color: #000000; text-align: center; font-family: sans-serif;
    background-color: var(--primary-color);">
    <h4>Contact Us On :
    <img src="fb.png" style="height: 20px; width:auto; cursor:pointer; margin-left: 20px;">
    <img src="ig.png" style="height: 20px; width:auto; cursor:pointer; margin-left: 20px;">
    <img src="tw.png" style="height: 20px; width:auto; cursor:pointer; margin-left: 20px;">
    </h4>
</footer>

<script src="script.js"></script>
</html>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("button_side1").style.display = "none";
}

function tutup() {
    document.getElementById("button_side1").style.display = "block";
  document.getElementById("mySidebar").style.display = "none";
  
}
</script>