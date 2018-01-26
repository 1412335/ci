<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/25/2018
 * Time: 8:19 AM
 */

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$cats = $this->category_model->get_list_cats('array');
		$this->smarty->assign('cats', $cats);

		$this->smarty->assign('base_url', base_url());
	}

	public function index()
	{
		$this->smarty->view('home.tpl');
	}
}
