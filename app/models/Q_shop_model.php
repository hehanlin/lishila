<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author hehanlin <[china.hehanlin@gmail.com]>
 * @time(2015/05/24)
 */

class Q_shop_model extends CI_Model {


	const TBL = 'shop';

	public function getShopById ($sid)
	{
		return $this->db->where(array('sid'=>$sid))
						->get(self::TBL)
						->row_array();
	}

	/**
	 * [getShopListOrderByHot description]
	 * 带分页,排序用hot,for index.html
	 * @return [type] [description]
	 */
	public function getShopListOrderByHot($limit = 4,$offset = 0)
	{
		return $this->db->limit($limit,$offset)
						->order_by('hot','desc')
						->get(self::TBL)
						->result_array();
	}


	/**
	 * [getShopListForType description]
	 *
	 * 带分页，带排序，for category.html
	 * @param  [type] $tid     [description]
	 * @param  [type] $orderBy [description]
	 * @param  [type] $limit   [description]
	 * @param  [type] $offset  [description]
	 * @return [type]          [description]
	 */
	public function getShopListForType($tid,$orderBy,$sc = 'desc',$limit = 6,$offset = 0)
	{
		return $this->db->limit($limit,$offset)
						->where(array('tid'=>$tid))
						->order_by($orderBy,$sc)
						->get(self::TBL)
						->result_array();
	}
}