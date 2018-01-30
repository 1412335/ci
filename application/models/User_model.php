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

	public function check_login($email, $password)
	{
		$where = array(
			'email'	=> $email,
			'password' => password_hash($password, 1)
		);
		return $this->check_exist($where);
	}
}
