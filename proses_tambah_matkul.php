<?php

include('koneksi.php');
$kode_mk = $_POST['kode_mk'];
$nama_mk = $_POST['nama_mk'];
$sks = $_POST['sks'];

$query = mysqli_query($mysqli,"insert into mata_kuliah values('$kode_mk','$nama_mk','$sks')");

if($query){
    header('location:mata_kuliah.php?message=success');
} else{
    echo mysqli_error($mysqli);
}