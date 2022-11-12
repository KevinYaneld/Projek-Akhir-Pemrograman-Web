<?php
    include 'koneksi.php';

    $id = (int) $_GET['id'];

    if($id){
        echo $id; 
        $gambar_icon = "SELECT gambar_barang FROM barang WHERE id_barang = '$id'";
        $data_gambar = mysqli_query($conn, $gambar_icon);
        $gambar = mysqli_fetch_array($data_gambar);
        unlink('gambar_buku1/'.$gambar['gambar_barang']); 

        $sql = "DELETE FROM barang WHERE id_produk='{$id}'";
        $query = mysqli_query($conn, $sql);

        $sql = "DELETE FROM produkk WHERE id_produk='{$id}'";
        $query = mysqli_query($conn, $sql);
    }
    header('Location: admin.php'); 
    exit;
?>