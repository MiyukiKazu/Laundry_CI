<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tbarang_model extends CI_Model
{
    private $_table = "tbarang";
    public function rules()
    {
        return [
            ['field' => 'id_layanan',
            'label' => 'id_layanan',
            'rules' => 'required'],

            ['field' => 'id_jenis',
            'label' => 'id_jenis',
            'rules' => 'required'],

            ['field' => 'id_paket',
            'label' => 'id_paket',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'harga',
            'rules' => 'required'],


        ];
    }

    public function rules_u()
    {
        return [
            ['field' => 'id_layananu',
            'label' => 'id_layananu',
            'rules' => 'required'],

            ['field' => 'id_jenisu',
            'label' => 'id_jenisu',
            'rules' => 'required'],

            ['field' => 'id_paketu',
            'label' => 'id_paketu',
            'rules' => 'required'],

            ['field' => 'hargau',
            'label' => 'hargau',
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
                'id_paket' =>  $this->input->post('id_paket'),
                'id_layanan' => $this->input->post('id_layanan'),
                'id_jnsbarang' => $this->input->post('id_jenis'),
                'harga' => $this->input->post('harga'),
            ];
        $this->db->insert($this->_table, $data);
    }
    public function update()
    {
        $data = [
                'id_paket' =>  $this->input->post('id_paketu'),
                'id_layanan' => $this->input->post('id_layananu'),
                'id_jnsbarang' => $this->input->post('id_jenisu'),
                'harga' => $this->input->post('hargau'),
            ];
        $this->db->where('id_tbarang', $this->input->post('id_tbarangu'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_tbarang" => $id));
    }
}