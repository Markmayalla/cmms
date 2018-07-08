<?php
    class Automation_Model extends CI_model{
        public function select_assets(){
            $sql = "SELECT * FROM organizations_has_assets as ass WHERE EXISTS (SELECT * FROM requests as req   
                    WHERE ass.assets_id = req.organizations_has_assets_assets_id AND ass.organizations_id = req.organizations_has_assets_organizations_id)
                    AND (ass.due_date < CURRENT_DATE OR ass.due_date = CURRENT_DATE)";
            
            $sql2 = "SELECT org.organizations_id as org, acc.id as account FROM  (( organizations_has_users as org INNER JOIN users as us ON us.id = org.users_id) INNER JOIN accounts as acc ON acc.user_id = us.id)";
            $res2 = $this->db->query($sql2)->result();
            $res = $this->db->query($sql)->result_array();
            $orgdata = array();
            $data['success'] = false;
            foreach($res2 as $r){
                $orgdata[$r->org] = $r->account;
                //$data['success'] = true;
            }

            $sent_data = array();
            $i = 0;
            foreach($res as $t){
                $org = $t['organizations_id'];
                $sent_data[$i]['organizations_has_assets_organizations_id'] = $t['organizations_id'];
                $sent_data[$i]['organizations_has_assets_assets_id'] = $t['assets_id'];
                $sent_data[$i]['description'] = $t['due_date'];
                $sent_data[$i]['accounts_id'] = $orgdata[$org];
                $sent_data[$i]['status'] = 'pending';
                $data['success'] = true;
                
                $i++;
                $data['sms_back'] = "Assets on Due date are " . $i;
            }
            $data['assets'] = $sent_data;
            echo json_encode($data);
        }


        public function select_worker_on_date($date,$limit){
            $sql = "SELECT * FROM workers WHERE id NOT IN (SELECT tasks.workers_id FROM tasks WHERE date_start <= '$date' && date_end >= '$date')";
            $res = $this->db->query($sql)->result();
            return $res;
        }


        public function insert_task(){

        }
    }
?>