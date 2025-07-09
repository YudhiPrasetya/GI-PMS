<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Packing extends MY_Controller
{

 // public function __construct()
 // {
 //     parent::__construct();

 //     if ($this->session->userdata('logged_in') !== TRUE) {
 //         redirect('');
 //     } else {
 //         if ($this->session->userdata['username'] != "Admin Packing") {
 //             redirect('auth/not_allowed');
 //         }
 //     }

 //     $this->load->model('PackingModel');
 // }

 public function __construct()
 {
  parent::__construct();


  if ((int)$this->session->userdata['role_gi_production'] !== 4 && (int)$this->session->userdata('role_gi_production') !== 1) {
   redirect('auth/not_allowed');
  }


  $this->load->model('PackingModel');
 }

 // =====================================DASHBOARD=====================================================

 // Dashboard
 // ===================================================================================================
 public function dashboard()
 {
  $data['title'] = 'Dashboard | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/dashboard/dashboardView');
  $this->load->view('footer');
 }

 public function getTotalInFinishGood()
 {
  $rst = $this->PackingModel->getDataTotalInFinishGood();
  echo json_encode($rst);
 }

 public function getTotalOutFinishGood()
 {
  $rst = $this->PackingModel->getDataTotalOutFinishGood();
  echo json_encode($rst);
 }

 public function getTotalInFinishGoodChart()
 {
  $rst = $this->PackingModel->getDataTotalInFinishGoodChart();
  echo json_encode($rst);
 }

 public function getTotalOutFinishGoodChart()
 {
  $rst = $this->PackingModel->getDataTotalOutFinishGoodChart();
  echo json_encode($rst);
 }

 public function getCapacityLine()
 {
  $rst['data'] = $this->PackingModel->getDataCapacityLine();
  echo json_encode($rst);
 }

 public function getCapacityLineDetails()
 {
  $line = $this->input->get('line');

  $rst['data'] = $this->PackingModel->getDataCapacityLineDetails($line);
  echo json_encode($rst);
 }

 // ===================================================================================================

 public function ajax_all_filter_by_line()
 {

  $data['title'] = 'Dashboard Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/dashboard/filterByLine');
  $this->load->view('footer');
 }

 public function out_finish_good_details()
 {
  $data['title'] = 'Finish Good Details (Out) | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/dashboard/outFinishGoodView');
  $this->load->view('footer');
 }

 public function in_finish_good_details()
 {

  $data['title'] = 'Finish Good Details (In) | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/dashboard/inFinishGoodView');
  $this->load->view('footer');
 }

 public function ajax_show_detail_fg_by_lokasi_in($line)
 {
  $data['title'] = 'Dashboard Packing | GI-Production';
  $rst['data'] = $this->PackingModel->get_fg_by_line_in(urldecode($line));

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/dashboard/fg_detail_view', $rst);
  $this->load->view('footer');
 }

 public function ajax_show_detail_fg_by_lokasi($line)
 {
  $data['title'] = 'Dashboard Packing | GI-Production';
  $rst['data'] = $this->PackingModel->get_fg_by_line(urldecode($line));

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/dashboard/fg_detail_view', $rst);
  $this->load->view('footer');
 }

 public function ajax_show_detail_fg_by_lokasi_out($lokasi)
 {
  $rst['data'] = $this->PackingModel->get_fg_by_line_out(urldecode($lokasi));

  $data['title'] = 'Dashboard Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/dashboard/fg_detail_view', $rst);
  $this->load->view('footer');
 }

 public function ajax_get_fg_results()
 {
  $data['count_cartons_all'] = $this->PackingModel->get_count_cartons_all();
  $data['count_cartons_out'] = $this->PackingModel->get_count_cartons_out();
  $data['count_cartons_in'] = $this->PackingModel->get_count_cartons_in();

  $data['sum_pcs_all'] = $this->PackingModel->get_sum_pcs_all();
  $data['sum_pcs_out'] = $this->PackingModel->get_sum_pcs_out();
  $data['sum_pcs_in'] = $this->PackingModel->get_sum_pcs_in();

  echo json_encode($data);
 }

 public function ajax_get_all_lines()
 {
  $rst = $this->PackingModel->get_all_lines();

  echo json_encode($rst);
 }

 public function ajax_get_count_status_in()
 {
  $rst = $this->PackingModel->get_count_status_in();

  echo json_encode($rst);
 }

 public function ajax_get_all_filter_by_line()
 {
  $rst['data'] = $this->PackingModel->all_filter_by_line();

  echo json_encode($rst);
 }

 public function fiter_by_line_view()
 {
  $rst['data'] = $this->PackingModel->in_filter_by_line();

  echo json_encode($rst);
 }

 public function outFilterByLine()
 {
  $rst['data'] = $this->PackingModel->out_filter_by_line();
  echo json_encode($rst);
 }


 // ==================================================================================================


 // ============================================Packing Member========================================

 public function packing_member()
 {

  $data['title'] = 'Packing Member | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/master_packing/packingMember');
  $this->load->view('footer');
 }

 public function ajax_get_packing_members_all()
 {
  $rst['data'] = $this->PackingModel->get_all_member();

  echo json_encode($rst);
 }

 public function insert_packing_member()
 {
  $rst = $this->PackingModel->save_member();

  echo json_encode($rst);
 }
 public function edit_packing_member()
 {
  $rst = $this->PackingModel->update_member();

  echo json_encode($rst);
 }
 public function delete_packing_member($id)
 {
  $row_affected = $this->PackingModel->delete_member($id);

  echo json_encode($row_affected);
 }

 public function print_selected_packing_member_barcode($dataId)
 {

  $dataArray = explode("-", $dataId);
  $packingMembers = array();
  for ($x = 0; $x <= count($dataArray) - 1; $x++) {
   $rst = $this->PackingModel->get_by_id($dataArray[$x]);

   array_push($packingMembers, $rst);
  }
  $data['packingMembers'] = $packingMembers;
  $this->load->view('packing/master_packing/print_packing_member_view', $data);
 }

 public function print_all_packing_member_barcode()
 {

  $data['packingMembers'] = $this->PackingModel->get_all();

  $this->load->view('packing/master_packing/print_packing_member_view', $data);
 }
 // ==================================================================================================


 // ====================================SOLID PACKING BOX==============================================

 public function capacity_box()
 {

  $data['title'] = 'Solid Packing Box Capacity | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/master_packing/box_capacity');
  $this->load->view('footer');
 }


 public function ajax_add_capacity_box()
 {

  $data['title'] = 'Add Solid Packing Box Capacity | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/master_packing/add_box_capacity');
  $this->load->view('footer');
 }




 public function ajax_get_kapasitas_karton_by_style_distinct()
 {
  $rst['data'] = $this->PackingModel->get_kapasitas_karton_by_style_distinct();
  echo json_encode($rst);
 }

 function get_detail_capacity()
 {
  $data['data'] = $this->PackingModel->get_detail_capacity();
  $datas = json_encode($data);
  echo $datas;
 }

 public function ajax_get_by_style()
 {
  $styleVal = $this->input->post('styleVal');
  $r['data'] = $this->PackingModel->get_by_style($styleVal);

  echo json_encode($r);
 }

 public function edit_kapasitas_karton($style = '')
 {
  $data['title'] = 'Edit Solid Packing Box Capacity | GI-Production';

  $styles = str_replace('%20', ' ', $style);
  $data['style'] = $styles;

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/master_packing/edit_kapasitas_karton');
  $this->load->view('footer');
 }

 public function ajax_update_kapasitas_karton()
 {
  $affectedRow = $this->PackingModel->update_kapasitas_karton();

  echo json_encode($affectedRow);
 }

 public function ajax_get_styles()
 {
  $rst = $this->PackingModel->get_style();

  echo json_encode($rst);
 }

 public function ajax_save_kapasitas_karton()
 {
  $affRow = $this->PackingModel->save_kapasitas_karton();

  echo json_encode($affRow);
 }

 public function deleteKapasitasKarton()
 {
  $id_packing_karton = $this->input->post('id_packing_karton');

  $data = $this->PackingModel->deleteDataKapasitasKarton($id_packing_karton);
  echo json_encode($data);
 }
 // ==================================================================================================


 // Master Order Packing
 // ==================================================================================================
 public function master_order_packing()
 {
  $data['title'] = 'Master Order Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
//   $this->load->view('packing/master_order_packing/masterOrderPackingView');
  $this->load->view('packing/master_order_packing/masterOrderPackingView2');
  $this->load->view('footer');
 }

 public function getSize()
 {
  $result = $this->PackingModel->getDataSize();
  echo json_encode($result);
 }

 public function getMasterOrderPacking()
 {
  $result["data"] = $this->PackingModel->getDataMasterOrderPacking();
  echo json_encode($result);
 }

 public function getMasterOrderPackingDetails()
 {
  $id = $this->input->get('id');

  $result["data"] = $this->PackingModel->getDataMasterOrderPackingDetails($id);
  echo json_encode($result);
 }

 public function ajax_getMasterOrderPackingDetailById($id){
  $rst['data'] = $this->PackingModel->getMasterOrderPackingDetailById($id);
  echo json_encode($rst);
 }

 public function postMasterOrderPacking()
 {
  date_default_timezone_set("Asia/Jakarta");

  $orc = $this->input->post('orc');
  $style = $this->input->post('style');
  $color = $this->input->post('color');
  $buyer = $this->input->post('buyer');
  $no_po = $this->input->post('no_po');
  $qty_order = $this->input->post('qty_order');

  $id_size = $this->input->post('id_size');
  $qty_size = $this->input->post('qty_size');


  $data_main = array(
   'created_date' => date("Y-m-d H:i:s"),
   'orc' => ($orc != '') ? $orc : null,
   'style' => ($style != '') ? $style : null,
   'color' => ($color != '') ? $style : null,
   'buyer' => ($buyer != '') ? $style : null,
   'no_po' => ($no_po != '') ? $style : null,
   'qty_order' => ($qty_order != '') ? $qty_order : null,
   'id_factory' => $this->session->userdata('id_factory'),
  );

  $id_master_order_packing_main = $this->PackingModel->postDataMasterOrderPackingMain($data_main);


  $data_details = [];
  foreach ($id_size as $key => $row) {

   $data_details[] = [
    'id_master_order_packing_main' => $id_master_order_packing_main,
    'id_master_size' => $id_size[$key],
    'qty' => $qty_size[$key]
   ];
  }

  $this->PackingModel->postDataMasterOrderPackingDetails($data_details);
  echo json_encode($data_details);
 }

 public function ajax_PostMasterOrderPacking()
 {
  date_default_timezone_set("Asia/Jakarta");
  $dtMain = $this->input->post('dataMain');
  $dtDetail = $this->input->post('dataDetail');

  $data_main = array(
    'id_master_order_icon_main' => $dtMain['id_master_order_icon_main'],
    'wo' => $dtMain['wo'],
    'created_date' => date("Y-m-d H:i:s"),
    'orc' => $dtMain['orc'],
    'style' => $dtMain['style'],
    'color' => $dtMain['color'],
    'buyer' => $dtMain['buyer'],
    'no_po' => $dtMain['no_po'],
    'qty_order' => $dtMain['qty_order'],
    'id_factory' => $this->session->userdata('id_factory'),
  );
  $id = $this->PackingModel->postDataMasterOrderPackingMain($data_main);

  $data_details = [];
  foreach ($dtDetail as $d) {
    $detail= [
      'id_master_order_packing_main' => $id,
      'size' => $d['size'],
      'carton_capacity' => $d['carton_capacity'],
      'qty' => $d['qty']
    ];
    array_push($data_details, $detail);
  }

  $this->PackingModel->postDataMasterOrderPackingDetails($data_details);
  echo json_encode($data_details);
 }

 public function ajax_getMasterOrderPackingdetails(){
  $result['data'] = $this->PackingModel->getMasterOrderPackingdetails();
  echo json_encode($result); 
 }

 // ==================================================================================================


 // ======================================SOLID PACKING==============================================
 public function packing_solid()
 {

  $data['title'] = 'Solid Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/entry_packing/solid_packing_view');
  $this->load->view('footer');
 }

 public function packing_solid_new()
 {

  $data['title'] = 'Solid Packing New | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/entry_packing/solid_packing_new');
  $this->load->view('footer');
 }



 public function add_packing_solid_new()
 {

  $data['title'] = 'Add Solid Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/entry_packing/add_solid_packing_new');
  $this->load->view('footer');
 }

 public function ajax_get_master_order_packing($orc)
 {

  $rst = $this->PackingModel->get_by_orc_master_order_packing($orc);

  echo json_encode($rst);
 }

 public function add_packing_solid()
 {

  $data['title'] = 'Add Solid Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/entry_packing/add_solid_packing');
  $this->load->view('footer');
 }

 public function ajax_get_solid_packing()
 {
  $rst = $this->PackingModel->get_solid_packing();
  echo json_encode($rst);
 }

 public function ajax_get_solid_packing_detail()
 {
  $style = $this->input->post('style');
  // $orc = $this->input->post('orc');
  $wo = $this->input->post('wo');
  // $rst['data'] = $this->PackingModel->get_solid_packing_detail($style, $orc);
  $rst['data'] = $this->PackingModel->get_solid_packing_detail($style, $wo);
  echo json_encode($rst);
 }

