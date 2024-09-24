<?php
include "koneksi.php"; 
if ($_POST) {
    $id = $_POST['id'];
    $NIK = $_POST['NIK'];
    $Nama = $_POST['Nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];
    $id_jabatan = $_POST['id_jabatan'];
    $password = $_POST['password'];
    if (empty($password)) {
        $query = "UPDATE tabel_pegawai SET
                  NIK = '$NIK',
                  Nama = '$Nama',
                  jenis_kelamin = '$jenis_kelamin',
                  alamat = '$alamat',
                  no_tlp = '$no_tlp',
                  id_jabatan = '$id_jabatan'
                  WHERE id = '$id'";
    } else {
        $query = "UPDATE tabel_pegawai SET
                  NIK = '$NIK',
                  Nama = '$Nama',
                  jenis_kelamin = '$jenis_kelamin',
                  alamat = '$alamat',
                  no_tlp = '$no_tlp',
                  id_jabatan = '$id_jabatan',
                  password = '$password'
                  WHERE id = '$id'";
    }
    $update = mysqli_query($conn, $query);
    if ($update) {
        echo "<script>alert('Data pegawai berhasil diubah!');location.href='tampil_pegawai.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data pegawai: " . mysqli_error($conn) . "');location.href='ubah.php'?id=$id';</script>";
    }
}
?>