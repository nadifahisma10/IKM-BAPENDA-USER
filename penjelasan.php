<!DOCTYPE html>
<?php 
	include 'connect.php';
	require 'sideuser.php';

	// Hindari SQL Injection
	$id_kategorisend = isset($_GET['id_kategorisend']) ? mysqli_real_escape_string($conn, $_GET['id_kategorisend']) : '';

	// Ambil nama kategori
	$query_kategori = mysqli_query($conn, "SELECT nama_kategori, persyaratan FROM kategori WHERE id_kategori='$id_kategorisend'");
	$data_kategori = mysqli_fetch_assoc($query_kategori);
	$kategori = $data_kategori['nama_kategori'] ?? '';
	$penjelasan = $data_kategori['persyaratan'] ?? '';
?>

<html lang="en">
<head>
  <title>Survei Bapenda Pringsewu</title>
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
        <center>
            <h4 style="text-transform: uppercase;">
                <b>Survei <br><br> <?php echo htmlspecialchars($kategori); ?> </b>
            </h4>
        </center>

        <div class="panel-group">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <center>Penjelasan tentang pajak ada di bawah ini</center>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-body">
                                    <table width='80%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                        <thead>
                                            <tr>
                                                <th><?php echo nl2br(htmlspecialchars($penjelasan)); ?></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="container">
                    <center><a href='formresponden.php?id_kategorisend=<?php echo $id_kategorisend;?>' type="submit" style='background-color: #008f8f; color: white;' class="btn btn-info" value="Selanjutnya">Lanjut</a></center>
                </div>
                <div class="panel-body"></div>
            </div>				
        </div>
    </div>

    <footer class="container-fluid text-center">
        <center><h6><b class="copyright">~ Copyright © 2025 Badan Pendapatan Daerah Kabupaten Pringsewu. All Rights Reserved</b></h6></center>
    </footer>
</div>
</body>
</html>
