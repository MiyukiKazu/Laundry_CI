<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_barang_model extends CI_Model
{
    private $_table = "jenis_barang";
    public function rules()
    {
        return [
            ['field' => 'id_barang',
            'label' => 'id_barang',
            'rules' => 'required'],

            ['field' => 'nama_barang',
            'label' => 'nama_barang',
            'rules' => 'required'],
            
            ['field' => 'satuan',
            'label' => 'satuan',
            'rules' => 'required'],

        ];
    }

    public function rules_u()
    {
        return [
            ['field' => 'id_barange',
            'label' => 'id_barange',
            'rules' => 'required'],

            ['field' => 'nama_barange',
            'label' => 'nama_barange',
            'rules' => 'required'],
            
            ['field' => 'satuane',
            'label' => 'satuane',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jnsbarang" => $id])->row();
    }

    public function save()
    {
        $data = [
                'id_jnsbarang' =>  htmlspecialchars($this->input->post('id_barang',true)),
                'nama_barang' => $this->input->post('nama_barang'),
                'satuan' => $this->input->post('satuan'),
            ];
        $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $data = [
                'id_jnsbarang' =>  htmlspecialchars($this->input->post('id_barange',true)),
                'nama_barang' => $this->input->post('nama_barange'),
                'satuan' => $this->input->post('satuane'),
            ];
        $this->db->where('id_jnsbarang', $this->input->post('id_barange'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jnsbarang" => $id));
    }
}