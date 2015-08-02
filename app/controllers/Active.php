<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin
 * @time 2015/05/19
 */

class Active extends AM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Active_model');

	}


	public function add()
	{
		$tpl_data['shop'] = $this->Active_model->get_other_list('shop');
		$this->load->view('active_add',$tpl_data);
	}

	public function insertRow()
	{
		$name = $this->input->post('name');

		$col = $this->Active_model->get_col('name');

		//如果昵称重复,打回去,
		foreach ($col as $val) {
			if($name == $val['name'])
			{
				$this->message_fail(site_url('active/add'),'已存在该活动,请重试!',3);
				return false;
			}
		}


		//接收用户数据
		$data = $this->getData('post',array('name','sid','old_price','package','desc','now_price','alink','start_time','end_time','flag','status'));

		
		//接收图片
		$this->load->library('upload');
		if(!$this->upload->do_upload('img'))
		{
			$this->message_fail(site_url('active/add'),$this->upload->display_errors(),3);
			return false;
		}
		else
		{
			$success = $this->upload->data();
			$data['img'] = $success['file_name'];
		} 

		$data['edit_time'] = date("Y-m-d");

		if($this->Active_model->insert_row($data))
		{
			//成功
			$this->message_succ(site_url('active/add'));
		}
		else
		{
			//失败
			$this->message_fail(site_url('active/add'));
		}
	
	}

	public function manage()
	{
		
		//获取get参数
		$searchNick = isset($_GET['name']) ? trim($_GET['name']) : "";
		$searchShop = isset($_GET['sid'])  ? trim($_GET['sid'])  : "";
		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;


		$condition = array();
		if($searchNick !== "") $condition['name'] = $searchNick;
		if($searchShop !== "") $condition['sid'] = $searchShop;
		
		$offset = ($curPage-1)*PAGENUM;

		$res = $this->Active_model->get_rows($condition,$limit = PAGENUM,$offset);

		$tpl_data['list'] = $res['data'];
		$tpl_data['shop'] = $this->Active_model->get_other_list('shop');
		//分页类配置
		$this->load->library('pagination');
		$configPage['base_url'] 	= site_url('active/manage').'?name=' . $searchNick . '&sid=' . $searchShop;
		if(empty($condition))
		{
			$configPage['total_rows'] 	= $this->Active_model->count_row();
		}
		else
		{
			$configPage['total_rows'] 	= $res['num_rows']; 
		}
		$configPage['per_page'] 	= PAGENUM; 
		$configPage['cur_page']  	= $curPage;
		
		$this->pagination->initialize($configPage); 
		$tpl_data['page'] = $this->pagination->create_links();

		$this->load->view('active_manage',$tpl_data);

	}

	public function see()
	{
		
		//获取get参数
		$searchNick = isset($_GET['name']) ? trim($_GET['name']) : "";
		$searchShop = isset($_GET['sid'])  ? trim($_GET['sid'])  : "";
		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;


		$condition = array();
		if($searchNick !== "") $condition['name'] = $searchNick;
		if($searchShop !== "") $condition['sid'] = $searchShop;
		
		$offset = ($curPage-1)*PAGENUM;

		$res = $this->Active_model->get_rows($condition,$limit = PAGENUM,$offset);

		$tpl_data['list'] = $res['data'];
		$tpl_data['shop'] = $this->Active_model->get_other_list('shop');
		//分页类配置
		$this->load->library('pagination');
		$configPage['base_url'] 	= site_url('active/see').'?name=' . $searchNick . '&sid=' . $searchShop;
		if(empty($condition))
		{
			$configPage['total_rows'] 	= $this->Active_model->count_row();
		}
		else
		{
			$configPage['total_rows'] 	= $res['num_rows']; 
		}
		$configPage['per_page'] 	= PAGENUM; 
		$configPage['cur_page']  	= $curPage;
		
		$this->pagination->initialize($configPage); 
		$tpl_data['page'] = $this->pagination->create_links();

		$this->load->view('active_see',$tpl_data);

	}

	public function deleteRow()
	{
		$aid = $this->input->get('aid')	;

		echo $this->Active_model->delete_row(array('aid'=>$aid))	?	1	:	0;
	}

	public function edit()
	{
		if(!@$_GET['aid'])return false;

		$aid = $this->input->get('aid');

		$tpl_data['arr'] = $this->Active_model->get_row(array('aid'=>$aid));

		$tpl_data['shop'] = $this->Active_model->get_other_list('shop');

		$this->load->view('active_edit',$tpl_data);
	}

	public function updateRow()
	{

		$condition['aid'] = $this->input->post('aid');

		$oldname = isset($_POST['oldname'])	?	trim($_POST['oldname'])	:	'';

		$data = $this->getData('post',array('name','sid','old_price','package','desc','now_price','alink','start_time','end_time','flag','status'));

		$col = $this->Active_model->get_col('name');



		foreach($col as $k => $val)
		{
			if($val['name'] == $oldname)
			{
				unset($col[$k]);
				
			}
		}


		foreach ($col as $val) 
		{
			if($data['name'] == $val['name'])
			{
				$this->message_fail(site_url('active/edit').'?aid='.$condition['aid'],'该活动已存在，请重试！',3);
				return false;
			}
		}
		
		$data['edit_time'] = date("Y-m-d");
		if($this->Active_model->update_row($condition,$data))
		{
			//成功
			$this->message_succ(site_url('active/edit').'?aid='.$condition['aid']);
		}
		else
		{
			//失败
			$this->message_fail(site_url('active/edit').'?aid='.$condition['aid']);
		}
	}

}