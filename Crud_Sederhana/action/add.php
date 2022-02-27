<?php
session_start();
if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;

}
    require "../fungsi.php";

    $namaBarang = $_POST['nama'];
    $JumlahBarang = $_POST['Jumlah'];
    $query = "INSERT INTO barang (Nama, Jumlah) VALUES ('$namaBarang', '$JumlahBarang')";
    $Inserted = save($query);

    if ($Inserted){
        header("Location: /Crud_Sederhana/index.php");
    }else{
        echo "Gagal memasukkan data ke database";
        die();
    }