<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
    }




    public function index(){
        $this->form_validation->set_rules('a_user_email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('a_user_password','Password','trim|required');

        if($this->form_validation->run() == false ){
        $data['namalogo'] = 'login';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/v_login');
        $this->load->view('templates/auth_footer');
        }else{
            $this->_login();
        }
    }

    private function _login()
    {
        $a_user_email       = $this->input->post('a_user_email');
        $a_user_password    = $this->input->post('a_user_password');

        $a_user = $this->db->get_where('a_user',['a_user_email' => $a_user_email] )->row_array();

        // jika user ada
        if($a_user){
            // jika user aktif
            if($a_user['is_active'] == 1){
                if(password_verify($a_user_password,$a_user['a_user_password'])){
                    $data = [
                        'a_user_email'  => $a_user['$a_user_email'],
                        'role_id'       => $a_user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($a_user['role_id'] == 1){
                        redirect('user/user');
                    }else{
                        $this->session->set_flashdata('massage','<div class="alert alert-danger" role="alert">
                        Email belum terverifikasi , silahkan cek email anda!
                        </div>');
                        redirect('auth');
                    }
                }else{
                    $this->session->set_flashdata('massage','<div class="alert alert-danger" role="alert">
                    Password salah !
                    </div>');
                    redirect('auth');
                }
            }else{
            $this->session->set_flashdata('massage','<div class="alert alert-danger" role="alert">
            Email belum di Aktivasi, Hubungi Bag. Admin !
            </div>');
            redirect('auth');
            }
        }else{
            $this->session->set_flashdata('massage','<div class="alert alert-danger" role="alert">
            Email belum terdaftar!
            </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('a_user_name','Name','required|trim');
        $this->form_validation->set_rules('a_user_email','Email','required|trim|valid_email|is_unique[a_user.a_user_email]',
        [
            'is_unique' => 'Email sudah terdaftar !'
        ]
        );
        $this->form_validation->set_rules('a_user_password','Password','required|trim|min_length[6]|matches[a_user_password2]',
        [
        'matches'=> 'Password dont match !',
        'min_length'=> 'Password to short!'
        ]
        );
        $this->form_validation->set_rules('a_user_password2','Password','required|trim|matches[a_user_password]');

        if($this->form_validation->run()== false){
            $data['namalogo'] = 'Registration';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/v_registration');
            $this->load->view('templates/auth_footer');
        }else{
            $data = [
                'a_user_name'     => htmlspecialchars($this->input->post('a_user_name', true)),
                'a_user_email'    => htmlspecialchars($this->input->post('a_user_email', true)),
                'a_user_image'    => 'default.png',
                'a_user_password' => password_hash($this->input->post('a_user_password'), PASSWORD_DEFAULT),
               //  merubah role_id sesuai table user_role
                'role_id'         => 1,
                'is_active'       => 1,
                'date_created'    => time()
            ];
            // harus nya memakai model
            $this->db->insert('a_user',$data);
            $this->session->set_flashdata('massage','<div class="alert alert-success" role="alert">
               Congratulation! your account has been created. please login!
               </div>');
            redirect('auth');
           }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('massage','<div class="alert alert-success" role="alert">
            You have been logged out!
            </div>');
         redirect('auth');

    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}