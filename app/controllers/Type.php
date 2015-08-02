<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin
 * @time 2015/05/15
 */

class Type extends AM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Type_model');

	}


	public function add()
	{
		$this->load->view('type_add');
	}


	public function insertRow()
	{
		$data = array();

		$name = $this->input->post('name');

		$col = $this->Type_model->get_col('name');

		//如果昵称重复,打回去,
		foreach($col as $val)
 		{
 			if($name == $val['name'])
 			{
 				$this->message_fail(site_url('type/add'),'该分类已存在,请重试!',3);
 				return false;
 			}
 		}



		//接收用户数据
		$data = $this->getData('post',array('name','flag','status'));

		
		//接收图片
		$this->load->library('upload');
		if(!$this->upload->do_upload('img'))
		{
			$this->message_fail(site_url('type/add'),$this->upload->display_errors(),3);
			return false;
		}
		else
		{
			$success = $this->upload->data();
			$data['img'] = $success['file_name'];
		} 


		if($this->Type_model->insert_row($data))
		{
			//成功
			$this->message_succ(site_url('Type/add'));
		}
		else
		{
			//失败
			$this->message_fail(site_url('Type/add'));
		}
	}



	public function manage()
 	{
 		//获取get参数
 		$searchNick = isset($_GET['name']) ? trim($_GET['name']) : "";
 		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;
 		

 		$condition = array();
 		if($searchNick !== "") $condition['name'] = $searchNick;
 		
 		$offset = ($curPage-1)*PAGENUM;

 		$res = $this->Type_model->get_rows($condition,$limit = PAGENUM,$offset);

 		$tpl_data['list'] = $res['data'];


 		//分页类配置
 		$this->load->library('pagination');
 		$configPage['base_url'] 	= site_url('type/manage').'?name=' . $searchNick;
 		if(empty($condition))
 		{
 			$configPage['total_rows'] 	= $this->Type_model->count_row();
 		}
 		else
 		{
 			$configPage['total_rows'] 	= $res['num_rows']; 
 		}
 		$configPage['per_page'] 	= PAGENUM; 
 		$configPage['cur_page']  	= $curPage;
 		
 		$this->pagination->initialize($configPage); 
 		$tpl_data['page'] = $this->pagination->create_links();

 		$this->load->view('type_manage',$tpl_data);
 	}



 	public function see()
 	{
 		//获取get参数
 		$searchNick = isset($_GET['name']) ? trim($_GET['name']) : "";
 		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;
 		

 		$condition = array();
 		if($searchNick !== "") $condition['name'] = $searchNick;
 		
 		$offset = ($curPage-1)*PAGENUM;

 		$res = $this->Type_model->get_rows($condition,$limit = PAGENUM,$offset);

 		$tpl_data['list'] = $res['data'];


 		//分页类配置
 		$this->load->library('pagination');
 		$configPage['base_url'] 	= site_url('type/see').'?name=' . $searchNick;
 		if(empty($condition))
 		{
 			$configPage['total_rows'] 	= $this->Type_model->count_row();
 		}
 		else
 		{
 			$configPage['total_rows'] 	= $res['num_rows']; 
 		}
 		$configPage['per_page'] 	= PAGENUM; 
 		$configPage['cur_page']  	= $curPage;
 		
 		$this->pagination->initialize($configPage); 
 		$tpl_data['page'] = $this->pagination->create_links();

 		$this->load->view('type_see',$tpl_data);
 	}



 	public function deleteRow()
 	{
 		$tid = $this->input->get('tid')	;

 		echo $this->Type_model->delete_row(array('tid'=>$tid))	?	1	:	0;
 	}

 	public function edit()
 	{
 		if(!@$_GET['tid'])return false;

 		$tid = $this->input->get('tid');

 		$tpl_data['arr'] = $this->Type_model->get_row(array('tid'=>$tid));


 		$this->load->view('type_edit',$tpl_data);
 	}

 	public function updateRow()
	{

		$condition['tid'] = $this->input->post('tid');

		$oldname = isset($_POST['oldname'])	?	trim($_POST['oldname'])	:	'';

		$data = $this->getData('post',array('name','status','flag'));

		$col = $this->Type_model->get_col('name');



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
				$this->message_fail(site_url('type/edit').'?tid='.$condition['tid'],'该分类已存在,请重试!',3);
				return false;
			}
		}

		$this->load->library('upload');
		if(!$this->upload->do_upload('img'))
		{
			$this->message_fail(site_url('type/edit').'?tid='.$condition['tid'],$this->upload->display_errors(),3);
			return false;
		}
		else
		{
			$success = $this->upload->data();
			$data['img'] = $success['file_name'];
		}

		if($this->Type_model->update_row($condition,$data))
		{
			//成功
			$this->message_succ(site_url('type/edit').'?tid='.$condition['tid']);
		}
		else
		{
			//失败
			$this->message_fail(site_url('type/edit').'?tid='.$condition['tid']);
		}
	}
 }