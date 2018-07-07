<?php
	class CounterValue{
		public $result;
		public $result_dashboard;
		private $countedTable;
		public function __construct(){
			$this->CI=& get_instance();
			$this->CI->load->database('default');	

			$arra = array('users' => 'users','tasks' => 'tasks','organizations' => 'organizations','requests' => 'requests');
			$this->initiateValue($arra);
			$this->counterDataAll();
		}
		
		function initiateValue($arrayCounted){
			$this->countedTable = $arrayCounted;
		}
		function counterDataAll(){
			foreach($this->countedTable as $key => $value){
				$this->CI->db->select("count(*) as " . $value);
				$data = $this->CI->db->get($key)->result();
				foreach($data as $datas){
					$num = (array)$datas;
					$this->result[$key] = $num[$value];
				}
			}
		}
		
		public function countedDashboard(){
			$tables = array('tasks' => array('pending','scheduled','complete','suspended'),'requests' => array('suspended','pending','scheduled','complete'));
			foreach($tables as $table => $values){
				$this->CI->db->select('count(*) as '.$table);
				$i = $this->CI->db->get($table)->result()[0]->$table;
				$this->result_dashboard[$table]['total'] = $i;
				foreach($values as $value){
					$this->CI->db->select('count(*) as '.$value);
					$this->CI->db->where('status',$value);
					
					$i = $this->CI->db->get($table)->result()[0]->$value;
					$this->result_dashboard[$table][$value] = $i;
				}
			}
		}
	}
?>