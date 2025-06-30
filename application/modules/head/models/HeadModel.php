<?php
defined('BASEPATH') or exit('No direct script access allowed');
class HeadModel extends CI_Model
{

    public function getAllSewing($head)
    {
        $rst = "SELECT
                    otd.line,
                    otd.tgl_ass,
                    otd.qty,
                    ln.nama_head,
                    ln.description 
                FROM
                    (
                    SELECT
                        output_sewing.line,
                        output_sewing_detail.tgl_ass,
                        SUM( output_sewing_detail.qty ) AS qty 
                    FROM
                        output_sewing
                        INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing 
                    WHERE
                        output_sewing_detail.tgl_ass = CURRENT_DATE 
                    GROUP BY
                        output_sewing.line,
                        output_sewing_detail.tgl_ass 
                    ) AS otd
                    LEFT JOIN ( SELECT line.`name`, line.description, head_sewing.nama_head FROM line INNER JOIN head_sewing ON line.head = head_sewing.id ) AS ln ON otd.line = ln.`name` 
                WHERE
                    ln.nama_head = '$head'
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getQtySewing($head)
    {
        $rst = "SELECT
                    otd.line,
                    otd.tgl_ass,
                    SUM( otd.qty ) AS qty,
                    ln.nama_head,
                    ln.description 
                FROM
                    (
                    SELECT
                        output_sewing.line,
                        output_sewing_detail.tgl_ass,
                        SUM( output_sewing_detail.qty ) AS qty 
                    FROM
                        output_sewing
                        INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing 
                    WHERE
                        output_sewing_detail.tgl_ass = CURRENT_DATE 
                    GROUP BY
                        output_sewing.line,
                        output_sewing_detail.tgl_ass 
                    ) AS otd
                    LEFT JOIN ( SELECT line.`name`, line.description, head_sewing.nama_head FROM line INNER JOIN head_sewing ON line.head = head_sewing.id ) AS ln ON otd.line = ln.`name` 
                WHERE
                    ln.nama_head = '$head' 
                GROUP BY
                    ln.nama_head
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getCountSewing($head)
    {
        $rst = "SELECT
                    otd.tgl_ass,
                    ln.nama_head,
                    COUNT( otd.line ) AS qty 
                FROM
                    (
                    SELECT
                        output_sewing.line,
                        output_sewing_detail.tgl_ass,
                        SUM( output_sewing_detail.qty ) AS qty 
                    FROM
                        output_sewing
                        INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing 
                    WHERE
                        output_sewing_detail.tgl_ass = CURRENT_DATE 
                    GROUP BY
                        output_sewing.line,
                        output_sewing_detail.tgl_ass 
                    ) AS otd
                    LEFT JOIN ( SELECT line.`name`, line.description, head_sewing.nama_head FROM line INNER JOIN head_sewing ON line.head = head_sewing.id ) AS ln ON otd.line = ln.`name` 
                WHERE
                    ln.nama_head = '$head' 
                GROUP BY
                    ln.nama_head
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getCountOrc($head)
    {
        $rst = "SELECT
                    otd.tgl_ass,
                    ln.nama_head,
                    COUNT( otd.orc ) AS qty 
                FROM
                    (
                    SELECT
                        output_sewing.line,
                        output_sewing_detail.orc,
                        output_sewing_detail.tgl_ass,
                        SUM( output_sewing_detail.qty ) AS qty 
                    FROM
                        output_sewing
                        INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing 
                    WHERE
                        output_sewing_detail.tgl_ass = CURRENT_DATE 
                    GROUP BY
                        output_sewing.line,
                        output_sewing_detail.orc,
                        output_sewing_detail.tgl_ass 
                    ) AS otd
                    LEFT JOIN ( SELECT line.`name`, line.description, head_sewing.nama_head FROM line INNER JOIN head_sewing ON line.head = head_sewing.id ) AS ln ON otd.line = ln.`name` 
                WHERE
                    ln.nama_head = '$head' 
                GROUP BY
                    ln.nama_head
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getOutputYesterday($head)
    {
        $rst = "SELECT
                    otd.tgl_ass,
                    SUM( otd.qty ) AS qty,
                    ln.nama_head 
                FROM
                    (
                    SELECT
                        output_sewing.line,
                        output_sewing_detail.tgl_ass,
                        SUM( output_sewing_detail.qty ) AS qty 
                    FROM
                        output_sewing
                        INNER JOIN output_sewing_detail ON output_sewing.id_output_sewing = output_sewing_detail.id_output_sewing 
                    WHERE
                        output_sewing_detail.tgl_ass = CURRENT_DATE - 1 
                    GROUP BY
                        output_sewing.line,
                        output_sewing_detail.tgl_ass 
                    ) AS otd
                    LEFT JOIN ( SELECT line.`name`, line.description, head_sewing.nama_head FROM line INNER JOIN head_sewing ON line.head = head_sewing.id ) AS ln ON otd.line = ln.`name` 
                WHERE
                    ln.nama_head = '$head' 
                GROUP BY
                    ln.nama_head
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getAbsentSewing($head)
    {
        $rst = "SELECT
                    x1.NIK,
                    x1.`name`,
                    x1.position,
                    x1.op_name,
                    x1.ln,
                    x1.nama_head,
                CASE
                        
                        WHEN x1.waktu IS NULL THEN
                    CASE
                            
                            WHEN x1.paidLeave IS NULL THEN
                            'TANPA KETERANGAN' ELSE x1.paidLeave 
                        END ELSE x1.waktu 
                    END alasan 
                FROM
                    (
                    SELECT
                        y1.NIK,
                        y1.`name`,
                        y1.position,
                        y2.paidLeave,
                        y2.dateStart,
                        y2.dateEnd,
                    CASE
                            
                            WHEN y1.op_name IS NULL THEN
                            'Tidak Memiliki Operation' ELSE y1.op_name 
                        END op_name,
                    y1.ln,
                    y1.nama_head,
                    y1.tanggal,
                    y1.waktu 
                FROM
                    (
                    SELECT
                        t1.empID,
                        t1.NIK,
                        t1.`name`,
                        t5.position,
                        t4.op_name,
                        t3.ln,
                        t3.nama_head,
                        DATE( t2.enroll ) tanggal,
                        MIN( TIME( t2.enroll ) ) waktu 
                    FROM
                        HRS_1.mstEmp t1
                        LEFT JOIN HRS_1.attandenceLog t2 ON t1.NIK = t2.NIK 
                        AND DATE( t2.enroll ) = CURRENT_DATE ( )
                        LEFT JOIN (
                        SELECT
                            b.id,
                            a.`NAME`,
                            b.ln,
                            hs.nama_head 
                        FROM
                            line AS a
                            LEFT JOIN (
                            SELECT
                                HRS_1.mstWorkgroup.idWG AS id,
                                SUBSTR( HRS_1.mstWorkgroup.Workgroup, 14 ) AS ln 
                            FROM
                                HRS_1.mstWorkgroup 
                            WHERE
                                ( HRS_1.mstWorkgroup.Workgroup LIKE '%SHIFT%' ) 
                            ) AS b ON a.`NAME` = b.ln
                            LEFT JOIN head_sewing AS hs ON a.head = hs.id 
                        ) t3 ON t3.id = t1.idWG
                        LEFT JOIN ( SELECT id, op_name, id_employee FROM layout.master_opt_layout ) t4 ON t4.id_employee = t1.empID
                        LEFT JOIN HRS_1.mstPost t5 ON t5.idPost = t1.idPost 
                    WHERE
                        t1.activeEmp = '1' 
                        AND t3.ln IS NOT NULL 
                    GROUP BY
                        t1.NIK 
                    ORDER BY
                        t4.id DESC 
                    ) y1
                    LEFT JOIN (
                    SELECT
                        t1.idx,
                        t1.NIK,
                        t2.paidLeave,
                        t1.dateStart,
                        t1.dateEnd 
                    FROM
                        HRS_1.transaksiLeavePaid t1
                        LEFT JOIN HRS_1.mstPaidLeave t2 ON t1.idPaidLeave = t2.idPaidLeave 
                    ORDER BY
                        idx DESC 
                    ) y2 ON y1.NIK = y2.NIK 
                    AND CURRENT_DATE BETWEEN y2.dateStart 
                    AND y2.dateEnd 
                WHERE
                    y1.waktu IS NULL 
                    OR y1.tanggal IS NULL 
                GROUP BY
                    y1.NIK 
                ORDER BY
                    y1.ln ASC 
                    ) x1 
                WHERE
                    x1.nama_head = '$head'
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_summary_sewing_orc()
    {

        $rst = "SELECT
					input_sewing.orc,
					input_sewing.style,
					input_sewing.color,
					`order`.comm,
					`order`.buyer,
					`order`.so,
					`order`.color,
					`order`.etd,
					`order`.plan_export,
					`order`.qty,
					SUM( input_sewing.qty_pcs ) AS sew_in,
					COALESCE ( ot_sew.sew_out, 0 ) AS sew_out,
					SUM( input_sewing.qty_pcs ) - COALESCE ( ot_sew.sew_out, 0 ) AS wip,
					`order`.qty - COALESCE ( ot_sew.sew_out, 0 ) AS balance 
				FROM
					input_sewing
					LEFT JOIN `order` ON input_sewing.orc = `order`.orc
					LEFT JOIN ( SELECT output_sewing_detail.orc, SUM( output_sewing_detail.qty ) AS sew_out FROM output_sewing_detail GROUP BY output_sewing_detail.orc ) AS ot_sew ON ot_sew.orc = input_sewing.orc 
				WHERE
					`order`.`status` = 'On Progress' 
				GROUP BY
					input_sewing.orc";
        $query = $this->db->query($rst);

        return $query->result_array();
    }
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
    public function get_detail_summaries($orc)
    {
        $rst = "SELECT
					output_sewing_detail.orc,
					output_sewing_detail.tgl_ass,
					output_sewing_detail.qty 
				FROM
					output_sewing_detail 
				WHERE
					output_sewing_detail.orc = '$orc' 
				";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_summary_sewing_orc_new($orc)
    {

        $rst = "SELECT
					`order`.orc,
					`order`.style,
					`order`.color,
					`order`.buyer,
					`order`.etd,
					`order`.so,
					`order`.qty,
					ins.qty AS sew_in,
					ots.sew_out,
					COALESCE ( ins.qty, 0 ) - COALESCE ( ots.sew_out, 0 ) AS wip,
					`order`.qty - COALESCE ( ots.sew_out, 0 ) AS balance 
				FROM
					`order`
					LEFT JOIN ( SELECT input_sewing.orc, SUM( input_sewing.qty_pcs ) AS qty FROM input_sewing WHERE input_sewing.orc = '$orc' GROUP BY input_sewing.orc ) AS ins ON ins.orc = `order`.orc
					LEFT JOIN ( SELECT output_sewing_detail.orc, SUM( output_sewing_detail.qty ) AS sew_out FROM output_sewing_detail WHERE output_sewing_detail.orc = '$orc' GROUP BY output_sewing_detail.orc ) AS ots ON ots.orc = `order`.orc 
				WHERE
					`order`.orc = '$orc'";
        $query = $this->db->query($rst);

        return $query->result_array();
    }

    public function get_data_defect()
    {
        $data = $_POST['data'];
        $tgl = $data['tgl'];
        $line = $data['line'];

        $rst = "SELECT
                    qc_endline_defect.created_date,
                    DATE( qc_endline_defect.created_date ) AS tgl,
                    qc_endline_defect.line,
                    qc_endline_defect.orc,
                    dt_defect2.DCode,
                    dt_defect2.Defect,
                    SUM( qc_endline_defect.qty_defect ) qty_defect,
                    ln.nama_head 
                FROM
                    qc_endline_defect
                    LEFT JOIN dt_defect2 ON qc_endline_defect.id_defect = dt_defect2.id_df
                    LEFT JOIN (
                    SELECT
                        line.`name`,
                        line.description,
                        line.head,
                        head_sewing.nama_head 
                    FROM
                        line
                        INNER JOIN head_sewing ON line.head = head_sewing.id 
                    ) AS ln ON qc_endline_defect.line = ln.`name` 
                WHERE
                    ln.nama_head = '$line' 
                    AND DATE( qc_endline_defect.created_date ) = '$tgl' 
                GROUP BY
                    qc_endline_defect.line,
                    qc_endline_defect.orc,
                    dt_defect2.DCode";

        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_data_sewing_hour($head)
    {
        $rst = "SELECT
                    table2.HR,
                    table2.tgl_ass,
                    table2.line,
                    table2.nama_head,
                    table2.orc,
                    table2.style,
                    table2.color,
                    table2.pertama,
                    table2.kedua,
                    table2.ketiga,
                    table2.keempat,
                    table2.kelima,
                    table2.keenam,
                    table2.ketuju,
                    table2.kedelan,
                    table2.kesembilan,
                    table2.kesepuluh,
                    (
                        table2.pertama + table2.kedua + table2.ketiga + table2.keempat + table2.kelima + table2.keenam + table2.ketuju + table2.kedelan + table2.kesembilan + table2.kesepuluh 
                    ) AS total 
                FROM
                    (
                    SELECT
                        table1.tgl_ass,
                        table1.HR,
                        table1.line,
                        line.nama_head,
                        table1.orc,
                        `order`.style,
                        `order`.color,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '1' THEN table1.resultQty END ), 0 ) AS pertama,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '2' THEN table1.resultQty END ), 0 ) AS kedua,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '3' THEN table1.resultQty END ), 0 ) AS ketiga,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '4' THEN table1.resultQty END ), 0 ) AS keempat,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '5' THEN table1.resultQty END ), 0 ) AS kelima,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '6' THEN table1.resultQty END ), 0 ) AS keenam,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '7' THEN table1.resultQty END ), 0 ) AS ketuju,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '8' THEN table1.resultQty END ), 0 ) AS kedelan,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '9' THEN table1.resultQty END ), 0 ) AS kesembilan,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '10' THEN table1.resultQty END ), 0 ) AS kesepuluh 
                    FROM
                        (
                        SELECT
                            dayname( output_sewing_detail.tgl_ass ) AS HR,
                            output_sewing_detail.tgl_ass,
                            output_sewing.line,
                            output_sewing_detail.orc,
                            COALESCE ( SUM( output_sewing_detail.qty ), 0 ) AS resultQty,
                            newDurationLine ( dayname( output_sewing_detail.tgl_ass ), output_sewing_detail.assembly ) AS timePeriode 
                        FROM
                            output_sewing
                            INNER JOIN output_sewing_detail ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing 
                        WHERE
                            output_sewing_detail.tgl_ass = CURRENT_DATE 
                        GROUP BY
                            output_sewing_detail.tgl_ass,
                            output_sewing.line,
                            newDurationLine ( dayname( output_sewing_detail.tgl_ass ), output_sewing_detail.assembly ) 
                        ) table1
                        LEFT JOIN (
                        SELECT
                            line.`name`,
                            line.description,
                            line.head,
                            head_sewing.nama_head 
                        FROM
                            line
                            INNER JOIN head_sewing ON line.head = head_sewing.id 
                        ) AS line ON line.`name` = table1.line
                        LEFT JOIN ( SELECT `order`.style, `order`.color, `order`.orc FROM `order` ) AS `order` ON `order`.orc = table1.orc 
                    WHERE
                        line.nama_head = '$head' 
                    GROUP BY
                        table1.line,
                        table1.tgl_ass 
                    ) AS table2 
                WHERE
                    table2.nama_head = '$head'
        ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_data_sewing_hour_range($date, $head)
    {
        $rst = "SELECT
                    table2.HR,
                    table2.tgl_ass,
                    table2.line,
                    table2.nama_head,
                    table2.orc,
                    table2.style,
                    table2.color,
                    table2.pertama,
                    table2.kedua,
                    table2.ketiga,
                    table2.keempat,
                    table2.kelima,
                    table2.keenam,
                    table2.ketuju,
                    table2.kedelan,
                    table2.kesembilan,
                    table2.kesepuluh,
                    (
                        table2.pertama + table2.kedua + table2.ketiga + table2.keempat + table2.kelima + table2.keenam + table2.ketuju + table2.kedelan + table2.kesembilan + table2.kesepuluh 
                    ) AS total 
                FROM
                    (
                    SELECT
                        table1.tgl_ass,
                        table1.HR,
                        table1.line,
                        line.nama_head,
                        table1.orc,
                        `order`.style,
                        `order`.color,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '1' THEN table1.resultQty END ), 0 ) AS pertama,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '2' THEN table1.resultQty END ), 0 ) AS kedua,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '3' THEN table1.resultQty END ), 0 ) AS ketiga,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '4' THEN table1.resultQty END ), 0 ) AS keempat,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '5' THEN table1.resultQty END ), 0 ) AS kelima,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '6' THEN table1.resultQty END ), 0 ) AS keenam,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '7' THEN table1.resultQty END ), 0 ) AS ketuju,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '8' THEN table1.resultQty END ), 0 ) AS kedelan,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '9' THEN table1.resultQty END ), 0 ) AS kesembilan,
                        COALESCE ( sum( CASE WHEN table1.timePeriode = '10' THEN table1.resultQty END ), 0 ) AS kesepuluh 
                    FROM
                        (
                        SELECT
                            dayname( output_sewing_detail.tgl_ass ) AS HR,
                            output_sewing_detail.tgl_ass,
                            output_sewing.line,
                            output_sewing_detail.orc,
                            COALESCE ( SUM( output_sewing_detail.qty ), 0 ) AS resultQty,
                            newDurationLine ( dayname( output_sewing_detail.tgl_ass ), output_sewing_detail.assembly ) AS timePeriode 
                        FROM
                            output_sewing
                            INNER JOIN output_sewing_detail ON output_sewing_detail.id_output_sewing = output_sewing.id_output_sewing 
                        WHERE
                            output_sewing_detail.tgl_ass = '$date' 
                        GROUP BY
                            output_sewing_detail.tgl_ass,
                            output_sewing.line,
                            newDurationLine ( dayname( output_sewing_detail.tgl_ass ), output_sewing_detail.assembly ) 
                        ) table1
                        LEFT JOIN (
                        SELECT
                            line.`name`,
                            line.description,
                            line.head,
                            head_sewing.nama_head 
                        FROM
                            line
                            INNER JOIN head_sewing ON line.head = head_sewing.id 
                        ) AS line ON line.`name` = table1.line
                        LEFT JOIN ( SELECT `order`.style, `order`.color, `order`.orc FROM `order` ) AS `order` ON `order`.orc = table1.orc 
                    WHERE
                        line.nama_head = '$head' 
                    GROUP BY
                        table1.line,
                        table1.tgl_ass 
                    ) AS table2 
                WHERE
                    table2.nama_head = '$head'
                        ";

        $query = $this->db->query($rst);

        return $query->result();
    }

    public function get_by_daterange_daily()
    {
        $db3 = $this->load->database('database3', true);
        if (isset($_POST['dataStr'])) {
            $dataStr = $_POST['dataStr'];

            $from_date = date('Y-m-d', strtotime($dataStr['from_date']));
            $to_date = date('Y-m-d', strtotime($dataStr['to_date']));
            $head =  $dataStr['head'];
        }
        $rst = "SELECT
                    date( `machine_breakdown`.`date_start_waiting` ) AS tgl_waiting,
                    gomekanik.mekanik_member.NIK,
                    gomekanik.mekanik_member.Nama,
                    gomekanik.machine_breakdown.id_machine_breakdown,
                    gomekanik.machine_breakdown.line,
                    gomekanik.machine_breakdown.barcode_machine,
                    gomekanik.machine_breakdown.machine_brand,
                    gomekanik.machine_breakdown.machine_type,
                    gomekanik.machine_breakdown.type,
                    gomekanik.machine_breakdown.machine_sn,
                    gomekanik.machine_breakdown.sympton,
                    gomekanik.machine_breakdown.date_start_waiting AS date_start_waiting,
                    gomekanik.machine_breakdown.date_end_waiting AS date_end_waiting,
                    date( `mekanik_repairing`.`date_end_repairing` ) AS date_end_repairing,
                    time( `machine_breakdown`.`date_start_waiting` ) AS start_waiting,
                    time( `mekanik_repairing`.`date_start_repairing` ) AS start_repairing,
                    time( `mekanik_repairing`.`date_end_repairing` ) AS end_repairing,
                    timediff( `mekanik_repairing`.`date_start_repairing`, `machine_breakdown`.`date_start_waiting` ) AS respon_duration,
                    timediff( `mekanik_repairing`.`date_end_repairing`, `mekanik_repairing`.`date_start_repairing` ) AS repair_duration,
                    ( to_days( date( `machine_breakdown`.`date_end_waiting` ) ) - to_days( date( `machine_breakdown`.`date_start_waiting` ) ) ) AS date_waiting,
                    ( to_days( date( `mekanik_repairing`.`date_end_repairing` ) ) - to_days( date( `mekanik_repairing`.`date_start_repairing` ) ) ) AS date_repairing,
                    gomekanik.machine_settled.catatan,
                    productionreport.head_sewing.nama_head 
                FROM
                    gomekanik.machine_breakdown
                    LEFT JOIN gomekanik.mekanik_repairing ON mekanik_repairing.id_machine_breakdown = machine_breakdown.id_machine_breakdown
                    LEFT JOIN gomekanik.mekanik_member ON mekanik_member.id_mekanik_member = mekanik_repairing.id_mekanik_member
                    LEFT JOIN gomekanik.machine_settled ON machine_breakdown.id_machine_breakdown = machine_settled.id_machine_breakdown
                    LEFT JOIN productionreport.line ON gomekanik.machine_breakdown.line = productionreport.line.`name`
                    INNER JOIN productionreport.head_sewing ON productionreport.line.head = productionreport.head_sewing.id 
                WHERE
                    date( `machine_breakdown`.`date_start_waiting` ) >= '$from_date' 
                    AND date( `machine_breakdown`.`date_start_waiting` ) <= '$to_date' 
                    AND productionreport.head_sewing.nama_head = '$head' 
                ORDER BY
                    date( `machine_breakdown`.`date_start_waiting` ) ASC";

        $query = $db3->query($rst);
        return $query->result();
    }
}
