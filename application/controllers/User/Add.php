<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		$this->load->view("layouts/header");
		$this->load->view('user/add');
		$this->load->view("layouts/footer");
	}

	public function save()
	{
		$name = $this->input->post('name');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirmPassword = $this->input->post('confirmPassword');

		$this->form_validation->set_rules('name', 'Nombres', 'required');
		$this->form_validation->set_rules('lastname', 'Apellidos', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');
		if($this->form_validation->run() == false) {
			$this->load->view('user/add');
		}else{
			$data = array(
				"name"=>$name,
				"lastname"=>$lastname,
				"email"=>$email,
				"password"=>md5($password),
			);

			$this->Users_model->save($data);
			$this->session->set_flashdata('success', '¡Datos registrados correctamente!');
			redirect(base_url()."users");

		}
	}
}
