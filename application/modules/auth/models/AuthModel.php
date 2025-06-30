<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AuthModel extends CI_Model
{
  var $table = "user";

  function validate($userName, $password)
  {
    $this->db->where("user_name", $userName);
    $this->db->where("password", $password);
    $rst = $this->db->get("user", 1);

    return $rst;
  }

  function update_active($user)
  {
    $this->db->where('user_name', $user);
    $this->db->update('user', array('active' => 1));

    return $this->db->affected_rows();
  }

  function update_inactive($user)
  {
    $this->db->where('user_name', $user);
    $this->db->update('user', array('active' => 0));

    return $this->db->affected_rows();
  }

  function get_by_name($name)
  {
    $rst = $this->db->get_where('user', array('user_name' => $name));

    return $rst->row(0);
  }

  public function get_all()
  {
    $result = $this->db->get('line');
    return $result->result();
  }

  public function get_group_line($name)
  {
    $row = $this->db->get_where('line', ['name' => $name])->row();
    return $row->location;
  }

  // public function getDataUser()
  // {
  //  $data = "SELECT
  //                user_wms.id_user,
  //                user_wms.user_name,
  //                user_wms.role,
  //                user_role_wms.description
  //            FROM
  //                user_wms
  //              INNER JOIN
  //              user_role_wms
  //              ON user_role_wms.id_user_role_wms = user_wms.role
  //            WHERE 
  //              role != 1
  //              AND active = 1
  //            ORDER BY
  //              description ASC
  //              ";

  //  $query = $this->db->query($data);
  //  return $query->result();
  // }


  // Quote
  // ==================================================================================================
  public function getDataQuote()
  {
    $data = "SELECT
                quote,
                author
              FROM
                master_quote 
              WHERE 
                active = 1
              ORDER BY
                RAND() 
                LIMIT 1
              ";

    $query = $this->db->query($data);
    return $query->result();
  }
  // ==================================================================================================
}
