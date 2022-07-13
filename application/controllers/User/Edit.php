<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index($id)
	{
		$data = $this->Users_model->getUser($id);
		$this->load->view("layouts/header");
		$this->load->view('user/edit', $data);
		$this->load->view("layouts/footer");
	}

	public function update($id)
	{
		$name = $this->input->post('name');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirmPassword = $this->input->post('confirmPassword');
		$role = $this->input->post('role');
		$status_user = $this->input->post('status');

		$data = $this->Users_model->getUser($id);
		$validarEmail = "";
		if ($email != $data->email) {
			$validarEmail = "|is_unique[users.email]";
		}

		$this->form_validation->set_rules('name', 'Nombres', 'required');
		$this->form_validation->set_rules('lastname', 'Apellidos', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required' . $validarEmail);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');
		if ($this->form_validation->run() == false) {
			$this->index($id);
		} else {
			$data = array(
				"name" => $name,
				"lastname" => $lastname,
				"email" => $email,
				"password" => md5($password),
				"role_id" => $role,
				"status_user" => $status_user,
				"modified" => date("Y-m-d H:i:s")
			);
			$this->Users_model->update($data, $id);
			$this->session->set_flashdata('success', '¡Datos actualizados correctamente!');
			redirect(base_url() . "users");
		}
	}
}
