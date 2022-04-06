<html>
<head>
	<title>Menambahkan Data Baru</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<div class="container-logout">
		<a href="index.php">Home</a>
		<br/><br/>

		<form action="add.php" method="post" name="form1">
			<table width="100%" border="0">

				<tr> 
					<td>Nama Barang</td>
					<td>
						<textarea type="text" name="nama_barang">

						</textarea>
					</td>
				</tr>

				<tr> 
					<td>Harga Barang</td>
					<td><input type="number" name="harga_barang"></td>
				</tr>

				<tr> 
					<td>Status Barang</td>
				<td>
					<input type="radio" name="status_barang" value="Segel"> Segel
					<input type="radio" name="status_barang" value="Rusak"> Rusak <br>
				</td>
					
				</tr>

				<tr> 
					<td>Status Gudang</td>
					<td>
					<input type="checkbox" name="status_gudang" value="Gudang A"> Gudang A
					<input type="checkbox" name="status_gudang" value="Gudang B"> Gudang B <br>
					</td>
				</tr>

				<tr> 
					<td>Deskripsi Barang</td>
					<td>
					<select class="form-control" name="deskripsi_barang" id="combo1">
						<option value="Mudah Pecah">Mudah Pecah</option>
						<option value="Sedikit Mudah Pecah">Sedikit Mudah Pecah</option>
						<option value="Sedang">Sedang</option>
						<option value="Sedikit Kuat">Sedikit Kuat</option>
						<option value="Kuat">Kuat</option>
					</select>
					</td>
				</tr>


				<tr>
					<td><input type="submit" name="add" value="Tambahkan "></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>

<?php
//including the database connection file
include_once("config.php");
session_start();

if ($_SESSION['status']=="user") {
    header("Location: form_user.php");
}

if(isset($_POST['add'])) {	
	$nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
	$harga_barang =  mysqli_real_escape_string($conn, $_POST['harga_barang']);
	$status_gudang =  mysqli_real_escape_string($conn, $_POST['status_gudang']);
	$status_barang =  mysqli_real_escape_string($conn, $_POST['status_barang']);
	$deskripsi_barang =  mysqli_real_escape_string($conn, $_POST['deskripsi_barang']);
		
	// checking empty fields
	if(empty($nama_barang) || empty($harga_barang) || empty($status_gudang) || empty($status_barang) || empty($deskripsi_barang)) {
				
		if(empty($nama_barang)) {
			echo "<script>alert('Nama barang kosong!')</script>";
		}
		
		if(empty($harga_barang)) {
			echo "<script>alert('Harga barang kosong!')</script>";
		}
		
		if(empty($status_gudang)) {
			echo "<script>alert('Satus gudang kosong!')</script>";
		}	

		if(empty($status_barang)) {
			echo "<script>alert('Status barang kosong!')</script>";
		}		

		if(empty($deskripsi_barang)) {
			echo "<script>alert('Deskripsi barang kosong!')</script>";
		}		
		
		//link to the previous page
		echo "<br/><a href='index.php'>Halaman Utama</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($conn, "INSERT INTO barang(nama_barang,harga_barang,status_gudang,status_barang,deskripsi_barang) VALUES('$nama_barang','$harga_barang','$status_gudang','$status_barang','$deskripsi_barang')");
		
		//display success message
		echo "
		
		<font color='green'>Data berhasil di tambahkan.
		<br>
		
		<a href='index.php'>liat data</a>

		"
		;
	}
}
?>
