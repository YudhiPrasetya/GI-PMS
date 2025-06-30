<?php
defined('BASEPATH') or exit('No direct script access allowed');
class JuwitaModel extends CI_Model
{
    public function get_all()
    {
        $data = "SELECT
            t1.id_input_juwita,
            t1.date_created tgl,
            t1.id_cutting_detail,
            t2.size,
            t3.style,
            t3.orc,
            t3.color,
	        t2.no_bundle,
            t1.qty qty_pcs
        FROM
            `input_juwita` t1
            LEFT JOIN cutting_detail t2 ON t1.id_cutting_detail = t2.id_cutting_detail
            LEFT JOIN cutting t3 ON t3.id_cutting = t2.id_cutting
        WHERE
              DATE(t1.date_created) > (NOW() - INTERVAL 7 DAY)
            ORDER BY
              id_input_juwita DESC";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function get_all_line()
    {
        $rst = "SELECT
                    id_line,
                    `name`
                FROM
                    line
                WHERE 
                    description IS NOT NULL
                ORDER BY
                    `name` ASC
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getDataOutputJuwita()
    {
        $rst = "SELECT
                t1.id_output_juwita,
                t1.date_created tgl,
                t1.id_input_juwita,
                t2.size,
                t3.style,
                t3.orc,
                t3.color,
                t2.no_bundle,
                t4.name line,
                t1.qty qty
            FROM
                `output_juwita` t1
                LEFT JOIN input_juwita ti ON t1.id_input_juwita = ti.id_input_juwita
                LEFT JOIN cutting_detail t2 ON ti.id_cutting_detail = t2.id_cutting_detail
                LEFT JOIN cutting t3 ON t3.id_cutting = t2.id_cutting
                LEFT JOIN line t4 ON t1.id_line = t4.id_line
            WHERE
                DATE(t1.date_created) = CURRENT_DATE
                ORDER BY
                id_output_juwita DESC
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function check_barcode_juwita($barcode)
    {
        $rst = $this->db->get_where('cutting_detail', array("juwita_barcode =" => $barcode));
        return $rst->result();
    }

    public function check_input_juwita($idCuttingDetail)
    {
        $rst = $this->db->get_where('input_juwita', array("id_cutting_detail =" => $idCuttingDetail));
        return $rst->num_rows();
    }

    public function check_input_juwita_data($idCuttingDetail)
    {
        $rst = $this->db->get_where('input_juwita', array("id_cutting_detail =" => $idCuttingDetail));
        return $rst->result();
    }

    public function save_input_juwita($data)
    {
        $this->db->insert('input_juwita', $data);
        return $this->db->insert_id();
    }

    public function save_output_juwita($data)
    {
        $this->db->insert('output_juwita', $data);
        return $this->db->insert_id();
    }

    public function check_by_barcode($id_cutting_detail)
    {
        $retVal = $this->db->get_where('input_juwita', array('id_cutting_detail' => $id_cutting_detail));

        return $retVal->row();
    }

    public function check_output_juwita($idInputJuwita)
    {
        $rst = $this->db->get_where('output_juwita', array("id_input_juwita =" => $idInputJuwita));
        return $rst->result();
    }

    public function get_report_by_date_range_cutting_bundle($dateStart, $dateEnd)
    {
        $sql = "SELECT
            t2.orc,
            t1.no_bundle,
            t1.juwita_barcode,
            t3.date_created input_juwita,
            t4.date_created output_juwita,
            t1.qty_pcs qty,
            t2.color,
            t2.date_created,
        CASE
                
                WHEN t3.date_created IS NULL THEN
                'UNPROCESSED' ELSE
            CASE
                    
                    WHEN t4.date_created IS NULL THEN
                    'WIP' ELSE 'DONE' 
                END 
                END `status` 
        FROM
            cutting_detail t1
            LEFT JOIN cutting t2 ON t1.id_cutting = t2.id_cutting
            LEFT JOIN input_juwita t3 ON t3.id_cutting_detail = t1.id_cutting_detail
            LEFT JOIN output_juwita t4 ON t4.id_input_juwita = t3.id_input_juwita 
        WHERE
            t1.juwita_barcode IS NOT NULL 
            AND t2.date_created BETWEEN '$dateStart' 
            AND '$dateEnd'";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function getCountInputJuwita($date)
    {
        $sql = "SELECT COUNT(t1.date_created) AS total FROM `input_juwita` t1 WHERE DATE(t1.date_created) = '$date'";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function getCountOutputJuwita($date)
    {
        $sql = "SELECT COUNT(t1.date_created) AS total FROM `output_juwita` t1 WHERE DATE(t1.date_created) = '$date'";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function getCountWIPJuwitaYearlyByBundleDateCreated()
    {
        $sql = "SELECT
            COUNT(t2.date_created) total
        FROM
            cutting_detail t1
            LEFT JOIN cutting t2 ON t1.id_cutting = t2.id_cutting
            LEFT JOIN input_juwita t3 ON t3.id_cutting_detail = t1.id_cutting_detail
            LEFT JOIN output_juwita t4 ON t4.id_input_juwita = t3.id_input_juwita 
        WHERE
            t1.juwita_barcode IS NOT NULL 
            AND YEAR(t2.date_created) = YEAR(CURRENT_DATE)
            AND (t3.date_created IS NOT NULL AND t4.date_created IS NULL)";

        $data = $this->db->query($sql);
        return $data->result();
    }

    public function getDataInputJuwitaChart()
    {

        $rst = "	WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                date_range.tgl,
                IFNULL( input_juwita_sub_query.qty_in, 0 ) AS qty_in_cutting
                FROM
                    date_range
                    LEFT JOIN (
                    SELECT
                        input_juwita.date_created,
                        SUM( cutting_detail.qty_pcs ) AS qty_in 
                    FROM
                        input_juwita
                        LEFT JOIN cutting_detail ON cutting_detail.id_cutting_detail = input_juwita.id_cutting_detail
                    WHERE
                        DATE ( input_juwita.date_created ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                        AND CURRENT_DATE () 
                    GROUP BY
                        input_juwita.date_created 
                    ) AS input_juwita_sub_query ON DATE(input_juwita_sub_query.date_created) = date_range.tgl 
                ORDER BY
                    date_range.tgl ASC
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getDataOutputJuwitaChart()
    {

        $rst = "WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                date_range.tgl,
                IFNULL( output_juwita_sub_query.qty_out, 0 ) AS qty_out_cutting
                FROM
                    date_range
                    LEFT JOIN (
                    SELECT
                        output_juwita.date_created,
                        SUM( cutting_detail.qty_pcs ) AS qty_out 
                    FROM
                        output_juwita
                        LEFT JOIN input_juwita ON input_juwita.id_input_juwita = output_juwita.id_input_juwita
                        LEFT JOIN cutting_detail ON cutting_detail.id_cutting_detail = input_juwita.id_cutting_detail
                    WHERE
                        DATE ( output_juwita.date_created ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                        AND CURRENT_DATE () 
                    GROUP BY
                        output_juwita.date_created 
                    ) AS output_juwita_sub_query ON DATE(output_juwita_sub_query.date_created) = date_range.tgl 
                ORDER BY
                    date_range.tgl ASC
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }
    // =========================================================================================
}
