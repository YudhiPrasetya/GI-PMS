<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PackingModel extends CI_Model
{
    protected $id_factory;

    function __construct()
    {
        parent::__construct();
        $this->id_factory = $this->session->userdata('id_factory');
    }

    // Dashboard
    // ===================================================================================================
    function getDataTotalInFinishGood()
    {
        $sql = "SELECT
                    IFNULL(COUNT( carton_no ), 0) AS qty_box,
                    IFNULL(SUM(qty_box), 0) as total_qty_in_finish_good
                FROM
                    `transfer_area`
                    INNER JOIN `order` ON `order`.orc = `transfer_area`.orc
                WHERE
                    DATE( tgl_in ) = CURRENT_DATE ()
                    AND `order`.id_factory = $this->id_factory 
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getDataTotalOutFinishGood()
    {
        $sql = "SELECT
                    IFNULL( COUNT( carton_no ), 0 ) AS qty_box,
                    IFNULL( SUM( qty_box ), 0 ) AS total_qty_out_finish_good 
                FROM
                    `transfer_area`
                    INNER JOIN `order` ON `order`.orc = `transfer_area`.orc
                WHERE
                    DATE( tgl_out ) = CURRENT_DATE ()
                    AND `order`.id_factory = $this->id_factory 
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getDataTotalInFinishGoodChart()
    {
        $sql = "WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                    date_range.tgl,
                    IFNULL( in_finish_good_sub_query.qty_in, 0 ) AS qty_in_finish_good
                    FROM
                        date_range
                        LEFT JOIN (
                        SELECT
                            DATE ( tgl_in ) as tgl,
                            SUM( qty_box ) AS qty_in 
                        FROM
                            transfer_area
                            INNER JOIN `order` ON `order`.orc = `transfer_area`.orc
                        WHERE
                            DATE ( tgl_in ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                            AND CURRENT_DATE () 
                            AND `order`.id_factory = $this->id_factory
                        GROUP BY
                            DATE( tgl_in ) 
                        ) AS in_finish_good_sub_query ON in_finish_good_sub_query.tgl = date_range.tgl 
                    ORDER BY
                        date_range.tgl ASC
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getDataTotalOutFinishGoodChart()
    {
        $sql = "WITH RECURSIVE date_range AS ( SELECT CURRENT_DATE ( ) AS tgl UNION ALL SELECT tgl - INTERVAL 1 DAY FROM date_range WHERE tgl > CURRENT_DATE ( ) - INTERVAL 6 DAY ) SELECT
                    date_range.tgl,
                    IFNULL( out_finish_good_sub_query.qty_out, 0 ) AS qty_out_finish_good 
                    FROM
                        date_range
                        LEFT JOIN (
                        SELECT
                            DATE ( tgl_out ) AS tgl,
                            SUM( qty_box ) AS qty_out 
                        FROM
                            transfer_area
                            INNER JOIN `order` ON `order`.orc = transfer_area.orc
                        WHERE
                            DATE ( tgl_out ) BETWEEN ADDDATE( CURRENT_DATE ( ), INTERVAL - 6 DAY ) 
                            AND CURRENT_DATE ()
                            AND `order`.id_factory = $this->id_factory
                        GROUP BY
                            DATE( tgl_out ) 
                        ) AS out_finish_good_sub_query ON out_finish_good_sub_query.tgl = date_range.tgl 
                    ORDER BY
                        date_range.tgl ASC
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getDataCapacityLine()
    {
        $sql = "SELECT
                    packing_preparation_line.line,
                    IFNULL(count_box_sub_query.total_box,0) as total_box,
                    packing_preparation_line.max_box_capacity,
                    ROUND(IFNULL(count_box_sub_query.total_box,0) / packing_preparation_line.max_box_capacity * 100, 2) as percentage
                FROM
                    packing_preparation_line
                    LEFT JOIN (
                        SELECT
                            transfer_area.lokasi,
                            COUNT( transfer_area.carton_no ) AS total_box 
                        FROM
                            transfer_area
                            INNER JOIN `order` ON `order`.orc = transfer_area.orc
                        WHERE
                            transfer_area.`status` = 'in'
                            AND `order`.id_factory = $this->id_factory
                        GROUP BY
                            transfer_area.lokasi
                        ORDER BY
                            transfer_area.lokasi ASC
                    ) as count_box_sub_query ON packing_preparation_line.line = count_box_sub_query.lokasi
                WHERE
                    packing_preparation_line.line != 'Export'
                    AND packing_preparation_line.id_factory = $this->id_factory
                ORDER BY
                    packing_preparation_line.id_line ASC
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getDataCapacityLineDetails($line)
    {
        $sql = "SELECT
                    orc,
                    style,
                    color,
                    size,
                    carton_no,
                    qty_box,
                    barcode,
                    lokasi
                FROM
                    transfer_area 
                WHERE
                    `status` = 'in' 
                    AND lokasi = '$line'
                ORDER BY
                    `orc` ASC,
                    carton_no ASC
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    // ===================================================================================================


    // Master Order Packing
    // ===================================================================================================
    public function getDataSize()
    {
        $data = "SELECT
                id_mastersize,
                `size` as `size`,
                `group` 
              FROM
                master_size
              ORDER BY 
                `size`+ 0
              ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function getDataMasterOrderPacking()
    {
        // $data = "SELECT
        //             id,
        //             created_date,
        //             orc,
        //             style,
        //             color,
        //             buyer,
        //             no_po,
        //             qty_order
        //         FROM
        //             master_order_packing_main
        //         WHERE 
        //             id_factory = $this->id_factory
        //         ORDER BY
        //             id DESC
        //       ";
        $query = $this->db->get_where('master_order_packing_main', ['id_factory' => $this->id_factory]);

        // $query = $this->db->query($data);
        return $query->result();
    }

    public function getDataMasterOrderPackingDetails($id)
    {
        $data = "SELECT
                    master_size.size,
                    master_order_packing_details.qty,
                    master_order_packing_details.carton_capacity
                FROM
                    master_order_packing_details
                    INNER JOIN master_size ON master_order_packing_details.id_master_size = master_size.id_mastersize
                WHERE
                    master_order_packing_details.id_master_order_packing_main = $id
                ORDER BY
                    master_size.size ASC
              ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function getMasterOrderPackingDetailById($id){
        $query = $this->db->get_where('master_order_packing_details', ['id_master_order_packing_main' => $id]);
        return $query->result();
    }

    public function postDataMasterOrderPackingMain($data_main)
    {
        $this->db->insert('master_order_packing_main', $data_main);
        return $this->db->insert_id();
    }

    public function postDataMasterOrderPackingDetails($data_details)
    {
        $this->db->insert_batch('master_order_packing_details', $data_details);
    }

    public function getMasterOrderPackingdetails(){
        $rst = $this->db->get('view_masterorderpacking');
        return $rst->result();
    }

    // ===================================================================================================
    public function get_count_cartons_all()
    {
        $this->db->select('count(carton_no) as count_cartons_all');
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $row = $this->db->get('transfer_area');

        return $row->row();
    }

    public function get_count_cartons_out()
    {
        $this->db->select('count(carton_no) as count_cartons_out');
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('status', 'out');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $row = $this->db->get('transfer_area');

        return $row->row();
    }

    public function get_count_cartons_in()
    {
        $this->db->select('count(carton_no) as count_cartons_in');
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('status', 'in');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $row = $this->db->get('transfer_area');

        return $row->row();
    }

    public function get_sum_pcs_all()
    {
        $this->db->select('sum(qty_box) as sum_pcs_all');
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $row = $this->db->get('transfer_area');

        return $row->row();
    }
    public function get_sum_pcs_out()
    {
        $this->db->select('sum(qty_box) as sum_pcs_out');
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $this->db->where('status', 'out');
        $row = $this->db->get('transfer_area');

        return $row->row();
    }
    public function get_sum_pcs_in()
    {
        $this->db->select('sum(qty_box) as sum_pcs_in');
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $this->db->where('status', 'in');
        $row = $this->db->get('transfer_area');

        return $row->row();
    }


    public function get_all_lines()
    {
        $this->db->select('id_line, line, max_box_capacity');
        $this->db->from('packing_preparation_line');
        $rst = $this->db->get();

        return $rst->result();
    }

    public function get_count_status_in()
    {
        $this->db->select('lokasi, COUNT(carton_no) AS jmlKarton');
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $this->db->where('status', 'in');
        $this->db->group_by('lokasi');

        $rst = $this->db->get('transfer_area');
        return $rst->result();
    }

    public function all_filter_by_line()
    {
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select(
            'DISTINCT(lokasi) as lokasi, id_transfer_area ,orc, size, DATE(tgl_in) AS tgl_in, DATE(tgl_out) AS tgl_out,po, 
			style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, status'
        );
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $this->db->group_by('lokasi');
        $this->db->order_by('lokasi');
        $rst = $this->db->get('transfer_area');

        return $rst->result();
    }

    // public function get_all_member()
    // {
    //     $this->db->order_by('nama_lengkap');
    //     $result = $this->db->get('packing_member_new');

    //     return $result->result_array();
    // }
    function get_all_member()
    {
        $sql = "SELECT
                    id_packing_member,
                    nik,
                    nama_lengkap,
                    no_hp,
                    shift,
                    barcode
                FROM
                    packing_member_new
                WHERE
                    id_factory =  $this->id_factory
                ORDER BY
                    nama_lengkap ASC
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // public function out_filter_by_line()
    // {
    //     $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    //     $this->db->select(
    //         'DISTINCT(lokasi) as lokasi, id_transfer_area ,orc, size, DATE(tgl_out) AS tgl_out,po, 
    // 		style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, status'
    //     );
    //     $this->db->group_by('lokasi');
    //     $this->db->order_by('lokasi');
    //     $this->db->where('status', 'out');
    //     $rst = $this->db->get('transfer_area');

    //     return $rst->result();
    // }

    function out_filter_by_line()
    {
        $sql = "SELECT
                    transfer_area.tgl_out,
                    transfer_area.po,
                    transfer_area.style,
                    transfer_area.color,
                    transfer_area.orc,
                    transfer_area.size,
                    transfer_area.carton_no,
                    transfer_area.qty_box,
                    transfer_area.barcode,
                    packing_member_new.nama_lengkap,
                    transfer_area.lokasi 
                FROM
                    transfer_area
                    INNER JOIN `order` ON `order`.orc = transfer_area.orc
                    LEFT JOIN packing_member_new ON transfer_area.barcode_operator = packing_member_new.barcode
                WHERE
                    DATE( transfer_area.tgl_out ) = CURRENT_DATE () 
                ORDER BY
                    transfer_area.id_transfer_area DESC
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_fg_by_line_out($line)
    {
        $this->db->where('lokasi', $line);
        $this->db->where('status', 'out');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $rst = $this->db->get('transfer_area');

        // print_r($rst->result());

        return $rst->result();
    }
    public function get_fg_by_line($line)
    {
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('lokasi', $line);
        $this->db->where('`order`.id_factory', $this->id_factory);
        $rst = $this->db->get('transfer_area');

        // print_r($rst->result());

        return $rst->result();
    }

    // public function in_filter_by_line()
    // {
    //     $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    //     $this->db->select(
    //         'DISTINCT(lokasi) as lokasi, id_transfer_area ,orc, size, DATE(tgl_in) AS tgl_in,po, 
    // 		style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, status'
    //     );
    //     $this->db->group_by('lokasi');
    //     $this->db->order_by('lokasi');
    //     $this->db->where('status', 'in');
    //     $rst = $this->db->get('transfer_area');

    //     return $rst->result();
    // }

    function in_filter_by_line()
    {
        $sql = "SELECT
                transfer_area.tgl_in,
                transfer_area.po,
                transfer_area.style,
                transfer_area.color,
                transfer_area.orc,
                transfer_area.size,
                transfer_area.carton_no,
                transfer_area.qty_box,
                transfer_area.barcode,
                packing_member_new.nama_lengkap,
                transfer_area.lokasi 
            FROM
                transfer_area
                LEFT JOIN packing_member_new ON transfer_area.barcode_operator = packing_member_new.barcode
                LEFT JOIN `order` ON `order`.orc = transfer_area.orc
            WHERE
                DATE( transfer_area.tgl_in ) = CURRENT_DATE () 
                AND transfer_area.tgl_out IS NULL
                AND `order`.id_factory = $this->id_factory
            ORDER BY
                transfer_area.id_transfer_area DESC
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_fg_by_line_in($lokasi)
    {
        $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        $this->db->where('`order`.id_factory', $this->id_factory);
        $this->db->where('lokasi', $lokasi);
        $this->db->where('status', 'in');

        $rst = $this->db->get('transfer_area');
        return $rst->result();
    }

    public function save_member()
    {
        if (isset($_POST['nik'])) {
            $nik = $_POST['nik'];
            $barcode = $nik;
        }

        if (isset($_POST['nama_lengkap'])) {
            $namaLengkap = $_POST['nama_lengkap'];
        }

        if (isset($_POST['no_hp'])) {
            $noHP = $_POST['no_hp'];
        }

        if (isset($_POST['shift'])) {
            $shift = $_POST['shift'];
        }

        $dataInsert = array(
            'nik' => $nik,
            'nama_lengkap' => $namaLengkap,
            'no_hp' => $noHP,
            'shift' => $shift,
            'barcode' => $barcode,
            'id_factory' => $this->id_factory
        );

        $this->db->insert('packing_member_new', $dataInsert);

        return $this->db->insert_id();
    }


    public function update_member()
    {
        if (isset($_POST['id_packing_member'])) {
            $idPackingMember = $_POST['id_packing_member'];
        }

        if (isset($_POST['nik'])) {
            $nik = $_POST['nik'];
            $barcode = $nik;
        }

        if (isset($_POST['nama_lengkap'])) {
            $namaLengkap = $_POST['nama_lengkap'];
        }

        if (isset($_POST['no_hp'])) {
            $noHP = $_POST['no_hp'];
        }

        if (isset($_POST['shift'])) {
            $shift = $_POST['shift'];
        }

        $dataUpdate = array(
            'nik' => $nik,
            'nama_lengkap' => $namaLengkap,
            'no_hp' => $noHP,
            'shift' => $shift
            // 'barcode' => $barcode
        );

        $this->db->update('packing_member_new', $dataUpdate, array('id_packing_member' => $idPackingMember));

        return $this->db->affected_rows();
    }

    public function delete_member($id)
    {
        $this->db->delete('packing_member_new', array('id_packing_member' => $id));

        return $this->db->affected_rows();
    }

    public function get_by_id($id)
    {
        $result = $this->db->get_where('packing_member_new', array('id_packing_member' => $id));

        return $result->row_array();
    }

    // public function get_kapasitas_karton_by_style_distinct()
    // {
    //     $this->db->distinct();
    //     $this->db->select('style');
    //     $result = $this->db->get('kapasitas_karton');

    //     $data = array(
    //         'data' => $result->result()
    //     );
    //     return $data;
    // }

    function get_kapasitas_karton_by_style_distinct()
    {
        $sql = "SELECT
                    style 
                FROM
                    kapasitas_karton 
                WHERE
                    style != '0'
                    AND style != '1'
                    AND id_factory = $this->id_factory
                GROUP BY
                    style 
                ORDER BY
                    style ASC
        ";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_capacity()
    {

        $style = $_POST['style'];

        $sql = " SELECT
                    id_packing_karton,
                    style,
                    `size`,
                    kapasitas_karton
                FROM
                    kapasitas_karton
                WHERE
                    kapasitas_karton.style = '$style'
                ORDER BY
                    `size` ASC
                
        ";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function get_by_style_size()
    {
        if (isset($_POST['dataPacking'])) {
            $dataPacking = $_POST['dataPacking'];
            $style = $dataPacking['style'];
            $size = $dataPacking['size'];

            $sql = "SELECT * FROM kapasitas_karton WHERE '$style' LIKE CONCAT('%', style, '%') AND size='$size'";


            $r = $this->db->query($sql);

            return $r->row();
            // return $this->db->last_query();
        }
    }

    public function get_by_style()
    {
        $styleVal = $_GET['styleVal'];
        $rst = $this->db->get_where('kapasitas_karton', array('style' => $styleVal));

        return $rst->result();
    }

    public function update_kapasitas_karton()
    {
        if (isset($_POST['dataKapasitasKarton'])) {
            $dataKapsitasKarton = $_POST['dataKapasitasKarton'];

            $id = $dataKapsitasKarton['id_packing_karton'];
            $style = $dataKapsitasKarton['style'];
            $size = $dataKapsitasKarton['size'];
            $kapasitas_karton = $dataKapsitasKarton['kapasitas_karton'];

            $data = array(
                'style' => $style,
                'size' => $size,
                'kapasitas_karton' => $kapasitas_karton
            );

            $this->db->update('kapasitas_karton', $data, array('id_packing_karton' => $id));

            return $this->db->affected_rows();
        }
    }
    public function get_solid_packing()
    {
        $this->db->distinct();
        $this->db->select(
            'solid_packing_list.orc,
             solid_packing_list.wo,
             solid_packing_list.color,
             solid_packing_list.style'
        );
        $this->db->from('solid_packing_list');
        // $this->db->join('order', 'order.orc = solid_packing_list.orc');
        // $this->db->where('order.id_factory', $this->id_factory);
        $this->db->where('solid_packing_list.id_factory', $this->id_factory);
        $rst = $this->db->get();

        $data = array(
            'data' => $rst->result()
        );
        return $data;
    }

    // public function get_solid_packing_detail($style, $orc)
    // {
    //     $this->db->join('order', 'order.orc = solid_packing_list.orc');
    //     $this->db->where('order.id_factory', $this->id_factory);
    //     $this->db->where('order.orc', $orc);
    //     $this->db->where('order.style', $style);
    //     $rst = $this->db->get('solid_packing_list');

    //     return $rst->result();
    //     // }
    // }
    public function get_solid_packing_detail($style, $wo)
    {
        // $data = "SELECT
        //             solid_packing_list.size,
        //             solid_packing_list.qty,
        //             solid_packing_list.box_capacity,
        //             solid_packing_list.total_box
        //         FROM
        //             solid_packing_list 
        //             INNER JOIN `order` ON solid_packing_list.orc = `order`.orc
        //         WHERE
        //             `order`.id_factory = $this->id_factory
        //             AND solid_packing_list.orc = '$orc'
        //             AND solid_packing_list.style = '$style'
        // ";
        // $query = $this->db->query($data);
        $query = $this->db->get_where('solid_packing_list', ['wo' => $wo, 'style' => $style]);
        return $query->result();
    }

    public function get_by_orc($orc)
    {
        $result = $this->db->get_where('viewpackingbarcode', array('orc' => $orc));
        return $result->result();
    }

    public function get_by_wo($wo)
    {
        $result = $this->db->get_where('viewpackingbarcode', array('wo' => $wo));
        return $result->result();
    }

    // public function get_by_orc_list($orc)
    // {
    //     $result = $this->db->get_where('solid_packing_list', array('orc' => $orc));

    //     return $result->result_array();
    // }

    public function get_by_wo_list($wo)
    {
        $result = $this->db->get_where('solid_packing_list', array('wo' => $wo));

        return $result->result_array();
    }

    public function deleteDataPackingList($orc)
    {


        $data = "DELETE solid_packing_list, solid_packing_barcode
                FROM
                    solid_packing_list
                LEFT JOIN solid_packing_barcode ON solid_packing_list.id_packing_list = solid_packing_barcode.id_packing_list
                WHERE
                solid_packing_list.orc = '$orc'";
        $this->db->query($data);
    }

    public function delete($ids)
    {
        if (is_array($ids)) {
            $this->db->where_in('id_packing_list', $ids);
        } else {
            $this->db->where('id_packing_list', $ids);
        }
        $delete = $this->db->delete('solid_packing_barcode');

        return $delete ? true : false;
    }

    public function delete_by_orc($orc)
    {
        $this->db->where('orc', $orc);
        $delete = $this->db->delete('solid_packing_list');

        return $delete ? true : false;
    }

    public function delete_by_wo($wo)
    {
        $this->db->where('wo', $wo);
        $delete = $this->db->delete('solid_packing_list');

        return $delete ? true : false;
    }


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
                    `input_packing`.line
                FROM
                    `input_packing`
                    INNER JOIN `order` ON `order`.orc = `input_packing`.orc
                WHERE
                    DATE(`input_packing`.tgl) = CURRENT_DATE()
                    AND `order`.id_factory = $this->id_factory
                ORDER BY
                    `input_packing`.id_input_packing DESC
        ";
        $query = $this->db->query($data);
        return $query->result();
    }
    public function get_all_distinct()
    {
        $this->db->distinct();
        $this->db->select('input_packing.orc, input_packing.style, input_packing.color, input_packing.line');
        $this->db->from('input_packing');
        $this->db->join('order', 'order.orc = input_packing.orc');
        $this->db->where('id_factory', $this->id_factory);
        $query = $this->db->get();

        return $query->result();
    }

    public function check_input_packing($barcode)
    {
        $rst = $this->db->get_where('input_packing', array('kode_barcode' => $barcode));

        return $rst->num_rows();
    }

    public function get_cutting_detail($barcode)
    {
        $result = $this->db->get_where('viewcuttingdone', array('kode_barcode' => $barcode));

        return $result->row();
    }
    public function check_output_sewing_detail($barcode)
    {
        $rst = $this->db->get_where('output_sewing_detail', array('kode_barcode' => $barcode));

        return $rst->num_rows();
    }

    public function save()
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

    // public function get_detail_output($orc)
    // {
    //     $rst = $this->db->get_where('input_packing', ['orc' => $orc]);

    //     return $rst->result();
    // }
    public function get_by_orc1_packing($orc)
    {
        $this->db->order_by('id_input_packing', 'DESC');
        $rst = $this->db->get_where('input_packing', ['orc' => $orc]);
        return $rst->result();
    }

    public function get_mixed_packing()
    {
        $sql = "SELECT
                    mixed_packing_list.id_order,
                    mixed_packing_list.po,
                    `order`.orc,
                    `order`.style,
                    mixed_packing_list.color,
                    SUM( mixed_packing_list.total_pcs ) AS total_pcs,
                    SUM( mixed_packing_list.jmlh_karton ) AS total_carton 
                FROM
                    mixed_packing_list
                    LEFT JOIN `order` ON mixed_packing_list.id_order = `order`.id_order
                WHERE
                    `order`.id_factory = $this->id_factory
                GROUP BY
                    mixed_packing_list.po,
                    `order`.style,
                    mixed_packing_list.color";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getMixedSizePackingListDetails($id_order)
    {
        $data = "SELECT
                        mixed_packing_list.id_order,
                        mixed_packing_list_barcode.box_number,
                        mixed_packing_list_barcode.barcode,
                        mixed_size_list.size,
                        mixed_size_list.qty 
                    FROM
                        mixed_packing_list
                        INNER JOIN `order` ON mixed_packing_list.id_order = `order`.id_order
                        INNER JOIN mixed_packing_list_barcode ON mixed_packing_list.id_mixed = mixed_packing_list_barcode.id_mixed
                        INNER JOIN mixed_size_list ON mixed_packing_list.id_mixed = mixed_size_list.id_mixed 
                    WHERE
                        mixed_packing_list.id_order = $id_order 
                        AND mixed_size_list.qty != 0
                        AND `order`.id_factory = $this->id_factory
                    ORDER BY
                        mixed_packing_list_barcode.barcode ASC
                ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function get_by_po($po)
    {
        $po_no = str_replace('%20', ' ', $po);

        $data = "SELECT
					mixed_packing_list.id_mixed,
					mixed_packing_list.po,
					mixed_packing_list.color,
					mixed_packing_list_barcode.barcode,
					mixed_packing_list_barcode.box_number,
					mixed_packing_list.pcs_box,
					`order`.style,
					`order`.orc 
				FROM
					mixed_packing_list
					LEFT JOIN mixed_packing_list_barcode ON mixed_packing_list.id_mixed = mixed_packing_list_barcode.id_mixed
					LEFT JOIN `order` ON mixed_packing_list.id_order = `order`.id_order 
				WHERE
					mixed_packing_list.po = '$po_no'
                    AND `order`.id_factory = $this->id_factory
				ORDER BY
					mixed_packing_list_barcode.barcode ASC";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function deleteDataMixedPackingList($id_order)
    {

        $data = "DELETE mixed_packing_list, mixed_size_list, mixed_packing_list_barcode 
                FROM
                    mixed_packing_list
                    INNER JOIN mixed_size_list ON mixed_packing_list.id_mixed = mixed_size_list.id_mixed
                    INNER JOIN mixed_packing_list_barcode ON mixed_packing_list.id_mixed = mixed_packing_list_barcode.id_mixed 
                WHERE
                    mixed_packing_list.id_order = $id_order";
        $this->db->query($data);
    }

    public function getDataOutputMixedSizePackingTable()
    {
        $data = "SELECT 
                    `order`.id_order,
                    `order`.so as po, 
                    `order`.orc, 
                    `order`.style, 
                    `order`.color, 
                    SUM(mixed_packing_list.jmlh_karton) as box, 
                    output_mixed_packing_list_sub_query.total_actual_box 
                FROM 
                    mixed_packing_list 
                    INNER JOIN `order` ON mixed_packing_list.id_order = `order`.id_order 
                    INNER JOIN (
                    SELECT 
                        orc, 
                        COUNT(barcode) AS total_actual_box 
                    FROM 
                        output_mixed_packing_list 
                    GROUP BY 
                        orc
                    ) as output_mixed_packing_list_sub_query ON `order`.orc = output_mixed_packing_list_sub_query.orc
                WHERE 
                    `order`.id_factory = $this->id_factory
                GROUP BY 
                    `order`.so, 
                    `order`.orc, 
                    `order`.style, 
                    `order`.color, 
                    output_mixed_packing_list_sub_query.total_actual_box      
                ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function getDataMixedPackingCheckingBarcodeRegistered($barcode)
    {
        $data = "SELECT
                        mixed_packing_list.id_mixed,
                        mixed_packing_list_barcode.barcode 
                    FROM
                        mixed_packing_list
                        INNER JOIN mixed_packing_list_barcode ON mixed_packing_list.id_mixed = mixed_packing_list_barcode.id_mixed
                        INNER JOIN `order` ON mixed_packing_list.id_order = `order`.id_order
                    WHERE
                        mixed_packing_list_barcode.barcode = '$barcode'
                        AND `order`.id_factory = $this->id_factory
                ";

        $query = $this->db->query($data);
        return $query->num_rows();
    }

    public function getDataMixedPackingCheckingBarcode($barcode)
    {
        $data = "SELECT
                        barcode 
                    FROM
                        `output_mixed_packing_list` 
                    WHERE
                        barcode = '$barcode'
                ";

        $query = $this->db->query($data);
        return $query->num_rows();
    }

    public function getDataMixedBarcodeDetails($barcode)
    {
        $data = "SELECT
                    mixed_packing_list_barcode.barcode,
                    `order`.orc,
                    mixed_packing_list_barcode.box_number,
                    mixed_packing_list.id_mixed,
                    mixed_packing_list.id_order 
                FROM
                    mixed_packing_list
                    INNER JOIN mixed_packing_list_barcode ON mixed_packing_list.id_mixed = mixed_packing_list_barcode.id_mixed
                    INNER JOIN `order` ON mixed_packing_list.id_order = `order`.id_order 
                WHERE
                    mixed_packing_list_barcode.barcode = $barcode
                ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function postOutputMixedSizePacking($data)
    {
        $this->db->insert('output_mixed_packing_list', $data);
        return $this->db->insert_id();
    }



    public function getDataOutputMixedSizePackingListDetails($id_order)
    {
        $data = "SELECT
                    mixed_packing_list.id_order,
                    sub_query_output_mixing_packing_list.created_date,
                    mixed_packing_list_barcode.box_number,
                    mixed_packing_list_barcode.barcode,
                    mixed_size_list.size,
                    mixed_size_list.qty AS qty_in,
                    sub_query_output_mixing_packing_list.qty_out 
                FROM
                    mixed_packing_list
                    INNER JOIN `order` ON mixed_packing_list.id_order = `order`.id_order
                    INNER JOIN mixed_packing_list_barcode ON mixed_packing_list.id_mixed = mixed_packing_list_barcode.id_mixed
                    INNER JOIN mixed_size_list ON mixed_packing_list.id_mixed = mixed_size_list.id_mixed
                    LEFT JOIN (
                    SELECT
                        `output_mixed_packing_list`.created_date,
                        `output_mixed_packing_list`.barcode,
                        mixed_size_list.size,
                        mixed_size_list.qty AS qty_out 
                    FROM
                        `output_mixed_packing_list`
                        INNER JOIN mixed_size_list ON output_mixed_packing_list.id_mixed = mixed_size_list.id_mixed 
                    WHERE
                        `output_mixed_packing_list`.id_order = $id_order 
                        AND mixed_size_list.qty != 0 
                    ) AS sub_query_output_mixing_packing_list ON mixed_packing_list_barcode.barcode = sub_query_output_mixing_packing_list.barcode 
                    AND mixed_size_list.size = sub_query_output_mixing_packing_list.size 
                WHERE
                    mixed_packing_list.id_order = $id_order 
                    AND mixed_size_list.qty != 0 
                ORDER BY
                    mixed_packing_list_barcode.barcode ASC
                ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function get_po1()
    {
        $sql = "SELECT
                    `order`.so AS po 
                FROM
                    `order` 
                WHERE
                    `order`.so IS NOT NULL
                    AND `order`.so != ''
                    AND `order`.id_factory = $this->id_factory
                GROUP BY
                    `order`.so 
                ORDER BY
                    `order`.so ASC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function getDataOrcStyle($po_no)
    {
        $data = "SELECT
                    id_order,
                    `orc`,
                    style,
                    color,
                    qty AS qty_order 
                FROM
                    `order` 
                WHERE
                    so = '$po_no'
                ORDER BY 
                    `orc` ASC
                ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function check_mixed_packing_list_by_po($id_order, $po)
    {
        $rst = $this->db->get_where('mixed_packing_list', ['id_order' => $id_order, 'po' => $po]);

        return $rst->num_rows();
    }

    // public function get_cutting_by_po2($po)
    // {

    //     $data = "SELECT
    // 				`order`.so AS po,
    // 				`order`.color,
    // 				`order`.style,
    // 				output_sewing_detail.size
    // 			FROM
    // 				`order`
    // 				LEFT JOIN output_sewing ON output_sewing.orc = `order`.orc
    // 				LEFT JOIN output_sewing_detail ON output_sewing_detail.orc = output_sewing.orc 
    // 			WHERE
    // 				`order`.so = '$po' 
    // 				AND output_sewing_detail.size IS NOT NULL 
    // 			GROUP BY
    // 				output_sewing_detail.size 
    // 			ORDER BY
    // 				output_sewing_detail.size ASC";
    //     $query = $this->db->query($data);
    //     return $query->result();
    // }

    public function get_cutting_by_po2($po)
    {
        $data = "SELECT
                    `order`.so AS po,
                    `order`.color,
                    `order`.style,
                    cutting_detail.size 
                FROM
                    `order`
                    LEFT JOIN cutting ON `order`.orc = cutting.orc
                    LEFT JOIN cutting_detail ON cutting.id_cutting = cutting_detail.id_cutting 
                WHERE
                    `order`.so = '$po' 
                    AND cutting_detail.size IS NOT NULL 
                GROUP BY
                    cutting_detail.size 
                ORDER BY
                    cutting_detail.size  + 0,
                    cutting_detail.size ASC ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function get_color($po)
    {

        $data = "SELECT
					`order`.so AS po,
					`order`.color,
					`order`.style,
					output_sewing_detail.size
				FROM
					`order`
					LEFT JOIN output_sewing ON output_sewing.orc = `order`.orc
					LEFT JOIN output_sewing_detail ON output_sewing_detail.orc = output_sewing.orc 
				WHERE
					`order`.so = '$po' 
					AND output_sewing_detail.size IS NOT NULL 
				GROUP BY
					`order`.color
				ORDER BY
					`order`.color ASC";
        $query = $this->db->query($data);
        return $query->result();
    }

    public function insert_mixed_packing_list()
    {
        date_default_timezone_set('Asia/Jakarta');

        if (isset($_POST['arrdata'])) {
            $arrdataX = $_POST['arrdata'];
            $arrdata = [];
            $arrid = [];
            foreach ($arrdataX as $p) {
                $arrdata = [
                    // 'id_mixed' => null,
                    'id_order' => $p['id_order'],
                    'created_date' => date('Y-m-d H:i:s'),
                    'po' => $p['po'],
                    // 'style' => $p['style'],
                    'color' => $p['color'],
                    'box_start' => $p['box_start'],
                    'box_end' => $p['box_end'],
                    // 'type' => $p['type'],
                    'total_pcs' => $p['total_pcs'],
                    'pcs_box' => $p['pcs_box'],
                    'jmlh_karton' => $p['jmlh_karton'],
                ];

                // var_dump($arrdata);
                // die();
                $this->db->insert('mixed_packing_list', $arrdata);
                array_push($arrid, $this->db->insert_id());
            }

            return $arrid;
        }
    }

    public function insert_mixed_packing_list_barcode()
    {
        if (isset($_POST['arrdata'])) {
            $arrdataX = $_POST['arrdata'];
            $arrdata = [];
            $arrdata = [];
            $arrid = [];
            $arridx = [];
            foreach ($arrdataX as $p) {
                $arrdata = [
                    'id_barcode' => null,
                    'id_mixed' => $p['id_mixed'],
                    'box_number' => 0,
                    'barcode' => 0,
                ];

                // var_dump($arrdata);
                // die;
                $this->db->insert('mixed_packing_list_barcode', $arrdata);
                array_push($arrid, $this->db->insert_id());
            }

            foreach ($arrid as $id) {
                $arrdatax = [
                    'id_barcode' => $id,
                ];
                array_push($arridx, $arrdatax);
            }

            return $arridx;
        }
    }

    public function insert_mixed_size_list()
    {
        if (isset($_POST['arrdata1'])) {
            $arrdataX = $_POST['arrdata1'];
            $arrdata = [];
            foreach ($arrdataX as $p) {
                $data = [
                    'id_size_detail' => null,
                    'id_mixed' => $p['id_mixed'],
                    'size' => $p['size'],
                    'qty' => $p['qty'],
                ];
                array_push($arrdata, $data);
            }
            $this->db->insert_batch('mixed_size_list', $arrdata);

            return $this->db->affected_rows();
        }
    }

    public function update_mixed_packing_list_barcode()
    {
        $arrdataX = $_POST['arrdata'];
        $arrdata = [];
        foreach ($arrdataX as $p) {
            $push = array(
                'id_barcode' => $p['id_barcode'],
                'box_number' => $p['box_number'],
                'barcode' => $p['id_barcode'],
            );
            array_push($arrdata, $push);
        }
        return $this->db->update_batch('mixed_packing_list_barcode', $arrdata, 'id_barcode');
    }

    public function check_solid_packing_list_by_orc($orc)
    {
        $rst = $this->db->get_where('solid_packing_list', ['orc' => $orc]);

        return $rst->num_rows();
    }

    public function get_by_orc_solid_packing($orc)
    {
        $this->db->where("orc", $orc);
        $result = $this->db->get('cutting');

        return $result->result();
    }

    public function get_kapasitas_karton_by_style()
    {
        if (isset($_POST['style'])) {
            $style = $_POST['style'];
            $rst = $this->db->get_where('kapasitas_karton', array('style' => $style));
            return $rst->result();
        }
    }

    public function update_batch_solid_packing_list()
    {
        if (isset($_POST['arrPackingList'])) {
            $arrPackingList = $_POST['arrPackingList'];
            $dataPackingList = [];

            //insert solid_packing_list
            foreach ($arrPackingList as $p) {
                $data = [
                    'id_master_order_icon_main' => $p['id_master_order_icon_main'],
                    'orc' => $p['orc'],
                    'wo' => $p['wo'],
                    'po' => $p['po'],
                    'color' => $p['color'],
                    'style' => $p['style'],
                    'size' => $p['size'],
                    'qty' => $p['qty'],
                    'box_capacity' => $p['box_capacity'],
                    'total_box' => $p['total_box'],
                    'id_factory' => $this->id_factory
                ];
                array_push($dataPackingList, $data);
            }
            $this->db->insert_batch('solid_packing_list', $dataPackingList);

            return $this->db->affected_rows();
        }
    }

    public function get_by_orc_packing_solid($orc)
    {
        $result = $this->db->get_where('solid_packing_list', array('orc' => $orc));

        return $result->result_array();
    }

    public function get_by_wo_packing_solid($wo)
    {
        $result = $this->db->get_where('solid_packing_list', array('wo' => $wo));

        return $result->result_array();
    }

    public function insert_solid_packing_barcode_batch()
    {
        if (isset($_POST['arrSolidPackingBarcode'])) {
            $arrSolidPackingBarcode = $_POST['arrSolidPackingBarcode'];
            $this->db->insert_batch('solid_packing_barcode', $arrSolidPackingBarcode);

            return $this->db->affected_rows();
        }
    }
    // public function get_style()
    // {
    //     $this->db->distinct();
    //     $this->db->select('style');

    //     $rst = $this->db->get('master_sam');
    //     return $rst->result();
    // }
    public function get_style()
    {
        $data = "SELECT
                  style 
                FROM
                  master_sam 
                WHERE
                  style IS NOT NULL 
                GROUP BY
                  style 
                ORDER BY
                  style ASC
                ";

        $query = $this->db->query($data);
        return $query->result();
    }

    public function save_kapasitas_karton()
    {
        if (isset($_POST['kapasitasKarton'])) {

            $kapasitasKarton = $_POST['kapasitasKarton'];
            $data = [];
            foreach ($kapasitasKarton as $kk) {
                $dataForInsert = [
                    'style' => $kk['style'],
                    'size' => $kk['size'],
                    'kapasitas_karton' => $kk['kapasitas_karton'],
                    'id_factory' => $this->id_factory
                ];
                array_push($data, $dataForInsert);
            }
            $this->db->insert_batch('kapasitas_karton', $data);

            return $this->db->affected_rows();
        }
    }

    public function deleteDataKapasitasKarton($id_packing_karton)
    {
        $this->db->delete('kapasitas_karton', array('id_packing_karton' => $id_packing_karton));
        return $this->db->affected_rows();
    }



    public function get_all()
    {
        $this->db->where('id_factory', $this->id_factory);
        $result = $this->db->get('packing_member_new');

        return $result->result_array();
    }

    public function get_all_posisi_orc()
    {
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");

        $this->db->select(
            'DISTINCT(transfer_area.orc) AS orc, DATE(transfer_area.tgl_in) AS tgl, transfer_area.po, 
			transfer_area.style, transfer_area.color, transfer_area.lokasi, transfer_area.status'
        );
        $this->db->join('order', 'order.orc = transfer_area.orc');
        $this->db->where('transfer_area.status', 'in');
        $this->db->where('order.id_factory', $this->id_factory);
        $this->db->group_by('transfer_area.orc');
        $this->db->order_by('transfer_area.orc');
        $result = $this->db->get('transfer_area');

        return $result->result();
    }
    public function get_all_in()
    {
        //     $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        //     $this->db->select(
        //         'DISTINCT(orc) AS orc, DATE(tgl_in) AS tgl, po, 
        // 		style, color, COUNT(carton_no) AS jmlBox, SUM(qty_box) AS jmlPcs, lokasi'
        //     );
        //     // $this->db->join('`order`', '`order`.orc = `transfer_area`.orc');
        //     $this->db->group_by('orc');
        //     $this->db->order_by('orc');
        //     // $this->db->where('id_factory', $this->id_factory);
        //     $this->db->where('status', 'in');
        //     $rst = $this->db->get('transfer_area');

        $rst = "SELECT
                DATE( transfer_area.tgl_in ) AS tgl,
                transfer_area.po,
                transfer_area.style,
                transfer_area.color,
                transfer_area.orc,
                transfer_area.size,
                SUM( transfer_area.qty_box ) AS jmlPcs,
                transfer_area.`status`,
                transfer_area.lokasi,
                COUNT( transfer_area.carton_no ) AS jmlBox 
            FROM
                transfer_area
                INNER JOIN `order` ON `order`.orc = transfer_area.orc
            WHERE
                transfer_area.`status` = 'in' 
                
                AND `order`.id_factory = $this->id_factory
            GROUP BY
                transfer_area.orc ";

        $query = $this->db->query($rst);

        return $query->result();
    }

    public function get_all_in_new()
    {
        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];
        $rst = "SELECT
                    DATE( transfer_area.tgl_in ) AS tgl,
                    transfer_area.po,
                    transfer_area.style,
                    transfer_area.color,
                    transfer_area.orc,
                    transfer_area.size,
                    SUM( transfer_area.qty_box ) AS jmlPcs,
                    transfer_area.`status`,
                    transfer_area.lokasi,
                    COUNT( transfer_area.carton_no ) AS jmlBox 
                FROM
                    transfer_area
                    INNER JOIN `order` ON `order`.orc = transfer_area.orc
                WHERE
                    transfer_area.`status` = 'in' 
                    AND DATE( transfer_area.tgl_in ) BETWEEN ' $datefrom' 
                    AND '$dateto'
                    AND `order`.id_factory = $this->id_factory
                GROUP BY
                    transfer_area.orc ";

        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_by_barcode($barcode)
    {
        $result = $this->db->get_where('packing_member_new', array('barcode' => $barcode));

        return $result->row();
    }

    // public function join_get_by_barcode($barcode)
    // {
    //     $this->db->select('*');
    //     $this->db->from('solid_packing_list');
    //     $this->db->join('solid_packing_barcode', 'solid_packing_barcode.id_packing_list = solid_packing_list.id_packing_list');
    //     $this->db->where('solid_packing_barcode.barcode', $barcode);
    //     $row = $this->db->get();

    //     return $row->row();
    // }

    public function join_get_by_barcode($barcode)
    {
        if ($this->id_factory == 1) {
            $data = "SELECT
                            *
                        FROM
                            solid_packing_list
                            INNER JOIN solid_packing_barcode ON solid_packing_list.id_packing_list = solid_packing_barcode.id_packing_list 
                        WHERE
                            solid_packing_barcode.id_packing_list_barcode > 1178407 
                            AND solid_packing_barcode.barcode = '$barcode'
                    ";
        } else {
            $data = "SELECT
                            *
                        FROM
                            solid_packing_list
                            INNER JOIN solid_packing_barcode ON solid_packing_list.id_packing_list = solid_packing_barcode.id_packing_list 
                        WHERE
                            solid_packing_barcode.barcode = '$barcode'
                    ";
        }


        $row = $this->db->query($data);

        return $row->row();
    }

    public function check_by_barcode($barcode)
    {
        $row = $this->db->get_where('transfer_area', ['barcode' => $barcode]);

        return $row->num_rows();
    }

    public function get_all_line()
    {
        $this->db->where('packing_preparation_line.id_factory', $this->id_factory);
        $rst = $this->db->get('packing_preparation_line');

        return $rst->result();
    }

    public function save_transfer_area_pcs($data)
    {
        $orc = $data['orc'];
        $row = $this->db->get_where('order', ['orc' => $orc])->row();
        $data['po'] = $row->so;
        $this->db->insert('transfer_area_pcs', $data);

        return $this->db->insert_id();
    }

    public function save_transfer_area($data)
    {


        date_default_timezone_set('Asia/Jakarta');

        $orc = $data['orc'];
        $row = $this->db->get_where('order', ['orc' => $orc])->row();
        $data['po'] = $row->so;
        $data['tgl_in'] = date('Y-m-d H:i:s');

        // print_r($data);
        $this->db->insert('transfer_area', $data);

        return $this->db->insert_id();
    }

    // public function get_by_orc_t($orc)
    // {
    //     $row = $this->db->get_where('transfer_area', ['orc' => $orc]);

    //     return $row->row();
    // }

    public function get_by_orc_t($orc)
    {
        $data = "SELECT
				transfer_area.orc,
                transfer_area.lokasi
			FROM
				transfer_area 
			WHERE
				transfer_area.orc = '$orc'	
				AND transfer_area.id_transfer_area > 849627
              ";

        $query = $this->db->query($data);
        return $query->row();
    }

    public function get_out_by_orc($orc)
    {
        $this->db->where('orc', $orc);
        $this->db->where('status', 'out');
        $this->db->order_by('barcode', 'asc');
        $rst = $this->db->get('transfer_area');

        return $rst->result();
    }

    public function summary_by_orc($orc)
    {
        $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
        $this->db->select('DATE(tgl_in) as tgl_in, po, orc, style, color, size, count(carton_no) as jmlBox, sum(qty_box) as jmlQty');
        $this->db->from('transfer_area');
        $this->db->group_by('size');
        $this->db->where(['orc' => $orc, 'tgl_out' => null]);
        $rst = $this->db->get();

        return $rst->result();
    }

    public function summary_by_orc_new($orc, $datefrom, $dateto)
    {
        // var_dump($orc);
        // var_dump($datefrom);
        // var_dump($dateto);
        // die;
        $rst = "SELECT
                    DATE( transfer_area.tgl_in ) AS tgl_in,
                    transfer_area.po,
                    transfer_area.style,
                    transfer_area.color,
                    transfer_area.orc,
                    transfer_area.size,
                    SUM( transfer_area.qty_box ) AS jmlQty,
                    transfer_area.`status`,
                    transfer_area.lokasi,
                    COUNT( transfer_area.carton_no ) AS jmlBox 
                FROM
                    transfer_area 
                WHERE
                    transfer_area.orc = '$orc' 
                    AND DATE( transfer_area.tgl_in ) BETWEEN '$datefrom' 
                    AND '$dateto' 
                    AND transfer_area.`status` = 'in' 
                GROUP BY
                    transfer_area.size,
                    transfer_area.orc ";

        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_in_by_orc($orc)
    {
        $this->db->where('orc', $orc);
        $this->db->where('status', 'in');
        $rst = $this->db->get('transfer_area');

        return $rst->result();
    }

    public function update_batch_lokasi($data)
    {
        $this->db->update_batch('transfer_area', $data, 'id_transfer_area');

        return $this->db->affected_rows();
    }

    // public function get_distinct_orc_packing()
    // {
    //     $this->db->select('DISTINCT(orc) as orc');
    //     $rst = $this->db->get('transfer_area');

    //     return $rst->result();
    // }

    public function get_distinct_orc_packing()
    {
        $data = "SELECT
                    transfer_area.orc 
                FROM
                    transfer_area
                    INNER JOIN `order` ON transfer_area.orc = `order`.orc 
                WHERE
                    transfer_area.`status` = 'in' 
                    AND `order`.id_factory = $this->id_factory 
                GROUP BY
                    transfer_area.orc 
                ORDER BY
                    DATE ( transfer_area.tgl_in ) DESC
						";

        $row = $this->db->query($data);

        return $row->result();
    }

    public function update_batch_transfer_area($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        foreach ($data as $key => &$val) {
            $val['tgl_out'] = date('Y-m-d H:i:s');
        }
        $this->db->update_batch('transfer_area', $data, 'id_transfer_area');
        return $this->db->affected_rows();
    }

    public function get_by_orc_in($orc)
    {
        $this->db->where('orc', $orc);
        $this->db->where('status', 'in');

        $rst = $this->db->get('transfer_area');

        return $rst->result();
    }

    public function get_all_out()
    {
        $query = "SELECT DISTINCT
                    transfer_area.orc AS orc,
                    DATE(transfer_area.tgl_out) AS tgl,
                    transfer_area.po,
                    transfer_area.style,
                    transfer_area.color,
                    COUNT(transfer_area.carton_no) AS jmlBox,
                    SUM(transfer_area.qty_box) AS jmlPcs 
                FROM
                    transfer_area
                    INNER JOIN `order` ON `order`.orc = transfer_area.orc 
                WHERE
                    transfer_area.`status` = 'out' 
                    AND `order`.id_factory = $this->id_factory
                GROUP BY
                    transfer_area.orc 
                ORDER BY
                    DATE(transfer_area.tgl_out) DESC";

        $rst = $this->db->query($query);

        return $rst->result();
    }

    public function get_daily_packing()
    {

        if (isset($_POST['dataStr'])) {
            $dataStr = $_POST['dataStr'];

            $from_date = date('Y-m-d', strtotime($dataStr['from_date']));
            $to_date = date('Y-m-d', strtotime($dataStr['to_date']));
        }

        $rst = "SELECT
					input_packing.no_bundle, 
					input_packing.qty, 
					DATE( input_packing.tgl ) AS tgl, 
					input_packing.orc, 
					input_packing.style, 
					input_packing.color, 
					input_packing.line,
					input_packing.size
				FROM
					input_sewing
					RIGHT JOIN input_packing ON input_packing.kode_barcode = input_sewing.kode_barcode
                    INNER JOIN `order` ON `order`.orc = input_packing.orc 
				WHERE
				DATE( input_packing.tgl ) >= '$from_date' 
				AND DATE( input_packing.tgl ) <= '$to_date'
                AND `order`.id_factory = $this->id_factory
		";
        $query = $this->db->query($rst);

        return $query->result_array();
    }

    public function get_orc_packing()
    {
        $rst = "SELECT
                    DISTINCT 
                    input_packing.orc
                FROM
                    input_packing
                    INNER JOIN `order` ON `order`.orc = input_packing.orc
                    WHERE `order`.id_factory = $this->id_factory
				";
        $query = $this->db->query($rst);

        return $query->result_array();
    }

    public function get_daily_packing_orc()
    {

        if (isset($_POST['dataStr'])) {
            $dataStr = $_POST['dataStr'];

            $orc = $dataStr['orc'];
        }

        $rst = "SELECT
					input_packing.orc, 
					input_packing.style, 
					input_packing.color, 
					input_packing.kode_barcode, 
					input_packing.qty, 
					input_packing.tgl, 
					input_packing.size, 
					input_packing.line, 
					input_packing.no_bundle
				FROM
					input_packing
					WHERE
					input_packing.orc = '$orc'
		
		";
        $query = $this->db->query($rst);

        return $query->result_array();
    }

    public function summary_daily_packing()
    {
        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];

        $rst = "SELECT
					DATE( input_packing.tgl ) AS tgl,
					input_packing.line,
					input_packing.orc,
					input_packing.style,
					input_packing.color,
					SUM( input_packing.qty ) AS qty 
				FROM
					input_sewing
					RIGHT JOIN input_packing ON input_packing.kode_barcode = input_sewing.kode_barcode
                    INNER JOIN `order` ON `order`.orc = input_packing.orc
				WHERE
					DATE( input_packing.tgl ) >= '$datefrom' 
					AND DATE( input_packing.tgl ) <= '$dateto'
                    AND `order`.id_factory = $this->id_factory
				GROUP BY
					DATE( input_packing.tgl ),
					input_packing.orc,
					input_packing.line
		";
        $query = $this->db->query($rst);

        return $query->result();
    }

    public function get_wip()
    {
        $rst = "SELECT
					`order`.orc,
					`order`.style,
					`order`.color,
					`order`.qty AS qty_order,
					output_sewing_detail.qty,
					input_packing.actual_qty,
					output_sewing_detail.qty - input_packing.actual_qty AS wip,
					`order`.qty - input_packing.actual_qty AS balance 
				FROM
					`order`
					LEFT JOIN ( SELECT output_sewing_detail.orc, SUM( output_sewing_detail.qty ) AS qty FROM output_sewing_detail GROUP BY output_sewing_detail.orc ) AS output_sewing_detail ON `order`.orc = output_sewing_detail.orc
					LEFT JOIN ( SELECT input_packing.orc, SUM( input_packing.qty) AS actual_qty FROM input_packing GROUP BY input_packing.orc ) AS input_packing ON `order`.orc = input_packing.orc
				WHERE
					id_order >= 11851 
					AND output_sewing_detail.qty IS NOT NULL
                    AND `order`.id_factory = $this->id_factory";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_in()
    {

        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];

        $rst = "SELECT
					DATE( transfer_area.tgl_in ) AS tgl, 
					transfer_area.orc, 
					transfer_area.style, 
					transfer_area.color, 
					SUM(transfer_area.qty_box) AS qty, 
					transfer_area.tgl_in
				FROM
					transfer_area
                    INNER JOIN `order` ON `order`.orc = transfer_area.orc
				WHERE
					DATE( transfer_area.tgl_in ) >= '$datefrom' AND
					DATE( transfer_area.tgl_in ) <= '$dateto' AND
						transfer_area.tgl_in IS NOT NULL
                    AND `order`.id_factory = $this->id_factory
				GROUP BY
					DATE( transfer_area.tgl_in ), 
					transfer_area.orc
					ORDER BY
					DATE( transfer_area.tgl_in ) ASC";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_out()
    {

        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];

        $rst = "SELECT
				DATE( transfer_area.tgl_out ) AS tgl,
				transfer_area.orc,
				transfer_area.style,
				transfer_area.color,
				SUM( transfer_area.qty_box ) AS qty,
				transfer_area.tgl_out 
			FROM
				transfer_area
                INNER JOIN `order` ON `order`.orc = transfer_area.orc
			WHERE
				DATE( transfer_area.tgl_out ) >= '$datefrom ' 
				AND DATE( transfer_area.tgl_out ) <= '$dateto' 
				AND DATE( transfer_area.tgl_out )  IS NOT NULL
                AND `order`.id_factory = $this->id_factory
			GROUP BY
				transfer_area.orc,
				DATE( transfer_area.tgl_out )";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function daterange_packing()
    {
        // $data = $_POST['data'];
        $datefrom = $_POST['datefrom'];
        $dateto = $_POST['dateto'];

        $rst = "SELECT
		tab2.dayname,
		tab2.tgl,
		tab2.line,
		tab2.orc,
		tab2.pertama,
		tab2.kedua,
		tab2.ketiga,
		tab2.keempat,
		tab2.kelima,
		tab2.keenam,
		tab2.ketuju,
		tab2.kedelan,
		tab2.kesembilan,
		tab2.kesepuluh,
		(
			tab2.pertama + tab2.kedua + tab2.ketiga + tab2.keempat + tab2.kelima + tab2.keenam + tab2.ketuju + tab2.kedelan + tab2.kesembilan + tab2.kesepuluh 
		) AS total 
	FROM
		(
		SELECT
			tab1.dayname,
			tab1.tgl,
			tab1.line,
			tab1.orc,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '1' THEN tab1.qty END ), 0 ) AS pertama,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '2' THEN tab1.qty END ), 0 ) AS kedua,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '3' THEN tab1.qty END ), 0 ) AS ketiga,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '4' THEN tab1.qty END ), 0 ) AS keempat,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '5' THEN tab1.qty END ), 0 ) AS kelima,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '6' THEN tab1.qty END ), 0 ) AS keenam,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '7' THEN tab1.qty END ), 0 ) AS ketuju,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '8' THEN tab1.qty END ), 0 ) AS kedelan,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '9' THEN tab1.qty END ), 0 ) AS kesembilan,
			COALESCE ( sum( CASE WHEN tab1.timePeriode = '10' THEN tab1.qty END ), 0 ) AS kesepuluh 
		FROM
			(
			SELECT
				DAYNAME( input_packing.tgl ) AS dayname,
				DATE( input_packing.tgl ) AS tgl,
				TIME( input_packing.tgl ) AS wkt,
				input_packing.line,
				input_packing.orc,
				newDurationLine (
					DAYNAME( input_packing.tgl ),
				TIME( input_packing.tgl )) AS timePeriode,
				SUM( input_packing.qty ) AS qty 
			FROM
				input_packing 
                INNER JOIN `order` ON `order`.orc = input_packing.orc
			WHERE
            DATE( input_packing.tgl ) >= '$datefrom ' 
				AND DATE( input_packing.tgl) <= '$dateto'
                AND `order`.id_factory = $this->id_factory
			GROUP BY
				newDurationLine (
					DAYNAME( input_packing.tgl ),
				TIME( input_packing.tgl )),
				input_packing.line,
				input_packing.orc 
			) AS tab1 
		GROUP BY
			tab1.line,
		tab1.tgl 
		) tab2
					";

        $query = $this->db->query($rst);
        return $query->result();
    }

    public function detail_in($tgl, $orc)
    {
        $rst = "SELECT
					transfer_area.tgl_in  AS tgl,
					transfer_area.orc,
					transfer_area.style,
					transfer_area.color,
					transfer_area.size,
					sum(transfer_area.qty_box) as qty_box 
				FROM
					transfer_area
                    INNER JOIN `order` ON `order`.orc = transfer_area.orc
				WHERE
					DATE( transfer_area.tgl_in ) = '$tgl' 
					AND transfer_area.orc = '$orc' 
					AND transfer_area.`status` = 'in'
					AND `order`.id_factory = $this->id_factory
				GROUP BY
					transfer_area.orc,
					DATE( transfer_area.tgl_in ),
					transfer_area.size
                ORDER BY
                    transfer_area.size ASC	
                    ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function detail_out($tgl, $orc)
    {
        $rst = "SELECT
					DATE( transfer_area.tgl_out ) AS tgl,
					transfer_area.orc,
					transfer_area.style,
					transfer_area.color,
					transfer_area.size,
					sum( transfer_area.qty_box ) AS qty_box 
				FROM
					transfer_area
                    INNER JOIN `order` ON `order`.orc = transfer_area.orc
				WHERE
					DATE( transfer_area.tgl_out  ) = '$tgl' 
					AND transfer_area.orc = '$orc' 
					AND DATE( transfer_area.tgl_out  ) is not null
					AND `order`.id_factory = $this->id_factory
				GROUP BY
					transfer_area.orc,
					DATE( transfer_area.tgl_out ),
					transfer_area.size	
                ORDER BY
                    transfer_area.size ASC	
                    ";

        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_all_orc()
    {

        $rst = "SELECT
                    `order`.orc 
                FROM
                    `order`
                WHERE 
                    `order`.id_factory = $this->id_factory ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getByOrc($orc)
    {

        $rst = "SELECT
            `order`.orc,
            `order`.to_cutting,
            `order`.style,
            `order`.comm,
            `order`.style_sam,
            `order`.buyer,
            `order`.so,
            `order`.color,
            `order`.qty,
            `order`.etd,
            cutting.prepare_on
        FROM
            `order`
            LEFT JOIN cutting ON cutting.orc = order.orc
        WHERE
            `order`.orc = '$orc'
            AND `order`.id_factory = $this->id_factory ";
        $query = $this->db->query($rst);
        return $query->result();
    }

    public function get_datas_orcs_v2()
    {
        $data = $_POST['data'];
        $orc = $data['orc'];
        $datas = "SELECT
            cutting.orc,
            cutting.style,
            cutting.color,
            cutting_detail.no_bundle,
            cutting_detail.size,
            cutting_detail.kode_barcode,
            input_cutting.kode_barcode AS input_cutting,
            IFNULL(input_cutting.qty_pcs, 0) AS qty_input_cutting,
            input_sewing.kode_barcode AS barcode_trimstore,
            IFNULL(input_sewing.qty_pcs, 0) AS qty_input_sewing,
            input_sewing.line,
            cutting.so,
            cutting.comm,
            cutting.date_created,
            cutting.buyer,
            cutting.qty AS qty_order 
        FROM
            cutting
            INNER JOIN cutting_detail ON cutting_detail.id_cutting = cutting.id_cutting
            LEFT JOIN input_sewing ON input_sewing.kode_barcode = cutting_detail.kode_barcode
            LEFT JOIN input_cutting ON input_cutting.kode_barcode = cutting_detail.kode_barcode 
        WHERE
            cutting.orc = '$orc' 
        ORDER BY
            cutting_detail.kode_barcode ASC";

        $query = $this->db->query($datas);
        return $query->result_array();
    }


    // Mixed Size
    public function getDataOutputMixedSizeTableCurrentDate()
    {

        $rst = "SELECT 
                    `order`.id_order, 
                    DATE(output_mixed_packing_list_sub_query.created_date) as date, 
                    `order`.so as po, 
                    `order`.orc, 
                    `order`.style, 
                    `order`.color, 
                    SUM(mixed_packing_list.jmlh_karton) as box, 
                    output_mixed_packing_list_sub_query.total_actual_box 
                FROM 
                    mixed_packing_list 
                    INNER JOIN `order` ON mixed_packing_list.id_order = `order`.id_order 
                    INNER JOIN (
                    SELECT 
                        orc, 
                        created_date, 
                        COUNT(barcode) AS total_actual_box 
                    FROM 
                        output_mixed_packing_list 
                    GROUP BY 
                        orc
                    ) as output_mixed_packing_list_sub_query ON `order`.orc = output_mixed_packing_list_sub_query.orc 
                WHERE 
                    DATE(output_mixed_packing_list_sub_query.created_date) = CURRENT_DATE()
                    AND `order`.id_factory = $this->id_factory
                GROUP BY 
                    `order`.so, 
                    `order`.orc, 
                    `order`.style, 
                    `order`.color, 
                    output_mixed_packing_list_sub_query.total_actual_box
      
        ";

        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getDataOutputMixedSizeTableSelectedDate($date_from, $date_to)
    {

        $rst = "SELECT 
                    `order`.id_order, 
                    DATE(output_mixed_packing_list_sub_query.created_date) as date, 
                    `order`.so as po, 
                    `order`.orc, 
                    `order`.style, 
                    `order`.color, 
                    SUM(mixed_packing_list.jmlh_karton) as box, 
                    output_mixed_packing_list_sub_query.total_actual_box 
                FROM 
                    mixed_packing_list 
                    INNER JOIN `order` ON mixed_packing_list.id_order = `order`.id_order 
                    INNER JOIN (
                    SELECT 
                        orc, 
                        created_date, 
                        COUNT(barcode) AS total_actual_box 
                    FROM 
                        output_mixed_packing_list 
                    GROUP BY 
                        orc
                    ) as output_mixed_packing_list_sub_query ON `order`.orc = output_mixed_packing_list_sub_query.orc 
                WHERE 
                    DATE(output_mixed_packing_list_sub_query.created_date) BETWEEN '$date_from' AND '$date_to'
                    AND `order`.id_factory = $this->id_factory
                GROUP BY 
                    `order`.so, 
                    `order`.orc, 
                    `order`.style, 
                    `order`.color, 
                    output_mixed_packing_list_sub_query.total_actual_box
      
        ";

        $query = $this->db->query($rst);
        return $query->result();
    }

    public function getDataOutputMixedSizeTableDetails($date, $orc)
    {

        $rst = "SELECT
                    output_mixed_packing_list.created_date,
                    `order`.orc,
                    `order`.style,
                    `order`.color,
                    output_mixed_packing_list.box_number,
                    mixed_size_list.size,
                    mixed_size_list.qty AS qty_out 
                FROM
                    output_mixed_packing_list
                    INNER JOIN `order` ON output_mixed_packing_list.id_order = `order`.id_order
                    INNER JOIN mixed_size_list ON output_mixed_packing_list.id_mixed = mixed_size_list.id_mixed 
                WHERE
                    mixed_size_list.qty != 0
                    AND DATE(output_mixed_packing_list.created_date) = '$date'
                    AND `order`.orc = '$orc'
                    AND `order`.id_factory = $this->id_factory
      
        ";

        $query = $this->db->query($rst);
        return $query->result();
    }




    // ============================================Packing Master Line========================================
    function get_all_master_line()
    {
        $sql = "SELECT
                     packing_preparation_line.id_line,
                     packing_preparation_line.id_zone,
                     packing_preparation_zone.zone,
                     packing_preparation_line.line,
                     packing_preparation_line.max_box_capacity,
                     packing_preparation_line.id_factory,
                     master_factory.Factory
                 FROM
                     `packing_preparation_line`
                     LEFT JOIN packing_preparation_zone ON packing_preparation_line.id_zone = packing_preparation_zone.id_zone
                     LEFT JOIN master_factory ON packing_preparation_line.id_factory = master_factory.idFactory
                     ORDER BY packing_preparation_line.id_line ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function getMasterZone()
    {
        $data = "SELECT
                     packing_preparation_zone.id_zone,
                     packing_preparation_zone.zone,
                     packing_preparation_zone.id_factory
                 FROM
                     `packing_preparation_zone`";
        $query = $this->db->query($data);
        return $query->result_array();
    }
    function getMasterFactory()
    {
        $data = "SELECT * FROM `master_factory`";

        $query = $this->db->query($data);
        return $query->result_array();
    }
    public function postPackingLine($data)
    {
        $this->db->insert('packing_preparation_line', $data);
        return $this->db->insert_id();
    }
    public function deletePackingLine($id_line)
    {
        $this->db->where('id_line', $id_line);
        $this->db->delete('packing_preparation_line');
    }
    public function updatePackingLine($id_line, $data)
    {
        $this->db->where(['id_line' => $id_line]);
        $this->db->update('packing_preparation_line', $data);
    }

    public function get_by_orc_master_order_packing($orc)
    {
        $rst = "SELECT
                    master_order_packing_main.id,
                    master_order_packing_main.orc,
                    master_order_packing_main.style,
                    master_order_packing_main.color,
                    master_order_packing_details.id_master_size,
                    master_order_packing_details.qty,
                    master_size.size,
                    master_order_packing_details.carton_capacity 
                FROM
                    master_order_packing_main
                    INNER JOIN master_order_packing_details ON master_order_packing_main.id = master_order_packing_details.id_master_order_packing_main
                    INNER JOIN master_size ON master_order_packing_details.id_master_size = master_size.id_mastersize 
                WHERE
                    master_order_packing_main.orc = '$orc' ";

        $query = $this->db->query($rst);

        return $query->result();
    }

 public function get_orc_bundle_icon()
 {

  $rst = "SELECT
             id_master_order_icon_main, 
             work_order AS `orc`
           FROM
             `work_order` 
           WHERE
             to_cutting IS NULL 
             AND tgl_to_cutting IS NULL";
  $query = $this->db->query($rst);
  return $query->result();
 }
 
 public function getBundleByOrcIcon($orc)
 {

  $rst = "SELECT
             main.consignee_name,
             work_order.orc,
             work_order.qty_allocation as quantity_ordered,
             main.style_code,
             main.color,
             main.po_customer,
             main.customer_name
           FROM
             master_order_icon_main as main
             INNER JOIN work_order ON main.id_master_order_icon_main = work_order.id_master_order_icon_main
           WHERE
             work_order.work_order = '$orc'";
  $query = $this->db->query($rst);
  return $query->result();
 }
 
    public function getWorkOrders(){
        // $this->db->select('id_line, line, max_box_capacity');
        // $this->db->from('packing_preparation_line');
        // $this->db->where('to_cutting', NULL, FALSE);
        $rst = $this->db->get_where('work_order', array('to_cutting !=' => NULL));

        return $rst->result();    
    }

    public function getWODetailsByWO($wo){
        $rst = $this->db->get_where('view_masterorder_iconmain', ['work_order' => $wo]);

        return $rst->result();
    }

    public function getKapasitasKarton($style, $size){
        $this->db->select('kapasitas_karton');
        $rst = $this->db->get_where('kapasitas_karton', ['style' => $style, 'size' => $size]);
        // echo($this->db->last_query());
        return $rst->result();
    }

    public function getSizesOnWorkOrderDetails($id){
        $response = $this->db->get_where('work_order_details', ['id_work_order' => $id]);
        return $response->result();
    }

    public function getStyleOnMasterOrderIcon($id){
        $this->db->select('style_code');
        $response = $this->db->get_where('master_order_icon_main', ['id_master_order_icon_main' => $id]);
        return $response->result();
    }

    public function getPackingOrders(){
        $response = $this->db->get_where('master_order_packing_main', ['id_factory' => $this->id_factory]);
        return $response->result();
    }

    public function getPackingOrderDetail($id){
        $response = $this->db->get_where('master_order_packing_details', ['id_master_order_packing_main' => $id]);
        return $response->result();
    }
}
