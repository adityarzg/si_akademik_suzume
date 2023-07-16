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
                <h3>Edit Data Mahasiswa</h3>
                <p class="text-subtitle text-muted">
                    Halaman ini berisi form untuk mengubah data mahasiswa
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
                      <a href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tambah Data Mahasiswa
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
                    <h4 class="card-title">
                        Form Edit Data Mahasiswa
                    </h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                    <?php
                        include 'koneksi.php';

                        // Memeriksa apakah ada data yang dikirim melalui metode POST atau GET
                        if (isset($_GET['nim'])) {
                            $id = $_GET['nim'];

                        // Mengambil data mahasiswa dari database berdasarkan ID
                        $query = mysqli_query($mysqli,"SELECT * FROM mahasiswa WHERE nim = '$id'");
                        
                        if ($query && mysqli_num_rows($query) > 0) {
                            $data = mysqli_fetch_assoc($query);
                    ?>
                      <form class="form" action="proses_edit_mahasiswa.php" method="POST">
                        <div class="row">
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="nim-column">NIM</label>
                              <input
                                type="text"
                                id="nim"
                                class="form-control"
                                name="nim"
                                value="<?php echo $data['nim']; ?>"
                                readonly
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-12 ">
                            <div class="form-group">
                              <label for="nama-column">Nama</label>
                              <input
                                type="text"
                                id="nama-column"
                                class="form-control"
                                name="nama"
                                value="<?php echo $data['nama']; ?>"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="jurusan-column">Jurusan</label>
                              <input
                                type="text"
                                id="jurusan-column"
                                class="form-control"
                                name="jurusan"
                                value="<?php echo $data['jurusan']; ?>"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="jk-mhs">Jenis Kelamin</label>
                              <fieldset class="form-group">
                                <?php
                                    if($data['jenis_kelamin'] == 1){
                                        $jk = "Laki-Laki";
                                    } elseif($data['jenis_kelamin'] == 2) {
                                        $jk= "Perempuan";
                                    }
                                ?>
                                <select class="form-select" name="jenis_kelamin" id="basicSelect">
                                  <option value="<?= $data['jenis_kelamin'] ?>"><?= $jk; ?></option>
                                  <option disabled value="">------------</option>
                                  <option value="1">Laki-Laki</option>
                                  <option value="2">Perempuan</option>
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <br>
                              <input type="date" class="form-control"  name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label class="form-label" >Alamat</label>
                              <textarea class="form-control" rows="2" name="alamat"><?= $data['alamat']; ?></textarea>
                            </div>
                          </div>
                          <div class="col-12 d-flex justify-content-end mt-4">
                            <a
                              href="mahasiswa.php"
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
                        <?php } else {
                            echo "Data tidak ditemukan.";
                        }} else {
                            echo "NIM tidak ditemukan.";
                        }
                        ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- // Basic multiple Column Form section end -->
        </div>

<?php include('footer.php') ?>