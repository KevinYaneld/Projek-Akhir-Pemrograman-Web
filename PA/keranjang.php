<style>
    body{
        background-color: #FECD70;
    }
</style>
<?php
    session_start();
    include 'koneksi.php';
        
    $nama1 = $_SESSION['user']['username'];
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM produk INNER JOIN barang ON produk.id_produk = barang.id_produk WHERE produk.id_produk='$id'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);


?>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data['id_produk']?>">
    <input type="hidden" name="gambar_barang" value="<?= $data['gambar_barang']?>">
    <input type="hidden" name="nama_barang" value="<?= $data['nama_barang']?>">
    <input type="hidden" name="harga_produk" value="<?= $data['harga_produk']?>">
    <input type="hidden" name="nama_user" value="<?=$nama1?>">
    <input type="submit" name="tambah_barang" Value="Tambahkan Ke keranjang">
</form>
<?php echo $nama1?>
<?php

    
    include 'koneksi.php';
    if($_POST){
        echo"1";
        
        $namnya = $data['nama_barang'];
        $kamu = ['tmp_name'];
        $gambar_upload = $_POST['gambar_barang'];
        $nama_upload = $_POST['nama_barang'];
        $harga_barang_upload = $_POST['harga_produk'];
        $nama_user = $_POST['nama_user'];
        $fileku = 'gambar_buku1/'.$gambar_upload;
        $filenya = 'keranjang/'.$gambar_upload;
        copy($fileku, $filenya);
        // copy($data['gambar_barang'], 'keranjang/' .$gambar_upload);
        $sql = "INSERT INTO keranjang(gambar_barang, nama_barang, harga_barang, nama_user)
                            VALUES ('$gambar_upload', '$nama_upload', '$harga_barang_upload', '$nama_user')";
        $query = mysqli_query($conn, $sql);
        // require "/gambar_buku1/to/keranjang";
        if ($query){
            echo "data berhasil diubah";
            
            header('Location: keranjang_asli.php');
        }
        else{
            echo "data gagal diubah".mysqli_error($conn);
        }
    }
?>