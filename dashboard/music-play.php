<?php
    require "../../config.php";
    
    $judul = htmlspecialchars($_GET['judul']);
    $queryProduk = mysqli_query($conn, "SELECT * FROM musik WHERE judul ='$judul'");
    $judulLagu = mysqli_fetch_array($queryProduk);
    $audio_path = $judulLagu["audio_path"];

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
            <h1 class="m-0 text-dark">Pemutar Musik</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Pemutar Musik -->
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-body">
                <!-- Cover Album -->
                <img src="img/<?php echo $judulLagu['thumbnail_path']; ?>" alt="Album Cover" class="img-fluid mb-3" style="width :800px ;" >
                    <br>
                <!-- Info Lagu -->
                <h3 class="card-title"><?php echo $judulLagu['judul'];?></h3>
                <p class="card-text"><?php echo $judulLagu['artis'];?></p>

                <!-- Controls -->
                <?php
                echo "<audio controls>";
                echo "<source src='$audio_path' type='audio/mpeg'>";
                echo "Browser Anda tidak mendukung pemutar audio.";
                echo "</audio>";
                 ?>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include "footer.php"; ?>