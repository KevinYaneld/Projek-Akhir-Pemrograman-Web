<?php

session_start();
include 'koneksi.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
?>

<?php
    
    include 'koneksi.php';
    $sql = "SELECT * FROM produk INNER JOIN barang ON produk.id_produk = barang.id_produk";
    // $sql = "SELECT * FROM produk INNER JOIN buku ON produk.id_produk = gambar.id_produk";
    $query = mysqli_query($conn, $sql)


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
    <link rel="stylesheet" href="tuser1.css">
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
                            <li><img src = "moon.png" id = "darkmode"></li>
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
                </div>
                <div class="konten2">
                    <div class="kata-kata">
                    <p class="kata1">Modern<br>Furniture Brands</p>
                    <p class="kata2">Up To 50% Off</p>
                    <p class="lihatkoleksi"><a href="#">Lihat Koleksi</a></p>
                    </div>
                    <div class="gambar1">
                        <img src="pngegg (2).png">
                    </div>
                    <div class="kata-kata2">
                        <p class="kata1">Modern Furniture Brands</p>
                        <p class="kata2">Up To 50% Off</p>
                        <p class="lihatkoleksi"><a href="#">Lihat Koleksi</a></p>
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
                    <div>
                        <div id="kamu">
                            <img src="gambar_buku1/<?=$data['gambar_barang']?>" alt="" height="80%">
                        </div>
                        <!-- <div id="kamu1"><?php echo $data['jenis_produk']?></div> -->
                        <p class="kamu1"><?php echo $data['nama_barang']?></p>
                        <p class="kamu1">Rp.<?php echo $data['harga_produk']?></p>
                        <p class="kamu1"><?php echo $data['jumlah_produk']?></p>
                    <?php
                    ?>
                    
                    <input type="submit" name="tambah_barang" id="button_keranjang" onclick="location.href='keranjang.php?id=<?= $data['id_produk']?>'">
                    
                    <a href="lihat_data.php?id=<?= $data['id_produk']?>"><button id="lihat_selengkapnya">Lihat Selengkapnya</button></a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
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
<?php
    include 'koneksi.php';
    if(isset($_POST['tambah_barang'])){
        echo "hello world";
        $gambar = $data2['gambar_barang'];
        $nama_barang = $data2['nama_barang'];
        $harga_barang = $data2['harga_produk'];

        $gambar_upload = $_POST[$gambar];
        $nama_upload = $_POST[$nama_barang];
        $harga_barang_upload = $_POST[$harga_barang];

        $sql = "INSERT INTO keranjang(nama_barang, harga_barang, gambar_barang)
                            VALUES ('$gambar_upload', '$nama_upload', '$harga_barang_upload')";
        $query = mysqli_query($conn, $sql);
        if ($query){
            echo "data berhasil diubah";
            header('Location: keranjang.php');
        }
        else{
            echo "data gagal diubah".mysqli_error($conn);
        }
    }
?>
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
