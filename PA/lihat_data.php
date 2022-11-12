<?php
    include 'koneksi.php';
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM produk  JOIN barang ON produk.id_produk = barang.id_produk WHERE produk.id_produk='$id'";
    
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
?>
<?php
    include 'koneksi.php';
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM review_barang WHERE review_barang.id_barang= $id";
    
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
    <link rel="stylesheet" href="lihat_data.css">
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
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">About</a></li>
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
                        <button id="tambah_ke_keranjang">Tambah Ke Keranjang</button>
                    </div>
                </div>
                <div class="detail">
                    <p class="kamu1"><?php echo $data['nama_barang']?></p>
                    <p class="detail">Detail Produk</p>
                    <p class="detail">
                        <?php echo $data['deskripsi_produk']?>
                    </p>
                </div>
                <div class="detail2">
                    <p class="textdetail">Comentar Produk</p>
                    <div id="netizen">
                    <?php
                    if($data1 == NULL){
                        echo "kosong";
                    }
                    else{
                        
                        while ($data1 = mysqli_fetch_array($query)){
                        echo $data1['nama_review'];?> <br><br><?php
                        echo $data1['komentar_review'];?><br><hr color="black" width="95%"><br>
                        <?php
                    }
                }
                    ?>
                        <form action="lihat_data.php?id=<?= $data['id_produk']?>" method="post">
                            <input type="hidden" name="id" value="<?= $data['id_produk']?>">
                            <p id="tambah1">Input Nama<br><input type="text" name="nama"></p>
                            <p id="tambah1">Input Komentar<br><input type="text" id="kny" name="komentar"></p>
                            <input type="submit" name="tambah_review" Value="Tambah Barang">
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