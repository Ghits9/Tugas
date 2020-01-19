<div class="container-fluid">
	
	<div class="alert alert-success" role="alert">
	   <i class="fas fa-university"></i> Fakultas
	</div>

	<?php echo $this->session->flashdata('pesan') ?>

	<?php echo anchor('administrator/fakultas/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Fakultas</button>') ?>

	

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>KODE FAKULTAS</th>
			<th>NAMA FAKULTAS</th>
			<th colspan="2">AKSI</th>
		</tr>

		<?php 
		$no = 1;
		foreach ($fakultas as $fks) : ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $fks->kode_fakultas ?></td>
				<td><?php echo $fks->nama_fakultas ?></td>
				<td width="20px"><?php echo anchor('administrator/fakultas/update/'.$fks->id_fakultas,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
				<td width="20px"><?php echo anchor('administrator/fakultas/delete/'.$fks->id_fakultas,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>