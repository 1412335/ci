<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 10:26 AM
 */

class Article_model extends CI_Model
{
	protected $table = 'article';
	protected $article_id;
	protected $article_name;
	protected $article_cat_id;
	protected $article_content;
	protected $article_thumbnail;
	protected $article_des;

	public function __construct()
	{
		parent::__construct();
	}

	public function set_id($id)
	{
		$this->article_id = $id;
	}

	public function get_list_articles()
	{
		$this->db->select('article_id, article_name, article_thumbnail, article_des, cat_id, cat_name');
		$this->db->join('category', 'cat_id = article_cat_id');
		return $this->db->get($this->table)->result_array();
	}

	public function get_article_by_id($article_id)
	{
		$this->article_id = $article_id;
		$this->db->join('category', 'cat_id = article_cat_id');
		$this->db->where('article_id', $article_id);
		return $this->db->get($this->table)->row_array();
	}

	public function insert($data = array())
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($data = array())
	{
		return $this->db->update($this->table, $data, array('article_id' => $this->article_id));
	}

	public function delete($article_id)
	{
		$this->article_id = $article_id;
		return $this->db->delete($this->table, array('article_id' => $this->article_id));
	}

}
