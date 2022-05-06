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

	public function online($user_id)
	{
		$data = array('user_status' => 'online');

		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_user', $data);
	}

	public function offline($user_id)
	{
		$data = array('user_status' => 'offline');

		$this->db->where('user_id', $user_id);
		$this->db->update('tbl_user', $data);
	}

	public function logout()
	{
		$user_id = $_SESSION['user_id'];
		$this->offline($user_id);

		if (session_destroy()) {
			redirect('admin/login');
		}
	}

	public function login()
	{
		$alert = '';

		$counter = 1;

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			// $this->dashboard();
			redirect('admin/dashboard');
		} else {
			$user_email = $this->input->post('txt_email');
			$user_password = $this->input->post('txt_password');

			$auth = $this->db->query("SELECT * FROM tbl_user where user_email='$user_email' and user_password='$user_password'");

			foreach ($auth->result_array() as $user_data) {
				$_SESSION['user_id'] = $user_data['user_id'];
				$_SESSION['user_email'] = $user_email;
				$_SESSION['status'] = "login";

				$this->online($user_data['user_id']);

				// $this->dashboard();
				return redirect('admin/dashboard');
			}

			$user_data = $auth->result_array();

			if ($user_data == null) {
				$alert = 'Email atau Password masih salah !\nSilahkan isi Email atau Password dengan benar';
			}

			$counter = $user_data;

			// if (empty($user_email) && empty($user_password)) {
			// 	$alert = 'Email atau Password masih salah !\nSilahkan isi Email atau Password dengan benar';
			// }

			// $alert = 'Email atau Password masih salah !\nSilahkan isi Email atau Password dengan benar';

			$data = [
				'title' => 'Sign In | Portal',
				'alert' => $alert,
				'counter' => $counter
			];

			return $this->load->view('login/login', $data);
		}
	}

	public function dashboard()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
			$user_id = $_SESSION['user_id'];

			$data = [
				'title' => 'Admin | Dashboard',
				'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
				'user' => $this->db->query("SELECT * FROM tbl_user where user_category='admin' or  user_category='author'")
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
				'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
				'user' => $this->db->query("SELECT * FROM tbl_user where user_category='admin' or  user_category='author'")
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
