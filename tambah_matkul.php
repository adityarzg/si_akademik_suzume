<?php
    $page = 'matkul';
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
                <h3>Tambah Data Mata Kuliah</h3>
                <p class="text-subtitle text-muted">
                    Halaman ini berisi form untuk menambahkan data mata kuliah
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
                      <a href="mahasiswa.php">Mata Kuliah</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tambah Data Mata Kuliah
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
                    <h4 class="card-title">Form Data Mata Kuliah</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form" action="proses_tambah_matkul.php" method="POST">
                        <div class="row">
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="kodeMk-column">Kode Mata Kuliah</label>
                              <input
                                type="text"
                                id="kode_mk"
                                class="form-control"
                                name="kode_mk"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-12 ">
                            <div class="form-group">
                              <label for="namaMatkul-column">Nama Mata Kuliah</label>
                              <input
                                type="text"
                                id="namaMatkul-column"
                                class="form-control"
                                name="nama_mk"
                              />
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <label for="sks-column">SKS</label>
                              <input
                                type="text"
                                id="sks-column"
                                class="form-control"
                                name="sks"
                              />
                            </div>
                          </div>
                          </div>
                          <div class="col-12 d-flex justify-content-end mt-4">
                            <a
                              href="mata_kuliah.php"
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