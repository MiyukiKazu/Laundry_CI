<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends CI_Controller
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
        $data['title'] = 'Pesanan Masuk';
        $data['con'] = 'open';
        $data['actor'] = 'active';
        $data['tb'] = $this->Tbarang_model->getAll();
        $data['tbm'] = $this->Tbarang_model->getAll();
        $data['jenis'] = $this->Jenis_barang_model->getAll();
        $data['oe'] = 'active';
        $data['op'] = '';
        $data['oc'] = '';
        $this->load->view('templates/k_header',$data);
        $this->load->view('karyawan/order_entry');
        $this->load->view('templates/k_footer');
    }


    public function edit($id)
    {  
        $this->form_validation->set_rules('status_cucian','status_cucian','required');
        $this->form_validation->set_rules('tanggal_terima','tanggal_terima','required');
        $this->form_validation->set_rules('jumlah','jumlah','required');
        $this->form_validation->set_rules('harga','harga','required');
        if ($this->form_validation->run() == true) {
            $data = [
                'id_statuscucian' =>  $this->input->post('status_cucian'),
                'tgl_terima' => $this->input->post('tanggal_terima'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->where('id_transaksi', $id);
            $this->db->update('detail_cucian', $data);
            $this->session->set_flashdata('success','<div class="alert alert-success" role="alert"> Data Berhasil diUpdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Entry');
        }
    }

}