<?php
/**
 * Created by PhpStorm.
 * User: CPU01702-local
 * Date: 1/29/2018
 * Time: 5:34 PM
 */

class My_Model extends CI_Model
{

	protected $table;
	protected $prefix_table;
	protected $key;
	protected $select = '*';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_list($join, $where = NULL)
	{
		if(is_array($join))
		{
			$this->db->join($join['table'], $join['con'], isset($join['type']) ? $join['type'] : '');
		}
		$this->db->select($this->select);
		if(is_array($where))
		{
			$this->db->where($where);
		}
		return $this->db->get($this->table)->result_array();
	}

	public function get_by($key, $value, $id = NULL)
	{
		$this->db->where($key, $value);
		if($id)
		{
			$this->db->where($this->prefix_table.'_id != ', $id);
		}
		return $this->db->get($this->table)->row_array();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id, $data)
	{
		return $this->db->update($this->table, $data, array($this->key => $id));
	}

	public function delete($id)
	{
		return $this->db->update($this->table, array($this->prefix_table.'_status' => 0), array($this->key => $id));
	}

	public function check_exist($where)
	{
		$this->db->where($where);
		if($this->db->get($this->table)->num_rows() > 0)
		{
			return TRUE;
		}
		return FALSE;
	}

}
