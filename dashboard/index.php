<?php
    require "session.php";
    require "../../config.php";

    $query = mysqli_query($conn, "SELECT a.*, b.nama AS nama FROM musik a JOIN kategori b ON a.
    id_kategori=b.id_kategori");
?>

<?php include "header.php"; include "sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
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
                <h3 class="card-title">Data Table</h3>
               
                <div class="card-tools">
                 <a class="btn btn-primary" href="form_musik.php">
                    Tambah Data
                </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      
                      <th>Judul</th>
                      <th>Artis</th>
                      <th>Id Kategori</th>
                      <th>Thumbnail</th>
                      <th>Audio</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $jumlah = 1;
                      while($data=mysqli_fetch_array($query)){
                      $audio_path = $data["audio_path"];
                  ?>
                    <tr>
            
                    <td>
                        <?php echo $data['judul'] ?>
                    </td>
                    <td>
                        <?php echo $data['artis'] ?>
                    </td>
                    <td>
                       <?php echo $data['nama'] ?>
                    </td>
                    <td>
                       <?php echo $data['thumbnail_path'] ?>
                    </td>
                    <td>
                       <?php
                         echo "<audio controls>";
                         echo "<source src='$audio_path' type='audio/mpeg'>";
                         echo "Browser Anda tidak mendukung pemutar audio.";
                         echo "</audio>";
                       ?>
                    </td>
                    
                      <td width="90px" align="center">
       <a class="btn btn-primary" href="edit_musik.php?id_musik=<?php echo $data['id_musik']; ?>">
       <i class="fas fa-edit"></i></a>

  
      
       <a class="btn btn-danger" href="delete_musik.php?id_musik=<?php echo $data['id_musik'];?>" onclick="return confirm('Yakin hapus data?')">
       <i class="fas fa-trash"></i></a>
       </td>
                 <?php
                      }
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
