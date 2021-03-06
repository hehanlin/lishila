<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin
 * @time 2015/05/08
 */

class Advert extends AM_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Advert_model');

	}




	public function add()
	{
		$this->load->view('advert_add');
	}

	public function insertRow()
	{
		$data = array();

		$name = $this->input->post('name');

		$col = $this->Advert_model->get_col('name');



		foreach($col as $val)
 		{
 			if($name == $val['name'])
 			{
 				$this->message_fail(site_url('Advert/add'),'该广告已存在,请重试!',3);
 				return false;
 			}
 		}



		//接收用户数据
		$data = $this->getData('post',array('name','a','isintro'));

		
		//接收图片
		$this->load->library('upload');
		if(!$this->upload->do_upload('img'))
		{
			$this->message_fail(site_url('Advert/add'),$this->upload->display_errors(),3);
			return false;
		}
		else
		{
			$success = $this->upload->data();
			$data['img'] = $success['file_name'];
		} 


		if($this->Advert_model->insert_row($data))
		{
			//成功
			$this->message_succ(site_url('Advert/add'));
		}
		else
		{
			//失败
			$this->message_fail(site_url('Advert/add'));
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

 		$res = $this->Advert_model->get_rows($condition,$limit = PAGENUM,$offset);

 		$tpl_data['list'] = $res['data'];


 		//分页类配置
 		$this->load->library('pagination');
 		$configPage['base_url'] 	= site_url('advert/manage').'?name=' . $searchNick;
 		if(empty($condition))
 		{
 			$configPage['total_rows'] 	= $this->Advert_model->count_row();
 		}
 		else
 		{
 			$configPage['total_rows'] 	= $res['num_rows']; 
 		}
 		$configPage['per_page'] 	= PAGENUM; 
 		$configPage['cur_page']  	= $curPage;
 		
 		$this->pagination->initialize($configPage); 
 		$tpl_data['page'] = $this->pagination->create_links();

 		$this->load->view('advert_manage',$tpl_data);
 	}


 	public function see()
 	{
 		//获取get参数
 		$searchNick = isset($_GET['name']) ? trim($_GET['name']) : "";
 		$curPage    = isset($_GET['p']) ? trim($_GET['p']) : 1;
 		

 		$condition = array();
 		if($searchNick !== "") $condition['name'] = $searchNick;
 		
 		$offset = ($curPage-1)*PAGENUM;

 		$res = $this->Advert_model->get_rows($condition,$limit = PAGENUM,$offset);

 		$tpl_data['list'] = $res['data'];


 		//分页类配置
 		$this->load->library('pagination');
 		$configPage['base_url'] 	= site_url('advert/see').'?name=' . $searchNick;
 		if(empty($condition))
 		{
 			$configPage['total_rows'] 	= $this->Advert_model->count_row();
 		}
 		else
 		{
 			$configPage['total_rows'] 	= $res['num_rows']; 
 		}
 		$configPage['per_page'] 	= PAGENUM; 
 		$configPage['cur_page']  	= $curPage;
 		
 		$this->pagination->initialize($configPage); 
 		$tpl_data['page'] = $this->pagination->create_links();

 		$this->load->view('advert_see',$tpl_data);
 	}




 	public function deleteRow()
 	{
 		$aid = $this->input->get('aid')	;

 		echo $this->Advert_model->delete_row(array('aid'=>$aid))	?	1	:	0;
 	}

 	public function edit()
 	{
 		if(!@$_GET['aid'])return false;

 		$aid = $this->input->get('aid');

 		$tpl_data['arr'] = $this->Advert_model->get_row(array('aid'=>$aid));


 		$this->load->view('advert_edit',$tpl_data);
 	}

 	public function updateRow()
	{

		$condition['aid'] = $this->input->post('aid');

		$oldname = isset($_POST['oldname'])	?	trim($_POST['oldname'])	:	'';

		$data = $this->getData('post',array('name','isintro','a'));

		$col = $this->Advert_model->get_col('name');



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
				$this->message_fail(site_url('advert/edit').'?aid='.$condition['aid'],'该广告已存在,请重试!',3);
				return false;
			}
		}

		$this->load->library('upload');
		if(!$this->upload->do_upload('img'))
		{
			$this->message_fail(site_url('advert/edit').'?aid='.$condition['aid'],$this->upload->display_errors(),3);
			return false;
		}
		else
		{
			$success = $this->upload->data();
			$data['img'] = $success['file_name'];
		}


		if($this->Advert_model->update_row($condition,$data))
		{
			//成功
			$this->message_succ(site_url('advert/edit').'?aid='.$condition['aid']);
		}
		else
		{
			//失败
			$this->message_fail(site_url('advert/edit').'?aid='.$condition['aid']);
		}
	}

}