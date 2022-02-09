<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">DATA SISWA SMK NEGERI 10 KABUPATEN TANGERANG</font></center>
		<hr>
		<a href="index.php?page=tambah_Siswa"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
				<th>NO.</th>
					<th>Nisn</th>
					<th>Nama Siswa</th>
					<th>Jenis Kelamin</th>
					<th>Jurusan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel siswa_siswi urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM siswa_siswi ORDER BY Nisn DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['Nisn'].'</td>
							<td>'.$data['Nama_Siswa'].'</td>
							<td>'.$data['Jenis_Kelamin'].'</td>
							<td>'.$data['Jurusan'].'</td>
							<td>
								<a href="index.php?page=edit_Siswa&Nisn='.$data['Nisn'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?Nisn='.$data['Nisn'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
