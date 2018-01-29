<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 9:19 AM
 */

class Category_model extends CI_Model
{
	protected $table = 'category';
	protected $cat_id;
	protected $cat_name;
	protected $cat_parent_id;
	protected $cat_des;

	public function __construct()
	{
		parent::__construct();
	}

	public function set_id($id)
	{
		$this->cat_id = $id;
	}

	public function set_cat($data = array())
	{
		if(isset($data['cat_name']))
		{
			$this->cat_name = $data['cat_name'];
		}
		if(isset($data['cat_des']))
		{
			$this->cat_name = $data['cat_des'];
		}
		if(isset($data['cat_parent_id']))
		{
			$this->cat_name = $data['cat_parent_id'];
		}
	}

	public function get_list_cats($type = 'object')
	{
		$this->db->select('cat.cat_id, cat.cat_name, cat.cat_des, cat.cat_status, cat.cat_created_date, cat.cat_modified_date, cat.cat_parent_id, cat1.cat_name as cat_parent_name');
		$this->db->join($this->table .' AS cat1', 'cat1.cat_id = cat.cat_parent_id', 'LEFT');
		return $this->db->get($this->table . ' AS cat')->result($type);
	}

	public function get_list_articles($id)
	{
		$this->cat_id = $id;
		$this->db->select('article_id, article_name, article_thumbnail, article_des, cat_id, cat_name');
		$this->db->join('category', 'cat_id = article_cat_id');
		$this->db->where('cat_id', $this->cat_id);
		return $this->db->get('article')->result_array();
	}

	public function get_cat_by($key, $value, $cat_id = '')
	{
		$this->{$key} = $value;
		$this->db->where($key, $value);
		if( ! empty($cat_id))
		{
			$this->db->where('cat_id !=', $cat_id);
		}
		return $this->db->get($this->table)->row_array();
	}

	public function insert($data = array())
	{
		return $this->db->insert($this->table, $data);
	}

	public function delete($cat_id)
	{
//		$this->db->where('cat_parent_id', $this->cat_id);
//		$this->db->update($this->table, array('cat_parent_id' => 0));
//
//		$this->db->where('article_cat_id', $this->cat_id);
//		$this->db->update('article', array('article_cat_id' => 0));
//
//		return $this->db->delete($this->table, array('cat_id' => $this->cat_id));
		return $this->db->update($this->table, array('cat_status' => 0), array('cat_id' => $cat_id));
	}

	public function update($data = array())
	{
		return $this->db->update($this->table, $data, array('cat_id' => $this->cat_id));
	}

	//	prevent sql injection
	//	db->escape
	public function get_cat_by_name_escape($cat_name)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE cat_name = " . $this->db->escape($cat_name);
		var_dump($sql);
		return $this->db->query($sql)->row_array();
	}

	//	query binding
	public function get_cat_by_name_binding($cat_name)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE cat_name=?";
		return $this->db->query($sql, array($cat_name))->row_array();
	}
}
