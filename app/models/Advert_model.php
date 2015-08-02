<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @author hehanlin
 * @time(2015/05/15)
 */

class Advert_model extends MY_Model {

	const TBL = 'ad';

	const COL = 'name';


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
		echo 1;exit;

		return parent::updateRow(self::TBL,$condition,$data);
	}


	//获取总行数
	public function count_row()
	{
		return parent::countRow(self::TBL);
	}

}