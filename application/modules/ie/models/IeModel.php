<?php
defined('BASEPATH') or exit('No direct script access allowed');
class IeModel extends CI_Model
{
  protected $id_factory;

  public function __construct()
  {
    parent::__construct();
    $this->id_factory = $this->session->userdata('id_factory');
  }
  // Dashboard
  // ==================================================================================================
  function getDataCountMasterSam()
  {
    $sql = "SELECT
              style
            FROM
              `master_sam`
            WHERE 
              style IS NOT NULL
              AND id_factory = $this->id_factory
            GROUP BY
              style
    ";
    $query = $this->db->query($sql);
    return $query->num_rows();
  }

  function getDataCountMasterSamNew()
  {
    $sql = "SELECT
              style
            FROM
              master_sam_new
    ";
    $query = $this->db->query($sql);
    return $query->num_rows();
  }
  // ==================================================================================================





  // Master SAM
  // ==================================================================================================
  function list()
  {
    $sql = "SELECT
              id_master_sam,
              style,
              color,
              grup_size,
              sam_cutting,
              linning_sam,
              mid_sam,
              outer_sam,
              total_mold_sam,
              center_panel_sam,
              back_wings_sam,
              cups_sam,
              assembly_sam,
              total_sewing_sam,
              packing_sam
            FROM
              `master_sam`
            WHERE
              id_factory = $this->id_factory
            ORDER BY
              id_master_sam DESC
    ";
    $query = $this->db->query($sql);
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

  function postDataMasterSam($data)
  {
    $this->db->insert('master_sam', $data);
    return $this->db->insert_id();
  }

  function updateDataMasterSam($id, $data)
  {
    $this->db->where('id_master_sam', $id);
    $this->db->update('master_sam', $data);

    return $this->db->affected_rows();
  }

  public function deleteDataMasterSam($id_master_sam)
  {
    $this->db->where('id_master_sam', $id_master_sam);
    $this->db->delete('master_sam');

    return $this->db->affected_rows();
  }
  // ==================================================================================================





  // Master SAM (Old)
  // ==================================================================================================
  function list_old()
  {
    $sql = "SELECT
              id_master_sam,
              created,
              style,
              sam 
            FROM
              `master_sam_new` 
            WHERE
              `deleted` IS NULL
              AND
              id_factory = '$this->id_factory'
            ORDER BY
              id_master_sam DESC";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function delete_old($id_master_sam, $data)
  {
    $this->db->where('id_master_sam', $id_master_sam);
    $this->db->update('master_sam_new', $data);

    return $this->db->affected_rows();
  }

  function add_old($data)
  {
    $this->db->insert('master_sam_new', $data);
    return $this->db->insert_id();
  }

  // ==================================================================================================




  // Master SAM (New)
  // ==================================================================================================
  function list_new()
  {
    $sql = "SELECT
              id_master_sam,
              style,
              color,
              grup_size,
              sam_cutting,
              linning_sam,
              mid_sam,
              outer_sam,
              total_mold_sam,
              center_panel_sam,
              back_wings_sam,
              cups_sam,
              assembly_sam,
              total_sewing_sam,
              packing_sam
            FROM
              `master_sam`
            WHERE
              id_factory = '$this->id_factory'
            ORDER BY
              id_master_sam DESC";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function delete_sam($id_master_sam, $data)
  {
    $this->db->where('id_master_sam', $id_master_sam);
    $this->db->update('master_sam_new', $data);

    return $this->db->affected_rows();
  }

  function add_new($style)
  {
    $sql = "INSERT INTO master_sam (style, color, grup_size, sam_cutting, linning_sam, mid_sam, outer_sam, total_mold_sam, center_panel_sam, back_wings_sam, cups_sam, assembly_sam, total_sewing_sam, packing_sam, id_factory)
            VALUES  ('$style', 'color', 'extra large', '1.370', '1.712', '1.277', '1.277', '4.266', '0.767', '2.939', '3.158', '3.871', '15.033', '1.293', '$this->id_factory'),
                    ('$style', 'color', 'big', '1.370', '1.712', '1.277', '1.277', '4.266', '0.767', '2.939', '3.158', '3.871', '15.033', '1.293', '$this->id_factory'),
                    ('$style', 'color', 'reguler', '1.370', '1.621', '1.210', '1.210', '4.041', '0.658', '2.764', '2.789', '3.583', '14.250', '1.290', '$this->id_factory'),
                    ('$style', 'Black', 'extra large', '1.370', '1.540', '1.149', '1.149', '3.838', '0.655', '2.750', '2.775', '3.543', '15033', '1.293', '$this->id_factory'),
                    ('$style', 'Black', 'big', '1.370', '1.480', '0.843', '0.843', '3.166', '0.767', '2.939', '3.158', '3.871', '14.250', '1.290', '$this->id_factory'),
                    ('$style', 'Black', 'reguler', '1.370', '1.402', '0.798', '0.798', '2.998', '0.658', '2.764', '2.789', '3.583', '15.033', '1.293', '$this->id_factory'),
                    ('$style', 'White', 'extra large', '1.370', '1.332', '0.758', '0.758', '2.848', '0.655', '2.750', '2.775', '3.543', '14.250', '1.290', '$this->id_factory'),
                    ('$style', 'White', 'big', '1.370', '1.480', '0.843', '0.843', '3.166', '0.767', '2.939', '3.158', '3.871', '16.164', '1.293', '$this->id_factory'),
                    ('$style', 'White', 'reguler', '1.370', '1.402', '0.798', '0.798', '2.998', '0.658', '2.764', '2.789', '3.583', '15.194', '1.290', '$this->id_factory')";
    $this->db->query($sql, array($style, $style));

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteDataSam($id_master_sam)
  {
    $this->db->where('id_master_sam', $id_master_sam);
    $this->db->delete('master_sam');
  }
  // ==================================================================================================




}
