<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('M_Auth');
        $this->load->model('M_Front');
        $this->get_datasetupapp = $this->M_Front->fetchsetupapp();
    }

    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect(base_url());
        }
        $validation = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|xss_clean',
                'errors' => ['required' => 'You must provide a %s.', 'xss_clean' => 'Please check your form on %s.']
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|xss_clean',
                'errors' => ['required' => 'You must provide a %s.', 'xss_clean' => 'Please check your form on %s.']
            ]
        ];
        $this->form_validation->set_rules($validation);
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Login Absensi',
                'dataapp' => $this->get_datasetupapp
            ];
            $this->load->view('layout/auth_header',$data);
            $this->load->view('auth/v_login',$data);
            $this->load->view('layout/auth_footer',$data);
        } else {
            //validasi sukses
            $this->M_Auth->do_login();
        }
        }
    }
