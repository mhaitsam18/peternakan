<?php 
session_start();
/**
 * 
 */
class Koneksi {
	private $conn;
	function __construct() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "peternakan";
		$this->conn = mysqli_connect($servername, $username, $password, $databasename);
	}

	public function login_penjual(){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql      = "SELECT * FROM user_penjual WHERE username=LOWER('$username') AND password='$password';";
        $result   = $this->conn->query($sql);
        $row   = $result->fetch_assoc();
        if ($row > 0) {
            $_SESSION['user_penjual'] = $username;
        	header("location: penjual/dashboard.php");
        } else{
			echo "<script> alert('Username atau Password salah');</script>";
            echo "<script> location= 'penjual/login.php'; </script>";
        }
	}

	public function login_pembeli(){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql      = "SELECT * FROM user_pembeli WHERE username=LOWER('$username') AND password='$password';";
        $result   = $this->conn->query($sql);
        $row   = $result->fetch_assoc();
        if ($row > 0) {
            $_SESSION['user_pembeli'] = $username;
        	header("location: pembeli/dashboard.php");
        } else{
			echo "<script> alert('Username atau Password salah');</script>";
            echo "<script> location= 'pembeli/login.php'; </script>";
        }
	}

	public function insert_penjual(){
		$target_dir		= "upload/"; // Untuk Foto
		$file_name		= basename($_FILES["foto"]["name"]); // Untuk Foto
		$target_file	= $target_dir . $file_name; // Untuk Foto
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto
		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
			if ($_POST['password']==$_POST['konfirmasi']) {
				$username =$_POST['username'];
				$nama_lengkap =$_POST['nama_depan'].' '.$_POST['nama_belakang'];
				$no_identitas =$_POST['no_identitas'];
				$email =$_POST['email'];
				$no_ponsel =$_POST['no_ponsel'];
				$alamat =$_POST['alamat'];
				$password =md5($_POST['password']);
				$sql="INSERT INTO user_penjual(username, password, no_identitas, nama_lengkap, email, no_ponsel, alamat, foto) VALUES ('$username','$password', '$no_identitas', '$nama_lengkap', '$email', '$no_ponsel', '$alamat', '$target_file')";
				$result=$this->conn->query($sql);
				if ($result == true) {
					echo "<script> alert('Akun Penjual berhasil dibuat');</script>";
					$_SESSION['user_penjual'] = $username;
					echo "<script> location='penjual/dashboard.php'; </script>";
				} else {
					echo "<script> alert('Akun Penjual gagal dibuat');</script>";
					echo "<script> location='penjual/registrasi.php'; </script>";
				}
			} else {
				echo "<script> alert('Pastikan Password & konfirmasi password sama');</script>";
			}
		} else {
			echo "<script> alert('Foto Gagal diunggah');</script>";
		}
		mysqli_close($this->conn);
	}

	public function insert_pembeli(){
		$target_dir		= "upload/"; // Untuk Foto
		$file_name		= basename($_FILES["foto"]["name"]); // Untuk Foto
		$target_file	= $target_dir . $file_name; // Untuk Foto
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto
		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
			if ($_POST['password']==$_POST['konfirmasi']) {
				$username =$_POST['username'];
				$nama_lengkap =$_POST['nama_depan'].' '.$_POST['nama_belakang'];
				$no_identitas =$_POST['no_identitas'];
				$email =$_POST['email'];
				$no_ponsel =$_POST['no_ponsel'];
				$alamat =$_POST['alamat'];
				$password =md5($_POST['password']);
				$sql="INSERT INTO user_pembeli(username, password, no_identitas, nama_lengkap, email, no_ponsel, alamat, foto) VALUES ('$username','$password', '$no_identitas', '$nama_lengkap', '$email', '$no_ponsel', '$alamat', '$target_file')";
				$result=$this->conn->query($sql);
				if ($result == true) {
					echo "<script> alert('Akun pembeli berhasil dibuat');</script>";
					$_SESSION['user_pembeli'] = $username;
					echo "<script> location='pembeli/dashboard.php'; </script>";
				} else {
					echo "<script> alert('Akun pembeli gagal dibuat');</script>";
					echo "<script> location='pembeli/registrasi.php'; </script>";
				}
			} else {
				echo "<script> alert('Pastikan Password & konfirmasi password sama');</script>";
			}
		} else {
			echo "<script> alert('Foto Gagal diunggah');</script>";
		}
		mysqli_close($this->conn);
	}

	public function insert_produk(){
		$target_dir		= "upload/"; // Untuk Foto
		$file_name		= basename($_FILES["gambar_produk"]["name"]); // Untuk Foto
		$target_file	= $target_dir . $file_name; // Untuk Foto
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto
		if (move_uploaded_file($_FILES["gambar_produk"]["tmp_name"],$target_file)) {
			$penjual =$_POST['penjual'];
			$kode_produk =$_POST['kode_produk'];
			$nama_produk =$_POST['nama_produk'];
			$deskripsi_produk =$_POST['deskripsi_produk'];
			$kategori_produk =$_POST['kategori_produk'];
			$harga_produk =$_POST['harga_produk'];
			$stok_produk =$_POST['stok_produk'];
			$sql="INSERT INTO produk(kode_produk, nama_produk, deskripsi_produk, kategori_produk, harga_produk, stok_produk, gambar_produk, penjual) VALUES ('$kode_produk','$nama_produk', '$deskripsi_produk', '$kategori_produk', '$harga_produk', '$stok_produk', '$target_file', '$penjual')";
			$result=$this->conn->query($sql);
			if ($result == true) {
				echo "<script> alert('Data produk berhasil ditambahkan');</script>";
				echo "<script> location='penjual/dashboard.php'; </script>";
			} else {
				echo "<script> alert('Data produk gagal ditambahkan');</script>";
				echo "<script> location='penjual/dashboard.php'; </script>";
			}
		} else {
			echo "<script> alert('Gambar harus diisi');</script>";
		}
		mysqli_close($this->conn);
	}

	public function tambah_pesanan($kode_produk){
		$sql	= "SELECT * FROM produk WHERE kode_produk='$kode_produk';";
		$result	= $this->conn->query($sql);
		$row	= $result->fetch_assoc();
		if (isset($_SESSION['pesanan'][$kode_produk])) {
			$_SESSION['pesanan'][$kode_produk]+=1;
		} else{
			if (empty($_SESSION['jumlah_pesanan'])) {
				$_SESSION['jumlah_pesanan'] = 1;
			} else{
				$_SESSION['jumlah_pesanan'] += 1;
			}
			$_SESSION['pesanan'][$kode_produk]=1;
		}
		$stok = $row['stok_produk'] - 1;
		$sql="UPDATE `produk` SET `stok_produk`=$stok WHERE kode_produk='$kode_produk'";
		$result    = $this->conn->query($sql);
		header("location: pembeli/dashboard.php");
	}

	public function hapus_pesanan($kode_produk){
		$sql ="SELECT * FROM `produk` WHERE kode_produk='$kode_produk'";
		$result  = $this->conn->query($sql);
		$row   = $result->fetch_assoc();
		$harga = $row['harga_produk'];
		if ($_SESSION["pesanan"][$kode_produk]>1) {
			$_SESSION["pesanan"][$kode_produk]-=1;
		} else{
			unset($_SESSION["pesanan"][$kode_produk]);
		}
		$stok = $row['stok_produk'] + 1;
		$sql="UPDATE `produk` SET `stok_produk`=$stok WHERE kode_produk='$kode_produk'";
		$result    = $this->conn->query($sql);
		header("location: pembeli/dashboard.php");
	}
	public function pesan(){
		foreach ($_SESSION['pesanan'] as $kode_produk => $jml) {
			$result   = $this->select_produk_kode_produk($kode_produk);
            $row      = $result->fetch_assoc();
            $jmlharga = $row['harga_produk']*$jml;
            $sql="INSERT INTO `pemesanan`(`username`, `kode_produk`, `jumlah`, `subharga`) VALUES ('$_SESSION[user_pembeli]','$kode_produk',$jml,$jmlharga)";
			$result   = $this->conn->query($sql);
			unset($_SESSION['pesanan']);
			unset($_SESSION['jumlah_pesanan']);
			echo "<script> alert('Produk berhasil dibeli');</script>";
			echo "<script> location='pembeli/dashboard.php'; </script>";
		}
	}
	public function total_pemasukan(){
		$sql="SELECT SUM(subharga) AS total FROM pemesanan";
		return $this->conn->query($sql);
	}
	public function select_produk(){
		$sql="SELECT * FROM produk";
		return $this->conn->query($sql);
	}
	public function select_pemesanan(){
		$sql="SELECT * FROM pemesanan JOIN produk USING(kode_produk)";
		return $this->conn->query($sql);
	}
	public function select_produk_kode_produk($kode_produk){
		$sql="SELECT * FROM produk WHERE kode_produk='$kode_produk'";
		return $this->conn->query($sql);
	}
	public function select_produk_penjual($username){
		$sql="SELECT * FROM produk WHERE penjual='$username'";
		return $this->conn->query($sql);
	}
	public function select_user_penjual(){
		$sql="SELECT * FROM user_penjual";
		return $this->conn->query($sql);
	}
	public function select_user_pembeli(){
		$sql="SELECT * FROM user_pembeli";
		return $this->conn->query($sql);
	}

	public function getUpdate_Produk(){
		$sql = "SELECT * FROM produk WHERE kode_produk='".$_POST['id']."'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		echo json_encode($row);
	}
	public function update_produk(){
		$penjual 			= $_POST['penjual'];
		$kode_produk 		= $_POST['kode_produk'];
		$nama_produk 		= $_POST['nama_produk'];
		$deskripsi_produk 	= $_POST['deskripsi_produk'];
		$kategori_produk 	= $_POST['kategori_produk'];
		$harga_produk 		= $_POST['harga_produk'];	
		$stok_produk 		= $_POST['stok_produk'];	
		if (!empty($_FILES['gambar_produk']['name'])) {
			$target_dir		= "upload/"; // Untuk Foto
			$file_name		= basename($_FILES["gambar_produk"]["name"]); // Untuk Foto
			$target_file	= $target_dir . $file_name; // Untuk Foto
			$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto
			$sql="";
			if (move_uploaded_file($_FILES["gambar_produk"]["tmp_name"],$target_file)) {
				$sql = "UPDATE `produk` SET `nama_produk`='$nama_produk',`deskripsi_produk`='$deskripsi_produk',`kategori_produk`='$kategori_produk',`harga_produk`=$harga_produk,`stok_produk`=$stok_produk,`gambar_produk`= '$target_file' WHERE `kode_produk`='$kode_produk'";
			} else {
				echo "<script> alert('Gambar gagal diubah');</script>";
			}
		} else{
			$sql = "UPDATE `produk` SET `nama_produk`='$nama_produk',`deskripsi_produk`='$deskripsi_produk',`kategori_produk`='$kategori_produk',`harga_produk`=$harga_produk`stok_produk`=$stok_produk, WHERE `kode_produk`='$kode_produk'";
		}
		$result=$this->conn->query($sql);
		if ($result == true) {
			echo "<script> alert('Data produk berhasil diubah');</script>";
			echo "<script> location='penjual/dashboard.php'; </script>";
		} else {
			echo "<script> alert('Data produk gagal diubah');</script>";
			echo "<script> location='penjual/dashboard.php'; </script>";
		}
	}
	public function delete_produk($kode_produk){
		$sql = "DELETE FROM produk WHERE kode_produk='$kode_produk'";
		$result = $this->conn->query($sql);
		if ($result == true) {
			echo "<script> alert('Data produk berhasil dihapus');</script>";
			echo "<script> location='penjual/dashboard.php'; </script>";
		} else {
			echo "<script> alert('Data produk gagal dihapus');</script>";
			echo "<script> location='penjual/dashboard.php'; </script>";
		}
	}
	public function logout_penjual(){
		unset($_SESSION['user_penjual']);
		header("location: penjual/login.php");
	}
	public function logout_pembeli(){
		unset($_SESSION['user_pembeli']);
		header("location: pembeli/login.php");
	}
	
}
$koneksi = new koneksi();

