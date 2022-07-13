<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Users_model");
	}
	public function index()
	{
		if ($this->session->userdata("login")) {
			redirect(base_url() . "users");
		} else {
			$this->load->view("layouts/header");
			$this->load->view("user/login");
			$this->load->view("layouts/footer");
		}
	}

	public function login()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$res = $this->Users_model->login($username, md5($password));

		if (!$res) {
			$this->session->set_flashdata("error", "El usuario y/o contraseña son incorrectos");
			redirect(base_url());
		} else {
			$data  = array(
				'id' => $res->id,
				'name' => $res->name,
				'lastname' => $res->lastname,
				'role' => $res->role_id,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			if ($res->role_id == 1) {
				redirect(base_url() . "users");
			} else {
				redirect(base_url() . "guest");
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
