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
				redirect("Login/index");
			}
		}
	}

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
	
}
