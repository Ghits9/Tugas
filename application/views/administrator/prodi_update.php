<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	   <i class="fas fa-university"></i> Form Update Prodi
	</div>

	<?php foreach($prodi as $prd) : ?>

		<form method="post" action="<?php echo base_url('administrator/prodi/update_aksi') ?>">
			
			<div class="form-group">
				<label>Kode Prodi</label>
				<input type="hidden" name="id_prodi" value="<?php echo $prd->id_prodi ?>">
				<input type="text" name="kode_prodi" class="form-control" value="<?php echo $prd->kode_prodi ?>">
			</div>

			<div class="form-group">
				<label>Nama Prodi</label>
				<input type="text" name="nama_prodi" class="form-control" value="<?php echo $prd->nama_prodi ?>">
			</div>

			<div class="form-group">
				<label>Nama Fakultas</label>
				<select name="nama_fakultas" class="form-control">
					<option value="<?php echo $prd->nama_fakultas ?>">
						<?php echo $prd->nama_fakultas; ?>
					</option>
					<?php foreach ($fakultas as $fks) : ?>
						<option value="<?php echo $fks->nama_fakultas ?>">
							<?php echo $fks->nama_fakultas; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<button type="submit" class="btn btn-primary">Simpan</button>

		</form>

	<?php endforeach; ?>
</div>