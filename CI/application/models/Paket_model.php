<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model
{
    private $_table = "paket";
    public function rules()
    {
        return [
            ['field' => 'id_paket',
            'label' => 'id_paket',
            'rules' => 'required'],

            ['field' => 'nama_paket',
            'label' => 'nama_paket',
            'rules' => 'required'],

        ];
    }

    public function rules_u()
    {
        return [
            ['field' => 'id_pakete',
            'label' => 'id_pakete',
            'rules' => 'required'],

            ['field' => 'nama_pakete',
            'label' => 'nama_pakete',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_paket" => $id])->row();
    }

    public function save()
    {
        $data = [
                'id_paket' =>  htmlspecialchars($this->input->post('id_paket',true)),
                'nama_paket' => $this->input->post('nama_paket'),
            ];
        $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $data = [
                'id_paket' =>  htmlspecialchars($this->input->post('id_pakete',true)),
                'nama_paket' => $this->input->post('nama_pakete'),
            ];
        $this->db->where('id_Paket', $this->input->post('id_pakete'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_paket" => $id));
    }
}