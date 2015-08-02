<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 后台总控制器
*/

class AM_Controller extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		
		//定义后台模板路径
		$tpl_dir = "static/bui/";
		defined('AMTPLPATH') or define('AMTPLPATH', base_url() . $tpl_dir);
		
		//每页的条数
		defined('PAGENUM') or define('PAGENUM', 18);	

		//获取当前的控制器
		if(strtolower($this->router->fetch_class()) !== 'login')
		{
			if(!$this->hasLogin())
			{
				redirect("login/index");
			}
		}
	}
	
	public function getPage()
	{
		return isset($_GET['p']) ? $this->input('p') : 0;
	}

	
	/**
	 * @author hehanlin
	 * @time   2015/5/8
	 * @desc   用户进行添加或者编辑操作时返回信息
	 * @param  string  $message [description]
	 * @param  integer $wait    [description]
	 * @param  [type]  $url     [description]
	 * @return [void]           [description]
	 */
	public function message_succ($url,$message = '恭喜操作成功!',$wait = 3)
	{
		$tpl_data = array(
					'message'		=>		$message,
					'wait'			=>		$wait,
					'url'			=>		$url
			);
		$this->load->view('message',$tpl_data);
		
	}

	public function message_fail($url,$message = '操作失败,请重试!',$wait = 3)
	{
		$tpl_data = array(
					'message'		=>		$message,
					'wait'			=>		$wait,
					'url'			=>		$url
			);
		$this->load->view('message',$tpl_data);
		
	}


	/**
	 * @author hehanlin
	 * @time(2015/05/08)
	 * @desc   为了获取用户提交表单数据
	 * @param  [type] $method [description]
	 * @param  [type] $arr    [description]
	 * @return [array]         [description]
	 */
	public function getData($method,$arr)
	{
		if(!isset($method) || !is_array($arr) || empty($arr))return false;

		$res = array();

		if($method == 'get'|| $method == 'GET')
		{
			foreach($arr as $v)
			{
				$res[$v] = $this->input->get($v);
			}
			return $res;	
		}
		else if($method == 'post'|| $method == 'POST')
		{
			foreach($arr as $v)
			{
				$res[$v] = $this->input->post($v);

			}
			return $res;	
		}
		else
		{
			return false;
		}
	}
	
	//登录检测类
	public function hasLogin()
	{
		$user = $this->session->userdata('user');
		
		$this->tpl_data['user'] = 'dasds';
		if(is_string($user))
		{
			return true;
		}
		return false;
		
	}
	
	//退出登录
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("Login/index");
	}
}


/*
 前台
*/

class HM_Controller extends CI_Controller{
	

	public function __construct()
	{
		parent::__construct();

		$tpl_dir = base_url('static/views/tpl');

		defined('HMTPLPATH') or define('HMTPLPATH',$tpl_dir);
	}
}
