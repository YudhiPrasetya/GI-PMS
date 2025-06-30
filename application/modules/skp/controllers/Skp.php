<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skp extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('');
        } else {
            if ($this->session->userdata['username'] != ("Admin SKP" || "Admin Juita" || "Admin Outerwear")) {
                redirect('auth/not_allowed');
            }
        }

        $this->load->model('SkpModel');
    }


    public function dashboard()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $today = date('Y-m-d');
        // var_dump($today);
        // die();
        $yesterday = date('Y-m-d', strtotime('-1 days'));

        $data['inputToday'] = $this->SkpModel->getCountInputSkp($today);
        $data['inputYesterday'] = $this->SkpModel->getCountInputSkp($yesterday);

        $data['outputToday'] = $this->SkpModel->getCountOutputSkp($today);
        $data['outputYesterday'] = $this->SkpModel->getCountOutputSkp($yesterday);

        $data['wipBundleYearly'] = $this->SkpModel->getCountWIPSkpYearlyByBundleDateCreated();

        $this->load->view('header', $data);

        if ($this->session->userdata['username'] == "Admin SKP") {
            $this->load->view('skp/sidebarSkp');
        } else if ($this->session->userdata['username'] == "Admin Outerwear") {
            $this->load->view('outerwear/sidebarOuterwear');
        }

        $this->load->view('navbar');
        $this->load->view('skp/dasboard');
        $this->load->view('footer');
    }

    // Input SKP
    // ==================================================================================================
    public function input_skp()
    {
        $data['title'] = 'Input Juwita | GI-Production';

        $this->load->view('header', $data);

        if ($this->session->userdata['username'] == "Admin SKP") {
            $this->load->view('skp/sidebarSkp');
        } else if ($this->session->userdata['username'] == "Admin Outerwear") {
            $this->load->view('outerwear/sidebarOuterwear');
        }

        $this->load->view('navbar');
        $this->load->view('skp/input_skp_new');
        $this->load->view('footer');
    }

    public function getInputSkp()
    {
        $result['data'] = $this->SkpModel->getDataInputSkp();
        echo json_encode($result);
    }

    public function getInputSkpYesterday()
    {
        $result['data'] = $this->SkpModel->getDataInputSkp();
        echo json_encode($result);
    }

    public function getInputSkp30DaysAgo()
    {
        $result['data'] = $this->SkpModel->getDataInputMolding30DaysAgo();
        echo json_encode($result);
    }


    public function ajax_get_by_barcode($barcode)
    {
        $rst = $this->SkpModel->check_by_barcode($barcode);

        if ($rst == null) {
            $result = $this->SkpModel->get_by_barcode($barcode);
        } else {
            $result = 0;
        }

        echo json_encode($result);
    }

    public function getCheckBarcodeInputCutting()
    {
        $barcode = $this->input->get('barcode');

        $result = $this->SkpModel->getDataCheckBarcodeCutting($barcode);
        if ($result >= 1) {
            // $result = $this->SkpModel->getDataCheckBarcodeOutputCutting($barcode);
            // if ($result >= 1) {
            $result = $this->SkpModel->getDataCheckBarcodeInputCuttingScanned($barcode);
            if ($result == 0) {
                $result = 3; // belum di scan (ok)
                echo json_encode($result);
            } else {
                $result = 2; // sudah di scan
                echo json_encode($result);
            }
            // } else {
            //     $result = 1; // barcode tidak ada di cutting
            //     echo json_encode($result);
            // }
        } else {
            $result = 0; // barcode tidak ada
            echo json_encode($result);
        }
    }


    public function getCheckBarcodCutting()
    {
        $barcode = $this->input->get('barcode');

        $result = $this->SkpModel->get_by_barcode_mold($barcode);
        if ($result >= 1) {
            // $result = $this->SkpModel->getDataCheckBarcodeOutputCutting($barcode);
            // if ($result >= 1) {
            $result = $this->SkpModel->check_barcode_mold_input_skp($barcode);
            // var_dump($result);
            // die();
            if ($result == 0) {
                $result = 2; // belum di scan (ok)
                echo json_encode($result);
            } else {
                $result = 1; // sudah di scan
                echo json_encode($result);
            }
            // } else {
            //     $result = 1; // barcode tidak ada di cutting
            //     echo json_encode($result);
            // }
        } else {
            $result = 0; // barcode tidak ada
            echo json_encode($result);
        }
    }
    public function postInputCutting()
    {
        date_default_timezone_set("Asia/Jakarta");

        $barcode = $this->input->post('barcode');
        $prefix = substr($barcode,  1); //l o m
        // if ($prefix == 'O') {
        //     $split = substr($barcode, 1);
        // } else if ($prefix == 'M') {
        //     $split = substr($barcode, 1);
        // } else if ($prefix == 'L') {
        //     $split = substr($barcode, 1);
        // }
        // var_dump($prefix);
        // var_dump($split);
        // die();


        $query = "SELECT id_cutting_detail, qty_pcs, kode_barcode FROM cutting_detail WHERE kode_barcode ='$prefix'";
        $result = $this->db->query($query);


        $data  = $result->result_array();
        // var_dump($data);
        // die;
        $id_cutting_detail = $data[0]['id_cutting_detail'];
        $qty = $data[0]['qty_pcs'];
        $skp_barcode = $data[0]['kode_barcode'];

        $data = array(
            'id_cutting_detail' => $id_cutting_detail,
            'date_created' => date('Y-m-d H:i:s'),
            'qty' => $qty,
            'skp_barcode' => $skp_barcode
        );

        $this->SkpModel->postDataInputCutting($data);
        echo json_encode($data);
    }



    // Output SKP
    // ==================================================================================================

    public function output_skp()
    {
        $data['title'] = 'Scan Output Juwita | GI-Production';

        $this->load->view('header', $data);

        if ($this->session->userdata['username'] == "Admin SKP") {
            $this->load->view('skp/sidebarSkp');
        } else if ($this->session->userdata['username'] == "Admin Outerwear") {
            $this->load->view('outerwear/sidebarOuterwear');
        }

        $this->load->view('navbar');
        $this->load->view('skp/output_skp_new');
        $this->load->view('footer');
    }

    public function ajax_get_all_line()
    {
        $rst = $this->SkpModel->get_all_line();

        echo json_encode($rst);
    }

    function getOutputSkp()
    {
        $data['data'] = $this->SkpModel->getDataOutputSkp();
        echo json_encode($data);
    }

    public function ajax_check_by_barcode($bar, $id_line)
    {
        $rst = $this->SkpModel->check_barcode_skp_new($bar);

        if (count($rst) <= 0) {
            $success = array(
                'success' => false,
                'msg' => 'Barcode tidak ditemukan.'
            );
            echo json_encode($success);
            exit();
        } else {
            $id_cutting_detail = $rst[0]->id_cutting_detail;
            $qty = $rst[0]->qty_pcs;
            // $datetime = date('Y-m-d H:i:s');

            $rst = $this->SkpModel->check_input_skp_data($id_cutting_detail);
            if (count($rst) === 0) {
                $success = array(
                    'success' => false,
                    'msg' => 'Barcode belum scan input skp.'
                );
                echo json_encode($success);
                exit();
            } else {
                $id_input_skp = $rst[0]->id_input_skp;
                $isOutputed = $this->SkpModel->check_output_skp($id_input_skp);

                if (count($isOutputed) > 0) {
                    $success = array(
                        'success' => false,
                        'msg' => 'Barcode sudah pernah di scan pada ' . $isOutputed[0]->date_created
                    );
                    echo json_encode($success);
                    exit();
                } else {

                    $data = array(
                        'id_input_skp' => $id_input_skp,
                        'id_line' => $id_line,
                        'qty' => $qty,
                        'date_created' => date('Y-m-d H:i:s')
                    );

                    $finalResult = $this->SkpModel->save_output_skp($data);
                    if ($finalResult) {
                        $success = array(
                            'success' => true,
                            'msg' => 'Data skp berhasil disimpan!'
                        );
                    } else {
                        $success = array(
                            'success' => false,
                            'msg' => 'Data skp gagal disimpan, terjadi kesalahan'
                        );
                    }
                    echo json_encode($success);
                    exit();
                }
            }
        }

        echo json_encode($rst);
    }

    // Report SKP
    // ==================================================================================================

    public function report()
    {
        $data['title'] = 'Report Date Range Skp | GI-Production';

        $this->load->view('header', $data);

        if ($this->session->userdata['username'] == "Admin SKP") {
            $this->load->view('skp/sidebarSkp');
        } else if ($this->session->userdata['username'] == "Admin Outerwear") {
            $this->load->view('outerwear/sidebarOuterwear');
        }

        $this->load->view('navbar');
        $this->load->view('skp/reportDateRangeView');
        $this->load->view('footer');
    }

    public function get_reports()
    {
        $dateStart = $this->input->get('dateStart');
        $dateEnd = $this->input->get('dateEnd');

        $result['data'] = $this->SkpModel->get_report_by_date_range_cutting_bundle($dateStart, $dateEnd);
        echo json_encode($result);
    }

    public function getInputSkpChart()
    {
        $result = $this->SkpModel->getDataInputSkpChart();
        echo json_encode($result);
    }

    public function getOutputSkpChart()
    {
        $result = $this->SkpModel->getDataOutputSkpChart();
        echo json_encode($result);
    }
}
