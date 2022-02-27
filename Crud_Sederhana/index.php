<?php
session_start();
if( !isset($_SESSION["login"])){
    header("location: login.php");
    exit;

}

require "./fungsi.php";

$dataBarang = get("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Data Barang</title>
</head>
<body>
    <div class="container">
        <a href="logout.php">Logout</a>
        <h1>Data Barang</h1>
        <a href="tambah.php" class="btn btn-primary">Tambah data</a>
        <table class="table table-bordered">
        <thead>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php foreach($dataBarang as $barang): ?>
                <tr>
                    <td><?php echo $barang['Nama'] ?></td>
                    <td><?php echo $barang['Jumlah'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $barang['id']?>" class="btn btn-info">Edit</a>
                        <a href="action/delete.php?id=<?php echo $barang['id']?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    
</body>
</html>