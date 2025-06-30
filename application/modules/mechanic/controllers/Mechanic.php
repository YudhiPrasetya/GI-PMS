<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mechanic extends MY_Controller
{

	// public function __construct()
	// {
	// 	parent::__construct();

	// 	if ($this->session->userdata('logged_in') !== TRUE) {
	// 		redirect('');
	// 	} else {
	// 		if ($this->session->userdata['username'] != "Admin Mekanik") {
	// 			redirect('auth/not_allowed');
	// 		}
	// 	}

	// 	$this->load->model('MechanicModel');
	// }


	public function __construct()
	{
		parent::__construct();


		if ((int)$this->session->userdata['role_gi_production'] !== 7 && (int)$this->session->userdata('role_gi_production') !== 1) {
			redirect('auth/not_allowed');
		}


		$this->load->model('MechanicModel');
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
			$this->load->view('mechanic/sidebarMechanic');
		}
		$this->load->view('navbar');
		$this->load->view('mechanic/dashboard/dashboardView');
		$this->load->view('footer');
	}

	public function ajax_count_repairing_machines()
	{
		$rst = $this->MechanicModel->count_repairing_machines();
		echo json_encode($rst);
	}

	public function ajax_count_waiting_machines()
	{
		$rst = $this->MechanicModel->count_waiting_machines();
		echo json_encode($rst);
	}

	public function ajax_count_all_machines()
	{
		$rst = $this->MechanicModel->count_all_machines();
		echo json_encode($rst);
	}

	public function getActiveMechanics()
	{
		$rst = $this->MechanicModel->getDataActiveMechanics();
		echo json_encode($rst);
	}

	public function getChartMachineBreakdown()
	{
		$date = $this->input->get('date');

		$rst = $this->MechanicModel->getDataChartMachineBreakdown($date);
		echo json_encode($rst);
	}

	// ==================================================================================================



	// Master User
	// ==================================================================================================
	public function master_user()
	{
		$data['title'] = 'Master User | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('mechanic/sidebarMechanic');
		}
		$this->load->view('navbar');
		$this->load->view('mechanic/master_user/masterUserView');
		$this->load->view('footer');
	}

	public function getMasterUser()
	{
		$rst['data'] = $this->MechanicModel->getDataMasterUser();
		echo json_encode($rst);
	}

	public function getCheckUser($nik)
	{
		$result = $this->MechanicModel->getDataCheckUser($nik);
		echo json_encode($result);
	}

	public function postNewUser()
	{
		date_default_timezone_set("Asia/Jakarta");

		$data = array(
			'NIK' => $this->input->post('nik'),
			'Nama' => $this->input->post('nama'),
			'Inisial' => $this->input->post('inisial'),
			'Bagian' => $this->input->post('bagian'),
			'Shift' => $this->input->post('shift'),
			'barcode' => 'MK-' . $this->input->post('nik'),
			'isMachineBreakdown' => 1,
			'isQuickChange' => 1,
			'isMaintenance' => 1

		);

		$this->MechanicModel->postDataNewUser($data);
		echo json_encode($data);
	}

	public function updateUser()
	{
		$id_mekanik_member = $this->input->post('id_mekanik_member');

		$data = array(
			'Nama' => $this->input->post('nama'),
			'Inisial' => $this->input->post('inisial'),
			'Bagian' => $this->input->post('bagian'),
			'Shift' => $this->input->post('shift')
		);

		$this->MechanicModel->updateDataUser($id_mekanik_member, $data);
		echo json_encode($data);
	}

	public function updateUserActive()
	{
		$id_user_mekanik = $this->input->post('id_user_mekanik');
		$active = $this->input->post('active');

		$data = array(
			'active' => $active,
		);

		$this->MechanicModel->updateDataNewsActive($id_user_mekanik, $data);
	}

	// ==================================================================================================



	// Machine Breakdown Monitoring
	// ==================================================================================================
	public function machine_breakdown_monitoring()
	{
		$data['title'] = 'Machine Breakdown Monitoring | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('mechanic/sidebarMechanic');
		}
		$this->load->view('navbar');
		$this->load->view('mechanic/machine_breakdown_monitoring/machineBreakdownMonitoringView');
		$this->load->view('footer');
	}

	public function ajax_get_1stfloor_data()
	{
		$rst = $this->MechanicModel->get_1stfloor_data();
		echo json_encode($rst);
	}
	// ==================================================================================================

	// Machine Breakdown
	// ==================================================================================================
	public function machine_waiting()
	{
		$data['title'] = 'Machine Waiting | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('mechanic/sidebarMechanic');
		}
		$this->load->view('navbar');
		$this->load->view('mechanic/machine_waiting/machineWaitingView');
		$this->load->view('footer');
	}

	public function ajax_get_1stfloor_waiting_data()
	{
		$rst = $this->MechanicModel->get_1stfloor_waiting_data();
		echo json_encode($rst);
	}
	// ==================================================================================================


	// Machine Repairing
	// ==================================================================================================
	public function machine_repairing()
	{
		$data['title'] = 'Machine Repairing | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('mechanic/sidebarMechanic');
		}
		$this->load->view('navbar');
		$this->load->view('mechanic/machine_repairing/machineRepairingView');
		$this->load->view('footer');
	}

	public function ajax_get_1stfloor_repairing_data()
	{
		$rst = $this->MechanicModel->get_1stfloor_repairing_data();
		echo json_encode($rst);
	}
	// ==================================================================================================


	// Delayed Machine Settlement
	// ==================================================================================================
	public function delayed_machine_settlement()
	{
		$data['title'] = 'Delayed Machine Settlement | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('mechanic/sidebarMechanic');
		}
		$this->load->view('navbar');
		$this->load->view('mechanic/delayed_machine_settlement/delayedMachineSettlementView');
		$this->load->view('footer');
	}

	// ==================================================================================================


	// Clearing Machine Breakdown
	// ==================================================================================================
	public function clearing_machine_breakdown()
	{
		$data['title'] = 'Clearing Machine Breakdown | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('mechanic/sidebarMechanic');
		}
		$this->load->view('navbar');
		$this->load->view('mechanic/clearing_machine_breakdown/clearingMachineBreakdown');
		$this->load->view('footer');
	}

	public function ajax_get_machines_breakdown_or_repairing()
	{
		$rst['data'] = $this->MechanicModel->get_machines_breakdown_or_repairing();
		echo json_encode($rst);
	}

	public function ajax_clear_machine_breakdown_or_repairing($id)
	{
		$rst = $this->MechanicModel->clear_machine_breakdown_or_repairing($id);
		echo json_encode($rst);
	}
	// ==================================================================================================






}
