<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Admin | Dashboard'
		];

		// $this->load->view('admin/template/header', $data);
		$this->load->view('login/login');
		// $this->load->view('admin/template/footer');
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
