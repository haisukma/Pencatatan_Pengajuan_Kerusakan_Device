<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    private $view = "backend/";
    private $redirect = "Users";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        // Load model
        $this->load->model('M_auth');
        $this->load->model('M_users');
    }

    public function index()
    {
        $this->session->sess_destroy();
        $data = array(
            'judul' => "Login",
            'login' => ''
        );
        $this->template->load('backend/templateAuth', $this->view . 'Login', $data);
    }

    public function login()
    {
        $user = $this->input->post('username');
        $pwd = md5($this->input->post('pswd_users'));
        $data = $this->M_auth->CekLogin('tb_users', 'username', $user);

        // Jika login berhasil
        if ($data && $data['pswd_users'] == $pwd && $data['username'] == $user) {
            if ($data['level'] == 'admin') { // admin
                $array = array(
                    'id_users' => $data['id_users'],
                    'username' => $data['username'],
                    'level' => 'admin',
                    'IsAdmin' => 1
                );
                $this->session->set_userdata($array);
                redirect('Admin_home', 'refresh');
            } else if ($data['level'] == 'member') { // member
                $array = array(
                    'id_users' => $data['id_users'],
                    'username' => $data['username'],
                    'level' => 'member',
                    'IsAdmin' => 1
                );
                $this->session->set_userdata($array);
                redirect('User_home', 'refresh');
            }
        } else { // Jika login gagal
            $this->session->set_flashdata('login_error', 'Username atau password salah!');
            redirect('Auth', 'refresh');
        }
    }

    public function register()
    {
        //untuk create tidak memangil model, langsung ke view dengan data baru
        $data = array(
            'judul' => "Buat Akun",
            'create' => ''
        );
        $this->template->load('backend/templateAuth', $this->view . 'Register', $data);
    }
    public function save()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_users.username]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'judul' => "Buat Akun",
                'create' => '',
                'register_error' => validation_errors() 
            );
            $this->template->load('backend/templateAuth', $this->view . 'Register', $data);
        } else {
            $last_id = $this->M_users->getLastId();
            if ($last_id == null) {
                $id_user = 1;
            } else {
                $id_user = $last_id + 1;
            }

            $data = array(
                'id_users' => $id_user,
                'username' => $this->input->post('username'),
                'pswd_users' => md5($this->input->post('pswd_users')),
                'level' => 'member'
            );
            $this->M_users->save($data);
            redirect($this->redirect, 'refresh');
        }
    }
    public function logout()
    {
        // Hancurkan data session
        $this->session->sess_destroy();
        redirect('Auth', 'refresh');
    }
}