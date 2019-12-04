<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['username'=>
		$this->session->userdata('username')])->row_array();
		$role = $data['user']['role_id'];
		if($role == 3){
			$data['title'] = 'Dashboard pelanggan';
			$data['con'] = 'close';
			$data['o'] = '';
			$this->load->view('templates/p_header',$data);
			$this->load->view('pelanggan/p_dashboard');
			$this->load->view('templates/p_footer');
		}elseif($role == 2){
			$data['title'] = 'Dashboard Karyawan';
			$data['actor'] = '';
			$data['con'] = 'close';
			$data['oe'] = '';
			$data['op'] = '';
			$data['oc'] = '';
			$this->load->view('templates/k_header',$data);
			$this->load->view('karyawan/k_dashboard');
			$this->load->view('templates/k_footer');
		}elseif($role == 1){
			$data['title'] = 'Dashboard Manager';
			$data['actmb'] = '';
			$data['actmk'] = '';
			$data['actor'] = '';
			$data['act'] = '';
			$data['actb'] = '';
			$data['actl'] = '';
			$data['actp'] = '';
			$data['con'] = 'close';
			$this->load->view('templates/m_header',$data);
			$this->load->view('manager/m_dashboard');
			$this->load->view('templates/m_footer');
		}else{
			redirect('auth/login');
		}
	}
}