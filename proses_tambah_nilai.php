<?php

include('koneksi.php');
$id_nilai = $_POST['id_nilai'];
$nim = $_POST['nim'];
$kode_mk = $_POST['kode_mk'];
$nilai = $_POST['nilai'];
$semester = $_POST['semester'];

$query = mysqli_query($mysqli, "INSERT INTO nilai VALUES ('$id_nilai', '$nim', '$kode_mk', '$nilai', '$semester')");

if ($query) {
    header('location:nilai.php?message=success');
} else {
    echo "Error : <br>" . mysqli_error($mysqli);
}