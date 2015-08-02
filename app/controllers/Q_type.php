<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin <[china.hehanlin@gmail.com]>
 * @time(2015/05/24)
 */

class Q_type extends HM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Q_shop_model');

	}

	public function index($tid)
	{
		$tpl_data['shop'] = $this->Q_shop_model->getShopListForType($tid,$orderBy = 'sid');
		$tpl_data['tname']= isset($_GET['tname'])	?	trim($_GET['tname'])	:	'';
		$tpl_data['tid']  = $tid;
		$this->load->view('tpl/type.html',$tpl_data);

	}

	public function orderByName($tid)
	{

		$tpl_data['shop'] = $this->Q_shop_model->getShopListForType($tid,$orderBy = 'truename',$sc = 'asc');
		$tpl_data['tname']= isset($_GET['tname'])	?	trim($_GET['tname'])	:	'';
		$tpl_data['tid']  = $tid;
		$this->load->view('tpl/type.html',$tpl_data);
	}

	public function orderByTime($tid)
	{

		$tpl_data['shop'] = $this->Q_shop_model->getShopListForType($tid,$orderBy = 'edittime');
		$tpl_data['tname']= isset($_GET['tname'])	?	trim($_GET['tname'])	:	'';
		$tpl_data['tid']  = $tid;
		$this->load->view('tpl/type.html',$tpl_data);
	}

	public function orderByHot($tid)
	{

		$tpl_data['shop'] = $this->Q_shop_model->getShopListForType($tid,$orderBy = 'hot');
		$tpl_data['tname']= isset($_GET['tname'])	?	trim($_GET['tname'])	:	'';
		$tpl_data['tid']  = $tid;
		$this->load->view('tpl/type.html',$tpl_data);
	}
}