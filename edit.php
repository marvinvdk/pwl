
<?php
// including the database connection file
include_once("config.php");
session_start();

if ($_SESSION['status']=="user") {
    header("Location: form_user.php");
}

if(isset($_POST['update']))
{	

	$kode_barang = mysqli_real_escape_string($conn, $_POST['kode_barang']);
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
			echo "<script>alert('Status gudang kosong!')</script>";
		}	

		if(empty($status_barang)) {
			echo "<script>alert('Status barang kosong!')</script>";
		}		

		if(empty($deskripsi_barang)) {
			echo "<script>alert('Deskripsi barang kosong!')</script>";
		}		

		echo "<br/><a href='index.php'>Halaman Utama</a>";
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE barang SET nama_barang='$nama_barang',harga_barang='$harga_barang', status_gudang='$status_gudang', status_barang='$status_barang', deskripsi_barang='$deskripsi_barang' WHERE kode_barang=$kode_barang");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$kode_barang = $_GET['kode_barang'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang=$kode_barang");

while($res = mysqli_fetch_array($result))
{
	$nama_barang = $res['nama_barang'];
	$harga_barang = $res['harga_barang'];
	$status_gudang = $res['status_gudang'];
	$status_barang = $res['status_barang'];
	$deskripsi_barang = $res['deskripsi_barang'];
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> edit data </title>
    
</head>

<body>
	
	<div class="container-logout">

	<a href="index.php">Home</a>

		<form name="form1" method="post" action="edit.php">
			<table border="0">


				<tr> 
					<td>Nama Barang</td>
					<td>
						<textarea type="text" name="nama_barang" value="<?php echo $nama_barang;?>">
						</textarea>
					</td>
				</tr>

				<tr> 
					<td>Harga Barang</td>
					<td><input type="number" name="harga_barang" value="<?php echo $harga_barang;?>"></td>
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
					<td><input type="hidden" name="kode_barang" value=<?php echo $_GET['kode_barang'];?>></td>
					<td><input type="submit" name="update" value="Update"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>

