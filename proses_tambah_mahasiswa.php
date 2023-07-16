<?php

include('koneksi.php');
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];

$query = mysqli_query($mysqli, "INSERT INTO mahasiswa VALUES('$nim','$nama','$jurusan','$jenis_kelamin','$tgl_lahir','$alamat')");

// var_dump($alamat);exit();

if ($query) {
    header('location:mahasiswa.php?message=success');
} else {
    echo "Gagal menambah data";
    echo "<br>";
    echo mysqli_error($mysqli);
}