<?php

include('koneksi.php');
$nim = $_GET['nim'];

$query = mysqli_query($mysqli, "DELETE FROM mahasiswa WHERE nim='$nim'");

if ($query) {
    header('location:mahasiswa.php?message=success');
} else {
    echo "Gagal menghapus data";
    echo "<br>";
    echo mysqli_error($mysqli);
}