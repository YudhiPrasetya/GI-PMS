<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outerwear extends MY_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();

    //     if ($this->session->userdata('logged_in') !== TRUE) {
    //         redirect('');
    //     } else {
    //         if ($this->session->userdata['username'] != "Admin Outerwear") {
    //             redirect('auth/not_allowed');
    //         }
    //     }
    // }

    public function __construct()
    {
        parent::__construct();


        if ((int)$this->session->userdata['role_gi_production'] !== 16) {
            redirect('auth/not_allowed');
        }


        // $this->load->model('CuttingModel');
    }

    public function dashboard()
    {
        redirect('juwita/dashboard');
    }

    public function second_dashboard()
    {
        redirect('skp/dashboard');
    }
}
