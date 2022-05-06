<?php

use function PHPUnit\Framework\isEmpty;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{
		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			// $this->dashboard();
			redirect('admin/dashboard');
		} else {
			// $this->login();
			redirect('admin/login');
		}
	}

	public function logout()
	{
		if (session_destroy()) {
			// $this->login();
			redirect('admin/login');
		}
	}

	public function login()
	{
		$alert = '';

		$data = [
			'title' => 'Sign In | Portal',
			'alert' => $alert
		];

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			// $this->dashboard();
			redirect('admin/dashboard');
		} else {
			$user_email = $this->input->post('txt_email');
			$user_password = $this->input->post('txt_password');

			$auth = $this->db->query("SELECT * FROM tbl_user");

			foreach ($auth->result_array() as $user_data) {
				if ($user_data['user_email'] == $user_email && $user_data['user_password'] == $user_password) {
					$_SESSION['user_id'] = $user_data['user_id'];
					$_SESSION['user_email'] = $user_email;
					$_SESSION['status'] = "login";
					// $this->dashboard();
					return redirect('admin/dashboard');
				}
			}

			if (empty($user_email) && empty($user_password)) {
				$alert = 'Email atau Password masih kosong !\nSilahkan isi Email atau Password';
			} else {
				$alert = 'Email atau Password masih salah !\nSilahkan isi Email atau Password dengan benar';
			}

			return $this->load->view('login/login', $data);
		}
	}

	public function dashboard()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$user_id = $_SESSION['user_id'];

			$data = [
				'title' => 'Admin | Dashboard',
				'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'")
			];

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_dashboard');
			$this->load->view('admin/template/footer');
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function news()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$user_id = $_SESSION['user_id'];

			$data = [
				'title' => 'Admin | Articles',
				'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'")
			];

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_news');
			$this->load->view('admin/template/footer');
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function users()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$user_id = $_SESSION['user_id'];

			$data = [
				'title' => 'Admin | Users',
				'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'")
			];

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_users');
			$this->load->view('admin/template/footer');
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function lectures()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$user_id = $_SESSION['user_id'];

			$data = [
				'title' => 'Admin | Lectures',
				'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'")
			];

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_lectures');
			$this->load->view('admin/template/footer');
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function curiculum()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$user_id = $_SESSION['user_id'];

			$data = [
				'title' => 'Admin | Curiculum',
				'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'")
			];

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_curiculum');
			$this->load->view('admin/template/footer');
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function events()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$user_id = $_SESSION['user_id'];

			$data = [
				'title' => 'Admin | Events',
				'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'")
			];

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_events');
			$this->load->view('admin/template/footer');
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}
}
