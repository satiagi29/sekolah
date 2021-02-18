<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id			= $_POST['id'];
			$nis		= $_POST['nis'];
			$nisn		= $_POST['nisn'];
			$nama		= $_POST['nama'];
			$tl			= $_POST['tempat_lahir'];
			$tanggal	= $_POST['tanggal_lahir'];
			$kelas		= $_POST['kelas'];
			$hp			= $_POST['no_hp'];

			$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO siswa(id, nis, nisn, nama, tempat_lahir, tanggal_lahir, kelas, no_hp ) VALUES('$id', '$nis', '$nisn', '$nama', '$tl', '$tanggal', '$kelas', '$hp')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_siswa";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_siswa" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id" class="form-control" size="4" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nis</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nis" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nisn</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nisn" class="form-control" required>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tempat Lahir</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tempat_lahir" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal_lahir" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kelas</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kelas" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No.HP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_hp" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
