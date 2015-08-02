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
			$this->message_fail(site_url('login/index'),'验证码输入错误，请重试',3);
			return false;
		}
		
		//获取表单
		$user['nickname'] = trim($this->input->post('nickname'));
		//$user['password'] = md5(trim($this->input->post('password')));
		//需要md5加密打开上面的注释
		$user['password'] = trim($this->input->post('password'));		
		
		//尝试登录
		$this->load->model("Admin_model");
		if($this->Admin_model->checklogin($user))
		{
				//设置登录状态，创建session
				$this->session->set_userdata('user', $user['nickname']);
				redirect("dash/index");
		}
	}

 
 }
