<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @author hehanlin <[china.hehanlin@gmail.com]>
 * @time(2015/05/24)
 */

class Q_active extends HM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Q_active_model');

		$this->load->model('Q_shop_model');
	}

	public function index($aid,$sid)
	{

		$tpl_data['shop']  = $this->Q_shop_model->getShopById($sid);
		$tpl_data['active']= $this->Q_active_model->getActiveByAid($aid);

		$this->load->view('tpl/active.html',$tpl_data);
	}


}