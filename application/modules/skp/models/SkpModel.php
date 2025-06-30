<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SkpModel extends CI_Model
{


    public function getDataInputSkp()
    {
        $data = "SELECT
                    productionreport.input_skp.qty,
                    productionreport.input_skp.date_created,
                    productionreport.cutting.`orc`,
                    productionreport.cutting.style,
                    productionreport.cutting.color,
                    productionreport.cutting.buyer,
                    productionreport.cutting.comm,
                    productionreport.cutting_detail.size,
                    productionreport.cutting_detail.qty_pcs,
                    productionreport.cutting_detail.kode_barcode ,
                    cutting_detail.no_bundle
                FROM
                    productionreport.cutting
                    INNER JOIN productionreport.cutting_detail ON productionreport.cutting.id_cutting = productionreport.cutting_detail.id_cutting
                    LEFT JOIN productionreport.input_skp ON productionreport.cutting_detail.id_cutting_detail = productionreport.input_skp.id_cutting_detail 
                WHERE
                    DATE(productionreport.input_skp.date_created) = CURRENT_DATE
                ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function getDataInputSkpYesterday()
    {
        $data = "SELECT
                    productionreport.input_skp.qty,
                    productionreport.input_skp.date_created,
                    productionreport.cutting.`orc`,
                    productionreport.cutting.style,
                    productionreport.cutting.color,
                    productionreport.cutting.buyer,
                    productionreport.cutting.comm,
                    productionreport.cutting_detail.size,
                    productionreport.cutting_detail.qty_pcs,
                    productionreport.cutting_detail.kode_barcode ,
                    cutting_detail.no_bundle
                FROM
                    productionreport.cutting
                    INNER JOIN productionreport.cutting_detail ON productionreport.cutting.id_cutting = productionreport.cutting_detail.id_cutting
                    LEFT JOIN productionreport.input_skp ON productionreport.cutting_detail.id_cutting_detail = productionreport.input_skp.id_cutting_detail 
                WHERE
                    DATE(productionreport.input_skp.date_created) = CURDATE() - INTERVAL 1 DAY
                ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function getDataInputMolding30DaysAgo()
    {
        $data = "SELECT
                productionreport.input_skp.qty,
                productionreport.input_skp.date_created,
                productionreport.cutting.`orc`,
                productionreport.cutting.style,
                productionreport.cutting.color,
                productionreport.cutting.buyer,
                productionreport.cutting.comm,
                productionreport.cutting_detail.size,
                productionreport.cutting_detail.qty_pcs,
                productionreport.cutting_detail.kode_barcode,
                cutting_detail.no_bundle 
            FROM
                productionreport.cutting
                INNER JOIN productionreport.cutting_detail ON productionreport.cutting.id_cutting = productionreport.cutting_detail.id_cutting
                LEFT JOIN productionreport.input_skp ON productionreport.cutting_detail.id_cutting_detail = productionreport.input_skp.id_cutting_detail 
            WHERE
                DATE( productionreport.input_skp.date_created ) BETWEEN DATE_SUB( NOW(), INTERVAL 30 DAY ) 
                AND NOW() 
            ORDER BY
                DATE( productionreport.input_skp.date_created ) DESC";

        $query = $this->db->query($data);
        return $query->result();
    }


    // public function check_by_barcode($barcode)
    // {
    //     $retVal = $this->db->get_where('skp', array('kode_barcode' => $barcode));

    //     return $retVal->row();
    // }
    public function check_barcode_mold_input_skp($barcode)
    {
        $prefix = substr($barcode, 1);

        $rst = "SELECT id_input_skp FROM `input_skp`WHERE skp_barcode = '$prefix'";
        $query = $this->db->query($rst);
        // return $this->db->last_query();
        return $query->num_rows();
    }
    public function getDataCheckBarcodeInputCuttingScanned($barcode)
    {
        $data = "SELECT
                    cutting_detail.skp_barcode,
                    input_skp.date_created 
                FROM

                    cutting
                    INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting
                    INNER JOIN input_skp ON cutting_detail.id_cutting_detail = input_skp.id_cutting_detail
                    WHERE
                    cutting_detail.skp_barcode = '$barcode'
              ";

        $query = $this->db->query($data);
        return $query->num_rows();
    }

    public function getDataCheckBarcodeCutting($barcode)
    {
        $data = "SELECT
                    cutting_detail.skp_barcode 
                FROM
                    cutting
                    INNER JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
                WHERE
                    cutting_detail.skp_barcode = '$barcode'
                ";

        $query = $this->db->query($data);
        return $query->num_rows();
    }
    public function check_barcode_($barcode)
    {
        $data = "SELECT id_cutting_detail, qty_pcs FROM cutting_detail WHERE kode_barcode ='$barcode'
                ";

        $query = $this->db->query($data);
        return $query->num_rows();
    }

    public function postDataInputCutting($data)
    {
        $this->db->insert('input_skp', $data);
        return $this->db->insert_id();
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

    public function getDataOutputSkp()
    {
        $rst = "SELECT
                t1.id_output_skp,
                t1.date_created tgl,
                t1.id_input_skp,
                t2.size,
                t3.style,
                t3.orc,
                t3.color,
                t2.no_bundle,
                t4.name line,
                t1.qty qty
            FROM
                `output_skp` t1
                LEFT JOIN input_skp ti ON t1.id_input_skp = ti.id_input_skp
                LEFT JOIN cutting_detail t2 ON ti.id_cutting_detail = t2.id_cutting_detail
                LEFT JOIN cutting t3 ON t3.id_cutting = t2.id_cutting
                LEFT JOIN line t4 ON t1.id_line = t4.id_line
            WHERE
                DATE(t1.date_created) = CURRENT_DATE
                ORDER BY
                id_output_skp DESC
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }
    public function check_input_skp_data($idCuttingDetail)
    {
        $rst = $this->db->get_where('input_skp', array("id_cutting_detail =" => $idCuttingDetail));
        return $rst->result();
    }
    public function check_output_skp($idInputJuwita)
    {
        $rst = $this->db->get_where('output_skp', array("id_input_skp =" => $idInputJuwita));
        return $rst->result();
    }

    public function save_output_skp($data)
    {
        $this->db->insert('output_skp', $data);
        return $this->db->insert_id();
    }

    public function check_barcode_skp($barcode)
    {
        $rst = $this->db->get_where('cutting_detail', array("skp_barcode =" => $barcode));
        return $rst->result();
    }
    public function check_barcode_skp_new($code)
    {
        $prefix = substr($code, 0, 1);
        $rst = $this->db->get_where('viewcutting', array(($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $code));
        return $rst->result();
    }

    public function get_report_by_date_range_cutting_bundle($dateStart, $dateEnd)
    {
        $sql = "SELECT
            t2.orc,
            t1.no_bundle,
            t1.skp_barcode,
            t3.date_created input_skp,
            t4.date_created output_skp,
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
            LEFT JOIN input_skp t3 ON t3.id_cutting_detail = t1.id_cutting_detail
            LEFT JOIN output_skp t4 ON t4.id_input_skp = t3.id_input_skp 
        WHERE
            t1.skp_barcode IS NOT NULL 
            AND t2.date_created BETWEEN '$dateStart' 
            AND '$dateEnd'";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function getCountInputSkp($date)
    {
        $sql = "SELECT sum(t1.qty) as total FROM `input_skp` t1 WHERE DATE(t1.date_created) = '$date'";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function getCountOutputSkp($date)
    {
        $sql = "SELECT sum(t1.qty) as total FROM `output_skp` t1 WHERE DATE(t1.date_created) = '$date'";
        $data = $this->db->query($sql);
        return $data->result();
    }


    public function getCountWIPSkpYearlyByBundleDateCreated()
    {
        $sql = "SELECT
            COUNT(t2.date_created) total
        FROM
            cutting_detail t1
            LEFT JOIN cutting t2 ON t1.id_cutting = t2.id_cutting
            LEFT JOIN input_skp t3 ON t3.id_cutting_detail = t1.id_cutting_detail
            LEFT JOIN output_skp t4 ON t4.id_input_skp = t3.id_input_skp 
        WHERE
            t1.skp_barcode IS NOT NULL 
            AND YEAR(t2.date_created) = YEAR(CURRENT_DATE)
            AND (t3.date_created IS NOT NULL AND t4.date_created IS NULL)";

        $data = $this->db->query($sql);
        return $data->result();
    }

    public function getDataInputSkpChart()
    {

        $rst = "	WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                date_range.tgl,
                IFNULL( input_skp_sub_query.qty_in, 0 ) AS qty_in_cutting
                FROM
                    date_range
                    LEFT JOIN (
                    SELECT
                        input_skp.date_created,
                        SUM( cutting_detail.qty_pcs ) AS qty_in 
                    FROM
                        input_skp
                        LEFT JOIN cutting_detail ON cutting_detail.id_cutting_detail = input_skp.id_cutting_detail
                    WHERE
                        DATE ( input_skp.date_created ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                        AND CURRENT_DATE () 
                    GROUP BY
                        DATE(input_skp.date_created )
                    ) AS input_skp_sub_query ON DATE(input_skp_sub_query.date_created) = date_range.tgl 
                ORDER BY
                    date_range.tgl ASC
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_by_barcode_mold($code)
    {
        $prefix = substr($code, 0, 1);
        $rst = $this->db->get_where('viewcutting', array(($prefix == "O" ? "outermold_barcode" : ($prefix == "M" ? "midmold_barcode" : "linningmold_barcode")) => $code));
        return $rst->num_rows();
    }

    public function getDataOutputSkpChart()
    {

        $rst = "WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                date_range.tgl,
                IFNULL( output_skp_sub_query.qty_out, 0 ) AS qty_out_cutting
                FROM
                    date_range
                    LEFT JOIN (
                    SELECT
                        output_skp.date_created,
                        SUM( cutting_detail.qty_pcs ) AS qty_out 
                    FROM
                        output_skp
                        LEFT JOIN input_skp ON input_skp.id_input_skp = output_skp.id_input_skp
                        LEFT JOIN cutting_detail ON cutting_detail.id_cutting_detail = input_skp.id_cutting_detail
                    WHERE
                        DATE ( output_skp.date_created ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                        AND CURRENT_DATE () 
                    GROUP BY
                        DATE(output_skp.date_created) 
                    ) AS output_skp_sub_query ON DATE(output_skp_sub_query.date_created) = date_range.tgl 
                ORDER BY
                    date_range.tgl ASC
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }
}
