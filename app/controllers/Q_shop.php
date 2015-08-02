<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin <[china.hehanlin@gmail.com]>
 * @time(2015/05/24)
 */


class Q_shop extends HM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Q_shop_model');

		$this->load->model('Q_active_model');
	}

	public function index($sid)
	{
		$this->Hot($sid);
		
		$tpl_data['shop']  = $this->Q_shop_model->getShopById($sid);
		$arr = $this->Q_active_model->getActiveListBySid($sid);

		$tpl_data['active'] = $this->Q_active_model->getActiveListBySid($sid);

		$this->load->view('tpl/shop.html',$tpl_data);
	}

	//2015/6/12
	private function Hot($sid)
	{
		$res = $this->db->select('hot')
						->where(array('sid'=>$sid))
						->get('shop')
						->row_array();
		$hot = $res['hot'];

		$hot += 1;

		if($this->db->where(array('sid'=>$sid))->update('shop',array('hot'=>$hot)))
		{
			return TRUE;
		}
			return FALSE;

	}
}