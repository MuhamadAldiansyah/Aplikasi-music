<?php include "header.php";
include "sidebar.php"; ?>
  
   
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">formulir kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
              <form action="proses_kategori.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">nama kategori</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="nama">
                  </div>       
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="tambah" class="btn btn-primary">
                </div>
              </form>
            

<!-- Seluruh kode HTML Anda di sini -->
              
            <!-- /.card --></div>
        </div>
      </div>
     </section>
  </div>
 
  <?php include "footer.php"; ?>
