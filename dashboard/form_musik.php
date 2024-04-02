
<?php
    require "session.php";
    require "../../config.php";

    $querykategori =mysqli_query($conn, "SELECT * FROM kategori");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen('$characters');
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <style>
    a{
      text-decoration: none;
    }
  </style>
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">E-Musik App</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Data Musik 
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="kategori.php" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Kategori Musik
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="musik.php" class="nav-link">
                            <i class="nav-icon fas fa-music"></i>
                            <p>
                                Daftar Musik
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
   
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">formulir tambah musik</h1>
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
                    <label for="exampleInputEmail1">Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukan judul musik...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Artis</label>
                    <input type="text" name="artis" class="form-control" placeholder="Masukan artis musik...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">kategori</label>
                    <select name="id_kategori" id="kategori" class="form-control" required>
                                <?php
            
                                while($data=mysqli_fetch_array($querykategori)){
                                    ?>
                                        <option value="<?php echo $data['id_kategori'] ?>"><?php echo $data ['nama']?></option>
                                    <?php
                                }
                                ?>
                                </select>
                  </div>  
                  <div class="form-group">
                                <label class="font-weight-bold">thumbnail</label>
                                <br>
                                <input type="file" class="form-control" name="thumbnail_path">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">audio</label>
                                <br>
                                <input type="file" class="form-control" name="audio_path">
                            </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="simpan" class="btn btn-primary">
                </div>
              </form>
              <?php
    if(isset($_POST['simpan'])){
        $judul = htmlspecialchars($_POST['judul']);
        $artis = htmlspecialchars($_POST['artis']);
        $id_kategori = htmlspecialchars($_POST['id_kategori']);
       
        $target_dir = "img/";
        $nama_file = basename($_FILES["thumbnail_path"]["name"]);
        $target_file = $target_dir . $nama_file;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $image_size = $_FILES["thumbnail_path"]["size"];
        $random_name = generateRandomString(20);
        $new_name = $random_name . "." . $imageFileType;

        if($judul=='' || $artis=='' || $id_kategori==''){
        ?>
             <div class="alert alert-warning mt-3" role="alert">
                wajib isi semua terlebih dahulu
            </div>
        <?php
        }
        else{
            if($nama_file!=''){
                if($image_size > 500000){
        ?>
            <div class="alert alert-warning mt-3" role="alert">
                File tidak boleh lebih dari 500 kb
            </div>
        <?php
                }
                else{
                  if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType!= 'jpeg'){
        ?>
            <div class="alert alert-warning mt-3" role="alert">
                File wajib bertype jpg atau png atau jpeg
            </div>
        <?php
            }
            else{
                  move_uploaded_file($_FILES["thumbnail_path"]["tmp_name"], $target_dir . $new_name);
                }
             }
            }

        // Tentukan direktori tempat menyimpan file audio
            $targetDirectory = "audio/";
            
            // File yang diunggah
            $audioFile = $_FILES["audio_path"]["name"];
            $targetFile = $targetDirectory . basename($audioFile);
            
             
             // Pindahkan file yang diunggah ke direktori target
            if (move_uploaded_file($_FILES["audio_path"]["tmp_name"], $targetFile)) {
                
            }else {
                echo "Maaf, terjadi kesalahan saat mengunggah file audio.";
            }

            // Query insert to produk table
            $queryTambah = mysqli_query($conn, "INSERT INTO musik (judul, artis, id_kategori, thumbnail_path, audio_path) 
            VALUES ('$judul', '$artis', '$id_kategori', '$new_name', '$targetFile')");

            if($queryTambah){

                ?>
                    <div class="alert alert-primary mt-3" role="alert">
                         Berhasil Tersimpan
                    </div>

                    <meta http-equiv="refresh" content="2; url=index.php" /> 
                <?php

            }
            else{
                echo mysqli_error($con);
            }
        }
    }
?>

            <!-- /.card --></div>
        </div>
      </div>
     </section>
  </div>
 
   <!-- /.content-wrapper -->
 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../assets/plugins/jszip/jszip.min.js"></script>
<script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
