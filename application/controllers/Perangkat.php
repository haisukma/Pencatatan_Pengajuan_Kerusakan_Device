<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Perangkat extends CI_Controller
{
    private $view = "backend/v_perangkat/";
    private $redirect = "Perangkat";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //Load model
        $this->load->model('M_perangkat');
        $this->load->model('M_pengajuan_kerusakan');
        $this->load->model('M_users');
        IsAdmin();
    }
    function index()
    {
        //memanggil model M_tagihan dengan function GetAll
        $read = $this->M_perangkat->GetAll();
        $data = array(
            //'read' variabel yang akan dipanggil pada view read.php
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Wajib Master",
            'sub' => "Data Perangkat Pengguna",
            'read' => $read
        );
        /*
        dengan $this->view artinya memanggil private $view="backend/v_user/"
        dilanjutkan dengan 'read' untuk memanggil read.php
        */
        $this->template->load('templateAdmin/Perangkat', $this->view . 'read', $data);
    }
    public function create()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Data Master",
            'sub' => "Tambah Perangkat Pengguna",
            'create' => ''
        );
        $this->template->load('templateAdmin/Perangkat', $this->view . 'create', $data);
        // $this->load->view($this->view . 'create', $data);
    }
    public function save()
    {
        $data = array(
            'id_perangkat' => $this->input->post('id_perangkat'),
            'nama_perangkat' => $this->input->post('nama_perangkat'),
            'merk' => $this->input->post('merk'),
            'serial_number' => $this->input->post('serial_number'),
            'lokasi_perangkat' => $this->input->post('lokasi_perangkat')
        );
        $this->M_perangkat->save($data);
        //dengan $this->redirect artinya memanggil private $redirect = "Admin"
        redirect($this->redirect,'refresh');
    }

    public function edit()
    {
        $kd = $this->uri->segment(3);
        // echo $kd;
        $data = array(
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Data Master",
            'sub' => "Ubah Perangkat Pengguna",
            'edit' => $this->M_perangkat->edit($kd)
        );
        // $this->load->view($this->view . 'edit', $data);
        $this->template->load('templateAdmin/Perangkat', $this->view . 'edit', $data);
    }
    public function update()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'nama_perangkat' => $this->input->post('nama_perangkat'),
            'merk' => $this->input->post('merk'),
            'serial_number' => $this->input->post('serial_number'),
            'lokasi_perangkat' => $this->input->post('lokasi_perangkat')
        );
        $this->M_perangkat->update($kd, $data);
        redirect($this->redirect, 'refresh');
    }
    public function delete()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'id_perangkat' => $kd
        );
        $this->M_perangkat->delete($data);
        redirect($this->redirect, 'refresh');


    }

}