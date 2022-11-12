<?php
    session_start();
    include 'koneksi.php';        
    $nama1 = $_SESSION['user']['username'];
    $sql = "SELECT * FROM keranjang WHERE nama_user = '$nama1'";
    $query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="keranjang.css">
</head>
<body>
    <div class="bungkus">
        <header class="header">
            <div class="konten1">
                
                <div class="header2">
                    <button class="menuhp">Menu</button>
                    <div class="header1">
                        <ul class="menu">
                            <li><a href="user.php">Home</a></li>
                            <li><a href="keranjang_asli.php">Keranjang</a></li>
                            <li><a href="#">About</a></li>
                            <li class="login"><a href="logout.php">Logout</a></li>
                            <li><img src = "moon.png" id = "darkmode"></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu2">
                
                <!-- <ul>
                    <li><a href="#">Top Porduct</a></li>
                </ul> -->
            </div>
            <div class="konten3">
                <div class="barang">
                <?php
                    while ($data = mysqli_fetch_array($query)){
                        ?>
                    <div class="dia">
                        <div id="kamu">
                            
                            <img src="keranjang/<?=$data['gambar_barang']?>" alt="" height="80%">
                        </div>
                        <div class="tulisan_keranjang">
                        <p id="kamu1"><?php echo $data['nama_barang']?></p>
                        <p id="kamu2">Rp.<?php echo $data['harga_barang']?></p>
                    </div>
                    <?php
                    ?>
                    
                        <a href="delete_keranjang.php?id=<?= $data['id_keranjang']?>"><i class="bi bi-trash" style="font-size: 40px; margin-left:30px; color: var(--primary-color);" ></i></a>
                    
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </header>
    </div>
</body>
<script src="script.js"></script>
</html>