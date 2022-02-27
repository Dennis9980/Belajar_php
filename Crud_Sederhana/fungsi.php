<?php
    require "DataBase.php";
    
    function get($query){
        global $connection;
        $result = mysqli_query($connection, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function save($query){
        global $connection;
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }

    function delete($query){
        global $connection;
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }

    function registrasi($data){
        global $connection;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($connection, $data["password"]);
        $password2 = mysqli_real_escape_string($connection, $data["password2"]);
        
        //cek username sudah ada atau belum
        $result = mysqli_query($connection, "SELECT username FROM user WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script> alert('username yang anda pilih sudah terdaftar!!')</script>";
            return false;
        }

        if ($password !== $password2){
            echo "<script> alert('konfirmasi password tidak sesuai!!')</script>";
            return false;
        }
        //enkripsi pass
        $password = password_hash($password, PASSWORD_DEFAULT);
        //tambah user baru
        mysqli_query($connection, "INSERT INTO user VALUES('', '$username', '$password')");
        
        return mysqli_affected_rows($connection);

    }