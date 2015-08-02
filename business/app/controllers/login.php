<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * author：QD
 * time：2015/05/19
 */
 
 
 class Login extends AM_Controller{
	 
	 public function __construct()
	 {
		 parent::__construct();
		
	 }
	 
	 public function index()
	 {
		 $this->load->view("login");
	 }
	 
	 public function get_code()
	{
		$this->load->library('captcha1');
		$code = $this->captcha1->getCaptcha();
		$this->session->set_userdata('code', $code);
		$this->captcha1->showImg();
	}
	
	public function logining()
	{
		$code = strtolower($this->input->post('code'));
		$code2 = strtolower($this->session->userdata('code'));
		if($code !== $code2 )
		{
			$tpl_data = array(
						'message'		=>		'验证码错误，请重试！',
						'wait'			=>		5,
						'url'			=>		site_url('login/index')
				);
			$this->load->view('message_view',$tpl_data);

			return false;
		}
		
		//获取表单
		$user['nickname'] = trim($this->input->post('nickname'));
		//$user['password'] = md5(trim($this->input->post('password')));
		//需要md5加密打开上面的注释
		$user['password'] = trim($this->input->post('password'));		
		
		//尝试登录
		$this->load->model("Shop_model");
		if($this->Shop_model->checklogin($user))
		{
				//设置登录状态，创建session
				$this->session->set_userdata('user', $user['nickname']);
				redirect("dash/index");
		}
		else
		{
			$tpl_data = array(
						'message'		=>		'登录失败！',
						'wait'			=>		5,
						'url'			=>		site_url('login/index')
				);
			$this->load->view('message_view',$tpl_data);
		}
	}




 
 }