//  public function ajax_barcode_print_preview($orc)
//  {

//   $result = $this->PackingModel->get_by_orc($orc);

//   $this->_print_barcode_packing2($orc, $result);
//  }

 public function ajax_barcode_print_preview($wo)
 {

  $result = $this->PackingModel->get_by_wo($wo);

  $this->_print_barcode_packing_wo($wo, $result);
 }

 private function _print_barcode_packing_wo($orc, $rst)
 {
  $this->load->library('Pdf');

  $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  // $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, array('156','205'), true, 'UTF-8', false);

  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);

  $pdf->SetMargins(3, 20, 2);
  $width = 216;
  $height = 330;

  $pageRes = array($width, $height);

  $pdf->AddPage('P', $pageRes);
  $barcodeStyle = array(
   'position' => '',
   'align' => 'C',
   'stretch' => true,
   'fitwidth' => false,
   'cellfitalign' => '',
   'border' => false,
   'hpadding' => 'auto',
   'vpadding' => 'auto',
   'fgcolor' => array(0, 0, 0),
   'bgcolor' => false,
   'text' => false,
   'font' => 'helvetica',
   'fontsize' => 6,
   'stretchtext' => ''
  );

  $counterCols = 1;
  $counterRows = 1;

  $labelCols = 3;
  $labelRows = 10;
  $labelWidth = 70;
  $labelWidthBaseMargin = 1;
  // $labelHeight = 15;
  $labelHeight = 12;
  $labelHeightBaseMargin = 20;
  $labelHeightMargin = $labelHeight - 7.5;

  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $totBox = 0;

  for ($i = 0; $i <= count($rst) - 1; $i++) {
   if ($y >= 300) {
    $pdf->AddPage('P', $pageRes);
    $y = $pdf->GetY();
   }

   $styleArr = explode(" ", $rst[$i]->style);

   if (count($styleArr) > 1) {
    $style = $styleArr[0] . " " . $styleArr[1] . "...";
    $pdf->SetFont('Helvetica', 'B', 10);
   } else {
    $style = $rst[$i]->style;
    $pdf->SetFont('Helvetica', 'B', 12);
   }

   $colorArr = explode(" ", $rst[$i]->color);
   if (count($colorArr) > 1) {
    $color = $colorArr[0] . " " . $colorArr[1] . '...';
    $pdf->SetFont('Helvetica', 'B', 10);
   } else {
    $color = $rst[$i]->color;
    $pdf->SetFont('Helvetica', 'B', 12);
   }

   //barcode
   $pdf->SetFont('Helvetica', 'B', 11);
   $pdf->write1DBarcode($rst[$i]->barcode, 'C128', $x, $y - 3, $labelWidth, $labelHeight, 0.4, $barcodeStyle, 'L');

   //style, color
   $pdf->SetXY($x + 1, $y + $labelHeight - 3);
   $pdf->Cell(
    $labelWidth,
    5,
    $style . "  " . $color,
    0,
    0,
    'L',
    FALSE,
    '',
    0,
    FALSE,
    'C',
    'B'
   );

   //orc, size, qty, box capacity
   $pdf->SetXY($x + 1, $y + $labelHeight);
   $pdf->SetFont('Helvetica', 'B', 11);
   $pdf->Cell($labelWidth, 7, $orc . "  " . $rst[$i]->size . " " . $rst[$i]->qty . " " . $rst[$i]->pcs . " ", 0, 0, 'L', FALSE, '', 0, FALSE, 'C', 'B');

   //nmr box
   $pdf->SetXY($x, $y + $labelHeight);

   $pdf->SetFont('Helvetica', 'B', 11);
   $pdf->Cell($labelWidth, 7, str_repeat("0", 4 - (strlen(strval($rst[$i]->no_box)))) . strval($rst[$i]->no_box), 0, 0, 'R', FALSE, '', 0, FALSE, 'C', 'B');

   $x = $x + $labelWidth + $labelWidthBaseMargin;
   if ($counterCols == $labelCols) {
    $pdf->ln($labelHeight);
    $counterCols = 1;
    $x = $pdf->GetX();
    $y = $y + $labelHeightMargin + $labelHeightBaseMargin;
   } else {
    $counterCols++;
   }
  }

  ob_end_clean();
  $pdf->Output('packingBarcodes.pdf', 'I');
 }

 private function _print_barcode_packing2($orc, $rst)
 {
  $this->load->library('Pdf');

  $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  // $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, array('156','205'), true, 'UTF-8', false);

  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);

  $pdf->SetMargins(3, 20, 2);
  $width = 216;
  $height = 330;

  $pageRes = array($width, $height);

  $pdf->AddPage('P', $pageRes);
  $barcodeStyle = array(
   'position' => '',
   'align' => 'C',
   'stretch' => true,
   'fitwidth' => false,
   'cellfitalign' => '',
   'border' => false,
   'hpadding' => 'auto',
   'vpadding' => 'auto',
   'fgcolor' => array(0, 0, 0),
   'bgcolor' => false,
   'text' => false,
   'font' => 'helvetica',
   'fontsize' => 6,
   'stretchtext' => ''
  );

  $counterCols = 1;
  $counterRows = 1;

  $labelCols = 3;
  $labelRows = 10;
  $labelWidth = 70;
  $labelWidthBaseMargin = 1;
  // $labelHeight = 15;
  $labelHeight = 12;
  $labelHeightBaseMargin = 20;
  $labelHeightMargin = $labelHeight - 7.5;

  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $totBox = 0;

  for ($i = 0; $i <= count($rst) - 1; $i++) {
   if ($y >= 300) {
    $pdf->AddPage('P', $pageRes);
    $y = $pdf->GetY();
   }

   $styleArr = explode(" ", $rst[$i]->style);

   if (count($styleArr) > 1) {
    $style = $styleArr[0] . " " . $styleArr[1] . "...";
    $pdf->SetFont('Helvetica', 'B', 10);
   } else {
    $style = $rst[$i]->style;
    $pdf->SetFont('Helvetica', 'B', 12);
   }

   $colorArr = explode(" ", $rst[$i]->color);
   if (count($colorArr) > 1) {
    $color = $colorArr[0] . " " . $colorArr[1] . '...';
    $pdf->SetFont('Helvetica', 'B', 10);
   } else {
    $color = $rst[$i]->color;
    $pdf->SetFont('Helvetica', 'B', 12);
   }

   //barcode
   $pdf->SetFont('Helvetica', 'B', 11);
   $pdf->write1DBarcode($rst[$i]->barcode, 'C128', $x, $y - 3, $labelWidth, $labelHeight, 0.4, $barcodeStyle, 'L');

   //style, color
   $pdf->SetXY($x + 1, $y + $labelHeight - 3);
   $pdf->Cell(
    $labelWidth,
    5,
    $style . "  " . $color,
    0,
    0,
    'L',
    FALSE,
    '',
    0,
    FALSE,
    'C',
    'B'
   );

   //orc, size, qty, box capacity
   $pdf->SetXY($x + 1, $y + $labelHeight);
   $pdf->SetFont('Helvetica', 'B', 11);
   $pdf->Cell($labelWidth, 7, $orc . "  " . $rst[$i]->size . " " . $rst[$i]->qty . " " . $rst[$i]->pcs . " ", 0, 0, 'L', FALSE, '', 0, FALSE, 'C', 'B');

   //nmr box
   $pdf->SetXY($x, $y + $labelHeight);

   $pdf->SetFont('Helvetica', 'B', 11);
   $pdf->Cell($labelWidth, 7, str_repeat("0", 4 - (strlen(strval($rst[$i]->no_box)))) . strval($rst[$i]->no_box), 0, 0, 'R', FALSE, '', 0, FALSE, 'C', 'B');

   $x = $x + $labelWidth + $labelWidthBaseMargin;
   if ($counterCols == $labelCols) {
    $pdf->ln($labelHeight);
    $counterCols = 1;
    $x = $pdf->GetX();
    $y = $y + $labelHeightMargin + $labelHeightBaseMargin;
   } else {
    $counterCols++;
   }
  }

  ob_end_clean();
  $pdf->Output('packingBarcodes.pdf', 'I');
 }

