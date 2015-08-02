<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin
 * @time(2015/05/09)
 * @desc   后台总model
 */

class MY_Model extends CI_Model {

	/**
	 * 查找一条数据,重写于2015/5/12晚
	 * @param  [type] $table     [description]
	 * @param  [type] $condition [description]
	 * @return [type]            [description]
	 */
	public function getRow($table,$condition)
	{
		if (!$this->db->table_exists($table))return false;

		if(empty($condition))return false;

		$query = $this->db->where($condition)->get($table);

		$res = $query->row_array();
		$query->free_result();

		return $res;
	}



	/**
	 * 取得多行数据,重写于2015/05/12晚
	 * @param  [type] $table     [description]
	 * @param  array  $condition [description]
	 * @param  [type] $limit     [description]
	 * @param  [type] $offset    [description]
	 * @param  [type] $col       [description]
	 * @return [type]            [description]
	 */
	public function getRows($table,$condition = array(),$limit,$offset,$col)
	{
		if (!$this->db->table_exists($table))return false;

		if(!empty($condition))
		{	
			
			$res['num_rows'] = $this->db->select($col)
										->like($condition)
										->get($table)
										->num_rows();
			
			$query = $this->db->select($col)
							  ->like($condition)
							  ->get($table,$limit,$offset);
		}
		else
		{
			$query =$this->db->select($col)->get($table,$limit,$offset);
		}


		$res['data'] = $query->result_array();
		$query->free_result();

		return $res;
	}


	/**
	 * 取一列的所有数据,重写于2015/05/12晚
	 * @param  [type] $table [description]
	 * @param  [type] $col   [description]
	 * @return [type]        [description]
	 */
	public function getCol($table,$col)
	{
		if (!$this->db->table_exists($table))return false;

		$query = $this->db->select($col)->get($table);

		$res   = $query->result_array();

		$query->free_result();

		return $res;
	}


	/**
	 * @author hehanlin
	 * @time(2015/05/09)
	 * 新增一条数据
	 * @param  [type] $table [description]
	 * @param  array  $data  [description]
	 * @return [type]        [description]
	 */
	public function insertRow($table,$data = array())
	{
		if(!$this->db->table_exists($table))return false;

		if(empty($data))return false;

		$query = $this->db->insert($table,$data);

		return $this->db->affected_rows($query) == 1 ? TRUE 	:	FALSE;
	}


	/**
	 * @author hehanlin
	 * @time(2015/05/09)
	 * 删除一条数据
	 * @param  [type] $table     [description]
	 * @param  array  $condition [description]
	 * @return [type]            [description]
	 */
	public function deleteRow($table,$condition = array())
	{
		if(!$this->db->table_exists($table))return false;

		if(empty($condition))return false;

		$query = $this->db->where($condition)->delete($table);

		return $this->db->affected_rows($query) == 1 ? TRUE 	:	FALSE;

	}

	/**
	 * @author hehanlin
	 * @time(2015/05/09)
	 * 修改一条数据
	 * @param  [type] $table     [description]
	 * @param  array  $condition [description]
	 * @param  array  $data      [description]
	 * @return [type]            [description]
	 */
	public function updateRow($table,$condition = array(),$data = array())
	{
		if(!$this->db->table_exists($table))return false;

		if(empty($condition))return false;

		if(empty($data))return false;

		$query = $this->db->where($condition)->update($table,$data);

		return $this->db->affected_rows($query) == 1 ? TRUE 	:	FALSE;
	}


	//获取总行数
	public function countRow($table)
	{
		if(!$this->db->table_exists($table))return false;

		return $this->db->count_all($table);
	}
}
