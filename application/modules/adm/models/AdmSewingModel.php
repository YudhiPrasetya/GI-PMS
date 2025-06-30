<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdmSewingModel extends CI_Model
{

    public function getDataOrcSummary()
    {
        $data = "SELECT
					`order`.orc
				FROM
					`order`
				";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function get_data_summary_new($orc)
    {

        $rst = "SELECT
                    output_sewing_detail.orc,
                    output_sewing_detail.size,
                    output_sewing_detail.tgl_ass,
                    output_sewing_detail.assembly,
                    output_sewing_detail.qty,
                    output_sewing_detail.kode_barcode,
                    output_sewing_detail.no_bundle,
                    output_sewing.line,
                    `order`.style,
                    `order`.color,
                    output_sewing_detail.id_output_sewing_detail 
                FROM
                    output_sewing
                    INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing
                    LEFT JOIN ( SELECT `order`.orc, `order`.style, `order`.color FROM `order` WHERE `order`.orc = '$orc' ) AS `order` ON `order`.orc = output_sewing_detail.orc 
                WHERE
                    output_sewing_detail.orc = '$orc' 
                ORDER BY
                    output_sewing_detail.no_bundle ASC";

        $query = $this->db->query($rst);

        return $query->result();
    }
    public function updateDataBundle($id_output_sewing_detail, $data)
    {
        $this->db->where(['id_output_sewing_detail' => $id_output_sewing_detail]);
        $this->db->update('output_sewing_detail', $data);
    }

    public function updateBundleInputSewing($kode_barcode, $data)
    {
        $this->db->where(['kode_barcode' => $kode_barcode]);
        $this->db->update('input_sewing', $data);
    }

    public function deleteBundle($id_output_sewing_detail)
    {
        $this->db->where('id_output_sewing_detail', $id_output_sewing_detail);
        $this->db->delete('output_sewing_detail');
    }
}
