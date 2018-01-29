<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/23/2018
 * Time: 9:19 AM
 */

class Category_model extends My_Model
{
	protected $table = 'category';
	protected $prefix_table = 'cat';
	protected $key = 'category_id';

	protected $cat_id;
	protected $cat_name;
	protected $cat_parent_id;
	protected $cat_des;

	public function __construct()
	{
		parent::__construct();
	}

	public function get_list_cats($type = 'object')
	{
		$this->db->select('cat.cat_id, cat.cat_name, cat.cat_des, cat.cat_status, cat.cat_created_date, cat.cat_modified_date, cat.cat_parent_id, cat1.cat_name as cat_parent_name');
		$this->db->join($this->table .' AS cat1', 'cat1.cat_id = cat.cat_parent_id', 'LEFT');
		return $this->db->get($this->table . ' AS cat')->result($type);
	}

	public function get_list_articles($id)
	{
		$this->select = 'article_id, article_name, article_thumbnail, article_des, cat_id, cat_name';
		return $this->get_list(array(
			'table'	=> 'article',
			'con'	=> 'cat_id = article_cat_id',
		), array('cat_id' => $id));
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
