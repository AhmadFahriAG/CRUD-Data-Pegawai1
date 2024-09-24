<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry_get_pegawai = mysqli_query($conn, "SELECT * FROM tabel_pegawai WHERE id = '$id'");
    if (mysqli_num_rows($qry_get_pegawai) > 0) {
        $data = mysqli_fetch_array($qry_get_pegawai);
    } else {
        echo "Pegawai tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h3 {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
        }

        .text-center {
            margin-top: 20px;
        }

        .text-muted a {
            color: #007bff;
        }

        .text-muted a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Ubah Pegawai</title>
</head>
<body>
    <div class="container">
        <h3>Ubah Pegawai</h3>
        <form action="proses_ubah_pegawai.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            
            <div class="mb-3">
                <label>NIK:</label>
                <input type="text" name="NIK" value="<?= $data['NIK'] ?>" class="form-control">
            </div>
            
            <div class="mb-3">
                <label>Nama Pegawai:</label>
                <input type="text" name="Nama" value="<?= $data['Nama'] ?>" class="form-control">
            </div>
            
            <div class="mb-3">
                <label>Jenis Kelamin:</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="L" <?= $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label>Alamat:</label>
                <textarea name="alamat" class="form-control" rows="3"><?= $data['alamat'] ?></textarea>
            </div>
            
            <div class="mb-3">
                <label>Nomor Telepon:</label>
                <input type="text" name="no_tlp" value="<?= $data['no_tlp'] ?>" class="form-control">
            </div>
            
            <div class="mb-3">
                <label>Jabatan:</label>
                <select name="id_jabatan" class="form-control">
                    <option value="">Pilih Jabatan</option>
                    <?php
                    $qry_jabatan = mysqli_query($conn, "SELECT * FROM tabel_jabatan");
                    while ($jabatan = mysqli_fetch_array($qry_jabatan)) {
                        $selected = ($jabatan['id_jabatan'] == $data['id_jabatan']) ? 'selected' : '';
                        echo '<option value="' . $jabatan['id_jabatan'] . '" ' . $selected . '>' . $jabatan['nama_jabatan'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label>Password (kosongkan jika tidak ingin mengubah):</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Ubah Pegawai</button>
        </form>
    </div>
</body>
</html>