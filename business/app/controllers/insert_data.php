<?php 
/**
@author:ldp
time:2015/5/9
循环插入数据，测试用
*/
class Insert_data extends CI_Controller
{
	public function index(){
		$data = array(
               'id' => NULL ,
               'username' => 'remainer' ,
               'password' => 'admin',
               'email' => 'remainer@163.com'
            );
		$this->load->database();
		// $arr = $this->db->get('admin')->result_array();
		// var_dump($arr);
		$this->benchmark->mark('dog');
		for($i=0; $i<200; $i++){
			$this->db->insert('admin',$data);
			var_dump($i);	
		}
		$this->benchmark->mark('cat');
		echo $this->benchmark->elapsed_time('dog', 'cat');
	}
}