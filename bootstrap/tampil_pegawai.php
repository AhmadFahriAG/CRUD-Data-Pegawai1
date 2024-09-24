<?php
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <section class="vh-100" style="background-color: #2779e2;"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>List Pegawai</title>
        
    </head>
    
    <body>
        <div class="container">
            <h3 class="text-center my-4">List Pegawai</h3>
            <div class="table-container">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PEGAWAI</th>
                            <th>NIK</th>
                            <th>ALAMAT</th>
                            <th>GENDER</th>
                            <th>NOMOR TELEPON</th>
                            <th>JABATAN</th>
                            <th>GAJI POKOK</th>
                            <th>TUNJANGAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $qry_pegawai = mysqli_query($conn, "SELECT * FROM `tabel_pegawai` INNER JOIN `tabel_jabatan` ON `tabel_pegawai`.`id_jabatan`=`tabel_jabatan`.`id_jabatan`;");

                        $no = 0;
                        while ($data_pegawai = mysqli_fetch_array($qry_pegawai)) {
                            $no++; ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data_pegawai['Nama'] ?></td>
                                <td><?= $data_pegawai['NIK'] ?></td>
                                <td><?= $data_pegawai['alamat'] ?></td>
                                <td><?= $data_pegawai['jenis_kelamin'] ?></td>
                                <td><?= $data_pegawai['no_tlp'] ?></td>
                                <td><?= $data_pegawai['id_jabatan'] ?></td>
                                <td><?= $data_pegawai['gaji_pokok']?></td>
                                <td><?= $data_pegawai['tunjangan']?></td>
                                <td>
                                    <a href="ubah.php?id=<?= $data_pegawai['id'] ?>" class="btn btn-success">Ubah</a> |
                                    <a href="hapus.php?id=<?= $data_pegawai['id'] ?>"
                                        onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                                        class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="text-left mt-4">
                <a href="register.php" class="btn btn-danger">tambah pegawai</a>
            </div>
            <div class="text-left mt-4">
                <a href="home.php" class="btn btn-danger">kembali</a>
            </div>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>
    
    </html>

