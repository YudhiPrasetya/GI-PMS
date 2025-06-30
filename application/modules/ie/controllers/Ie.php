<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ie extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();


		if ((int)$this->session->userdata['role_gi_production'] !== 9 && (int)$this->session->userdata('role_gi_production') !== 1) {
			redirect('auth/not_allowed');
		}

		// check session
		if (!isset($this->session->userdata['id_factory'])) {
			redirect('auth/not_allowed');
		}

		$this->load->model('IeModel');
	}

	// Dashboard
	// ==================================================================================================
	public function dashboard()
	{
		$data['title'] = 'Dashboard | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ie/sidebarIe');
		}
		$this->load->view('navbar');
		$this->load->view('ie/dashboard/dashboardView');
		$this->load->view('footer');
	}

	public function getCountMasterSam()
	{
		$rst = $this->IeModel->getDataCountMasterSam();
		echo json_encode($rst);
	}

	public function getCountMasterSamNew()
	{
		$rst = $this->IeModel->getDataCountMasterSamNew();
		echo json_encode($rst);
	}

	// ==================================================================================================



	// Master SAM
	// ==================================================================================================
	public function master_sam()
	{
		$data['title'] = 'Master SAM | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ie/sidebarIe');
		}
		$this->load->view('navbar');
		$this->load->view('ie/master_sam/masterSamView');
		$this->load->view('footer');
	}

	public function ajax_list()
	{
		$data['data'] = $this->IeModel->list();
		echo json_encode($data);
	}

	public function getStyleSam()
	{
		$rst = $this->IeModel->getDataStyleSam();
		echo json_encode($rst);
	}

	public function postMasterSam()
	{

		$data = array(
			'style' => $this->input->post('style'),
			'color' => $this->input->post('color'),
			'grup_size' => $this->input->post('grup_size'),
			'sam_cutting' => ($this->input->post('sam_cutting') != "") ? $this->input->post('sam_cutting') : 0,
			'linning_sam' => ($this->input->post('linning_sam') != "") ? $this->input->post('linning_sam') : 0,
			'mid_sam' => ($this->input->post('mid_sam') != "") ? $this->input->post('mid_sam') : 0,
			'outer_sam' => ($this->input->post('outer_sam') != "") ? $this->input->post('outer_sam') : 0,
			'total_mold_sam' => ($this->input->post('total_mold_sam') != "") ? $this->input->post('total_mold_sam') : 0,
			'center_panel_sam' => ($this->input->post('center_panel_sam') != "") ? $this->input->post('center_panel_sam') : 0,
			'back_wings_sam' => ($this->input->post('back_wings_sam') != "") ? $this->input->post('back_wings_sam') : 0,
			'cups_sam' => ($this->input->post('cups_sam') != "") ? $this->input->post('cups_sam') : 0,
			'assembly_sam' => ($this->input->post('assembly_sam') != "") ? $this->input->post('assembly_sam') : 0,
			'total_sewing_sam' => ($this->input->post('total_sewing_sam') != "") ? $this->input->post('total_sewing_sam') : 0,
			'packing_sam' => ($this->input->post('packing_sam') != "") ? $this->input->post('packing_sam') : 0
		);

		$data = $this->IeModel->postDataMasterSam($data);
		echo json_encode($data);
	}

	public function updateMasterSam()
	{
		$id = $this->input->post('id');

		$data = array(
			'style' => $this->input->post('style'),
			'color' => $this->input->post('color'),
			'grup_size' => $this->input->post('grup_size'),
			'sam_cutting' => ($this->input->post('sam_cutting') != "") ? $this->input->post('sam_cutting') : 0,
			'linning_sam' => ($this->input->post('linning_sam') != "") ? $this->input->post('linning_sam') : 0,
			'mid_sam' => ($this->input->post('mid_sam') != "") ? $this->input->post('mid_sam') : 0,
			'outer_sam' => ($this->input->post('outer_sam') != "") ? $this->input->post('outer_sam') : 0,
			'total_mold_sam' => ($this->input->post('total_mold_sam') != "") ? $this->input->post('total_mold_sam') : 0,
			'center_panel_sam' => ($this->input->post('center_panel_sam') != "") ? $this->input->post('center_panel_sam') : 0,
			'back_wings_sam' => ($this->input->post('back_wings_sam') != "") ? $this->input->post('back_wings_sam') : 0,
			'cups_sam' => ($this->input->post('cups_sam') != "") ? $this->input->post('cups_sam') : 0,
			'assembly_sam' => ($this->input->post('assembly_sam') != "") ? $this->input->post('assembly_sam') : 0,
			'total_sewing_sam' => ($this->input->post('total_sewing_sam') != "") ? $this->input->post('total_sewing_sam') : 0,
			'packing_sam' => ($this->input->post('packing_sam') != "") ? $this->input->post('packing_sam') : 0
		);

		$data = $this->IeModel->updateDataMasterSam($id, $data);
		echo json_encode($data);
	}

	public function deleteMasterSam()
	{
		$id_master_sam = $this->input->post('id_master_sam');

		$data = $this->IeModel->deleteDataMasterSam($id_master_sam);
		echo json_encode($data);
	}


	// ==================================================================================================





	// Master SAM (Old)
	// ==================================================================================================

	public function master_sam_old()
	{
		$data['title'] = 'Master SAM (old) | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ie/sidebarIe');
		}
		$this->load->view('navbar');
		$this->load->view('ie/master_sam_old/masterSamNewView');
		$this->load->view('footer');
	}
	public function ajax_list_old()
	{
		$data['data'] = $this->IeModel->list_old();
		echo json_encode($data);
	}

	public function add_old()
	{
		date_default_timezone_set("Asia/Jakarta");

		$data = array(
			'style' => $this->input->post('style'),
			'sam' => $this->input->post('sam'),
			'created' => date("Y-m-d H:i:s")
		);

		$data = $this->IeModel->add_old($data);
		echo json_encode($data);
	}

	public function delete_old()
	{
		date_default_timezone_set("Asia/Jakarta");

		$id_master_sam = $this->input->post('id_master_sam');

		$data = array(
			'deleted' => date("Y-m-d H:i:s")
		);

		$result = $this->IeModel->delete_sam($id_master_sam, $data);
		echo json_encode($result);
	}




	// Master SAM (New)
	// ==================================================================================================
	public function master_sam_new()
	{
		$data['title'] = 'Master SAM (New) | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ie/sidebarIe');
		}
		$this->load->view('navbar');
		$this->load->view('ie/master_sam_new/masterSamNewView');
		$this->load->view('footer');
	}

	public function ajax_list_New()
	{
		$data['data'] = $this->IeModel->list_new();
		echo json_encode($data);
	}

	public function add_new()
	{


		$style = $this->input->post('style');

		$data = $this->IeModel->add_new($style);
		echo json_encode($data);
	}

	public function delete_sam()
	{
		$id_master_sam = $this->input->post('id_master_sam');

		$this->IeModel->deleteDataSam($id_master_sam);
		echo json_encode($id_master_sam);
	}

	// ==================================================================================================




}
