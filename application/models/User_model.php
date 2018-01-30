<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/30/2018
 * Time: 9:34 AM
 */

class User_model extends My_Model
{
	protected $table = 'user';
	protected $prefix_table = 'user';
	protected $key = 'user_id';

	public function __construct()
	{
		parent::__construct();
		$this->select = $this->prefix_table.'_email,'
			.$this->prefix_table.'_id,'
			.$this->prefix_table.'_status,'
			.$this->prefix_table.'_registered_date';
	}

	public function login($email, $password)
	{
		$where = array(
			$this->prefix_table.'_email'	=> $email,
			$this->prefix_table.'_password' => password_hash($password, 1)
		);
		if(($user = $this->get_by($where)) != NULL)
		{
			return array(
				'user'	=> $user,
				'token'	=> sha1($email.$password.time())
			);
		}
		return NULL;
	}

	public function register($email, $password)
	{
		$new_user = array(
			$this->prefix_table.'_email'	=> $email,
			$this->prefix_table.'_password'	=> password_hash($password, 1)
		);
		if($this->insert($new_user))
		{
			return array(
				'user'	=> $this->get_by(array($this->prefix_table.'_email'	=> $email)),
				'token'	=> sha1($email.$password.time())
			);
		}
		return NULL;
	}

}
