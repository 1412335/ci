<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/24/2018
 * Time: 5:49 PM
 */

class Category extends  CI_Controller
{
	protected $cats;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->library('form_validation');
		$this->smarty->assign('base_url', base_url());

		$this->cats = $this->category_model->get_list_cats('array');

		$cats_option = array();
		foreach ($this->cats as $item)
		{
			$cats_option[$item['cat_id']] = $item['cat_name'];
		}
		$this->smarty->assign('cats', $cats_option);
	}

	public function index()
	{
		if(($msg = $this->session->flashdata('msg')) != NULL)
		{
			$this->smarty->assign('msg', $msg);
		}
		$this->smarty->assign('cats_html', $this->show_cats($this->cats));
		$this->smarty->view('cat/index.tpl');
	}

	public function show_cats($cats, $parent_id = 0, $str = '', $i = 0)
	{
		$cats_child = array();
		$html = '';
//		$i = 0;
		foreach ($cats as $key => $item)
		{
			if($item['cat_parent_id'] == $parent_id)
			{
				$cats_child[] = $item;
				unset($cats[$key]);
			}
		}
		if( ! empty($cats_child))
		{
			foreach ($cats_child as $key => $item)
			{
				if($parent_id == 0)
				{
					$i++;
				}
				$html .= "<tr id=$item[cat_id]>
							<td>$i</td>
							<td>$item[cat_id]</td>
							<td>{$str}<a href=".base_url()."index.php/tpl/category/$item[cat_id]>$item[cat_name]</a></td>
							<td><a href=".base_url()."index.php/tpl/category/$item[cat_parent_id]>$item[cat_parent_name]</a></td>
							<td>$item[cat_des]</td>
							<td>
								<a role='button' href=".base_url()."index.php/tpl/category/edit/$item[cat_id] class='btn btn-primary btn-flat btn-sm'>Edit</a>
								<a role='button' href=".base_url()."index.php/tpl/category/delete/$item[cat_id] class='btn btn-danger btn-flat btn-sm'>Delete</a>
							</td>
						</tr>";
				$str .= '|---';
				$html .= $this->show_cats($cats, $item['cat_id'], $str, $i);
				$str = substr($str, 0, strlen($str) - 4);
			}
		}
		return $html;
	}

	public function group_cat($cats, $parent_id = 0, $cats_group_data = NULL)
	{
		$cats_group = $cats_group_data;
		$cats_name_group = array();
		foreach ($cats as $key => $item)
		{
			if($item['cat_id'] == $parent_id OR $item['cat_parent_id'] == 0)
			{
				$cats_name_group[$item['cat_id']] = $item['cat_name'];
				unset($cats[$key]);
			}
		}
		while( ! empty($cats_name_group))
		{
			$group = array_splice($cats_name_group, 0, 1);
			foreach ($group as $id => $name)
			{
				foreach ($cats as $item)
				{
					if ($item['cat_parent_id'] == $id)
					{
						$cats_group[$name][] = $item;
						$this->group_cat($cats, $id, $cats_group[$name]);
					}
				}
			}
		}
		return $cats_group;
	}

	public function add()
	{
		$this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim|min_length[3]|is_unique[category.cat_name]');
		if($this->form_validation->run() == false)
		{
			$this->smarty->assign('errors', validation_errors());
			$this->smarty->view('cat/add.tpl');
		}
		else
		{
			$new_cat = array(
				'cat_name'	=> $_POST['cat_name'],
				'cat_des'	=> $_POST['cat_des'],
				'cat_parent_id'	=> $_POST['cat_parent_id'],
			);

			$this->category_model->insert($new_cat);
			$this->session->set_flashdata('msg', 'Added new category successfully.');
			redirect(base_url().'index.php/tpl/category');
		}
	}

	public function check_cat_name($cat_name, $cat_id)
	{
		if($this->category_model->get_cat_by('cat_name', $cat_name, $cat_id) != NULL)
		{
			$this->form_validation->set_message('check_cat_name', 'The {field} field contain a value in used.');
			return FALSE;
		}
		return TRUE;
	}

	public function edit($cat_id = '')
	{
		$cat = $this->category_model->get_cat_by('cat_id', $cat_id);
		if(empty($cat))
		{
			redirect(base_url().'index.php/tpl/category');
		}
		else
		{
			$this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim|min_length[3]|callback_check_cat_name['.$cat_id.']');

			if($this->form_validation->run() == FALSE)
			{
				$this->smarty->assign('errors', validation_errors());
				$this->smarty->assign('cat', $cat);
				$this->smarty->view('cat/edit.tpl');
			}
			else
			{
				$update = array(
					'cat_name' => $_POST['cat_name'],
					'cat_parent_id' => $_POST['cat_parent_id'],
					'cat_des' => $_POST['cat_des']
				);
				$this->category_model->set_id($cat_id);
				$this->category_model->update($update);
				$this->session->set_flashdata('msg', "Updated category successfully.");
				redirect(base_url().'index.php/tpl/category');
			}
		}
	}

	public function preview($cat_id = '')
	{
		if(($cat = $this->category_model->get_cat_by('cat_id', $cat_id)) != NULL)
		{
			$this->smarty->assign('cat', $cat);
			if(($cat_parent = $this->category_model->get_cat_by('cat_id', $cat['cat_parent_id'])) != NULL)
			{
				$this->smarty->assign('cat_parent', $cat_parent);
			}

			$articles = $this->category_model->get_list_articles($cat_id);
			$articles_data_table = array();
			foreach ($articles as $item)
			{
				$articles_data_table[] = $item['article_id'];
				$articles_data_table[] = "<a href=".base_url()."index.php/tpl/article/$item[article_id]>$item[article_name]</a>";
				$articles_data_table[] = $item['article_des'];
				$articles_data_table[] = "<a href=".base_url()."index.php/tpl/article/edit/$item[article_id] role='button' class='btn btn-flat btn-primary btn-sm'><i class='fa fa-edit'></i></a>";
				$articles_data_table[] = "<a href=".base_url()."index.php/tpl/article/delete/$item[article_id] role='button' class='btn btn-flat btn-danger btn-sm'><i class='fa fa-remove'></i></a>";
			}
			$this->smarty->assign('articles', $articles_data_table);
			$this->smarty->assign('table_attr', 'class="table table-bordered table-striped" id="example1"');

			$this->smarty->view('cat/preview.tpl');
		}
		else
		{
			redirect(base_url().'index.php/tpl/category');
		}
	}

	public function escape($type = 1, $cat_name = '')
	{
		if($type == 1)
		{
			var_dump($this->category_model->get_cat_by_name_escape($cat_name));
		}
		else
		{
			var_dump($this->category_model->get_cat_by_name_binding($cat_name));
		}
	}

}
