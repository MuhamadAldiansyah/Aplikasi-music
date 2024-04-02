<?php
    require "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
include "../../config.php";
$id_kategori = $_GET['id_kategori'];
$sql = "SELECT * FROM kategori WHERE id_kategori= '$id_kategori' ";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
?>

<?php include "header.php";
include "sidebar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit koleksi museum</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
          
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $result['nama'] ?>" placeholder="Enter Name...">
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="update" class="btn btn-primary">
                </div>
              </form>
              <?php 
                        require '../../config.php';
                        if (isset($_POST["update"])) {
                           
                            $nama = $_POST["nama"];
                            
                            $sql = "UPDATE kategori SET nama='$nama' WHERE id_kategori='$id_kategori'";
                            if ($conn->query($sql) === TRUE) {
                                echo "<script>alert('Update Berhasil!'); window.location.href = 'kategori.php';</script>";
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
                        
                        
                        ?>

            <!-- /.card --></div>
        </div>
      </div>
     </section>
  </div>
 <?php include "footer.php"; ?>