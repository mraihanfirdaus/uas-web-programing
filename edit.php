<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Nisn'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Nisn = $_GET['Nisn'];

			//query ke database SELECT tabel siswa_siswi berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM siswa_siswi WHERE Nisn='$Nisn'") or die(mysqli_error($koneksi));

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
			$Nama_Siswa		= $_POST['Nama_Siswa'];
			$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
			$Jurusan		= $_POST['Jurusan'];

			$sql = mysqli_query($koneksi, "UPDATE siswa_siswi SET Nama_Siswa='$Nama_Siswa', Jenis_Kelamin='$Jenis_Kelamin', Jurusan='$Jurusan' WHERE Nisn='$Nisn'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_Siswa";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_Siswa&Nisn=<?php echo $Nisn; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nisn</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nisn" class="form-control" size="4" value="<?php echo $data['Nisn']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Siswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Siswa" class="form-control" value="<?php echo $data['Nama_Siswa']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" <?php if($data['Jenis_Kelamin'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" <?php if($data['Jenis_Kelamin'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jurusan</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jurusan" class="form-control" required>
						<option value="">Jurusan</option>
						<option value="Airframe & Powerplant" <?php if($data['Jurusan'] == 'Airframe & Powerplant'){ echo 'selected'; } ?>>Airframe & Powerplant</option>
						<option value="Teknik Komputer Jaringan" <?php if($data['Jurusan'] == 'Teknik Komputer Jaringan'){ echo 'selected'; } ?>>Teknik Komputer Jaringan</option>
						<option value="Akutansi" <?php if($data['Jurusan'] == 'Akutansi'){ echo 'selected'; } ?>>Akutansi</option>
						<option value="Tata Boga" <?php if($data['Jurusan'] == 'Tata Boga'){ echo 'selected'; } ?>>Tata Boga</option>
						
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_Siswa" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