if (isset($_GET['login_pembeli'])) {
	$koneksi->login_pembeli();
}
if (isset($_GET['login_penjual'])) {
	$koneksi->login_penjual();
}
if (isset($_GET['insert_penjual'])) {
	$koneksi->insert_penjual();
}
if (isset($_GET['insert_pembeli'])) {
	$koneksi->insert_pembeli();
}
if (isset($_GET['insert_produk'])) {
	$koneksi->insert_produk();
}
if (isset($_GET['tambah_pesanan'])) {
	$koneksi->tambah_pesanan($_GET['tambah_pesanan']);
}
if (isset($_GET['hapus_pesanan'])) {
	$koneksi->hapus_pesanan($_GET['hapus_pesanan']);
}
if (isset($_GET['pesan'])) {
	$koneksi->pesan();
}
if (isset($_GET['update_produk'])) {
	$koneksi->update_produk();
}
if (isset($_GET['getUpdate_Produk'])) {
	$koneksi->getUpdate_Produk();
}
if (isset($_GET['delete_produk'])) {
	$koneksi->delete_produk($_GET['delete_produk']);
}
if (isset($_GET['logout_penjual'])) {
	$koneksi->logout_penjual();
}
if (isset($_GET['logout_pembeli'])) {
	$koneksi->logout_pembeli();
}
