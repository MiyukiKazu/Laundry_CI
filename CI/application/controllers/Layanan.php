<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Layanan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Manage Layanan';
        $data['actmb'] = 'active';
        $data['actmk'] = '';
        $data['actor'] = '';
        $data['act'] = '';
        $data['actb'] = '';
        $data['actl'] = 'active';
        $data['actp'] = '';
        $data['con'] = 'open';
        $data['jenis'] = $this->Layanan_model->getAll();
        $this->load->view('templates/m_header',$data);
        $this->load->view('manager/manage_layanan');
        $this->load->view('templates/m_footer');
    }

    public function add()
    {
        $barang = $this->Layanan_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run() == false) {
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Data gagal ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Layanan');
        }else{
            $barang->save();
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Layanan');
        }
    }

    public function edit()
    {  
        $barang = $this->Layanan_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules_u());

        if ($validation->run()) {
            $barang->update();
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert"> Data Berhasil diUpdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Layanan');
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Layanan_model->delete($id)) {
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert"> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Layanan');
        }
    }
}