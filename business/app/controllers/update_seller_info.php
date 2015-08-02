<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 author:ldp
 time:2015/05/07
*/

class Update_seller_info extends AM_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('update_seller_info_model');
	}


	public function index()
	{
		$data = $this->update_seller_info_model->get_data('t_shop',1,'*',array('nickname'=>$this->session->userdata('user')),'where');
		$this->load->view('update_seller_info_view',$data);
	}

	function do_update(){
		// var_dump($_POST);
		$user = $this->session->userdata('user');
		$truename = $_POST['truename'];
		$pwd = $_POST['pwd'];
		$address = $_POST['address'];
		$tel = $_POST['tel'];
		$desc = $_POST['desc'];
		$img = $this->do_update_img();
		$data = array();
		if($truename != '' || strlen(trim($truename)) != 0)
			$data['truename'] = $truename;
		if($pwd != '' || strlen(trim($pwd)) != 0)
			$data['password'] = $pwd;
		if($address != '' || strlen(trim($address)) != 0)
			$data['address'] = $address;
		if($tel != '' || strlen(trim($tel)) != 0)
			$data['tel'] = $tel;
		if($desc != '' || strlen(trim($desc)) != 0)
			$data['desc'] = $desc;
		if($img != '' || strlen(trim($img)) != 0)
			$data['img'] = $img;
		$condition = array('nickname'=>$this->session->userdata('user'));
		$rs = $this->update_seller_info_model->updateRow('t_shop',$condition,$data);
		$this->index();
	}

	function do_update_img()
	{
		$config['upload_path'] = './data/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '512';
		$config['encrypt_name'] = TRUE;


		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('sellerimg'))
		{

			return false;
		}
		else
		{
			 $success = $this->upload->data();
			 return $success['file_name'];
		}
	} 
}