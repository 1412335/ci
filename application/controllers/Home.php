<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 9:19 AM
 */

class Home extends CI_Controller
{
	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('article_model');

		$cats = $this->category_model->get_list_cats();
		$this->data['data']['list_cats'] = $this->show_cats($cats);
	}

	public function index()
	{
		if(($msg = $this->session->flashdata('msg')) != NULL)
		{
			$this->data['data']['msg'] = $msg;
		}

		$articles = $this->article_model->get_list_articles();
		$this->data['data']['articles'] = $articles;

		$this->data['subview'] = 'main';
		$this->data['title'] = 'Home';
		$this->load->view('home', $this->data);
	}

	public function cat($cat_id = '')
	{
//		$this->category_model->set_id($cat_id);
		if(empty($cat_id))
		{
			$articles = $this->article_model->get_list_articles();
		}
		else
		{
			$articles = $this->category_model->get_list_articles($cat_id);
		}
		$this->data['data']['articles'] = $articles;
		$this->data['subview'] = 'main';
		$this->data['title'] = 'List Articles By Categories';
		$this->load->view('home', $this->data);
	}

	public function show_cats($cats, $parent_id = 0, $str = '')
	{
		$cats_child = array();
		$html = '';
		foreach ($cats as $key => $item)
		{
			if($item->cat_parent_id == $parent_id)
			{
				$cats_child[] = $item;
				unset($cats[$key]);
			}
		}
		if( ! empty($cats_child))
		{
			$html .= '<ul style="list-style-type: none;">';
			foreach ($cats_child as $item)
			{
				$html .= "<li id=$item->cat_id>
							<a href=".base_url()."index.php/home/cat/$item->cat_id>
								{$str}$item->cat_name
							</a>&nbsp;
							<a href=".base_url()."index.php/category/edit/$item->cat_id><span class='glyphicon glyphicon-pencil'></span></a>";
				$html .= $this->show_cats($cats, $item->cat_id, '|---');
				$html .= '</li>';
			}
			$html .= '</ul>';
		}
		return $html;
	}

}
