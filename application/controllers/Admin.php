<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	// session_start();

	public function index()
	{

		$data = [
			'title' => 'Sign In | Portal'
		];

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$this->dashboard();
		} else {
			$this->load->view('login/login', $data);
		}
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

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$this->dashboard();
		} else {
			$user_email = $this->input->post('txt_email');
			$user_password = $this->input->post('txt_password');

			$auth = $this->db->query("SELECT * FROM tbl_user");

			foreach ($auth->result_array() as $user_data) {
				if ($user_data['user_email'] == $user_email && $user_data['user_password'] == $user_password) {
					$_SESSION['user_id'] = $user_data['user_id'];
					$_SESSION['user_email'] = $user_email;
					$_SESSION['status'] = "login";
					$this->dashboard();
				} else {
					return $this->load->view('login/login', $data);
				}
			}
		}
	}

	public function dashboard()
	{
		$data = [
			'title' => 'Admin | Dashboard',
			'auth' => $this->db->query("SELECT * FROM tbl_user")
		];

		if ($_SESSION['status'] != "login") {
			$this->login();
		} else {
			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_dashboard');
			$this->load->view('admin/template/footer');
		}
	}

	public function news()
	{
		$data = [
			'title' => 'Admin | News',
			'auth' => $this->db->query("SELECT * FROM tbl_user")
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_news');
		$this->load->view('admin/template/footer');
	}

	public function users()
	{
		$data = [
			'title' => 'Admin | Users',
			'auth' => $this->db->query("SELECT * FROM tbl_user")
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_users');
		$this->load->view('admin/template/footer');
	}

	public function lectures()
	{
		$data = [
			'title' => 'Admin | Users',
			'auth' => $this->db->query("SELECT * FROM tbl_user")
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_lectures');
		$this->load->view('admin/template/footer');
	}

	public function curiculum()
	{
		$data = [
			'title' => 'Admin | Users',
			'auth' => $this->db->query("SELECT * FROM tbl_user")
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_curiculum');
		$this->load->view('admin/template/footer');
	}

	public function events()
	{
		$data = [
			'title' => 'Admin | Users',
			'auth' => $this->db->query("SELECT * FROM tbl_user")
		];

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/view_events');
		$this->load->view('admin/template/footer');
	}
}
