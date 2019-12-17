<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model
{
    private $_table = "layanan";
    public function rules()
    {
        return [
            ['field' => 'id_layanan',
            'label' => 'id_layanan',
            'rules' => 'required'],

            ['field' => 'nama_layanan',
            'label' => 'nama_layanan',
            'rules' => 'required'],

        ];
    }

    public function rules_u()
    {
        return [
            ['field' => 'id_layanane',
            'label' => 'id_layanane',
            'rules' => 'required'],

            ['field' => 'nama_layanane',
            'label' => 'nama_layanane',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_layanan" => $id])->row();
    }

    public function save()
    {
        $data = [
                'id_layanan' =>  htmlspecialchars($this->input->post('id_layanan',true)),
                'nama_layanan' => $this->input->post('nama_layanan'),
            ];
        $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $data = [
                'id_layanan' =>  htmlspecialchars($this->input->post('id_layanane',true)),
                'nama_layanan' => $this->input->post('nama_layanane'),
            ];
        $this->db->where('id_layanan', $this->input->post('id_layanane'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_layanan" => $id));
    }
}