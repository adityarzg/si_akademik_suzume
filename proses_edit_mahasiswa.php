<?php

include('koneksi.php');
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];

$query = mysqli_query($mysqli, "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', jenis_kelamin='$jenis_kelamin', tgl_lahir='$tgl_lahir', alamat='$alamat' WHERE nim='$nim'");


if ($query) {
    header('location:mahasiswa.php?message=success');
} else {
    echo "Gagal mengedit data";
    echo "<br>";
    echo mysqli_error($mysqli);
}