<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_guru'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id_guru'];

			//query ke database SELECT tabel data_siswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru='$id' ") or die(mysqli_error($koneksi));

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
            $id		= $_POST['id_guru'];
			$nik		= $_POST['nik'];
			$nama		= $_POST['nama_guru'];
			$jenis_kelamin		= $_POST['jenis_kelamin'];
			$mapel			= $_POST['mapel'];
			$jadwal	= $_POST['jadwal'];

			$sql = mysqli_query($koneksi, "UPDATE siswa SET id_guru='$id', nik='$nik', nama_guru='$nama', jenis_kelamin='$jenis_kelamin', mapel='$mapel',  jadwal='$jadwal',  WHERE id_guru='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_guru";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_guru&id_guru=<?php echo $id; ?>" method="post">
        <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID GURU</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id_guru" class="form-control" size="4" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIK</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nik" class="form-control" required>
				</div>
			</div>

            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA GURU</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_guru" class="form-control" required>
				</div>
			</div>                              

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Jenis_Kelamin" class="form-control" required>
				</div>
			</div>       

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">MAPEL</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="mapel" class="form-control" required>
				</div>
			</div>       
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">JADWAL</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="jadwal" class="form-control" required>
				</div>
			</div>       
			
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_guru" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
