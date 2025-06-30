<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends MY_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();

    //     if ($this->session->userdata('logged_in') !== TRUE) {
    //         redirect('');
    //     } else {
    //         if ($this->session->userdata['username'] != "MANAGER") {
    //             redirect('auth/not_allowed');
    //         }
    //     }

    //     $this->load->model('ManagerModel');
    // }

    public function __construct()
    {
        parent::__construct();


        if ((int)$this->session->userdata['role_gi_production'] !== 8) {
            redirect('auth/not_allowed');
        }


        $this->load->model('ManagerModel');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/summaries/all_summaries');
        $this->load->view('footer');
    }

    public function ajax_get_sum()
    {
        $data = $this->ManagerModel->get_summary();
        echo json_encode($data);
    }

    public function ajax_get_sum_cutting()
    {
        $data = $this->ManagerModel->get_summary_cutting();
        echo json_encode($data);
    }

    public function ajax_get_sum_packing()
    {
        $data = $this->ManagerModel->get_summary_packing();
        echo json_encode($data);
    }

    public function ajax_get_sum_fg()
    {
        $data = $this->ManagerModel->get_summary_fg();
        echo json_encode($data);
    }

    public function ajax_get_sum_moulding()
    {
        $data = $this->ManagerModel->get_summary_moulding();
        echo json_encode($data);
    }

    //CUTTING
    public function cuttingOrc()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/cutting/cutting_by_orc');
        $this->load->view('footer');
    }


    public function daily_cutting()
    {
        $rst['data'] = $this->ManagerModel->get_by_daterange();

        echo json_encode($rst);
    }

    public function cuttingSummary()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/cutting/cutting_summary');
        $this->load->view('footer');
    }

    public function dataSumarry()
    {
        $orc = $this->input->get('orc');
        $result['data'] = $this->ManagerModel->get_data_summary_new($orc);

        echo json_encode($result);
    }
    public function cuttingWip()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/cutting/cutting_wip');
        $this->load->view('footer');
    }
    public function get_all_wip()
    {
        $rst['data'] = $this->ManagerModel->get_all_wip();

        echo json_encode($rst);
    }

    public function detail_wip()
    {

        $orc      = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->get_detail_wip($orc);

        echo json_encode($rst);
    }

    public function cuttingToday()
    {
        $data['title'] = 'Cutting Today | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/cutting/cutting_today');
        $this->load->view('footer');
    }

    public function ajax_get_graph()
    {
        $data = $this->ManagerModel->get_graph();
        echo json_encode($data);
    }

    public function ajax_get_today()
    {
        $data['data'] = $this->ManagerModel->getData();
        echo json_encode($data);
    }

    public function ajax_get_detail_orc($orc)
    {
        $data = $this->ManagerModel->get_detail_orc($orc);
        echo json_encode($data);
    }

    public function ajax_get_detail_size($orc, $size)
    {
        $data = $this->ManagerModel->get_detail_size($orc, $size);
        echo json_encode($data);
    }

    public function ajax_get_summary_cutting()
    {
        $data['data'] = $this->ManagerModel->get_summary_cutting_2();
        echo json_encode($data);
    }

    public function ajax_get_detail_sum_cutting($orc)
    {
        $data = $this->ManagerModel->get_detail_sum_cutting($orc);
        echo json_encode($data);
    }

    public function ajax_get_total()
    {
        $data = $this->ManagerModel->get_total_today();
        echo json_encode($data);
    }

    public function cuttingBySize()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/cutting/cutting_by_size');
        $this->load->view('footer');
    }

    public function get_cutting_size()
    {
        $rst['data'] = $this->ManagerModel->get_cutting_size();

        echo json_encode($rst);
    }

    public function cuttingIn()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/cutting/daily_input_cutting');
        $this->load->view('footer');
    }


    public function daily_in_cutting()
    {
        $rst['data'] = $this->ManagerModel->daterange_in_daily();

        echo json_encode($rst);
    }
    public function ajax_get_detail_summary_in()
    {
        $orc      = $_POST['orc'];
        $data['data'] = $this->ManagerModel->get_detail_summaries_in($orc);
        echo json_encode($data);
    }

    public function ajax_get_detail_cut()
    {
        $orc      = $_POST['orc'];
        $tgl      = $_POST['tgl'];
        $data['data'] = $this->ManagerModel->get_detail_cut($orc, $tgl);
        echo json_encode($data);
    }

    public function ajax_get_detail_summary_out()
    {
        $orc      = $_POST['orc'];
        $data['data'] = $this->ManagerModel->get_detail_summaries_out($orc);
        echo json_encode($data);
    }

    // MOLDING
    public function moldingByDate()
    {
        $data['title'] = 'Molding By Date | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/molding/molding_by_date');
        $this->load->view('footer');
    }


    public function daily_molding()
    {
        $rst['data'] = $this->ManagerModel->daily_molding();

        echo json_encode($rst);
    }

    public function moldingSummary()
    {
        $data['title'] = 'Molding Per ORC | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/molding/molding_summary');
        $this->load->view('footer');
    }

    public function get_all_orc_molding()
    {
        $data = $this->ManagerModel->get_all_orc_molding();

        echo json_encode($data);
    }

    public function get_detail_molding($orc)
    {
        $result = $this->ManagerModel->get_by_orc_molding($orc);

        echo json_encode($result);
    }

    public function get_detail_molding2($orc)
    {
        $result = $this->ManagerModel->get_detail_molding2($orc);

        echo json_encode($result);
    }

    public function moldingDaily()
    {
        $data['title'] = 'Daily Molding | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/molding/molding_daily');
        $this->load->view('footer');
    }

    public function get_daily_molding()
    {
        $rst['data'] = $this->ManagerModel->get_daily_molding_orc();

        echo json_encode($rst);
    }

    public function molding_today()
    {
        $data['title'] = 'Molding Today | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/molding/molding_today');
        $this->load->view('footer');
    }

    public function allSummaryMolding()
    {
        $data['title'] = 'Molding Today | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/molding/molding_summary_all');
        $this->load->view('footer');
    }

    public function molding_in()
    {
        $data['title'] = 'Molding Today | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/molding/molding_in');
        $this->load->view('footer');
    }

    public function molding_out()
    {
        $data['title'] = 'Molding Today | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/molding/molding_out');
        $this->load->view('footer');
    }

    public function getCurrentOutputMoldingGraph()
    {
        $rst = $this->ManagerModel->getDataCurrentOutputMolding();
        echo json_encode($rst);
    }

    public function getCurrentOutputMolding()
    {
        $rst['data'] = $this->ManagerModel->getDataCurrentOutputMolding();
        echo json_encode($rst);
    }

    public function getCurrentTotalOutputMolding()
    {
        $rst = $this->ManagerModel->getDataCurrentTotalOutputMolding();
        echo json_encode($rst);
    }

    public function getAllSummary()
    {
        $orc = $this->input->get('orc');

        $result['data'] = $this->ManagerModel->getDataAllSummary($orc);
        echo json_encode($result);
    }

    public function daily_in_molding()
    {
        $rst['data'] = $this->ManagerModel->get_molding_in();

        echo json_encode($rst);
    }

    public function detail_molding_in()
    {

        $tgl = $_POST['tgl'];
        $orc = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->get_data_detail_molding_in($tgl, $orc);
        echo json_encode($rst);
    }

    public function daily_out_molding()
    {
        $rst['data'] = $this->ManagerModel->get_molding_out();

        echo json_encode($rst);
    }

    public function detail_molding_out()
    {

        $tgl = $_POST['tgl'];
        $orc = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->get_data_detail_molding_out($tgl, $orc);
        echo json_encode($rst);
    }

    // SEWING
    public function sewingDaily()
    {
        $data['title'] = 'Sewing By Date | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/sewing/sewing_by_date');
        $this->load->view('footer');
    }

    public function daily_sewing()
    {
        $rst['data'] = $this->ManagerModel->get_daily_sewing();

        echo json_encode($rst);
    }

    public function sewingSummaryOrc()
    {
        $data['title'] = 'Summary ORC | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/sewing/sewing_summary_orc');
        $this->load->view('footer');
    }

    public function get_sewing_summary_orc()
    {
        $orc = $this->input->get('orc');
        $result['data'] = $this->ManagerModel->get_summary_sewing_orc_new($orc);

        echo json_encode($result);
    }

    public function sewingBySize()
    {
        $data['title'] = 'Sewing By Size | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/sewing/sewing_by_size');
        $this->load->view('footer');
    }

    public function get_sewing_size()
    {
        $rst['data'] = $this->ManagerModel->get_sewing_size();

        echo json_encode($rst);
    }

    public function sewingSummaryLine()
    {
        $data['title'] = 'Sewing Summary Line | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/sewing/sewing_summary_line');
        $this->load->view('footer');
    }

    public function get_data_summary_line()
    {
        $data['data'] = $this->ManagerModel->sewing_summary_line();
        echo json_encode($data);
    }

    public function sewingToday()
    {
        $data['title'] = 'Sewing Today | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/sewing/sewing_today_new');
        $this->load->view('footer');
    }

    public function ajax_get_grafik_sewing_today_shift()
    {
        $data = $this->ManagerModel->getDataGraphSewingTodayShift();
        echo json_encode($data);
    }

    public function ajax_get_Count_ORC_Today_Shift()
    {
        $data = $this->ManagerModel->getCountORCTodayShift();

        echo json_encode($data);
    }
    public function ajax_get_total_sewing_today()
    {
        $data = $this->ManagerModel->getDataSewingToday();
        echo json_encode($data);
    }

    public function ajax_get_total_orc()
    {
        $data = $this->ManagerModel->getDataOrcToday();
        echo json_encode($data);
    }

    public function ajax_get_total_line()
    {
        $data = $this->ManagerModel->getDataLineToday();
        echo json_encode($data);
    }

    public function ajax_get_total_down_time_machine()
    {
        $data = $this->ManagerModel->getDataDowntimeToday();
        echo json_encode($data);
    }

    public function ajax_get_grafik_sewing_today()
    {
        $data = $this->ManagerModel->getDataGraphSewingToday();
        echo json_encode($data);
    }
    public function ajax_get_data_sewing_today_coba()
    {
        $data['data'] = $this->ManagerModel->get_data_today_sewing_new();
        echo json_encode($data);
    }

    public function ajax_get_detail_today_new($selectedRow)
    {
        $data = $this->ManagerModel->get_detail_today_new($selectedRow);
        echo json_encode($data);
    }
    public function ajax_get_detail_summary()
    {
        $orc      = $_POST['orc'];
        $data['data'] = $this->ManagerModel->get_detail_summaries($orc);
        echo json_encode($data);
    }
    public function get_detail_summaries_sewing_in()
    {
        $orc      = $_POST['orc'];
        $data['data'] = $this->ManagerModel->get_detail_summaries_sewing_in($orc);
        echo json_encode($data);
    }

    public function ajax_get_machine_breakdown($idline)
    {
        $data = $this->ManagerModel->get_machine_breakedown($idline);
        echo json_encode($data);
    }

    public function ajax_get_summary_coba()
    {
        $data['data'] = $this->ManagerModel->get_data_sum_sewing_coba();
        echo json_encode($data);
    }

    public function ajax_get_detail_summary_sewing($orc)
    {
        $data = $this->ManagerModel->get_detail_summary_sewing($orc);
        echo json_encode($data);
    }

    // PACKING
    public function packingByDate()
    {
        $data['title'] = 'Date Range Per Hours | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/packing/packing_by_date');
        $this->load->view('footer');
    }

    public function packing_filter_hours()
    {
        $rst['data'] = $this->ManagerModel->daterange_packing();

        echo json_encode($rst);
    }

    public function packingSummary()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/packing/packing_summary');
        $this->load->view('footer');
    }

    public function summary_daily_packing()
    {
        $rst['data'] = $this->ManagerModel->summary_daily_packing();

        echo json_encode($rst);
    }

    public function packingDaily()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/packing/packing_daily');
        $this->load->view('footer');
    }

    public function get_daily_packing()
    {
        $rst['data'] = $this->ManagerModel->get_daily_packing();

        echo json_encode($rst);
    }

    public function packingOrc()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/packing/packing_by_orc');
        $this->load->view('footer');
    }

    public function get_all_orc_packing()
    {
        $result = $this->ManagerModel->get_all_orc_packing();

        echo json_encode($result);
    }
    public function get_daily_packing_orc()
    {
        $rst['data'] = $this->ManagerModel->get_daily_packing_orc();

        echo json_encode($rst);
    }

    public function packingWip()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/packing/packing_wip');
        $this->load->view('footer');
    }
    public function wip_packing()
    {
        $data['data'] = $this->ManagerModel->get_wip();

        echo json_encode($data);
    }
    public function packingToday()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/packing/packing_today');
        $this->load->view('footer');
    }
    public function ajax_get_graph_packing()
    {
        $data = $this->ManagerModel->get_graph_packing();
        echo json_encode($data);
    }
    public function ajax_get_packing_today()
    {
        $data['data'] = $this->ManagerModel->get_graph_packing();
        echo json_encode($data);
    }
    public function ajax_get_total_packing()
    {
        $data = $this->ManagerModel->get_total_today_packing();
        echo json_encode($data);
    }

    // FINISH GOOD
    public function allFinishGood()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/finish_good/all_finish_good');
        $this->load->view('footer');
    }

    public function all_fg()
    {
        $data['data'] = $this->ManagerModel->get_all_fg();

        echo json_encode($data);
    }

    public function FinishGoodIn()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/finish_good/finish_good_in');
        $this->load->view('footer');
    }

    public function filter_fg_in()
    {
        $rst['data'] = $this->ManagerModel->get_fg_in();
        echo json_encode($rst);
    }

    public function detail_fg_in()
    {

        $tgl = $_POST['tgl'];
        $orc = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->detail_in($tgl, $orc);
        echo json_encode($rst);
    }

    public function FinishGoodOut()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/finish_good/finish_good_out');
        $this->load->view('footer');
    }

    public function filter_fg_out()
    {
        $rst['data'] = $this->ManagerModel->get_fg_out();
        echo json_encode($rst);
    }

    public function detail_fg_out()
    {

        $tgl = $_POST['tgl'];
        $orc      = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->detail_out($tgl, $orc);

        echo json_encode($rst);
    }

    public function FinishGoodToday()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/finish_good/finish_good_today');
        $this->load->view('footer');
    }
    public function ajax_get_graph_finishgood()
    {
        $data = $this->ManagerModel->get_graph_finishgood();
        echo json_encode($data);
    }
    public function ajax_get_finish_today()
    {
        $data['data'] = $this->ManagerModel->get_graph_finishgood();
        echo json_encode($data);
    }
    public function ajax_get_total_finish()
    {
        $data = $this->ManagerModel->get_total_today_finish();
        echo json_encode($data);
    }

    function get_detail_in()
    {
        $data['data'] = $this->ManagerModel->get_data_detail_in();
        $datas = json_encode($data);
        echo $datas;
    }
    function get_detail_out()
    {
        $data['data'] = $this->ManagerModel->get_data_detail_out();
        $datas = json_encode($data);
        echo $datas;
    }

    // MECHANIC

    public function downtime()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/mechanic/downtime');
        $this->load->view('footer');
    }

    public function get_all_line()
    {
        $data = $this->ManagerModel->get_all_line();

        echo json_encode($data);
    }

    public function filter_machine()
    {
        $rst = $this->ManagerModel->get_by_daterange_downtime();

        echo json_encode($rst);
    }

    public function dailyDowntime()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/mechanic/daily_downtime');
        $this->load->view('footer');
    }

    public function filter_daily_downtime()

    {
        $from_date = $this->input->get("from_date");
        $to_date = $this->input->get("to_date");
        $rst = $this->ManagerModel->get_by_daterange_daily($from_date, $to_date);

        echo json_encode($rst);
    }

    public function dailyDowntimeMachineType()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/mechanic/downtime_machine_daily');
        $this->load->view('footer');
    }
    public function get_data_machine_type_v3()
    {
        $data = $this->ManagerModel->get_by_month_v3();
        echo json_encode($data);
    }
    public function ajax_get_detail_type_v2($label, $tgl)
    {
        $data = $this->ManagerModel->get_by_month_detail_v2($label, $tgl);
        echo json_encode($data);
    }

    public function getTotalMachine()
    {
        $kodeBarang = $this->input->post("kodeBarang");

        $data = $this->ManagerModel->loadJml($kodeBarang);
        echo json_encode($data);
    }

    public function downtimeAnalize()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/mechanic/downtime_analize');
        $this->load->view('footer');
    }

    public function get_month()
    {
        $data = $this->ManagerModel->get_month();
        echo json_encode($data);
    }
    public function get_downtime_analize()
    {
        $rst['data'] = $this->ManagerModel->get_downtime_analize();

        echo json_encode($rst);
    }

    public function kpiMechanic()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/mechanic/kpi_mechanic');
        $this->load->view('footer');
    }

    public function get_month_kpi()
    {
        $data = $this->ManagerModel->get_month_kpi();
        echo json_encode($data);
    }

    public function get_datas_kpi($month)
    {
        $data = $this->ManagerModel->get_datas_kpi($month);
        echo json_encode($data);
    }

    // Bundle Record
    // ==================================================================================================
    public function bundle_record()
    {
        $data['title'] = 'Bundle Record | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/bundle_record/bundleRecordView');
        $this->load->view('footer');
    }

    public function get_orc()
    {
        $data = $this->ManagerModel->get_all_orc();
        echo json_encode($data);
    }

    public function get_detail_orc()
    {
        $orc = $this->input->get('orc');

        $result = $this->ManagerModel->get_detail($orc);
        echo json_encode($result);
    }
    // ==================================================================================================

    // ==================================================================================================
    public function bundle_record_v2()
    {
        $data['title'] = 'Bundle Record | GI-Production';

        $this->load->view('header_datatable_select', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/bundle_record/bundleRecordV2View');
        $this->load->view('footer');
    }

    public function getBundleRecord()
    {
        $orc = $this->input->get('orc');
        $size = $this->input->get('size');

        $result['data'] = $this->ManagerModel->getDataBundleRecord($orc, $size);
        echo json_encode($result);
    }

    public function getSizeAndQty()
    {
        $orc = $this->input->get('orc');

        $data = $this->ManagerModel->getDataSizeAndQty($orc);
        echo json_encode($data);
    }

    public function getDetails()
    {
        $orc = $this->input->get('orc');

        $data = $this->ManagerModel->getDataDetails($orc);
        echo json_encode($data);
    }
    // ==================================================================================================



    // Date Range Line Per Hours
    // ==================================================================================================
    public function date_range_line_per_hours()
    {
        $data['title'] = 'Date Range Line Per Hours | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/date_range_line_per_hours/dateRangeLinePerHoursView');
        $this->load->view('footer');
    }

    public function getDateRangLinePerHours()
    {
        $date = $this->input->get('date');

        $result['data'] = $this->ManagerModel->getDataDateRangLinePerHours($date);
        echo json_encode($result);
    }
    // ==================================================================================================



    // Compare Barcode
    // ==================================================================================================
    public function compare_barcode()
    {
        $data['title'] = 'Compare Barcode | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/compare_barcode/compareBarcodeView');
        $this->load->view('footer');
    }

    public function getORCCompareBarcode()
    {
        $result = $this->ManagerModel->getDataORCCompareBarcode();
        echo json_encode($result);
    }

    public function getCompareBarcodeTable()
    {
        $orc = $this->input->get('orc');

        $result['data'] = $this->ManagerModel->getDataCompareBarcodeTable($orc);
        echo json_encode($result);
    }
    // ==================================================================================================


    // Mechanic
    // ==================================================================================================
    public function downtimeToday()
    {
        $data['title'] = 'Compare Barcode | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/mechanic/downtime_today');
        $this->load->view('footer');
    }

    public function ajax_get_data_mekanik_today()
    {
        $data = $this->ManagerModel->get_data_mekanik_today();
        echo json_encode($data);
    }

    public function ajax_get_mechanic_today()
    {
        $data['data'] = $this->ManagerModel->get_data_mekanik_today();
        echo json_encode($data);
    }

    public function ajax_get_dateRange()
    {
        $data = $this->ManagerModel->get_daterange();
        echo json_encode($data);
    }

    public function ajax_get_detail_mechanic($idMech)
    {
        $data = $this->ManagerModel->get_data_per_mechanic($idMech);
        echo json_encode($data);
    }

    public function ajax_get_dateRange_detail($idMech)
    {
        $data = $this->NewReportMekanikModel->get_detail_date_range($idMech);
        echo json_encode($data);
    }

    // ==================================================================================================
    public function ajax_get_detail_orc_packing($orc)
    {
        $data = $this->ManagerModel->get_detail_orc_packing($orc);
        echo json_encode($data);
    }
    public function ajax_get_detail_orc_finish($orc)
    {
        $data = $this->ManagerModel->get_detail_orc_finish($orc);
        echo json_encode($data);
    }

    public function summary_prod()
    {
        $data['title'] = 'Production Report | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/summaries/production_summary');
        $this->load->view('footer');
    }

    public function get_summary_prod()
    {
        $orc = $this->input->get('orc');

        $result['data'] = $this->ManagerModel->getDataSummaryProd($orc);
        echo json_encode($result);
    }

    public function summary_prod_global()
    {
        $data['title'] = 'Production Report | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/summaries/production_summary_global');
        $this->load->view('footer');
    }

    public function get_summary_prod_global()
    {
        $result['data'] = $this->ManagerModel->getDataSummaryProdGlobal();
        echo json_encode($result);
    }

    public function getOrcSummary()
    {
        $result = $this->ManagerModel->getDataOrcSummary();
        echo json_encode($result);
    }

    // Compare Barcode
    // ==================================================================================================
    public function SkpIn()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/skp/skp_in');
        $this->load->view('footer');
    }

    public function filter_skp_in()
    {
        $rst['data'] = $this->ManagerModel->get_skp_in();

        echo json_encode($rst);
    }

    public function detail_skp_in()
    {

        $tgl = $_POST['tgl'];
        $orc      = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->detail_in_skp($tgl, $orc);

        echo json_encode($rst);
    }

    public function SkpOut()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/skp/skp_out');
        $this->load->view('footer');
    }

    public function filter_skp_out()
    {
        $rst['data'] = $this->ManagerModel->get_skp_out();

        echo json_encode($rst);
    }
    public function detail_skp_out()
    {

        $tgl = $_POST['tgl'];
        $orc      = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->detail_out_skp($tgl, $orc);

        echo json_encode($rst);
    }

    public function JuitaIn()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/juita/juita_in');
        $this->load->view('footer');
    }

    public function filter_juita_in()
    {
        $rst['data'] = $this->ManagerModel->get_juita_in();

        echo json_encode($rst);
    }
    public function detail_juita_in()
    {

        $tgl = $_POST['tgl'];
        $orc      = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->detail_in_juita($tgl, $orc);

        echo json_encode($rst);
    }

    public function JuitaOut()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/juita/juita_out');
        $this->load->view('footer');
    }

    public function filter_juita_out()
    {
        $rst['data'] = $this->ManagerModel->get_juita_out();

        echo json_encode($rst);
    }
    public function detail_juita_out()
    {

        $tgl = $_POST['tgl'];
        $orc      = $_POST['orc'];
        $rst['data'] = $this->ManagerModel->detail_out_skp($tgl, $orc);

        echo json_encode($rst);
    }

    public function SummarySkp()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/skp/summary_skp');
        $this->load->view('footer');
    }
    public function all_skp()
    {
        $data['data'] = $this->ManagerModel->summary_skp();

        echo json_encode($data);
    }

    public function all_juita()
    {
        $data['data'] = $this->ManagerModel->summary_juita();

        echo json_encode($data);
    }

    public function SummaryJuita()
    {
        $data['title'] = 'Dashboard | GI-Production';

        $this->load->view('header', $data);
        $this->load->view('manager/sidebarManager');
        $this->load->view('navbar');
        $this->load->view('manager/juita/summary_juita');
        $this->load->view('footer');
    }
}
