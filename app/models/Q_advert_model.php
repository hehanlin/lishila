<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin <[china.hehanlin@gmail.com]>
 * @time(2015/05/24)
 */

class Q_advert_model extends CI_Model {

	const TBL = 'ad';

	public function getAdList($limit = 3,$offset = 0)
	{
		return $this->db->limit($limit,$offset)
						->order_by('isintro','desc')
						->get(self::TBL)
						->result_array();
	}
}