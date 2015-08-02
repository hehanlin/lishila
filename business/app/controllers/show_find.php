<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 author:ldp
 time:2015/05/07
*/

class Show_find extends AM_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('show_find_model');
	}

	public function index()
	{
		$this->load->view('show_find_view');
	}

	public function doSearch(){
		$id = $_GET['sname'];
		$text = '{"order_id": "'.$id.'"}';
		$tpl_data['results'] = $this->show_find_model->get_api_data($text); 
		$tpl_data['status'] = $this->db->select('status')
									   ->where(array('order_id'=>$id))
									   ->get('t_order')
									   ->row_array();

		$this->load->view('show_find_view',$tpl_data);

	}

	public function do_complate(){
		$id = $this->uri->segment(3);
		$text = '{"order_id": "'.$id.'"}';
		$rs = $this->show_find_model->get_api_data($text);
		$rs['nickname'] = $this->session->userdata('user');
		
		$re['status'] = 1;
		if($this->show_find_model->insertRow('t_order',$rs))
		{
			$tpl_data = array(
								'wait'     => 3,
								'message'  => '销核成功！！！',
								'url'      => site_url('Show_find/index')
				);
			$this->load->view('message_view',$tpl_data);
		}
		else
		{
			$tpl_data = array(
								'wait'     => 3,
								'message'  => '销核失败！！！',
								'url'      => site_url('Show_find/index')
				);
			$this->load->view('message_view',$tpl_data);
		}

	}
}
