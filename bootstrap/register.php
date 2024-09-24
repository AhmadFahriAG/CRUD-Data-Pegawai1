<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
    <title>Register</title>
</head>
<body>
    <h3>Register</h3>
    <form action="proses_register.php" method="post">
        NIK :
        <input type="text" name="NIK" value="" class="form-control">
        Password :
        <input type="password" name="password"class="form-control form-control -lg" required / >

        Nama :
        <input type="text" name="Nama" value="" class="form-control">
        No telp :
        <input type"text" id="no_tlp" class="form-control form-control -lg" required />
        jenis kelamin :
        <select name="jenis_kelamin" class="form-control">
            <option></option>
                <option value="L">laki-laki</option>
                <option value="P">perempuan</option>
        </select>
        Alamat :
        <textarea name="alamat" class="form-control" rows="4"></textarea>
        jabatan :
        <select name="id_jabatan" class="form-control">
            <option></option>
            <?php
            include "koneksi.php";
            $qry_jabatan=mysqli_query($conn,"select * from tabel_jabatan");
            while($data_jabatan=mysqli_fetch_array($qry_jabatan)){
                echo '<option value="'.$data_jabatan ['id_jabatan'].'">'.$data_jabatan['nama_jabatan'].'</option>';
            }?>

        <input type="submit" name="simpan" value="Submit" class="btn btn-primary">
        <p class ="text-center text-muted mt-5 mb-0">sudah punya akun ? <a href="login.php" class="fw-bold text-body"><u>login</u></a></p>
    </form>


    <script src=="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
