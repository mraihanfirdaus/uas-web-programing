<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Nisn			= $_POST['Nisn'];
			$Nama_Siswa		= $_POST['Nama_Siswa'];
			$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
			$Jurusan		= $_POST['Jurusan'];

			$cek = mysqli_query($koneksi, "SELECT * FROM siswa_siswi WHERE Nisn='$Nisn'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO siswa_siswi(Nisn, Nama_Siswa, Jenis_Kelamin, Jurusan) VALUES('$Nisn', '$Nama_Siswa', '$Jenis_Kelamin', '$Jurusan')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_Siswa";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Nisn sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_Siswa" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nisn</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Nisn" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Siswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Siswa" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jurusan</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jurusan" class="form-control" required>
						<option value="">Pilih Jurusan</option>
						<option value="Airframe & Powerplant">Airframe & Powerplant</option>
						<option value="Teknik Jaringan Komputer">Teknik Jaringan Komputer</option>
						<option value="Akutansi">Akutansi</option>
						<option value="Tata Boga">Tata Boga</option>
						
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>