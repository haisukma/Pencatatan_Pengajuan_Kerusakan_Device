<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Pengajuan_Kerusakan extends CI_Controller
{
    private $view = "backend/v_pengajuan_kerusakan/";
    private $redirect = "Pengajuan_Kerusakan";
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
        $read = $this->M_pengajuan_kerusakan->GetAll();
        $data = array(
            //'read' variabel yang akan dipanggil pada view read.php
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Wajib Master",
            'sub' => "Data Pengajuan Kerusakan Pengguna",
            'read' => $read
        );
        /*
        dengan $this->view artinya memanggil private $view="backend/v_user/"
        dilanjutkan dengan 'read' untuk memanggil read.php
        */
        $this->template->load('templateAdmin/Pengajuan_Kerusakan', $this->view . 'read', $data);
    }
    public function create()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Data Master",
            'sub' => "Tambah Pengajuan Kerusakan Pengguna",
            'create' => ''
        );
        $this->template->load('templateAdmin/Pengajuan_Kerusakan', $this->view . 'create', $data);
        // $this->load->view($this->view . 'create', $data);
    }
    public function save()
    {
        $data = array(
            'id_pengajuan'=> $this->input->post('id_pengajuan'),
            'id_users'=> $this->input->post('id_users'),
            'id_perangkat'=> $this->input->post('id_perangkat'),
            'tanggal_pengajuan'=> $this->input->post('tanggal_pengajuan'),
            'deskripsi_kerusakan'=> $this->input->post('deskripsi_kerusakan'),
            'status_pengajuan' => $this->input->post('status_pengajuan')
        );
        $this->M_pengajuan_kerusakan->save($data);
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
            'sub' => "Ubah Pengajuan Kerusakan Pengguna",
            'edit' => $this->M_pengajuan_kerusakan->edit($kd)
        );
        // $this->load->view($this->view . 'edit', $data);
        $this->template->load('templateAdmin/Pengajuan_Kerusakan', $this->view . 'edit', $data);
    }
    public function update()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'id_users'=> $this->input->post('id_users'),
            'id_perangkat'=> $this->input->post('id_perangkat'),
            'tanggal_pengajuan'=> $this->input->post('tanggal_pengajuan'),
            'deskripsi_kerusakan'=> $this->input->post('deskripsi_kerusakan'),
            'status_pengajuan'=> $this->input->post('status_pengajuan')
        );
        $this->M_pengajuan_kerusakan->update($kd, $data);
        redirect($this->redirect, 'refresh');
    }
    public function delete()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'id_pengajuan' => $kd
        );
        $this->M_pengajuan_kerusakan->delete($data);
        redirect($this->redirect, 'refresh');


    }

}