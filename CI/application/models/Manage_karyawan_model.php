<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_karyawan_model extends CI_Model
{
    private $_table = "user";
    public function rules()
    {
        return [

            ['field' => 'username',
            'label' => 'username',
            'rules' => 'required'],
            
            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],
            
            ['field' => 'no_telp',
            'label' => 'no_telp',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required'],

        ];
    }

    public function rules_u()
    {
        return [

            ['field' => 'usernamee',
            'label' => 'usernamee',
            'rules' => 'required'],
            
            ['field' => 'namae',
            'label' => 'namae',
            'rules' => 'required'],

            ['field' => 'alamate',
            'label' => 'alamate',
            'rules' => 'required'],
            
            ['field' => 'no_telpe',
            'label' => 'no_telpe',
            'rules' => 'required'],

            ['field' => 'passworde',
            'label' => 'passworde',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get_where($this->_table, ["role_id" => '2'])->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $data = [
                'username' =>  htmlspecialchars($this->input->post('username',true)),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'password' =>  password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id' => 2, 
            ];
        $this->db->insert($this->_table,$data);
    }
    public function update()
    {
        $data = [
                'username' =>  htmlspecialchars($this->input->post('usernamee',true)),
                'nama' => $this->input->post('namae'),
                'alamat' => $this->input->post('alamate'),
                'no_telp' => $this->input->post('no_telpe'),
                'password' =>  password_hash($this->input->post('passworde'),PASSWORD_DEFAULT),
                'role_id' => 2, 
            ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}