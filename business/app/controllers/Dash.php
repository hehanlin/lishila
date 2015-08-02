<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * author:QD
 * time:2015/05/07
 * 后台默认登录地址
*/

class Dash extends AM_Controller {

	
	public function index()
	{
		$this->load->view('Dash');
	}
}
