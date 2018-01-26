<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 11:50 AM
 */

class Category extends CI_Controller
{
	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->library('form_validation');

		$this->data['data']['cats'] = $this->category_model->get_list_cats('array');
	}

	public function add()
	{
		$this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim|min_length[3]|is_unique[category.cat_name]');
//		$this->form_validation->set_rules('cat_parent_id', 'Category Parent', 'required');

		if($this->form_validation->run() == FAlSE)
		{
			$this->data['subview'] = 'cat/add';
			$this->data['title'] = 'New Category';
			$this->load->view('home', $this->data);
		}
		else
		{
			$new_cat = array(
				'cat_name'	=> $_POST['cat_name'],
				'cat_des'	=> $_POST['cat_des'],
				'cat_parent_id'	=> $_POST['cat_parent_id']
			);
//			$this->category_model->set_cat($new_cat);
			$this->category_model->insert($new_cat);
			$this->session->set_flashdata('msg', 'Added new category successfully.');
			redirect(base_url().'index.php/home');
		}
	}

	public function check_cat_name($cat_name, $cat_id = '')
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
			redirect(base_url().'index.php/home');
		}
		else
		{
			$this->form_validation->set_rules('cat_name', 'Category Name', 'required|trim|min_length[3]|callback_check_cat_name['.$cat_id.']');
//			$this->form_validation->set_rules('cat_parent_id', 'Category Parent', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->data['data']['cat'] = $cat;
				$this->data['subview'] = 'cat/edit';
				$this->data['title'] = 'Edit Category '.$cat['cat_name'];
				$this->load->view('home', $this->data);
			}
			else
			{
				$update = array(
					'cat_name' => $_POST['cat_name'],
					'cat_parent_id' => $_POST['cat_parent_id'],
					'cat_des' => $_POST['cat_des']
				);
				$this->category_model->set_id($cat_id);
//				$this->category_model->set_cat($update);
				$this->category_model->update($update);
				$this->session->set_flashdata('msg', "Updated category successfully.");
				redirect(base_url().'index.php/home');
			}
		}
	}

	public function delete($cat_id = '')
	{
		$this->category_model->set_id($cat_id);
		$this->category_model->delete();
		$this->session->set_flashdata('msg', "Deleted category successfully.");
		redirect(base_url().'index.php/home');
	}

}
