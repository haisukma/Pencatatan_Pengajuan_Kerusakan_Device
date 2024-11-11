<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_users extends CI_Model
{
    private $table = 'tb_users';
    private $pk = 'id_users';
    public function GetAll()
    {
        $this->db->order_by($this->pk, 'asc');
        return $this->db->get($this->table);
    }
    public function GetAdmin()
    {
        $this->db->where('level', 'admin');
        $this->db->order_by($this->pk, 'asc');
        return $this->db->get($this->table);
    }
    public function GetUser()
    {
        $this->db->where('level', 'member');
        $this->db->order_by($this->pk, 'asc');
        return $this->db->get($this->table);
    }
    public function getLastId()
    {
        $this->db->select_max('id_users');
        $query = $this->db->get('tb_users');
        $result = $query->row_array();

        return $result['id_users'];
    }
    public function save($data)
    {
        return $this->db->insert($this->table, $data);
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