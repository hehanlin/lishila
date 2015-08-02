<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin
 * @time 2015/05/15
 */

class Shop extends AM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Shop_model');

	}


	public function add()
	{
		$tpl_data['type'] = $this->Shop_model->get_other_list('type');
		$this->load->view('shop_add',$tpl_data);
	}

	public function insertRow()
	{
		$nickname = $this->input->post('nickname');

		$col = $this->Shop_model->get_col('nickname');

		//如果昵称重复,打回去,
		foreach($col as $val)
 		{
 			if($nickname == $val['nickname'])
 			{
 				$this->message_fail(site_url('shop/add'),'该昵称已被其他用户使用,请重试!',3);
 				return false;
 			}
 		}



		//接收用户数据
		$data = $this->getData('post',array('nickname','truename','password','tid','address','tel','desc','flag','status'));

		
		//接收图片
		$this->load->library('upload');
		if(!$this->upload->do_upload('img'))
		{
			$this->message_fail(site_url('shop/add'),$this->upload->display_errors(),3);
			return false;
		}
		else
		{
			$success = $this->upload->data();
			$data['img'] = $success['file_name'];
		} 

		$data['edittime'] = date("Y-m-d H:i:s");
		if($this->Shop_model->insert_row($data))
		{
			//成功
			$this->message_succ(site_url('Shop/add'));
		}
		else
		{
			//失败
			$this->message_fail(site_url('Shop/add'));
		}
	
	}



	public function manage()
	{
		
		//获取get参数
		$searchNick = isset($_GET['nickname']) ? trim($_GET['nickname']) : "";
		$searchTrue = isset($_GET['truename']) ? trim($_GET['truename']) : "";
		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;
		

		$condition = array();
		if($searchNick !== "") $condition['nickname'] = $searchNick;
		if($searchTrue !== "") $condition['truename'] = $searchTrue;
		
		$offset = ($curPage-1)*PAGENUM;

		$res = $this->Shop_model->get_rows($condition,$limit = PAGENUM,$offset);

		$tpl_data['list'] = $res['data'];


		//分页类配置
		$this->load->library('pagination');
		$configPage['base_url'] 	= site_url('shop/manage').'?nickname=' . $searchNick . '&truename=' . $searchTrue;
		if(empty($condition))
		{
			$configPage['total_rows'] 	= $this->Shop_model->count_row();
		}
		else
		{
			$configPage['total_rows'] 	= $res['num_rows']; 
		}
		$configPage['per_page'] 	= PAGENUM; 
		$configPage['cur_page']  	= $curPage;
		
		$this->pagination->initialize($configPage); 
		$tpl_data['page'] = $this->pagination->create_links();
		
		$this->load->view('shop_manage',$tpl_data);
	}

	public function see()
	{
		
		//获取get参数
		$searchNick = isset($_GET['nickname']) ? trim($_GET['nickname']) : "";
		$searchTrue = isset($_GET['truename']) ? trim($_GET['truename']) : "";
		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;
		

		$condition = array();
		if($searchNick !== "") $condition['nickname'] = $searchNick;
		if($searchTrue !== "") $condition['truename'] = $searchTrue;
		
		$offset = ($curPage-1)*PAGENUM;

		$res = $this->Shop_model->get_rows($condition,$limit = PAGENUM,$offset);

		$tpl_data['list'] = $res['data'];


		//分页类配置
		$this->load->library('pagination');
		$configPage['base_url'] 	= site_url('shop/see').'?nickname=' . $searchNick . '&truename=' . $searchTrue;
		if(empty($condition))
		{
			$configPage['total_rows'] 	= $this->Shop_model->count_row();
		}
		else
		{
			$configPage['total_rows'] 	= $res['num_rows']; 
		}
		$configPage['per_page'] 	= PAGENUM; 
		$configPage['cur_page']  	= $curPage;
		
		$this->pagination->initialize($configPage); 
		$tpl_data['page'] = $this->pagination->create_links();
		
		$this->load->view('shop_see',$tpl_data);
	}


	public function deleteRow()
	{
		$sid = $this->input->get('sid')	;

		echo $this->Shop_model->delete_row(array('sid'=>$sid))	?	1	:	0;
	}

	public function edit()
	{
		if(!@$_GET['sid'])return false;

		$sid = $this->input->get('sid');

		$tpl_data['arr'] = $this->Shop_model->get_row(array('sid'=>$sid));

		$tpl_data['type'] = $this->Shop_model->get_other_list('type');

		$this->load->view('shop_edit',$tpl_data);
	}

	public function updateRow()
	{

		$condition['sid'] = $this->input->post('sid');

		$oldname = isset($_POST['oldname'])	?	trim($_POST['oldname'])	:	'';

		$data = $this->getData('post',array('nickname','truename','flag','tid','address','tel','desc','password','status'));

		$col = $this->Shop_model->get_col('nickname');



		foreach($col as $k => $val)
		{
			if($val['nickname'] == $oldname)
			{
				unset($col[$k]);
				
			}
		}
		foreach ($col as $val) 
		{
			if($data['nickname'] == $val['nickname'])
			{
				$this->message_fail(site_url('shop/edit').'?sid='.$condition['sid'],'该昵称已被其他用户使用,请重试!',3);
				return false;
			}
		}

		$this->load->library('upload');
		if(!$this->upload->do_upload('img'))
		{
			$this->message_fail(site_url('shop/edit').'?sid='.$condition['sid'],$this->upload->display_errors(),3);
			return false;
		}
		else
		{
			$success = $this->upload->data();
			$data['img'] = $success['file_name'];
		}
		
		$data['edittime'] = date("Y-m-d H:i:s");
		if($this->Shop_model->update_row($condition,$data))
		{
			//成功
			$this->message_succ(site_url('Shop/edit').'?sid='.$condition['sid']);
		}
		else
		{
			//失败
			$this->message_fail(site_url('Shop/edit').'?sid='.$condition['sid']);
		}
	}
}