//  public function ajax_packing_list_print_preview($orc)
//  {
//   $data['packingList'] = $this->PackingModel->get_by_orc_list($orc);;

//   $this->load->view('packing/entry_packing/print_packing_list_view', $data);
//  }

 public function ajax_packing_list_print_preview($wo)
 {
  // $data['packingList'] = $this->PackingModel->get_by_orc_list($orc);;
  $data['packingList'] = $this->PackingModel->get_by_wo_list($wo);

  $this->load->view('packing/entry_packing/print_packing_list_view', $data);
 }

 public function deletePackingList()
 {
  $orc = $this->input->post('orc');

  $data['data'] = $this->PackingModel->deleteDataPackingList($orc);
  echo json_encode($data);
 }

 public function ajax_delete_packing_list($orc)
 {
  $rst = $this->PackingModel->get_by_orc_list($orc);
  $ids = [];
  if ($rst != null) {
   foreach ($rst as $r) {
    array_push($ids, $r['id_packing_list']);
   }
   $this->load->model('PackingModel');
   $delete = $this->PackingModel->delete($ids);
   if ($delete) {
    $del = $this->PackingModel->delete_by_orc($orc);

    echo json_encode($del);
   }
  }
 }

 public function ajax_delete_packing_list_by_wo($wo)
 {
  $rst = $this->PackingModel->get_by_wo_list($wo);
  $ids = [];
  if ($rst != null) {
   foreach ($rst as $r) {
    array_push($ids, $r['id_packing_list']);
   }
   $this->load->model('PackingModel');
   $delete = $this->PackingModel->delete($ids);
   if ($delete) {
    $del = $this->PackingModel->delete_by_wo($wo);

    echo json_encode($del);
   }
  }
 }

 public function ajax_check_solid_packing_list_by_orc($orc)
 {

  $rst = $this->PackingModel->check_solid_packing_list_by_orc($orc);

  echo json_encode($rst);
 }

 public function ajax_get_cutting_orc($orc)
 {
  // $this->load->model('PackingModel');

  $rst = $this->PackingModel->get_by_orc_solid_packing($orc);

  echo json_encode($rst);
 }
 public function ajax_get_kapasitas_karton_by_style()
 {

  $rst = $this->PackingModel->get_kapasitas_karton_by_style();

  echo json_encode($rst);
 }
 public function ajax_update_batch_solid_packing_list()
 {
  $rst = $this->PackingModel->update_batch_solid_packing_list();

  echo json_encode($rst);
 }

 public function ajax_get_packing_orc($orc)
 {

  $rst = $this->PackingModel->get_by_orc_packing_solid($orc);

  echo json_encode($rst);
 }

 public function ajax_get_packing_wo($wo)
 {

  $rst = $this->PackingModel->get_by_wo_packing_solid($wo);

  echo json_encode($rst);
 }

 public function ajax_insert_solid_packing_barcode_batch()
 {

  $rst = $this->PackingModel->insert_solid_packing_barcode_batch();

  echo json_encode($rst);
 }
 // =================================================================================================


 // =========================================MIXED PACKING===========================================
 public function packing_mixed()
 {

  $data['title'] = 'Mixed Size Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/entry_packing/mixed_packing_view');
  $this->load->view('footer');
 }

 public function ajax_get_mixed_packing()
 {
  $rst['data'] = $this->PackingModel->get_mixed_packing();
  echo json_encode($rst);
 }

 public function getMixedSizePackingListDetails()
 {
  $id_order = $this->input->get('id_order');

  $result['data'] = $this->PackingModel->getMixedSizePackingListDetails($id_order);
  echo json_encode($result);
 }

 // ================================== Print Barcode ========================================
 public function ajax_barcode_mixed_print_preview($po)
 {

  $result = $this->PackingModel->get_by_po($po);
  $this->_print_barcode_packing_mixed($result);
 }

 private function _print_barcode_packing_mixed($rst)
 {
  $this->load->library('Pdf');

  $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  // $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, array('156','205'), true, 'UTF-8', false);

  $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  $pdf->setPrintHeader(false);
  $pdf->setPrintFooter(false);

  $pdf->SetMargins(3, 7, 2);
  $width = 216;
  $height = 330;

  $pageRes = array($width, $height);

  $pdf->AddPage('P', $pageRes);
  $barcodeStyle = array(
   'position' => '',
   'align' => 'C',
   'stretch' => true,
   'fitwidth' => false,
   'cellfitalign' => '',
   'border' => false,
   'hpadding' => 'auto',
   'vpadding' => 'auto',
   'fgcolor' => array(0, 0, 0),
   'bgcolor' => false,
   'text' => false,
   'font' => 'helvetica',
   'fontsize' => 6,
   'stretchtext' => ''
  );

  $counterCols = 1;
  $counterRows = 1;

  $labelCols = 3;
  $labelRows = 10;
  $labelWidth = 70;
  $labelWidthBaseMargin = 0;
  // $labelHeight = 15;
  $labelHeight = 15;
  $labelHeightBaseMargin = 15;
  $labelHeightMargin = $labelHeight - 3.5;

  $x = $pdf->GetX();
  $y = $pdf->GetY();
  $totBox = 0;

  for ($i = 0; $i <= count($rst) - 1; $i++) {
   if ($y >= 300) {
    $pdf->AddPage('P', $pageRes);
    $y = $pdf->GetY();
   }

   $styleArr = explode(" ", $rst[$i]->style);

   if (count($styleArr) > 1) {
    $style = $styleArr[0] . " " . $styleArr[1] . "...";
    $pdf->SetFont('Helvetica', 'B', 10);
   } else {
    $style = $rst[$i]->style;
    $pdf->SetFont('Helvetica', 'B', 10);
   }

   $colorArr = explode(" ", $rst[$i]->color);
   if (count($colorArr) > 1) {
    $color = $colorArr[0] . " " . $colorArr[1] . '...';
    $pdf->SetFont('Helvetica', 'B', 10);
   } else {
    $color = $rst[$i]->color;
    $pdf->SetFont('Helvetica', 'B', 10);
   }

   //barcode
   $pdf->SetFont('Helvetica', 'B', 10);
   $pdf->write1DBarcode($rst[$i]->barcode, 'C128', $x, $y - 2, $labelWidth, $labelHeight, 0.4, $barcodeStyle, 'L');

   //style, color
   $pdf->SetXY($x + 1, $y + $labelHeight - 3);
   $pdf->Cell(
    $labelWidth,
    5,
    $rst[$i]->barcode,
    0,
    0,
    'C',
    FALSE,
    '',
    0,
    FALSE,
    'C',
    'B'
   );

   //style, color
   $pdf->SetXY($x + 1, $y + $labelHeight + 1);
   $pdf->Cell(
    $labelWidth,
    5,
    $style . "  " . $color,
    0,
    0,
    'C',
    FALSE,
    '',
    0,
    FALSE,
    'C',
    'B'
   );

   //po, qty, box capacity
   $pdf->SetXY($x + 3, $y + $labelHeight + 4);
   $pdf->SetFont('Helvetica', 'B', 10);
   $pdf->Cell($labelWidth, 7,  " " . $rst[$i]->orc . "        " . $rst[$i]->pcs_box . " pcs", 0, 0, 'L', FALSE, '', 0, FALSE, 'C', 'B');

   //nmr box
   $pdf->SetXY($x - 3, $y + $labelHeight + 4);

   $pdf->SetFont('Helvetica', 'B', 10);
   $pdf->Cell($labelWidth, 7, str_repeat("0", 4 - (strlen(strval($rst[$i]->box_number)))) . strval($rst[$i]->box_number), 0, 0, 'R', FALSE, '', 0, FALSE, 'C', 'B');

   $x = $x + $labelWidth + $labelWidthBaseMargin;
   if ($counterCols == $labelCols) {
    $pdf->ln($labelHeight);
    $counterCols = 1;
    $x = $pdf->GetX();
    $y = $y + $labelHeightMargin + $labelHeightBaseMargin;
   } else {
    $counterCols++;
   }
  }

  ob_end_clean();
  $pdf->Output($rst[0]->orc . '.pdf', 'I');
 }
 // ==================================== End Print Barcode ========================================

 public function deleteMixedPackingList()
 {
  $id_order = $this->input->post('id_order');

  $data['data'] = $this->PackingModel->deleteDataMixedPackingList($id_order);
  echo json_encode($data);
 }

 // ==================================================================================================


 // =======================================OUTPUT PACKING===============================================
 public function output_packing()
 {

  $data['title'] = 'Output Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/packing_process/outputPackingView');
  $this->load->view('footer');
 }

 public function getOutputPacking()
 {
  $rst['data'] = $this->PackingModel->getDataOutputPacking();

  echo json_encode($rst);
 }

 public function ajax_list()
 {
  $rst['data'] = $this->PackingModel->get_all_distinct();

  echo json_encode($rst);
 }

 public function ajax_check_input_packing($barcode)
 {
  $r = $this->PackingModel->check_input_packing($barcode);

  echo json_encode($r);
 }

 public function ajax_check_output_sewing_detail($barcode)
 {
  $r = $this->PackingModel->check_output_sewing_detail($barcode);

  echo json_encode($r);
 }
 public function ajax_get_cutting_detail($barcode)
 {
  $r = $this->PackingModel->get_cutting_detail($barcode);

  echo json_encode($r);
 }

 public function ajax_save()
 {
  $rst = $this->PackingModel->save();

  echo json_encode($rst);
 }
 public function ajax_get_by_orc1_packing()
 {
  $orc = $this->input->get('orc');

  $rst['data'] = $this->PackingModel->get_by_orc1_packing($orc);
  echo json_encode($rst);
 }

 // ==================================================================================================


 // =======================================ADD MIX PACKING=========================================
 public function add_mixed_packing()
 {

  $data['title'] = 'Add Mixed Size Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/entry_packing/add_mixed_packing');
  $this->load->view('footer');
 }

 public function ajax_get_po1()
 {
  $result = $this->PackingModel->get_po1();
  echo json_encode($result);
 }

 public function getOrcStyle()
 {
  $po_no = $this->input->get('poVal');

  $result = $this->PackingModel->getDataOrcStyle($po_no);
  echo json_encode($result);
 }

 public function ajax_check_mixed_packing_list_by_po()
 {
  $id_order = $this->input->get('id_order');
  $po = $this->input->get('poVal');

  $rst = $this->PackingModel->check_mixed_packing_list_by_po($id_order, $po);

  echo json_encode($rst);
 }

 public function ajax_get_cutting_by_po2($po)
 {
  $this->load->model('PackingModel');

  $rst = $this->PackingModel->get_cutting_by_po2($po);

  echo json_encode($rst);
 }
 public function ajax_get_color($po)
 {
  $rst = $this->PackingModel->get_color($po);
  echo json_encode($rst);
 }

 public function ajax_insert_mixed_packing_list()
 {
  $rst = $this->PackingModel->insert_mixed_packing_list();

  echo json_encode($rst);
 }

 public function ajax_insert_mixed_packing_list_barcode()
 {
  $rst = $this->PackingModel->insert_mixed_packing_list_barcode();

  echo json_encode($rst);
 }

 public function ajax_insert_mixed_size_list()
 {
  $rst = $this->PackingModel->insert_mixed_size_list();

  echo json_encode($rst);
 }

 public function ajax_update_mixed_packing_list_barcode()
 {
  $rst = $this->PackingModel->update_mixed_packing_list_barcode();

  echo json_encode($rst);
 }
 // ==================================================================================================


 // =======================================OUTPUT MIX PACKING=========================================

 public function output_packing_mixed()
 {

  $data['title'] = 'Output Mixed Size | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/packing_process/output_packing_mixed');
  $this->load->view('footer');
 }
 public function getOutputMixedSizePackingTable()
 {
  $result['data'] = $this->PackingModel->getDataOutputMixedSizePackingTable();
  echo json_encode($result);
 }

 public function getMixedPackingCheckingBarcodeRegistered($barcode)
 {
  $result = $this->PackingModel->getDataMixedPackingCheckingBarcodeRegistered($barcode);
  echo json_encode($result);
 }

 public function getMixedPackingCheckingBarcode($barcode)
 {
  $result = $this->PackingModel->getDataMixedPackingCheckingBarcode($barcode);
  echo json_encode($result);
 }

 public function getMixedBarcodeDetails($barcode)
 {
  $result = $this->PackingModel->getDataMixedBarcodeDetails($barcode);
  echo json_encode($result);
 }

 public function postOutputMixedSizePacking()
 {
  date_default_timezone_set("Asia/Jakarta");

  $data = array(
   'barcode' => $this->input->post('barcode'),
   'orc' => $this->input->post('orc'),
   'box_number' => $this->input->post('box_number'),
   'id_mixed' => $this->input->post('id_mixed'),
   'id_order' => $this->input->post('id_order'),
   'created_date' => date("Y-m-d H:i:s")
  );

  $this->PackingModel->postOutputMixedSizePacking($data);
  echo json_encode($data);
 }

 public function getOutputMixedSizePackingListDetails()
 {
  $id_order = $this->input->get('id_order');

  $result['data'] = $this->PackingModel->getDataOutputMixedSizePackingListDetails($id_order);
  echo json_encode($result);
 }

 // ==================================================================================================


 // ===========================================PRE SHIPMENT==========================================
 public function cekPosisiORC()
 {
  // $rst['data'] = $this->TransferAreaModel->get_all_posisi_orc();
  $data['title'] = 'Dashboard Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/pre_shipment/cek_position_orc');
  $this->load->view('footer');
 }
 public function get_cek_orc()
 {

  $rst['data'] = $this->PackingModel->get_all_posisi_orc();
  echo json_encode($rst);
 }

 public function transferAreaInput()
 {

  $data['title'] = 'Finish Good (In) | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/pre_shipment/transfer_area_input_view');
  $this->load->view('footer');
 }

 public function ajax_get_all_in()
 {
  $rst['data'] = $this->PackingModel->get_all_in_new();

  echo json_encode($rst);
 }
 public function ajax_get_all_in_reset()
 {
  $rst['data'] = $this->PackingModel->get_all_in();

  echo json_encode($rst);
 }

 public function ajax_get_by_barcode($barcode)
 {
  $row = $this->PackingModel->get_by_barcode($barcode);

  echo json_encode($row);
 }

 public function ajax_join_get_by_barcode($barcode)
 {
  // $row = $this->OutputPackingDetailModel->join_get_by_barcode($barcode);
  $row = $this->PackingModel->join_get_by_barcode($barcode);

  echo json_encode($row);
 }

 public function ajax_check_by_barcode($barcode)
 {
  $numRows = $this->PackingModel->check_by_barcode($barcode);

  echo json_encode($numRows);
 }
 public function ajax_get_all_lokasi_packing()
 {
  $rst = $this->PackingModel->get_all_line();

  echo json_encode($rst);
 }

 public function ajax_save_transfer_area_pcs()
 {
  if (isset($_POST['dataForTransferAreaPcs'])) {
   $dataForTransferAreaPcs = $_POST['dataForTransferAreaPcs'];
   $id = $this->PackingModel->save_transfer_area_pcs($dataForTransferAreaPcs);

   echo json_encode($id);
  }
 }

 public function ajax_save_transfer_area()
 {
  if (isset($_POST['dataForTransferArea'])) {
   $dataForTransferArea = $_POST['dataForTransferArea'];
   $id = $this->PackingModel->save_transfer_area($dataForTransferArea);

   echo json_encode($id);
  }
 }

 public function ajax_get_by_orc($orc)
 {
  $rst['data'] = $this->PackingModel->get_by_orc_t($orc);

  echo json_encode($rst);
 }

 public function summary_in_by_orc($orc, $datefrom, $dateto)
 {
  $data['orc'] = $orc;
  $data['datefrom'] = $datefrom;
  $data['dateto'] = $dateto;

  $data['title'] = 'Summary Transfer Area (In) | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/pre_shipment/transfer_area_summary_in', $data);
  $this->load->view('footer');
 }
 public function summary_in_by_orc_reset($orc)
 {
  $data['orc'] = $orc;

  $data['title'] = 'Summary Transfer Area (In) | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/pre_shipment/transfer_area_in_reset', $data);
  $this->load->view('footer');
 }


 public function getSummaryByOrc()
 {
  $orc = $this->input->get('orc');
  $datefrom = $this->input->get('datefrom');
  $dateto = $this->input->get('dateto');

  $rst['data'] = $this->PackingModel->summary_by_orc_new($orc, $datefrom, $dateto);
  echo json_encode($rst);
 }

 public function getSummaryByOrcReset()
 {
  $orc = $this->input->get('orc');

  $rst['data'] = $this->PackingModel->summary_by_orc($orc);
  echo json_encode($rst);
 }

 public function detail_in_by_orc($orc)
 {
  $data['orc'] = $orc;

  $data['title'] = 'Detail Transfer Area (In) | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/pre_shipment/transfer_area_detail_in', $data);
  $this->load->view('footer');
 }

 public function get_ajax_in_by_orc()
 {
  $orc = $this->input->get('orc');

  $rst['data'] = $this->PackingModel->get_in_by_orc($orc);
  echo json_encode($rst);
 }

 public function ajax_update_batch_lokasi()
 {
  if (isset($_POST['dataForUbahLinePacking'])) {
   $dataForUbahLinePacking = $_POST['dataForUbahLinePacking'];
   $affRows = $this->PackingModel->update_batch_lokasi($dataForUbahLinePacking);

   echo json_encode($affRows);
  }
 }

 public function transferAreaOutput()
 {
  $data['title'] = 'Finish Good (Out) | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header_datatable_select', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/pre_shipment/transfer_area_output_view');
  $this->load->view('footer');
 }


 public function ajax_show_detail_out_by_orc()
 {
  $orc = $this->input->get('orc');

  $rst['data'] = $this->PackingModel->get_out_by_orc($orc);
  echo json_encode($rst);
 }

 public function ajax_get_distinct_orc_packing()
 {
  $rst = $this->PackingModel->get_distinct_orc_packing();

  echo json_encode($rst);
 }

 public function ajax_update_batch_transfer_area()
 {
  if (isset($_POST['dataForTransferAreaOut'])) {
   $dataForTransferAreaOut = $_POST['dataForTransferAreaOut'];

   $rowAff = $this->PackingModel->update_batch_transfer_area($dataForTransferAreaOut);

   echo json_encode($rowAff);
  }
 }

 public function ajax_get_by_orc_in($orc)
 {
  $rst['data'] = $this->PackingModel->get_by_orc_in($orc);

  echo json_encode($rst);
 }
 public function ajax_get_all_out()
 {
  $rst['data'] = $this->PackingModel->get_all_out();

  echo json_encode($rst);
 }

 public function report_daily_packing()
 {

  $data['title'] = 'Daily Packing Line Report | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/report/daily_packing');
  $this->load->view('footer');
 }

 public function report_orc_packing()
 {

  $data['title'] = 'Packing ORC Eeport | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/report/report_packing_orc');
  $this->load->view('footer');
 }

 public function get_daily_packing()
 {
  $rst['data'] = $this->PackingModel->get_daily_packing();

  echo json_encode($rst);
 }

 public function get_orc_report()
 {
  $result = $this->PackingModel->get_orc_packing();

  echo json_encode($result);
 }
 public function get_daily_packing_orc()
 {
  $rst['data'] = $this->PackingModel->get_daily_packing_orc();

  echo json_encode($rst);
 }

 public function report_daily_summary()
 {

  $data['title'] = 'Daily Summary Packing | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/report/daily_summary_packing');
  $this->load->view('footer');
 }
 public function summary_daily_packing()
 {
  $rst['data'] = $this->PackingModel->summary_daily_packing();

  echo json_encode($rst);
 }

 public function report_wip()
 {

  $data['title'] = 'WIP Packing Report | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/report/wip_packing');
  $this->load->view('footer');
 }
 public function wip_packing()
 {
  $data['data'] = $this->PackingModel->get_wip();

  echo json_encode($data);
 }



 public function fg_out()
 {
  $rst['data'] = $this->PackingModel->get_out();

  echo json_encode($rst);
 }




 public function report_fg_out()
 {

  $data['title'] = 'Finish Good OUT | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/report/fg_out');
  $this->load->view('footer');
 }

 public function report_packing_hourly()
 {

  $data['title'] = 'Packing Hourly | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/report/hourly_packing');
  $this->load->view('footer');
 }
 public function filter_hours()
 {
  $rst['data'] = $this->PackingModel->daterange_packing();

  echo json_encode($rst);
 }


 public function detail_out()
 {

  $tgl = $_POST['tgl'];
  $orc      = $_POST['orc'];
  $rst['data'] = $this->PackingModel->detail_out($tgl, $orc);

  echo json_encode($rst);
 }

 public function get_all_orc()
 {
  $result = $this->PackingModel->get_all_orc();
  echo json_encode($result);
 }

 public function getByOrc($orc)
 {
  $result = $this->PackingModel->getByOrc($orc);

  echo json_encode($result);
 }
 public function get_datas_report()
 {
  // $result['data'] = $this->CuttingModel->get_datas_orcs();
  $result['data'] = $this->PackingModel->get_datas_orcs_v2();

  echo json_encode($result);
 }
 public function bundleRecord()
 {
  $data['title'] = 'Bundle Record | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/report/bundle_bundle');
  $this->load->view('footer');
 }





 // Report Finish Good (In)
 // ========================================================================
 public function report_fg_in()
 {
  $data['title'] = 'Finish Good IN | GI-Production';

  $role = $this->session->userdata('role_gi_production');

  $this->load->view('header', $data);
  if ($role == 1) {
   $this->load->view('admin/sidebarAdmin');
  } else {
   $this->load->view('packing/sidebarPacking');
  }
  $this->load->view('navbar');
  $this->load->view('packing/report/fg_in');
  $this->load->view('footer');
 }

 public function fg_in()
 {
  $rst['data'] = $this->PackingModel->get_in();
  echo json_encode($rst);
 }

 public function detail_in()
 {
  $tgl = $_POST['tgl'];
  $orc      = $_POST['orc'];
  $rst['data'] = $this->PackingModel->detail_in($tgl, $orc);

  echo json_encode($rst);
 }

 public function getOutputMixedSizeTableCurrentDate()
 {
  $rst['data'] = $this->PackingModel->getDataOutputMixedSizeTableCurrentDate();
  echo json_encode($rst);
 }

 public function getOutputMixedSizeTableSelectedDate()
 {
  $date_from = $this->input->get('datefrom');
  $date_to = $this->input->get('dateto');

  $rst['data'] = $this->PackingModel->getDataOutputMixedSizeTableSelectedDate($date_from, $date_to);
  echo json_encode($rst);
 }

 public function getOutputMixedSizeTableDetails()
 {
  $date = $this->input->get('date');
  $orc = $this->input->get('orc');

  $rst['data'] = $this->PackingModel->getDataOutputMixedSizeTableDetails($date, $orc);
  echo json_encode($rst);
 }



 // ============================================Packing Master Line========================================
 public function packing_master_line()
 {

  $data['title'] = 'Packing Master Line | GI-Production';

  $this->load->view('header', $data);
  $this->load->view('packing/sidebarPacking');
  $this->load->view('navbar');
  $this->load->view('packing/master_packing_line/masterPackingLineView');
  $this->load->view('footer');
 }
 public function ajax_get_master_line()
 {
  $rst['data'] = $this->PackingModel->get_all_master_line();

  echo json_encode($rst);
 }
 public function getMasterZone()
 {
  $rst = $this->PackingModel->getMasterZone();
  echo json_encode($rst);
 }
 public function getMasterFactory()
 {
  $rst = $this->PackingModel->getMasterFactory();
  echo json_encode($rst);
 }
 public function postPackingLine()
 {
  $data = array(
   'line' => $this->input->post('line'),
   'id_zone' => $this->input->post('zone'),
   'max_box_capacity' => $this->input->post('boxCapacity'),
   'id_factory' => $this->input->post('factory')
  );

  $this->PackingModel->postPackingLine($data);
  echo json_encode($data);
 }
 public function deletePackingLine()
 {
  $id_line = $this->input->post('id_line');

  $this->PackingModel->deletePackingLine($id_line);
  echo json_encode($id_line);
 }
 public function updatePackingLine()
 {
  $id_line = $this->input->post('id_line');

  $data = array(
   'line' => $this->input->post('lineModal'),
   'id_zone' => $this->input->post('zoneModal'),
   'max_box_capacity' => $this->input->post('boxCapacityModal'),
   'id_factory' => $this->input->post('factoryModal')
  );
  // var_dump($id_line);
  // var_dump($data);
  // die;
  $this->PackingModel->updatePackingLine($id_line, $data);
  echo json_encode($data);
 }

 public function get_orc_bundle_icon(){
  $result = $this->PackingModel->get_orc_bundle_icon();
  echo json_encode($result);   
 }

 public function getBundleByOrcIcon($orc)
 {
  $result['data1'] = $this->PackingModel->getBundleByOrcIcon($orc);
  echo json_encode($result);
 } 

  public function ajax_getWorkOrders(){
    $result['data'] = $this->PackingModel->getWorkOrders();
    echo json_encode($result);
  }

  public function ajax_getWODetailsByWO($wo){
    $rst['data'] = $this->PackingModel->getWODetailsByWO($wo);
    echo json_encode($rst);
  }

  // 
  public function ajax_getKapasitasKarton(){
    if(isset($_GET['style'])){
      $style = $_GET['style'];
    }
    if(isset($_GET['size'])){
      $size = $_GET['size'];
    }

    $rst['data'] = $this->PackingModel->getKapasitasKarton($style, $size);
    echo json_encode($rst);
  }
  
  public function ajax_getSizesOnWorkOrderDetails($id){
    $rst['data'] = $this->PackingModel->getSizesOnWorkOrderDetails($id);
    echo json_encode($rst);
  }

  public function ajax_getStyleOnMasterOrderIcon($id){
    $rst['data'] = $this->PackingModel->getStyleOnMasterOrderIcon($id);
    echo json_encode($rst);
  }

  public function ajax_getPackingOrders(){
    $rst['data'] = $this->PackingModel->getPackingOrders();
    echo json_encode($rst);
  }

  public function ajax_getPackingOrderDetail($id){
    $rst['data'] = $this->PackingModel->getPackingOrderDetail($id);
    echo json_encode($rst);
  }

}
