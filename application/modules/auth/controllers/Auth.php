<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();


		$this->load->model('AuthModel');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	function sign_in()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$sql = "SELECT * FROM user
						WHERE user_name = '$username' AND password = '$password'";

		$query = $this->db->query($sql);
		$res = $query->result();

		$row = $query->num_rows();
		$role = (int)$res[0]->role;
		$user_name = $res[0]->user_name;
		$factory = $res[0]->idFactory;

		if ($row !== 0 && $role == 1) {
			// set session admin cutting
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('admin/dashboard');
		} else if ($row !== 0 && $role == 2) {
			// set session admin molding
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('cutting/dashboard');
		} else if ($row !== 0 && $role == 3) {
			// set session admin molding
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('molding/dashboard');
		} else if ($row !== 0 && $role == 4) {
			// set session admin packing
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('packing/dashboard');
		} else if ($row !== 0 && $role == 5) {
			// set session output sewing
			$groupLocation = $this->AuthModel->get_group_line($username);

			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('group_location', $groupLocation);
			$this->session->set_userdata('id_factory', $factory);
			redirect('sewing/output_sewing');
		} else if ($row !== 0 && $role == 6) {
			// set session admin ppic
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('ppic/dashboard');
		} else if ($row !== 0 && $role == 7) {
			// set session admin mechanic
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('mechanic/dashboard');
		} else if ($row !== 0 && $role == 8) {
			// set session manager
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('manager/dashboard');
		} else if ($row !== 0 && $role == 9) {
			// set session admin ie
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('ie/dashboard');
		} else if ($row !== 0 && $role == 10) {
			// set session admin qc
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('ie/dashboard');
		} else if ($row !== 0 && $role == 16) {
			// set session admin outerwear
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('outerwear/second_dashboard');
		} else if ($row !== 0 && $role == 18) {
			// set session head
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			$this->session->set_userdata('id_factory', $factory);
			redirect('head/dashboard');
		} else if ($row !== 0 && $role == 19) {
			// set session head
			$this->session->set_userdata('userid_gi_production', $res[0]->id_user);
			$this->session->set_userdata('role_gi_production', $res[0]->role);
			$this->session->set_userdata('username', $user_name);
			$this->session->set_userdata('name_gi_production', $user_name);
			redirect('adm/dashboard');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;" role="alert">Incorrect username or password.</div>');
			redirect('');
		}
	}

	// function confirm_active_user()
	// {
	// 	$this->load->view('confirm_active_user_view');
	// }

	// function validation($uname, $psw)
	// {
	// 	$validate = $this->AuthModel->validate($uname, $psw);
	// 	if ($validate->num_rows() > 0) {
	// 		$data  = $validate->row_array();
	// 		$username  = $data['user_name'];
	// 		$groupLocation = $this->AuthModel->get_group_line($username);
	// 		// $level = $data['user_level'];
	// 		$sesdata = array(
	// 			'username'  => $username,
	// 			// 'level'     => $level,
	// 			'logged_in' => TRUE,
	// 			'group_location' => $groupLocation
	// 		);
	// 		$this->session->set_userdata($sesdata);
	// 		switch ($username) {
	// 				// case "Super Admin":
	// 				// 	// $this->updateActive($this->name);
	// 				// 	redirect("admin/dashboard");
	// 				// 	break;
	// 			case "Admin":
	// 				redirect("admin/master_quote");
	// 				break;
	// 			case "Admin PPIC":
	// 				// $this->updateActive($this->name);
	// 				redirect("ppic/dashboard");
	// 				break;
	// 			case "Admin Cutting":
	// 				// $this->updateActive($this->name);
	// 				redirect("cutting/dashboard");
	// 				break;
	// 				// case "Admin Sewing":
	// 				// 	// $this->updateActive($this->name);
	// 				// 	redirect("sewing/dashboard");
	// 				// 	break;
	// 			case "Admin Molding":
	// 				// $this->updateActive($this->name);
	// 				redirect("molding/dashboard");
	// 				break;
	// 			case "Admin Packing":
	// 				// $this->updateActive($this->name);
	// 				redirect("packing/dashboard");
	// 				break;
	// 			case "MANAGER":
	// 				// $this->updateActive($this->name);
	// 				redirect("manager/dashboard");
	// 				break;
	// 				// case "Mover Packing":
	// 				// 	redirect("mover_packing/dashboard");
	// 				// 	break;
	// 				// case "Operator Packing":
	// 				// 	redirect("op_packing/dashboard");
	// 				// 	break;
	// 			case "Admin Mekanik":
	// 				redirect("mechanic/dashboard");
	// 				break;
	// 			case "Admin IE":
	// 				redirect("ie/dashboard");
	// 				break;
	// 			case "Admin Juita":
	// 				redirect("juwita/dashboard");
	// 				break;
	// 			case "Admin SKP":
	// 				redirect("skp/dashboard");
	// 				break;
	// 			case "Admin Outerwear":
	// 				redirect("outerwear/dashboard");
	// 				break;
	// 			default:
	// 				// $this->updateActive($this->name);
	// 				redirect("sewing/output_sewing");
	// 		}

	// 		// $this->load->view('dashboard');

	// 		// if($level === '1'){
	// 		//     redirect('overview');

	// 		// }elseif($level === '2'){
	// 		//     redirect('overview');
	// 		// }

	// 	} else {
	// 		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;" role="alert">Incorrect username or password.</div>');
	// 		redirect('');
	// 	}
	// }

	function logout()
	{
		$name = $this->session->userdata['username'];
		$this->AuthModel->update_inactive($name);

		// $this->session->sess_destroy();
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('group_location');

		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;" role="alert">You have successfully signed out.</div>');
		redirect('');
	}

	// function updateActive($nm){
	//     $rst = $this->AuthModel->update_active($nm);

	//     print_r($rst);
	// }

	// function lockscreen()
	// {
	// 	$data['username'] = $this->session->userdata['username'];
	// 	$this->session->sess_destroy();
	// 	$this->load->view('lock_screen_view', $data);
	// }

	// public function Management()
	// {
	// }

	function not_allowed()
	{
		$this->load->view('405_not_allowed');
	}


	public function not_found()
	{
		$this->output->set_status_header('404');
		$this->load->view('404_not_found');
	}





	// Quote
	// ==================================================================================================
	public function getQuote()
	{
		$result = $this->AuthModel->getDataQuote();
		echo json_encode($result);
	}
	// ==================================================================================================
}
