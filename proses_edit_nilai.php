<?php

include('koneksi.php');
$id_nilai = $_POST['id_nilai'];
$nilai = $_POST['nilai'];
$semester = $_POST['semester'];

$query = mysqli_query($mysqli, "UPDATE nilai SET nilai ='$nilai', semester = '$semester' WHERE id_nilai = '$id_nilai'");

if ($query) {
    header('location:nilai.php?message=success');
} else {
    echo "Error : <br>" . mysqli_error($mysqli);
}