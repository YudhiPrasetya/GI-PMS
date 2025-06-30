<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MoldingModel extends CI_Model
{
  protected $id_factory;

  public function __construct()
  {
    parent::__construct();
    $this->id_factory = $this->session->userdata('id_factory');
  }
  // Dashboard
  // ==================================================================================================
  public function getDataTotalInputMolding()
  {
    $data = "SELECT
                IFNULL(SUM( input_molding_detail.qty_pcs ),0) AS total_input_molding 
              FROM
                input_molding
                INNER JOIN input_molding_detail ON input_molding.id_input_molding = input_molding_detail.id_input_molding
                INNER JOIN `order` ON `order`.orc = input_molding.orc
              WHERE
                DATE(input_molding.tgl) = CURRENT_DATE ()
                AND `order`.id_factory = $this->id_factory
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataTotalOutputMolding()
  {
    $data = "SELECT
                IFNULL(SUM(qty_outermold),0) as outermold,
                IFNULL(SUM(qty_midmold),0) as midmold,
                IFNULL(SUM(qty_linningmold),0) as linningmold
              FROM
                output_molding
                INNER JOIN output_molding_detail ON output_molding.id_output_molding = output_molding_detail.id_output_molding
                INNER JOIN `order` ON `order`.orc = output_molding.orc
              WHERE
                DATE(output_molding.tgl) = CURRENT_DATE ()
                AND `order`.id_factory = $this->id_factory
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataInputMoldingChart()
  {
    $data = "WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                date_range.tgl,
                IFNULL( input_molding_sub_query.qty_in, 0 ) AS qty_in_molding 
                FROM
                  date_range
                  LEFT JOIN (
                  SELECT
                    input_molding.tgl,
                    SUM( input_molding_detail.qty_pcs ) AS qty_in 
                  FROM
                    input_molding
                    INNER JOIN input_molding_detail ON input_molding.id_input_molding = input_molding_detail.id_input_molding
                    INNER JOIN `order` ON `order`.orc = input_molding.orc
                  WHERE
                    DATE ( input_molding.tgl ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                    AND CURRENT_DATE ()
                    AND `order`.id_factory = $this->id_factory
                  GROUP BY
                    input_molding.tgl 
                  ) AS input_molding_sub_query ON input_molding_sub_query.tgl = date_range.tgl 
                ORDER BY
                  date_range.tgl ASC
                ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputMoldingChart()
  {
    $data = "WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
              date_range.tgl,
              IFNULL( output_molding_sub_query.total_output_molding, 0 ) AS qty_out_molding 
              FROM
                date_range
                LEFT JOIN (
                SELECT
                  DATE( output_molding.tgl ) AS tgl,
                  (
                  IFNULL( SUM( qty_outermold ), 0 ) + IFNULL( SUM( qty_midmold ), 0 ) + IFNULL( SUM( qty_linningmold ), 0 )) AS total_output_molding 
                FROM
                  output_molding
                  INNER JOIN `order` ON `order`.orc = output_molding.orc
                  INNER JOIN output_molding_detail ON output_molding.id_output_molding = output_molding_detail.id_output_molding 
                WHERE
                  DATE ( output_molding.tgl ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 7 DAY ) 
                  AND CURRENT_DATE () 
                  AND `order`.id_factory = $this->id_factory
                GROUP BY
                  DATE( output_molding.tgl ) 
                ) AS output_molding_sub_query ON output_molding_sub_query.tgl = date_range.tgl 
              ORDER BY
                date_range.tgl ASC
                  ";

    $query = $this->db->query($data);
    return $query->result();
  }
  // ==================================================================================================




  // Input Molding
  // ==================================================================================================
  public function getDataInputMolding()
  {
    $data = "SELECT
                input_molding.id_input_molding,
                input_molding.tgl,
                input_molding.orc,
                input_molding.style,
                input_molding.color,
                input_molding_detail.size,
                input_molding_detail.group_size,
                input_molding_detail.no_bundle,
                input_molding_detail.qty_pcs,
                input_molding_detail.outermold_barcode,
                input_molding_detail.midmold_barcode,
                input_molding_detail.linningmold_barcode,
                input_molding_detail.outermold_sam,
                input_molding_detail.mildmold_sam,
                input_molding_detail.linningmold_sam 
              FROM
                input_molding
                JOIN input_molding_detail ON input_molding_detail.id_input_molding = input_molding.id_input_molding
                INNER JOIN `order` ON `order`.orc = input_molding.orc
              WHERE
                DATE(input_molding.tgl)  = CURRENT_DATE()
                AND `order`.id_factory = $this->id_factory
              ORDER BY
                input_molding_detail.id_input_molding_detail DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataInputMoldingYesterday()
  {
    $data = "SELECT
                input_molding.id_input_molding,
                input_molding.tgl,
                input_molding.orc,
                input_molding.style,
                input_molding.color,
                input_molding_detail.size,
                input_molding_detail.group_size,
                input_molding_detail.no_bundle,
                input_molding_detail.qty_pcs,
                input_molding_detail.outermold_barcode,
                input_molding_detail.midmold_barcode,
                input_molding_detail.linningmold_barcode,
                input_molding_detail.outermold_sam,
                input_molding_detail.mildmold_sam,
                input_molding_detail.linningmold_sam 
              FROM
                input_molding
                JOIN input_molding_detail ON input_molding_detail.id_input_molding = input_molding.id_input_molding
                INNER JOIN `order` ON `order`.orc = input_molding.orc
              WHERE
                DATE(tgl)  =  CURDATE() - INTERVAL 1 DAY
                AND `order`.id_factory = $this->id_factory
              ORDER BY
                input_molding_detail.id_input_molding_detail DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataInputMolding30DaysAgo()
  {
    $data = "SELECT
                input_molding.id_input_molding,
                input_molding.tgl,
                input_molding.orc,
                input_molding.style,
                input_molding.color,
                input_molding_detail.size,
                input_molding_detail.group_size,
                input_molding_detail.no_bundle,
                input_molding_detail.qty_pcs,
                input_molding_detail.outermold_barcode,
                input_molding_detail.midmold_barcode,
                input_molding_detail.linningmold_barcode,
                input_molding_detail.outermold_sam,
                input_molding_detail.mildmold_sam,
                input_molding_detail.linningmold_sam 
              FROM
                input_molding
                JOIN input_molding_detail ON input_molding_detail.id_input_molding = input_molding.id_input_molding
                INNER JOIN `order` ON `order`.orc = input_molding.orc
              WHERE
                input_molding.tgl BETWEEN DATE_SUB( NOW(), INTERVAL 30 DAY ) 
                AND NOW()
                AND `order`.id_factory = $this->id_factory
              ORDER BY
                input_molding_detail.id_input_molding_detail DESC
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
                YEAR(tgl) = YEAR(CURRENT_DATE)
                AND id_factory = $this->id_factory
              GROUP BY
                buyer
              ";

    $query = $this->db->query($data);
    return $query->num_rows();
  }

  public function check_barcode_mold($barcode)
  {
    $prefix = substr($barcode, 0, 1);

    $rst = $this->db->get_where('cutting_detail', array(($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $barcode));
    return $rst->num_rows();
    // return $this->db->last_query();
    // return $prefix;
  }

  public function check_barcode_mold_input_molding_detail($barcode)
  {
    $prefix = substr($barcode, 0, 1);

    $rst = $this->db->get_where('input_molding_detail', array(($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $barcode));
    // return $this->db->last_query();
    return $rst->num_rows();
  }

  public function get_by_barcode_mold($code)
  {
    $prefix = substr($code, 0, 1);
    $rst = $this->db->get_where('viewcutting', array(($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $code));
    return $rst->row();
  }

  public function cek_by_orc_nobundle1($orc, $noBundle)
  {

    $this->db->where('orc', $orc);
    $this->db->where('no_bundle', $noBundle);
    $rst = $this->db->get('viewinputmolding1');

    return $rst->num_rows();
    // return $this->db->last_query();
  }

  public function save1($d)
  {
    $data = array(
      'tgl' => date('Y-m-d'),
      'orc' => $d->orc,
      'style' => $d->style,
      'color' => $d->color
    );

    $this->db->insert('input_molding', $data);

    return $this->db->insert_id();
  }

  public function get_by_size1($size)
  {
    $r = $this->db->get_where('master_size', array('size' => $size));

    return $r->row();
  }

  public function get_sam1($dataForSAM)
  {
    $style = $dataForSAM['style'];
    $color = $dataForSAM['color'];
    $group_size = $dataForSAM['group_size'];

    $sql = "SELECT * FROM master_sam WHERE '$style' LIKE CONCAT('%', style, '%') AND color='$color' AND grup_size='$group_size'";

    // $result = $this->db->get($this->table);
    $result = $this->db->query($sql);

    return $result->row();
  }

  public function save_mold1($data)
  {

    $this->db->insert('input_molding_detail', $data);

    return $this->db->affected_rows();
  }

  public function get_by_orc_nobundle($data)
  {
    // $rst = $this->db->get_where($this->table, array("orc" => $orc));
    // $dataStr = $_POST['dataStr'];
    $orc = $data['orc'];
    $noBundle = $data['no_bundle'];

    $this->db->where('orc', $orc);
    $this->db->where('no_bundle', $noBundle);
    $rst = $this->db->get('viewinputmolding1');

    return $rst->row();
  }

  public function update_mold1($dt)
  {
    // var_dump($dt);
    // exit();
    $id = $dt['id_input_molding'];
    $noBundle = $dt['no_bundle'];

    // if($dt['outermold_barcode']  != null){
    //     $data = array(
    //         'outermold_sam' => $dt['outermold_sam'],
    //         'outermold_barcode' => $dt['outermold_barcode']
    //     );
    // }else if($dt['midmold_barcode'] != null){
    //     $data = array(
    //         'mildmold_sam' => $dt['mildmold_sam'],
    //         'midmold_barcode' => $dt['midmold_barcode']
    //     );
    // }else if($dt['linningmold_barcode'] != null){
    //     $data = array(
    //         'linningmold_sam' => $dt['linningmold_sam'],
    //         'linningmold_barcode' => $dt['linningmold_barcode']
    //     );            
    // }

    if (array_key_exists('outermold_barcode', $dt)) {
      $data = array(
        'outermold_sam' => $dt['outermold_sam'],
        'outermold_barcode' => $dt['outermold_barcode']
      );
    }
    if (array_key_exists('midmold_barcode', $dt)) {
      $data = array(
        'mildmold_sam' => $dt['mildmold_sam'],
        'midmold_barcode' => $dt['midmold_barcode']
      );
    }
    if (array_key_exists('linningmold_barcode', $dt)) {
      $data = array(
        'linningmold_sam' => $dt['linningmold_sam'],
        'linningmold_barcode' => $dt['linningmold_barcode']
      );
    }

    // $this->db->insert($this->table, $data);
    $this->db->where("id_input_molding", $id);
    $this->db->where("no_bundle", $noBundle);
    $this->db->update('input_molding_detail', $data);

    // return $this->db->last_query();
    // print_r($this->db->last_query());

    return $this->db->affected_rows();
  }
  // ==================================================================================================





  // Output Molding
  // ==================================================================================================
  public function get_shift()
  {
    date_default_timezone_set('Asia/Jakarta');

    $curTime = date('H:i:s');

    $day = date('w');

    $this->db->where('day', $day);
    $this->db->where('DATE_FORMAT(start, "%H:%i:%s") <= ', $curTime);
    $this->db->where('DATE_FORMAT(end, "%H:%i:%s") >= ', $curTime);
    // $this->db->query('SELECT * FROM shift_molding where day=' . $day . ' AND CURRENT_TIME >= DATE_FORMAT(start,"%H:%i:%s") AND CURRENT_TIME <= DATE_FORMAT(end,"%H:%i:%s");');
    $rst = $this->db->get('shift_molding');

    // return $this->db->last_query();

    return $rst->row();
  }

  public function getDataOutputMolding()
  {
    $data = "SELECT
                output_molding.id_output_molding,
                output_molding.shift,
                output_molding.no_mesin,
                output_molding.tgl,
                cast( output_molding.tgl AS date ) AS tanggal,
                output_molding.orc,
                output_molding.style,
                output_molding.color,
                output_molding_detail.size,
                output_molding_detail.no_bundle,
                output_molding_detail.qty_outermold,
                output_molding_detail.qty_midmold,
                output_molding_detail.qty_linningmold,
                output_molding_detail.outermold_sam_result,
                output_molding_detail.midmold_sam_result,
                output_molding_detail.linningmold_sam_result 
              FROM
                output_molding
                LEFT JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding
                INNER JOIN `order` ON `order`.orc = output_molding.orc
              WHERE
                DATE( output_molding.tgl ) =  CURRENT_DATE()
                AND `order`.id_factory = $this->id_factory
              ORDER BY
                output_molding.id_output_molding DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputMoldingYesterday()
  {
    $data = "SELECT
                output_molding.id_output_molding,
                output_molding.shift,
                output_molding.no_mesin,
                output_molding.tgl,
                cast( output_molding.tgl AS date ) AS tanggal,
                output_molding.orc,
                output_molding.style,
                output_molding.color,
                output_molding_detail.size,
                output_molding_detail.no_bundle,
                output_molding_detail.qty_outermold,
                output_molding_detail.qty_midmold,
                output_molding_detail.qty_linningmold,
                output_molding_detail.outermold_sam_result,
                output_molding_detail.midmold_sam_result,
                output_molding_detail.linningmold_sam_result 
              FROM
                output_molding
                LEFT JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding
                INNER JOIN `order` ON `order`.orc = output_molding.orc
              WHERE
                DATE( output_molding.tgl ) =  CURDATE() - INTERVAL 1 DAY
                AND `order`.id_factory = $this->id_factory
              ORDER BY
                output_molding.id_output_molding DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputMolding30DaysAgo()
  {
    $data = "SELECT
                output_molding.id_output_molding,
                output_molding.shift,
                output_molding.no_mesin,
                output_molding.tgl,
                cast( output_molding.tgl AS date ) AS tanggal,
                output_molding.orc,
                output_molding.style,
                output_molding.color,
                output_molding_detail.size,
                output_molding_detail.no_bundle,
                output_molding_detail.qty_outermold,
                output_molding_detail.qty_midmold,
                output_molding_detail.qty_linningmold,
                output_molding_detail.outermold_sam_result,
                output_molding_detail.midmold_sam_result,
                output_molding_detail.linningmold_sam_result 
              FROM
                output_molding
                LEFT JOIN output_molding_detail ON output_molding_detail.id_output_molding = output_molding.id_output_molding
                INNER JOIN `order` ON `order`.orc = output_molding.orc
              WHERE
                output_molding.tgl BETWEEN DATE_SUB( NOW(), INTERVAL 30 DAY ) 
                AND NOW()
                AND `order`.id_factory = $this->id_factory
              ORDER BY
                output_molding.id_output_molding DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function get_by_barcode($barcode)
  {
    $rst = $this->db->get_where('master_mesin_molding', array('barcode' => $barcode));
    return $rst->row();
  }

  public function get_by_outermold_barcode($code)
  {
    // $rst = $this->db->get_where($this->table, array('outer' => $code));
    $this->db->like('outer', $code);
    if ($this->id_factory == 1) {
      $rst = $this->db->get('viewinputmolding1');
    } else if ($this->id_factory == 2) {
      $rst = $this->db->get('viewinputmolding2');
    }

    return $rst->row();
    // return $this->db->last_query();
  }



  public function get_by_midmold_barcode($code)
  {
    if ($this->id_factory == 1) {
      $rst = $this->db->get_where('viewinputmolding1', array('mid' => $code));
    } else if ($this->id_factory == 2) {
      $rst = $this->db->get_where('viewinputmolding2', array('mid' => $code));
    }

    return $rst->row();
  }

  public function get_by_linningmold_barcode($code)
  {

    if ($this->id_factory == 1) {
      $rst = $this->db->get_where('viewinputmolding1', array('linning' => $code));
    } else if ($this->id_factory == 2) {
      $rst = $this->db->get_where('viewinputmolding2', array('linning' => $code));
    }
    return $rst->row();
  }

  public function check_by_barcode_outer($code)
  {
    $rst = $this->db->get_where('output_molding_detail', array('outermold_barcode' => $code));

    return $rst->num_rows();
  }

  public function check_by_barcode_mid($code)
  {
    $rst = $this->db->get_where('output_molding_detail', array('midmold_barcode' => $code));
    return $rst->num_rows();
  }

  public function check_by_barcode_linning($code)
  {
    $rst = $this->db->get_where('output_molding_detail', array('linningmold_barcode' => $code));

    return $rst->num_rows();
  }

  public function save()
  {
    if (isset($_POST['dataStr'])) {
      date_default_timezone_set('Asia/Jakarta');
      $dataStr = $_POST['dataStr'];
      $data = array(
        'shift' => $dataStr['shift'],
        'no_mesin' => $dataStr['no_mesin'],
        'tgl' => date('Y-m-d H:i:s'),
        'orc' => $dataStr['orc'],
        'style' => $dataStr['style'],
        'color' => $dataStr['color']
      );

      $this->db->insert('output_molding', $data);
      return $this->db->insert_id();
    }
  }

  public function save_detail_outermold()
  {
    if (isset($_POST['dataOuterMold'])) {
      $dataOM = $_POST['dataOuterMold'];

      $data = array(
        'id_output_molding' => $dataOM['id_output_molding'],
        'no_bundle' => $dataOM['no_bundle'],
        'size' => $dataOM['size'],
        'group_size' => $dataOM['group_size'],
        'qty_outermold' => $dataOM['qty_outermold'],
        'outermold_barcode' => $dataOM['outermold_barcode'],
        'outermold_sam_result' => $dataOM['outermold_sam_result'],
      );

      $this->db->insert('output_molding_detail', $data);

      return $this->db->affected_rows();
    }
  }

  public function save_detail_midmold()
  {
    if (isset($_POST['dataMidMold'])) {
      $dataOM = $_POST['dataMidMold'];

      $data = array(
        'id_output_molding' => $dataOM['id_output_molding'],
        'no_bundle' => $dataOM['no_bundle'],
        'size' => $dataOM['size'],
        'group_size' => $dataOM['group_size'],
        'qty_midmold' => $dataOM['qty_midmold'],
        'midmold_barcode' => $dataOM['midmold_barcode'],
        'midmold_sam_result' => $dataOM['midmold_sam_result'],
      );

      $this->db->insert('output_molding_detail', $data);

      return $this->db->affected_rows();
    }
  }

  public function save_detail_linningmold()
  {
    if (isset($_POST['dataLinningMold'])) {
      $dataOM = $_POST['dataLinningMold'];

      $data = array(
        'id_output_molding' => $dataOM['id_output_molding'],
        'no_bundle' => $dataOM['no_bundle'],
        'size' => $dataOM['size'],
        'group_size' => $dataOM['group_size'],
        'qty_linningmold' => $dataOM['qty_linningmold'],
        'linningmold_barcode' => $dataOM['linningmold_barcode'],
        'linningmold_sam_result' => $dataOM['linningmold_sam_result'],
      );

      $this->db->insert('output_molding_detail', $data);
      return $this->db->affected_rows();
    }
  }
  // ==================================================================================================
  // Allocation Molding
  // ==================================================================================================
  public function getDataMachineMolding()
  {
    $data = "SELECT * FROM `master_mesin_molding`";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataMoldingMember()
  {
    $data = "SELECT * FROM `molding_member`";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataLineMolding()
  {
    $data = "SELECT * FROM `line` WHERE `line`.`idFactory` = $this->id_factory";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataStyleMolding()
  {
    $data = "SELECT DISTINCT
              `order`.style
            FROM
              `order`
            WHERE 
              `order`.id_factory = $this->id_factory";

    $query = $this->db->query($data);
    return $query->result();
  }
  public function getDataOrcMolding()
  {
    $data = "SELECT
              `order`.orc 
            FROM
              `order`
            WHERE 
              id_factory = $this->id_factory";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataColorMolding()
  {
    $data = "SELECT DISTINCT
              `order`.color 
            FROM
              `order`
            WHERE 
              id_factory = $this->id_factory";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataSizeMolding()
  {
    $data = "SELECT
              master_size.id_mastersize, 
              master_size.size
            FROM
              master_size";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataKegelMolding()
  {
    $data = "SELECT
              master_kegel_type.id_kegel_type,
              master_kegel.diameter as kegel
            FROM
              master_kegel_type
              LEFT JOIN master_kegel ON master_kegel_type.id_kegel_type = master_kegel.id_kegel_type 
            GROUP BY
              master_kegel_type.id_kegel_type,
              master_kegel.diameter";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function postDataAllocationMoldingtMain($data)
  {
    $this->db->insert('plan_molding', $data);
    return $this->db->insert_id();
  }

  public function postDataAllocationModalDetails($data_details)
  {
    $this->db->insert_batch('plan_molding_detail', $data_details);
  }

  public function getDataAllAllocationlMolding()
  {
    $data = "SELECT
              plan_molding.id_plan_molding, 
              plan_molding.id_molding_member, 
              plan_molding.id_mesin_molding, 
              molding_member.`name`, 
              plan_molding.id_line, 
              line.`name` AS line, 
              plan_molding.target, 
              plan_molding.demands, 
              DATE(plan_molding.created_date) as created_date,  
              plan_molding_detail.component, 
              plan_molding_detail.style, 
              plan_molding_detail.orc, 
              plan_molding_detail.color, 
              plan_molding_detail.kegel, 
              plan_molding_detail.size, 
              plan_molding_detail.qty
            FROM
              plan_molding
              LEFT JOIN
              plan_molding_detail
              ON 
                plan_molding.id_plan_molding = plan_molding_detail.id_plan_molding
              LEFT JOIN
              molding_member
              ON 
                plan_molding.id_molding_member = molding_member.id_molding_member
              LEFT JOIN
              line
              ON 
                plan_molding.id_line = line.id_line";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataAllAllocationlMolding1()
  {
    $data = "SELECT
              plan_molding.id_plan_molding,
              plan_molding.id_molding_member,
              plan_molding.id_mesin_molding,
              molding_member.`name`,
              plan_molding.id_line,
              line.`name` AS line,
              plan_molding.target,
              plan_molding.demands,
              DATE( plan_molding.created_date ) AS created_date 
            FROM
              plan_molding
              LEFT JOIN molding_member ON plan_molding.id_molding_member = molding_member.id_molding_member
              LEFT JOIN line ON plan_molding.id_line = line.id_line
            WHERE line.idFactory = $this->id_factory";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function get_detail_allocation($id_plan_molding)
  {
    $rst = "SELECT
            plan_molding.id_plan_molding,
            plan_molding.id_molding_member,
            plan_molding.id_mesin_molding,
            molding_member.`name`,
            plan_molding.id_line,
            line.`name` AS line,
            plan_molding.target,
            plan_molding.demands,
            DATE( plan_molding.created_date ) AS created_date,
            plan_molding_detail.component,
            plan_molding_detail.style,
            plan_molding_detail.orc,
            plan_molding_detail.color,
            plan_molding_detail.kegel,
            plan_molding_detail.size,
            plan_molding_detail.qty 
          FROM
            plan_molding
            LEFT JOIN plan_molding_detail ON plan_molding.id_plan_molding = plan_molding_detail.id_plan_molding
            LEFT JOIN molding_member ON plan_molding.id_molding_member = molding_member.id_molding_member
            LEFT JOIN line ON plan_molding.id_line = line.id_line
          WHERE
            plan_molding.id_plan_molding = '$id_plan_molding'";
    $query = $this->db->query($rst);
    return $query->result();
  }

  public function get_detail_allocation_2($id_plan_molding)
  {
    $rst = "SELECT
            plan_molding.id_plan_molding,
            plan_molding.id_molding_member,
            plan_molding.id_mesin_molding,
            molding_member.`name`,
            plan_molding.id_line,
            line.`name` AS line,
            plan_molding.target,
            plan_molding.demands,
            DATE( plan_molding.created_date ) AS created_date,
            plan_molding_detail.component,
            plan_molding_detail.style,
            plan_molding_detail.orc,
            plan_molding_detail.color,
            plan_molding_detail.kegel,
            plan_molding_detail.size,
            plan_molding_detail.qty,
            qmold.out_outermold,
            qmold.out_midmold,
            qmold.out_linningmold,
            qmold.qt AS output,
            outmold.qty_mold AS cum_out,
            `order`.qty AS qtorder,
            `order`.qty - outmold.qty_mold AS balance 
          FROM
            plan_molding
            LEFT JOIN plan_molding_detail ON plan_molding.id_plan_molding = plan_molding_detail.id_plan_molding
            LEFT JOIN molding_member ON plan_molding.id_molding_member = molding_member.id_molding_member
            LEFT JOIN line ON plan_molding.id_line = line.id_line
            LEFT JOIN (
            SELECT
              output_molding.no_mesin,
              output_molding.tgl,
              output_molding.orc,
              COALESCE ( Sum( output_molding_detail.qty_outermold ), 0 ) AS out_outermold,
              COALESCE ( Sum( output_molding_detail.qty_midmold ), 0 ) AS out_midmold,
              COALESCE ( Sum( output_molding_detail.qty_linningmold ), 0 ) AS out_linningmold,
              COALESCE ( Sum( output_molding_detail.qty_outermold ), 0 ) + COALESCE ( Sum( output_molding_detail.qty_midmold ), 0 ) + COALESCE ( Sum( output_molding_detail.qty_linningmold ), 0 ) AS qt 
            FROM
              output_molding
              INNER JOIN output_molding_detail ON output_molding.id_output_molding = output_molding_detail.id_output_molding 
            WHERE
              YEAR ( output_molding.tgl ) = YEAR (
              CURDATE()) 
            GROUP BY
              output_molding.no_mesin,
              DATE( output_molding.tgl ),
              output_molding.orc 
            ) AS qmold ON qmold.orc = plan_molding_detail.orc 
            AND plan_molding.id_mesin_molding = qmold.no_mesin
            LEFT JOIN (
            SELECT
              output_molding.orc,
              COALESCE ( Sum( output_molding_detail.qty_outermold ), 0 ) AS out_outermold,
              COALESCE ( Sum( output_molding_detail.qty_midmold ), 0 ) AS out_midmold,
              COALESCE ( Sum( output_molding_detail.qty_linningmold ), 0 ) AS out_linningmold,
              COALESCE ( Sum( output_molding_detail.qty_outermold ), 0 ) + COALESCE ( Sum( output_molding_detail.qty_midmold ), 0 ) + COALESCE ( Sum( output_molding_detail.qty_linningmold ), 0 ) AS qty_mold 
            FROM
              output_molding
              INNER JOIN output_molding_detail ON output_molding.id_output_molding = output_molding_detail.id_output_molding 
            WHERE
              YEAR ( output_molding.tgl ) = YEAR (
              CURDATE()) 
            GROUP BY
              output_molding.orc 
            ) AS outmold ON outmold.orc = plan_molding_detail.orc
            LEFT JOIN `order` ON plan_molding_detail.orc = `order`.orc 
          WHERE
            plan_molding.id_plan_molding = '$id_plan_molding'";
    $query = $this->db->query($rst);
    return $query->result();
  }

  public function getDataTypeKegelMolding()
  {
    $data = "SELECT * FROM `master_kegel_type`";

    $query = $this->db->query($data);
    return $query->result();
  }
  public function get_molding_kegel()
  {
    $data = "SELECT
              master_kegel_type.kegel_type, 
              master_kegel.diameter, 
              master_kegel.shape
            FROM
              master_kegel
              INNER JOIN
              master_kegel_type
              ON 
                master_kegel.id_kegel_type = master_kegel_type.id_kegel_type";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function postDataMasterKegel($data)
  {
    $this->db->insert('master_kegel', $data);
    return $this->db->insert_id();
  }
}
