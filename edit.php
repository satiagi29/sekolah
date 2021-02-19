<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel data_siswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id' ") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$nis		= $_POST['nis'];
			$nisn		= $_POST['nisn'];
			$nama		= $_POST['nama'];
			$tl			= $_POST['tempat_lahir'];
			$tanggal	= $_POST['tanggal_lahir'];
			$kelas		= $_POST['kelas'];
			$hp			= $_POST['no_hp'];

			$sql = mysqli_query($koneksi, "UPDATE siswa SET nis='$nis', nisn='$nisn', nama='$nama', tempat_lahir='$tl',  tanggal_lahir='$tanggal', kelas='$kelas', no_hp='$hp' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_siswa";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		<!-- wdwdw-->
		<form action="index.php?page=edit_siswa&id=<?php echo $id; ?>" method="post">
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

			<!-- test -->
			
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_siswa" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
