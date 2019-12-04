<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Tbarang_model");
        $this->load->model("Layanan_model");
        $this->load->model("Paket_model");
        $this->load->model("Jenis_barang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Pesan Sekarang';
        $data['con'] = 'close';
        $data['o'] = '';
        $data['tb'] = $this->Tbarang_model->getAll();
        $data['tbm'] = $this->Tbarang_model->getAll();
        $data['jenis'] = $this->Jenis_barang_model->getAll();
        $data['layanan'] = $this->Layanan_model->getAll();
        $data['paket'] = $this->Paket_model->getAll();
        $this->load->view('templates/p_header',$data);
        $this->load->view('pelanggan/order');
        $this->load->view('templates/p_footer');
    }

    public function add()
    {
        $barang = $this->Tbarang_model;
        $this->form_validation->set_rules('id_pelanggan','id_pelanggan','required');
        $this->form_validation->set_rules('id_tbarang','id_tbarang','required');

        if ($this->form_validation->run()== false) {
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Pesanan Gagal Isi Field terlebih Dahulu <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pesan');
        }else{
            $data = [
                'id_pelanggan' =>  $this->input->post('id_pelanggan'),
                'id_tbarang' => $this->input->post('id_tbarang'),
            ];
            $this->db->insert('detail_cucian',$data);
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Pesanan Perhasil Mohon antarkan barang atau hubungi cs untuk penjemputan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pesan');
        }
    }

    public function edit()
    {  
        $barang = $this->Tbarang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules_u());

        if ($validation->run()) {
            $barang->update();
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert"> Data Berhasil diUpdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Tbarang');
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Tbarang_model->delete($id)) {
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert"> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Tbarang');
        }
    }
}