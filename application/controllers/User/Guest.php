<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		$this->load->view("layouts/header");
		$this->load->view('user/guest'); 
		$this->load->view("layouts/footer");

	}

	public function delete($id){
		$this->Users_model->delete($id);
		$this->session->set_flashdata('success', '¡Usuario  desactivado correctamente!');
		redirect(base_url() . "users");
	}
}
