<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PpicModel extends CI_Model
{
  // Dashboard
  // ==================================================================================================
  protected $id_factory;
  function __construct()
  {
    parent::__construct();
    $this->id_factory = $this->session->userdata['id_factory'];
  }

  public function getDataTotalOrders()
  {
    $data = "SELECT
                IFNULL(SUM(qty), 0) as total_orders
              FROM
                `order`
              WHERE
                YEAR(tgl) = YEAR(CURRENT_DATE) AND
                id_factory = $this->id_factory
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataTotalCustomers()
  {
    $data = "SELECT
                buyer
              FROM
                `order`
              WHERE
                YEAR(tgl) = YEAR(CURRENT_DATE) AND
                id_factory = $this->id_factory
              GROUP BY
                buyer
              ";

    $query = $this->db->query($data);
    return $query->num_rows();
  }
  public function postDataMasterOrderIconMain($data_main)
  {
    $this->db->insert('master_order_icon_main', $data_main);
    return $this->db->insert_id();
  }
  public function postDataMasterOrderIconDetails($data_details)
  {
    $this->db->insert_batch('master_order_detail_icon', $data_details);
  }

  public function getDataMasterIcon($orc)
  {
    $data = "SELECT
              id_master_order_icon_main, 
              master_order_icon_main.orc
            FROM
              master_order_icon_main
            WHERE
              orc = '$orc'
              ";

    $query = $this->db->query($data);
    return $query->num_rows();
  }

  public function getDataCustomersAndTotalOrders()
  {
    $data = "SELECT
                buyer,
                SUM(qty) as total_orders
              FROM
                `order`
              WHERE
                YEAR(tgl) = YEAR(CURRENT_DATE) AND
                id_factory = $this->id_factory
              GROUP BY
                buyer
              ORDER BY
                SUM(qty) DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataTotalOrdersPerMonth()
  {
    $data = "SELECT
                MONTHNAME(tgl) as month,
                SUM(qty) as qty_orders
              FROM
                `order` 
              WHERE
                YEAR ( tgl ) = YEAR ( CURRENT_DATE ) AND
                id_factory = $this->id_factory
              GROUP BY 
                MONTH(tgl)
              ORDER BY
                MONTH(tgl) ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataTotalShipped()
  {
    $data = "SELECT
                IFNULL(SUM(qty_box), 0) as total_shipped
              FROM
                transfer_area
                INNER JOIN
                `order` ON transfer_area.orc = `order`.orc
              WHERE
                YEAR ( transfer_area.tgl_in ) = YEAR ( CURRENT_DATE )
                AND transfer_area.tgl_out IS NOT NULL
                AND `order`.id_factory = $this->id_factory
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  // public function getDataTotalShipped()
  // {
  //   $data = "SELECT
  //               SUM( qty_box ) AS total_shipped 
  //             FROM
  //               transfer_area
  //             WHERE
  //               YEAR ( transfer_area.tgl_out ) = YEAR ( CURRENT_DATE ) 
  //               AND transfer_area.tgl_out IS NOT NULL
  //             ";

  //   $query = $this->db->query($data);
  //   return $query->result();
  // }

  public function getDataTotalShippedDetails()
  {
    $data = "SELECT
                `order`.buyer,
                SUM( transfer_area.qty_box ) AS total_shipped 
              FROM
                transfer_area
                INNER JOIN `order` ON transfer_area.orc = `order`.orc 
              WHERE
                YEAR ( transfer_area.tgl_in ) = YEAR ( CURRENT_DATE ) 
                AND transfer_area.tgl_out IS NOT NULL
                AND `order`.id_factory = $this->id_factory
              GROUP BY
                `order`.buyer
              ORDER BY
                SUM( transfer_area.qty_box ) DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  // public function getDataTotalShippedDetails()
  // {
  //   $data = "SELECT
  //               `order`.buyer,
  //               SUM( transfer_area.qty_box ) AS total_shipped 
  //             FROM
  //               transfer_area
  //               INNER JOIN `order` ON transfer_area.orc = `order`.orc 
  //             WHERE
  //               YEAR ( transfer_area.tgl_out ) = YEAR ( CURRENT_DATE ) 
  //               AND transfer_area.tgl_out IS NOT NULL 
  //             GROUP BY
  //               `order`.buyer
  //             ORDER BY
  //               SUM( transfer_area.qty_box ) DESC
  //             ";

  //   $query = $this->db->query($data);
  //   return $query->result();
  // }


  public function getDataTotalShippedPerMonth()
  {
    $data = "SELECT
              MONTHNAME( transfer_area.tgl_in ) AS `month`,
              IFNULL(SUM( transfer_area.qty_box ), 0) AS qty_shipped 
            FROM
              transfer_area
              INNER JOIN `order` ON transfer_area.orc = `order`.orc 
            WHERE
              YEAR ( transfer_area.tgl_in ) = YEAR ( CURRENT_DATE ) 
              AND transfer_area.tgl_out IS NOT NULL
              AND `order`.id_factory = $this->id_factory
            GROUP BY
              MONTH ( transfer_area.tgl_in ) 
            ORDER BY
              MONTH ( transfer_area.tgl_in ) ASC 
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  // ==================================================================================================






  // Master Order
  // ==================================================================================================
  public function getDataMasterOrder()
  {
    $data = "SELECT
            id_order,
            tgl AS created_date,
            style,
            style_sam,
            orc,
            comm,
            buyer,
            so AS po_no,
            color,
            qty,
            etd,
            line_allocation1,
            line_allocation2,
            line_allocation3
           FROM
            `order`
           WHERE id_factory = $this->id_factory
           ORDER BY
            id_order DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataStyleSam()
  {
    $data = "SELECT
                style 
              FROM
                master_sam 
              WHERE
                style IS NOT NULL
                AND id_factory = $this->id_factory
              GROUP BY
                style 
              ORDER BY
                style ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataLine()
  {
    $data = "SELECT
            id_line,
            `name` 
           FROM
            line 
           WHERE
            `description` IS NOT NULL AND
            idFactory = $this->id_factory
           ORDER BY
            `name` ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function postDataNewOrder($data)
  {
    $this->db->insert('order', $data);
    return $this->db->insert_id();
  }

  public function updateDataOrder($id_order, $data)
  {
    $this->db->where(['id_order' => $id_order]);
    $this->db->update('order', $data);
  }

  public function deleteDataMasterOrder($id_order)
  {
    $this->db->where('id_order', $id_order);
    $this->db->delete('order');
  }
  // ==================================================================================================


  // Master Order (Add On)
  // ==================================================================================================
  public function getDataOrc_mysql()
  {
    $data = "SELECT orc FROM order_addon";
    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataMasterOrderAddOn()
  {
    $orc = $this->input->get('orc');
    if ($orc == '') {
      $data = "SELECT
                Customer_Master.discription AS buyer,
                PWN_PO_Details.Color_PO,
                FORMAT(PWN_PO_Details.CustReq_Del_Dt, 'yyyy-MM-dd') AS shipment,
                PWN_PO_Details.Cust_PO,
                PWN_PO_Details.article AS style,
                PWN_Main.wo_ameya AS pi_no,
                PWN_Main.productGroup_main AS orc,
                PWN_Main.Total_Quantity,
                Collection_Master.Code,
                FORMAT(PWN_Main.Pwn_CreatedDate, 'yyyy-MM-dd') CreatedDate
                FROM PWN_Main
                LEFT JOIN PWN_PO_Details
                ON PWN_Main.Seq_code = PWN_PO_Details.PWN_Seq_Code
                LEFT JOIN Customer_Master
                ON PWN_Main.Cust_Seq_Code = Customer_Master.seq_code
                LEFT JOIN Collection_Master
                ON PWN_Main.Seq_code = Collection_Master.Seq_code
                WHERE YEAR(PWN_Main.Pwn_CreatedDate) = 2023
                AND MONTH(PWN_Main.Pwn_CreatedDate) >= 11
                ORDER BY FORMAT(PWN_PO_Details.CustReq_Del_Dt, 'yyyy-MM-dd') desc";
      $query = $this->load->database('default2', TRUE)->query($data);
      return $query->result();
    } else {
      $data = "SELECT
                Customer_Master.discription AS buyer,
                PWN_PO_Details.Color_PO,
                FORMAT(PWN_PO_Details.CustReq_Del_Dt, 'yyyy-MM-dd') AS shipment,
                PWN_PO_Details.Cust_PO,
                PWN_PO_Details.article AS style,
                PWN_Main.wo_ameya AS pi_no,
                PWN_Main.productGroup_main AS orc,
                PWN_Main.Total_Quantity,
                Collection_Master.Code,
                FORMAT(PWN_Main.Pwn_CreatedDate, 'yyyy-MM-dd') CreatedDate
                FROM PWN_Main
                LEFT JOIN PWN_PO_Details
                ON PWN_Main.Seq_code = PWN_PO_Details.PWN_Seq_Code
                LEFT JOIN Customer_Master
                ON PWN_Main.Cust_Seq_Code = Customer_Master.seq_code
                LEFT JOIN Collection_Master
                ON PWN_Main.Seq_code = Collection_Master.Seq_code
                WHERE YEAR(PWN_Main.Pwn_CreatedDate) = 2023
                AND MONTH(PWN_Main.Pwn_CreatedDate) >= 11
                AND REPLACE(PWN_Main.productGroup_main, ' ', '') NOT IN ($orc)
                ORDER BY FORMAT(PWN_PO_Details.CustReq_Del_Dt, 'yyyy-MM-dd') desc";
      $query = $this->load->database('default2', TRUE)->query($data);
      return $query->result();
    }
  }

  public function postDataAppendSelected($items)
  {
    foreach ($items as $itemss) {
      $this->db->insert('order_addon', $itemss);
    }
  }

  public function getDataAll3($orc)
  {
    $data = "SELECT
        PWN_Main.productGroup_main AS orc,
        Size_Master.Discription AS size,
        PWN_PO_Details_Size.Internal_Qty AS qty
        FROM PWN_Main
        INNER JOIN PWN_PO_Details
        ON PWN_Main.Seq_code = PWN_PO_Details.PWN_Seq_Code
        INNER JOIN PWN_PO_Details_Size
        ON PWN_PO_Details.Seq_code = PWN_PO_Details_Size.PWN_PO_Details_Seq_Code
        INNER JOIN Size_Master
        ON PWN_PO_Details_Size.Size_Seq_code = Size_Master.Seq_code
        WHERE PWN_Main.productGroup_main = '$orc'";
    $query = $this->load->database('default2', TRUE)->query($data);
    return $query->result();
  }

  public function appendDataSelectedDetail($datax)
  {
    foreach ($datax as $dataxx) {
      $this->db->insert('order_detail_addon', $dataxx);
    }
  }


  // ==================================================================================================


  // Order Allocation
  // ==================================================================================================
  public function getDataOrder()
  {
    $data = "SELECT 
              `order`.id_order, 
              `order`.style, 
              `order`.orc, 
              `order`.color, 
              `order`.buyer, 
              `order`.qty AS qty_order,
              planning.qty_allocated,
              `order`.qty - IFNULL(planning.qty_allocated,0) as stock_order,
              `order`.line_allocation1, 
              `order`.plan_export AS etd, 
              `order`.`status`
            FROM 
              `order` 
              LEFT JOIN (
                SELECT 
                  id_order, 
                  SUM(qty_line) AS qty_allocated 
                FROM 
                  planning 
                GROUP BY 
                  id_order
              ) as planning ON `order`.id_order = planning.id_order 
            WHERE 
              `status` = 'On Progress'
              AND `order`.id_factory = $this->id_factory
            ORDER BY 
              `order`.plan_export ASC
  
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataCheckIdOrder($id_order)
  {
    $data = "SELECT
                id_order 
              FROM
                planning
              WHERE
                id_order = $id_order
              ";

    $query = $this->db->query($data);
    return $query->num_rows();
  }

  public function getDataStockOrder($id_order)
  {
    $data = "SELECT 
                id_order,
                IFNULL(SUM(qty_line) ,0) as qty_allocated
              FROM
                planning
              WHERE id_order = $id_order
              GROUP BY
                id_order
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataPlanning($id_order)
  {
    $data = "SELECT
              id,
              planning.created_date,
              line.`name` AS line,
              planning.qty_line AS qty_allocation,
              planning.target_output_per_day,
              DATE(planning.eta_mat_date) as eta_mat_date,
              DATE(planning.start_date) as start_date,
              DATE(planning.end_date) as end_date,
              planning.remarks
            FROM
              planning
              INNER JOIN line ON planning.id_line = line.id_line 
            WHERE
              planning.id_order = $id_order 
            ORDER BY
              planning.created_date DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataMaxDate($id_line)
  {
    $data = "SELECT
                MAX(end_date) as max_date
              FROM
                planning
              WHERE 
                id_line = $id_line
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function postDataPlanning($data)
  {
    $this->db->insert('planning', $data);
    return $this->db->insert_id();
  }

  public function updateDataPlanning($id_planning, $data)
  {
    $this->db->where(['id' => $id_planning]);
    $this->db->update('planning', $data);
  }

  public function deleteDataPlanning($id_planning)
  {
    $this->db->where('id', $id_planning);
    $this->db->delete('planning');
  }

  // ==================================================================================================


  // Production Planning
  // ==================================================================================================
  public function getDataLineFilter()
  {
    $data = "SELECT 
                planning.id_line,
                line.`name`
              FROM
                planning
                INNER JOIN line ON planning.id_line = line.id_line
              GROUP BY
                id_line
              ORDER BY
                `name` ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }


  public function getDataPlanningProduction()
  {
    $data = "SELECT
                `order`.id_order,
                `order`.style,
                `order`.orc,
                `order`.color,
                line.`name` AS line,
                line.description AS line_code,
                planning.qty_line,
                planning.target_output_per_day,
                sub_query_get_qty.qty_sewing_total,
                ( planning.qty_line - sub_query_get_qty.qty_sewing_total ) AS balance,
                DATE( planning.eta_mat_date ) AS eta_mat_date,
                DATE( planning.start_date ) AS start_date,
                DATE( planning.end_date ) AS end_date,
                `order`.plan_export as etd,
                planning.remarks 
              FROM
                `order`
                INNER JOIN planning ON `order`.id_order = planning.id_order
                INNER JOIN line ON planning.id_line = line.id_line
                LEFT JOIN (
                SELECT
                  `order`.orc,
                  planning.id,
                  SUM( output_sewing_detail.qty ) AS qty_sewing_total 
                FROM
                  `order`
                  INNER JOIN planning ON `order`.id_order = planning.id_order
                  LEFT JOIN output_sewing_detail ON `order`.orc = output_sewing_detail.orc 
                WHERE
                  DATE( planning.start_date ) <= output_sewing_detail.tgl_ass 
                  AND output_sewing_detail.tgl_ass <= DATE( planning.end_date )
                  AND `order`.id_factory = $this->id_factory
                GROUP BY
                  `order`.orc,
                  planning.id 
                ) AS sub_query_get_qty ON planning.id = sub_query_get_qty.id
              WHERE
                `order`.id_factory = $this->id_factory
              ORDER BY
                line.description ASC,
                planning.start_date ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getdataPlanningProductionFilterByLine($id_line)
  {
    $data = "SELECT
              `order`.id_order,
              `order`.style,
              `order`.orc,
              `order`.color,
              line.`name` AS line,
              line.description AS line_code,
              planning.qty_line,
              planning.target_output_per_day,
              sub_query_get_qty.qty_sewing_total,
              ( planning.qty_line - sub_query_get_qty.qty_sewing_total ) AS balance,
              DATE( planning.eta_mat_date ) AS eta_mat_date,
              DATE( planning.start_date ) AS start_date,
              DATE( planning.end_date ) AS end_date,
              `order`.plan_export as etd,
              planning.remarks 
            FROM
              `order`
              INNER JOIN planning ON `order`.id_order = planning.id_order
              INNER JOIN line ON planning.id_line = line.id_line
              LEFT JOIN (
              SELECT
                `order`.orc,
                planning.id,
                SUM( output_sewing_detail.qty ) AS qty_sewing_total 
              FROM
                `order`
                INNER JOIN planning ON `order`.id_order = planning.id_order
                LEFT JOIN output_sewing_detail ON `order`.orc = output_sewing_detail.orc 
              WHERE
                DATE( planning.start_date ) <= output_sewing_detail.tgl_ass 
                AND output_sewing_detail.tgl_ass <= DATE( planning.end_date )
                AND `order`.id_factory = $this->id_factory
              GROUP BY
                `order`.orc,
                planning.id 
              ) AS sub_query_get_qty ON planning.id = sub_query_get_qty.id 
            WHERE 
              planning.id_line = $id_line
              AND `order`.id_factory = $this->id_factory
            ORDER BY
              line.description ASC,
              planning.start_date ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputSewingDetails($orc)
  {
    $data = "SELECT
              orc,
              tgl_ass,
              SUM( qty ) AS qty_output_sewing 
            FROM
              output_sewing_detail 
            WHERE
              orc = '$orc' 
            GROUP BY
              orc,
              tgl_ass
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  // ==================================================================================================




  // Production Report
  // ==================================================================================================
  public function getDataReportPlanningProduction()
  {
    $data = "SELECT
              `order`.id_order,
              `order`.style,
              `order`.orc,
              `order`.etd,
              `order`.plan_export,
              `order`.color,
              `order`.qty,
              IFNULL( SUM( input_sewing.qty_pcs ), '' ) AS output_cutting,
              IFNULL( output_sewing_sub_query.qty, '' ) AS output_sewing,
              IFNULL( output_packing_sub_query.qty, '' ) AS output_packing,
              IFNULL( transfer_area_sub_query.qty, '' ) AS transfer_area 
            FROM
              `order`
              LEFT JOIN input_sewing ON input_sewing.orc = `order`.orc
              INNER JOIN planning ON `order`.id_order = planning.id_order
              LEFT JOIN (
              SELECT
                output_sewing_detail.orc,
                SUM( output_sewing_detail.qty ) AS qty 
              FROM
                output_sewing_detail
                INNER JOIN `order` ON `order`.orc = output_sewing_detail.orc 
              WHERE
                `order`.`status` = 'On Progress'
                AND `order`.id_factory = $this->id_factory
              GROUP BY
                output_sewing_detail.orc 
              ) AS output_sewing_sub_query ON `order`.orc = output_sewing_sub_query.orc
              LEFT JOIN (
              SELECT
                output_packing.orc,
                SUM( output_packing_detail.qty ) AS qty 
              FROM
                output_packing
                INNER JOIN output_packing_detail ON output_packing.id_output_packing = output_packing_detail.id_output_packing
                INNER JOIN `order` ON `order`.orc = output_packing.orc 
              WHERE
                `order`.`status` = 'On Progress'
                AND `order`.id_factory = $this->id_factory
              GROUP BY
                output_packing.orc 
              ) AS output_packing_sub_query ON `order`.orc = output_packing_sub_query.orc
              LEFT JOIN (
              SELECT
                transfer_area.orc,
                SUM( transfer_area.qty_box ) AS qty 
              FROM
                `transfer_area`
                INNER JOIN `order` ON `order`.orc = transfer_area.orc 
              WHERE
                transfer_area.tgl_out IS NOT NULL 
                AND `order`.`status` = 'On Progress' 
              GROUP BY
                transfer_area.orc 
              ) AS transfer_area_sub_query ON `order`.orc = transfer_area_sub_query.orc 
            WHERE
              YEAR ( `order`.etd ) > 2022
              AND `order`.id_factory = $this->id_factory
            GROUP BY
              `order`.id_order,
              `order`.style,
              `order`.orc,
              `order`.etd,
              `order`.plan_export,
              `order`.color,
              `order`.qty 
            ORDER BY
              `order`.etd ASC
            ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputCuttingSizeDetails($orc)
  {
    $data = "SELECT
              orc,
              size,
              SUM(qty_pcs) as qty_sum_per_size
            FROM
              input_sewing 
            WHERE
              orc = '$orc' 
            GROUP BY
              orc,
              size
            ORDER BY
              size ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputSewingSizeDetails($orc)
  {
    $data = "SELECT
                orc,
                size,
                SUM( qty ) AS qty_sum_per_size 
              FROM
                output_sewing_detail 
              WHERE
                orc = '$orc' 
              GROUP BY
                orc,
                size 
              ORDER BY
                size ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputPackingSizeDetails($orc)
  {
    $data = "SELECT
              output_packing.orc,
              output_packing_detail.size,
              SUM( output_packing_detail.qty ) AS qty_sum_per_size 
            FROM
              output_packing
              INNER JOIN output_packing_detail ON output_packing.id_output_packing = output_packing_detail.id_output_packing 
            WHERE
              output_packing.orc = '$orc' 
            GROUP BY
              output_packing.orc,
              output_packing_detail.size 
            ORDER BY
              output_packing_detail.size ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataTransferAreaSizeDetails($orc)
  {
    $data = "SELECT
                orc,
                size,
                SUM( qty_box ) AS qty_sum_per_size 
              FROM
                transfer_area 
              WHERE
                orc = '$orc' 
                AND tgl_out IS NOT NULL 
              GROUP BY
                orc,
                size 
              ORDER BY
                size ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputAllDeptSizeDetails($orc)
  {
    $data = "SELECT 
                `order`.orc, 
                output_cutting_sub_query.size, 
                output_cutting_sub_query.qty_sum_per_size as output_cutting, 
                output_sewing_sub_query.qty_sum_per_size as output_sewing, 
                output_packing_sub_query.qty_sum_per_size as output_packing,
                transfer_area_sub_query.qty_sum_per_size as transfer_area
              FROM 
                `order` 
                LEFT JOIN (
                  SELECT 
                    orc, 
                    size, 
                    SUM(qty_pcs) AS qty_sum_per_size 
                  FROM 
                    input_sewing 
                  WHERE 
                    orc = '$orc' 
                  GROUP BY 
                    orc, 
                    size
                ) as output_cutting_sub_query ON `order`.orc = output_cutting_sub_query.orc 
                LEFT JOIN (
                  SELECT 
                    orc, 
                    size, 
                    SUM(qty) AS qty_sum_per_size 
                  FROM 
                    output_sewing_detail 
                  WHERE 
                    orc = '$orc' 
                  GROUP BY 
                    orc, 
                    size
                ) as output_sewing_sub_query ON output_cutting_sub_query.orc = output_sewing_sub_query.orc 
                AND output_cutting_sub_query.size = output_sewing_sub_query.size 
                LEFT JOIN (
                  SELECT 
                    output_packing.orc, 
                    output_packing_detail.size, 
                    SUM(output_packing_detail.qty) AS qty_sum_per_size 
                  FROM 
                    output_packing 
                    INNER JOIN output_packing_detail ON output_packing.id_output_packing = output_packing_detail.id_output_packing 
                  WHERE 
                    output_packing.orc = '$orc' 
                  GROUP BY 
                    output_packing.orc, 
                    output_packing_detail.size
                ) as output_packing_sub_query ON output_cutting_sub_query.orc = output_packing_sub_query.orc 
                AND output_cutting_sub_query.size = output_packing_sub_query.size 
                LEFT JOIN (
                  SELECT 
                    orc, 
                    size, 
                    SUM( qty_box ) AS qty_sum_per_size 
                  FROM 
                    transfer_area 
                  WHERE 
                    orc = '$orc' 
                    AND tgl_out IS NOT NULL 
                  GROUP BY 
                    orc, 
                    size
                ) as transfer_area_sub_query ON output_cutting_sub_query.orc = transfer_area_sub_query.orc 
                AND output_cutting_sub_query.size = transfer_area_sub_query.size 
              WHERE 
                `order`.orc = '$orc' AND `order`.id_factory = $this->id_factory
              ORDER BY 
                output_cutting_sub_query.size ASC
  
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  // ==================================================================================================



  // Production Report (New)
  // ==================================================================================================
  public function getDataNewReportPlanningProduction()
  {
    $data = "SELECT
              `order`.id_order,
              `order`.style,
              `order`.orc,
              `order`.etd,
              `order`.plan_export,
              `order`.color,
              `order`.qty,
              IFNULL( SUM( input_sewing.qty_pcs ), '' ) AS output_cutting,
              IFNULL( output_sewing_sub_query.qty, '' ) AS output_sewing,
              IFNULL( output_packing_sub_query.qty, '' ) AS output_packing,
              IFNULL( transfer_area_sub_query.qty, '' ) AS transfer_area 
            FROM
              `order`
              LEFT JOIN input_sewing ON input_sewing.orc = `order`.orc
              LEFT JOIN planning ON `order`.id_order = planning.id_order
              LEFT JOIN (
              SELECT
                output_sewing_detail.orc,
                SUM( output_sewing_detail.qty ) AS qty 
              FROM
                output_sewing_detail
                INNER JOIN `order` ON `order`.orc = output_sewing_detail.orc 
              WHERE
                `order`.`status` = 'On Progress' 
              GROUP BY
                output_sewing_detail.orc 
              ) AS output_sewing_sub_query ON `order`.orc = output_sewing_sub_query.orc
              LEFT JOIN (
              SELECT
                input_packing.orc,
                SUM( input_packing.qty ) AS qty 
              FROM
                input_packing
                INNER JOIN `order` ON `order`.orc = input_packing.orc 
              WHERE
                `order`.`status` = 'On Progress' 
              GROUP BY
                input_packing.orc 
              ) AS output_packing_sub_query ON `order`.orc = output_packing_sub_query.orc
              LEFT JOIN (
              SELECT
                transfer_area.orc,
                SUM( transfer_area.qty_box ) AS qty 
              FROM
                `transfer_area`
                INNER JOIN `order` ON `order`.orc = transfer_area.orc 
              WHERE
                transfer_area.tgl_out IS NOT NULL 
                AND `order`.`status` = 'On Progress' 
              GROUP BY
                transfer_area.orc 
              ) AS transfer_area_sub_query ON `order`.orc = transfer_area_sub_query.orc 
            WHERE
              YEAR ( `order`.etd ) > 2022 
            GROUP BY
              `order`.id_order,
              `order`.style,
              `order`.orc,
              `order`.etd,
              `order`.plan_export,
              `order`.color,
              `order`.qty 
            ORDER BY
              `order`.etd ASC
            ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataNewOutputPackingSizeDetails($orc)
  {
    $data = "SELECT
              orc,
              size,
              SUM( qty ) AS qty_sum_per_size 
            FROM
              input_packing 
            WHERE
              orc = '$orc' 
            GROUP BY
              orc,
              size
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataNewOutputAllDeptSizeDetails($orc)
  {
    $data = "SELECT 
                `order`.orc, 
                output_cutting_sub_query.size, 
                output_cutting_sub_query.qty_sum_per_size as output_cutting, 
                output_sewing_sub_query.qty_sum_per_size as output_sewing, 
                output_packing_sub_query.qty_sum_per_size as output_packing,
                transfer_area_sub_query.qty_sum_per_size as transfer_area
              FROM 
                `order` 
                LEFT JOIN (
                  SELECT 
                    orc, 
                    size, 
                    SUM(qty_pcs) AS qty_sum_per_size 
                  FROM 
                    input_sewing 
                  WHERE 
                    orc = '$orc' 
                  GROUP BY 
                    orc, 
                    size
                ) as output_cutting_sub_query ON `order`.orc = output_cutting_sub_query.orc 
                LEFT JOIN (
                  SELECT 
                    orc, 
                    size, 
                    SUM(qty) AS qty_sum_per_size 
                  FROM 
                    output_sewing_detail 
                  WHERE 
                    orc = '$orc' 
                  GROUP BY 
                    orc, 
                    size
                ) as output_sewing_sub_query ON output_cutting_sub_query.orc = output_sewing_sub_query.orc 
                AND output_cutting_sub_query.size = output_sewing_sub_query.size 
                LEFT JOIN (
                  SELECT
                    orc,
                    size,
                    SUM( qty ) AS qty_sum_per_size 
                  FROM
                    input_packing 
                  WHERE
                    orc = '$orc' 
                  GROUP BY
                    orc,
                    size
                ) as output_packing_sub_query ON output_cutting_sub_query.orc = output_packing_sub_query.orc 
                AND output_cutting_sub_query.size = output_packing_sub_query.size 
                LEFT JOIN (
                  SELECT 
                    orc, 
                    size, 
                    SUM( qty_box ) AS qty_sum_per_size 
                  FROM 
                    transfer_area 
                  WHERE 
                    orc = '$orc' 
                    AND tgl_out IS NOT NULL 
                  GROUP BY 
                    orc, 
                    size
                ) as transfer_area_sub_query ON output_cutting_sub_query.orc = transfer_area_sub_query.orc 
                AND output_cutting_sub_query.size = transfer_area_sub_query.size 
              WHERE 
                `order`.orc = '$orc' 
              ORDER BY 
                output_cutting_sub_query.size ASC
  
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataSummaryProdGlobal()
  {
    $data = "SELECT * FROM rt_production_report WHERE id_factory = $this->id_factory";

    $query = $this->db->query($data);
    return $query->result();
  }
  // ==================================================================================================
}
