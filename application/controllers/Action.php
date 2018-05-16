<?php
	class Action extends CI_Controller {
		public function pdf(){
			$this->models_name($this->uri->segment(3));
		}
		public function print_priview(){
			echo $this->uri->segment(3);
		}
		public function excel(){
			echo $this->uri->segment(3);
		}
		public function cvs(){
			echo $this->uri->segment(3);
			
		}
		
		function models_name($data){
			if($data == 'user'){
				echo "user_model";
			}else{
				echo "unknown model";
			}
		}
	}
?>