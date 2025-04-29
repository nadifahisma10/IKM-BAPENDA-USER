<!DOCTYPE html>
<?php
  include 'connect.php';  // Pastikan menggunakan $conn dari connect.php
  require 'sideuser.php';

  // Pastikan id_respondensend ada di URL
  if (!isset($_GET['id_respondensend'])) {
      die("ID Responden tidak ditemukan.");
  }

  $id_respondensend = $_GET['id_respondensend'];

  // Ambil data responden berdasarkan ID
  $query1 = mysqli_query($conn, "SELECT id_kategoriResponden FROM responden WHERE id_responden='$id_respondensend'");
  $data1 = mysqli_fetch_assoc($query1);

  if (!$data1) {
      die("Data responden tidak ditemukan.");
  }

  $idkategoriResponden = $data1['id_kategoriResponden'];
?>

<html lang="en">
<head>
  <title>Survey Bapenda Pringsewu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link type="text/css" href="css/css.css" rel="stylesheet">  
</head>

<body style="height: 100%">
  <?php include 'navbar.php'; ?>

  <div class="container">
    <center>
      <h4 style="text-transform: uppercase;">
        <b>
          <?php 
            $query = mysqli_query($conn, "SELECT nama_kategori FROM kategori WHERE id_kategori='$idkategoriResponden'");
            $data = mysqli_fetch_assoc($query);
            echo "Survei <div>" . htmlspecialchars($data['nama_kategori']) . "</div>";
          ?>
        </b>
      </h4>
    </center>
      
    <div class="panel-group">
      <div class="panel panel-info">
        <div class="panel-heading"><center>Pertanyaan</center></div>

        <?php
          $query = mysqli_query($conn, 
            "SELECT soal.id_soal, soal.soal, jawaban.jawaban1, jawaban.jawaban2, jawaban.jawaban3, jawaban.jawaban4 
             FROM soal 
             JOIN jawaban ON soal.id_soal = jawaban.id_soalj 
             WHERE soal.id_kategoriS='$idkategoriResponden'"
          );

          $no = 1;
        ?>

        <form class="well form-horizontal" action="prosessoal.php?idrespondensend=<?php echo $id_respondensend; ?>" method="post" id="survei_list">
          <?php while ($data = mysqli_fetch_assoc($query)) { ?>
            <div class="form-group">
              <label><?php echo $no; ?>. <?php echo htmlspecialchars($data['soal']); ?></label><br>
              <input type="radio" value="1" name="jawaban<?php echo $no; ?>"> <label><?php echo htmlspecialchars($data['jawaban1']); ?></label><br>
              <input type="radio" value="2" name="jawaban<?php echo $no; ?>"> <label><?php echo htmlspecialchars($data['jawaban2']); ?></label><br>
              <input type="radio" value="3" name="jawaban<?php echo $no; ?>"> <label><?php echo htmlspecialchars($data['jawaban3']); ?></label><br>
              <input type="radio" value="4" name="jawaban<?php echo $no; ?>"> <label><?php echo htmlspecialchars($data['jawaban4']); ?></label><br>
            </div>
          <?php $no++; } ?>

          <div class="form-group">
            <div class="bg-primary" style='background-color: #008f8f; color: white;' >
              <label>Komentar dan saran</label>
            </div>
            <textarea class="form-control" rows="4" name="komentar"></textarea>
          </div>

          <div class="container">
            <center><input type="submit" style='background-color: #008f8f; color: white;' class="btn btn-info" value="Selanjutnya"></center>
          </div>
        </form>

        <div class="panel-body"></div>
      </div>			
    </div>
  </div>

  <div id="footer">
    <center><h6><b class="copyright">~ copyright © 2025 Badan Pendapatan Daerah Kabupaten Pringsewu. All Rights Reserved</b></h6></center>
  </div>
</body>
</html>
