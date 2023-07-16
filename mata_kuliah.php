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
                <h3>Data Manajemen Mata Kuliah</h3>
                <p class="text-subtitle text-muted">
                    Halaman ini berisi data mata kuliah yang terdaftar di Suzume
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
                        Data Mata Kuliah
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
                <a class="btn btn-primary" href="tambah_matkul.php"><i class="bi bi-plus-square-fill"></i> Tambah Data Mata Kuliah</a>
              </div>
              <div class="card-body">
                <table class="table" id="table1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Mata Kuliah</th>
                      <th>Nama Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        include('koneksi.php');
                        $no = 1;
                        $data = mysqli_query($mysqli,"select * from mata_kuliah");
                        while($d = mysqli_fetch_array($data)){
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['kode_mk']; ?></td>
                        <td><?php echo $d['nama_mk']; ?></td>
                        <td><?php echo $d['sks']; ?></td>
                        <td width="15%">
                            <a href="edit_matkul.php?kode_mk=<?php echo $d['kode_mk']; ?>" class="btn btn-warning btn-sm"><i class='bi bi-pencil'></i> Edit</a>
                            <!-- buat button dengan confirm message -->
                            <a href="proses_hapus_matkul.php?kode_mk=<?php echo $d['kode_mk']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin Hapus data?')"><i class='bi bi-trash'></i> Hapus</a>
                        </td>
                      </tr>
                    <?php 
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