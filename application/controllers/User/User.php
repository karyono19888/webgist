<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index(){
        $data['title']  = 'My Profile';
        $data['a_user'] = $this->db->get_where('a_user',['a_user_email' => $this->session->userdata('a_user_email')])->row_array();
        $this->load->view('Home/v_user',$data);
    }
}