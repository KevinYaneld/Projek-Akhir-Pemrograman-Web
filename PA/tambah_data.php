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
                            <li class="login"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tambah_data">
                    <form action="" method="post" enctype="multipart/form-data">
                        <p id="tambah1">Jenis Produk<input type="text" name="jenis_produk"></p>
                        <p id="tambah1">Nama Barang<input type="text" name="nama_barang"></p>
                        <p id="tambah1">Harga Produk <input type="number" name="harga_barang"></p>
                        <p id="tambah1">Jumlah Barang<input type="number" name="jumlah_barang"></p>
                        <p id="tambah1">Gambar Barang<input type="file" name="gambar_barang"></p>
                        <input type="submit" name="tambah_barang" Value="Tambah Barang">
                    </form>
                </div> -->
    <div class="center">
        <h1>Tambah Data</h1>
        <form  method="post" action = "" enctype="multipart/form-data">
            <div class="txt_field">
                <p>Tanggal Tambah Data : <?= date("d-m-Y") ?></p>
            </div>
            <div class="txt_field">
                <input type="text" name="jenis_produk">
                <span></span>
                <label for="jenis_produk">Jenis Produk</label>
            </div>
            <div class="txt_field">
                <input type="text" name="nama_barang">
                <span></span>
                <label for="nama_barang">Nama Barang</label>
            </div>
            <div class="txt_field">
                <input type="text" name="harga_barang">
                <span></span>
                <label for="harga_barang">Harga Barang</label>
            </div>
            <div class="txt_field">
                <input type="number" name="jumlah_barang">
                <span></span>
                <label for="jumlah_barang">Jumlah Barang</label>
            </div>
            <div class="txt_field">
                <input type="text" name="deskripsi_barang">
                <span></span>
                <label for="deskripsi_barang">Deskripsi Barang</label>
            </div>
            <div class="txt_field">
                <input type="file" name="gambar_barang"><br><br>
                <span></span>
                <label for="">Upload Gambar</label><br>
            </div>
        <input type="hidden" name="tanggal" value=<?= date("d-m-Y") ?>>
        <input type="submit" name = "tambah_barang" value="Tambah">

        </form>
    </div>
                <?php
                include 'koneksi.php';
                if(isset($_POST['tambah_barang'])){
                    $jenis_produk = $_POST['jenis_produk'];
                    $nama_barang = $_POST['nama_barang'];
                    $harga_barang = $_POST['harga_barang'];
                    $jumlah_barang = $_POST['jumlah_barang'];
                    $deskripsi_barang = $_POST['deskripsi_barang'];

                    $gambar_barang = $_FILES['gambar_barang']['name'];
                    $x = explode('.', $gambar_barang);
                    $ekstensi = strtolower(end($x));
                    $gambar_baru = "$nama_barang.$ekstensi";

                    $tmp = $_FILES['gambar_barang']['tmp_name'];

                    if(move_uploaded_file($tmp, 'gambar_buku1/' . $gambar_baru)){
                        $sql = "INSERT INTO produk(jenis_produk, harga_produk, jumlah_produk, deskripsi_produk)
                                VALUES ('$jenis_produk', '$harga_barang', '$jumlah_barang', '$deskripsi_barang')";
                        $query = mysqli_query($conn, $sql);

                        $sql = "SELECT max(id_produk) AS last_id FROM produk LIMIT 1";
                        $query = mysqli_query($conn, $sql);

                        $data = mysqli_fetch_array($query);
                        $last_id = $data['last_id'];

                        $sql = "INSERT INTO barang(id_produk,nama_barang,gambar_barang)
                                VALUES ('$last_id', '$nama_barang', '$gambar_baru')";
                        $query = mysqli_query($conn, $sql);
                        if ($query){
                            echo"OKEE DEKK";
                            header('Location: admin.php');
                        }
                        else{
                            die(mysqli_error($conn));
                            // echo"gagal".mysqli_error();
                        }
                    }
                }

                ?>
        </header>
    </div>
</body>
</html>