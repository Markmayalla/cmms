<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:44
 */

class asset_model extends MY_Model {
	public function select(){
		$this->db->select("a.id as ass_id,a.name as ass_name, a.Model_Number as ass_m_n,o.id as org_id, o.name as org_name");
		$this->db->join('organizations as o', 'a.organizationId = o.id','inner');
		$this->db->group_by("a.name");
		$this->db->from("assets as a");
		return $this->get_all();
	}
}