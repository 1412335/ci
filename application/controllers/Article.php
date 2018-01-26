<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 11:50 AM
 */

class Article extends CI_Controller
{
	protected $data;


	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_model');
		$this->load->model('category_model');
		$this->load->library('form_validation');

		$config = array(
			'max_size'	=> '10',
			'max_height'	=> '500',
			'max_width'	=> '1024',
			'allowed_types'	=> 'png|jpg|jpeg',
			'upload_path'	=> './uploads/'
		);
		$this->load->library('upload', $config);

		$this->data['data']['cats'] = $this->category_model->get_list_cats('array');
	}

	public function index($article_id = '')
	{
		if (($article = $this->article_model->get_article_by_id($article_id)) != NULL)
		{
			$this->data['data']['article'] = $article;
			$this->data['title'] = 'Article '.$article['article_name'];
			$this->data['subview'] = 'article/detail';
			$this->load->view('home', $this->data);
		}
		else
		{
			redirect(base_url().'index.php/home');
		}
	}

	public function add()
	{
		$this->data['title'] = 'New Article';
		$this->data['subview'] = 'article/add';

		$this->form_validation->set_rules('article_name', 'Article Name', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('article_content', 'Article Content', 'required');
		$this->form_validation->set_rules('article_cat_id', 'Article Category', 'required');

		if($this->form_validation->run() == FAlSE)
		{
			$this->load->view('home', $this->data);
		}
		else
		{
			if($this->upload->do_upload('article_image') == FALSE)
			{
				$this->data['data']['errors'] = $this->upload->display_errors();
				$this->load->view('home', $this->data);
			}
			else
			{
				$file_data = $this->upload->data();
				$new_article = array(
					'article_name' => $_POST['article_name'],
					'article_des' => $_POST['article_des'],
					'article_content' => $_POST['article_content'],
					'article_cat_id' => $_POST['article_cat_id'],
					'article_thumbnail' => $file_data['file_name']
				);
				$this->article_model->insert($new_article);
				$this->session->set_flashdata('msg', 'Added new article successfully.');
				redirect(base_url() . 'index.php/home');
			}
		}
	}

	public function edit($article_id = '')
	{
		$article = $this->article_model->get_article_by_id($article_id);
		if(empty($article))
		{
			redirect(base_url().'index.php/home');
		}
		else
		{
			$this->data['title'] = 'Edit Article '.$article['article_name'];
			$this->data['subview'] = 'article/edit';
			$this->data['data']['article'] = $article;

			$this->form_validation->set_rules('article_name', 'Article Name', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('article_content', 'Article Content', 'required');
			$this->form_validation->set_rules('article_cat_id', 'Article Category', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('home', $this->data);
			}
			else
			{
				$update = array(
					'article_name' => $_POST['article_name'],
					'article_cat_id' => $_POST['article_cat_id'],
					'article_des' => $_POST['article_des'],
					'article_content' => $_POST['article_content']
				);
				if(isset($_FILES['article_image']) && ! empty($_FILES['article_image']))
				{
					if($this->upload->do_upload('article_image') == FALSE)
					{
						$this->data['data']['errors'] = $this->upload->display_errors();
						$this->load->view('home', $this->data);
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
				redirect(base_url().'index.php/home');
			}
		}
	}

	public function delete($article_id = '')
	{
		$this->article_model->set_id($article_id);
		$this->article_model->delete($article_id);
		$this->session->set_flashdata('msg', "Deleted article successfully.");
		redirect(base_url().'index.php/home');
	}
}
