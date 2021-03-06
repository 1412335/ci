<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/24/2018
 * Time: 5:49 PM
 */

class Category extends  My_Controller
{
	protected $cats;

	protected $cats_status = array(
		0	=> 'unpublic',
		1	=> 'public'
	);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->library('form_validation');

		$config = array(
			'max_size'	=> '100',
			'max_width'	=> '1024',
			'max_height'	=> '1024',
			'allowed_types'	=> 'png|jpg|jpeg',
			'upload_path'	=> './uploads/categories/',
		);
		$this->load->library('upload', $config);

		$this->smarty->assign('base_url', base_url());

		$this->cats = $this->category_model->get_list_cats('array');

		$cats_option = array();
		foreach ($this->cats as $item)
		{
			$cats_option[$item['cat_id']] = $item['cat_name'];
		}
		$this->smarty->assign('cats', $cats_option);
		$this->smarty->assign('cats_status', $this->cats_status);
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
							<td>{$str}<a href=".base_url()."tpl/category/$item[cat_id]>$item[cat_name]</a></td>
							<td><a href=".base_url()."tpl/category/$item[cat_parent_id]>$item[cat_parent_name]</a></td>
							<td style='max-width: 250px'>$item[cat_des]</td>
							<td>".$this->_cat_status($item['cat_status'])."</td>
							<td>$item[cat_created_date]</td>
							<td>$item[cat_modified_date]</td>
							<td></td>
							<td><a role='button' href=".base_url()."tpl/category/$item[cat_id]/edit class='btn btn-primary btn-flat btn-sm'><i class='fa fa-edit'></i></a></td>
							<td><a role='button' href=".base_url()."tpl/category/$item[cat_id]/delete  
								onclick='return confirm(\"Are you want to delete this cat?\");' class='btn btn-danger btn-flat btn-sm'><i class='fa fa-remove'></i></a></td>
						</tr>";
				$str .= '|---';
				$html .= $this->show_cats($cats, $item['cat_id'], $str, $i);
				$str = substr($str, 0, strlen($str) - 4);
			}
		}
		return $html;
	}

	private function _cat_status($status)
	{
		switch ($status)
		{
			case 1:
				return 'public';
			default:
				return 'unpublic';
		}
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
		$this->form_validation->set_rules('cat_status', 'Category Status', 'required');

		if($this->form_validation->run() == false)
		{
			$this->smarty->assign('errors', validation_errors());
			$this->smarty->view('cat/add.tpl');
		}
		else
		{
			if($this->upload->do_upload('cat_thumbnail'))
			{
				$data = $this->upload->data();
				$new_cat = array(
					'cat_name'	=> $_POST['cat_name'],
					'cat_des'	=> $_POST['cat_des'],
					'cat_parent_id'	=> $_POST['cat_parent_id'],
					'cat_status'	=> $_POST['cat_status'],
					'cat_thumbnail'	=> $data['file_name']
				);
				$this->category_model->insert($new_cat);
				$this->session->set_flashdata('msg', 'Added new category successfully.');
				redirect(admin_url().'category');
			}
			else
			{
				$this->smarty->assign('errors', $this->upload->display_errors());
				$this->smarty->view('cat/add.tpl');
			}
		}
	}

	public function check_cat_name($cat_name, $cat_id)
	{
		if($this->category_model->get_by(array('cat_name' => $cat_name), $cat_id) != NULL)
		{
			$this->form_validation->set_message('check_cat_name', 'The {field} field contain a value in used.');
			return FALSE;
		}
		return TRUE;
	}

	public function edit($cat_id = '')
	{
		$cat = $this->category_model->get_by(array('cat_id', $cat_id));
		if(empty($cat))
		{
			redirect(admin_url('category'));
		}
		else
		{
			$this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim|min_length[3]|callback_check_cat_name['.$cat_id.']');
			$this->form_validation->set_rules('cat_status', 'Category Status', 'required');

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
					'cat_des' => $_POST['cat_des'],
					'cat_status' => $_POST['cat_status']
				);
				if(isset($_FILES['cat_thumbnail']) && $_FILES['cat_thumbnail']['size'] > 0)
				{
					if($this->upload->do_upload('cat_thumbnail'))
					{
						$data = $this->upload->data();
						$update['cat_thumbnail'] = $data['file_name'];
					}
					else
					{
						$this->smarty->assign('errors', $this->upload->display_errors());
						$this->smarty->view('cat/edit.tpl');
						return;
					}
				}
				$this->category_model->update($cat_id, $update);
				$this->session->set_flashdata('msg', "Updated category $cat[cat_name] successfully.");
				redirect(admin_url('category'));
			}
		}
	}

	public function delete($cat_id = '')
	{
		$this->category_model->delete($cat_id);
		$this->session->set_flashdata('msg', "Deleted category successfully.");
		redirect(admin_url('category'));
	}

	public function preview($cat_id = '')
	{
		if(($cat = $this->category_model->get_by(array('cat_id' => $cat_id))) != NULL)
		{
			$this->smarty->assign('cat', $cat);
			if(($cat_parent = $this->category_model->get_by(array('cat_id' => $cat['cat_parent_id']))) != NULL)
			{
				$this->smarty->assign('cat_parent', $cat_parent);
			}

			$articles = $this->category_model->get_list_articles($cat_id);
			$articles_data_table = array();
			foreach ($articles as $item)
			{
				$articles_data_table[] = $item['article_id'];
				$articles_data_table[] = "<a href=".base_url()."tpl/article/$item[article_id]>$item[article_name]</a>";
				$articles_data_table[] = $item['article_des'];
				$articles_data_table[] = "<a href=".base_url()."tpl/article/edit/$item[article_id] role='button' class='btn btn-flat btn-primary btn-sm'><i class='fa fa-edit'></i></a>";
				$articles_data_table[] = "<a href=".base_url()."tpl/article/delete/$item[article_id] role='button' class='btn btn-flat btn-danger btn-sm'><i class='fa fa-remove'></i></a>";
			}
			$this->smarty->assign('articles', $articles_data_table);
			$this->smarty->assign('table_attr', 'class="table table-bordered table-striped" id="example1"');
			$this->smarty->assign('td_attr', 'style="max-width: 250px;"');

			$this->smarty->view('cat/preview.tpl');
		}
		else
		{
			redirect(admin_home_url());
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
