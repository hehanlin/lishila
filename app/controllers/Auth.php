<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin
 * @time(2015/05/18)
 */
 
 class Auth extends AM_Controller {

 	public function __construct()
 	{
 		parent::__construct();

 		$this->load->model('Auth_model');
 	}

 	public function add()
 	{
 		$this->load->view('auth_add');
 	}

 	public function insertRow()
 	{
 		$data = $this->getData('post',array('name','info','status'));

 		$col = $this->Auth_model->get_col('name');


 		foreach($col as $val)
 		{
 			if($data['name'] == $val['name'])
 			{
 				$this->message_fail(site_url('auth/add'),'权限重复，请重试！',3);
 				return false;
 			}
 		}

 		if($this->Auth_model->insert_row($data))
 		{
 			$this->message_succ(site_url('auth/add'));
 		}
 		else
 		{
 			$this->message_fail(site_url('auth/add'));
 		}
 	}

 	public function manage()
 	{
 		//获取get参数
 		$searchNick = isset($_GET['name']) ? trim($_GET['name']) : "";
 		$searchTrue = isset($_GET['info']) ? trim($_GET['info']) : "";
 		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;
 		

 		$condition = array();
 		if($searchNick !== "") $condition['name'] = $searchNick;
 		if($searchTrue !== "") $condition['info'] = $searchTrue;
 		
 		$offset = ($curPage-1)*PAGENUM;

 		$res = $this->Auth_model->get_rows($condition,$limit = PAGENUM,$offset);

 		$tpl_data['list'] = $res['data'];


 		//分页类配置
 		$this->load->library('pagination');
 		$configPage['base_url'] 	= site_url('auth/manage').'?name=' . $searchNick . '&info=' . $searchTrue;
 		if(empty($condition))
 		{
 			$configPage['total_rows'] 	= $this->Auth_model->count_row();
 		}
 		else
 		{
 			$configPage['total_rows'] 	= $res['num_rows']; 
 		}
 		$configPage['per_page'] 	= PAGENUM; 
 		$configPage['cur_page']  	= $curPage;
 		
 		$this->pagination->initialize($configPage); 
 		$tpl_data['page'] = $this->pagination->create_links();

 		$this->load->view('auth_manage',$tpl_data);
 	}

 	public function see()
 	{
 		//获取get参数
 		$searchNick = isset($_GET['name']) ? trim($_GET['name']) : "";
 		$searchTrue = isset($_GET['info']) ? trim($_GET['info']) : "";
 		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;
 		

 		$condition = array();
 		if($searchNick !== "") $condition['name'] = $searchNick;
 		if($searchTrue !== "") $condition['info'] = $searchTrue;
 		
 		$offset = ($curPage-1)*PAGENUM;

 		$res = $this->Auth_model->get_rows($condition,$limit = PAGENUM,$offset);

 		$tpl_data['list'] = $res['data'];


 		//分页类配置
 		$this->load->library('pagination');
 		$configPage['base_url'] 	= site_url('auth/see').'?name=' . $searchNick . '&info=' . $searchTrue;
 		if(empty($condition))
 		{
 			$configPage['total_rows'] 	= $this->Auth_model->count_row();
 		}
 		else
 		{
 			$configPage['total_rows'] 	= $res['num_rows']; 
 		}
 		$configPage['per_page'] 	= PAGENUM; 
 		$configPage['cur_page']  	= $curPage;
 		
 		$this->pagination->initialize($configPage); 
 		$tpl_data['page'] = $this->pagination->create_links();

 		$this->load->view('auth_see',$tpl_data);
 	}

 	public function deleteRow()
 	{
 		$aid = $this->input->get('aid')	;

 		echo $this->Auth_model->delete_row(array('aid'=>$aid))	?	1	:	0;
 	}


 	//显示编辑页面
 	public function edit()
 	{
 		if(!@$_GET['aid'])return false;

 		$aid = $this->input->get('aid');

 		$tpl_data['arr'] = $this->Auth_model->get_row(array('aid'=>$aid));


 		$this->load->view('auth_edit',$tpl_data);
 	}

 	public function updateRow()
	{

		$condition['aid'] = $this->input->post('aid');

		$oldname = isset($_POST['oldname'])	?	trim($_POST['oldname'])	:	'';

		$data = $this->getData('post',array('name','info','status'));

		$col = $this->Auth_model->get_col('name');



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
				$this->message_fail(site_url('auth/edit').'?aid='.$condition['aid'],'权限重复，请重试！',3);
				return false;
			}
		}
		
		if($this->Auth_model->update_row($condition,$data))
		{
			//成功
			$this->message_succ(site_url('auth/edit').'?aid='.$condition['aid']);
		}
		else
		{
			//失败
			$this->message_fail(site_url('auth/edit').'?aid='.$condition['aid']);
		}
	}


 }