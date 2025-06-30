<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adm extends MY_Controller
{



    public function __construct()
    {
        parent::__construct();


        if ((int)$this->session->userdata['role_gi_production'] !== 19) {
            redirect('auth/not_allowed');
        }


        $this->load->model('AdmSewingModel');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('adm/sidebarAdmSewing');
        $this->load->view('navbar');
        $this->load->view('adm/dashboardView');
        $this->load->view('footer');
    }

    public function bundlesViews()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('adm/sidebarAdmSewing');
        $this->load->view('navbar');
        $this->load->view('adm/bundleViews');
        $this->load->view('footer');
    }

    public function getOrcSummary()
    {
        $result = $this->AdmSewingModel->getDataOrcSummary();
        echo json_encode($result);
    }

    public function dataBundle()
    {
        $orc = $this->input->get('orc');
        $result['data'] = $this->AdmSewingModel->get_data_summary_new($orc);

        echo json_encode($result);
    }


    // public function updateBundle()
    // {
    //     date_default_timezone_set("Asia/Jakarta");
    //     $id_output_sewing_detail = $this->input->post('id_output_sewing_detail');

    //     $data = array(
    //         'orc' => $this->input->post('orc'),
    //         // 'style' => $this->input->post('style'),
    //         // 'color' => $this->input->post('color'),
    //         'size' => $this->input->post('size'),
    //         'no_bundle' => $this->input->post('no_bundle'),
    //         'tgl_ass' => $this->input->post('tgl_ass'),
    //         'assembly' => $this->input->post('assembly'),
    //         'qty' => $this->input->post('qty'),
    //         'kode_barcode' => $this->input->post('kode_barcode'),
    //     );

    //     $this->AdmSewingModel->updateDataBundle($id_output_sewing_detail, $data);
    //     echo json_encode($data);
    // }

    public function deleteBundle()
    {
        $id_output_sewing_detail = $this->input->post('id_output_sewing_detail');

        $this->AdmSewingModel->deleteBundle($id_output_sewing_detail);
        echo json_encode($id_output_sewing_detail);
    }

    public function updateBundle()
    {
        date_default_timezone_set("Asia/Jakarta");

        $id_output_sewing_detail = $this->input->post('id_output_sewing_detail');

        $data = array(
            'orc' => $this->input->post('orc'),
            'size' => $this->input->post('size'),
            'no_bundle' => $this->input->post('no_bundle'),
            'tgl_ass' => $this->input->post('tgl_ass'),
            'assembly' => $this->input->post('assembly'),
            'qty' => $this->input->post('qty'),
            'kode_barcode' => $this->input->post('kode_barcode'),
        );

        $this->AdmSewingModel->updateDataBundle($id_output_sewing_detail, $data);
        // echo json_encode($data);
        $kode_barcode = $this->input->post('kode_barcode');
        $data2 = array(
            'orc' => $this->input->post('orc'),
            'style' => $this->input->post('style'),
            'color' => $this->input->post('color'),
            'size' => $this->input->post('size'),
            'no_bundle' => $this->input->post('no_bundle'),
        );

        $this->AdmSewingModel->updateBundleInputSewing($kode_barcode, $data2);
        echo json_encode($data);
    }
}
