<!DOCTYPE html>
<?php
    include 'connect.php';  // Menggunakan $conn
    require 'sideuser.php';
?>

<html lang="en">
<head>
    <title>Bapenda Pringsewu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/js.js" type="text/javascript"></script>
    <link type="text/css" href="css/css.css" rel="stylesheet">
</head>

<body style="height: 100%">
<div id="page-wrapper">
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <center><h4><b>KLIK GAMBAR DI BAWAH INI UNTUK MENGETAHUI LEBIH LANJUT TENTANG KAMI</b></h4></center><br>
                        <div class="carousel-item active">
                            <!-- Membungkus gambar dengan link menuju TentangKami.php -->
                            <a href="TentangKami.php">
                                <img src="img/Pringsewu.png" class="d-block" alt="Pringsewu" 
                                style="width: 20%; height: auto; display: block; margin-left: auto; margin-right: auto;">
                            </a><br><br>
                        </div>

                        <center><h4><b>KATEGORI SURVEI</b></h4></center> 
                        <div class="panel-body">
                            <table width="50%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM kategori";
                                    $result = mysqli_query($conn, $query);

                                    if (!$result) {
                                        die("Query gagal: " . mysqli_error($conn));
                                    }

                                    while ($data = mysqli_fetch_array($result)) {
                                        $idk = $data['id_kategori'];
                                        $status = $data['status'];
                                        $nama_kategori = htmlspecialchars($data['nama_kategori']);

                                        if ($status == 0) {
                                            echo "
                                            <div class='col-lg-3 col-md-6'><br>
                                                <div class='panel' style='background-color: #00a6a6; color: white;'>
                                                    <div class='panel-heading' style='background-color: #008f8f; color: white;'>
                                                        <div class='row'>
                                                            <div class='col-xs-3'>
                                                                <i class='fa fa-tasks fa-4x'></i>
                                                            </div>
                                                            <div class='col-xs-9 text-center'>
                                                                <div>$nama_kategori</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                        } else {
                                            echo "
                                            <div class='col-lg-3 col-md-6'><br>
                                                <a href='penjelasan.php?id_kategorisend=$idk'>
                                                    <div class='panel' style='background-color: #00a6a6; color: white;'>
                                                        <div class='panel-heading' style='background-color: #008f8f; color: white;'>
                                                            <div class='row'>
                                                                <div class='col-xs-3'>
                                                                    <i class='fa fa-tasks fa-5x'></i>
                                                                </div>
                                                                <div class='col-xs-9 text-center'>
                                                                    <div>$nama_kategori</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>";
                                        }                                        
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div> <!-- /.panel-body -->
                    </div> <!-- /.panel-heading -->
                </div> <!-- /.panel-default -->
            </div> <!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.page-wrapper -->

</body>
</html>
