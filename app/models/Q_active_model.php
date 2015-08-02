<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin <[china.hehanlin@gmail.com]>
 * @time(2015/05/24)
 */


class Q_active_model extends CI_Model {


	const TBL = 'active';

	public function getActiveByAid($aid)
	{
		return  $this->db->where(array('aid'=>$aid))
						 ->get(self::TBL)
						 ->row_array();
	}

	public function getActiveListBySid($sid)
	{
		return $this->db->where(array('sid'=>$sid))
						->get(self::TBL)
						->result_array();
	}
}