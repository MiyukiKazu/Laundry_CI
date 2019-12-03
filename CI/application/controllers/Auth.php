<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function regis()
	{
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]',['is_unique' => 'This Username Already Registered']);
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('no_telp','No_telp','required');
		$this->form_validation->set_rules('pass','Pass','required|trim|min_length[5]');
		if($this->form_validation->run() == false){
			$data['title'] = 'REGIS | Telang Laundry';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/regis');
			$this->load->view('templates/auth_footer');
		}else{
			$data = [
				'username' =>  htmlspecialchars($this->input->post('username',true)),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
				'password' =>  password_hash($this->input->post('pass'),PASSWORD_DEFAULT),
				'role_id' => 3, 
			];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat Registrasi Berhasil , Silahkan login</div>');
			redirect('auth/login');
		}
		
	}
	public function login()
	{
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('pass','Pass','required|trim|min_length[5]');
		if($this->form_validation->run() == false){
			$data['title'] = 'LOGIN | Telang Laundry';
			$this->load->view('templates/auth_header',$data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}else{
			$this->_login();
		}
	}
	private function _login(){
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');

		$user = $this->db->get_where('user',['username' => $username])->row_array();

		if($user){
			if(password_verify($pass, $user['password'])){
				$data = [
					'username' => $user['username'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				redirect('user');
			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah</div>');
				redirect('auth/login');
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">User tidak ditemukan</div>');
			redirect('auth/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Log Out Berhasil Terima Kasih</div>');
		redirect('auth/login');
	}
}