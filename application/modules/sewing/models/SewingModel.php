<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SewingModel extends CI_Model
{
  // Sidebar
  // ==================================================================================================
  public function getDataUnreceivedRecutSewing()
  {
    $line = $this->session->userdata['username'];

    $query = "SELECT id_line FROM `line` WHERE `name` = '$line'";
    $result = $this->db->query($query);
    $data_line  = $result->result_array();
    $id_line = $data_line[0]['id_line'];

    $data = "SELECT
              recut_sewing_main.id 
            FROM
              recut_sewing_main
              INNER JOIN recut_sewing_details ON recut_sewing_main.id = recut_sewing_details.id_recut_sewing_main
              LEFT JOIN input_recut_cutting ON recut_sewing_main.id = input_recut_cutting.id_recut_sewing_main
              LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main
              LEFT JOIN received_recut_sewing ON recut_sewing_main.id = received_recut_sewing.id_recut_sewing_main 
            WHERE
              recut_sewing_main.id_line = $id_line
              AND input_recut_cutting.input_date IS NOT NULL 
              AND output_recut_cutting.output_date IS NOT NULL 
              AND received_recut_sewing.date_received IS NULL 
            ORDER BY
              recut_sewing_main.id DESC
              ";

    $query = $this->db->query($data);
    return $query->num_rows();
  }
  // ==================================================================================================




  // Qc Endline
  // ==================================================================================================
  public function getDataDefectMaster()
  {
    $data = "SELECT
             id_df,
             DCode,
             Defect 
            FROM
             `dt_defect2` 
            ORDER BY
              DCode ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataBarcodeDetails($kode_barcode)
  {
    $data = "SELECT
              input_sewing.orc,
              input_sewing.style,
              `order`.so AS no_po,
              input_sewing.color,
              input_sewing.kode_barcode,
              input_sewing.qty_pcs 
            FROM
              input_sewing
              INNER JOIN `order` ON input_sewing.orc = `order`.orc 
            WHERE
              input_sewing.kode_barcode = '$kode_barcode'
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataQcEndlineDefectDaily($line)
  {
    $data = "SELECT
          `qc_endline_defect`.id,
          `qc_endline_defect`.orc,
          dt_defect2.DCode,
          dt_defect2.Defect,
          SUM(`qc_endline_defect`.qty_defect) qty_defect,
          `qc_endline_defect`.created_date 
        FROM
          `qc_endline_defect`
          INNER JOIN dt_defect2 ON qc_endline_defect.id_defect = dt_defect2.id_df 
        WHERE
          `qc_endline_defect`.line = '$line' 
          AND DATE( `qc_endline_defect`.created_date ) = CURRENT_DATE () 
        GROUP BY
        `qc_endline_defect`.orc,
        dt_defect2.DCode
        ORDER BY
          id DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }


  public function getDataQcEndlineDefectYesterday($line)
  {
    $data = "SELECT
            `qc_endline_defect`.id,
            `qc_endline_defect`.orc,
            dt_defect2.DCode,
            dt_defect2.Defect,
            SUM(`qc_endline_defect`.qty_defect)qty_defect,
            `qc_endline_defect`.created_date 
          FROM
            `qc_endline_defect`
            INNER JOIN dt_defect2 ON qc_endline_defect.id_defect = dt_defect2.id_df 
          WHERE
            `qc_endline_defect`.line = '$line' 
            AND DATE( `qc_endline_defect`.created_date ) = CURDATE() - INTERVAL 1 DAY
          GROUP BY
          `qc_endline_defect`.orc,
          dt_defect2.DCode
          ORDER BY
            id DESC

              ";

    $query = $this->db->query($data);
    return $query->result();
  }


  public function getDataQcEndlineDefectMonthly($line)
  {
    $data = "SELECT
              `qc_endline_defect`.id,
              `qc_endline_defect`.orc,
              dt_defect2.DCode,
              dt_defect2.Defect,
              SUM(`qc_endline_defect`.qty_defect)qty_defect,
              `qc_endline_defect`.created_date 
            FROM
              `qc_endline_defect`
              INNER JOIN dt_defect2 ON qc_endline_defect.id_defect = dt_defect2.id_df 
            WHERE
              `qc_endline_defect`.line = '$line' 
              AND MONTH( `qc_endline_defect`.created_date ) = MONTH(NOW())
            GROUP BY
            `qc_endline_defect`.orc,
              dt_defect2.DCode
            ORDER BY
              id DESC

              ";

    $query = $this->db->query($data);
    return $query->result();
  }


  public function getDataQcEndlineDefectShowAll($line)
  {
    $data = "SELECT
            `qc_endline_defect`.id,
            `qc_endline_defect`.orc,
            dt_defect2.DCode,
            dt_defect2.Defect,
            `qc_endline_defect`.qty_defect,
            `qc_endline_defect`.created_date 
          FROM
            `qc_endline_defect`
            INNER JOIN dt_defect2 ON qc_endline_defect.id_defect = dt_defect2.id_df 
          WHERE
            `qc_endline_defect`.line = '$line' 
          GROUP BY
          `qc_endline_defect`.orc,
            dt_defect2.DCode
          ORDER BY
            id DESC

              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function postDataQcEndlineDefect($data)
  {
    $this->db->insert('qc_endline_defect', $data);
    return $this->db->insert_id();
  }

  public function postDataQcEndlineMultipleDefect($data)
  {
    $this->db->insert_batch('qc_endline_defect', $data);
  }

  public function deleteDataQcEndlineDefect($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('qc_endline_defect');
  }

  public function getDataPercentageQcEndlineDaily($line)
  {
    $data = "SELECT 
             qc_endline_defect.orc,
             IFNULL( output_sewing_detail_sub_query.total_qty_output, 0 ) AS total_qty_pass,
             SUM( qc_endline_defect.qty_defect ) AS total_qty_defect,
             IFNULL( output_sewing_detail_sub_query.total_qty_output + IFNULL( SUM( qc_endline_defect.qty_defect ), 0 ), 0 ) AS total_qty_check,
             IFNULL( ROUND(( SUM( qc_endline_defect.qty_defect ) / (IFNULL( output_sewing_detail_sub_query.total_qty_output + IFNULL( SUM( qc_endline_defect.qty_defect ), 0 ), 0 )) ) * 100, 2 ), 0 ) AS percentage_defect 
           FROM 
             qc_endline_defect 
             LEFT JOIN (
               SELECT
                 output_sewing_detail.orc,
                 SUM( output_sewing_detail.qty ) AS total_qty_output 
               FROM
                 output_sewing_detail
                 INNER JOIN output_sewing ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing 
               WHERE
                 DATE( output_sewing_detail.tgl_ass ) = CURRENT_DATE () 
                 AND output_sewing.line = '$line' 
               GROUP BY
                 output_sewing_detail.orc
             ) as output_sewing_detail_sub_query ON qc_endline_defect.orc = output_sewing_detail_sub_query.orc 
           WHERE 
             qc_endline_defect.line = '$line'
             AND DATE( qc_endline_defect.created_date ) = CURRENT_DATE () 
           GROUP BY 
             qc_endline_defect.orc
           ORDER BY
             qc_endline_defect.created_date DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataPercentageQcEndlineYesterday($line)
  {
    $data = "SELECT 
             qc_endline_defect.orc,
             IFNULL( output_sewing_detail_sub_query.total_qty_output, 0 ) AS total_qty_pass,
             SUM( qc_endline_defect.qty_defect ) AS total_qty_defect,
             IFNULL( output_sewing_detail_sub_query.total_qty_output + IFNULL( SUM( qc_endline_defect.qty_defect ), 0 ), 0 ) AS total_qty_check,
             IFNULL( ROUND(( SUM( qc_endline_defect.qty_defect ) / (IFNULL( output_sewing_detail_sub_query.total_qty_output + IFNULL( SUM( qc_endline_defect.qty_defect ), 0 ), 0 )) ) * 100, 2 ), 0 ) AS percentage_defect 
           FROM 
             qc_endline_defect 
             LEFT JOIN (
               SELECT
                 output_sewing_detail.orc,
                 SUM( output_sewing_detail.qty ) AS total_qty_output 
               FROM
                 output_sewing_detail
                 INNER JOIN output_sewing ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing 
               WHERE
                 DATE( output_sewing_detail.tgl_ass ) = CURDATE() - INTERVAL 1 DAY 
                 AND output_sewing.line = '$line' 
               GROUP BY
                 output_sewing_detail.orc
             ) as output_sewing_detail_sub_query ON qc_endline_defect.orc = output_sewing_detail_sub_query.orc 
           WHERE 
             qc_endline_defect.line = '$line'
             AND DATE( qc_endline_defect.created_date ) = CURDATE() - INTERVAL 1 DAY 
           GROUP BY 
             qc_endline_defect.orc
           ORDER BY
             qc_endline_defect.created_date DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataPercentageQcEndlineMonthly($line)
  {
    $data = "SELECT 
             qc_endline_defect.orc,
             IFNULL( output_sewing_detail_sub_query.total_qty_output, 0 ) AS total_qty_pass,
             SUM( qc_endline_defect.qty_defect ) AS total_qty_defect,
             IFNULL( output_sewing_detail_sub_query.total_qty_output + IFNULL( SUM( qc_endline_defect.qty_defect ), 0 ), 0 ) AS total_qty_check,
             IFNULL( ROUND(( SUM( qc_endline_defect.qty_defect ) / (IFNULL( output_sewing_detail_sub_query.total_qty_output + IFNULL( SUM( qc_endline_defect.qty_defect ), 0 ), 0 )) ) * 100, 2 ), 0 ) AS percentage_defect 
           FROM 
             qc_endline_defect 
             LEFT JOIN (
               SELECT
                 output_sewing_detail.orc,
                 SUM( output_sewing_detail.qty ) AS total_qty_output 
               FROM
                 output_sewing_detail
                 INNER JOIN output_sewing ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing 
               WHERE
                 MONTH( output_sewing_detail.tgl_ass ) = MONTH(CURRENT_DATE())
								         AND YEAR(output_sewing_detail.tgl_ass) = YEAR(CURRENT_DATE()) 
                 AND output_sewing.line = '$line' 
               GROUP BY
                 output_sewing_detail.orc
             ) as output_sewing_detail_sub_query ON qc_endline_defect.orc = output_sewing_detail_sub_query.orc 
           WHERE 
             qc_endline_defect.line = '$line'
             AND MONTH( qc_endline_defect.created_date ) = MONTH(CURRENT_DATE())  
						       AND YEAR( qc_endline_defect.created_date ) = YEAR(CURRENT_DATE())  
           GROUP BY 
             qc_endline_defect.orc
           ORDER BY
             qc_endline_defect.created_date DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataPercentageQcEndlineShowAll($line)
  {
    $data = "SELECT 
             qc_endline_defect.orc,
             IFNULL( output_sewing_detail_sub_query.total_qty_output, 0 ) AS total_qty_pass,
             SUM( qc_endline_defect.qty_defect ) AS total_qty_defect,
             IFNULL( output_sewing_detail_sub_query.total_qty_output + IFNULL( SUM( qc_endline_defect.qty_defect ), 0 ), 0 ) AS total_qty_check,
             IFNULL( ROUND(( SUM( qc_endline_defect.qty_defect ) / (IFNULL( output_sewing_detail_sub_query.total_qty_output + IFNULL( SUM( qc_endline_defect.qty_defect ), 0 ), 0 )) ) * 100, 2 ), 0 ) AS percentage_defect 
           FROM 
             qc_endline_defect 
             LEFT JOIN (
               SELECT
                 output_sewing_detail.orc,
                 SUM( output_sewing_detail.qty ) AS total_qty_output 
               FROM
                 output_sewing_detail
                 INNER JOIN output_sewing ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing 
               WHERE
                 output_sewing.line = '$line' 
               GROUP BY
                 output_sewing_detail.orc
             ) as output_sewing_detail_sub_query ON qc_endline_defect.orc = output_sewing_detail_sub_query.orc 
           WHERE 
             qc_endline_defect.line = '$line'
 
           GROUP BY 
             qc_endline_defect.orc
           ORDER BY
             qc_endline_defect.created_date DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  // ==================================================================================================



  // Input Sewing
  // ==================================================================================================

  public function get_by_line($line)
  {
    $data = "SELECT
              line,
              tgl,
              orc,
              style,
              color,
              no_bundle,
              size,
              qty_pcs 
            FROM
              input_sewing 
            WHERE
              line = '$line' 
              AND DATE(tgl) > (NOW() - INTERVAL 7 DAY)
            ORDER BY
              id_input_sewing DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function get_by_barcode_cutting($barcode)
  {
    $rst = $this->db->get_where('viewcuttingdone', array('kode_barcode' => $barcode));
    return $rst->row();
  }

  public function get_by_line_barcode($c)
  {
    $this->db->where('kode_barcode', $c);

    $rst = $this->db->get('input_sewing');
    return $rst->row();
  }

  public function get_by_size()
  {
    if (isset($_POST['dataSize'])) {
      $dataSize = $_POST['dataSize'];

      $r = $this->db->get_where('master_size', array('size' => $dataSize));

      return $r->row();
    }
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

  public function save_input_sewing()
  {
    if (isset($_POST['dataStr'])) {
      $dataStr = $_POST['dataStr'];
      $data = array(
        'line' => $dataStr['line'],
        'tgl' => date('Y-m-d'),
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

      $idInputSewing = $this->db->insert_id();

      $rowLine = $this->db->get_where('line', ['name' => $dataStr['line']])->row();

      $lineID = $rowLine->description;

      $data['id_input_sewing'] = $idInputSewing;
      $data['lineID'] = $lineID;
      $data['flag'] = 0;

      $this->db->insert('agv', $data);

      return $this->db->insert_id();
    }
  }

  public function update_change_line($id, $line)
  {
    $this->db->set('line', $line);
    $this->db->where('id_input_sewing', $id);

    $this->db->update('input_sewing');
    return $this->db->affected_rows();
  }

  // ==================================================================================================



  // Ubah Input Sewing
  // ==================================================================================================
  public function get_all()
  {
    $data = "SELECT
                id_line,
                `name` 
              FROM
                line 
              WHERE
                description IS NOT NULL 
              ORDER BY
                `name` ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function get_by_orc1($orc)
  {
    $this->db->where('orc', $orc);
    $this->db->where('outputed', 'No');
    $rst = $this->db->get('input_sewing');

    return $rst->result();
  }

  public function update_line()
  {
    if (isset($_POST['dataInputSewing'])) {
      $dataInputSewing = $_POST['dataInputSewing'];

      $this->db->update_batch('input_sewing', $dataInputSewing, 'id_input_sewing');

      return $this->db->affected_rows();
    }
  }

  // ==================================================================================================



  // Output Sewing
  // ==================================================================================================
  public function getDataOutputSewing($line)
  {
    $data = "SELECT
                output_sewing_detail.id_output_sewing_detail,
                output_sewing.line,
                CONCAT( output_sewing_detail.tgl_ass, ' ', output_sewing_detail.assembly ) AS output_date,
                output_sewing_detail.orc,
                output_sewing.wo,
                `master_order_icon_main`.style_code as style,
                output_sewing_detail.no_bundle,
                output_sewing_detail.size,
                output_sewing_detail.qty 
              FROM
                output_sewing_detail
                INNER JOIN output_sewing ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing
								INNER JOIN `master_order_icon_main` ON  output_sewing_detail.orc = `master_order_icon_main`.orc
              WHERE
                output_sewing.line = '$line' 
                AND DATE( output_sewing_detail.tgl_ass ) = CURRENT_DATE () 
              ORDER BY
                output_sewing_detail.id_output_sewing_detail DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataCheckMachineBarcode($kode)
  {
    $db2 = $this->load->database('database2', true);

    $data = "SELECT
                id_barang
              FROM
                `barang`
              WHERE
                kode_barcode = $kode
              ";
    $query = $db2->query($data);
    return $query->num_rows();
  }

  public function getDataOutputSewingYesterday($line)
  {
    $data = "SELECT
                output_sewing_detail.id_output_sewing_detail,
                output_sewing.line,
                CONCAT( output_sewing_detail.tgl_ass, ' ', output_sewing_detail.assembly ) AS output_date,
                output_sewing_detail.orc,
                output_sewing.style,
                output_sewing_detail.no_bundle,
                output_sewing_detail.size,
                output_sewing_detail.qty 
              FROM
                output_sewing_detail
                JOIN output_sewing ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing 
              WHERE
                output_sewing.line = '$line' 
                AND output_sewing_detail.tgl_ass =  CURDATE() - INTERVAL 1 DAY
              ORDER BY
                output_sewing_detail.id_output_sewing_detail DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputSewing3MonthsAgo($line)
  {
    $data = "SELECT
                output_sewing_detail.id_output_sewing_detail,
                output_sewing.line,
                CONCAT( output_sewing_detail.tgl_ass, ' ', output_sewing_detail.assembly ) AS output_date,
                output_sewing_detail.orc,
                output_sewing.style,
                output_sewing_detail.no_bundle,
                output_sewing_detail.size,
                output_sewing_detail.qty 
              FROM
                output_sewing_detail
                JOIN output_sewing ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing 
              WHERE
                output_sewing.line = '$line' 
                AND output_sewing_detail.tgl_ass BETWEEN DATE_SUB( NOW(), INTERVAL 90 DAY ) 
                AND NOW()
              ORDER BY
                output_sewing_detail.id_output_sewing_detail DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function get_by_line_date_now()
  {
    $userName = $this->session->userdata('username');
    $dateNow = date('Y-m-d');

    $this->db->where('line', $userName);
    $this->db->where('tgl', $dateNow);

    $rst = $this->db->get('output_sewing');

    return $rst->row();
  }

  public function save()
  {
    $line = $this->session->userdata('username');

    if (isset($_POST['assembly_op'])) {
      $assemblyOP = $_POST['assembly_op'];
    }

    $data = [
      'tgl' => date('Y-m-d'),
      'line' => $line,
      'center_panel_op' => 0,
      'back_wings_op' => 0,
      'cups_op' => 0,
      'assembly_op' => $assemblyOP,
      'qty' => 0,
      'actual_qty' => 0
    ];

    $this->db->insert('output_sewing', $data);
    return $this->db->insert_id();
  }

  public function get_by_barcode($code)
  {
    $rst = $this->db->get_where('input_sewing', array('kode_barcode' => $code));
    return $rst->row();
  }

  public function get_group_line_by_barcode($code)
  {
    $data['row'] = $this->db->get_where('input_sewing', array('kode_barcode' => $code))->row();
    $data['groupLine'] = $this->db->get_where('line', ['name' => $data['row']->line])->row()->location;
    return $data;
  }

  public function get_by_barcode_output_sewing_detail($code)
  {
    $rst = $this->db->get_where('output_sewing_detail', array('kode_barcode' => $code));
    return $rst->result();
  }

  public function save_details($data)
  {
    date_default_timezone_set('Asia/Jakarta');
    // $kode_barcode = $data['kode_barcode'];
    // $tgl_ass = date('Y-m-d');
    // $where = compact('kode_barcode', 'tgl_ass');
    // $rowOutputSewingDetail = $this->db->limit(1)->get_where('output_sewing_detail', $where)->row();
    // if ($rowOutputSewingDetail == null) {

    $rowOutputSewingDetail = $this->db->get_where('output_sewing_detail', array('kode_barcode' => $data['kode_barcode']))->result();
    // print_r($rowOutputSewingDetail);
    // exit;
    if($rowOutputSewingDetail != null){
      if($rowOutputSewingDetail[0]->countScanned == 2){
        return false;
      }else{
        $idOutputSewingDetail = $rowOutputSewingDetail[0]->id_output_sewing_detail;
        $this->db->set('qty', 'qty + ' . $data['qtyPcsActual'], false);
        $this->db->set('countScanned', 'countScanned + 1', false);
        $this->db->set('tgl_ass', date('Y-m-d'));
        $this->db->where('id_output_sewing_detail', $idOutputSewingDetail);
        $this->db->update('output_sewing_detail');

        $this->updateOutputSewingDetailLog($idOutputSewingDetail, $data['qtyPcsActual'], $data['assembly_sam_result']);
        // update output_sewing_detail

        return true;

      }
    }else{
      $dataForOutputSewingDetail = [
        'id_output_sewing' => $data['id_output_sewing'],
        'orc' => $data['orc'],
        'no_bundle' => $data['no_bundle'],
        'assembly' => date('H:i:s'),
        'size' => $data['size'],
        'tgl_ass' => date('Y-m-d'),
        'qty' => $data['qtyPcsActual'],
        'assembly_sam_result' => $data['assembly_sam_result'],
        'kode_barcode' => $data['kode_barcode'],
        'reject' => 0,
        'countScanned' => 1
      ];
      // insert ke table output_sewing_detail
      $this->db->insert('output_sewing_detail', $dataForOutputSewingDetail);
      $idOutputSewingDetail = $this->db->insert_id();      
      $this->updateOutputSewingDetailLog($idOutputSewingDetail, $data['qtyPcsActual'], $data['assembly_sam_result']);

      return true;
    }
    // $count = $this->db->count_all_results();
    // if($count == 2){
    //   // return $count;
    //   return false;
    // }else{
    //   $dataForOutputSewingDetail = [
    //     'id_output_sewing' => $data['id_output_sewing'],
    //     'orc' => $data['orc'],
    //     'no_bundle' => $data['no_bundle'],
    //     'assembly' => date('H:i:s'),
    //     'size' => $data['size'],
    //     'tgl_ass' => date('Y-m-d'),
    //     'qty' => $data['qtyPcsActual'],
    //     'assembly_sam_result' => $data['assembly_sam_result'],
    //     'kode_barcode' => $data['kode_barcode'],
    //     'reject' => 0
    //   ];
    //   // insert ke table output_sewing_detail
    //   $this->db->insert('output_sewing_detail', $dataForOutputSewingDetail);
  
    //   $idOutputSewingDetail = $this->db->insert_id();
    //   $this->updateOutputSewingDetailLog($idOutputSewingDetail, $data['qtyPcsActual'], $data['assembly_sam_result']);

    //   return true;
      // }
      // else {
      //   // $this->db->set('qty', 'qty + ' . $data['qtyPcsActual'], false);
      //   $this->db->set('tgl_ass', date('Y-m-d'));
      //   $this->db->where('id_output_sewing_detail', $rowOutputSewingDetail->id_output_sewing_detail);
  
      //   // update output_sewing_detail
      //   $this->db->update('output_sewing_detail');
      //   if ($this->db->affected_rows() > 0) {
      //     $idOutputSewingDetail = $rowOutputSewingDetail->id_output_sewing_detail;
      //   }
      // }
  
  
      // $dataOutputSewingDetailLog = [
      //   'id_output_sewing_detail' => $idOutputSewingDetail,
      //   'tgl' => date('Y-m-d H:i:s'),
      //   'qty' => $data['qtyPcsActual'],
      //   'assembly_sam_result' => $data['assembly_sam_result']
      // ];
      // $this->db->insert('output_sewing_detail_log', $dataOutputSewingDetailLog);
      // // $idLog = $this->db->insert_id();
  
      // // return $idLog;
      // return true;

    // }
  }

  private function updateOutputSewingDetailLog($id, $qty, $assSAM){
      $dataOutputSewingDetailLog = [
        'id_output_sewing_detail' => $id,
        'tgl' => date('Y-m-d H:i:s'),
        // 'qty' => $data['qtyPcsActual'],
        'qty' => $qty,
        // 'assembly_sam_result' => $data['assembly_sam_result']
        'assembly_sam_result' => $assSAM
      ];
      $this->db->insert('output_sewing_detail_log', $dataOutputSewingDetailLog);    
  }

  public function updateOutputSewing($data)
  {
    $idOutPutSewing = $data['id_output_sewing'];
    $rowCutting = $this->db->get_where('cutting', ['orc' => $data['orc']])->row();
    $qtyFromCutting = $rowCutting->qty;
    $styleFromCutting = $rowCutting->style;

    $this->db->set('orc', $data['orc']);
    $this->db->set('wo', $data['wo']);
    $this->db->set('id_order_icon_main', $data['id_order_icon_main']);
    $this->db->set('qty', $qtyFromCutting);
    $this->db->set('actual_qty', 'actual_qty + ' . $data['qtyPcsActual'], false);
    $this->db->set('style', $styleFromCutting);
    $this->db->where('id_output_sewing', $idOutPutSewing);
    $this->db->update('output_sewing');

    return $this->db->affected_rows();
  }
  // ==================================================================================================


  // Recut Sewing
  // ==================================================================================================
  public function getDataRecutSewingOnProgress()
  {
    $line = $this->session->userdata['username'];

    $query = "SELECT id_line FROM `line` WHERE `name` = '$line'";
    $result = $this->db->query($query);
    $data_line  = $result->result_array();
    $id_line = $data_line[0]['id_line'];

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
							recut_sewing_details.other_item_part_desc,
              recut_sewing_details.qty,
              master_defect_recut.id AS defect_code,
              master_defect_recut.defect_desc,
							recut_sewing_details.other_defect_desc,
              line.`name`,
              recut_sewing_details.remarks,
              input_recut_cutting.input_date,
              output_recut_cutting.output_date,
              received_recut_sewing.date_received,
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
            WHERE
              recut_sewing_main.id_line = $id_line
              AND recut_sewing_main.status_process = 1
            ORDER BY
              recut_sewing_main.id DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataRecutSewingComplete()
  {
    $line = $this->session->userdata['username'];

    $query = "SELECT id_line FROM `line` WHERE `name` = '$line'";
    $result = $this->db->query($query);
    $data_line  = $result->result_array();
    $id_line = $data_line[0]['id_line'];

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
							recut_sewing_details.other_item_part_desc,
              recut_sewing_details.qty,
              master_defect_recut.id AS defect_code,
              master_defect_recut.defect_desc,
							recut_sewing_details.other_defect_desc,
              line.`name`,
              recut_sewing_details.remarks,
              input_recut_cutting.input_date,
              output_recut_cutting.output_date,
              received_recut_sewing.date_received,
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
            WHERE
              recut_sewing_main.id_line = $id_line
              AND recut_sewing_main.status_process = 0
            ORDER BY
              recut_sewing_main.id DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataRecutSewingReject()
  {
    $line = $this->session->userdata['username'];

    $query = "SELECT id_line FROM `line` WHERE `name` = '$line'";
    $result = $this->db->query($query);
    $data_line  = $result->result_array();
    $id_line = $data_line[0]['id_line'];

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
							recut_sewing_details.other_item_part_desc,
              recut_sewing_details.qty,
              master_defect_recut.id AS defect_code,
              master_defect_recut.defect_desc,
							recut_sewing_details.other_defect_desc,
              line.`name`,
              recut_sewing_details.remarks,
              input_recut_cutting.input_date,
              output_recut_cutting.output_date,
              received_recut_sewing.date_received 
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
            WHERE
              recut_sewing_main.id_line = $id_line
              AND recut_sewing_main.status_process = 0
              AND recut_sewing_main.reject = 1
            ORDER BY
              recut_sewing_main.id DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  // public function getDataRecutSewingMonthly()
  // {
  //   $data = "SELECT
  //               recut_sewing.id,
  //               recut_sewing.created_date,
  //               recut_sewing.buyer,
  //               recut_sewing.style,
  //               recut_sewing.orc,
  //               master_cutting_part.part_desc,
  //               recut_sewing.no_bundle,
  //               recut_sewing.size,
  //               recut_sewing.qty,
  //               dt_defect2.DCode as defect_code,
  //               dt_defect2.Defect as defect,
  //               recut_sewing.remarks,
  //               received_recut_sewing.date_received 
  //             FROM
  //               recut_sewing
  //               LEFT JOIN received_recut_sewing ON recut_sewing.id = received_recut_sewing.id_recut_sewing
  //               INNER JOIN master_cutting_part ON recut_sewing.id_master_cutting_part = master_cutting_part.id 
  //               INNER JOIN dt_defect2 ON recut_sewing.id_dt_defect2 = dt_defect2.id_df
  //           WHERE
  //             DATE(recut_sewing.created_date)BETWEEN DATE_SUB( NOW(), INTERVAL 30 DAY ) 
  //             AND NOW()
  //           ORDER BY
  //             id DESC
  //             ";

  //   $query = $this->db->query($data);
  //   return $query->result();
  // }

  // public function getDataRecutSewingShowAll()
  // {
  //   $data = "SELECT
  //               recut_sewing.id,
  //               recut_sewing.created_date,
  //               recut_sewing.buyer,
  //               recut_sewing.style,
  //               recut_sewing.orc,
  //               master_cutting_part.part_desc,
  //               recut_sewing.no_bundle,
  //               recut_sewing.size,
  //               recut_sewing.qty,
  //               dt_defect2.DCode as defect_code,
  //               dt_defect2.Defect as defect,
  //               recut_sewing.remarks,
  //               received_recut_sewing.date_received 
  //             FROM
  //               recut_sewing
  //               LEFT JOIN received_recut_sewing ON recut_sewing.id = received_recut_sewing.id_recut_sewing
  //               INNER JOIN master_cutting_part ON recut_sewing.id_master_cutting_part = master_cutting_part.id 
  //               INNER JOIN dt_defect2 ON recut_sewing.id_dt_defect2 = dt_defect2.id_df
  //           ORDER BY
  //             id DESC
  //             ";

  //   $query = $this->db->query($data);
  //   return $query->result();
  // }

  public function getDataPartDetails($id_recut_sewing_main)
  {
    $data = "SELECT
              master_item.item_desc,
              master_item_part.part_desc,
              recut_sewing_details.qty,
              master_defect_recut.id AS defect_code,
              master_defect_recut.defect_desc 
            FROM
              recut_sewing_details
              INNER JOIN master_item_part ON recut_sewing_details.id_master_item_part = master_item_part.id
              INNER JOIN master_item ON master_item.id = master_item_part.id_master_item
              INNER JOIN master_defect_recut ON recut_sewing_details.id_master_defect_recut = master_defect_recut.id 
            WHERE
              recut_sewing_details.id_recut_sewing_main = $id_recut_sewing_main 
            ORDER BY
              recut_sewing_details.id DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataItem()
  {
    $data = "SELECT
              id,
              item_desc
            FROM
              `master_item`
            ORDER BY
              id ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataItemPart($id_item)
  {
    $data = "SELECT
              id,
              `code`,
              part_desc 
            FROM
              `master_item_part` 
            WHERE
              id_master_item = $id_item
              OR id = 30 -- other
            ORDER BY
              `code` ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataDefectRecutMaster()
  {
    $data = "SELECT
              id,
              defect_desc
            FROM
              `master_defect_recut`
            ORDER BY
              id ASC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataBarcodeDetailsRecutSewing($kode_barcode)
  {
    $data = "SELECT
              `order`.buyer,
              input_sewing.orc,
              input_sewing.color,
              input_sewing.style,
              input_sewing.size,
              input_sewing.qty_pcs,
              input_sewing.no_bundle,
              input_sewing.kode_barcode 
            FROM
              input_sewing
              INNER JOIN `order` ON input_sewing.orc = `order`.orc 
            WHERE
              input_sewing.kode_barcode = '$kode_barcode'
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataBarcodeDetailsRecutSewingArray($kode_barcode)
  {
    $data = "SELECT
              `order`.buyer,
              input_sewing.orc,
              input_sewing.color,
              input_sewing.style,
              input_sewing.size,
              input_sewing.qty_pcs,
              input_sewing.no_bundle,
              input_sewing.kode_barcode 
            FROM
              input_sewing
              INNER JOIN `order` ON input_sewing.orc = `order`.orc 
            WHERE
              input_sewing.kode_barcode = '$kode_barcode'
              ";

    $query = $this->db->query($data);
    return $query->result_array();
  }


  public function getDataCheckBarcodeRecutRequest($kode_barcode)
  {
    $data = "SELECT
              recut_sewing_main.id,
              recut_sewing_main.created_date,
              recut_sewing_main.barcode 
            FROM
              recut_sewing_main 
            WHERE
              recut_sewing_main.barcode = '$kode_barcode' 
              AND recut_sewing_main.status_process = 1 
            ORDER BY
              recut_sewing_main.id DESC
              ";

    $query = $this->db->query($data);
    return $query->num_rows();
  }


  public function postDataRecutSewingMain($data)
  {
    $this->db->insert('recut_sewing_main', $data);
    return $this->db->insert_id();
  }

  public function postDataRecutSewingDetails($data_details)
  {
    $this->db->insert_batch('recut_sewing_details', $data_details);
  }




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

  public function getDataCheckBarcodeOutputRecutCutting($barcode)
  {
    $data = "SELECT
                recut_sewing_main.id 
              FROM
                recut_sewing_main
                LEFT JOIN output_recut_cutting ON recut_sewing_main.id = output_recut_cutting.id_recut_sewing_main 
              WHERE
                output_recut_cutting.output_date IS NOT NULL 
                AND recut_sewing_main.status_process = 1
                AND recut_sewing_main.barcode = '$barcode'
              ";

    $query = $this->db->query($data);
    return $query->num_rows();
  }

  public function getDataCheckBarcodeReceivedRecutSewingScanned($barcode)
  {
    $data = "SELECT
                recut_sewing_main.id 
              FROM
                recut_sewing_main
                LEFT JOIN received_recut_sewing ON recut_sewing_main.id = received_recut_sewing.id_recut_sewing_main
              WHERE
                received_recut_sewing.date_received IS NULL 
                AND recut_sewing_main.status_process = 1
                AND recut_sewing_main.barcode = '$barcode'
              ";

    $query = $this->db->query($data);
    return $query->num_rows();
  }

  public function getDataScanBarcodeValueReceivedRecutSewing($barcode)
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
              output_recut_cutting.output_date,
              received_recut_sewing.date_received 
            FROM
              recut_sewing
              LEFT JOIN output_recut_cutting ON recut_sewing.id = output_recut_cutting.id_recut_sewing
              LEFT JOIN received_recut_sewing ON recut_sewing.id = received_recut_sewing.id_recut_sewing
              INNER JOIN master_cutting_part ON recut_sewing.id_master_cutting_part = master_cutting_part.id
              INNER JOIN dt_defect2 ON recut_sewing.id_dt_defect2 = dt_defect2.id_df
              INNER JOIN line ON recut_sewing.id_line = line.id_line 
            WHERE
              output_recut_cutting.output_date IS NOT NULL 
              AND received_recut_sewing.date_received IS NULL 
              AND recut_sewing.barcode = '$barcode' 
            ORDER BY
              recut_sewing.id DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }

  public function postDataReceivedRecutSewingBySelected($data)
  {
    $this->db->insert('received_recut_sewing', $data);
    return $this->db->insert_id();
  }

  public function postDataReceivedRecutSewingByBarcode($data)
  {
    $this->db->insert('received_recut_sewing', $data);
    return $this->db->insert_id();
  }

  public function updateStatusProcessRecutSewing($id_recut_sewing_main, $data2)
  {
    $this->db->where(['id' => $id_recut_sewing_main]);
    $this->db->update('recut_sewing_main', $data2);
  }

  // ==================================================================================================




  // Machine Breakdown
  // ==================================================================================================
  public function get_machines_breakdown_repairing()
  {
    date_default_timezone_set('Asia/Jakarta');

    $db3 = $this->load->database('database3', true);

    $userName = $this->session->userdata['username'];
    // var_dump($userName);
    // die();
    $db3->where('line', $userName);
    $db3->group_start();
    $db3->or_where('status', 'Waiting...');
    $db3->or_where('status', 'Repairing...');
    $db3->group_end();
    $rst = $db3->get('machine_breakdown');

    // $this->db->where('line', $userName);
    // $this->db->group_start();
    // $this->db->or_where('statjus', 'Waiting...');
    // $this->db->or_where('status', 'Repairing...');
    // $this->db->group_end();
    // $rst = $this->db->get('machine_breakdown');

    // return $this->db->last_query();
    // return $rst->result();

    if ($rst->result() != null) {
      $arrDataReturn = array();
      foreach ($rst->result() as $r) {
        if ($r->status == "Waiting...") {
          $startTime = new DateTime($r->start_waiting);
        } else {
          $startTime = new DateTime($r->end_waiting);
        }
        $endTime = new DateTime();
        $duration = $startTime->diff($endTime);

        $data = array(
          "id_machine_breakdown" => $r->id_machine_breakdown,
          "barcode_machine" => $r->barcode_machine,
          "machine_brand" => $r->machine_brand,
          "machine_type" => $r->machine_type,
          "machine_sn" => $r->machine_sn,
          "sympton" => $r->sympton,
          "status" => $r->status,
          "start_waiting" => $r->start_waiting,
          "end_waiting" => $r->end_waiting,
          "duration" => $duration->format("%H:%I:%S")
        );
        // var_dump($rst);
        // die();
        array_push($arrDataReturn, $data);
      }
      return $arrDataReturn;
    } else {
      return $rst->result();
    }
  }

  public function check_machine_at_breakdown($code)
  {
    $db3 = $this->load->database('database3', true);
    $db3->order_by('id_machine_breakdown', 'DESC');
    $db3->limit(1);
    $result = $db3->get_where('machine_breakdown', array('barcode_machine' => $code));

    return $result->row();
  }

  public function add_machine_breakdown()
  {
    if (isset($_POST['dataBarcode'])) {
      // $this->load->helper('date');
      date_default_timezone_set('Asia/Jakarta');

      $dataBarcode = $_POST['dataBarcode'];

      $codeMesin = $dataBarcode['codeMesin'];
      $codeSympton = $dataBarcode['codeSympton'];

      //var_dump($codeSympton);
      $db3 = $this->load->database('database3', true);
      // $dataSympton = $this->db->get_where('masalah_mesin', array('barcode' => $codeSympton))->row();
      $dataSympton = $db3->get_where('masalah_mesin', array('barcode' => $codeSympton))->row();

      //var_dump($dataSympton);

      // if($codeMesin != "" && $codeSympton != ""){
      $db2 = $this->load->database('database2', true);
      $dataMesin = $db2->get_where('barang', array('kode_barcode' => $codeMesin))->row();
      $dataMerk = $db2->get_where('merk', array('id_merk' => $dataMesin->id_merk))->row();

      $dataMekanik = array(
        'line' => $this->session->userdata['username'],
        'tgl' => date('Y-m-d'),
        'barcode_machine' => $codeMesin,
        'machine_brand' => $dataMerk->name,
        'machine_type' => $dataMesin->kode_barang,
        'machine_sn' => $dataMesin->no_seri,
        'type' => $dataMesin->type,
        'barcode_sympton' => $codeSympton,
        'sympton' => $dataSympton->masalah_mesin,
        'status' => 'Waiting...',
        // 'start_waiting' => mdate("%H:%i:%s"),
        'start_waiting' => date('H:i:s'),
        'end_waiting' => "00:00:00"
      );


      // $this->db->insert('machine_breakdown', $dataMekanik);
      $db3->insert('machine_breakdown', $dataMekanik);
      // return $this->db->last_query();
      // $id = $this->db->insert_id();
      $id = $db3->insert_id();

      return $id;
    }
  }

  public function get_by_id_machine_breakdown($id)
  {
    $db3 = $this->load->database('database3', true);
    // $rst = $this->db->get_where('machine_breakdown', array('id_machine_breakdown' => $id));
    $rst = $db3->get_where('machine_breakdown', array('id_machine_breakdown' => $id));

    return $rst->row();
    // return $db3->last_query();
  }

  public function getAllTokens()
  {
    $db3 = $this->load->database('database3', true);
    // $this->db->select('token');
    $db3->select('token');
    // $this->db->from($this->table);
    $db3->from('user_mekanik');
    // $rst = $this->db->get();
    $rst = $db3->get();

    return $rst->result_array();
    // return $rst->result();
  }
  // ==================================================================================================










  // Output Packing
  // ==================================================================================================
  public function getDataOutputPacking()
  {
    $data = "SELECT
                    `input_packing`.tgl,
                    `input_packing`.orc,
                    `input_packing`.style,
                    `input_packing`.color,
                    `input_packing`.size,
                    `input_packing`.qty,
                    `input_packing`.no_bundle,
                    `input_packing`.`line`
                FROM
                    `input_packing` 
                WHERE
                    DATE(`input_packing`.tgl) = CURRENT_DATE()
                ORDER BY
                    `input_packing`.id_input_packing DESC
        ";
    $query = $this->db->query($data);
    return $query->result();
  }

  public function getDataOutputPackingByLine($line)
  {
    $data = "SELECT
                    `input_packing`.tgl,
                    `input_packing`.orc,
                    `input_packing`.style,
                    `input_packing`.color,
                    `input_packing`.size,
                    `input_packing`.qty,
                    `input_packing`.no_bundle,
                    `input_packing`.`line`
                FROM
                    `input_packing` 
                WHERE
                    `input_packing`.line = '$line'
                    AND DATE(`input_packing`.tgl) = CURRENT_DATE()
                ORDER BY
                    `input_packing`.id_input_packing DESC
        ";
    $query = $this->db->query($data);
    return $query->result();
  }

  public function get_all_distinct()
  {
    $this->db->distinct();
    $this->db->select('orc, style, color, line');
    $this->db->from('input_packing');
    $query = $this->db->get();

    return $query->result();
  }

  public function get_all_distinct_by_line($line)
  {
    $this->db->distinct();
    // $data = "SELECT
    //                 `input_packing`.orc,
    //                 `input_packing`.style,
    //                 `input_packing`.color,
    //                 `input_packing`.size,
    //                 `input_packing`.sum(qty) as qty,
    //             FROM
    //                 `input_packing` 
    //             WHERE
    //                 `input_packing`.line = '$line'
    //                 AND DATE(`input_packing`.tgl) = CURRENT_DATE()
    //             GROUP BY `input_packing`.orc
    //             ORDER BY
    //                 `input_packing`.id_input_packing DESC
    //     ";
    // $query = $this->db->query($data);
    $this->db->select('orc, style, color, size,sum(qty) as qty, line');
    $this->db->from('input_packing');
    $this->db->where('line', $line);
    $this->db->group_by('orc');
    $query = $this->db->get();

    return $query->result();
  }

  public function check_input_packing($barcode)
  {
    $rst = $this->db->get_where('input_packing', array('kode_barcode' => $barcode));
    return $rst->num_rows();
  }

  public function check_output_sewing_detail($barcode)
  {
    $rst = $this->db->get_where('output_sewing_detail', array('kode_barcode' => $barcode));
    return $rst->num_rows();
  }

  public function get_cutting_detail($barcode)
  {
    $result = $this->db->get_where('viewcuttingdone', array('kode_barcode' => $barcode));
    return $result->row();
  }

  public function save_packing()
  {
    $line = $this->session->userdata['username'];

    if (isset($_POST['dataStr'])) {
      $dataStr = $_POST['dataStr'];
      date_default_timezone_set('Asia/Jakarta');

      if ($line == 'Admin Packing') {
        $data = array(
          'kode_barcode' => $dataStr['kode_barcode'],
          'orc' => $dataStr['orc'],
          'style' => $dataStr['style'],
          'color' => $dataStr['color'],
          'tgl' => date('Y-m-d H:i:s'),
          'qty' => $dataStr['qty'],
          'actual_qty' => $dataStr['actual_qty'],
          'size' => $dataStr['size'],
          'no_bundle' => $dataStr['no_bundle']
        );
      } else {
        $data = array(
          'kode_barcode' => $dataStr['kode_barcode'],
          'orc' => $dataStr['orc'],
          'style' => $dataStr['style'],
          'color' => $dataStr['color'],
          'tgl' => date('Y-m-d H:i:s'),
          'qty' => $dataStr['qty'],
          'actual_qty' => $dataStr['actual_qty'],
          'size' => $dataStr['size'],
          'no_bundle' => $dataStr['no_bundle'],
          'line' => $line,
        );
      }

      $this->db->insert('input_packing', $data);

      return $this->db->insert_id();
    }
  }

  public function get_by_orc1_packing($orc)
  {
    $this->db->order_by('id_input_packing', 'DESC');
    $rst = $this->db->get_where('input_packing', ['orc' => $orc]);
    return $rst->result();
  }


  // ==================================================================================================



  // Bundle Record
  // ==================================================================================================
  public function get_all_orc()
  {
    $rst = "SELECT
                orc
              FROM
                `master_order_icon_main`
              WHERE
                	YEAR ( `master_order_icon_main`.orc_date ) IN ( YEAR ( CURDATE()), YEAR ( CURDATE()) - 1 )
				";
    $query = $this->db->query($rst);

    return $query->result_array();
  }

  public function get_detail($orc)
  {
    $rst = "SELECT
            cutting.orc,
            cutting.style,
            cutting.color,
            cutting_detail.no_bundle,
            cutting_detail.size,
            cutting_detail.kode_barcode,
            sub_query_osd.kode_barcode AS barcode_sewing,
            sub_query_osd.qty,
            input_sewing.line,
            cutting.so,
            cutting.comm,
            cutting.date_created,
            cutting.buyer,
            cutting.qty AS qty_order 
          FROM
            cutting
            LEFT JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
            LEFT JOIN ( 
              SELECT 
                output_sewing_detail.kode_barcode, 
                output_sewing_detail.qty 
                FROM 
                  output_sewing_detail 
                WHERE 
                  output_sewing_detail.orc = '$orc' 
                GROUP BY output_sewing_detail.kode_barcode ) AS sub_query_osd 
            ON cutting_detail.kode_barcode = sub_query_osd.kode_barcode
            LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode 
          WHERE
            cutting.orc = '$orc' 
          -- ORDER BY
          --   sub_query_osd.kode_barcode ASC
				";
    $query = $this->db->query($rst);
    return $query->result_array();
  }

  public function get_datas_orcs($orc)
  {
    $datas = "SELECT
              cutting.orc,
              cutting.style,
              cutting.color,
              cutting_detail.no_bundle,
              cutting_detail.size,
              cutting_detail.kode_barcode,
              input_sewing.kode_barcode AS barcode_inputan,
              sub_query_osd.kode_barcode AS barcode_sewing,
              cutting_detail.qty_pcs,
              IFNULL( SUM( sub_query_osd.qty ), 0 ) AS qt_act,
              cutting_detail.qty_pcs - COALESCE ( SUM( sub_query_osd.qty ), 0 ) AS minus,
              input_sewing.line,
              cutting.so,
              cutting.comm,
              cutting.date_created,
              
              cutting.buyer,
              cutting.qty AS qty_order 
            FROM
              cutting
              INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
              LEFT JOIN ( SELECT output_sewing_detail.kode_barcode, SUM( output_sewing_detail.qty ) AS qty FROM output_sewing_detail WHERE output_sewing_detail.orc = '$orc' GROUP BY output_sewing_detail.kode_barcode ) AS sub_query_osd ON cutting_detail.kode_barcode = sub_query_osd.kode_barcode
              LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode 
            WHERE
              cutting.orc = '$orc' 
            GROUP BY
              cutting.orc,
              cutting_detail.kode_barcode
            -- ORDER BY
            -- 	-- cutting_detail.kode_barcode ASC
            --   cutting_detail.size DESC, 
            -- 	cutting_detail.no_bundle ASC
        
                ";

    $query = $this->db->query($datas);
    return $query->result_array();
  }
  // ==================================================================================================


  // Bundle Record V2
  // ==================================================================================================
  public function getDataDetails($orc)
  {
    $datas = "SELECT
                cutting.orc,
                cutting.style,
                cutting.color,
                cutting.so,
                cutting.comm,
                cutting.date_created,
                cutting.buyer,
                cutting.qty AS qty_order 
              FROM
                cutting
                LEFT JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting 
              WHERE
                cutting.orc = '$orc' 
              GROUP BY
                cutting.orc 
              ";

    $query = $this->db->query($datas);
    return $query->result_array();
  }

  public function getDataBundleRecord($orc, $size)
  {
    $datas = "SELECT 
                cutting.orc, 
                cutting_detail.size, 
                cutting_detail.kode_barcode, 
                input_sewing.kode_barcode AS barcode_input_sewing, 
                sub_query_osd.kode_barcode AS barcode_output_sewing, 
                cutting_detail.no_bundle, 
                cutting_detail.qty_pcs, 
                IFNULL(SUM(sub_query_osd.qty), 0) AS qty_out, 
                cutting_detail.qty_pcs - COALESCE (SUM(sub_query_osd.qty), 0) AS balance,
                sub_query_osd.date_scan
              FROM 
                cutting 
                INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting 
                LEFT JOIN (
                  SELECT 
                    output_sewing_detail.kode_barcode,
                    MAX(CONCAT( output_sewing_detail.tgl_ass, ' ', output_sewing_detail.assembly )) AS date_scan,
                    SUM(output_sewing_detail.qty) AS qty 
                  FROM 
                    output_sewing_detail 
                  WHERE 
                    output_sewing_detail.orc = '$orc' 
                  GROUP BY 
                    output_sewing_detail.kode_barcode
                ) AS sub_query_osd ON cutting_detail.kode_barcode = sub_query_osd.kode_barcode 
                LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode 
              WHERE 
                cutting.orc = '$orc' 
                AND cutting_detail.size = '$size' 
              GROUP BY 
                cutting.orc, 
                cutting_detail.kode_barcode
              ";

    $query = $this->db->query($datas);
    return $query->result_array();
  }

  public function getDataSizeAndQty($orc)
  {
    $datas = "SELECT 
                cutting.orc, 
                cutting_detail.size, 
                SUM(cutting_detail.qty_pcs) as qty_pcs
              FROM 
                cutting 
                INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting 
              WHERE 
                cutting.orc = '$orc' 
              GROUP BY 
                cutting.orc, 
                cutting_detail.size
              ";

    $query = $this->db->query($datas);
    return $query->result_array();
  }

  // ==================================================================================================



  // Sewing Report
  // ==================================================================================================
  function get_datas_report($userName)
  {
    $userName = $this->session->userdata('username');

    $sql = "SELECT
					`order`.style,
					master_sam.total_sewing_sam,
					`order`.qty AS order2,
					`order`.color,
					output_sewing_detail.orc AS orc2,
					`order`.etd,
					wip.out_sewing,
					`order`.qty - wip.out_sewing AS bal 
				FROM
					( ( output_sewing JOIN output_sewing_detail ON ( output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing ) ) )
					LEFT JOIN (
					SELECT
						output_sewing_detail.orc AS orc,
						SUM( output_sewing_detail.qty ) AS out_sewing 
					FROM
						output_sewing
						JOIN output_sewing_detail ON ( output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing ) 
					GROUP BY
						output_sewing_detail.orc 
					) AS wip ON wip.orc = output_sewing_detail.orc
					LEFT JOIN `order` ON `order`.orc = output_sewing_detail.orc
					LEFT JOIN master_sam ON master_sam.style = `order`.style 
				WHERE
					output_sewing.line = '$userName' 
					AND output_sewing_detail.tgl_ass = CURRENT_DATE()
				GROUP BY
					output_sewing_detail.tgl_ass,
					output_sewing.line,
					output_sewing_detail.orc
        ";

    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_datas_detail($username)
  {
    $sql = "SELECT
					output_sewing.tgl,
					output_sewing_detail.orc,
					output_sewing_detail.no_bundle,
					output_sewing_detail.kode_barcode,
					output_sewing_detail.assembly,
					output_sewing_detail.size,
					output_sewing_detail.qty
				FROM
					output_sewing
				INNER JOIN output_sewing_detail ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing
				WHERE
					output_sewing.line = '$username' 
				AND
					output_sewing.tgl = CURRENT_DATE()
        ORDER BY
          output_sewing_detail.assembly DESC
        ";

    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function get_datas_balance($orc)
  {
    $sql = "SELECT
					cutting.orc,
					cutting.style,
					cutting.color,
					cutting_detail.no_bundle,
					cutting_detail.size,
						Sum( cutting_detail.qty_pcs ) AS qty  
				FROM
					cutting
					INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
					LEFT JOIN output_sewing_detail ON output_sewing_detail.kode_barcode = cutting_detail.kode_barcode
					LEFT JOIN output_sewing ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing
					LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode 
				WHERE
					cutting.orc = '$orc' 
					AND output_sewing_detail.kode_barcode IS NULL 
				GROUP BY
					cutting_detail.size,
					cutting.orc
				ORDER BY
          cutting_detail.no_bundle ASC
						";

    $query = $this->db->query($sql);
    return $query->result_array();
  }
  // ==================================================================================================

  // VERIFIKASI NIK PACKING
  // ==================================================================================================
  function verifikasi_nik($nik)
  {
    // $nik = $_POST['nik'];
    $data = "SELECT
    id_packing_member,
    COUNT( nik ) AS nik,
    nik AS NIKI,
    nama_lengkap,
    no_hp,
    shift,
    barcode 
    FROM
    `packing_member_new` 
    WHERE
    `packing_member_new`.`nik` = '$nik'";
    $query = $this->db->query($data);
    return $query->result_array();
  }
  function packing_responsibilites($datas)
  {
    $this->db->insert('packing_output_responsibilities', $datas);
    return $this->db->insert_id();
  }
  // ==================================================================================================
}
