<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6"> Siswa</font></center>
		<hr>
		<a href="index.php?page=tambah_siswa"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>Id</th>
					<th>NIS</th>
					<th>NISN</th>
					<th>NAMA</th>
					<th>Tempat_Lahir</th>
					<th>Tanggal_Lahir</th>
					<th>Kelas</th>
					<th>No.HP</th>
					<th>Tindakan</th>

				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id'].'</td>
							<td>'.$data['nis'].'</td>
							<td>'.$data['nisn'].'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['tempat_lahir'].'</td>
							<td>'.$data['tanggal_lahir'].'</td>
							<td>'.$data['kelas'].'</td>
							<td>'.$data['no_hp'].'</td>
							<td>
								<a href="index.php?page=edit_siswa&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
