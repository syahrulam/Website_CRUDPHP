<?php
include("./config.php");

if (isset($_POST['edit_data'])) {

    $id = $_POST['edit_id'];
    $nama = $_POST['edit_nama'];
    $noPeg = $_POST['edit_noPeg'];
    $jenis_kelamin = $_POST['edit_jenis_kelamin'];
    $direktorat = $_POST['edit_direktorat'];
    $agama = $_POST['edit_agama'];


    $sql = "UPDATE ptkami SET nama='$nama', noPeg='$noPeg', jenis_kelamin='$jenis_kelamin', direktorat='$direktorat', agama='$agama' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");