<?php
include("./config.php");

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $noPeg = $_POST['noPeg'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $direktorat = $_POST['direktorat'];
    $agama = $_POST['agama'];

    $sql = "INSERT INTO ptkami(nama, noPeg, jenis_kelamin, direktorat, agama)
    VALUES('$nama', '$noPeg', '$jenis_kelamin', '$direktorat', '$agama')";
    $query = mysqli_query($db, $sql);

    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Akses dilarang...");