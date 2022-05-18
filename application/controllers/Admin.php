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

			$auth = $this->db->query("SELECT * FROM tbl_user where user_email='$user_email' and user_password='$user_password' LIMIT 1");

			foreach ($auth->result_array() as $user_data) {
				$_SESSION['user_id'] = $user_data['user_id'];
				$_SESSION['user_email'] = $user_email;
				$_SESSION['user_category'] = $user_data['user_category'];
				$_SESSION['status'] = "login";

				$this->online($user_data['user_id']);

				// $this->dashboard();
				return redirect('admin/dashboard');
			}

			$user_data = $auth->result_array();

			if ($user_data == null || $user_data == "") {
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
			$txt_search = $this->input->post('txt_search');


			if ($txt_search == null or $txt_search == "") {
				$data = [
					'title' => 'Admin | Dashboard',
					'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
					'user' => $this->db->query("SELECT * FROM tbl_user where user_category='admin' or  user_category='author' ORDER BY user_name ASC")
				];
			} else {
				$data = [
					'title' => 'Admin | Dashboard',
					'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
					'user' => $this->db->query("SELECT * FROM tbl_user where user_name = '$txt_search' and user_category='admin' or  user_category='author' ORDER BY user_name ASC")
				];
			}

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_dashboard', $data);
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
			$txt_search = $this->input->post('txt_search');

			if ($txt_search == null or $txt_search == "") {
				$data = [
					'title' => 'Admin | Articles',
					'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
					'news' => $this->db->query("SELECT * FROM tbl_article ORDER BY article_time DESC"),
					'image' => $this->db->query("SELECT * FROM tbl_images"),
					'user' => $this->db->query("SELECT * FROM tbl_user")
				];
			} else {
				$data = [
					'title' => 'Admin | Articles',
					'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
					'news' => $this->db->query("SELECT * FROM tbl_article where article_title like'%$txt_search%' or article_time like'%$txt_search%' or article_body like'%$txt_search%' ORDER BY article_time DESC"),
					'image' => $this->db->query("SELECT * FROM tbl_images"),
					'user' => $this->db->query("SELECT * FROM tbl_user")
				];
			}

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/view_news', $data);
			$this->load->view('admin/template/footer');
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function users()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

			if ($_SESSION['user_category'] == "admin") {
				$user_id = $_SESSION['user_id'];
				$txt_search = $this->input->post('txt_search');


				if ($txt_search == null or $txt_search == "") {
					$data = [
						'title' => 'Admin | Users',
						'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
						'user' => $this->db->query("SELECT * FROM tbl_user ORDER BY user_name ASC")
					];
				} else {
					$data = [
						'title' => 'Admin | Users',
						'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
						'user' => $this->db->query("SELECT * FROM tbl_user where user_name like'%$txt_search%' or user_email like'%$txt_search%' ORDER BY user_name ASC")
					];
				}

				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/view_users', $data);
				$this->load->view('admin/template/footer');
			} else {
				redirect('admin/dashboard');
			}
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function lectures()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

			if ($_SESSION['user_category'] == "admin") {
				$user_id = $_SESSION['user_id'];
				$txt_search = $this->input->post('txt_search');

				if ($txt_search == null or $txt_search == "") {
					$data = [
						'title' => 'Admin | Lectures',
						'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
						'lecture' => $this->db->query("SELECT * FROM tbl_lecture ORDER BY lecture_name ASC"),
						'curiculum' => $this->db->query("SELECT * FROM tbl_curiculum ORDER BY curiculum_name ASC"),
						'subject' => $this->db->query("SELECT * FROM tbl_subject")
					];
				} else {
					$data = [
						'title' => 'Admin | Lectures',
						'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
						'lecture' => $this->db->query("SELECT * FROM tbl_lecture where lecture_name like '%$txt_search%' or lecture_email like '%$txt_search%' ORDER BY lecture_name ASC"),
						'curiculum' => $this->db->query("SELECT * FROM tbl_curiculum ORDER BY curiculum_name ASC"),
						'subject' => $this->db->query("SELECT * FROM tbl_subject")
					];
				}

				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/view_lectures');
				$this->load->view('admin/template/footer');
			} else {
				redirect('admin/dashboard');
			}
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function curiculum()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

			if ($_SESSION['user_category'] == "admin") {
				$user_id = $_SESSION['user_id'];
				$txt_search = $this->input->post('txt_search');
				$prodi = $this->input->post('cb_program_study');

				if ($txt_search == null or $txt_search == "") {

					if ($prodi == null or $prodi == "") {
						$data = [
							'title' => 'Admin | Curiculum',
							'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
							'lecture' => $this->db->query("SELECT * FROM tbl_lecture"),
							'curiculum' => $this->db->query("SELECT * FROM tbl_curiculum ORDER BY curiculum_name ASC"),
							'subject' => $this->db->query("SELECT * FROM tbl_subject")
						];
					} else {
						$data = [
							'title' => 'Admin | Curiculum',
							'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
							'lecture' => $this->db->query("SELECT * FROM tbl_lecture"),
							'curiculum' => $this->db->query("SELECT * FROM tbl_curiculum WHERE curiculum_program_study='$prodi' ORDER BY curiculum_name ASC"),
							'subject' => $this->db->query("SELECT * FROM tbl_subject")
						];
					}
				} else {
					$data = [
						'title' => 'Admin | Curiculum',
						'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
						'lecture' => $this->db->query("SELECT * FROM tbl_lecture"),
						'curiculum' => $this->db->query("SELECT * FROM tbl_curiculum where curiculum_name like '%$txt_search%' or curiculum_sks like '%$txt_search%' ORDER BY curiculum_name ASC"),
						'subject' => $this->db->query("SELECT * FROM tbl_subject")
					];
				}

				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/view_curiculum', $data);
				$this->load->view('admin/template/footer');
			} else {
				redirect('admin/dashboard');
			}
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}

	public function events()
	{

		if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

			if ($_SESSION['user_category'] == "admin") {
				$user_id = $_SESSION['user_id'];
				$txt_search = $this->input->post('txt_search');

				if ($txt_search == null or $txt_search == "") {
					$data = [
						'title' => 'Admin | Events',
						'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
						'event' => $this->db->query("SELECT * FROM tbl_event ORDER BY event_time DESC")
					];
				} else {
					$data = [
						'title' => 'Admin | Events',
						'auth' => $this->db->query("SELECT * FROM tbl_user where user_id ='$user_id'"),
						'event' => $this->db->query("SELECT * FROM tbl_event where event_title like '%$txt_search%' or event_time like '%$txt_search%' or event_detail like '%$txt_search%' ORDER BY event_time DESC")
					];
				}

				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/view_events', $data);
				$this->load->view('admin/template/footer');
			} else {
				redirect('admin/dashboard');
			}
		} else {

			// $this->login();
			redirect('admin/login');
		}
	}
}
