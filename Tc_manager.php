<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tc_manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'CTIS - Test Centre Manager';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/tcm_header', $data);
        $this->load->view('templates/tcm_sidebar', $data);
        $this->load->view('templates/tcm_topbar', $data);
        $this->load->view('tc_manager/index', $data);
        $this->load->view('templates/tcm_footer');
    }

    //====================================================================================================================

    //Function To Record Tester -- Test Centre Manager
    public function tcm_recordTester()
    {
        $this->form_validation->set_rules('username', "Username", 'required|trim');
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', ['matches' => "Password doesn't match !", 'min_length' => 'Password minimum of 5 characters']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'CTIS - Record Tester';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/tcm_header', $data);
            $this->load->view('templates/tcm_sidebar', $data);
            $this->load->view('templates/tcm_topbar', $data);
            $this->load->view('tc_manager/tcm_recordtester', $data);
            $this->load->view('templates/tcm_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'active' => 1
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! new tester account has been created
          </div>');
            redirect('tc_manager/tcm_recordtester');
        }
    }
    public function tcm_testCentre()
    {
        $this->form_validation->set_rules('tc_name', "Test Centre's Name", 'required|trim');
        $this->form_validation->set_rules('tc_address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'CTIS - Register Test Centre';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $this->load->view('templates/tcm_header', $data);
            $this->load->view('templates/tcm_sidebar', $data);
            $this->load->view('templates/tcm_topbar', $data);
            $this->load->view('tc_manager/tcm_testcentre');
            $this->load->view('templates/tcm_footer');
        } else {
            $data = [
                'tc_name' => htmlspecialchars($this->input->post('tc_name', true)),
                'tc_address' => htmlspecialchars($this->input->post('tc_address', true)),
            ];

            $this->db->insert('test_centre', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! new Test Centre has been registered
          </div>');
            redirect('tc_manager/tcm_testcentre');
        }
    }
}
