<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin
 * @time(2015/05/09)
 * @desc   后台总model
 */

class MY_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
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

		return $this->db->insert($table,$data);
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
		$this->db->where($condition)->delete($table);
		return $this->db->affected_rows()==1 ? true : false;
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

		return $this->db->where($condition)->update($table,$data);
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
	//获取总行数
	public function countRow($table)
	{
		if(!$this->db->table_exists($table))return false;

		return $this->db->count_all($table);
	}

	/**
	@author:ldp
	@time:2015/5/13
	查询方法，含分页
	@param    String  $table              表名
	@param    int     $page_index         当前页数
	@param    String  $cols               查询的列，逗号分隔，默认为空字符串，没有数据
	@param    array   $condition          查询条件，一维数组
	@param    String  $condition_type     条件类型，可选where和like(默认)
	@return   array   $result = array(count,page_index,data)
	*/
	public function get_data($table, $page_index, $cols = '',$condition = array(),$condition_type = 'like'){
		//分页需要的参数  表名  当前页(参数)  列名(默认为空的一维数组) 条件 条件类型(默认like)
		//返回的数据  总记录  当前页码  数据0
		// $cols = array('id');
		$res = array();	
		if(!is_array($condition)){
			return false;
		}
		if(!$this->db->table_exists($table)){
			return false;
		}
		if($cols == '' || strlen($cols) == 0){
			// var_dump('没有数据');
			return false;
		}
		$this->db->$condition_type($condition);
		$res['page_index'] = $page_index;
		$res['count'] = $this->db->count_all_results($table);
		if($res['count']>PAGE_SIZE)
			$this->db->limit(PAGE_SIZE, ($page_index-1)*1);
		$this->db->$condition_type($condition);
		$res['results'] = $this->db->select($cols)
								   ->get($table)
								   ->result_array();
		return $res;
	}
	/**
	@auth:ldp
	@time:2015/6/9
	查询订单号的订单
	@param  json   $text  json的订单号
	*/
	public function get_api_data($text){
		$access_token = $this->get_access_token(APPID, APPSECRET);
		$url = 'https://api.weixin.qq.com/merchant/order/getbyid?access_token=';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POSTFIELDS, $text);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($curl, CURLOPT_URL, $url.$access_token);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$rs = curl_exec($curl);
		$arr = json_decode($rs, true);
		if($arr['errcode'] != 0){
			return array();
		}
		else{
			return $arr['order'];
		}
		curl_close($curl);
	}
	/**
	@auth:ldp
	@time:2015/6/9
	获取access_token
	*/
	public function get_access_token($appID, $secret){
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appID.'&secret='.$secret;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$rs = curl_exec($curl);
		$arr = json_decode($rs, true);
		if(isset($arr['access_token'])) return $arr['access_token'];
	}
}