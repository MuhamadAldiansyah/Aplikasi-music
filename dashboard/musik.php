<?php 
    require "../../config.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");

      //get produk by nama produk/keyword
      if(isset($_GET['keyword'])){
        $queryProduk = mysqli_query($conn, "SELECT * FROM musik WHERE judul LIKE '%$_GET[keyword]%'");
    }

    //get produk nama produk/keyword
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId = mysqli_query($conn, "SELECT id_kategori FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);

        $queryProduk = mysqli_query($conn, "SELECT * FROM musik WHERE id_kategori='$kategoriId[id_kategori]'");
    }

      //get produk by kategori
     else{

 
    $queryProduk = mysqli_query($conn, "SELECT * FROM musik");
     }
    $countData = mysqli_num_rows($queryProduk);

   
?>

<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
               
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
         
        

<div class="container-fluid">
<div class="row">
<div class="col-lg-3 mb-5">
                <div class="position-sticky" style="top: 2rem;">
                <h3>Music Kategori</h3>
                <ul class="list-group">
                   <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
                    <a class="no-decoration" href="musik.php?kategori=<?php echo $kategori['nama']; ?>">
                    <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                    </a>
                    <?php }?>
                </ul>

                
                </div>
</div>

<div class="col-lg-9">
    <h3 class="text-center mb-3">Lagu</h3>
    <div class="row">

    <?php while($lagu = mysqli_fetch_array($queryProduk)){ ?>
        <div class="col-md-3 mb-4">
        <div class="card" style="height: 350px;">
        <img src="img/<?php echo $lagu['thumbnail_path'];?>" class="card-img-top" style="height: 200px;" alt="Gambar Musik 3">
            <div class="card-body">
            <h5 class="card-title"><?php echo $lagu['judul'];?></h5>
            <p class="card-text"><?php echo $lagu['artis'];?></p>
            
            <a class="btn btn-primary" href="music-play.php?judul=<?php echo $lagu['judul'];?>">Putar Musik</a>
            </div>
        </div>
        </div>
        
        <?php } ?>
    </div>
</div>
</div>
</div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->







    
<?php include "footer.php"; ?>