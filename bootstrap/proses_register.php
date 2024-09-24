<?php
// Include database connection
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NIK = $_POST['NIK'];
    $Nama = $_POST['Nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jabatan = $_POST['id_jabatan'];
    $password = $_POST['password'];

    if(empty($NIK)){
        echo "<script>alert('NIK pegawai tidak boleh kosong');location.href='register.php';</script>";

    } elseif(empty($Nama)){
        echo "<script>alert('username tidak boleh kosong');location.href='register.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='register.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query(mysql:$conn,query: "insert into tabel_pegawai (NIK, Nama, jenis_kelamin, Alamat, password,id_jabatan) value ('".$NIK."','".$Nama."','".$jenis_kelamin."','".$alamat."','".md5($password)."','".$jabatan."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan pegawai');location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pegawai');location.href='register.php';</script>";
        }
    }
}
$conn->close();
?>

