<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/**
 * @author hehanlin
 * @time   2015/5/8
 */

class Auth_model extends MY_Model {

	const TBL = 'auth';

	const COL = 'name';




	// public function get_list($offset)
	// {
	// 	return parent::getRows(self::TBL,'1',$offset);
	// }


	//活取一列数据,用于检查用户名重复
	public function get_col($col)
	{	
		return parent::getCol(self::TBL,self::COL);
	}

	/**
	 * 活取一行数据,重写于2015/5/12晚
	 * @param  [type] $condition [description]
	 * @return [type]            [description]
	 */
	public function get_row($condition)
	{
		if(!is_array($condition) || empty($condition))return false;

		return parent::getRow(self::TBL,$condition);
	}

	public function get_rows($condition,$limit,$offset)
	{

		return parent::getRows(self::TBL,$condition,$limit,$offset,'*');
	}

	public function insert_row($data)
	{
		return parent::insertRow(self::TBL,$data);
	}

	public function delete_row($condition)
	{	
		if(!is_array($condition) || empty($condition))return false;

		return parent::deleteRow(self::TBL,$condition) ;

	}

	public function update_row($condition,$data)
	{
		if(!is_array($condition) || empty($condition))return false;

		return parent::updateRow(self::TBL,$condition,$data);
	}


	//获取其他表的数据
	public function get_other_list($table)
	{
		return parent::getCol($table,'','','aid,info');
	}

	//获取总行数
	public function count_row()
	{
		return parent::countRow(self::TBL);
	}


}