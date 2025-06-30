<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewing extends MY_Controller
{

	// public function __construct()
	// {
	// 	parent::__construct();

	// 	if ($this->session->userdata('logged_in') !== TRUE) {
	// 		redirect('');
	// 	} else {
	// 		if (strpos($this->session->userdata('username'), 'Admin') !== false) {
	// 			redirect('auth/not_allowed');
	// 		}
	// 	}

	// 	$this->load->model('SewingModel');
	// }

	public function __construct()
	{
		parent::__construct();


		if ((int)$this->session->userdata['role_gi_production'] !== 5 && (int)$this->session->userdata['role_gi_production'] !== 8 && (int)$this->session->userdata('role_gi_production') !== 1) {
			redirect('auth/not_allowed');
		}


		$this->load->model('SewingModel');
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
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/dashboard/dashboardView');
		$this->load->view('footer');
	}

	// public function getTotalOrders()
	// {
	// 	$result = $this->PpicModel->getDataTotalOrders();
	// 	echo json_encode($result);
	// }

	// ==================================================================================================


	// Sidebar
	// ==================================================================================================
	public function getUnreceivedRecutSewing()
	{
		$result = $this->SewingModel->getDataUnreceivedRecutSewing();
		echo json_encode($result);
	}
	// ==================================================================================================





	// QC Endline
	// ==================================================================================================
	public function qc_endline()
	{
		$data['title'] = 'QC Endline | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/qc_endline/qcEndlineView');
		$this->load->view('footer');
	}

	public function getItem()
	{
		$result = $this->SewingModel->getDataItem();
		echo json_encode($result);
	}

	public function getItemPart()
	{
		$id_item = $this->input->get('id_item');

		$result = $this->SewingModel->getDataItemPart($id_item);
		echo json_encode($result);
	}

	public function getDefectMaster()
	{
		$result = $this->SewingModel->getDataDefectMaster();
		echo json_encode($result);
	}

	public function getDefectRecutMaster()
	{
		$result = $this->SewingModel->getDataDefectRecutMaster();
		echo json_encode($result);
	}

	public function getBarcodeDetails()
	{
		$kode_barcode = $this->input->get('kode_barcode');

		$result = $this->SewingModel->getDataBarcodeDetails($kode_barcode);
		echo json_encode($result);
	}

	public function getQcEndlineDefectDaily()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataQcEndlineDefectDaily($line);
		echo json_encode($result);
	}

	public function getQcEndlineDefectYesterday()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataQcEndlineDefectYesterday($line);
		echo json_encode($result);
	}

	public function getQcEndlineDefectMonthly()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataQcEndlineDefectMonthly($line);
		echo json_encode($result);
	}

	public function getQcEndlineDefectShowAll()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataQcEndlineDefectShowAll($line);
		echo json_encode($result);
	}

	public function postQcEndlineDefect()
	{
		date_default_timezone_set("Asia/Jakarta");

		$data = array(
			'created_date' => date("Y-m-d H:i:s"),
			'orc' => $this->input->post('orc'),
			'id_defect' => $this->input->post('defect'),
			'qty_defect' => $this->input->post('qty_defect'),
			'line' => $this->input->post('line')
		);

		$this->SewingModel->postDataQcEndlineDefect($data);
		echo json_encode($data);
	}

	public function postQcEndlineMultipleDefect()
	{
		date_default_timezone_set("Asia/Jakarta");

		$orc = $this->input->post('orc');
		$id_defect = $this->input->post('id_defect');
		$qty_defect = $this->input->post('qty_defect');
		$line = $this->input->post('line');

		$data = [];
		foreach ($id_defect as $key => $row) {

			$data[] = array(
				'created_date' => date("Y-m-d H:i:s"),
				'orc' => $orc,
				'id_defect' => $id_defect[$key],
				'qty_defect' => $qty_defect[$key],
				'line' => $line
			);
		}

		$this->SewingModel->postDataQcEndlineMultipleDefect($data);
		echo json_encode($data);
	}

	public function deleteQcEndlineDefect()
	{
		$id = $this->input->post('id');

		$this->SewingModel->deleteDataQcEndlineDefect($id);
		echo json_encode($id);
	}

	public function getPercentageQcEndlineDaily()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataPercentageQcEndlineDaily($line);
		echo json_encode($result);
	}

	public function getPercentageQcEndlineYesterday()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataPercentageQcEndlineYesterday($line);
		echo json_encode($result);
	}

	public function getPercentageQcEndlineMonthly()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataPercentageQcEndlineMonthly($line);
		echo json_encode($result);
	}

	public function getPercentageQcEndlineShowAll()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataPercentageQcEndlineShowAll($line);
		echo json_encode($result);
	}
	// ==================================================================================================


	// Input Sewing
	// ==================================================================================================
	public function input_sewing()
	{
		$data['title'] = 'Input Sewing | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/input_sewing/inputSewingView');
		$this->load->view('footer');
	}

	public function getInputSewing()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->get_by_line($line);
		echo json_encode($result);
	}

	public function checkCuttingDetail($barcode)
	{
		$rst = $this->SewingModel->get_by_barcode_cutting($barcode);
		echo json_encode($rst);
	}

	public function ajax_get_by_barcode()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			// $line = $dataStr['line'];
			$barcode = $dataStr['barcode'];

			$rst = $this->SewingModel->get_by_line_barcode($barcode);
			echo json_encode($rst);
		};
	}

	public function ajax_get_by_size()
	{
		$data = $this->SewingModel->get_by_size();
		echo json_encode($data);
	}

	public function ajax_get_sewing_sam()
	{
		$rst = $this->SewingModel->get_sewing_sam();

		echo json_encode($rst);
	}

	public function ajax_save_input_sewing()
	{
		$rst = $this->SewingModel->save_input_sewing();
		echo json_encode($rst);
	}

	public function ajax_update_change_line()
	{
		if (isset($_POST['dataUpdate'])) {
			$dataUpdate = $_POST['dataUpdate'];
			$id = $dataUpdate['id_input_sewing'];
			$line = $dataUpdate['line'];

			$rst = $this->SewingModel->update_change_line($id, $line);
			echo json_encode($rst);
		}
	}
	// ==================================================================================================


	// Ubah Input Sewing
	// ==================================================================================================
	public function ubah_input_sewing()
	{
		$data['title'] = 'Ubah Input Sewing | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header_datatable_select', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/ubah_input_sewing/ubahInputSewingView');
		$this->load->view('footer');
	}

	public function ajax_get_all_line()
	{
		$rst = $this->SewingModel->get_all();
		echo json_encode($rst);
	}

	public function ajax_get_by_orc1($orc)
	{
		$result = $this->SewingModel->get_by_orc1($orc);
		echo json_encode($result);
	}

	public function ajax_update()
	{
		$rst = $this->SewingModel->update_line();
		echo json_encode($rst);
	}
	// ==================================================================================================


	// Output Sewing
	// ==================================================================================================
	public function output_sewing()
	{
		$data['title'] = 'Output Sewing | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/output_sewing/outputSewingView');
		$this->load->view('footer');
	}

	public function getOutputSewing()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataOutputSewing($line);
		echo json_encode($result);
	}

	public function getCheckMachineBarcode()
	{
		$kode = $this->input->post('kode');

		$result = $this->SewingModel->getDataCheckMachineBarcode($kode);
		echo json_encode($result);
	}

	public function getOutputSewingYesterday()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataOutputSewingYesterday($line);
		echo json_encode($result);
	}

	public function getOutputSewing3MonthsAgo()
	{
		$line = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->getDataOutputSewing3MonthsAgo($line);
		echo json_encode($result);
	}

	public function ajax_list1()
	{
		$rst = $this->SewingModel->get_by_line_date_now();
		echo json_encode($rst);
	}

	public function ajax_save()
	{
		$rst = $this->SewingModel->save();
		echo json_encode($rst);
	}

	public function ajax_check_barcode($barcode)
	{
		$rst = $this->SewingModel->get_by_barcode($barcode);
		echo json_encode($rst);
	}

	public function ajax_get_group_line_by_barcode($barcode)
	{
		$data = $this->SewingModel->get_group_line_by_barcode($barcode);
		echo json_encode($data);
	}

	public function ajax_get_output_sewing_detail_by_barcode($barcode)
	{
		$rst = $this->SewingModel->get_by_barcode_output_sewing_detail($barcode);
		echo json_encode($rst);
	}

	public function ajax_save_detail()
	{
		if (isset($_POST['dataStr'])) {
			$dataStr = $_POST['dataStr'];

			if ($this->SewingModel->save_details($dataStr) == true) {
				// $rowAffected = $this->SewingModel->updateOutputSewing($dataStr);
				$this->SewingModel->updateOutputSewing($dataStr);

				// echo json_encode($rowAffected);
				echo json_encode(true);
			}else{
				echo json_encode(false);
			}
		}
	}


	// ==================================================================================================

	// Recut Sewing
	// ==================================================================================================
	public function recut_sewing()
	{
		$data['title'] = 'Recut Sewing | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header_datatable_select', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/recut_sewing/recutSewingView');
		$this->load->view('footer');
	}

	public function getRecutSewingOnProgress()
	{
		$result['data'] = $this->SewingModel->getDataRecutSewingOnProgress();
		echo json_encode($result);
	}

	public function getRecutSewingComplete()
	{
		$result['data'] = $this->SewingModel->getDataRecutSewingComplete();
		echo json_encode($result);
	}

	public function getRecutSewingReject()
	{
		$result['data'] = $this->SewingModel->getDataRecutSewingReject();
		echo json_encode($result);
	}

	public function getPartDetails()
	{
		$id_recut_sewing_main = $this->input->get('id_recut_sewing_main');

		$result['data'] = $this->SewingModel->getDataPartDetails($id_recut_sewing_main);
		echo json_encode($result);
	}

	public function getRecutSewingMonthly()
	{
		$result['data'] = $this->SewingModel->getDataRecutSewingMonthly();
		echo json_encode($result);
	}

	public function getRecutSewingShowAll()
	{
		$result['data'] = $this->SewingModel->getDataRecutSewingShowAll();
		echo json_encode($result);
	}

	public function getBarcodeDetailsRecutSewing()
	{
		$kode_barcode = $this->input->get('kode_barcode');

		$result = $this->SewingModel->getDataBarcodeDetailsRecutSewing($kode_barcode);
		echo json_encode($result);
	}


	public function getCheckBarcodeRecutRequest()
	{
		$kode_barcode = $this->input->get('kode_barcode');

		$result = $this->SewingModel->getDataCheckBarcodeRecutRequest($kode_barcode);
		echo json_encode($result);
	}

	public function postRecutSewing()
	{
		date_default_timezone_set("Asia/Jakarta");

		$barcode = $this->input->post('barcode');
		$line = $this->input->post('line');
		$id_item = $this->input->post('id_item');
		$id_part = $this->input->post('id_part');
		$other_part = $this->input->post('other_part');
		$qty_part = $this->input->post('qty_part');
		$id_defect = $this->input->post('id_defect');
		$other_defect = $this->input->post('other_defect');
		$remarks = $this->input->post('remarks');



		$data = $this->SewingModel->getDataBarcodeDetailsRecutSewingArray($barcode);

		$buyer = $data[0]['buyer'];
		$orc = $data[0]['orc'];
		$color = $data[0]['color'];
		$style = $data[0]['style'];
		$size = $data[0]['size'];
		$no_bundle = $data[0]['no_bundle'];

		$query = "SELECT id_line FROM `line` WHERE `name` = '$line'";
		$result = $this->db->query($query);
		$data_line  = $result->result_array();
		$id_line = $data_line[0]['id_line'];

		$data_main = array(
			'created_date' => date("Y-m-d H:i:s"),
			'barcode' => $barcode,
			'buyer' => $buyer,
			'orc' => $orc,
			'color' => $color,
			'style' => $style,
			'size' => $size,
			'no_bundle' => $no_bundle,
			'id_master_item' => $id_item,
			'id_line' => $id_line,
			'status_process' => 1,
			'reject' => 0
		);

		$id_recut_sewing_main = $this->SewingModel->postDataRecutSewingMain($data_main);
		echo json_encode($data_main);

		$query = "SELECT
		MAX(IFNULL( recut_sewing_details.sequence_number, 0 )) AS sequence_number
	FROM
		recut_sewing_details
		INNER JOIN recut_sewing_main ON recut_sewing_details.id_recut_sewing_main = recut_sewing_main.id 
	WHERE
		DATE(recut_sewing_main.created_date ) = CURRENT_DATE";
		$hasil = $this->db->query($query);
		$data  = $hasil->result_array();
		$no = $data[0]['sequence_number'];
		$sequence_number = $no + 1;

		$data_details = [];
		foreach ($id_part as $key => $row) {
			$data_details[] = array(
				'id_recut_sewing_main' => $id_recut_sewing_main,
				'sequence_number' => $sequence_number,
				'id_master_item_part' => $id_part[$key],
				'other_item_part_desc' => ($other_part[$key] == '') ? null : $other_part[$key],
				'id_master_defect_recut' => $id_defect[$key],
				'other_defect_desc' => ($other_defect[$key] == '') ? null : $other_defect[$key],
				'qty' => $qty_part[$key],
				'remarks' => ($remarks[$key] == '') ? null : $remarks[$key]
			);
			$sequence_number++;
		}


		$this->SewingModel->postDataRecutSewingDetails($data_details);
		echo json_encode($data_details);
	}



	// Receive Recut
	public function getCheckBarcodeRecutSewing()
	{
		$barcode = $this->input->get('barcode');

		$result = $this->SewingModel->getDataCheckBarcodeInputSewing($barcode);
		if ($result >= 1) {
			$result = $this->SewingModel->getDataCheckBarcodeOutputRecutCutting($barcode);
			if ($result >= 1) {
				$result = $this->SewingModel->getDataCheckBarcodeReceivedRecutSewingScanned($barcode);
				if ($result == 0) {
					$result = 402; // Sudah di scan semua
					echo json_encode($result);
				} else {
					$result = 200;
					echo json_encode($result); // Oke lanjut
				}
			} else {
				$result = 403; // barcode belum dibuat di input recut
				echo json_encode($result);
			}
		} else {
			$result = 404; // barcode tidak ada
			echo json_encode($result);
		}
	}

	public function getScanBarcodeValueReceivedRecutSewing()
	{
		$barcode = $this->input->get('barcode');

		$result['data'] = $this->SewingModel->getDataScanBarcodeValueReceivedRecutSewing($barcode);
		echo json_encode($result);
	}

	public function postReceivedRecutSewingBySelected()
	{
		date_default_timezone_set("Asia/Jakarta");

		$id_recut_sewing = $this->input->post('id_recut_sewing');

		$data = array(
			'id_recut_sewing' => $id_recut_sewing,
			'date_received' => date('Y-m-d H:i:s')
		);

		$this->SewingModel->postDataReceivedRecutSewingBySelected($data);
		echo json_encode($data);
	}

	public function postReceivedRecutSewingByBarcode()
	{
		date_default_timezone_set("Asia/Jakarta");

		$barcode = $this->input->post('barcode');

		$query = "SELECT
					recut_sewing_main.id 
				FROM
					recut_sewing_main
					LEFT JOIN received_recut_sewing ON recut_sewing_main.id = received_recut_sewing.id_recut_sewing_main
				WHERE
					received_recut_sewing.date_received IS NULL 
					AND recut_sewing_main.barcode = '$barcode'";
		$result = $this->db->query($query);
		$data  = $result->result_array();
		$id_recut_sewing_main = $data[0]['id'];

		$data = array(
			'id_recut_sewing_main' => $id_recut_sewing_main,
			'date_received' => date('Y-m-d H:i:s')
		);

		$this->SewingModel->postDataReceivedRecutSewingByBarcode($data);
		echo json_encode($data);

		$data2 = array(
			'status_process' => 0
		);

		$this->SewingModel->updateStatusProcessRecutSewing($id_recut_sewing_main, $data2);
		// echo json_encode($data2);
	}


	// ==================================================================================================




	// Machine Breakdown
	// ==================================================================================================
	public function machine_breakdown($code = '')
	{
		$data['title'] = 'Machine Breakdown | GI-Production';
		$data['code'] = $code;


		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/machine_breakdown/machineBreakdownView', $data);
		$this->load->view('footer');
	}

	public function ajax_get_machines_breakdown_repairing()
	{

		$rst['data'] = $this->SewingModel->get_machines_breakdown_repairing();
		echo json_encode($rst);
	}

	public function ajax_check_machine_at_breakdown($code)
	{
		$rst = $this->SewingModel->check_machine_at_breakdown($code);
		echo json_encode($rst);
	}

	public function ajax_add_machine_breakdown()
	{

		$rst = $this->SewingModel->add_machine_breakdown();
		echo json_encode($rst);
	}

	public function sendNotification()
	{
		if (isset($_POST['dataNotif'])) {
			$title = $_POST['dataNotif']['title'];
			$id = $_POST['dataNotif']['id'];
			$rst = $this->SewingModel->get_by_id_machine_breakdown($id);

			// echo json_encode($rst);
			// exit();

			$line = $rst->line;
			$brandMachine = $rst->machine_brand;
			$typeMachine = $rst->machine_type;
			$snMachine = $rst->machine_sn;
			$symptom = $rst->sympton;

			$message = "New Machine Breakdown available";

			// $message = "LINE->" . $rst->line . '\n' .
			// 	"Merk Mesin->" . $rst->machine_brand . '\n' .
			// 	"Tipe Mesin->" . $rst->machine_type . '\n' .
			// 	"Mesin SN--->" . $rst->machine_sn . '\n' .
			// 	"Symtomp---->" . $rst->sympton .'\n';
			// // $token = $this->DeviceIdsModel->getToken();
			$tokens = $this->SewingModel->getAllTokens();

			$regIds = [];
			foreach ($tokens as $t) {
				array_push($regIds, $t['token']);
				// print_r($t['token']);
			}

			// echo print_r($regIds);

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => '{
				"registration_ids": ' . json_encode($regIds) . ',
				"notification": {
					"title": "' . $title . " - " . $line . '",
					"body": "' . $message . '"
				},
				"data": {
					"Line": "' . $line . '",
					"Machine Brand": "' . $brandMachine . '",
					"Machine Type": "' . $typeMachine . '",
					"Machine SN": "' . $snMachine . '",
					"Symptom": "' . $symptom . '"
				} 
			}',
				CURLOPT_HTTPHEADER => array(
					'Authorization: key=AAAA8o0O1Wg:APA91bFVnYzfYuZ3OWu8uxrVoFW7Rk2SH7SDO5FnjhRpYFWex56uXPuk9E1SIA_iy3fnbTmh2kYk15jnon7kHcy6uMSjzlK1gbkx2PNUbkFe9yIepuMtDsqQxhEZvxH69lq-HRi-2x7t',
					'Content-Type: application/json'
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
		}
	}
	// ==================================================================================================





	// Output Packing
	// ==================================================================================================
	public function output_packing()
	{
		$data['title'] = 'Output Packing | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/output_packing/outputPackingView');
		$this->load->view('footer');
	}

	public function getOutputPacking()
	{
		$line = $this->session->userdata['username'];

		if ($this->session->userdata('username') == 'Admin Packing') {
			$rst['data'] = $this->SewingModel->getDataOutputPacking();
		} else {
			$rst['data'] = $this->SewingModel->getDataOutputPackingByLine($line);
		}

		echo json_encode($rst);
	}

	public function ajax_list()
	{
		$line = $this->session->userdata['username'];

		if ($this->session->userdata('username') == 'Admin Packing') {
			$rst['data'] = $this->SewingModel->get_all_distinct();
		} else {
			$rst['data'] = $this->SewingModel->get_all_distinct_by_line($line);
		}
		echo json_encode($rst);
	}

	public function ajax_check_input_packing($barcode)
	{
		$r = $this->SewingModel->check_input_packing($barcode);
		echo json_encode($r);
	}

	public function ajax_check_output_sewing_detail($barcode)
	{
		$r = $this->SewingModel->check_output_sewing_detail($barcode);
		echo json_encode($r);
	}

	public function ajax_get_cutting_detail($barcode)
	{
		$r = $this->SewingModel->get_cutting_detail($barcode);
		echo json_encode($r);
	}

	public function ajax_save_packing()
	{
		$rst = $this->SewingModel->save_packing();
		echo json_encode($rst);

		$nik = $this->input->post('nik');
		$query = "SELECT
			id_packing_member
		FROM
			`packing_member_new` 
		WHERE
			`packing_member_new`.`nik` = '$nik'";

		$result = $this->db->query($query);
		$data  = $result->result_array();
		$id_member = $data[0]['id_packing_member'];

		$datas = array(
			'id_packing_member' => $id_member,
			'id_input_packing' => $rst,
		);

		$this->SewingModel->packing_responsibilites($datas);
		echo json_encode($rst);
	}

	public function ajax_get_by_orc1_packing()
	{
		$orc = $this->input->get('orc');

		$rst['data'] = $this->SewingModel->get_by_orc1_packing($orc);
		echo json_encode($rst);
	}


	// ==================================================================================================

	// Bundle Record
	// ==================================================================================================
	public function bundle_record()
	{
		$line = $this->session->userdata['username'];
		$data['title'] = 'Bundle Record ' .	ucwords(strtolower($line)) . '  | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/bundle_record/bundleRecordView');
		// $this->load->view('sewing/bundle_record/bundleRecordView_perSize');
		$this->load->view('footer');
	}

	public function get_orc()
	{
		$data = $this->SewingModel->get_all_orc();
		echo json_encode($data);
	}

	public function get_detail_orc()
	{
		$orc = $this->input->get('orc');

		$result = $this->SewingModel->get_detail($orc);
		echo json_encode($result);
	}

	public function get_datas_reports()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->SewingModel->get_datas_orcs($orc);
		echo json_encode($result);
	}
	// ==================================================================================================

	// Bundle Record V2
	// ==================================================================================================
	public function bundle_record_v2()
	{
		$line = $this->session->userdata['username'];
		$data['title'] = 'Bundle Record ' .	ucwords(strtolower($line)) . '  | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header_datatable_select', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/bundle_record/bundleRecordV2View');
		$this->load->view('footer');
	}

	public function getBundleRecord()
	{
		$orc = $this->input->get('orc');
		$size = $this->input->get('size');

		$result['data'] = $this->SewingModel->getDataBundleRecord($orc, $size);
		echo json_encode($result);
	}

	public function getSizeAndQty()
	{
		$orc = $this->input->get('orc');

		$data = $this->SewingModel->getDataSizeAndQty($orc);
		echo json_encode($data);
	}

	public function getDetails()
	{
		$orc = $this->input->get('orc');

		$data = $this->SewingModel->getDataDetails($orc);
		echo json_encode($data);
	}
	// ==================================================================================================

	// Report Sewing
	// ==================================================================================================
	public function report_sewing()
	{
		$line = $this->session->userdata['username'];
		$data['title'] = 'Report Sewing Line ' .	ucwords(strtolower($line)) . '  | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('sewing/sidebarSewing');
		}
		$this->load->view('navbar');
		$this->load->view('sewing/report_sewing/reportSewingView');
		$this->load->view('footer');
	}

	public function get_datas()
	{
		$username = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->get_datas_report($username);
		echo json_encode($result);
	}

	public function get_detail()
	{
		$username = $this->session->userdata('username');

		$result['data'] = $this->SewingModel->get_datas_detail($username);
		echo json_encode($result);
	}

	public function get_balance()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->SewingModel->get_datas_balance($orc);
		echo json_encode($result);
	}

	public function show_print_bundle()
	{
		$data['title'] = 'Print Cutting Bundle | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('cutting/show_barcode/bundles_print_preview');
		$this->load->view('footer_barcode');
	}
	// ==================================================================================================

	// VERIFIKASI NIK PACKING
	// ==================================================================================================
	public function verifikasi_nik()
	{
		$nik = $this->input->post('nik');
		// $insert_id = $this->SewingModel->simpan_data_dan_dapatkan_id($nik);
		$data = $this->SewingModel->verifikasi_nik($nik);
		echo json_encode($data);
	}
	// ==================================================================================================
}
