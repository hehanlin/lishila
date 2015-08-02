<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin <[china.hehanlin@gmail.com]>
 * @time(2015/05/24)
 */

class Q_type_model extends CI_Model {

	const TBL = 'type';

	public function getTypeList($limit = 4,$offset = 0)
	{
		return $this->db->limit($limit,$offset)
						->get(self::TBL)
						->result_array();
	}
}