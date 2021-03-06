<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/30/2018
 * Time: 9:15 AM
 */

class Login extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');

		$this->smarty->assign('base_url', base_url());
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->smarty->assign('errors', validation_errors());
			$this->smarty->view('login/index.tpl');
		}
		else
		{
			if(($return = $this->user_model->login($this->input->post('email'), $this->input->post('password'))) != NULL)
			{
				$this->session->set_flashdata('msg', 'Login successfully.');
				// set access token
				$this->session->set_userdata('user', $return);
				redirect(admin_home_url());
			}
			else
			{
				$this->smarty->assign('errors', 'Email or Pass is not correct.');
				$this->smarty->view('login/index.tpl');
			}
		}
	}


}
