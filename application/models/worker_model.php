<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:49
 */

class worker_model extends MY_Model {
    public function update_worker($id){
        $data = array('blocked' => 0);
        $this->db->where($id);
        $this->db->update('workers',$data);
    }

    public function delete_worker($id){
        $data = array('blocked' => 1);
        $this->db->where($id);
        $this->db->update('workers',$data);
    }
}