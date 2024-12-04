<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Pengajuan_KerusakanAdmin extends CI_Controller
{
    private $view = "backend/v_pengajuan_kerusakanadmin/";
    private $redirect = "Pengajuan_KerusakanAdmin";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //Load model
        $this->load->model('M_perangkat');
        $this->load->model('M_pengajuan_kerusakan');
        $this->load->model('M_users');
    }
    function index()
    {
        //memanggil model M_tagihan dengan function GetAll
        $read = $this->M_pengajuan_kerusakan->GetAll();
        $data = array(
            //'read' variabel yang akan dipanggil pada view read.php
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Data Master",
            'sub' => "Data Pengajuan Pengguna",
            'read' => $read
        );
        /*
        dengan $this->view artinya memanggil private $view="backend/v_user/"
        dilanjutkan dengan 'read' untuk memanggil read.php
        */
        $this->template->load('templateAdmin/Pengajuan_KerusakanAdmin', $this->view . 'read', $data);
    }
    public function create()
    {
        $data = array(
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Data Master",
            'sub' => "Tambah Data Pengajuan Pengguna",
            'getuser' => $this->M_users->GetAll(),
            'getperangkat' => $this->M_perangkat->GetAll(),
            'create' => ''
        );
        $this->template->load('templateAdmin/Pengajuan_KerusakanAdmin', $this->view . 'create', $data);
        // $this->load->view($this->view . 'create', $data);
    }
    public function save()
    {
            $LastId = $this->M_pengajuan_kerusakan->getLastId();
            if ($LastId == null){
                $id = 1;
            } else {
                $id = $LastId + 1;
            }
            $data = array(
                'id_pengajuan' => $id,
                'id_users' => $this->session->userdata('id_users'),
                'id_perangkat' => $this->input->post('id_perangkat'),
                'tanggal_pengajuan' => date('Y-m-d'),
                'deskripsi_kerusakan' => $this->input->post('deskripsi_kerusakan'),
                'status_pengajuan' => 'baru'
            );
            // var_dump($data);
            $this->M_pengajuan_kerusakan->save($data);
            redirect($this->redirect, 'refresh');
        }


    public function edit()
    {
        $kd = $this->uri->segment(3);
        // echo $kd;
        $data = array(
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Data Master",
            'sub' => "Ubah Data Pengajuan Pengguna",
            'getuser' => $this->M_users->GetAll(),
            'getperangkat' => $this->M_perangkat->GetAll(),
            'edit' => $this->M_pengajuan_kerusakan->edit($kd)
        );
        // $this->load->view($this->view . 'edit', $data);
        $this->template->load('templateAdmin/Pengajuan_KerusakanAdmin', $this->view . 'edit', $data);
    }
    public function update()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'id_users' => $this->input->post('id_users'),
            'id_perangkat' => $this->input->post('id_perangkat'),
            'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
            'deskripsi_kerusakan' => $this->input->post('deskripsi_kerusakan'),
            'status_pengajuan' => $this->input->post('status_pengajuan')
        );
        $this->M_pengajuan_kerusakan->update($kd, $data);
        redirect($this->redirect, 'refresh');
    }
    public function status()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            'status_pengajuan' => $this->uri->segment(4)
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
    public function print()
    {
        $data['print'] = $this->M_pengajuan_kerusakan->GetAll();
        $read = $this->M_pengajuan_kerusakan->GetAll();
        $data = array(
            //'read' variabel yang akan dipanggil pada view read.php
            'judul' => "Data Pengajuan Kerusakan Pengguna",
            'read' => $read
        );
        $this->load->view($this->view . 'print', $data);
    }
    public function excel()
    {
        $data['print'] = $this->M_pengajuan_kerusakan->GetAll();
        $read = $this->M_pengajuan_kerusakan->GetAll();
        $data = array(
            //'read' variabel yang akan dipanggil pada view read.php
            'judul' => "Data Pengajuan Kerusakan Pengguna",
            'read' => $read
        );
        $this->load->view($this->view . 'excel', $data);
    }

}