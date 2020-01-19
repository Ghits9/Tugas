<div class="container-fluid">

	<div class="alert alert-success" role="alert">
	   <i class="fas fa-university"></i> Form Input Program Studi
	</div>
	
	<form method="post" action="<?php echo base_url('administrator/prodi/tambah_prodi_aksi') ?>">
		<div class="form-group">
			<label>Kode Prodi</label>
			<input type="text" name="kode_prodi" placeholder="Masukan Kode Prodi" class="form-control">
			<?php echo form_error('kode_prodi','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Prodi</label>
			<input type="text" name="nama_prodi" placeholder="Masukan Nama Prodi" class="form-control">
			<?php echo form_error('nama_prodi','<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Nama Fakultas</label>
			<select name="nama_fakultas" class="form-control">
				<option value="">--Pilih Fakultas--</option>
			<?php foreach($fakultas as $fks) : ?>
				<option value="<?php echo $fks->nama_fakultas ?>"><?php echo $fks->nama_fakultas; ?></option>
			<?php endforeach; ?>
			</select>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>