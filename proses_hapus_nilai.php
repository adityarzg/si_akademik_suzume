<?php

    include('koneksi.php');
    $id_nilai = $_GET['id_nilai'];

    $query = "DELETE FROM nilai WHERE id_nilai='$id_nilai'";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        header("Location:nilai.php?message=success");
    } else {
        echo "Hapus data gagal";
    }