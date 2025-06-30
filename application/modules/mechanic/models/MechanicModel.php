<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MechanicModel extends CI_Model
{
  // Dashboard
  // ==================================================================================================
  public function count_repairing_machines()
  {
    $db3 = $this->load->database('database3', true);
    $db3->select('count(line) as countLine');
    $db3->from('machine_breakdown');
    $db3->where('status', 'Repairing...');

    return $db3->get()->row();
  }

  public function count_waiting_machines()
  {
    $db3 = $this->load->database('database3', true);
    $db3->select('count(line) as countLine');
    $db3->from('machine_breakdown');
    $db3->where('status', 'Waiting...');

    return $db3->get()->row();
  }

  public function count_all_machines()
  {
    $db3 = $this->load->database('database3', true);
    $db3->select('count(line) as countLine');
    $db3->from('machine_breakdown');
    $db3->where('status', 'Waiting...');
    $db3->or_where('status', 'Repairing...');

    return $db3->get()->row();
  }

  public function getDataActiveMechanics()
  {
    $data = "SELECT
                COUNT( user_mekanik.id_user_mekanik ) AS count_active_mechanics 
              FROM
                mekanik_member AS mekanik_member
                INNER JOIN user_mekanik AS user_mekanik ON mekanik_member.id_mekanik_member = user_mekanik.id_mekanik_member 
              WHERE
                user_mekanik.active = 1
              ";
    $db3 = $this->load->database('database3', true);
    $query = $db3->query($data);
    return $query->result();
  }

  public function getDataChartMachineBreakdown($date)
  {
    $data = "SELECT
                machine_type,
                COUNT( machine_type ) AS count_machine_type 
              FROM
                `machine_breakdown` 
              WHERE
                tgl = '$date'
                AND `status` = 'Settled' 
                AND machine_type IS NOT NULL 
              GROUP BY
                machine_type 
              ORDER BY
                machine_type ASC
              ";
    $db3 = $this->load->database('database3', true);
    $query = $db3->query($data);
    return $query->result();
  }

  // ==================================================================================================



  // User
  // ==================================================================================================
  public function getDataMasterUser()
  {
    $data = "SELECT
                user_mekanik.id_user_mekanik,
                mekanik_member.id_mekanik_member,
                mekanik_member.NIK,
                mekanik_member.Nama,
                mekanik_member.inisial,
                mekanik_member.Bagian,
                mekanik_member.Shift,
                user_mekanik.user_name,
                user_mekanik.active 
              FROM
                mekanik_member AS mekanik_member
                LEFT JOIN user_mekanik AS user_mekanik ON mekanik_member.id_mekanik_member = user_mekanik.id_mekanik_member
              ORDER BY 
                user_mekanik.active DESC,
                mekanik_member.Nama ASC
              ";
    $db3 = $this->load->database('database3', true);
    $query = $db3->query($data);
    return $query->result();
  }

  public function getDataCheckUser($nik)
  {
    $data = "SELECT
              id_mekanik_member
            FROM
              `mekanik_member` 
            WHERE
              NIK = $nik
              ";

    $db3 = $this->load->database('database3', true);
    $query = $db3->query($data);
    return $query->num_rows();
  }

  public function postDataNewUser($data)
  {
    $db3 = $this->load->database('database3', true);
    $id = $db3->insert('mekanik_member', $data);

    return $id;
  }

  public function updateDataUser($id_mekanik_member, $data)
  {
    $db3 = $this->load->database('database3', true);

    $db3->where(['id_mekanik_member' => $id_mekanik_member]);
    $db3->update('mekanik_member', $data);
  }

  function updateDataNewsActive($id_user_mekanik, $data)
  {
    $db3 = $this->load->database('database3', true);

    $db3->where('id_user_mekanik', $id_user_mekanik);
    $db3->update('user_mekanik', $data);
  }
  // ==================================================================================================



  // Machine Breakdown Monitoring
  // ==================================================================================================
  public function get_1stfloor_data()
  {
    date_default_timezone_set('Asia/Jakarta');

    // $timeNow = date('H:i:s');
    // if($timeNow >= date("H:i:s", strtotime('07:00:00')) && $timeNow <= date("H:i:s", strtotime('14:30:00'))){
    //      $shift = 1;
    // }else if($timeNow >= date("H:i:s",strtotime("14:31:00")) && $timeNow <= date("H:i:s",strtotime("22:15:00"))){
    //      $shift = 2;
    // }
    $db3 = $this->load->database('database3', true);
    $db3->where('floor', '1st Floor');
    // $this->db->where('shift', $shift);
    $db3->group_start();
    $db3->where('status', 'Waiting...');
    $db3->or_where('status', 'Repairing...');
    $db3->group_end();
    // $this->db->order_by('floor', 'asc');
    $result = $db3->get('viewmachinesbreakdown');
    if ($result->result() != null) {
      $arrDataReturn = array();
      foreach ($result->result() as $r) {
        if ($r->status == "Waiting...") {
          $startTime = new DateTime($r->start_waiting);
        } else if ($r->status == "Repairing...") {
          $startTime = new DateTime($r->end_waiting);
        }
        $endTime = new DateTime();
        $duration = $startTime->diff($endTime);

        $data = array(
          "id_machine_breakdown" => $r->id_machine_breakdown,
          "machine_brand" => $r->machine_brand,
          "line" => $r->line,
          "tgl" => $r->tgl_breakdown,
          "machine_type" => $r->machine_type,
          "machine_sn" => $r->machine_sn,
          "type" => $r->type,
          "floor" => $r->floor,
          "sympton" => $r->sympton,
          "status" => $r->status,
          "start_waiting" => $r->start_waiting,
          "inisial" => $r->mekanik_inisial,
          "duration" => $duration->format("%H:%I:%S")
        );
        // print_r($data);

        array_push($arrDataReturn, $data);
      }
      // print_r($arrDataReturn);

      return $arrDataReturn;
    }

    // $result = $this->db->get($this->view);

    // return $this->db->last_query();
    // return $result->result();
  }
  // ==================================================================================================


  // Machine Breakdown
  // ==================================================================================================
  public function get_1stfloor_waiting_data()
  {
    date_default_timezone_set('Asia/Jakarta');

    $db3 = $this->load->database('database3', true);
    $db3->where('floor', '1st Floor');
    $db3->where('status', 'Waiting...');
    // $this->db->order_by('floor', 'asc');
    $result = $db3->get('viewmachinesbreakdown');
    if ($result->result() != null) {
      $arrDataReturn = array();
      foreach ($result->result() as $r) {
        $startTime = new DateTime($r->start_waiting);
        $endTime = new DateTime();
        $duration = $startTime->diff($endTime);

        $data = array(
          "id_machine_breakdown" => $r->id_machine_breakdown,
          "machine_brand" => $r->machine_brand,
          "line" => $r->line,
          "tgl" => $r->tgl_breakdown,
          "machine_type" => $r->machine_type,
          "machine_sn" => $r->machine_sn,
          "type" => $r->type,
          "floor" => $r->floor,
          "sympton" => $r->sympton,
          "status" => $r->status,
          "start_waiting" => $r->start_waiting,
          "inisial" => $r->mekanik_inisial,
          "duration" => $duration->format("%H:%I:%S")
        );

        array_push($arrDataReturn, $data);
      }

      return $arrDataReturn;
    }
  }
  // ==================================================================================================


  // Machine Repairing
  // ==================================================================================================
  public function get_1stfloor_repairing_data()
  {
    date_default_timezone_set('Asia/Jakarta');

    $db3 = $this->load->database('database3', true);
    $db3->where('floor', '1st Floor');
    $db3->where('status', 'Repairing...');
    // $this->db->order_by('floor', 'asc');
    $result = $db3->get('viewmachinesbreakdown');
    if ($result->result() != null) {
      $arrDataReturn = array();
      foreach ($result->result() as $r) {
        $startTime = new DateTime($r->end_waiting);
        $endTime = new DateTime();
        $duration = $startTime->diff($endTime);

        $data = array(
          "id_machine_breakdown" => $r->id_machine_breakdown,
          "machine_brand" => $r->machine_brand,
          "line" => $r->line,
          "tgl" => $r->tgl_breakdown,
          "machine_type" => $r->machine_type,
          "machine_sn" => $r->machine_sn,
          "type" => $r->type,
          "floor" => $r->floor,
          "sympton" => $r->sympton,
          "status" => $r->status,
          "start_waiting" => $r->start_waiting,
          "inisial" => $r->mekanik_inisial,
          "duration" => $duration->format("%H:%I:%S")
        );

        array_push($arrDataReturn, $data);
      }

      return $arrDataReturn;
    }
  }
  // ==================================================================================================



  // Clearing Machine Breakdown
  // ==================================================================================================
  public function get_machines_breakdown_or_repairing()
  {
    $db3 = $this->load->database('database3', true);
    $db3->from('viewmachinesbreakdown');
    $db3->where('status', 'Waiting...');
    $db3->or_where('status', 'Repairing...');
    $db3->order_by('id_machine_breakdown', 'DESC');
    $rst = $db3->get();

    return $rst->result();
  }

  public function clear_machine_breakdown_or_repairing($id)
  {
    // $affRow = 0;
    $db3 = $this->load->database('database3', true);
    $rst = $db3->get_where('machine_breakdown', ['id_machine_breakdown' => $id])->row();

    if ($rst->status == 'Waiting...') {
      $affRow = $this->_deleteMachineBreakdown($id);
    } else if ($rst->status == 'Repairing...') {
      $db3->delete('mekanik_repairing', ['id_machine_breakdown' => $id]);
      $rows = $db3->affected_rows();
      if ($rows > 0) {
        $affRow = $this->_deleteMachineBreakdown($id);
      }
    }

    return $affRow;
  }

  private function _deleteMachineBreakdown($id)
  {
    $db3 = $this->load->database('database3', true);
    $db3->delete('machine_breakdown', ['id_machine_breakdown' => $id]);
    return $db3->affected_rows();
  }

  // ==================================================================================================




}
