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
//		$this->db->select('article_id, article_name, article_thumbnail, article_des, cat_id, cat_name');
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
//		return $this->db->delete($this->table, array('article_id' => $this->article_id));
		return $this->db->update($this->table, array('article_status' => 0), array('article_id' => $this->article_id));
	}

	private function _get_all_combinations($array, $str = "", &$collect = array())
	{
		if($str != "")
		{
			$collect[] = $str;
		}
		foreach ($array as $key => $item)
		{
			$tmp_array = $array;
			$el = array_splice($tmp_array, $key, 1);
			if(count($tmp_array) > 0)
			{
				$this->_get_all_combinations($tmp_array, $str . '%' . $el[0] . '%', $collect);
			}
			else
			{
				$collect[] = $str . '%' . $el[0] . '%';
			}
		}
	}

	public function get_related_to($article_id, $limit = 5, $term = 'category')
	{
		$article = $this->db->get_where($this->table, array('article_id' => $article_id))->row_array();
		if($article)
		{
			if($term == 'category')
			{
				$this->db->where('article_cat_id', $article['article_cat_id']);
				$this->db->where('article_id != ', $article_id);
				return $this->db->get($this->table, $limit)->result_array();
			}
			elseif ($term == 'tags')
			{
				$return = array();
				$this->_get_all_combinations(explode(',', $article['article_tags']), "", $tags);
				usort($tags, function ($a, $b) {
					return strlen($a) >= strlen($b);
				});
				while (count($tags) > 0 && count($return) < $limit)
				{
					$this->db->where('article_id != ', $article_id);
					$this->db->where('article_tags LIKE ', array_pop($tags));
					foreach ($this->db->get($this->table)->result_array() as $item)
					{
						if(count($return) < $limit)
						{
							$return[] = $item;
						}
						else
						{
							break;
						}
					}
				}
				return $return;
			}
		}
		return NULL;
	}

}
