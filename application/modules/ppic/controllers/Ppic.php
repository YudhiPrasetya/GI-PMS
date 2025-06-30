<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppic extends MY_Controller
{

	// public function __construct()
	// {
	// 	parent::__construct();

	// 	if ($this->session->userdata('logged_in') !== TRUE) {
	// 		redirect('');
	// 	} else {
	// 		if ($this->session->userdata['username'] != "Admin PPIC") {
	// 			redirect('auth/not_allowed');
	// 		}
	// 	}

	// 	$this->load->model('PpicModel');
	// }

	public function __construct()
	{
		parent::__construct();


		if ((int)$this->session->userdata('role_gi_production') !== 6 && (int)$this->session->userdata('role_gi_production') !== 1) {
			redirect('auth/not_allowed');
		}

		// check session
		if (!isset($this->session->userdata['id_factory'])) {
			redirect('auth/not_allowed');
		}
		$this->load->library('curl'); // Load cURL library

		$this->load->model('PpicModel');
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
			$this->load->view('ppic/sidebarPpic');
		}
		$this->load->view('navbar');
		$this->load->view('ppic/dashboard/dashboardView');
		$this->load->view('footer');
	}

	public function getTotalOrders()
	{
		$result = $this->PpicModel->getDataTotalOrders();
		echo json_encode($result);
	}

	public function getTotalCustomers()
	{
		$result = $this->PpicModel->getDataTotalCustomers();
		echo json_encode($result);
	}

	public function getCustomersAndTotalOrders()
	{
		$result['data'] = $this->PpicModel->getDataCustomersAndTotalOrders();
		echo json_encode($result);
	}

	public function getTotalOrdersPerMonth()
	{
		$result = $this->PpicModel->getDataTotalOrdersPerMonth();
		echo json_encode($result);
	}

	public function getTotalShipped()
	{
		$result = $this->PpicModel->getDataTotalShipped();
		echo json_encode($result);
	}

	public function getTotalShippedDetails()
	{
		$result['data'] = $this->PpicModel->getDataTotalShippedDetails();
		echo json_encode($result);
	}

	public function getTotalShippedPerMonth()
	{
		$result = $this->PpicModel->getDataTotalShippedPerMonth();
		echo json_encode($result);
	}
	// ==================================================================================================





	// Master Order
	// ==================================================================================================
	public function master_order()
	{
		$data['title'] = 'Master Order | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ppic/sidebarPpic');
		}
		$this->load->view('navbar');
		$this->load->view('ppic/master_order/masterOrderView');
		$this->load->view('footer');
	}

	public function master_order_icon()
	{
		$data['title'] = 'Master Order | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ppic/sidebarPpic');
		}
		$this->load->view('navbar');
		$this->load->view('ppic/master_order_icon/masterOrderIcon');
		$this->load->view('footer');
	}
	public function get_orc_icon()
	{
		// API endpoint URL
		// $api_url = "http://icons.globalindointimates.id:8099/api?action=get_all_orc";
		$api_url = "http://192.168.92.250:8099/api?action=get_all_orc";

		// Get the API response
		$response = $this->curl->simple_get($api_url);

		// Decode the JSON response
		$data = json_decode($response, true);
		// Send response as JSON
		echo json_encode($data);
	}
	public function getByOrcIcon()
	{
		// Retrieve 'orc' input from the GET request
		$orc = $this->input->get('orc');
		// $api_url = "http://icons.globalindointimates.id:8099/api?action=get_orc&orc=$orc";
		$api_url = "http://192.168.92.250:8099/api?action=get_orc&orc=$orc";

		// Make the API request using curl
		$response = $this->curl->simple_get($api_url);

		// Check if curl returned false (error in the request)
		if ($response === false) {
			echo json_encode(['error' => 'Failed to fetch data from the API']);
			return;
		}


		// Decode the JSON response into an associative array
		$data = json_decode($response, true);
		// Check for JSON decode errors
		if (json_last_error() !== JSON_ERROR_NONE) {
			echo json_encode(['error' => 'Invalid JSON response']);
			return;
		}

		// Process and return the 'data' if it exists, else return an empty array
		$array['data'] = isset($data['data']) ? $data['data'] : [];

		// Output the result as a JSON response
		echo json_encode($array);
	}
	public function getCheckMasterIcon($orc)
	{
		$result = $this->PpicModel->getDataMasterIcon($orc);
		echo json_encode($result);
	}

	public function getMasterOrder()
	{
		$result['data'] = $this->PpicModel->getDataMasterOrder();
		echo json_encode($result);
	}

	public function getStyleSam()
	{
		$result = $this->PpicModel->getDataStyleSam();
		echo json_encode($result);
	}

	public function getLine()
	{
		$result = $this->PpicModel->getDataLine();
		echo json_encode($result);
	}

	public function postNewOrder()
	{
		date_default_timezone_set("Asia/Jakarta");

		$data = array(
			'tgl' => date('Y-m-d H:i:s'),
			'style' => $this->input->post('style'),
			'style_sam' => $this->input->post('style_sam'),
			'orc' => $this->input->post('orc'),
			'comm' => $this->input->post('com'),
			'buyer' => $this->input->post('buyer'),
			'so' => $this->input->post('po_no'),
			'color' => $this->input->post('color'),
			'plan_export' => $this->input->post('shipment'),
			'qty' => $this->input->post('qty'),
			'etd' => $this->input->post('etd'),
			'status' => 'On Progress',
			'line_allocation1' => $this->input->post('line_allocation_1'),
			'line_allocation2' => $this->input->post('line_allocation_2'),
			'line_allocation3' => $this->input->post('line_allocation_3'),
			'id_factory' => $this->session->userdata('id_factory')
		);

		$this->PpicModel->postDataNewOrder($data);
		echo json_encode($data);
	}

	public function updateOrder()
	{
		date_default_timezone_set("Asia/Jakarta");
		$id_order = $this->input->post('id_order');

		$data = array(
			'style' => $this->input->post('style'),
			'style_sam' => $this->input->post('style_sam'),
			'orc' => $this->input->post('orc'),
			'comm' => $this->input->post('com'),
			'buyer' => $this->input->post('buyer'),
			'so' => $this->input->post('po_no'),
			'color' => $this->input->post('color'),
			'plan_export' => $this->input->post('shipment'),
			'qty' => $this->input->post('qty'),
			'etd' => $this->input->post('etd'),
			'line_allocation1' => $this->input->post('line_allocation_1'),
			'line_allocation2' => $this->input->post('line_allocation_2'),
			'line_allocation3' => $this->input->post('line_allocation_3')
		);

		$this->PpicModel->updateDataOrder($id_order, $data);
		echo json_encode($data);
	}

	public function ajax_save_master_order_icon()
	{
		date_default_timezone_set("Asia/Jakarta");

		$orc = $this->input->post('orc');
		$orc_date = $this->input->post('orc_date');
		$shippment_date = $this->input->post('shippment_date');
		$customer_code = $this->input->post('customer_code');
		$customer_name = $this->input->post('customer_name');
		$po_customer = $this->input->post('po_customer');
		$consignee_code = $this->input->post('consignee_code');
		$consignee_name = $this->input->post('consignee_name');
		$site_code = $this->input->post('site_code');
		$site_name = $this->input->post('site_name');
		$orc_type = $this->input->post('orc_type');
		$currencies_code = $this->input->post('currencies_code');
		$note = $this->input->post('note');
		$style_code = $this->input->post('style_code');
		$style_name = $this->input->post('style_name');
		$color = $this->input->post('color');
		$quantity_ordered = $this->input->post('quantity_ordered');
		$uom_code = $this->input->post('uom_code');
		$fob_price = $this->input->post('fob_price');
		$cmt_price = $this->input->post('cmt_price');
		$note2 = $this->input->post('note2');
		$size = $this->input->post('size');
		$quantity = $this->input->post('quantity');
		$sales_order_id = $this->input->post('sales_order_id');
		$patner_id = $this->input->post('patner_id');
		$receiver_patner_id = $this->input->post('receiver_patner_id');
		$site_patner_id = $this->input->post('site_patner_id');
		$orc_type_id = $this->input->post('orc_type_id');
		$currencies_id = $this->input->post('currencies_id');
		$item_base_id = $this->input->post('item_base_id');
		$item_id = $this->input->post('item_id');
		$item_size_id = $this->input->post('item_size_id');
		$item_cup_id = $this->input->post('item_cup_id');

		$data_main = array(

			'orc' => $orc,
			'orc_date' => $orc_date,
			'shippment_date' => $shippment_date,
			'customer_code' => $customer_code,
			'customer_name' => $customer_name,
			'po_customer' => $po_customer,
			'consignee_code' => $consignee_code,
			'consignee_name' => $consignee_name,
			'site_code' => $site_code,
			'site_name' => $site_name,
			'orc_type' => $orc_type,
			'currencies_code' => $currencies_code,
			'note' => $note,
			'style_code' => $style_code,
			'style_name' => $style_name,
			'color' => $color,
			'quantity_ordered' => $quantity_ordered,
			'uom_code' => $uom_code,
			'fob_price' => $fob_price,
			'cmt_price' => $cmt_price,
			'note2' => $note2,
			'sales_order_id' => $sales_order_id,
			'patner_id' => $patner_id,
			'receiver_patner_id' => $receiver_patner_id,
			'site_patner_id' => $site_patner_id,
			'orc_type_id' => $orc_type_id,
			'currencies_id' => $currencies_id,
			'item_base_id' => $item_base_id,
			'item_id' => $item_id,
			'item_size_id' => $item_size_id,
			'item_cup_id' => $item_cup_id

		);
		// var_dump($data_main);
		// die();

		$id_master_order_icon_main = $this->PpicModel->postDataMasterOrderIconMain($data_main);


		// Prepare details data
		$data_details = [];
		if (is_array($size) && is_array($quantity) && count($size) == count($quantity)) {
			foreach ($size as $key => $row) {
				$data_details[] = [
					'id_master_order_icon_main' => $id_master_order_icon_main,
					'size' => $size[$key],
					'quantity' => $quantity[$key]
				];
			}

			// Insert order details
			$this->PpicModel->postDataMasterOrderIconDetails($data_details);
		}
	}


	public function deleteMasterOrder()
	{
		$id_order = $this->input->post('id_order');

		$this->PpicModel->deleteDataMasterOrder($id_order);
		echo json_encode($id_order);
	}

	// ==================================================================================================



	// Master Order
	// ==================================================================================================
	public function master_order_add_on()
	{
		$data['title'] = 'Master Order (Add On) | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header_datatable_select', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ppic/sidebarPpic');
		}
		$this->load->view('navbar');
		$this->load->view('ppic/master_order_add_on/masterOrderAddOnView');
		$this->load->view('footer');
	}

	public function getorc_mysql()
	{
		$data = $this->PpicModel->getDataOrc_mysql();
		echo json_encode($data);
	}

	public function getMasterOrderAddOn()
	{
		$result['data'] = $this->PpicModel->getDataMasterOrderAddOn();
		echo json_encode($result);
	}

	public function postAppendSelected()
	{
		$items = $this->input->post('items');

		$result = $this->PpicModel->postDataAppendSelected($items);
		echo json_encode($result);
	}

	public function getAll3()
	{
		$orc = $this->input->post('orc');

		$data['data'] = $this->PpicModel->getDataAll3($orc);
		echo json_encode($data);
	}

	public function appendSelectedDetail()
	{
		$datax = $this->input->post('datax');

		$result = $this->PpicModel->appendDataSelectedDetail($datax);
		echo json_encode($result);
	}


	// ==================================================================================================




	// Order Allocation
	// ==================================================================================================
	public function order_allocation()
	{
		$data['title'] = 'Order Allocation | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ppic/sidebarPpic');
		}
		$this->load->view('navbar');
		$this->load->view('ppic/order_allocation/orderAllocationView');
		$this->load->view('footer');
	}

	public function getOrder()
	{
		$result['data'] = $this->PpicModel->getDataOrder();
		echo json_encode($result);
	}

	public function getCheckIdOrder($id_order)
	{
		$result = $this->PpicModel->getDataCheckIdOrder($id_order);
		echo json_encode($result);
	}

	public function getStockOrder($id_order)
	{
		$result = $this->PpicModel->getDataStockOrder($id_order);
		echo json_encode($result);
	}

	public function getPlanning()
	{
		$id_order = $this->input->get('id_order');

		$result['data'] = $this->PpicModel->getDataPlanning($id_order);
		echo json_encode($result);
	}

	public function getMaxDate()
	{
		$id_line = $this->input->get('id_line');

		$result = $this->PpicModel->getDataMaxDate($id_line);
		echo json_encode($result);
	}

	public function postPlanning()
	{
		date_default_timezone_set("Asia/Jakarta");

		$data = array(
			'id_order' => $this->input->post('id_order'),
			'created_date' => date("Y-m-d H:i:s"),
			'id_line' => $this->input->post('line'),
			'qty_line' => $this->input->post('qty_allocation'),
			'target_output_per_day' => $this->input->post('target_output'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'eta_mat_date' => $this->input->post('eta_mat'),
			'remarks' => $this->input->post('remarks')
		);

		$this->PpicModel->postDataPlanning($data);
		echo json_encode($data);
	}

	public function updatePlanning()
	{
		date_default_timezone_set("Asia/Jakarta");

		$id_planning = $this->input->post('id_planning');

		$data = array(
			'updated_date' => date("Y-m-d H:i:s"),
			'eta_mat_date' => $this->input->post('eta_mat'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date')
		);

		$this->PpicModel->updateDataPlanning($id_planning, $data);
		echo json_encode($data);
	}

	public function deletePlanning()
	{
		$id_planning = $this->input->post('id_planning');

		$this->PpicModel->deleteDataPlanning($id_planning);
		echo json_encode($id_planning);
	}
	// ==================================================================================================


	// Production Planning
	// ==================================================================================================
	public function production_planning()
	{
		$data['title'] = 'Production Planning | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ppic/sidebarPpic');
		}
		$this->load->view('navbar');
		$this->load->view('ppic/production_planning/productionPlanningView');
		$this->load->view('footer');
	}

	public function getLineFilter()
	{
		$result = $this->PpicModel->getDataLineFilter();
		echo json_encode($result);
	}

	public function getPlanningProduction()
	{
		$result['data'] = $this->PpicModel->getDataPlanningProduction();
		echo json_encode($result);
	}

	public function getPlanningProductionFilterByLine()
	{
		$id_line = $this->input->get('id_line');

		$result['data'] = $this->PpicModel->getdataPlanningProductionFilterByLine($id_line);
		echo json_encode($result);
	}

	public function getOutputSewingDetails()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->PpicModel->getDataOutputSewingDetails($orc);
		echo json_encode($result);
	}
	// ==================================================================================================


	// Production Report
	// ==================================================================================================
	public function production_report()
	{
		$data['title'] = 'Production Report | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ppic/sidebarPpic');
		}
		$this->load->view('navbar');
		$this->load->view('ppic/production_report/productionreportView');
		$this->load->view('footer');
	}

	public function getReportPlanningProduction()
	{
		$result['data'] = $this->PpicModel->getDataReportPlanningProduction();
		echo json_encode($result);
	}

	public function getOutputCuttingSizeDetails()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->PpicModel->getDataOutputCuttingSizeDetails($orc);
		echo json_encode($result);
	}

	public function getOutputSewingSizeDetails()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->PpicModel->getDataOutputSewingSizeDetails($orc);
		echo json_encode($result);
	}

	public function getOutputPackingSizeDetails()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->PpicModel->getDataOutputPackingSizeDetails($orc);
		echo json_encode($result);
	}

	public function getTransferAreaSizeDetails()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->PpicModel->getDataTransferAreaSizeDetails($orc);
		echo json_encode($result);
	}

	public function getOutputAllDeptSizeDetails()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->PpicModel->getDataOutputAllDeptSizeDetails($orc);
		echo json_encode($result);
	}
	// ==================================================================================================

	// Production Report (New)
	// ==================================================================================================
	public function production_report_new()
	{
		$data['title'] = 'Production Report (New) | GI-Production';

		$role = $this->session->userdata('role_gi_production');

		$this->load->view('header', $data);
		if ($role == 1) {
			$this->load->view('admin/sidebarAdmin');
		} else {
			$this->load->view('ppic/sidebarPpic');
		}
		$this->load->view('navbar');
		$this->load->view('ppic/production_report_new/productionreportNewView');
		$this->load->view('footer');
	}

	public function getNewReportPlanningProduction()
	{
		$result['data'] = $this->PpicModel->getDataNewReportPlanningProduction();
		echo json_encode($result);
	}

	public function getNewOutputPackingSizeDetails()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->PpicModel->getDataNewOutputPackingSizeDetails($orc);
		echo json_encode($result);
	}

	public function getNewOutputAllDeptSizeDetails()
	{
		$orc = $this->input->get('orc');

		$result['data'] = $this->PpicModel->getDataNewOutputAllDeptSizeDetails($orc);
		echo json_encode($result);
	}

	public function summary_prod_global()
	{
		$data['title'] = 'Production Report | GI-Production';

		$this->load->view('header', $data);
		$this->load->view('ppic/sidebarPpic');
		$this->load->view('navbar');
		$this->load->view('ppic/summaries/production_summary_global');
		$this->load->view('footer');
	}

	public function get_summary_prod_global()
	{
		$result['data'] = $this->PpicModel->getDataSummaryProdGlobal();
		echo json_encode($result);
	}
}
