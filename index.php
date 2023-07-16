<?php 
    $page = 'dashboard'; 
    include('head.php'); 
    include('sidebar.php');
    //suzume - @Suzume2023   
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
                <h3>Data Akademik Mahasiswa/i Suzume</h3>
                <p class="text-subtitle text-muted">
                    Halaman ini berisi data akademik mahasiswa/i yang terdaftar di Suzume
                </p>
              </div>
            </div>
          </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
              <div class="card-header">
                <p class="fs-5 fw-bold fs-undelined">Tabel Akademik Mahasiswa Teknik Informatika</p>
                <hr>
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
                        <th>Avg Score</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        include('koneksi.php');
                        $sql = "SELECT * FROM mahasiswa where jurusan = 'Teknik Informatika'";
                        $query = mysqli_query($mysqli, $sql);
                        $no = 1;
                        while ($mahasiswa = mysqli_fetch_array($query)) {
                            if ($mahasiswa['jenis_kelamin'] == '1') {
                                $jk = 'Laki-laki';
                            } elseif ($mahasiswa['jenis_kelamin'] == '2') {
                                $jk = 'Perempuan';
                            }

                            echo "<tr>";

                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $mahasiswa['nim'] . "</td>";
                            echo "<td>" . $mahasiswa['nama'] . "</td>";
                            echo "<td>" . $mahasiswa['jurusan'] . "</td>";
                            echo "<td>" . $jk . "</td>";

                            $innerQuery = "SELECT AVG(nilai) AS rata_rata FROM nilai WHERE nim = '" . $mahasiswa['nim'] . "'";
                            $innerResult = mysqli_query($mysqli, $innerQuery);

                            if ($innerResult && mysqli_num_rows($innerResult) > 0) {
                                $row = mysqli_fetch_assoc($innerResult);
                                $rata_rata = $row['rata_rata'];

                                echo "<td>" . $rata_rata . "</td>";
                            } else {
                                echo "<td>Tidak ada data nilai</td>";
                            }

                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
          <!-- Basic Tables end -->

          <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
              <div class="card-header">
                <p class="fs-5 fw-bold fs-undelined">Tabel Akademik Mahasiswa Sistem Informasi</p>
                <hr>
              </div>
              <div class="card-body">
                <table class="table" id="table2">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Avg Score</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                        include('koneksi.php');
                        $sql = "SELECT * FROM mahasiswa where jurusan = 'Sistem Informasi'";
                        $query = mysqli_query($mysqli, $sql);
                        $no = 1;
                        while ($mahasiswa = mysqli_fetch_array($query)) {
                            if ($mahasiswa['jenis_kelamin'] == '1') {
                                $jk = 'Laki-laki';
                            } elseif ($mahasiswa['jenis_kelamin'] == '2') {
                                $jk = 'Perempuan';
                            }

                            echo "<tr>";

                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . $mahasiswa['nim'] . "</td>";
                            echo "<td>" . $mahasiswa['nama'] . "</td>";
                            echo "<td>" . $mahasiswa['jurusan'] . "</td>";
                            echo "<td>" . $jk . "</td>";

                            $innerQuery = "SELECT AVG(nilai) AS rata_rata FROM nilai WHERE nim = '" . $mahasiswa['nim'] . "'";
                            $innerResult = mysqli_query($mysqli, $innerQuery);

                            if ($innerResult && mysqli_num_rows($innerResult) > 0) {
                                $row = mysqli_fetch_assoc($innerResult);
                                $rata_rata = $row['rata_rata'];

                                echo "<td>" . $rata_rata . "</td>";
                            } else {
                                echo "<td>Tidak ada data nilai</td>";
                            }

                            echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
          <!-- Basic Tables end -->

<?php include('footer.php') ?>
