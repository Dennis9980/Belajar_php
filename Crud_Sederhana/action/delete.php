<?php
session_start();
if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;

}

    require "../fungsi.php";

    $idBarang = $_GET['id'];
    $deleted = delete("DELETE from barang WHERE id = $idBarang");

    if ($deleted){
        header("Location: /Crud_Sederhana/index.php");
    }else{
        echo "Gagal menghapus data ke database";
        die();
    }