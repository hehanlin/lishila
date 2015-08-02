<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 author:ldp
 time:2015/05/08
*/

class Test_controller extends AM_Controller {


	public function index()
	{
		$result = $this->uri->segment(3);
		echo $result;
	}
}
