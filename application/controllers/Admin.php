<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{

		$data = [
			'title' => 'Sign In | Portal'
		];

		// $this->load->view('admin/template/header', $data);
		$this->load->view('login/login', $data);
		// $this->load->view('admin/template/footer');
	}

	public function logout()
	{
		$this->load->model('auth_model');
		$this->auth_model->logout();
		redirect(site_url());
	}

	public function login()
	{

		$data = [
			'title' => 'Sign In | Portal'
		];

		$this->load->model('auth_model');
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('login/login', $data);
		}

		$username = $this->input->post('email');
		$password = $this->input->post('password');

		if ($this->auth_model->login($username, $password)) {
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
		}

		$this->load->view('login/login', $data);
	}

	public function dashboard()
	{
		$data = [
			'title' => 'Admin | Dashboard'
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_dashboard');
		$this->load->view('admin/template/footer');
	}

	public function news()
	{
		$data = [
			'title' => 'Admin | News'
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_news');
		$this->load->view('admin/template/footer');
	}

	public function users()
	{
		$data = [
			'title' => 'Admin | Users'
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_users');
		$this->load->view('admin/template/footer');
	}

	public function lectures()
	{
		$data = [
			'title' => 'Admin | Users'
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_lectures');
		$this->load->view('admin/template/footer');
	}

	public function curiculum()
	{
		$data = [
			'title' => 'Admin | Users'
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_curiculum');
		$this->load->view('admin/template/footer');
	}

	public function events()
	{
		$data = [
			'title' => 'Admin | Users'
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_events');
		$this->load->view('admin/template/footer');
	}
}
