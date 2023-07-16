<?php

    include('koneksi.php');
    $kode_mk = $_POST['kode_mk'];
    $nama_mk = $_POST['nama_mk'];
    $sks = $_POST['sks'];

    $query = mysqli_query($mysqli, "UPDATE mata_kuliah SET nama_mk='$nama_mk', sks='$sks' WHERE kode_mk='$kode_mk'");

    if ($query) {
        header('location:mata_kuliah.php?message=success');
    } else {
        echo "Error : <br>" . mysqli_error($mysqli);
    }


