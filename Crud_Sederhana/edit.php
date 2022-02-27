<?php
session_start();
if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;

}
    require "fungsi.php";
    
    $idBarang = $_GET['id'];
    $barang = get("SELECT * FROM barang WHERE id = $idBarang");
    $barang = $barang[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit data</title>
</head>
<body>
    <div class="container">
        <h1>Edit Data</h1>
        <form action="./action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $idBarang?>">
            <div class="form-group">
                <label for="Nama">Barang</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $barang['Nama']?>">
            </div>
            <div class="form-group">
                <label for="Jumlah">Jumlah</label>
                <input type="text" name="Jumlah" id="Jumlah" class="form-control" value="<?php echo $barang['Jumlah']?>">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</body>
</html>