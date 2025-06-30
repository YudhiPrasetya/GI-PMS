<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Molding extends MY_Controller
{

	// public function __construct()
	// {
	// 	parent::__construct();

	// 	if ($this->session->userdata('logged_in') !== TRUE) {
	// 		redirect('');
	// 	} else {
	// 		if ($this->session->userdata['username'] != "Admin Molding") {
	// 			redirect('auth/not_allowed');
	// 		}
	// 	}

	// 	$this->load->model('MoldingModel');
	// }

	public function __construct()
	{
		parent::__construct();


		if ((int)$this->session->userdata['role_gi_production'] !== 3 && (int)$this->session->userdata['role_gi_production'] !== 8 && (int)$this->session->userdata('role_gi_production') !== 1) {
			redirect('auth/not_allowed');
		}


		$this->load->model('MoldingModel');
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
			$this->load->view('molding/sidebarMolding');
		}
		$this->load->view('navbar');
		$this->load->view('molding/dashboard/dashboardView');
		$this->load->view('footer');
	}

	public function getTotalInputMolding()
	{
		$result = $this->MoldingModel->getDataTotalInputMolding();
		echo json_encode($result);
	}

	public function getTotalOutputMolding()
	{
		$result = $this->MoldingModel->getDataTotalOutputMolding();
		echo json_encode($result);
	}

	public function getInputMoldingChart()
	{
		$result = $this->MoldingModel->getDataInputMoldingChart();
		echo json_encode($result);
	}

	public function getOutputMoldingChart()
	{
		$result = $this->MoldingModel->getDataOutputMoldingChart();
		echo json_encode($result);
	}


	// ==================================================================================================


	// Input Molding
	// ==================================================================================================
	public function input_molding()
	{
		$data['title'] = 'Input Molding | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('molding/sidebarMolding');
		}
		$this->load->view('navbar');
		$this->load->view('molding/input_molding/inputMoldingView');
		$this->load->view('footer');
	}

	public function getInputMolding()
	{
		$result['data'] = $this->MoldingModel->getDataInputMolding();
		echo json_encode($result);
	}

	public function getInputMoldingYesterday()
	{
		$result['data'] = $this->MoldingModel->getDataInputMoldingYesterday();
		echo json_encode($result);
	}

	public function getInputMolding30DaysAgo()
	{
		$result['data'] = $this->MoldingModel->getDataInputMolding30DaysAgo();
		echo json_encode($result);
	}

	public function postInputMolding($code)
	{
		//check the barcode at cutting_detail
		$codeUpper = strtoupper($code);
		$rst = $this->MoldingModel->check_barcode_mold($codeUpper);
		if ($rst <= 0) {
			$success = array(
				'success' => false,
				'msg' => 'Barcode tidak dikenali.'
				// 'msg' => $rst
			);
			echo json_encode($success);
			exit();
		} else {
			$rst = $this->MoldingModel->check_barcode_mold_input_molding_detail($codeUpper);
			if ($rst > 0) {
				$success = array(
					'success' => false,
					// 'msg' => $rst
					'msg' => 'Barcode sudah pernah di scan.'
				);
				echo json_encode($success);
				exit();
			} else {
				// $this->barcode = $code;
				$result = $this->MoldingModel->get_by_barcode_mold($codeUpper);
				if ($result != null) {
					$rst = $this->MoldingModel->cek_by_orc_nobundle1($result->orc, $result->no_bundle);
					// var_dump($rst);
					// exit();
					if ($rst == 0) {
						//input molding
						// $this->_saveInputMolding($result);
						// var_dump($result);
						// exit();
						$id = $this->MoldingModel->save1($result);
						if ($id > 0) {
							$finalResult = $this->_saveDetail($result, $codeUpper, $id);
							if ($finalResult) {
								$success = array(
									'success' => true,
									'msg' => 'Data Mold berhasil disimpan!'
								);
							} else {
								$success = array(
									'success' => false,
									'msg' => 'Data Mold gagal disimpan, terjadi kesalahan'
								);
							}
							echo json_encode($success);
							exit();
						}
					} else {
						//update molding
						$finalResult = $this->_updateDetail($result, $codeUpper);
						if ($finalResult == true) {
							$success = array(
								'success' => true,
								'msg' => 'Data Mold berhasil diupdate!'
							);
						} else {
							$success = array(
								'success' => false,
								'msg' => 'Data Mold gagal diupdate, terjadi kesalahan'
								// 'msg' => $finalResult
							);
						}

						echo json_encode($success);
						// echo json_encode($finalResult);
						exit();
					}
				}
			}
		}
		// $rst = $this->InputMoldingDetail->saveOuter($code);
	}

	function _updateDetail($data, $code)
	{
		$dt = array(
			'orc' => $data->orc,
			'no_bundle' => $data->no_bundle
		);

		$ret = $this->MoldingModel->get_by_orc_nobundle($dt);
		if ($ret != null) {
			$dtSAM = $this->_get_sam($ret);
			// $codeUpper = strtoupper($code);
			$prefix = substr($code, 0, 1);

			$dataMold = array(
				"id_input_molding" => $ret->id_input_molding,
				"no_bundle" => $ret->no_bundle,
				// "qty_pcs" => $ret->qty_pcs,
				($prefix == "O" ? "outermold_sam" : ($prefix == "M" ? "mildmold_sam" : "linningmold_sam")) => ($prefix == "O" ? $dtSAM->outer_sam : ($prefix == "M" ? $dtSAM->mid_sam : $dtSAM->linning_sam)),
				($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $code
				// "outermold_sam" => $dtSAM->outer_sam,
				// "outermold_barcode" => $code
			);

			$retVal = $this->MoldingModel->update_mold1($dataMold);
			// print_r($retVal);
			// return $retVal;
			if ($retVal > 0) {
				return true;
			} else {
				return false;
			}
			// return $dataMold;
			// vdebug($dataMold);
		}
	}

	function _saveDetail($data, $b, $i)
	{

		$dataSAM = $this->_get_sam($data);
		// $codeUpper = strtoupper($b);
		$prefix = substr($b, 0, 1);

		$dataOuterMold = array(
			"id_input_molding" => $i,
			"no_bundle" => $data->no_bundle,
			"size" => $data->size,
			"group_size" => $dataSAM->grup_size,
			"qty_pcs" => $data->qty_pcs,
			($prefix == "O" ? "outermold_sam" : ($prefix == "M" ? "mildmold_sam" : "linningmold_sam")) => ($prefix == "O" ? $dataSAM->outer_sam : ($prefix == "M" ? $dataSAM->mid_sam : $dataSAM->linning_sam)),
			// "outermold_sam" => $dataSAM->outer_sam,
			// "outermold_barcode" => $b
			($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $b
		);

		$retVal = $this->MoldingModel->save_mold1($dataOuterMold);
		if ($retVal > 0) {
			return true;
		} else {
			return false;
		}
	}

	function _get_sam($dataForSAM)
	{
		$color = $dataForSAM->color;

		// if(strpos($color, "BLACK") == true){
		//     $colorGroup = "Black";
		// }else if(strpos($color, "White") == true){
		//     $colorGroup = "White";
		// }else if(strpos($color, "BLACK") == false && strpos($color, "WHITE") == false){
		//     $colorGroup = "color";
		// }

		$blackPattern = '/black/i';
		$whitePattern = '/white/i';
		if (preg_match($blackPattern, $color) == 1) {
			$colorGroup = 'Black';
		} else if (preg_match($whitePattern, $color) == 1) {
			$colorGroup = 'White';
		} else {
			$colorGroup = 'color';
		}

		$sizeData = $this->MoldingModel->get_by_size1($dataForSAM->size);
		$dataForSAM = array(
			'style' => $dataForSAM->style,
			'color' => $colorGroup,
			'group_size' => $sizeData->group
		);

		$dataSAM = $this->MoldingModel->get_sam1($dataForSAM);
		return $dataSAM;
	}
	// ==================================================================================================






	// Output Molding
	// ==================================================================================================
	public function output_molding()
	{
		$data['title'] = 'Output Molding | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('molding/sidebarMolding');
		}
		$this->load->view('navbar');
		$this->load->view('molding/output_molding/outputMoldingView');
		$this->load->view('footer');
	}

	public function getOutputMolding()
	{
		$result['data'] = $this->MoldingModel->getDataOutputMolding();
		echo json_encode($result);
	}

	public function getOutputMoldingYesterday()
	{
		$result['data'] = $this->MoldingModel->getDataOutputMoldingYesterday();
		echo json_encode($result);
	}

	public function getOutputMolding30DaysAgo()
	{
		$result['data'] = $this->MoldingModel->getDataOutputMolding30DaysAgo();
		echo json_encode($result);
	}

	public function ajax_get_shift()
	{
		$result = $this->MoldingModel->get_shift();
		echo json_encode($result);
	}

	public function ajax_get_molding_mesin_by_barcode($code)
	{
		$rst = $this->MoldingModel->get_by_barcode($code);
		echo json_encode($rst);
	}

	public function ajax_get_by_outermold_barcode($code)
	{
		$rst = $this->MoldingModel->get_by_outermold_barcode($code);
		echo json_encode($rst);
	}

	public function ajax_get_by_midmold_barcode($code)
	{
		$rst = $this->MoldingModel->get_by_midmold_barcode($code);
		echo json_encode($rst);
	}

	public function ajax_get_by_linningmold_barcode($code)
	{
		$rst = $this->MoldingModel->get_by_linningmold_barcode($code);
		echo json_encode($rst);
	}

	public function ajax_check_by_barcode_mid($code)
	{
		$rst = $this->MoldingModel->check_by_barcode_mid($code);

		echo json_encode($rst);
	}

	public function ajax_check_by_barcode_outer($code)
	{
		$rst = $this->MoldingModel->check_by_barcode_outer($code);
		echo json_encode($rst);
	}

	public function ajax_check_by_barcode_linning($code)
	{
		$rst = $this->MoldingModel->check_by_barcode_linning($code);
		echo json_encode($rst);
	}

	public function ajax_save()
	{
		$rst = $this->MoldingModel->save();
		echo json_encode($rst);
	}

	public function ajax_save_detail_outermold()
	{
		$rst = $this->MoldingModel->save_detail_outermold();
		echo json_encode($rst);
	}

	public function ajax_save_detail_midmold()
	{
		$rst = $this->MoldingModel->save_detail_midmold();
		echo json_encode($rst);
	}

	public function ajax_save_detail_linningmold()
	{
		$rst = $this->MoldingModel->save_detail_linningmold();
		echo json_encode($rst);
	}

	// AMachine Allocation
	// ==================================================================================================
	public function allocation()
	{
		$data['title'] = 'Dashboard | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('molding/sidebarMolding');
		}
		$this->load->view('navbar');
		$this->load->view('molding/allocation/machine_allocation');
		$this->load->view('footer');
	}

	public function allocation_datatable()
	{
		$data['title'] = 'Dashboard | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('molding/sidebarMolding');
		}
		$this->load->view('navbar');
		$this->load->view('molding/allocation/allocation_pivot_datatable');
		$this->load->view('footer');
	}

	public function addAllocation()
	{
		$data['title'] = 'Dashboard | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('molding/sidebarMolding');
		}
		$this->load->view('navbar');
		$this->load->view('molding/allocation/add_allocation');
		$this->load->view('footer');
	}

	public function getMachineMolding()
	{
		$result = $this->MoldingModel->getDataMachineMolding();
		echo json_encode($result);
	}
	public function getMemberMolding()
	{
		$result = $this->MoldingModel->getDataMoldingMember();
		echo json_encode($result);
	}

	public function getLineMolding()
	{
		$result = $this->MoldingModel->getDataLineMolding();
		echo json_encode($result);
	}
	public function getStyleMolding()
	{
		$result = $this->MoldingModel->getDataStyleMolding();
		echo json_encode($result);
	}
	public function getOrcMolding()
	{
		$result = $this->MoldingModel->getDataOrcMolding();
		echo json_encode($result);
	}

	public function getColorMolding()
	{
		$result = $this->MoldingModel->getDataColorMolding();
		echo json_encode($result);
	}

	public function getKegelMolding()
	{
		$result = $this->MoldingModel->getDataKegelMolding();
		echo json_encode($result);
	}

	public function getSizeMolding()
	{
		$result = $this->MoldingModel->getDataSizeMolding();
		echo json_encode($result);
	}

	public function addAllocationMolding()
	{
		date_default_timezone_set("Asia/Jakarta");

		$id_mesin_molding = $this->input->post('id_machine');
		$id_molding_member = $this->input->post('id_molding_member');
		$id_line = $this->input->post('id_line');
		$target = $this->input->post('target');
		$demands = $this->input->post('demands');
		$component = $this->input->post('component');
		$orc = $this->input->post('orc');
		$style = $this->input->post('style');
		$color = $this->input->post('color');
		$kegel = $this->input->post('kegel');
		$size = $this->input->post('size');
		$qty = $this->input->post('qty');


		$data_main = array(
			'created_date' => date("Y-m-d H:i:s"),
			'id_mesin_molding' => $id_mesin_molding,
			'id_molding_member' => $id_molding_member,
			'id_line' => $id_line,
			'target' => $target,
			'demands' => $demands,

		);

		$id_plan_molding = $this->MoldingModel->postDataAllocationMoldingtMain($data_main);
		// var_dump($style);
		// die();

		$data_details = [];
		foreach ($style as $key => $row) {

			$data_details[] = array(
				'id_plan_molding' => $id_plan_molding,
				'component' => $component[$key],
				'orc' => $orc[$key],
				'color' => $color[$key],
				'kegel' => $kegel[$key],
				'size' => $size[$key],
				'style' => $style[$key],
				'qty' => $qty[$key],

			);
		}
		// var_dump($data_details);
		// die();

		$this->MoldingModel->postDataAllocationModalDetails($data_details);
		echo json_encode($data_details);
	}

	public function getAllocationMolding()
	{
		$result = $this->MoldingModel->getDataAllAllocationlMolding();
		echo json_encode($result);
	}
	public function getAllocationMoldingDatatable()
	{
		$result['data'] = $this->MoldingModel->getDataAllAllocationlMolding1();
		echo json_encode($result);
	}

	public function detail_allocation()
	{
		$id_plan_molding = $_POST['id_plan_molding'];
		$rst['data'] = $this->MoldingModel->get_detail_allocation_2($id_plan_molding);
		echo json_encode($rst);
	}

	// Master Molding
	// ==================================================================================================
	public function masterKegel()
	{
		$data['title'] = 'Dashboard | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('molding/sidebarMolding');
		}
		$this->load->view('navbar');
		$this->load->view('molding/master/master_kegel');
		$this->load->view('footer');
	}

	public function getMasterKegel()
	{
		$result = $this->MoldingModel->getDataTypeKegelMolding();
		echo json_encode($result);
	}

	public function addMasterKegel()
	{

		$id_kegel_type = $this->input->post('id_kegel_type');
		$diameter = $this->input->post('diameter');
		$shape = $this->input->post('shape');

		$data_main = array(
			'id_kegel_type' => $id_kegel_type,
			'diameter' => $diameter,
			'shape' => $shape,

		);

		$id = $this->MoldingModel->postDataMasterKegel($data_main);

		echo json_encode($id);
	}

	public function ajax_molding_kegel()
	{
		$rst['data'] = $this->MoldingModel->get_molding_kegel();
		echo json_encode($rst);
	}
}
