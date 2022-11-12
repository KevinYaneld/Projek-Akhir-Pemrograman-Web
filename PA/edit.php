<?php
    include 'koneksi.php';
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM produk INNER JOIN barang ON produk.id_produk = barang.id_produk WHERE produk.id_produk='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
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
    <link rel="stylesheet" href="tambah.css">
</head>
<body>
    <!-- <div class="bungkus">
        <header class="header">
            <div class="konten1">
                
                <div class="header2">
                    <button class="menuhp">Menu</button>
                    <div class="header1">
                        <ul class="menu">
                            <li><a href="admin.php">Home</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="tambah.php">Tambah</a></li>
                            <li class="login"><a href="logout.php">LogOut</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tambah_data">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['id_produk']?>">
                        <p id="tambah1">Jenis Produk<input type="text" name="jenis_produk" value="<?= $data['jenis_produk']?>"></p>
                        <p id="tambah1">Nama Barang<input type="text" name="nama_barang" value="<?= $data['nama_barang']?>"></p>
                        <p id="tambah1">Harga Produk <input type="number" name="harga_barang" value="<?= $data['harga_produk']?>"></p>
                        <p id="tambah1">Jumlah Barang<input type="number" name="jumlah_barang" value="<?= $data['jumlah_produk']?>"></p>
                        <p id="tambah1">Gambar Barang<input type="file" name="gambar_barang" value="<?= $data['gambar_barang']?>"></p>
                        <input type="submit" name="tambah_barang" Value="Tambah Barang">
                    </form>
                </div> -->
    <div class="center">
        <h1>Edit Data</h1>
        <form id="register" method="post" action = "" enctype="multipart/form-data">
            <input type = "hidden" name="id" value = "<?= $data['id_produk']?>">
            <div class="txt_field">
                <input type="text"  name="jenis_produk" value="<?= $data['jenis_produk']?>">
                <span></span>
                <label for="jenis_produk">Jenis Produk</label>
            </div>
            <div class="txt_field">
                <input type="text"name="nama_barang" value="<?= $data['nama_barang']?>">
                <span></span>
                <label for="nama_barang">Nama Barang</label>
            </div>
            <div class="txt_field">
                <input type="text" name="harga_barang" value="<?= $data['harga_produk']?>">
                <span></span>
                <label for="harga_produk">Harga Produk</label>
            </div>
            <div class="txt_field">
                <input type="text"  name="jumlah_barang" value="<?= $data['jumlah_produk']?>">
                <span></span>
                <label for="jumlah_barang">Jumlah Barang</label>
            </div>
            <div class="txt_field">
                <input type="file"name="gambar_barang"><br><br>
                <span></span>
                <label for="">Upload Gambar</label><br>
            </div>
        <input type="submit" name = "edit_barang" value="Update">

        </form>
    </div>

                <?php
                include 'koneksi.php';
                if(isset($_POST['edit_barang'])){
                    $jenis_produk = $_POST['jenis_produk'];
                    $nama_barang = $_POST['nama_barang'];
                    $harga_barang = $_POST['harga_barang'];
                    $jumlah_barang = $_POST['jumlah_barang'];

                    $gambar_barang = $_FILES['gambar_barang']['name'];
                    $x = explode('.', $gambar_barang);
                    $ekstensi = strtolower(end($x));
                    $gambar_baru = "$nama_barang.$ekstensi";

                    $tmp = $_FILES['gambar_barang']['tmp_name'];
                    move_uploaded_file($tmp, 'gambar_buku1/' . $gambar_baru);
                    $sql = "UPDATE produk SET jenis_produk='$jenis_produk',
                                            jumlah_produk='$jumlah_barang',
                                            harga_produk='$harga_barang'
                                            WHERE id_produk='{$_POST['id']}'";
                    $query = mysqli_query($conn, $sql);

                    $sql = "UPDATE barang SET nama_barang='$nama_barang',
                                            nama_barang='$nama_barang',
                                            gambar_barang='$gambar_baru'
                                            WHERE id_produk='{$_POST['id']}'";
                    $query = mysqli_query($conn, $sql);
                    if ($query){
                        echo "data berhasil diubah";
                        header('Location: admin.php');
                    }
                    else{
                        echo "data gagal diubah".mysqli_error($conn);
                    }                
            }

            ?>
        </header>
    </div>
</body>
</html>