<?php
if ($_GET['id']) {
    include "koneksi.php";
    $qry_hapus = mysqli_query($conn, "delete from tabel_pegawai where id='" . $_GET['id'] . "'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses menghapus pegawai');location.href='tampil_pegawai.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus pegawai');location.href='tampil_pegawai.php';</script>";
    }
}
?>
