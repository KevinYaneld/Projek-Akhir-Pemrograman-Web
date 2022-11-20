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
        
    $nama1 = $_SESSION['user']['username'];
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM produk INNER JOIN barang ON produk.id_produk = barang.id_produk WHERE produk.id_produk='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);


?>
<?php
    include 'koneksi.php';
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM review_barang WHERE review_barang.id_barang= '$id'";
    
    $query = mysqli_query($conn, $sql);
    $data1 = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="lihat_data.css">
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
                            <li><a href="aboutus.php">About</a></li>
                            <li class="login"><a href="logout.php">Logout</a></li>
                            <li><img src = "moon.png" id = "darkmode"></li>
                        </ul>
                    </div>
                    <div class="w3-teal">
                    <button class="button_side" id="button_side1" onclick="buka()"><i class="bi bi-list"></i></button>
                    </div>
                    <div class="header1">
                        <ul class="menu">
                            <li><a href="user.php">Home</a></li>
                            <li><a href="keranjang_asli.php">Keranjang</a></li>
                            <li><a href="aboutus.php">About</a></li>
                            <li class="login"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="konten2">
                    <div id="dalam_konten2">
                        <div class="atur_gammbar_utama">
                            <img src="gambar_buku1/<?=$data['gambar_barang']?>" alt="" width="100px">
                        </div>
                    </div>
                    <div id="dalam_konten3">
                        <div id="atur_gambar">
                            <img src="gambar_buku1/<?=$data['gambar_barang']?>" alt="" width="100px">
                        </div>
                        <div class="harga1">
                        <p>Rp<?php echo $data['harga_produk']?></p>
                        </div>
                        <!-- <button id="tambah_ke_keranjang">Tambah Ke Keranjang</button> -->
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_produk']?>">
                            <input type="hidden" name="gambar_barang" value="<?= $data['gambar_barang']?>">
                            <input type="hidden" name="nama_barang" value="<?= $data['nama_barang']?>">
                            <input type="hidden" name="harga_produk" value="<?= $data['harga_produk']?>">
                            <input type="hidden" name="nama_user" value="<?=$nama1?>">
                            <input type="submit" name="tambah_barang" id="tambah_ke_keranjang" Value="Tambahkan Ke keranjang">
                        </form>
                    </div>
                </div>
                <div class="detail">
                    <p id="kamu1"><?php echo $data['nama_barang']?></p>
                    <p id="tgl_barang">Posted On:<?php echo $data['date_barang']?></p>
                    <p id="detail2">Detail Produk</p>
                    <p id="detail2"><?php echo $data['deskripsi_produk']?></p>
                    
                </div>
                <!-- <div class="detail">
                    <p class="kamu1"><?php echo $data['nama_barang']?></p>
                    <p class="detail">Detail Produk</p>
                    <p class="detail">
                        <?php echo $data['deskripsi_produk']?>
                    </p>
                </div> -->
                <div class="detail2">
                    <p class="textdetail">Comentar Produk</p>
                    <div id="netizen">
                    <?php
                    
                        while ($data1 = mysqli_fetch_array($query)){
                        echo $data1['nama_review'];?> <br><br><?php
                        echo $data1['komentar_review'];?><br><hr color="black" width="95%"><br>
                        <?php
                    }
                
                    ?>
                        <form action="lihat_data.php?id=<?= $data['id_produk']?>" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_produk']?>">
                            <p id="tambah1">Input Nama<br><input type="text" name="nama"></p>
                            <p id="tambah1">Input Komentar<br><input type="text" id="kny" name="komentar"></p>
                            <input type="submit" id="tambah_komen" name="tambah_review" Value="Tambah Komentar">
                        </form>
                    </div>
                </div>
                <?php
                include 'koneksi.php';
                if(isset($_POST['tambah_review'])){
                    $id_barang = $_POST['id'];
                    $nama = $_POST['nama'];
                    $komentar = $_POST['komentar'];
                    $sql = "SELECT max(id_barang) AS last_id FROM barang LIMIT 1";
                    $query = mysqli_query($conn, $sql);
                
                    
                    $sql = "INSERT INTO review_barang(id_barang,nama_review, komentar_review)
                            VALUES ('$id_barang','$nama', '$komentar')";
                    $query = mysqli_query($conn, $sql);
                    if ($query){
                    }
                    else{
                        die(mysqli_error($conn));
                        // echo"gagal".mysqli_error();
                    }
                    ?>
                    <meta http-equiv="refresh" content="0; url=lihat_data.php?id=<?= $data['id_produk']?>">
                    <?php
                }
                ?>
        </header>
    </div>
</body>
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