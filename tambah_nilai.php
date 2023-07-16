<?php
    $page = 'nilai';
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
                <h3>Tambah Data Nilai Mahasiswa</h3>
                <p class="text-subtitle text-muted">
                    Halaman ini berisi form untuk menambahkan data nilai mahasiswa
                </p>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="mahasiswa.php">Nilai</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tambah Data Nilai
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- // Basic multiple Column Form section start -->
          <section id="multiple-column-form">
            <div class="row match-height">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Form Nilai Mahasiswa</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                    <?php
                        include('koneksi.php');
                        $sql = "SELECT * FROM mahasiswa";
                        $sql2 = "SELECT * FROM mata_kuliah";
                        $query = "SELECT SUBSTRING(id_nilai, 4, 3) AS middle_value FROM nilai ORDER BY id_nilai DESC LIMIT 1";
                        $result = mysqli_query($mysqli, $query);
                        if ($result && mysqli_num_rows($result) > 0) {
                          $row = mysqli_fetch_assoc($result);
                          $middle_value = $row['middle_value'];
                          $middle_value += 1; // Menambahkan 1 ke nilai tengah
                          $tahun = date("Y"); // Mendapatkan tahun saat ini
                          $idNilai = "NL-" . str_pad($middle_value, 3, "0", STR_PAD_LEFT) . "-" . $tahun;
                        } else {
                            echo "Tidak ada data nilai";
                        }
                        mysqli_free_result($result);
                    ?>
                      <form class="form" action="proses_tambah_nilai.php" method="POST">
                        <div class="row">
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="idNilai-column">ID Nilai</label>
                              <input
                                type="text"
                                id="idNilai-column"
                                class="form-control"
                                name="id_nilai"
                                value="<?php echo $idNilai; ?>"
                                required
                                readonly
                              />
                            </div>
                            <div class="form-group">
                              <label for="idNilai-column">Kode Mata Kuliah</label>
                              <?php
                                $result = mysqli_query($mysqli, $sql2);
                                echo "<select class='form-select' name='kode_mk' id='basicSelect'>";
                                echo "<option value=''>- Pilih Kode Mata Kuliah-</option>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value='" . $row['kode_mk'] . "'>" . $row['kode_mk'] . " - " . $row['nama_mk'] . "</option>";
                                }
                                echo "</select>";
                              ?>
                            </div>
                          </div>
                          <div class="col-md-6 col-12 ">
                            <div class="form-group">
                              <label for="nim-column">NIM</label>
                              <?php
                                $result = mysqli_query($mysqli, $sql);
                                echo "<select class='form-select' name='nim' id='basicSelect'>";
                                echo "<option value=''>- Pilih NIM Mahasiswa/i-</option>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value='" . $row['nim'] . "'>" . $row['nim'] . " - " . $row['nama'] . "</option>";
                                }
                                echo "</select>";
                              ?>
                            </div>
                            <div class="form-group">
                              <label for="nilai-column">Nilai</label>
                              <input
                                type="text"
                                id="nilai-column"
                                class="form-control"
                                name="nilai"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-12 ">
                            <div class="form-group">
                              <label for="semester-column">Semester</label>
                              <input
                                type="text"
                                id="semester-column"
                                class="form-control"
                                name="semester"
                              />
                            </div>
                          </div>
                          <div class="col-12 d-flex justify-content-end mt-4">
                            <a
                              href="nilai.php"
                              class="btn btn-secondary me-1 mb-1"
                            >
                              KEMBALI
                            </a>
                            <button
                              type="submit"
                              class="btn btn-primary me-1 mb-1"
                            >
                              SIMPAN
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- // Basic multiple Column Form section end -->
        </div>

<?php include('footer.php') ?>