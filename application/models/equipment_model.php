<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 14/05/2018
 * Time: 13:52
 */

class equipment_model extends MY_Model {
    public function select_tasked_equipment($id){
        $sql = "SELECT * FROM equipments WHERE equipment_id NOT IN (SELECT equipments_id FROM tasks_has_equipments WHERE tasks_id = '$id') AND quantity > 0 AND state = 'show'";
        return $this->db->query($sql)->result();
    }

    public function update_equipment_number($number,$id){
        $this->db->query("UPDATE equipments SET quantity = quantity + '$number' WHERE equipment_id = '$id'");
    }
}