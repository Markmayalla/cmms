<?php
	class CounterValue{
		public $result;
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
		
	}
?>