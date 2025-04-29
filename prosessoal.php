<?php
	include 'connect.php';

	$id_respondensend = isset($_GET['idrespondensend']) ? $_GET['idrespondensend'] : '';

	// Inisialisasi array jawaban
	$jawaban = [];
	for ($i = 1; $i <= 10; $i++) {
		$jawaban[$i] = isset($_POST["jawaban$i"]) && ctype_digit($_POST["jawaban$i"]) ? $_POST["jawaban$i"] : 0;
	}

	$komentar = isset($_POST['komentar']) ? $_POST['komentar'] : '';

	// Gunakan prepared statement untuk mencegah SQL Injection
	$stmt = $conn->prepare("INSERT INTO jawaban_user 
		(jawaban1, jawaban2, jawaban3, jawaban4, jawaban5, jawaban6, jawaban7, jawaban8, jawaban9, jawaban10, id_respondenj, komentar) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	
	$stmt->bind_param("iiiiiiiiisis", 
		$jawaban[1], $jawaban[2], $jawaban[3], $jawaban[4], 
		$jawaban[5], $jawaban[6], $jawaban[7], $jawaban[8], $jawaban[9], $jawaban[10], 
		$id_respondensend, $komentar
	);

	if ($stmt->execute()) {
		echo "<script>alert('Survei berhasil terekam, terima kasih atas partisipasi anda.');</script>";
		echo "<script>document.location.href='index.php';</script>";
	} else {
		echo "<script>alert('Terjadi kesalahan dalam menyimpan survei.');</script>";
		echo "<script>document.location.href='soaluser.php?idrespondensend=$id_respondensend';</script>";
	}

	$stmt->close();
	$conn->close();
?>
