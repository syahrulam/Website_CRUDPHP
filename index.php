<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Data Pegawai</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card mb-5">
            <div class="card-body">
                <h3 class="card-title">Tambah Data Pegawai</h3>
                <?php if (isset($_GET['status'])) : ?>
                <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil ditambahkan!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal ditambahkan!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="tambah.php" method="POST">

                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama..." required>
                    </div>
                    <div class="col-md-6">
                        <label for="noPeg" class="form-label">Nomor Pekerja</label>
                        <input type="text" name="noPeg" class="form-control" placeholder="Nomor Pekerja..." required>
                    </div>

                    <div class="col-md-6">
                        <label for="Agama" class="form-label">Agama</label>
                        <select class="form-select" name="agama" aria-label="Default select example">
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Islam">Islam</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="direktorat" class="form-label">Direktorat</label>
                        <select class="form-select" name="direktorat" aria-label="Default select example">
                            <option value="Utama">Utama</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Development">Development</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="tittle" class="form-label">Jenis Kelamin</label>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="jenis_kelamin">Laki-Laki</label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki">
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i
                                class="fa fa-plus"></i><span class="ms-2">Tambah Data</span></button>
                    </div>
                </form>
            </div>
        </div>


        <h5 class="mb-3">Daftar Pegawai</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Tampilkan</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Cari..." aria-label="cari"
                        aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <?php if (isset($_GET['hapus'])) : ?>
        <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil dihapus!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal dihapus!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <?php if (isset($_GET['update'])) : ?>
        <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Sukses!</strong> Data berhasil diupdate!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal diupdate!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>Nama</th>";
            echo "<th scope='col'>Nomor Pekerja</th>";
            echo "<th scope='col'>Jenis Kelamin</th>";
            echo "<th scope='col'>Direktorat</th>";
            echo "<th scope='col'>Agama</th>";
            echo "<th scope='col' class='text-center'>Opsi</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM ptkami");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_pegawai = mysqli_query($db, "SELECT * FROM ptkami LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;


            while ($ptkami = mysqli_fetch_array($data_pegawai)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $ptkami['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $ptkami['nama'] . "</td>";
                echo "<td>" . $ptkami['noPeg'] . "</td>";
                echo "<td>" . $ptkami['jenis_kelamin'] . "</td>";
                echo "<td>" . $ptkami['direktorat'] . "</td>";
                echo "<td>" . $ptkami['agama'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>Tidak ada data yang tersedia pada tabel ini</p>";
            } else {
                echo "<p>Total $jumlah_data entri</p>";
            }

            echo "</div>";
            ?>
        </div>

        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i
                            class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i
                            class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1'
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Edit Data Pegawai</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM ptkami";
                    $query = mysqli_query($db, $sql);
                    $ptkami = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_nama" class="form-label">Nama</label>
                                <input type="text" name="edit_nama" id="edit_nama" class="form-control"
                                    placeholder="Steve Jobs" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_noPeg" class="form-label">Nomor Pekerja</label>
                                <input type="text" name="edit_noPeg" id="edit_noPeg" class="form-control"
                                    placeholder="G64190021" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_agama" class="form-label">Agama</label>
                                <select class="form-select" name="edit_agama" id="edit_agama"
                                    aria-label="Default select example">
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                </select>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <div class="col-md-12" id="gender">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            <input class="form-check-input" type="radio" name="edit_jenis_kelamin"
                                                value="Laki-Laki" id="cowok">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="jenis_kelamin">
                                            <input class="form-check-input" type="radio" name="edit_jenis_kelamin"
                                                value="Perempuan" id="cewek">Perempuan</label>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 mb-3">
                                <label for="edit_direktorat" class="form-label">Direktorat</label>
                                <input type="text" name="edit_direktorat" class="form-control" id="edit_direktorat"
                                    placeholder="Ilmu Komputer" required>
                            </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Simpan</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1'
            aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Konfirmasi</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>Yakin ingin menghapus data ini?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Hapus</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
    $(document).ready(function() {
        $('.editButton').on('click', function() {
            $('#editModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#edit_id').val(data[0]);
            $('#edit_nama').val(data[2]);
            $('#edit_noPeg').val(data[3]);
            $('#gender').val(data[4]);
            if (data[4] == "Laki-Laki") {
                $("#cowok").prop("checked", true);
            } else {
                $("#cewek").prop("checked", true);
            }

            $('#edit_direktorat').val(data[5]);
            $('#edit_agama').val(data[6]);
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('.deleteButton').on('click', function() {
            $('#deleteModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_id').val(data[0]);
        });
    });
    </script>

    <script>
    function clicking() {
        window.location.href = './index.php';
    }
    </script>
</body>

</html>