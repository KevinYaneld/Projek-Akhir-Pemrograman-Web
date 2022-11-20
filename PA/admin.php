<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
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
    <title>Menu Utama Admin</title>
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
                            <li class="login"><a href="logout.php">Logout</a></li>
                            
                        </ul>
                    </div>
                    <div class="w3-teal">
                    <button class="button_side" id="button_side1" onclick="buka()"><i class="bi bi-list"></i></button>
                    </div>
                    <div class="header1">
                        <ul class="menu">
                            <li><a href="admin.php">Home</a></li>
                            <li class="login"><a href="logout.php">Logout</a></li>
                            <li><img src = "moon.png" id = "darkmode"></li>
                        </ul>
                    </div>
                </div>
                <div class="konten2">
                    <div class="kata-kata">
                    <p class="kata1">Morden<br>Furniture Brands</p>
                    <p class="kata2">Up To 50% Off</p>
                    <p class="lihatkoleksi"><a href="#">Lihat Koleksi</a></p>
                    </div>
                    <div class="gambar1">
                        <img src="pngegg (2).png">
                    </div>
                    <div class="kata-kata2">
                        <p class="kata1">Morden Furniture Brands</p>
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
                    <div>
                        <div id="kamu"style= "margin-top : 40%;">
                        <a href="tambah_data.php">
                            <img  src="https://iili.io/yLEAGV.png"
                            alt="" height="80%">
                        </a>
                        <p style= "text-align : center; margin-top : 10%">Tambah Data</p>
                        </div>                  
                    </div>
                <?php
                    while ($data = mysqli_fetch_array($query)){
                        ?>
                    <div>
                        <div id="kamu">
                            <img src="gambar_buku1/<?=$data['gambar_barang']?>" alt="" height="80%">
                        </div>
                        <p class="kamu1"><?php echo $data['nama_barang']?></p>
                        <p class="kamu1"><?php echo $data['harga_produk']?></p>
                        <p class="kamu1"><?php echo $data['jumlah_produk']?></p>
                    <?php
                    ?>
                    
                        <a href="delete.php?id=<?= $data['id_produk']?>"><i class="bi bi-trash" style="font-size: 40px; margin-left:30px; color: var(--primary-color);" ></i></a>
                        <a href="edit.php?id=<?= $data['id_produk']?>"><i class="bi bi-pencil-square" style="font-size: 40px; margin-left:20px; color: var(--primary-color)"></i></a>
                    
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

<script>
function buka() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("button_side1").style.display = "none";
}

function tutup() {
    document.getElementById("button_side1").style.display = "block";
  document.getElementById("mySidebar").style.display = "none";
  
}
</script>