<?php

include('koneksi.php');
$kode_mk = $_GET['kode_mk'];

$query = mysqli_query($mysqli, "DELETE FROM mata_kuliah WHERE kode_mk='$kode_mk'");

if ($query) {
    header('location:mata_kuliah.php?message=success');
} else {
    echo "Error : <br>" . mysqli_error($mysqli);
}