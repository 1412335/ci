<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/30/2018
 * Time: 9:54 AM
 */

class My_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$role = strtolower($this->uri->segment(2));

		switch ($role)
		{
			case 'admin':
				$this->load->helper('admin');

				$controller = strtolower($this->uri->segment(3));
				if($this->_is_authenticated())
				{
					if($controller == 'login')
					{
						redirect(admin_home_url());
					}
				}
				else if($controller != 'login')
				{
					redirect(admin_url('login'));
				}
				return;
			default:
				return;
		}
	}

	private function _is_authenticated()
	{
		if(($user = $this->session->userdata('user')) != NULL)
		{
			return TRUE;
		}
		return FALSE;
	}

}
