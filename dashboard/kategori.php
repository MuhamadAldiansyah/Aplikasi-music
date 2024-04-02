<?php include "header.php";
include "sidebar.php"; ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="form_kategori.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
               
                <div class="card-tools">
                <a class="btn btn-primary" href="form_kategori.php">
                    Tambah Data
                </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                       include "../../config.php";
                        $sql = "SELECT * FROM kategori";
                                        $query = mysqli_query($conn, $sql);

                                        foreach ($query as $data) {
                                        ?>
                    <tr>
                     
                      <td>  <?php echo $data['nama'] ?></td>
                      <td width="90px" align="center">
       <a class="btn btn-primary" href="edit_kategori.php?id_kategori=<?php echo $data['id_kategori']; ?>">
       <i class="fas fa-edit"></i></a>

  
      
       <a class="btn btn-danger" href="delete_kategori.php?id_kategori=<?php echo $data['id_kategori'];?>" onclick="return confirm('Yakin hapus data?')">
       <i class="fas fa-trash"></i></a>
       </td>
       <?php   }
        ?>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
 
  <?php include "footer.php"; ?>
