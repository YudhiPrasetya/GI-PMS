<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CuttingModel extends CI_Model
{
 var $table = 'input_cutting';
 protected $id_factory;

 // Dashboard
 // =========================================================================================

 public function __construct()
 {
  parent::__construct();
  $this->id_factory = $this->session->userdata('id_factory');
 }

 public function getDataTotalInputCutting()
 {

  $rst = "SELECT
                    IFNULL( SUM( input_cutting.qty_pcs ), 0 ) AS total_input_cutting
                FROM
                    input_cutting
                    JOIN `master_order_icon_main` ON input_cutting.orc = `master_order_icon_main`.orc
                WHERE
                    DATE( input_cutting.tgl ) = CURRENT_DATE ()
                    -- AND `master_order_icon_main`.id_factory = $this->id_factory
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getDataTotalOutputCutting()
 {

  $rst = "SELECT
                    IFNULL( SUM( input_sewing.qty_pcs ), 0 ) AS total_output_cutting
                FROM
                    input_sewing
                    JOIN `master_order_icon_main` ON input_sewing.orc = `master_order_icon_main`.orc
                WHERE
                    DATE( input_sewing.tgl ) = CURRENT_DATE () 
                    -- AND `master_order_icon_main`.id_factory = $this->id_factory
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getDataInputCuttingChart()
 {

  $rst = "WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                date_range.tgl,
                IFNULL( input_cutting_sub_query.qty_in, 0 ) AS qty_in_cutting
                FROM
                    date_range
                    LEFT JOIN (
                    SELECT
                        input_cutting.tgl,
                        SUM( input_cutting.qty_pcs ) AS qty_in 
                    FROM
                        input_cutting
                        JOIN `master_order_icon_main` ON input_cutting.orc = `master_order_icon_main`.orc
                    WHERE
                        DATE ( input_cutting.tgl ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                        AND CURRENT_DATE ()
                        -- AND `master_order_icon_main`.id_factory = $this->id_factory
                    GROUP BY
                        input_cutting.tgl 
                    ) AS input_cutting_sub_query ON input_cutting_sub_query.tgl = date_range.tgl 
                ORDER BY
                    date_range.tgl ASC
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getDataOutputCuttingChart()
 {

  $rst = "WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                date_range.tgl,
                IFNULL( input_sewing_sub_query.qty_out, 0 ) AS qty_out_cutting
                FROM
                    date_range
                    LEFT JOIN (
                    SELECT
                        input_sewing.tgl,
                        SUM( input_sewing.qty_pcs ) AS qty_out 
                    FROM
                        input_sewing
                        -- JOIN `master_order_icon_main` ON input_sewing.orc = `master_order_icon_main`.orc
                        JOIN `master_order_icon_main` ON input_sewing.id_order_icon_main = `master_order_icon_main`.id_master_order_icon_main
                    WHERE
                        DATE ( input_sewing.tgl ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                        AND CURRENT_DATE ()
                        -- AND `master_order_icon_main`.id_factory = $this->id_factory
                    GROUP BY
                        input_sewing.tgl 
                    ) AS input_sewing_sub_query ON input_sewing_sub_query.tgl = date_range.tgl 
                ORDER BY
                    date_range.tgl ASC
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }
 // =========================================================================================


 // Work Order
 // =========================================================================================
 public function getDataWorkOrderMain()
 {
  $query = "SELECT
             work_order.id,
             main.id_master_order_icon_main as id_order,
             work_order.created_at,
             main.customer_name,
             main.orc AS sales_order,
             work_order.work_order,
             work_order.qty_allocation,
             line.`name` AS allocation 
           FROM
             work_order
             INNER JOIN master_order_icon_main AS main ON work_order.id_master_order_icon_main = main.id_master_order_icon_main
             INNER JOIN line ON work_order.id_line = line.id_line 
           ORDER BY
             work_order.work_order ASC,
             work_order.id DESC
            ";

  $data = $this->db->query($query);
  return $data->result();
 }

 // =========================================================================================



 // Create Work Order
 // =========================================================================================
 public function getDataSalesOrder()
 {

  $query = "SELECT 
               id_master_order_icon_main as id_order,
               `orc`
             FROM
               `master_order_icon_main`
             ORDER BY
               id_master_order_icon_main DESC ";

  $data = $this->db->query($query);
  return $data->result();
 }

 public function getDataSalesOrderSize($id_order)
 {

  $query = "SELECT
              master_order_detail_icon.size,
              master_order_detail_icon.quantity,
              IFNULL(size_allocated.total_qty_size,0) AS qty_size_allocated,
              IFNULL(( master_order_detail_icon.quantity - IFNULL(size_allocated.total_qty_size,0) ),0) AS qty_size_stock 
            FROM
              master_order_detail_icon
              LEFT JOIN (
                SELECT
                  id_master_order_icon_main,
                  work_order_details.size,
                  IFNULL( SUM( work_order_details.qty_size ), 0 ) AS total_qty_size 
                FROM
                  work_order
                  LEFT JOIN work_order_details ON work_order.id = work_order_details.id_work_order 
                WHERE
                  work_order.id_master_order_icon_main = $id_order  
                GROUP BY
                  size 
              ) AS size_allocated ON master_order_detail_icon.id_master_order_icon_main = size_allocated.id_master_order_icon_main 
              AND master_order_detail_icon.size = size_allocated.size 
            WHERE
              master_order_detail_icon.id_master_order_icon_main = $id_order 
            ORDER BY
              master_order_detail_icon.size ASC";

  $data = $this->db->query($query);
  return $data->result();
 }

 public function getDataSalesOrderDetails($id_order)
 {

  $query = "SELECT
              master_order_icon_main.id_master_order_icon_main AS id_order,
              master_order_icon_main.`orc`,
              master_order_icon_main.customer_name AS buyer,
              master_order_icon_main.style_name AS style,
              master_order_icon_main.color,
              master_order_icon_main.quantity_ordered AS qty_order,
              IFNULL(work_order.incremented_work_order_code, 'A') as incremented_work_order_code
            FROM
              master_order_icon_main
              LEFT JOIN (
              SELECT
              id_master_order_icon_main,
              CHAR(ASCII(work_order_code) + 1) AS incremented_work_order_code
            FROM
              work_order) as work_order ON master_order_icon_main.id_master_order_icon_main = work_order.id_master_order_icon_main
            WHERE
              master_order_icon_main.id_master_order_icon_main = $id_order
             ORDER BY 
              work_order.incremented_work_order_code DESC
             ";

  $data = $this->db->query($query);
  return $data->result();
 }


 public function getDataAllocation()
 {

  $query = "SELECT
             id_line,
             `name`
           FROM
             `line`
           WHERE
             description IS NOT NULL
           ORDER BY 
             `name` ASC";

  $data = $this->db->query($query);
  return $data->result();
 }

 public function postDataWorkOrderMain($data_main)
 {
  $this->db->insert('work_order', $data_main);
  return $this->db->insert_id();
 }

 public function postDataWorkOrderDetails($data_details)
 {
  return $this->db->insert('work_order_details', $data_details);
 }

 public function getDataWorkOrder($idOrder)
 {
  $query = "SELECT
            work_order.id,
            work_order.id_master_order_icon_main as id_order,
            work_order.created_at,
            work_order.work_order,
            work_order.qty_allocation,
            line.`name` as allocation
          FROM
            work_order
            INNER JOIN line ON work_order.id_line = line.id_line
          WHERE
           id_master_order_icon_main = $idOrder
          ORDER BY
            work_order.id ASC
            ";

  $data = $this->db->query($query);
  return $data->result();
 }

 public function getDataSizeDetails($id_work_order)
 {
  $query = "SELECT
              `size`,
              qty_size 
            FROM
              work_order_details 
            WHERE
              id_work_order = $id_work_order
            ";

  $data = $this->db->query($query);
  return $data->result();
 }

 public function deleteDataWorkOrder($id_work_order)
 {
  $this->db->where('id', $id_work_order);
  $this->db->delete('work_order');
 }

 public function deleteDataWorkOrderDetails($id_work_order)
 {
  $this->db->where('id_work_order', $id_work_order);
  $this->db->delete('work_order_details');
 }

 public function getDataWorkOrderCode($id_order)
 {
  $query = "SELECT
              work_order_code 
            FROM
              work_order 
            WHERE
              id_master_order_icon_main = $id_order 
            ORDER BY
              id DESC 
              LIMIT 1
            ";

  $data = $this->db->query($query);
  return $data->result();
 }


 // =========================================================================================





 public function get_bundle()
 {

  $rst = "SELECT
            cutting.id_cutting,
            cutting.orc,
            cutting.work_order,
            cutting.style,
            cutting.color,
            cutting.buyer,
            cutting.so,
            cutting_detail.size,
            SUM( cutting_detail.qty_pcs ) AS qty_per_size,
            COUNT( cutting_detail.size ) AS jml_box 
            FROM
            cutting
            INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
            GROUP BY
            cutting_detail.id_cutting, cutting_detail.size 
            ORDER BY
            cutting.id_cutting DESC
                
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 function get_detail_bundle()
 {

  $id = $_POST['id'];

  $sql = "SELECT
                   cutting_detail.id_cutting_detail, 
                   cutting_detail.id_cutting, 
                   cutting_detail.size, 
                   cutting_detail.qty_pcs, 
                   cutting_detail.no_bundle
                FROM
                   cutting_detail
                    WHERE
                   cutting_detail.id_cutting = '$id'
        ";

  $query = $this->db->query($sql);

  return $query->result_array();
 }


 public function delete_by_orc($orc)
 {
  $this->db->trans_strict(FALSE);
  // $this->db->trans_begin();
  $this->db->trans_start();

  //update order first
  $this->update_order($orc);
  $resultCutting = $this->get_data_cutting($orc);
  foreach ($resultCutting as $rc) {
   $this->delete_cutting_detail($rc->id_cutting);
  }
  $this->delete_cutting($orc);
  $this->db->trans_complete();

  if ($this->db->trans_status() === FALSE) {
   return 'false';
  } else {
   return 'true';
  }
 }

 public function update_order($orc)
 {
  $this->db->set('to_cutting', null);
  $this->db->set('tgl_to_cutting', null);
  $this->db->where('orc', $orc);
  $this->db->update('order');
  if ($this->db->affected_rows()) {
   return false;
  }
  return true;
 }

 public function get_data_cutting($orc)
 {
  $r = $this->db->get_where('cutting', array('orc' => $orc));
  if ($r->num_rows() > 0) {
   return $r->result();
  }
  return false;
 }

 public function delete_cutting_detail($id)
 {
  $this->db->delete('cutting_detail', array('id_cutting' => $id));
  if ($this->db->affected_rows() > 0) {
   return false;
  }
  return true;
 }

 public function delete_cutting($orc)
 {
  $this->db->where('orc', $orc);
  $this->db->delete('cutting');
  if ($this->db->affected_rows() > 0) {
   return false;
  }
  return true;
 }

 public function get_orc()
 {

  $rst = "SELECT
                    `master_order_icon_main`.orc, 
                    `master_order_icon_main`.to_cutting
                FROM
                    `master_order_icon_main`";
  $query = $this->db->query($rst);
  return $query->result();
 }

 // public function get_orc_bundle_icon()
 // {

 //  $rst = "SELECT orc FROM `master_order_icon_main`";
 //  $query = $this->db->query($rst);
 //  return $query->result();
 // }

 public function get_orc_bundle_icon()
 {

  $rst = "SELECT
             id_master_order_icon_main, 
             work_order AS `orc`
           FROM
             `work_order` 
           WHERE
             to_cutting IS NULL 
             AND tgl_to_cutting IS NULL";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getByOrc_v1($orc)
 {

  $rst = "SELECT
                    `master_order_icon_main`.orc, 
                    `master_order_icon_main`.to_cutting, 
                    `master_order_icon_main`.style, 
                    `master_order_icon_main`.comm, 
                    `master_order_icon_main`.style_sam, 
                    `master_order_icon_main`.buyer, 
                    `master_order_icon_main`.so, 
                    `master_order_icon_main`.color, 
                    `master_order_icon_main`.qty, 
                    `master_order_icon_main`.etd
                FROM
                    `master_order_icon_main`
                WHERE
                    `master_order_icon_main`.orc = '$orc'
                    -- AND `master_order_icon_main`.id_factory = $this->id_factory
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getByOrc($orc)
 {

  $rst = "SELECT
            `master_order_icon_main`.customer_name,
            `master_order_icon_main`.orc,
            `master_order_icon_main`.to_cutting,
            `master_order_icon_main`.style_code,
            -- `master_order_icon_main`.comm,
            -- `master_order_icon_main`.style_sam,
            `master_order_icon_main`.po_customer,
            `master_order_icon_main`.color,
            `master_order_icon_main`.quantity_ordered,
            `master_order_icon_main`.shippment_date,
            `master_order_detail_icon`.size,
            SUM(`master_order_detail_icon`.quantity) as qty_size
        FROM
            `master_order_icon_main`
            JOIN master_order_detail_icon ON `master_order_detail_icon`.id_master_order_icon_main = `master_order_icon_main`.id_master_order_icon_main
        WHERE
            `master_order_icon_main`.orc = '$orc'
        GROUP BY 
            `master_order_icon_main`.orc, `master_order_icon_main`.style_code, `master_order_icon_main`.po_customer, `master_order_icon_main`.customer_name,  `master_order_icon_main`.color, `master_order_detail_icon`.size
            ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 // public function getBundleByOrcIcon($orc)
 // {

 //  $rst = "SELECT
 //                    *
 //                FROM
 //                    master_order_icon_main 
 //                WHERE
 //                    master_order_icon_main.orc = '$orc'";
 //  $query = $this->db->query($rst);
 //  return $query->result();
 // }
 public function getBundleByOrcIcon($orc)
 {

  $rst = "SELECT
             main.consignee_name,
             work_order.orc,
             work_order.qty_allocation as quantity_ordered,
             main.style_code,
             main.color,
             main.po_customer
           FROM
             master_order_icon_main as main
             INNER JOIN work_order ON main.id_master_order_icon_main = work_order.id_master_order_icon_main
           WHERE
             work_order.work_order = '$orc'";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getInputCutting()
 {
  $rst = "SELECT
                    `master_order_icon_main`.orc, 
                    `master_order_icon_main`.to_cutting
                FROM
                    `master_order_icon_main`
                    WHERE
                    `master_order_icon_main`.to_cutting IS NULL
                    ";

  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getScanInputCutting()
 {
  $rst = "SELECT
                    input_cutting.id_input_cutting,
                    input_cutting.orc,
                    input_cutting.wo,
                    input_cutting.style,
                    input_cutting.color,
                    input_cutting.no_bundle,
                    input_cutting.size,
                    input_cutting.qty_pcs,
                    input_cutting.tgl,
                    input_cutting.created_time
                FROM
                    input_cutting
                -- JOIN `master_order_icon_main` ON input_cutting.orc = `master_order_icon_main`.orc
                JOIN `master_order_icon_main` ON input_cutting.id_master_order_icon_main = `master_order_icon_main`.id_master_order_icon_main
                WHERE
                    input_cutting.tgl = CURRENT_DATE()
                  
                ORDER BY
                    input_cutting.id_input_cutting DESC
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getDataOutputCutting()
 {
  $rst = "SELECT
                    input_sewing.id_input_sewing,
                    input_sewing.tgl,
                    input_sewing.created_time,
                    input_sewing.orc,
                    input_sewing.wo,
                    input_sewing.style,
                    input_sewing.color,
                    input_sewing.no_bundle,
                    input_sewing.size,
                    input_sewing.qty_pcs,
                    input_sewing.`line` 
                FROM
                    input_sewing
                -- JOIN `master_order_icon_main` ON input_sewing.orc = `master_order_icon_main`.orc
                JOIN `master_order_icon_main` ON input_sewing.id_order_icon_main = `master_order_icon_main`.id_master_order_icon_main
                WHERE
                    input_sewing.tgl = CURRENT_DATE () 
                    
                ORDER BY
                    input_sewing.id_input_sewing DESC
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function getDataUnscannedBarcode()
 {
  $rst = "SELECT
                    input_cutting.orc,
                    input_cutting.style,
                    input_cutting.color,
                    input_cutting.no_bundle,
                    input_cutting.size,
                    input_cutting.kode_barcode 
                FROM
                    input_cutting
                    LEFT JOIN input_sewing ON input_cutting.kode_barcode = input_sewing.kode_barcode
                JOIN `master_order_icon_main` ON input_cutting.orc = `master_order_icon_main`.orc
                WHERE
                    	YEAR ( `master_order_icon_main`.orc_date ) IN ( YEAR ( CURDATE()), YEAR ( CURDATE()) - 1 )
                    AND input_sewing.kode_barcode IS NULL
                ORDER BY
                    input_cutting.orc ASC,
                    input_cutting.no_bundle ASC
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function get_size()
 {

  $rst = "SELECT * FROM master_size";
  $query = $this->db->query($rst);
  return $query->result();
 }
 // public function get_size_icon($orc)
 // {

 //  $rst = "SELECT
 //                    master_order_icon_main.orc,
 //                    master_order_detail_icon.size 
 //                FROM
 //                    master_order_icon_main
 //                    LEFT JOIN master_order_detail_icon ON master_order_icon_main.id_master_order_icon_main = master_order_detail_icon.id_master_order_icon_main 
 //                WHERE
 //                    master_order_icon_main.orc = '$orc'";
 //  $query = $this->db->query($rst);
 //  return $query->result();
 // }
 public function get_size_icon($orc)
 {

  $rst = "SELECT
            work_order.work_order as orc,
            work_order_details.size
          FROM
            work_order
            INNER JOIN work_order_details ON work_order.id = work_order_details.id_work_order
          WHERE
            work_order.work_order = '$orc'
            AND work_order_details.qty_size IS NOT NULL
            ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function get_sam()
 {
  if (isset($_POST['dataForSAM'])) {
   $dataForSam = $_POST['dataForSAM'];
   $style = $dataForSam['style'];

   $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%')";

   // $result = $this->db->get($this->table);
   $result = $this->db->query($sql);

   return $result->row();
  }
 }
 public function get_by_size()
 {
  if (isset($_POST['dataSize'])) {
   $dataSize = $_POST['dataSize'];

   $r = $this->db->get_where('master_size', array('size' => $dataSize));

   return $r->row();
  }
 }

 // public function get_by_size_icon()
 // {
 //  if (isset($_POST['dataSize'])) {
 //   $dataSize = $_POST['dataSize'];
 //   $orc = $dataSize['orc'];
 //   $size = $dataSize['size'];

 //   $sql = "SELECT
 //                        master_order_icon_main.orc,
 //                        master_order_detail_icon.size,
 //                        master_order_detail_icon.quantity,
 //                        master_size.`group` 
 //                    FROM
 //                        master_order_icon_main
 //                        LEFT JOIN master_order_detail_icon ON master_order_icon_main.id_master_order_icon_main = master_order_detail_icon.id_master_order_icon_main
 //                        LEFT JOIN master_size ON master_order_detail_icon.size = master_size.size 
 //                    WHERE
 //                        master_order_icon_main.orc = '$orc' 
 //                        AND master_order_detail_icon.size = '$size'";

 //   $result = $this->db->query($sql);

 //   return $result->result();
 //  }
 // }
 public function get_by_size_icon()
 {
  if (isset($_POST['dataSize'])) {
   $dataSize = $_POST['dataSize'];
//    var_dump($dataSize);
   $orc = $dataSize['orc'];
   $size = $dataSize['size'];

   $sql = "SELECT
              work_order.work_order as orc,
              work_order_details.size,
              work_order_details.qty_size as quantity,
              master_size.group
            FROM
              work_order
              INNER JOIN work_order_details ON work_order.id = work_order_details.id_work_order
              LEFT JOIN master_size ON work_order_details.size = master_size.size
            WHERE
              work_order.work_order = '$orc'
              AND work_order_details.size = '$size'";

   $result = $this->db->query($sql);

   return $result->result();
  }
 }
 public function check_by_orc_size()
 {
  if (isset($_POST['dataString'])) {
   $dataString = $_POST['dataString'];
   $wo = $dataString['orc'];
   $size = $dataString['size'];

   $sql = "SELECT
                        * 
                    FROM
                        viewcuttingdone 
                    WHERE
                        viewcuttingdone.work_order = '$wo' 
                        AND viewcuttingdone.size = '$size'";

   $result = $this->db->query($sql);

   return $result->num_rows();
  }
 }

 public function save()
 {
  // ada trigger ke order juga
  if (isset($_POST['dataStrCutting'])) {
   $dataStrCutting = $_POST['dataStrCutting'];
   $data = array(
    'id_master_order_icon_main' => $dataStrCutting['id_master_order_icon_main'],
    'orc' => $dataStrCutting['orc'],
    'style' => $dataStrCutting['style'],
    'color' => $dataStrCutting['color'],
    'buyer' => $dataStrCutting['buyer'],
    // 'comm' => $dataStrCutting['comm'],
    'so' => $dataStrCutting['so'],
    'qty' => $dataStrCutting['qty'],
    'boxes' => $dataStrCutting['boxes'],
    'work_order' => $dataStrCutting['work_order'],
    // 'prepare_on' => date('Y-m-d', strtotime($dataStrCutting['prepare_on'])),
    'date_created' => date('Y-m-d'),
   );

   $this->db->insert('cutting', $data);
   return $this->db->insert_id();
  }
 }

 public function save_detail()
 {

  if (isset($_POST['dataCuttingDetail'])) {
   $dataCuttingDetail = $_POST['dataCuttingDetail'];

   $this->db->trans_start();
   foreach ($dataCuttingDetail as $dataCutDet) {
    $data = array(
     'id_cutting' => $dataCutDet['id_cutting'],
     'size' => $dataCutDet['size'],
     'grup_size' => $dataCutDet['grup_size'],
     'qty_pcs' => $dataCutDet['qty_pcs'],
     'cutting_sam' => $dataCutDet['cutting_sam'],
     'sam_result' => $dataCutDet['sam_result'],
     'qty' => $dataCutDet['qty'],
     'no_bundle' => $dataCutDet['no_bundle'],
     'kode_barcode' => $dataCutDet['kode_barcode'],
     'outermold_barcode' => ($dataCutDet['outermold_barcode'] != "") ? $dataCutDet['outermold_barcode'] : null,
     'midmold_barcode' => ($dataCutDet['midmold_barcode'] != "") ? $dataCutDet['midmold_barcode'] : null,
     'linningmold_barcode' => ($dataCutDet['linningmold_barcode'] != "") ? $dataCutDet['linningmold_barcode'] : null,
     'panty_barcode' => ($dataCutDet['panty_barcode'] != "") ? $dataCutDet['panty_barcode'] : null,
     'juwita_barcode' => ($dataCutDet['juwita_barcode'] != "") ? $dataCutDet['juwita_barcode'] : null,
     'skp_barcode' => ($dataCutDet['skp_barcode'] != "") ? $dataCutDet['skp_barcode'] : null
    );
    $this->db->insert('cutting_detail', $data);
   }
   $this->db->trans_complete();

   return "OK";
  }
 }

 public function check_by_barcode($barcode)
 {
  $retVal = $this->db->get_where('input_cutting', array('kode_barcode' => $barcode));

  return $retVal->row();
 }

 public function get_by_barcode($barcode)
 {
  $rst = $this->db->get_where('viewcuttingdone', array('kode_barcode' => $barcode));

  return $rst->row();
 }

 public function save_input()
 {
  date_default_timezone_set("Asia/Jakarta");

  if (isset($_POST['dataStr'])) {
   $dataStr = $_POST['dataStr'];
   $data = array(
    'orc' => $dataStr['orc'],
    'style' => $dataStr['style'],
    'color' => $dataStr['color'],
    'no_bundle' => $dataStr['no_bundle'],
    'size' => $dataStr['size'],
    'qty_pcs' => $dataStr['qty_pcs'],
    'tgl' => date('Y-m-d'),
    'created_time' => date('H:i:s'),
    'kode_barcode' => $dataStr['kode_barcode'],
    'id_master_order_icon_main' => $dataStr['id_master_order_icon_main'],
    'wo' => $dataStr['wo']
   );

   $this->db->insert('input_cutting', $data);
   return $this->db->insert_id();
  }
 }

 // public function get_all_line()
 // {
 //     $result = $this->db->get('line');
 //     return $result->result();
 // }

 public function get_all_line()
 {
  $rst = "SELECT
                    `name`
                FROM
                    line
                WHERE 
                    description IS NOT NULL AND 
                    idFactory = $this->id_factory
                ORDER BY
                    `name` ASC
        ";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function get_by_barcode_output($code)
 {
  $rst = $this->db->get_where('input_sewing', array('kode_barcode' => $code));

  return $rst->row();
 }

 public function get_sewing_sam()
 {
  if (isset($_POST['dataForSewingSAM'])) {
   $dataCuttingSAM = $_POST['dataForSewingSAM'];
   $style = $dataCuttingSAM['style'];
   $color = $dataCuttingSAM['color'];
   $grup_size = $dataCuttingSAM['grup_size'];

   $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$grup_size'";

   // $result = $this->db->get($this->table);
   $result = $this->db->query($sql);

   return $result->row();
  }
 }

 public function save_sewing()
 {
  date_default_timezone_set("Asia/Jakarta");

  if (isset($_POST['dataStr'])) {
   $dataStr = $_POST['dataStr'];
   $data = array(
    'id_order_icon_main' => $dataStr['id_order_icon_main'],
    'line' => $dataStr['line'],
    'tgl' => date('Y-m-d'),
    'created_time' => date('H:i:s'),
    'wo' => $dataStr['wo'],
    'orc' => $dataStr['orc'],
    'style' => $dataStr['style'],
    'color' => $dataStr['color'],
    'no_bundle' => $dataStr['no_bundle'],
    'size' => $dataStr['size'],
    'qty_pcs' => $dataStr['qty_pcs'],
    'center_panel_sam' => $dataStr['center_panel_sam'],
    'back_wings_sam' => $dataStr['back_wings_sam'],
    'cups_sam' => $dataStr['cups_sam'],
    'assembly_sam' => $dataStr['assembly_sam'],
    'kode_barcode' => $dataStr['kode_barcode'],
    'outputed' => "No",
   );

   $this->db->insert('input_sewing', $data);



   return $this->db->insert_id();
  }
 }

 public function comparing_inputcutting_inputsewing($orc)
 {

  $this->db->select("A.orc, A.style, A.size, A.no_bundle, A.kode_barcode");
  $this->db->from("input_cutting A");
  $this->db->join("input_sewing B", "A.kode_barcode = B.kode_barcode", "left outer");
  $this->db->where("A.orc", $orc);
  $this->db->where("B.orc is null");
  $this->db->order_by("A.orc, A.no_bundle");

  $result = $this->db->get();
  $data = array(
   'count' => $result->num_rows(),
   'rows' => $result->result()
  );

  return $data;
 }

 public function get_by_orc($orc)
 {
//   $this->db->where('orc', $orc);
  $this->db->where('work_order', $orc);
  $this->db->order_by('no_bundle', 'asc');
  $rst = $this->db->get('viewcuttingdone');

  return $rst->result();
 }

 public function get_by_orc_cutting_max_id_cutting($orc){
    $this->db->select('id_cutting,boxes');
    $this->db->where('orc', $orc);
    $this->db->order_by('id_cutting', 'desc');
    $this->db->limit(1);

    $rst = $this->db->get('cutting');

    return $rst->result();
 }

 public function getCountCuttingDetailByBarcode($barcodeLike){
    $this->db->like('kode_barcode', $barcodeLike, 'both');
    $this->db->from('cutting_detail');

    return $this->db->count_all_results();
 }

 public function get_by_orc_mold($orc)
 {
  $this->db->order_by("no_bundle");
//   $r = $this->db->get_where('viewcuttingwithmold', array('orc' => $orc));
  $r = $this->db->get_where('viewcuttingwithmold', array('work_order' => $orc));

  return $r->result();
 }


 public function get_all_orc()
 {

  $rst = "SELECT
                    `master_order_icon_main`.orc 
                FROM
                    `master_order_icon_main`
                ORDER BY
                    `master_order_icon_main`.orc DESC";
  $query = $this->db->query($rst);
  return $query->result();
 }

 public function get_datas_orcs()
 {
  $data = $_POST['data'];
  $orc = $data['orc'];
  $datas = "SELECT
					cutting.orc,
					cutting.style,
					cutting.color,
					cutting_detail.no_bundle,
					cutting_detail.size,
					cutting_detail.kode_barcode,
					input_sewing.kode_barcode AS barcode_trimstore,
					input_sewing.line,
					cutting.so,
					cutting.comm,
					cutting.date_created,
					cutting.buyer,
					cutting.qty AS qty_order 
				FROM
					cutting
					INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
					LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode 
				WHERE
					cutting.orc = '$orc' 
				ORDER BY
					cutting_detail.kode_barcode ASC
        
                ";

  $query = $this->db->query($datas);
  return $query->result_array();
 }

 public function get_datas_orcs_v2()
 {
  $data = $_POST['data'];
  $orc = $data['orc'];
  $datas = "SELECT
            cutting.orc,
            cutting.style,
            cutting.color,
            cutting_detail.no_bundle,
            cutting_detail.size,
            cutting_detail.kode_barcode,
            input_cutting.kode_barcode AS input_cutting,
            IFNULL(input_cutting.qty_pcs, 0) AS qty_input_cutting,
            input_sewing.kode_barcode AS barcode_trimstore,
            IFNULL(input_sewing.qty_pcs, 0) AS qty_input_sewing,
            input_sewing.line,
            cutting.so,
            cutting.comm,
            cutting.date_created,
            cutting.buyer,
            cutting.qty AS qty_order 
        FROM
            cutting
            INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
            LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode
            LEFT JOIN input_cutting ON input_cutting.kode_barcode = cutting_detail.kode_barcode 
        WHERE
            cutting.orc = '$orc' 
        ORDER BY
            cutting_detail.kode_barcode ASC";

  $query = $this->db->query($datas);
  return $query->result_array();
 }

 public function wip()
 {

  $rst = "SELECT
                tab1.orc,
                tab1.style,
                tab1.color,
                tab1.in_cutting,
                tab1.in_sewing,
                tab1.wip 
            FROM
                (
                SELECT
                    input_cutting.orc AS orc,
                    input_cutting.style AS style,
                    input_cutting.color AS color,
                    Sum( input_cutting.qty_pcs ) AS in_cutting,
                    Sum( input_sewing.qty_pcs ) AS in_sewing,
                    sum( `input_cutting`.`qty_pcs` ) - COALESCE ( sum( `input_sewing`.`qty_pcs` ), 0 ) AS wip 
                FROM
                    input_cutting
                    LEFT JOIN input_sewing ON input_sewing.kode_barcode = input_cutting.kode_barcode
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = input_cutting.`orc` 
                GROUP BY
                    input_cutting.orc 
                ) AS tab1 
            WHERE
                tab1.wip != 0";

  $query = $this->db->query($rst);

  return $query->result();
 }

 public function balance()
 {

  $rst = "SELECT
                tab1.orc,
                tab1.style,
                tab1.color,
                tab1.qty_order,
                tab1.qty_cutting,
                tab1.balance_cutting 
            FROM
                (
                SELECT
                    input_cutting.orc AS orc,
                    input_cutting.style AS style,
                    input_cutting.color AS color,
                    tab2.quantity_ordered AS qty_order,
                    Sum( input_cutting.qty_pcs ) AS qty_cutting,
                    tab2.quantity_ordered - COALESCE ( sum( input_cutting.qty_pcs ), 0 ) AS balance_cutting 
                FROM
                    input_cutting
                    LEFT JOIN input_sewing ON input_sewing.kode_barcode = input_cutting.kode_barcode
                    INNER JOIN master_order_icon_main AS tab2 ON tab2.orc = input_cutting.`orc` 
                GROUP BY
                    input_cutting.orc 
                ) AS tab1 
            WHERE
                tab1.balance_cutting != 0";

  $query = $this->db->query($rst);

  return $query->result();
 }

 public function input_cutting($tglNow)
 {

  $rst = "SELECT
					input_cutting.tgl,
					input_cutting.orc,
					input_cutting.style,
					input_cutting.color,
					Sum( input_cutting.qty_pcs ) AS qt_cut
				FROM
					input_cutting
                    JOIN `master_order_icon_main` ON input_cutting.orc = `master_order_icon_main`.orc
				WHERE
					input_cutting.tgl = '$tglNow'
                    
				GROUP BY
					input_cutting.orc,
					input_cutting.tgl";

  $query = $this->db->query($rst);

  return $query->result();
 }

 public function output_cutting($tglNow)
 {

  $rst = "SELECT
					input_sewing.tgl,
					input_sewing.orc,
					input_sewing.style,
					input_sewing.color,
					Sum( input_sewing.qty_pcs ) AS qty_out 
				FROM
					input_sewing 
					JOIN `master_order_icon_main` ON input_sewing.orc = `master_order_icon_main`.orc
                WHERE
                    input_sewing.tgl = '$tglNow'
                    
				GROUP BY
					input_sewing.tgl,
					input_sewing.orc
		";

  $query = $this->db->query($rst);

  return $query->result();
 }

 public function trimstore()
 {

  $rst = "SELECT
                `ic`.`orc` AS `orc`,
                `or`.`customer_name` AS `buyer`,
                `or`.`po_customer` AS `po`,
                `or`.`shippment_date` AS `etd`,
                `or`.`shippment_date` AS `plan_export`,
                `ic`.`style` AS `style`,
                `ic`.`color` AS `color`,
                `or`.`quantity_ordered` AS `qty_order`,
                sum( `ic`.`qty_pcs` ) AS `cutting`,
                COALESCE(sum( `ins`.`qty_pcs` ), 0) AS `out_trim`,
                COALESCE(sum( `ic`.`qty_pcs` ) - COALESCE ( sum( `ins`.`qty_pcs` ), 0 ),0) AS stok_trim,
                COALESCE(`or`.`quantity_ordered` - sum( `ic`.`qty_pcs` ),0) AS bal_to_cut,
                COALESCE(`or`.`quantity_ordered` - sum( `ins`.`qty_pcs` ),0) AS bal_cut,
                COALESCE(osw.qty_sewing,0) AS qty_sewing,
                COALESCE ( sum( `ins`.`qty_pcs` ) - osw.qty_sewing, 0 )AS wip_sewing,
                COALESCE(`or`.`quantity_ordered` - osw.qty_sewing,0) AS bal_sewing 
            FROM
                `input_cutting` ic
                LEFT JOIN `master_order_icon_main` `or` ON `or`.`orc` = `ic`.`orc`
                LEFT JOIN `input_sewing` ins ON `ins`.`kode_barcode` = `ic`.`kode_barcode`
                LEFT JOIN (
                SELECT
                    `output_sewing_detail`.`orc` AS `orc`,
                    sum( IF ( `output_sewing_detail`.`assembly` = '00:00:00', 0, `output_sewing_detail`.`qty` ) ) AS `qty_sewing` 
                FROM
                    `output_sewing`
                    JOIN `output_sewing_detail` ON `output_sewing_detail`.`id_output_sewing` = `output_sewing`.`id_output_sewing` 
                GROUP BY
                    `output_sewing_detail`.`orc` 
                ) AS osw ON osw.orc = ic.orc 
            GROUP BY
        `ic`.`orc`";

  $query = $this->db->query($rst);

  return $query->result();
 }


 // Input Recut
 // ==================================================================================================
 public function getDataInputRecut()
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_details.sequence_number,
                    input_recut_cutting.input_date,
                    output_recut_cutting.output_date,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.style,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.size,
                    recut_sewing_main.no_bundle,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.NAME AS line,
                    recut_sewing_details.remarks 
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN line ON recut_sewing_main.id_line = line.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND output_recut_cutting.output_date IS NULL
                    AND `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing_main.id ASC,
                    recut_sewing_details.id ASC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataInputRecutComplete()
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_details.sequence_number,
                    input_recut_cutting.input_date,
                    output_recut_cutting.output_date,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.style,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.size,
                    recut_sewing_main.no_bundle,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.NAME AS line,
                    recut_sewing_details.remarks 
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN line ON recut_sewing_main.id_line = line.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main 
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND output_recut_cutting.output_date IS NOT NULL 
                    AND `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing_main.id ASC,
                    recut_sewing_details.id ASC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataRecutSewing()
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_details.sequence_number,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.style,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.size,
                    recut_sewing_main.reject_remarks,
                    recut_sewing_main.no_bundle,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.id as id_recut_details,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.name as line,
                    recut_sewing_details.remarks
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN line ON recut_sewing_main.id_line = line.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE 
					input_recut_cutting.input_date IS NULL
                    AND recut_sewing_main.reject = 0
                    AND `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing_main.id ASC,
                    recut_sewing_details.id ASC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataRecutSewingRejected()
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_details.sequence_number,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.style,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.size,
                    recut_sewing_main.no_bundle,
                    recut_sewing_main.reject_remarks,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.id as id_recut_details,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.name as line,
                    recut_sewing_details.remarks
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN line ON recut_sewing_main.id_line = line.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE 
					input_recut_cutting.input_date IS NULL
                    AND recut_sewing_main.reject = 1
                    AND `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing_main.id DESC,
                    recut_sewing_details.id DESC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataUnscannedBarcodeRecutSewing()
 {
  $data = "SELECT
                    COUNT( recut_sewing_main.id ) AS count_unscanned 
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NULL
                    AND recut_sewing_main.reject = 0
                    AND `master_order_icon_main`.id_factory = $this->id_factory
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 // public function getDataScanBarcodeValue($barcode)
 // {
 //     $data = "SELECT
 //                 recut_sewing.id,
 //                 recut_sewing.created_date,
 //                 recut_sewing.buyer,
 //                 recut_sewing.style,
 //                 recut_sewing.orc,
 //                 master_cutting_part.part_desc,
 //                 recut_sewing.no_bundle,
 //                 recut_sewing.size,
 //                 recut_sewing.qty,
 //                 dt_defect2.DCode AS defect_code,
 //                 dt_defect2.Defect AS defect,
 //                 `line`.`NAME` AS `line`,
 //                 recut_sewing.remarks,
 //                 recut_sewing.barcode,
 //                 input_recut_cutting.input_date 
 //             FROM
 //                 recut_sewing
 //                 LEFT JOIN input_recut_cutting ON recut_sewing.id = input_recut_cutting.id_recut_sewing
 //                 INNER JOIN master_cutting_part ON recut_sewing.id_master_cutting_part = master_cutting_part.id
 //                 INNER JOIN dt_defect2 ON recut_sewing.id_dt_defect2 = dt_defect2.id_df
 //                 INNER JOIN line ON recut_sewing.id_line = line.id_line 
 //             WHERE
 //                 input_recut_cutting.input_date IS NULL 
 //                 AND recut_sewing.barcode = '$barcode' 
 //             ORDER BY
 //                 recut_sewing.id DESC
 //           ";

 //     $query = $this->db->query($data);
 //     return $query->result();
 // }



 public function getDataCheckBarcodeInputSewing($barcode)
 {
  $data = "SELECT
                    id_input_sewing
                FROM
                    input_sewing 
                WHERE
                    kode_barcode = '$barcode'
              ";

  $query = $this->db->query($data);
  return $query->num_rows();
 }

 public function getDataCheckBarcodeRecutSewing($barcode)
 {
  $data = "SELECT
                        id
                    FROM
                        recut_sewing_main
                    WHERE
                        barcode = '$barcode'
                        AND status_process = 1
                        AND reject = 0
              ";

  $query = $this->db->query($data);
  return $query->num_rows();
 }

 public function getDataCheckBarcodeInputRecutCuttingScanned($barcode)
 {
  $data = "SELECT
                    recut_sewing_main.id 
                FROM
                    recut_sewing_main
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                WHERE
                    input_recut_cutting.input_date IS NULL 
                    AND recut_sewing_main.status_process = 1
                    AND recut_sewing_main.barcode = '$barcode'
              ";

  $query = $this->db->query($data);
  return $query->num_rows();
 }

 public function postDataInputRecutBySelected($data)
 {
  $this->db->insert('input_recut_cutting', $data);
  return $this->db->insert_id();
 }

 public function postDataInputRecutByBarcode($data)
 {
  $this->db->insert('input_recut_cutting', $data);
  return $this->db->insert_id();
 }

 public function updateDataRejectRecutRequestSewing($id_main, $data)
 {
  $this->db->where(['id' => $id_main]);
  $this->db->update('recut_sewing_main', $data);
 }
 // ==================================================================================================


 // Output Recut
 // ==================================================================================================
 public function getDataOutputRecut()
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_details.sequence_number,
                    output_recut_cutting.output_date,
                    input_recut_cutting.input_date,
                    received_recut_sewing.date_received,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.style,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.size,
                    recut_sewing_main.no_bundle,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.NAME AS line,
                    recut_sewing_details.remarks,
                    SEC_TO_TIME(TIMESTAMPDIFF(SECOND, input_recut_cutting.input_date, output_recut_cutting.output_date)) as time_difference
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN `line` ON recut_sewing_main.id_line = `line`.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    LEFT JOIN received_recut_sewing ON recut_sewing_main.id = received_recut_sewing.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND output_recut_cutting.output_date IS NOT NULL 
                    AND received_recut_sewing.date_received IS NULL
                    AND `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing_main.id ASC,
                    recut_sewing_details.id ASC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataOutputRecutComplete()
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_details.sequence_number,
                    output_recut_cutting.output_date,
                    input_recut_cutting.input_date,
                    received_recut_sewing.date_received,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.style,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.size,
                    recut_sewing_main.no_bundle,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.NAME AS line,
                    recut_sewing_details.remarks,
                    SEC_TO_TIME(TIMESTAMPDIFF(SECOND, input_recut_cutting.input_date, output_recut_cutting.output_date)) as time_difference
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN `line` ON recut_sewing_main.id_line = `line`.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    LEFT JOIN received_recut_sewing ON recut_sewing_main.id = received_recut_sewing.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND output_recut_cutting.output_date IS NOT NULL 
                    AND received_recut_sewing.date_received IS NOT NULL
                    AND `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing_main.id ASC,
                    recut_sewing_details.id ASC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataInputRecutWaitingList()
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_details.sequence_number,
                    input_recut_cutting.input_date,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.style,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.size,
                    recut_sewing_main.no_bundle,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.name as line,
                    recut_sewing_details.remarks
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN line ON recut_sewing_main.id_line = line.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND output_recut_cutting.output_date IS NULL 
                ORDER BY
                    recut_sewing_main.id ASC,
                    recut_sewing_details.id ASC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataUnscannedBarcodeInputRecut()
 {
  $data = "SELECT
                    COUNT( recut_sewing_main.id ) AS count_unscanned 
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND output_recut_cutting.output_date IS NULL
                    AND `master_order_icon_main`.id_factory = $this->id_factory
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getScanDataBarcodeValueOutputRecut($barcode)
 {
  $data = "SELECT
                    recut_sewing.id,
                    recut_sewing.created_date,
                    recut_sewing.buyer,
                    recut_sewing.style,
                    recut_sewing.orc,
                    master_cutting_part.part_desc,
                    recut_sewing.no_bundle,
                    recut_sewing.size,
                    recut_sewing.qty,
                    dt_defect2.DCode AS defect_code,
                    dt_defect2.Defect AS defect,
                    `line`.`NAME` AS `line`,
                    recut_sewing.remarks,
                    recut_sewing.barcode,
                    output_recut_cutting.output_date 
                FROM
                    recut_sewing
                    LEFT JOIN input_recut_cutting ON recut_sewing.id = input_recut_cutting.id_recut_sewing
                    LEFT JOIN output_recut_cutting ON recut_sewing.id = output_recut_cutting.id_recut_sewing
                    INNER JOIN master_cutting_part ON recut_sewing.id_master_cutting_part = master_cutting_part.id
                    INNER JOIN dt_defect2 ON recut_sewing.id_dt_defect2 = dt_defect2.id_df
                    INNER JOIN line ON recut_sewing.id_line = line.id_line
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND output_recut_cutting.output_date IS NULL 
                    AND recut_sewing.barcode = '$barcode' 
                    AND `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing.id DESC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataCheckBarcodeInputRecutCutting($barcode)
 {
  $data = "SELECT
                    recut_sewing_main.id 
                FROM
                    recut_sewing_main
                    INNER JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND recut_sewing_main.status_process = 1
                    AND recut_sewing_main.barcode = '$barcode'
                    AND `master_order_icon_main`.id_factory = $this->id_factory
              ";

  $query = $this->db->query($data);
  return $query->num_rows();
 }

 public function getDataCheckBarcodeOutputRecutCuttingScanned($barcode)
 {
  $data = "SELECT
                    recut_sewing_main.id 
                FROM
                    recut_sewing_main
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    input_recut_cutting.input_date IS NOT NULL 
                    AND output_recut_cutting.output_date IS NULL 
                    AND recut_sewing_main.status_process = 1
                    AND recut_sewing_main.barcode = '$barcode'
                    AND `master_order_icon_main`.id_factory = $this->id_factory
              ";

  $query = $this->db->query($data);
  return $query->num_rows();
 }

 public function postDataOutputRecutBySelected($data)
 {
  $this->db->insert('output_recut_cutting', $data);
  return $this->db->insert_id();
 }

 public function postDataOutputRecutByBarcode($data)
 {
  $this->db->insert('output_recut_cutting', $data);
  return $this->db->insert_id();
 }
 // ==================================================================================================


 // Report Recut
 // ==================================================================================================
 public function getDataReportRecut()
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.style,
                    recut_sewing_main.size,
                    recut_sewing_main.no_bundle,
                    recut_sewing_main.reject,
                    recut_sewing_main.reject_remarks,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.sequence_number,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.`name` as line,
                    recut_sewing_details.remarks,
                    input_recut_cutting.input_date,
                    output_recut_cutting.output_date,
                    received_recut_sewing.date_received,
                    SEC_TO_TIME(TIMESTAMPDIFF(SECOND, input_recut_cutting.input_date, output_recut_cutting.output_date)) as time_difference_cutting,
					SEC_TO_TIME(TIMESTAMPDIFF(SECOND, recut_sewing_main.created_date, received_recut_sewing.date_received)) as time_difference_sewing
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN line ON recut_sewing_main.id_line = line.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    LEFT JOIN received_recut_sewing ON recut_sewing_main.id = received_recut_sewing.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                WHERE
                    `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing_main.id DESC,
                    recut_sewing_details.id DESC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }

 public function getDataReportRecutFilter($date_from, $date_to)
 {
  $data = "SELECT
                    recut_sewing_main.id,
                    recut_sewing_main.created_date,
                    recut_sewing_main.barcode,
                    recut_sewing_main.buyer,
                    recut_sewing_main.orc,
                    recut_sewing_main.color,
                    recut_sewing_main.style,
                    recut_sewing_main.size,
                    recut_sewing_main.no_bundle,
                    recut_sewing_main.reject,
                    recut_sewing_main.reject_remarks,
                    master_item.item_desc,
                    master_item_part.part_desc,
                    recut_sewing_details.sequence_number,
                    recut_sewing_details.other_item_part_desc,
                    recut_sewing_details.qty,
                    master_defect_recut.id AS defect_code,
                    master_defect_recut.defect_desc,
                    recut_sewing_details.other_defect_desc,
                    line.`name` as line,
                    recut_sewing_details.remarks,
                    input_recut_cutting.input_date,
                    output_recut_cutting.output_date,
                    received_recut_sewing.date_received,
                    SEC_TO_TIME(TIMESTAMPDIFF(SECOND, input_recut_cutting.input_date, output_recut_cutting.output_date)) as time_difference_cutting,
					SEC_TO_TIME(TIMESTAMPDIFF(SECOND, recut_sewing_main.created_date, received_recut_sewing.date_received)) as time_difference_sewing
                FROM
                    recut_sewing_main
                    INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
                    LEFT JOIN master_item ON recut_sewing_main.id_master_item = master_item.id
                    LEFT JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
                    LEFT JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id
                    LEFT JOIN line ON recut_sewing_main.id_line = line.id_line
                    LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
                    LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
                    LEFT JOIN received_recut_sewing ON recut_sewing_main.id = received_recut_sewing.id_recut_sewing_main
                    INNER JOIN `master_order_icon_main` ON `master_order_icon_main`.orc = recut_sewing_main.orc
                 WHERE
                    DATE(recut_sewing_main.created_date) BETWEEN '$date_from' AND '$date_to'
                    AND `master_order_icon_main`.id_factory = $this->id_factory
                ORDER BY
                    recut_sewing_main.id DESC
              ";

  $query = $this->db->query($data);
  return $query->result();
 }
 // ==================================================================================================

}
