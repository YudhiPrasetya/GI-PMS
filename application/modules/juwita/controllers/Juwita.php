<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Juwita extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('');
        } else {
            if ($this->session->userdata['username'] != ("Admin Juita" || "Admin Outerwear" || "Admin SKP")) {
                redirect('auth/not_allowed');
            }
        }

        $this->load->model('JuwitaModel');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 days'));

        $data['inputToday'] = $this->JuwitaModel->getCountInputJuwita($today);
        $data['inputYesterday'] = $this->JuwitaModel->getCountInputJuwita($yesterday);

        $data['outputToday'] = $this->JuwitaModel->getCountOutputJuwita($today);
        $data['outputYesterday'] = $this->JuwitaModel->getCountOutputJuwita($yesterday);

        $data['wipBundleYearly'] = $this->JuwitaModel->getCountWIPJuwitaYearlyByBundleDateCreated();

        $this->load->view('header', $data);

        if ($this->session->userdata['username'] == "Admin Juita") {
            $this->load->view('juwita/sidebarJuwita');
        } else if ($this->session->userdata['username'] == "Admin Outerwear") {
            $this->load->view('outerwear/sidebarOuterwear');
        }

        $this->load->view('navbar');
        $this->load->view('juwita/dashboard/dashboardView');
        $this->load->view('footer');
    }

    // Input Juwita
    // ==================================================================================================
    public function input_juwita()
    {
        $data['title'] = 'Input Juwita | GI-Production';

        $this->load->view('header', $data);

        if ($this->session->userdata['username'] == "Admin Juita") {
            $this->load->view('juwita/sidebarJuwita');
        } else if ($this->session->userdata['username'] == "Admin Outerwear") {
            $this->load->view('outerwear/sidebarOuterwear');
        }

        $this->load->view('navbar');
        $this->load->view('juwita/input_juwita/inputJuwitaView');
        $this->load->view('footer');
    }

    public function getInputJuwita()
    {
        $result['data'] = $this->JuwitaModel->get_all();
        echo json_encode($result);
    }

    // Output Juwita
    // ==================================================================================================

    public function output_juwita()
    {
        $data['title'] = 'Scan Output Juwita | GI-Production';

        $this->load->view('header', $data);

        if ($this->session->userdata['username'] == "Admin Juita") {
            $this->load->view('juwita/sidebarJuwita');
        } else if ($this->session->userdata['username'] == "Admin Outerwear") {
            $this->load->view('outerwear/sidebarOuterwear');
        }

        $this->load->view('navbar');
        $this->load->view('juwita/output_juwita/outputJuwitaView');
        $this->load->view('footer');
    }

    public function ajax_get_all_line()
    {
        $rst = $this->JuwitaModel->get_all_line();

        echo json_encode($rst);
    }

    function getOutputJuwita()
    {
        $data['data'] = $this->JuwitaModel->getDataOutputJuwita();
        echo json_encode($data);
    }

    public function postInputJuwita($code)
    {
        //check the barcode at cutting_detail
        $codeUpper = strtoupper($code);
        $rst = $this->JuwitaModel->check_barcode_juwita($codeUpper);

        if (count($rst) <= 0) {
            $success = array(
                'success' => false,
                'msg' => 'Barcode tidak dikenali.'
            );
            echo json_encode($success);
            exit();
        } else {
            $id_cutting_detail = $rst[0]->id_cutting_detail;
            $qty = $rst[0]->qty_pcs;
            $datetime = date('Y-m-d H:i:s');

            $rst = $this->JuwitaModel->check_input_juwita($id_cutting_detail);
            if ($rst > 0) {
                $success = array(
                    'success' => false,
                    'msg' => 'Barcode sudah pernah di scan.'
                );
                echo json_encode($success);
                exit();
            } else {
                $data = array(
                    'id_cutting_detail' => $id_cutting_detail,
                    'qty' => $qty,
                    'date_created' => $datetime
                );

                $finalResult = $this->JuwitaModel->save_input_juwita($data);
                if ($finalResult) {
                    $success = array(
                        'success' => true,
                        'msg' => 'Data Juwita berhasil disimpan!'
                    );
                } else {
                    $success = array(
                        'success' => false,
                        'msg' => 'Data Juwita gagal disimpan, terjadi kesalahan'
                    );
                }
                echo json_encode($success);
                exit();
            }
        }
    }

    public function ajax_check_by_barcode($bar, $id_line)
    {
        $rst = $this->JuwitaModel->check_barcode_juwita($bar);

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
            $datetime = date('Y-m-d H:i:s');

            $rst = $this->JuwitaModel->check_input_juwita_data($id_cutting_detail);
            if (count($rst) === 0) {
                $success = array(
                    'success' => false,
                    'msg' => 'Barcode belum scan input juwita.'
                );
                echo json_encode($success);
                exit();
            } else {
                $id_input_juwita = $rst[0]->id_input_juwita;
                $isOutputed = $this->JuwitaModel->check_output_juwita($id_input_juwita);

                if (count($isOutputed) > 0) {
                    $success = array(
                        'success' => false,
                        'msg' => 'Barcode sudah pernah di scan pada ' . $isOutputed[0]->date_created
                    );
                    echo json_encode($success);
                    exit();
                } else {

                    $data = array(
                        'id_input_juwita' => $id_input_juwita,
                        'id_line' => $id_line,
                        'qty' => $qty,
                        'date_created' => $datetime
                    );

                    $finalResult = $this->JuwitaModel->save_output_juwita($data);
                    if ($finalResult) {
                        $success = array(
                            'success' => true,
                            'msg' => 'Data Juwita berhasil disimpan!'
                        );
                    } else {
                        $success = array(
                            'success' => false,
                            'msg' => 'Data Juwita gagal disimpan, terjadi kesalahan'
                        );
                    }
                    echo json_encode($success);
                    exit();
                }
            }
        }

        echo json_encode($rst);
    }

    // Report Juwita
    // ==================================================================================================

    public function report()
    {
        $data['title'] = 'Report Date Range Juwita | GI-Production';

        $this->load->view('header', $data);

        if ($this->session->userdata['username'] == "Admin Juita") {
            $this->load->view('juwita/sidebarJuwita');
        } else if ($this->session->userdata['username'] == "Admin Outerwear") {
            $this->load->view('outerwear/sidebarOuterwear');
        }

        $this->load->view('navbar');
        $this->load->view('juwita/report/reportDateRangeView');
        $this->load->view('footer');
    }

    public function get_reports()
    {
        $dateStart = $this->input->get('dateStart');
        $dateEnd = $this->input->get('dateEnd');

        $result['data'] = $this->JuwitaModel->get_report_by_date_range_cutting_bundle($dateStart, $dateEnd);
        echo json_encode($result);
    }

    public function getInputJuwitaChart()
    {
        $result = $this->JuwitaModel->getDataInputJuwitaChart();
        echo json_encode($result);
    }

    public function getOutputJuwitaChart()
    {
        $result = $this->JuwitaModel->getDataOutputJuwitaChart();
        echo json_encode($result);
    }
}
