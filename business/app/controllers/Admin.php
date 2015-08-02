<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @author hehanlin
 * @time:2015/05/07
 */

class Admin extends AM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Admin_model');
		
		//每页条数
		$this->page_size = config_item('page_size');
	}

	//显示用户信息页面
	public function index()
	{
		if(!@$_GET['uid'])return false;

		$uid = $this->input->get('uid');


		$tpl_data['arr'] = $this->Admin_model->get_row(array('uid'=>$uid));

		$tpl_data['arr']['auth'] = explode(',', $tpl_data['arr']['auth']);

		//获取auth表中的数据
		$tpl_data['aidAndInfo'] = $this->Admin_model->get_other_list('auth');

		$this->load->view('admin_edit',$tpl_data);
	}


	//显示添加用户页面
	public function add()
	{
		$tpl_data['aidAndInfo'] = $this->Admin_model->get_other_list('t_auth');

		$this->load->view('admin_add',$tpl_data);
	}

	//显示管理用户页面
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

		$res = $this->Admin_model->get_rows($condition,$limit = PAGENUM,$offset);

		$tpl_data['list'] = $res['data'];


		//分页类配置
		$this->load->library('pagination');
		$configPage['base_url'] 	= site_url('admin/manage').'?nickname=' . $searchNick . '&truename=' . $searchTrue;
		if(empty($condition))
		{
			$configPage['total_rows'] 	= $this->Admin_model->count_row();
		}
		else
		{
			$configPage['total_rows'] 	= $res['num_rows']; 
		}
		$configPage['per_page'] 	= PAGENUM; 
		$configPage['cur_page']  	= $curPage;
		
		$this->pagination->initialize($configPage); 
		$tpl_data['page'] = $this->pagination->create_links();
		
		$this->load->view('admin_manage',$tpl_data);
	}

	//显示查看用户页面
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

				$res = $this->Admin_model->get_rows($condition,$limit = PAGENUM,$offset);

				$tpl_data['list'] = $res['data'];


				//分页类配置
				$this->load->library('pagination');
				$configPage['base_url'] 	= site_url('admin/see').'?nickname=' . $searchNick . '&truename=' . $searchTrue;
				if(empty($condition))
				{
					$configPage['total_rows'] 	= $this->Admin_model->count_row();
				}
				else
				{
					$configPage['total_rows'] 	= $res['num_rows']; 
				}
				$configPage['per_page'] 	= PAGENUM; 
				$configPage['cur_page']  	= $curPage;
				
				$this->pagination->initialize($configPage); 
				$tpl_data['page'] = $this->pagination->create_links();
				
				
				
				

				$this->load->view('admin_see',$tpl_data);
	}

	//显示编辑页面
	public function edit()
	{
		if(!@$_GET['uid'])return false;

		$uid = $this->input->get('uid');

		$tpl_data['arr'] = $this->Admin_model->get_row(array('uid'=>$uid));

		$tpl_data['arr']['auth'] = explode(',', $tpl_data['arr']['auth']);

		//获取auth表中的数据
		$tpl_data['aidAndInfo'] = $this->Admin_model->get_other_list('auth');
		$this->load->view('admin_edit',$tpl_data);
	}

	public function insertRow()
	{
		$nickname = $this->input->post('nickname');

		$col = $this->Admin_model->get_col('nickname');

		//如果昵称重复,打回去,
		foreach ($col as $val) 
		{
			if($nickname == $val['nickname'])
			{
				$this->message_fail(site_url('admin/add'),'该昵称已被其他用户使用,请重试!',3);
				return false;
			}
		}
		

			//接收用户数据
		$data = $this->getData('post',array('nickname','truename','password','status','auth'));

			if(isset($data['auth'])){$data['auth'] = implode(",",$data['auth']);} 

		if($this->Admin_model->insert_row($data))
		{
			//成功
			$this->message_succ(site_url('Admin/add'));
		}
		else
		{
			//失败
			$this->message_fail(site_url('Admin/add'));
		}
		
	}
	//删除记录
	public function deleteRow()
	{
		$uid = $this->input->get('uid')	;

		echo $this->Admin_model->delete_row(array('uid'=>$uid))	?	1	:	0;
	}

	//更新记录
	public function updateRow()
	{

		$condition['uid'] = $this->input->post('uid');

		$oldname = isset($_POST['oldname'])	?	trim($_POST['oldname'])	:	'';

		$data = $this->getData('post',array('nickname','truename','password','status','auth'));

		$col = $this->Admin_model->get_col('nickname');



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
				$this->message_fail(site_url('admin/edit').'?uid='.$condition['uid'],'该昵称已被其他用户使用,请重试!',3);
				return false;
			}
		}
		

		if(isset($data['auth'])){$data['auth'] = implode(",",$data['auth']);}

		if($this->Admin_model->update_row($condition,$data))
		{
			//成功
			$this->message_succ(site_url('Admin/edit').'?uid='.$condition['uid']);
		}
		else
		{
			//失败
			$this->message_fail(site_url('Admin/edit').'?uid='.$condition['uid']);
		}
	}
}