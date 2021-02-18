<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id			        = $_POST['id_guru'];
			$nik			    = $_POST['nik'];
            $nama			    = $_POST['nama_guru'];
			$jenis_kelamin	    = $_POST['jenis_kelamin'];
			$mapel		        = $_POST['mapel'];
            $jadwal		        = $_POST['jadwal'];

			$cek = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO guru(id_guru, nik, nama_guru, jenis_kelamin, mapel, jadwal) VALUES('$id', '$nik', '$nama', '$jenis_kelamin', '$mapel', '$jadwal')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_guru";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

	<form action="index.php?page=tambah_guru" method="post">
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
					<input type="text" name="jenis_kelamin" class="form-control" required>
				</div>
			</div>       

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">MAPEL</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="mapel" class="form-control" required>
				</div>
			</div>       

            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jadwal</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="jadwal" class="form-control" required>
				</div>
			</div>       

			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
