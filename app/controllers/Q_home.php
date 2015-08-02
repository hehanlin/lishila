<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin <[china.hehanlin@gmail.com]>
 * @time(2015/05/24)
 */

class Q_home extends HM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Q_type_model');
		$this->load->model('Q_shop_model');
		$this->load->model('Q_advert_model');
	}


	public function index()
	{
		$tpl_data['type']  = $this->Q_type_model->getTypeList();
		$tpl_data['advert']= $this->Q_advert_model->getAdList();
		$tpl_data['shop']  = $this->Q_shop_model->getShopListOrderByHot();

		$this->load->view('tpl/index.html',$tpl_data);
	}
}