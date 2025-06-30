<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();


		if ((int)$this->session->userdata['role_gi_production'] !== 1) {
			redirect('auth/not_allowed');
		}


		$this->load->model('AdminModel');
	}


	// Master Quote
	// ==================================================================================================
	public function master_quote()
	{
		$data['title'] = 'Master Quote | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('admin/sidebarAdmin');
		$this->load->view('navbar');
		$this->load->view('admin/master_quote/masterQuoteView');
		$this->load->view('footer');
	}
	public function getMasterQuote()
	{
		$result['data'] = $this->AdminModel->getDataMasterQuote();
		echo json_encode($result);
	}
	public function postQuote()
	{
		date_default_timezone_set("Asia/Jakarta");

		$data = array(
			'created_date' => date("Y-m-d H:i:s"),
			'quote' => $this->input->post('quote'),
			'author' => ($this->input->post('author') == '') ? null : $this->input->post('author'),
			'active' => 0
		);

		$this->AdminModel->postDataQuote($data);
		echo json_encode($data);
	}
	public function updateActiveQuote()
	{
		$id_quote = $this->input->post('id_quote');
		$active = $this->input->post('active');

		$data = array(
			'active' => $active,
		);

		$this->AdminModel->updateDataActiveQuote($id_quote, $data);
	}
	public function updateQuote()
	{
		$id_quote = $this->input->post('id_quote');

		$data = array(
			'quote' => $this->input->post('quote'),
			'author' => ($this->input->post('author') != "") ? $this->input->post('author') : null
		);

		$this->AdminModel->updateDataQuote($id_quote, $data);
		echo json_encode($data);
	}
	public function deleteQuote()
	{
		$id_quote = $this->input->post('id_quote');

		$this->AdminModel->deleteDataQuote($id_quote);
		echo json_encode($id_quote);
	}
	// ==================================================================================================


	// MASTER USER
	// ==================================================================================================
	public function master_user()
	{
		$data['title'] = 'Master User | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('admin/sidebarAdmin');
		$this->load->view('navbar');
		$this->load->view('admin/master_user/masterUserView');
		$this->load->view('footer');
	}
	public function getMasterUser()
	{
		$result['data'] = $this->AdminModel->getDataMasterUser();
		echo json_encode($result);
	}
	public function getMasterFactory()
	{
		$result = $this->AdminModel->getMasterFactory();
		echo json_encode($result);
	}
	public function getMasterRole()
	{
		$result = $this->AdminModel->getMasterRole();
		echo json_encode($result);
	}
	public function updateActiveUser()
	{
		$id_user = $this->input->post('id_user');
		$active = $this->input->post('active');

		$data = array(
			'active' => $active,
		);

		$this->AdminModel->updateDataActiveUser($id_user, $data);
	}
	public function postUser()
	{

		$data = array(
			'user_name' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'role' => $this->input->post('role'),
			'idFactory' => $this->input->post('factory'),
			'active' => 0
		);

		$this->AdminModel->postDataUser($data);
		echo json_encode($data);
	}
	public function deleteUser()
	{
		$id_user = $this->input->post('id_user');

		$this->AdminModel->deleteDataUser($id_user);
		echo json_encode($id_user);
	}
	public function updateUser()
	{
		$id_user = $this->input->post('id_user');
		$passwordModal = md5($this->input->post('passwordModal'));
		// var_dump($passwordModal);
		// die;

		if ($passwordModal != '') {

			$data = array(
				'user_name' => $this->input->post('usernameModal'),
				'password' => $passwordModal,
				'role' => $this->input->post('roleModal'),
				'idFactory' => $this->input->post('factoryModal'),
			);
		} else {
			$data = array(
				'user_name' => $this->input->post('usernameModal'),
				'role' => $this->input->post('roleModal'),
				'idFactory' => $this->input->post('factoryModal'),
			);
		}


		$this->AdminModel->updateDataUser($id_user, $data);
		echo json_encode($data);
	}
	// ==================================================================================================


	// MASTER LINE
	// ==================================================================================================
	public function master_line()
	{
		$data['title'] = 'Master Line | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('admin/sidebarAdmin');
		$this->load->view('navbar');
		$this->load->view('admin/master_line/masterLineView');
		$this->load->view('footer');
	}
	public function getMasterLine()
	{
		$result['data'] = $this->AdminModel->getDataMasterLine();
		echo json_encode($result);
	}
	public function getMasterHead()
	{
		$result = $this->AdminModel->getMasterHead();
		echo json_encode($result);
	}
	public function getMasterSpv()
	{
		$result = $this->AdminModel->getMasterSpv();
		echo json_encode($result);
	}
	public function postLine()
	{

		$data = array(
			'name' => $this->input->post('nameline'),
			'description' => $this->input->post('description'),
			'shift' => $this->input->post('shift'),
			'head' => $this->input->post('head'),
			'id_spv' => $this->input->post('spv'),
			'Zone' => $this->input->post('zone'),
			'idFactory' => $this->input->post('factory'),
			'floor' => '1st Floor'
		);

		$this->AdminModel->postDataLine($data);
		echo json_encode($data);
	}
	public function deleteLine()
	{
		$id_line = $this->input->post('id_line');

		$this->AdminModel->deleteDataLine($id_line);
		echo json_encode($id_line);
	}
	public function updateLine()
	{
		$id_line = $this->input->post('id_line');
		// $passwordModal = $this->input->post('passwordModal');
		// var_dump($passwordModal);
		// die;

		$data = array(
			'name' => $this->input->post('namelineModal'),
			'description' => $this->input->post('descriptionModal'),
			'shift' => $this->input->post('shiftModal'),
			'head' => $this->input->post('headModal'),
			'id_spv' => $this->input->post('spvModal'),
			'Zone' => $this->input->post('zoneModal'),
			'idFactory' => $this->input->post('factoryModal'),
		);


		$this->AdminModel->updateDatLine($id_line, $data);
		echo json_encode($data);
	}
	// ==================================================================================================

	// MASTER HEAD
	// ==================================================================================================
	public function master_head()
	{
		$data['title'] = 'Master Head | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('admin/sidebarAdmin');
		$this->load->view('navbar');
		$this->load->view('admin/master_head/masterHeadView');
		$this->load->view('footer');
	}
	public function getMasterHeadTable()
	{
		$result['data'] = $this->AdminModel->getDataMasterHead();
		echo json_encode($result);
	}
	public function postHead()
	{
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama_head' => $this->input->post('nameHead')
		);

		$this->AdminModel->postDataHead($data);
		echo json_encode($data);
	}
	public function deleteHead()
	{
		$id_head = $this->input->post('id_head');

		$this->AdminModel->deleteDataHead($id_head);
		echo json_encode($id_head);
	}
	public function updateHead()
	{
		$id_head = $this->input->post('id_head');

		$data = array(
			'nik' => $this->input->post('nikModal'),
			'nama_head' => $this->input->post('nameHeadModal')
		);
		$this->AdminModel->updateDatHead($id_head, $data);
		echo json_encode($data);
	}
	// ==================================================================================================


	// MASTER SPV
	// ==================================================================================================
	public function master_spv()
	{
		$data['title'] = 'Master Spv | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('admin/sidebarAdmin');
		$this->load->view('navbar');
		$this->load->view('admin/master_spv/masterSpvView');
		$this->load->view('footer');
	}
	public function getMasterDataSpvTable()
	{
		$result['data'] = $this->AdminModel->getDataMasterSpv();
		echo json_encode($result);
	}
	public function postSpv()
	{
		$data = array(
			'nik' => $this->input->post('nik'),
			'name' => $this->input->post('nameSpv'),
			'shift' => $this->input->post('shift')
		);

		$this->AdminModel->postDataSpv($data);
		echo json_encode($data);
	}
	public function deleteSpv()
	{
		$id_spv = $this->input->post('id_spv');

		$this->AdminModel->deleteDataSpv($id_spv);
		echo json_encode($id_spv);
	}
	public function updateSpv()
	{
		$id_spv = $this->input->post('id_spv');

		$data = array(
			'nik' => $this->input->post('nikModal'),
			'name' => $this->input->post('nameSpvModal'),
			'shift' => $this->input->post('shiftModal')
		);
		$this->AdminModel->updateDatSpv($id_spv, $data);
		echo json_encode($data);
	}
	// ==================================================================================================


	// MASTER SIZE
	// ==================================================================================================
	public function master_size()
	{
		$data['title'] = 'Master Size | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('admin/sidebarAdmin');
		$this->load->view('navbar');
		$this->load->view('admin/master_size/masterSizeView');
		$this->load->view('footer');
	}
	public function getMasterSizeTable()
	{
		$result['data'] = $this->AdminModel->getDataMasterSize();
		echo json_encode($result);
	}
	public function check_size()
	{
		$size = strtoupper($this->input->get('size'));
		$group = $this->input->get('group');

		// var_dump($size);
		$data = $this->AdminModel->check_size($size, $group);
		echo json_encode($data);
	}
	public function postSize()
	{
		$data = array(
			'size' => $this->input->post('size'),
			'group' => $this->input->post('group')
		);

		$this->AdminModel->postDataSize($data);
		echo json_encode($data);
	}
	public function deleteSize()
	{
		$id_mastersize = $this->input->post('id_mastersize');

		$this->AdminModel->deleteDataSize($id_mastersize);
		echo json_encode($id_mastersize);
	}
	public function updateSize()
	{
		$id_mastersize = $this->input->post('id_mastersize');

		$data = array(
			'size' => $this->input->post('sizeModal'),
			'group' => $this->input->post('groupModal')
		);
		$this->AdminModel->updateDatSize($id_mastersize, $data);
		echo json_encode($data);
	}
	// ==================================================================================================


	// DASHBOARD
	// ==================================================================================================
	public function dashboard()
	{
		$data['title'] = 'Dashboard | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('admin/sidebarAdmin');
		$this->load->view('navbar');
		$this->load->view('admin/dashboard/dashboardView');
		$this->load->view('footer');
	}
	public function getTotalMaster_Quote()
	{
		$result = $this->AdminModel->getDataTotal_Master_Quote();
		echo json_encode($result);
	}
	public function getTotalMaster_User()
	{
		$result = $this->AdminModel->getDataTotal_Master_User();
		echo json_encode($result);
	}
	public function getTotalMaster_Line()
	{
		$result = $this->AdminModel->getDataTotal_Master_Line();
		echo json_encode($result);
	}
	public function getTotalMaster_Head()
	{
		$result = $this->AdminModel->getDataTotal_Master_Head();
		echo json_encode($result);
	}
	public function getTotalMaster_Size()
	{
		$result = $this->AdminModel->getDataTotal_Master_Size();
		echo json_encode($result);
	}
	public function getTotalMaster_Spv()
	{
		$result = $this->AdminModel->getDataTotal_Master_Spv();
		echo json_encode($result);
	}
	// ==================================================================================================




	// MASTER FACTORY
	// ==================================================================================================
	public function Master_factory()
	{
		$data['title'] = 'Master factory | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('admin/sidebarAdmin');
		$this->load->view('navbar');
		$this->load->view('admin/master_factory/masterFactoryView');
		$this->load->view('footer');
	}
	public function postFactory()
	{
		$data = array(
			'Factory' => $this->input->post('factory'),
			'address' => $this->input->post('address')
		);

		$this->AdminModel->postDataFactory($data);
		echo json_encode($data);
	}
	public function getMasterFactoryData()
	{
		$result['data'] = $this->AdminModel->getMasterFactoryData();
		echo json_encode($result);
	}
	public function deleteFactory()
	{
		$idFactory = $this->input->post('idFactory');

		$this->AdminModel->deleteDataFactory($idFactory);
		echo json_encode($idFactory);
	}
	public function updateFactory()
	{
		$idFactory = $this->input->post('idFactory');

		$data = array(
			'Factory' => $this->input->post('factoryModal'),
			'address' => $this->input->post('addressModal')
		);
		$this->AdminModel->updateDatFactory($idFactory, $data);
		echo json_encode($data);
	}
	// ==================================================================================================
}
