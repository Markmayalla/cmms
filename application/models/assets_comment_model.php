<?php
    class assets_comment_model extends MY_Model{
        public function finish($data){
            $this->assets_comment_model->insert($data);
            $this->task_updated($data['task_id']);
        }

        public function task_updated($a){
            $select = "UPDATE organizations_has_assets SET due_date = DATE_ADD(due_date, INTERVAL 1 YEAR) WHERE assets_id IN (SELECT organizations_has_assets_assets_id FROM requests WHERE id IN (SELECT requests_id FROM tasks WHERE id = '$a') AND organizations_has_assets.organizations_id = requests.organizations_has_assets_assets_id) ";
            $this->db->query($select);
        }
    }
?>