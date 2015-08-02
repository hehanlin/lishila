<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author qiaodong
 * @time 2015/05/19
 */

class Base_info extends AM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Active_model');
		$this->load->model('Shop_model');
		//$this->load->model('Shop_model');	//广告总数
		

	}

	public function index()
	{
		$this->tpl_data['active_sum'] = $this->Active_model->count_row();
		$this->tpl_data['shop_sum'] = $this->Shop_model->count_row();		
		$this->tpl_data['ad_sum'] = 0;
		$this->load->view("base_info" , $this->tpl_data);
	}
}