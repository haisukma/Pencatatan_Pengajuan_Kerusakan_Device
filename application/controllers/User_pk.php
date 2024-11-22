<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Userwp extends CI_Controller
{
    /*
    $view berfungsi untuk membaca file view seperti read.php, create.php
    dan edit.php dengan lokasi folder views/backend/v_userwp/
    */
    private $view = "backend/v_userpk/";
    //memanggil control userwp/index dalam keadaan refresh
    private $redirect = "userpk";
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //control userwp menghubungkan model M_userwp
        IsAdmin();
        $this->load->model('M_userpk');
        $this->load->model('M_pengajuan_kerusakan');
    }
    function index()
    {
        $id_user = $this->session->userdata('id_users');

        // Memanggil model M_userwp dengan function GetByUserId
        $read = $this->M_userpk->GetByUserId($id_user);
        //memanggil model M_userwp dengan function GetAll
        $read = $this->M_userpk->GetAll();
        $data = array(
            //'read' variabel yang akan dipanggil pada view read.php
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Pelaporan Kerusakan Device",
            'sub' => "Data Pelaporan Kerusakan",
            'read' => $read
        );
        /*
        dengan $this->view artinya memanggil private $view="backend/v_user/"
        dilanjutkan dengan 'read' untuk memanggil read.php
        */
        $this->template->load('templateUser/Pengajuan_Kerusakan', $this->view . 'read', $data);
    }
    public function create()
    {
        //untuk create tidak memangil model, langsung ke view dengan data baru
        $data = array(
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Pelaporan Kerusakan Device",
            'sub' => "Data Pelaporan Kerusakan Device",
            'perangkat' => $this->M_perangakat->GetAll(),
            'create' => ''
        );
        $this->template->load('templateUser/Pengajuan_Kerusakan', $this->view . 'create', $data);
    }
    public function save()
    {
        $this->form_validation->set_rules('id_pengajuan', 'deksripsi_kerusakan', 'required|is_unique[Pengajuan_Kerusakan.id_pengajuan]');

        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kembali ke halaman registrasi dengan error
            $data = array(
                'username' => $this->session->userdata('username'),
                'level' => $this->session->userdata('level'),
                'judul' => "Pelaporan Kerusakan Device",
                'sub' => "Data Pelaporan Kerusakan Device",
                'perangkat' => $this->M_perangkat->GetAll(),
                'create' => '',
                'kode_error' => form_error('id_pengajuan'),
                // Menggunakan form_error() untuk mendapatkan pesan kesalahan Kode User
            );
            $this->template->load('templateUser/Pengajuan_Kerusakan', $this->view . 'create', $data);
        } else {
            // Validasi berhasil, simpan data pengguna baru
            $data = array(
                'id_pengajuan' => $this->input->post('id_pengajuan'),
                'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
                'id_perangkat' => $this->input->post('id_perangkat'),
                'deskripsi_kerusakan' => $this->input->post('deskripsi_kerusakan'),
                'status_pengajuan' => $this->input->post('status_pengajuan'),
                'divisi' => $this->input->post('divisi'),
                'id_users' => $this->session->userdata('id_users')
            );
            $this->M_userpk->save($data);

            redirect($this->redirect, 'refresh');
        }
    }

    public function edit()
    {
        /*
        segment 1 adalah control, segment 2 adalah function, segment 2 adalah PK,
        data yang akan ditambilkan hanya yang dipilih saja sesuai PK yang dipilih
        */
        $kd = $this->uri->segment(3);
        $data = array(
            'username' => $this->session->userdata('username'),
            'level' => $this->session->userdata('level'),
            'judul' => "Pelaporan Kerusakan Device",
            'sub' => "Data Pelaporan Kerusakan Device",
            'perangkat' => $this->M_perangkat->GetAll(),
            //'edit' variabel yang akan dipanggil pada view edit.php
            'edit' => $this->M_userpk->edit($kd)
        );
        $this->template->load('templateUser/Pengajuan_Kerusakan', $this->view . 'edit', $data);
    }
    public function update()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            /*
            'nama_userwp' =nama yang diambil dari fild pada tabel
            $this->input->post('nama_userwp') =nama yang diambil dari form
            */
            'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
            'id_perangkat' => $this->input->post('id_perangkat'),
            'deskripsi_kerusakan' => $this->input->post('deskripsi_kerusakan'),
            'status_pengajuan' => $this->input->post('status_pengajuan'),
            'divisi' => $this->input->post('divisi'),
            'id_users' => $this->session->userdata('id_users')
        );
        $this->M_userpk->update($kd, $data);
        redirect($this->redirect, 'refresh');
    }
    public function delete()
    {
        $kd = $this->uri->segment(3);
        $data = array(
            //data akan dihapus sesuai uri->segment(3) yang dipilih
            'id_pengajuan' => $kd
        );
        $this->M_userwp->delete($data);
        redirect($this->redirect, 'refresh');
    }
    public function print()
    {
        $data['print'] = $this->M_userpk->GetAll();
        $read = $this->M_userpk->GetAll();
        $data = array(
            //'read' variabel yang akan dipanggil pada view read.php
            'judul' => "Data Pelaporan Kerusakan Device",
            'read' => $read
        );
        $this->load->view($this->view . 'print', $data);
    }
    public function excel()
    {
        $data['print'] = $this->M_userpk->GetAll();
        $read = $this->M_userwp->GetAll();
        $data = array(
            //'read' variabel yang akan dipanggil pada view read.php
            'judul' => "Data Pelaporan Kerusakan Device",
            'read' => $read
        );
        $this->load->view($this->view . 'excel', $data);
    }
}