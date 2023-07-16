<?php 
    $page = 'mahasiswa';
    include('head.php'); 
    include('sidebar.php');
?>

<div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>

        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Mahasiswa Suzume</h3>
                <p class="text-subtitle text-muted">
                    Halaman ini berisi data mahasiswa yang terdaftar di Suzume
                </p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Data Mahasiswa
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- Basic Tables start -->
          <section class="section">
            <div class="card">
              <div class="card-header">
                <a class="btn btn-primary" href="tambah_mahasiswa.php"><i class="bi bi-plus-square-fill"></i> Tambah Data Mahasiswa</a>
              </div>
              <div class="card-body">
                <table class="table" id="table1">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        include('koneksi.php');
                        $sql = "SELECT * FROM mahasiswa";
                        $query = mysqli_query($mysqli, $sql);
                        $no = 1;

                        while($mahasiswa = mysqli_fetch_array($query)){
                            if($mahasiswa['jenis_kelamin'] == '1'){
                                $jk = 'Laki-laki';
                            } elseif($mahasiswa['jenis_kelamin'] == '2'){
                                $jk = 'Perempuan';
                            }

                            echo "<tr>";

                            echo "<td>".$no++."</td>";
                            echo "<td>".$mahasiswa['nim']."</td>";
                            echo "<td>".$mahasiswa['nama']."</td>";
                            echo "<td>".$mahasiswa['jurusan']."</td>";
                            echo "<td>".$jk."</td>";
                            echo "<td>".$mahasiswa['tgl_lahir']."</td>";
                            echo "<td>".$mahasiswa['alamat']."</td>";

                            echo "<td width='15%'>";
                            echo "<a href='edit_mahasiswa.php?nim=".$mahasiswa['nim']."' class='btn btn-sm btn-warning'><i class='bi bi-pencil'></i> Edit</a> &nbsp;";
                            //create confirm message to confirm the delete action
                            echo "<a href='proses_hapus_mahasiswa.php?nim=".$mahasiswa['nim']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'><i class='bi bi-trash'></i> Hapus</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
          <!-- Basic Tables end -->
        </div>

<?php include('footer.php') ?>