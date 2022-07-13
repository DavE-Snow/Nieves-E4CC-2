<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		$data = array("data"=>$this->Users_model->getUsers());

		$this->load->view("layouts/header");
		$this->load->view('user/main', $data); 
		$this->load->view("layouts/footer");

		//print_r($data);
	}

	public function delete($id){
		$this->Users_model->delete($id);
		$this->session->set_flashdata('success', '¡Usuario  desactivado correctamente!');
		redirect(base_url() . "users");
	}
}
