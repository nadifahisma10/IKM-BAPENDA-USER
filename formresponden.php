<!DOCTYPE html>
<?php
	include 'connect.php';
  	require 'sideuser.php';
	$id_kategorisend = isset($_GET['id_kategorisend']) ? $_GET['id_kategorisend'] : '';
?>

<html lang="en">
<head>
  <title>Survei Bapenda Pringsewu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type="text/css" href="css/css.css" rel="stylesheet">

  <script>
      $(document).ready(function(){
          $('[data-toggle="popover"]').popover();
      });
  </script>
</head>
<body style="height: 100%">
<?php include 'navbar.php'; ?>

<div class="container">
    <form class="well form-horizontal" action="prosesresponden.php?id_kategorisend=<?php echo htmlspecialchars($id_kategorisend); ?>" method="post" id="contact_form">
        <fieldset>
            <legend><center>Data Responden</center></legend>

            <div class="form-group">
                <label class="col-md-4 control-label">Nama Lengkap</label>
                <div class="col-md-4 inputGroupContainer"> 
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input data-toggle="popover" title="Opsional" name="nama" placeholder="Nama Lengkap" class="form-control" type="text" maxlength="25">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">NIP/Data Lain</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
                        <input name="nip" data-toggle="popover" title="Opsional" placeholder="NIP/Data Lain" class="form-control" type="text" maxlength="25" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Umur *</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="umur" data-toggle="popover" title="wajib" placeholder="Umur (ex: 21)" class="form-control" type="number" min="3" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Tanggal *</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input id="date" name="date" placeholder="Tahun/Bulan/Tanggal" class="form-control" type="date" required>
                    </div>
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label class="col-md-4 control-label">Jenis Kelamin *</label>
                <div class="col-md-4">
                    <label><input type="radio" name="jkelamin" value="1" required> Laki-laki</label><br>
                    <label><input type="radio" name="jkelamin" value="0"> Perempuan</label>
                </div>
            </div>

            <!-- Pendidikan Terakhir -->
            <div class="form-group">
                <label class="col-md-4 control-label">Pendidikan Terakhir *</label>
                <div class="col-md-4">
                    <label><input type="radio" name="pendidikan" value="SMA kebawah" required> SMA Kebawah</label><br>
                    <label><input type="radio" name="pendidikan" value="D1-D3-D4"> D1-D3-D4</label><br>
                    <label><input type="radio" name="pendidikan" value="S1"> Sarjana (S1)</label><br>
                    <label><input type="radio" name="pendidikan" value="S2 keatas"> Master (S2) ke atas</label>
                </div>
            </div>

            <!-- Pekerjaan Utama -->
            <div class="form-group">
                <label class="col-md-4 control-label">Pekerjaan Utama *</label>
                <div class="col-md-4">
                    <label><input type="radio" name="pekerjaan" value="PNS" required> PNS</label><br>
                    <label><input type="radio" name="pekerjaan" value="Wiraswasta"> Wiraswasta</label><br>
                    <label><input type="radio" name="pekerjaan" value="Wiraswasta"> Pedagang</label><br>
                    <label><input type="radio" name="pekerjaan" value="Wiraswasta"> Petani</label><br>
                    <label><input type="radio" name="pekerjaan" value="Wiraswasta"> Guru</label><br>
                    <label><input type="radio" name="pekerjaan" value="TNI/POLRI"> TNI/POLRI</label><br>
                    <label><input type="radio" name="pekerjaan" value="Mahasiswa"> Mahasiswa</label><br>
                    <label><input type="radio" name="pekerjaan" value="Pegawai"> Pegawai</label><br>
                    <label><input type="radio" name="pekerjaan" value="Dan lain-lain"> Dan lain-lain</label>
                </div>
            </div>

            <center>
                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" style='background-color: #008f8f; color: white;' class="btn btn-warning">Lanjutkan</button>
                    </div>
                </div>
            </center>
        </fieldset>
    </form>
</div>

<footer>
    <center><h6><b class="copyright">~ copyright © 2025 Badan Pendapatan Daerah Kabupaten Pringsewu. All Rights Reserved</b></h6></center>
</footer>

</body>
</html>
