<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/30/2018
 * Time: 9:53 AM
 */

class Register extends My_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');

		$this->smarty->assign('base_url', base_url());
	}

	public function check_user_email($email)
	{
		if($this->user_model->check_exist(array('user_email' => $email)))
		{
			$this->form_validation->set_message('check_user_email', 'The {field} is used already.');
			return FALSE;
		}
		return TRUE;
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_user_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirm', 'trim|required|matches[password]');
		$this->form_validation->set_rules('cb', 'Terms', 'required');

		if($this->form_validation->run() == false)
		{
			$this->smarty->assign('errors', validation_errors());
			$this->smarty->view('register/index.tpl');
		}
		else
		{
			if(($return = $this->user_model->register($this->input->post('email'), $this->input->post('password'))) != NULL)
			{
				$this->session->set_flashdata('msg', 'Register successfully.');
				// set access token
				$this->session->set_userdata('user', $return);
				redirect(admin_home_url());
			}
			else
			{
				$this->smarty->assign('errors', 'Error in registration. Please try again.');
				$this->smarty->view('register/index.tpl');
			}
		}
	}

}
