<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6"> DATA GURU PENGAJAR</font></center>
		<hr>
		<a href="index.php?page=tambah_guru"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>Id</th>
					<th>NIK</th>
					<th>NAMA</th>
					<th>Jenis Kelamin</th>
					<th>MAPEL</th>
					<th>JADWAL</th>
					<th>Tindakan</th>

				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM guru ORDER BY id_guru DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id_guru'].'</td>
							<td>'.$data['nik'].'</td>
							<td>'.$data['nama_guru'].'</td>
							<td>'.$data['jenis_kelamin'].'</td>
							<td>'.$data['mapel'].'</td>
							<td>'.$data['jadwal'].'</td>
							
							<td>
								<a href="index.php?page=edit_guru&id_guru='.$data['id_guru'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete_guru.php?id_guru='.$data['id_guru'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
