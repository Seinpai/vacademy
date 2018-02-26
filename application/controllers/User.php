<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('user_model');
		$this->load->library('session');
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->load->view('register.php');
	}

	public function register_view()
	{
		# code...
		$this->load->view('register.php');
	}

	public function register_user()
	{
		# code...
		$user = array(

			'user_name'		=>	$this->input->post('user_name'),
			'user_email'	=>	$this->input->post('user_email'),
			'user_password'	=>	md5($this->input->post('user_password')),
			'user_phone'	=>	$this->input->post('user_phone'),
		);

		print_r($user);

		$email_check = $this->user_model->check_email($user['user_email']);

		if ($email_check) {
			# code...
			$this->user_model->register_user($user);
			$this->session->set_flashdata('success message', 'Registered Successfully');
			redirect('login');
		} else {
			# code...
			$this->session->set_flashdata('error message', 'Error, try again');
			redirect('register');
		}
	}

	public function login_view()
	{
		# code...
		$this->load->view('login.php');
	}

	public function login_user()
	{
		# code...
		$user_login = array(
			'user_email'	=>	$this->input->post('user_email'),
			'user_password'	=>	md5($this->input->post('user_password'))
		);

		$data = $this->user_model->login_user($user_login['user_email'], $user_login['user_password']);

		if ($data) {
			# code...
			$this->session->set_userdata('user_id', $data['user_id']);
			$this->session->set_userdata('user_name', $data['user_name']);
			$this->session->set_userdata('user_email', $data['user_email']);
			$this->session->set_userdata('user_password', $data['user_password']);
			$this->session->set_userdata('user_phone', $data['user_phone']);

			$this->load->view('user_profile.php');
		} else {
			# code...
			$this->session->set_flashdata('error message', 'error, try again');
			$this->load->view('login.php');
		}
	}

	public function user_profile()
	{
		# code...
		$this->load->view('user_profile.php');
	}

	public function user_logout()
	{
		# code...
		$this->session->sess_destroy();
		redirect('/login', 'location', 301);
	}
}
