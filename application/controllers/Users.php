<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{
  /*
  $view berfungsi untuk membaca file view seperti read.php, create.php
  dan edit.php dengan lokasi folder views/backend/v_user/
  */
  private $view = "backend/v_users/";
  //memanggil control user/index dalam keadaan refresh
  private $redirect = "Users";
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    //control user menghubungkan model M_user
    IsAdmin();
    $this->load->model('M_users');
  }
  function index()
  {
    //memanggil model M_user dengan function GetAll
    $read_admin = $this->M_users->GetAdmin();
    $read_user = $this->M_users->GetUser();
    $data = array(
      //'read' variabel yang akan dipanggil pada view read.php
      'username' => $this->session->userdata('username'),
      'level' => $this->session->userdata('level'),
      'judul' => "Data Master",
      'sub' => "Halaman Pengguna",
      'read_admin' => $read_admin,
      'read_user' => $read_user
    );
    /*
    dengan $this->view artinya memanggil private $view="backend/v_user/"
    dilanjutkan dengan 'read' untuk memanggil read.php
    */
    $this->template->load('templateAdmin/Users', $this->view . 'read', $data);
  }
  public function create()
  {
    //untuk create tidak memangil model, langsung ke view dengan data baru
    $data = array(
      'username' => $this->session->userdata('username'),
      'level' => $this->session->userdata('level'),
      'judul' => "Data Master",
      'sub' => "Tambah Akun",
      'create' => ''
    );
    $this->template->load('templateAdmin/Users', $this->view . 'create', $data);
  }
  public function save()
  {
    $this->form_validation->set_rules('id_users', 'Kode User', 'required|is_unique[users.id_users]');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');

    if ($this->form_validation->run() == FALSE) {
      // Validasi gagal, kembali ke halaman registrasi dengan error
      $data = array(
        'username' => $this->session->userdata('username'),
        'level' => $this->session->userdata('level'),
        'judul' => "Data Master",
        'sub' => "Tambah Akun",
        'kode_error' => form_error('id_users'),
        // Menggunakan form_error() untuk mendapatkan pesan kesalahan Kode User
        'username_error' => form_error('username') // Menggunakan form_error() untuk mendapatkan pesan kesalahan Username
      );
      $this->template->load('templateAdmin/Users', $this->view . 'create', $data);
    } else {
      // Validasi berhasil, simpan data pengguna baru
      $data = array(
        'id_users' => $this->input->post('id_users'),
        'username' => $this->input->post('username'),
        'pswd_users' => md5($this->input->post('pswd_users')),
        'divisi' => $this->input->post('divisi'),
        'level' => $this->input->post('level')
      );
      $this->M_users->save($data);

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
      'divisi' => $this->session->userdata('divisi'),
      'level' => $this->session->userdata('level'),
      'judul' => "Data Master",
      'sub' => "Edit Pengguna",
      //'edit' variabel yang akan dipanggil pada view edit.php
      'edit' => $this->M_users->edit($kd)
    );
    $this->template->load('templateAdmin/Users', $this->view . 'edit', $data);
  }
  public function update()
  {
    $kd = $this->uri->segment(3);
    $data = array(
      /*
      'username' =nama yang diambil dari fild pada tabel
      $this->input->post('username') =nama yang diambil dari form
      */
      'username' => $this->input->post('username'),
      'pswd_users' => md5($this->input->post('pswd_users')),
      'divisi' => $this->input->post('divisi'),
      'level' => $this->input->post('level'),
    );
    $this->M_users->update($kd, $data);
    redirect($this->redirect, 'refresh');
  }

  public function delete()
  {
    $kd = $this->uri->segment(3);
    $data = array(
      //data akan dihapus sesuai uri->segment(3) yang dipilih
      'id_users' => $kd
    );
    $this->M_users->delete($data);
    redirect($this->redirect, 'refresh');
  }
  public function printAdmin()
  {
    $data['print'] = $this->M_users->GetAdmin();
    $read_admin = $this->M_users->GetAdmin();
    $data = array(
      //'read' variabel yang akan dipanggil pada view read.php
      'judul' => "Data Admin",
      'read_admin' => $read_admin
    );
    $this->load->view($this->view . 'printAdmin', $data);
  }

  public function printUser()
  {
    $data['print'] = $this->M_users->GetUser();
    $read_user = $this->M_users->GetUser();
    $data = array(
      //'read' variabel yang akan dipanggil pada view read.php
      'judul' => "Data Pengguna",
      'read_user' => $read_user
    );
    $this->load->view($this->view . 'printUser', $data);
  }
  public function excelAdmin()
  {
    $data['print'] = $this->M_users->GetAdmin();
    $read_admin = $this->M_users->GetAdmin();
    $data = array(
      //'read' variabel yang akan dipanggil pada view read.php
      'judul' => "Data Admin",
      'read_admin' => $read_admin
    );
    $this->load->view($this->view . 'excelAdmin', $data);
  }
  public function excelUser()
  {
    $data['print'] = $this->M_users->GetUser();
    $read_user = $this->M_users->GetUser();
    $data = array(
      //'read' variabel yang akan dipanggil pada view read.php
      'judul' => "Data User",
      'read_user' => $read_user
    );
    $this->load->view($this->view . 'excelUser', $data);
  }

}