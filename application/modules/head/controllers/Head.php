<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Head extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();


        if ((int)$this->session->userdata['role_gi_production'] !== 18) {
            redirect('auth/not_allowed');
        }


        $this->load->model('HeadModel');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('head/sidebarHead');
        $this->load->view('navbar');
        $this->load->view('head/headViews');
        $this->load->view('footer');
    }


    public function AbsentSewingLine()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('head/sidebarHead');
        $this->load->view('navbar');
        $this->load->view('head/absentSewing');
        $this->load->view('footer');
    }

    public function SummaryOrc()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('head/sidebarHead');
        $this->load->view('navbar');
        $this->load->view('head/summaryOrc');
        $this->load->view('footer');
    }

    public function DeffectSewing()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('head/sidebarHead');
        $this->load->view('navbar');
        $this->load->view('head/deffectSewing');
        $this->load->view('footer');
    }


    public function DateRAngeHour()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('head/sidebarHead');
        $this->load->view('navbar');
        $this->load->view('head/hourly');
        $this->load->view('footer');
    }
    public function ajax_get_grafik_line()
    {
        $head = $this->session->userdata('username');

        $result = $this->HeadModel->getAllSewing($head);
        echo json_encode($result);
    }
    public function ajax_get_all_qty()
    {
        $head = $this->session->userdata('username');

        $result = $this->HeadModel->getQtySewing($head);
        echo json_encode($result);
    }

    public function ajax_get_all_count()
    {
        $head = $this->session->userdata('username');

        $result = $this->HeadModel->getCountSewing($head);
        echo json_encode($result);
    }
    public function ajax_get_all_orc()
    {
        $head = $this->session->userdata('username');

        $result = $this->HeadModel->getCountOrc($head);
        echo json_encode($result);
    }

    public function ajax_get_qty_yesterday()
    {
        $head = $this->session->userdata('username');

        $result = $this->HeadModel->getOutputYesterday($head);
        echo json_encode($result);
    }

    public function ajax_get_absent()
    {
        $head = $this->session->userdata('username');

        $result['data'] = $this->HeadModel->getAbsentSewing($head);
        echo json_encode($result);
    }

    public function getOrcSummary()
    {
        $result = $this->HeadModel->getDataOrcSummary();
        echo json_encode($result);
    }

    // public function get_sewing_summary_orc()
    // {
    //     $head = $this->session->userdata('username');

    //     $result['data'] = $this->HeadModel->get_summary_sewing_orc($head);
    //     echo json_encode($result);
    // }
    public function get_sewing_summary_orc()
    {
        $orc = $this->input->get('orc');
        $result['data'] = $this->HeadModel->get_summary_sewing_orc_new($orc);

        echo json_encode($result);
    }
    public function ajax_get_detail_summary()
    {
        $orc      = $_POST['orc'];
        $data['data'] = $this->HeadModel->get_detail_summaries($orc);
        echo json_encode($data);
    }

    public function get_defect()
    {
        $rst['data'] = $this->HeadModel->get_data_defect();

        echo json_encode($rst);
    }

    public function get_sewing_per_hour()
    {
        $head = $this->session->userdata('username');

        $result['data'] = $this->HeadModel->get_data_sewing_hour($head);
        echo json_encode($result);
    }
    public function getDateRangLinePerHours()
    {
        $date = $this->input->get('date');
        $head = $this->input->get('head');

        $result['data'] = $this->HeadModel->get_data_sewing_hour_range($date, $head);
        echo json_encode($result);
    }

    public function BreakdownMachine()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('head/sidebarHead');
        $this->load->view('navbar');
        $this->load->view('head/machineBreakdown');
        $this->load->view('footer');
    }

    public function filter_daily_downtime()
    {
        $rst = $this->HeadModel->get_by_daterange_daily();

        echo json_encode($rst);
    }
}
