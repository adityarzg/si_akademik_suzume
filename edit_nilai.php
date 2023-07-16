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
                <h3>Edit Data Nilai Mahasiswa</h3>
                <p class="text-subtitle text-muted">
                    Halaman ini berisi form untuk mengubah data nilai mahasiswa
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
                        Edit Data Nilai
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
                        $id_nilai = $_GET['id_nilai'];
                        $query = "SELECT nl.*, mhs.nim, mhs.nama, mk.nama_mk
                                FROM nilai AS nl
                                INNER JOIN mahasiswa AS mhs ON nl.nim = mhs.nim
                                INNER JOIN mata_kuliah AS mk ON nl.kode_mk = mk.kode_mk
                                WHERE id_nilai='$id_nilai'";
                        $result = mysqli_query($mysqli, $query);
                        while($d = mysqli_fetch_array($result)) {
                    ?>
                      <form class="form" action="proses_edit_nilai.php" method="POST">
                        <div class="row">
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="idNilai-column">ID Nilai</label>
                              <input
                                type="text"
                                id="idNilai-column"
                                class="form-control"
                                name="id_nilai"
                                value="<?php echo $d['id_nilai']; ?>"
                                readonly
                              />
                            </div>
                            <div class="form-group">
                              <label for="idNilai-column">Kode Mata Kuliah</label>
                              <?php
                                echo "<select class='form-select' name='kode_mk' id='basicSelect' readonly>";
                                echo "<option value='".$d['kode_mk']."'>" . $d['kode_mk'] ." - " . $d['nama_mk'] . "</option>";
                                echo "</select>";
                              ?>
                            </div>
                          </div>
                          <div class="col-md-6 col-12 ">
                            <div class="form-group">
                              <label for="nim-column">NIM</label>
                              <?php
                                echo "<select class='form-select' name='nim' id='basicSelect' readonly>";
                                echo "<option value='".$d['nim']."'>" . $d['nim'] ." - " . $d['nama'] . "</option>";
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
                                value="<?php echo $d['nilai']; ?>"
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
                                value="<?php echo $d['semester']; ?>"
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
                    <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- // Basic multiple Column Form section end -->
        </div>

<?php include('footer.php') ?>