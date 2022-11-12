<?php
    include 'koneksi.php';

    $id = (int) $_GET['id'];

    if($id){
        $gambar_icon = "SELECT gambar_barang FROM keranjang WHERE id_keranjang = '{$id}'";
        $data_gambar = mysqli_query($conn, $gambar_icon);
        $gambar = mysqli_fetch_array($data_gambar);
        unlink("keranjang/".$gambar['gambar_barang']); 

        $sql = "DELETE FROM keranjang WHERE id_keranjang='{$id}'";
        $query = mysqli_query($conn, $sql);

        $sql = "DELETE FROM keranjang WHERE id_keranjang='{$id}'";
        $query = mysqli_query($conn, $sql);
    }
    header('Location: keranjang_asli.php'); 
    exit;
?>