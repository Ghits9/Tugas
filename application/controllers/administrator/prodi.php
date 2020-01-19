<?php  

class Prodi extends CI_Controller{

	public function index()
	{
		$data['prodi']	= $this->prodi_model->tampil_data('prodi')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/prodi',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_prodi()
	{
		$data['fakultas']	= $this->prodi_model->tampil_data('fakultas')->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/prodi_form',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_prodi_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)
		{
			$this->tambah_prodi();
		}else{
			$kode_prodi		= $this->input->post('kode_prodi');
			$nama_prodi		= $this->input->post('nama_prodi');
			$nama_fakultas	= $this->input->post('nama_fakultas');

			$data = array(
				'kode_prodi'	=> $kode_prodi,
				'nama_prodi'	=> $nama_prodi,
				'nama_fakultas'	=> $nama_fakultas,
			);

			$this->prodi_model->insert_data($data,'prodi');

			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Prodi Berhasil Ditambahkan!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
			redirect('administrator/prodi');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_prodi','kode_prodi','required',[
			'required'	=> 'Kode Prodi wajib diisi!'
		]);
		$this->form_validation->set_rules('nama_prodi','nama_prodi','required',[
			'required'	=> 'Nama Prodi wajib diisi!'
		]);

		$this->form_validation->set_rules('nama_fakultas','nama_fakultas','required',[
			'required'	=> 'Nama Fakultas wajib diisi!'
		]);
	}

	public function update($id)
	{
		$where = array('id_prodi' => $id);

		$data['prodi']		= $this->db->query("select * from prodi prd,
		 fakultas fks where prd.nama_fakultas=fks.nama_fakultas
			and prd.id_prodi='$id'")->result();
		$data['fakultas']	= $this->prodi_model->tampil_data('fakultas')->result();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/prodi_update',$data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id 		  	= $this->input->post('id_prodi');
		$kode_prodi 	= $this->input->post('kode_prodi');
		$nama_prodi		= $this->input->post('nama_prodi');
		$nama_fakultas 	= $this->input->post('nama_fakultas');

		$data = array(
			'kode_prodi'	=> $kode_prodi,
			'nama_prodi'	=> $nama_prodi,
			'nama_fakultas'	=> $nama_fakultas
		);

		$where = array(
			'id_prodi'	=> $id
		);

		$this->prodi_model->update_data($where,$data,'prodi');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
						  Data Prodi Berhasil Diupdate!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/prodi');
	}

	public function delete($id)
	{
		$where = array('id_prodi' => $id);
		$this->prodi_model->hapus_data($where,'prodi');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  Data Prodi Berhasil Dihapus!
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
		redirect('administrator/prodi');
	}
}