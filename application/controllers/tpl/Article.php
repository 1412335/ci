<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/25/2018
 * Time: 11:43 AM
 */

class Article extends CI_Controller
{
	protected $status = array(
		0	=> 'unpublic',
		1	=> 'public'
	);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model');
		$this->load->model('category_model');
		$this->load->library('form_validation');
		$config = array(
			'max_size'	=> '100',
			'max_height'	=> '1024',
			'max_width'	=> '1024',
			'allowed_types'	=> 'png|jpg|jpeg',
			'upload_path'	=> './uploads/articles/'
		);
		$this->load->library('upload', $config);
		$this->smarty->assign('base_url', base_url());

		$cats = $this->category_model->get_list_cats('array');

		$cats_option = array();
		foreach ($cats as $item)
		{
			$cats_option[$item['cat_id']] = $item['cat_name'];
		}
		$this->smarty->assign('cats', $cats_option);

		$this->smarty->assign('status', $this->status);
	}

	public function index()
	{
		$articles = $this->article_model->get_list_articles();
		$articles_data_table = array();
		foreach ($articles as $item)
		{
			$articles_data_table[] = $item['article_id'];
			$articles_data_table[] = "<a href=".base_url()."tpl/article/$item[article_id]>$item[article_name]</a>";
			$articles_data_table[] = "<a href=".base_url()."tpl/category/$item[cat_id]>$item[cat_name]</a>";
			$articles_data_table[] = $item['article_des'];
			$articles_data_table[] = $this->_article_status($item['article_status']);
			$articles_data_table[] = $item['article_created_date'];
			$articles_data_table[] = $item['article_modified_date'];
			$articles_data_table[] = "<a href=".base_url()."tpl/article/$item[article_id]/edit role='button' class='btn btn-flat btn-primary btn-sm'><i class='fa fa-edit'></i></a>";
			$articles_data_table[] = "<a href=".base_url()."tpl/article/$item[article_id]/delete onclick='return confirm(\"Do you want to delete this article?\");'
										role='button' class='btn btn-flat btn-danger btn-sm'><i class='fa fa-remove'></i></a>";
		}
		$this->smarty->assign('articles', $articles_data_table);
		$this->smarty->assign('table_attr', 'class="table table-bordered table-striped" id="example1"');
		$this->smarty->assign('td_attr', 'style="max-width: 250px;"');

		if(($msg = $this->session->flashdata('msg')) != NULL)
		{
			$this->smarty->assign('msg', $msg);
		}
		$this->smarty->view('article/index.tpl');
	}

	public function add()
	{
		$this->form_validation->set_rules('article_name', 'Article Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('article_cat_id', 'Article Category', 'required');
		$this->form_validation->set_rules('article_tags', 'Article Tags', 'regex_match["/.+,?/"]');
		$this->form_validation->set_rules('article_status', 'Article Status', 'required');
		$this->form_validation->set_rules('article_des', 'Article Description', 'required');
		$this->form_validation->set_rules('article_content', 'Article Content', 'required');

		if($this->form_validation->run() == FAlSE)
		{
			$this->smarty->assign('errors', validation_errors());
			$this->smarty->view('article/add.tpl');
		}
		else
		{
			if($this->upload->do_upload('article_image') == FALSE)
			{
				$this->smarty->assign('errors', $this->upload->display_errors());
				$this->smarty->view('article/add.tpl');
			}
			else
			{
				$file_data = $this->upload->data();
				$new_article = array(
					'article_name' => $_POST['article_name'],
					'article_des' => $_POST['article_des'],
					'article_content' => $_POST['article_content'],
					'article_cat_id' => $_POST['article_cat_id'],
					'article_cat_status' => $_POST['article_cat_status'],
					'article_cat_tags' => $_POST['article_cat_tags'],
					'article_thumbnail' => $file_data['file_name'],
				);
				$this->article_model->insert($new_article);
				$this->session->set_flashdata('msg', 'Added new article successfully.');
				redirect(base_url() . 'tpl/article');
			}
		}
	}

	public function edit($article_id = '')
	{
		$article = $this->article_model->get_article_by_id($article_id);
		if(empty($article))
		{
			redirect(base_url() . 'tpl/article');
		}
		else
		{
			$this->smarty->assign('article', $article);

			$this->form_validation->set_rules('article_name', 'Article Name', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('article_cat_id', 'Article Category', 'required');
			$this->form_validation->set_rules('article_tags', 'Article Tags', 'regex_match["/.+,?/"]');
			$this->form_validation->set_rules('article_status', 'Article Status', 'required');
			$this->form_validation->set_rules('article_des', 'Article Description', 'required');
			$this->form_validation->set_rules('article_content', 'Article Content', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->smarty->assign('errors', validation_errors());
				$this->smarty->view('article/edit.tpl');
			}
			else
			{
				$update = array(
					'article_name' => $_POST['article_name'],
					'article_cat_id' => $_POST['article_cat_id'],
					'article_des' => $_POST['article_des'],
					'article_content' => $_POST['article_content'],
					'article_cat_status' => $_POST['article_cat_status'],
					'article_cat_tags' => $_POST['article_cat_tags'],
				);
				if(isset($_FILES['article_image']) && ($_FILES['article_image']['size'] > 0))
				{
//					var_dump($_FILES['article_image']);
					if($this->upload->do_upload('article_image') == FALSE)
					{
						$this->smarty->assign('errors', $this->upload->display_errors());
						$this->smarty->view('article/edit.tpl');
						return;
					}
					else
					{
						$file_data = $this->upload->data();
						$update['article_thumbnail'] = $file_data['file_name'];
					}
				}
				$this->article_model->set_id($article_id);
				$this->article_model->update($update);
				$this->session->set_flashdata('msg', "Updated article successfully.");
				redirect(base_url() . 'tpl/article');
			}
		}
	}

	public function delete($article_id = '')
	{
		$this->article_model->delete($article_id);
		$this->session->set_flashdata('msg', "Deleted article successfully.");
		redirect(base_url() . 'tpl/article');
	}

	public function preview($article_id = '')
	{
		$article = $this->article_model->get_article_by_id($article_id);
		if( ! $article)
		{
			redirect(base_url().'tpl/article');
		}
		else
		{
			$related_articles = $this->article_model->get_related_to($article_id, 4, 'tags');
			$this->smarty->assign('related_articles', $related_articles);
			$this->smarty->assign('article', $article);
			$this->smarty->view('article/preview.tpl');
		}
	}

	public function related($article_id = '')
	{
		var_dump($this->article_model->get_related_to($article_id, 5, 'tags'));
	}

	private function _article_status($status)
	{
		switch ($status)
		{
			case 1: return 'public';
			default: return 'unpublic';
		}
	}
}
