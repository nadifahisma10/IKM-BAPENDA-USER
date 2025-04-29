<?php
	include 'connect.php';
	
	$id_kategorisend = isset($_GET['id_kategorisend']) ? $_GET['id_kategorisend'] : '';
	$tanggal = isset($_POST['date']) ? $_POST['date'] : '';
	$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	$nip = isset($_POST['nip']) ? $_POST['nip'] : '';
	$umur = isset($_POST['umur']) ? $_POST['umur'] : '';
	$jkelamin = isset($_POST['jkelamin']) ? $_POST['jkelamin'] : '';
	$pendidikan = isset($_POST['pendidikan']) ? $_POST['pendidikan'] : '';
	$pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';

	// Validasi input
	if (!ctype_digit($umur) || !ctype_digit($jkelamin) || empty($pendidikan) || empty($pekerjaan)) {
		echo "<script>alert('Mohon isikan data yang wajib dengan benar!');</script>";
		echo "<script>document.location.href='formresponden.php?id_kategorisend=$id_kategorisend';</script>";
		exit();
	}

	// Gunakan prepared statement untuk mencegah SQL Injection
	$stmt = $conn->prepare("INSERT INTO responden (tanggal, nama, nip, umur, jenis_kelamin, pendidikan, pekerjaan, id_kategoriResponden) 
	                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssssss", $tanggal, $nama, $nip, $umur, $jkelamin, $pendidikan, $pekerjaan, $id_kategorisend);
	
	if ($stmt->execute()) {
		// Ambil id_responden terakhir yang baru saja dimasukkan
		$idrespondensend = $conn->insert_id;
		echo "<script>alert('Data anda terekam');</script>";
		echo "<script>document.location.href='soaluser.php?id_respondensend=$idrespondensend';</script>";
	} else {
		echo "<script>alert('Terjadi kesalahan dalam menyimpan data!');</script>";
		echo "<script>document.location.href='formresponden.php?id_kategorisend=$id_kategorisend';</script>";
	}

	$stmt->close();
	$conn->close();
?>
