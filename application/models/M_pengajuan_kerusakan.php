<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pengajuan_kerusakan extends CI_Model
{
    private $table = 'tb_pengajuan_kerusakan';
    private $pk = 'id_pengajuan';
    public function GetAll()
    {
        $this->db->order_by($this->pk, 'asc');
        return $this->db->get($this->table);
    }
    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }
    public function getLastId()
    {
        $this->db->select_max($this->pk);
        $query = $this->db->get($this->table);
        $result = $query->row_array();

        return $result[$this->pk];
    }
    public function GetByUserId($id_user)
    {
        $this->db->where('id_users', $id_user);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function edit($kd)
    {
        $this->db->where($this->pk, $kd);
        return $this->db->get($this->table)->row_array();
    }
    public function update($kd, $data)
    {
        $this->db->where($this->pk, $kd);
        return $this->db->update($this->table, $data);
    }
    public function delete($data)
    {
        $this->db->where($data);
        return $this->db->delete($this->table);
    }
}