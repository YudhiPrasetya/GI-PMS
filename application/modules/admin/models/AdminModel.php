<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdminModel extends CI_Model
{
  // Quote
  // ==================================================================================================
  public function getDataMasterQuote()
  {
    $data = "SELECT
                id,
                created_date,
                quote,
                author,
                active
              FROM
                master_quote 
              ORDER BY
                id DESC
              
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  public function postDataQuote($data)
  {
    $this->db->insert('master_quote', $data);
    return $this->db->insert_id();
  }
  public function updateDataActiveQuote($id_quote, $data)
  {
    $this->db->where('id', $id_quote);
    $this->db->update('master_quote', $data);
  }
  public function updateDataQuote($id_quote, $data)
  {
    $this->db->where(['id' => $id_quote]);
    $this->db->update('master_quote', $data);
  }
  public function deleteDataQuote($id_quote)
  {
    $this->db->where('id', $id_quote);
    $this->db->delete('master_quote');
  }
  // ==================================================================================================


  // USER
  // ==================================================================================================
  public function getDataMasterUser()
  {
    $data = "SELECT
              `user`.id_user,
              `user`.user_name,
              `user`.`password`,
              `user`.active,
              `user`.role,
              master_role.name_role,
              `user`.idFactory,
              master_factory.Factory
            FROM
              `user`
              LEFT JOIN master_role ON `user`.role = master_role.id_role
              LEFT JOIN master_factory ON `user`.idFactory = master_factory.idFactory
            WHERE
              master_role.id_role != 1
              ORDER BY `user`.id_user DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  function getMasterRole()
  {
    $data = "SELECT * FROM `master_role`
            ";
    $query = $this->db->query($data);
    return $query->result();
  }
  function getMasterFactory()
  {
    $data = "SELECT * FROM `master_factory`
            ";
    $query = $this->db->query($data);
    return $query->result();
  }
  public function updateDataActiveUser($id_user, $data)
  {
    $this->db->where('id_user', $id_user);
    $this->db->update('user', $data);
  }
  public function postDataUser($data)
  {
    $this->db->insert('user', $data);
    return $this->db->insert_id();
  }
  public function deleteDataUser($id_user)
  {
    $this->db->where('id_user', $id_user);
    $this->db->delete('user');
  }
  public function updateDataUser($id_user, $data)
  {
    $this->db->where(['id_user' => $id_user]);
    $this->db->update('user', $data);
  }
  // ==================================================================================================


  // LINE
  // ==================================================================================================
  public function getDataMasterLine()
  {
    $data =   "SELECT
                `line`.id_line,
                `line`.`name`,
                `line`.description,
                `line`.shift,
                `line`.operators,
                `line`.head,
                head_sewing.nama_head,
                `line`.id_spv,
                spv.`name` AS name_spv,
                `line`.floor,
                `line`.Zone,-- `line`.Zone AS name_zone,
                `line`.location,
                `line`.idFactory,
                master_factory.Factory
              FROM
                `line`
                LEFT JOIN `head_sewing` ON `line`.head = head_sewing.id
                LEFT JOIN `spv` ON line.id_spv = `spv`.id_spv
                LEFT JOIN master_factory ON line.idFactory = master_factory.idFactory
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  function getMasterHead()
  {
    $data = "SELECT
              head_sewing.id,
              head_sewing.id_astmgr,
              head_sewing.nik,
              head_sewing.nama_head 
            FROM
              head_sewing
            ";
    $query = $this->db->query($data);
    return $query->result();
  }
  function getMasterSpv()
  {
    $data = "SELECT
              spv.id_spv,
              spv.`name`,
              spv.shift,
              spv.barcode,
              spv.nik
            FROM
              spv
            ";
    $query = $this->db->query($data);
    return $query->result();
  }
  public function postDataLine($data)
  {
    $this->db->insert('line', $data);
    return $this->db->insert_id();
  }
  public function deleteDataLine($id_line)
  {
    $this->db->where('id_line', $id_line);
    $this->db->delete('line');
  }
  public function updateDatLine($id_line, $data)
  {
    $this->db->where(['id_line' => $id_line]);
    $this->db->update('line', $data);
  }
  // ==================================================================================================


  // HEAD
  // ==================================================================================================
  public function getDataMasterHead()
  {
    $data =   "SELECT
                head_sewing.id,
                head_sewing.id_astmgr,
                head_sewing.nik,
                head_sewing.nama_head
              FROM
                `head_sewing`
                ORDER BY head_sewing.id DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  public function postDataHead($data)
  {
    $this->db->insert('head_sewing', $data);
    return $this->db->insert_id();
  }
  public function deleteDataHead($id_head)
  {
    $this->db->where('id', $id_head);
    $this->db->delete('head_sewing');
  }
  public function updateDatHead($id_head, $data)
  {
    $this->db->where(['id' => $id_head]);
    $this->db->update('head_sewing', $data);
  }
  // ==================================================================================================


  // SPV
  // ==================================================================================================
  public function getDataMasterSpv()
  {
    $data =   "SELECT
                spv.id_spv,
                spv.`name`,
                spv.shift,
                spv.nik
              FROM
                `spv`
                ORDER BY spv.id_spv DESC
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  public function postDataSpv($data)
  {
    $this->db->insert('spv', $data);
    return $this->db->insert_id();
  }
  public function deleteDataSpv($id_spv)
  {
    $this->db->where('id_spv', $id_spv);
    $this->db->delete('spv');
  }
  public function updateDatSpv($id_spv, $data)
  {
    $this->db->where(['id_spv' => $id_spv]);
    $this->db->update('spv', $data);
  }
  // ==================================================================================================


  // SIZE
  // ==================================================================================================
  public function getDataMasterSize()
  {
    $data =   "SELECT
                master_size.id_mastersize,
                master_size.`group`,
                master_size.size 
              FROM
                `master_size` 
              WHERE
                master_size.`group` != 'SEWING' 
                AND master_size.`group` != 'CUTTING' 
                AND master_size.`group` != 'MOLDING'
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  function check_size($size, $group)
  {
    // $nik = $_POST['nik'];
    $data = "SELECT
              master_size.id_mastersize,
              master_size.size,
              master_size.`group`
            FROM
              `master_size`
              WHERE master_size.size = '$size'
              AND master_size.`group` = '$group'
    ";
    $query = $this->db->query($data);
    return $query->num_rows();
  }
  public function postDataSize($data)
  {
    $this->db->insert('master_size', $data);
    return $this->db->insert_id();
  }
  public function deleteDataSize($id_mastersize)
  {
    $this->db->where('id_mastersize', $id_mastersize);
    $this->db->delete('master_size');
  }
  public function updateDatSize($id_mastersize, $data)
  {
    $this->db->where(['id_mastersize' => $id_mastersize]);
    $this->db->update('master_size', $data);
  }
  // ==================================================================================================


  // DASHBOARD
  // ==================================================================================================
  public function getDataTotal_Master_Quote()
  {
    $data = "SELECT
              COUNT(master_quote.id) AS total_master_quote
            FROM
              `master_quote`
              ";
    $query = $this->db->query($data);
    return $query->result();
  }
  public function getDataTotal_Master_User()
  {
    $data = "SELECT
              COUNT(user.id_user) AS total_master_user,
              SUM(user.active = '0') AS total_user_aktif
            FROM
              `user`
              ";
    $query = $this->db->query($data);
    return $query->result();
  }
  public function getDataTotal_Master_Line()
  {
    $data = "SELECT
              COUNT(line.id_line) AS total_master_line,
              SUM(line.description IS NOT NULL) AS total_line_aktif
            FROM
              `line`
              ";
    $query = $this->db->query($data);
    return $query->result();
  }
  public function getDataTotal_Master_Head()
  {
    $data = "SELECT
              COUNT(head_sewing.id) AS total_master_head
            FROM
              `head_sewing`
              ";
    $query = $this->db->query($data);
    return $query->result();
  }
  public function getDataTotal_Master_Size()
  {
    $data = "SELECT
              COUNT(master_size.id_mastersize) AS total_master_size
            FROM
              `master_size`
              ";
    $query = $this->db->query($data);
    return $query->result();
  }
  public function getDataTotal_Master_Spv()
  {
    $data = "SELECT
              COUNT(spv.id_spv) AS total_master_spv
            FROM
              `spv`
              ";
    $query = $this->db->query($data);
    return $query->result();
  }
  // ==================================================================================================




  // ==================================================================================================
  public function getMasterFactoryData()
  {
    $data =   "SELECT
                master_factory.idFactory,
                master_factory.Factory,
                master_factory.address
              FROM
                master_factory
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  public function postDataFactory($data)
  {
    $this->db->insert('master_factory', $data);
    return $this->db->insert_id();
  }
  public function deleteDataFactory($idFactory)
  {
    $this->db->where('idFactory', $idFactory);
    $this->db->delete('master_factory');
  }
  public function updateDatFactory($idFactory, $data)
  {
    $this->db->where(['idFactory' => $idFactory]);
    $this->db->update('master_factory', $data);
  }
  // ==================================================================================================
}
