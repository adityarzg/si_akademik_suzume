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
                <h3>Data Manajemen Nilai</h3>
                <p class="text-subtitle text-muted">
                    Halaman ini berisi data nilai mahasiswa yang terdaftar di Suzume
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
                        Data Nilai
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
                <a class="btn btn-primary" href="tambah_nilai.php"><i class="bi bi-plus-square-fill"></i> Tambah Data Nilai</a>
              </div>
              <div class="card-body">
                <table class="table" id="table1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Nilai</th>
                      <th>Mahasiswa</th>
                      <th>Kode Matkul</th>
                      <th>Nilai</th>
                      <th>Semester</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        include('koneksi.php');
                        $no = 1;
                        $data = mysqli_query($mysqli,"select nl.*, mhs.nama from nilai as nl INNER JOIN mahasiswa as mhs on nl.nim = mhs.nim");
                        while($d = mysqli_fetch_array($data)){
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['id_nilai']; ?></td>
                        <td><?php echo $d['nim']; ?> - <?php echo $d['nama']; ?></td>
                        <td><?php echo $d['kode_mk']; ?></td>
                        <td><?php echo $d['nilai']; ?></td>
                        <td><?php echo $d['semester']; ?></td>
                        <td width="15%">
                            <a href="edit_nilai.php?id_nilai=<?php echo $d['id_nilai']; ?>" class="btn btn-warning btn-sm"><i class='bi bi-pencil'></i> Edit</a>
                            <!-- buat button dengan confirm message -->
                            <a href="proses_hapus_nilai.php?id_nilai=<?php echo $d['id_nilai']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin Hapus data?')"><i class='bi bi-trash'></i> Hapus</a>
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