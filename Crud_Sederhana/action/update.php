<?php
session_start();
if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;

}
    require "../fungsi.php";

    $idBarang = $_POST['id'];
    $namaBarang = $_POST['nama'];
    $jumlahBarang = $_POST['Jumlah'];

    $updated = save("UPDATE barang SET nama = '$namaBarang', jumlah = '$jumlahBarang' WHERE id = $idBarang");

    if ($updated){
        header("Location: /Crud_Sederhana/index.php");
    }else{
        echo "Gagal mengupdate data ke database";
        die();
    }