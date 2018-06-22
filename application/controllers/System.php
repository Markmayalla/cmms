<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 12/05/2018
 * Time: 11:28
 */
include "ChromePhp.php";
class System extends CI_Controller {
	private $sess;
	private $data;
	private $profile_pic_properties = ""; 
	public function __construct(){
		parent::__construct();
		$this->sess = $this->sessionlib;
		
		$this->profile_pic_properties;
		$this->sess->startFunction($this->profile_pic_properties,true);
		$this->data = $this->sess->data_user_data;
		$this->data['counted'] = $this->countervalue->result;
		//print_r($this->data);
	}

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {

		$this->load->library("table");
		$data['template'] = array(
							'thead_open'            => '<thead>',
							'thead_close'           => '</thead>',

							'heading_row_start'     => '<tr>',
							'heading_row_end'       => '</tr>',
							'heading_cell_start'    => '<th>',
							'heading_cell_end'      => '</th>',

							'tbody_open'            => '<tbody>',
							'tbody_close'           => '</tbody>',

							'row_start'             => '<tr>',
							'row_end'               => '</tr>',
							'cell_start'            => '<td>',
							'cell_end'              => '</td>',

							'row_alt_start'         => '<tr>',
							'row_alt_end'           => '</tr>',
							'cell_alt_start'        => '<td>',
							'cell_alt_end'          => '</td>',

							'table_close'           => '</table>'
					);

		$name = "assets";
        $this->data['main_content'] = 'dash_two';
		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
        $this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
		$this->data['name'] = $name;
        $this->load->view('includes/system', $this->data);
    }

	public function view(){
		$name = $this->uri->segment(3);
        $action = $this->uri->segment(5);
        $model = $this->uri->segment(4);
        $id = $this->uri->segment(6);
        $this->perform_task($model, $action, $id);
		$this->load->library("table");
		$data['template'] = array(
							'thead_open'            => '<thead>',
							'thead_close'           => '</thead>',

							'heading_row_start'     => '<tr>',
							'heading_row_end'       => '</tr>',
							'heading_cell_start'    => '<th>',
							'heading_cell_end'      => '</th>',

							'tbody_open'            => '<tbody>',
							'tbody_close'           => '</tbody>',

							'row_start'             => '<tr>',
							'row_end'               => '</tr>',
							'cell_start'            => '<td>',
							'cell_end'              => '</td>',

							'row_alt_start'         => '<tr>',
							'row_alt_end'           => '</tr>',
							'cell_alt_start'        => '<td>',
							'cell_alt_end'          => '</td>',

							'table_close'           => '</table>'
					);

		$for_loading_data['table'] = $name;
		$for_loading_data['user_info'] = $this->data;
		$this->data['data']['display'] = $this->shareddata->models_data($for_loading_data);
		//print_r($this->data['data']);
		//die();
		$this->data['name'] = $name;
        $this->data['main_content'] = 'dash_two';
        $this->load->view('includes/system',$this->data);
	}

    private function perform_task($model, $action, $id) {
        $this->load->model($model);
        if ($action == "delete") {
            $this->{$model}->delete_rec($id);
        }
    }

    

	function model_loader($table,$data){
		if($table == 'users'){
            $this->load->model('user_model');
            $this->user_model->insert($data);
        }else if($table == 'assets'){
			$this->load->model("asset_model");
			$this->asset_model->insert($data);
        }
		else if($table == 'equipment'){
            $this->load->model('equipment_model');
            $this->equipment_model->insert($data);
        }else{
            return "unknown model";
        }
	}

    function asset_suggestions() {
        $data = $this->input->post("myData");
        $this->load->model("asset_model");
        $assets = $this->asset_model->get_many_by(array("name LIKE" => $data));

        ChromePhp::log($assets);
        echo json_encode($assets);
    }

    function add_asset() {
        foreach ($_POST as $key => $value) {
            ChromePhp::log($key . "=" . $value);
        }
        foreach ($_GET as $key => $value) {
            ChromePhp::log($key . "=" . $value);
        }
        ChromePhp::log($this->input->get("name"));
        $this->load->model("asset_model");
        $this->asset_model->insert(array("name" => $this->input->post("name"), "model_number" => $this->input->post("model")));
        ChromePhp::log("Asset Added Successfully");
    }

    function assign_asset() {
		$this->load->model('asset_model');
        $insert_id = $this->asset_model->assign_asset($_POST);
    }
	
	function request_task() {
		$this->load->model('organizations_has_asset_model');
		
		$serial_no = $this->input->post('serial_no');
		
		
        $check = $this->organizations_has_asset_model->get_by('serial_no',$serial_no);
		
		$description = $this->input->post('description');
		$orgid = $check->organizations_id;
		$asset = $check->assets_id;
		$account = $this->sess->data_user_data['accountId'];
		
		$insert = array(
				'accounts_id' => $account,
				'organizations_has_assets_organizations_id' => $orgid,
				'organizations_has_assets_assets_id' => $asset,
				'description' => $description,
				'status' => 'pending'
		);
		
		$this->load->model('request_model');
		$this->request_model->insert($insert);
    }

	
	function load_description(){
		$serial_no = $this->input->post('serial_no');
		echo $this->request_model->get_by('id',$serial_no)->description;
	}
	function add_item_to_db(){
		$data = array();
		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
            ChromePhp::log($key . "=" . $value);
        }
        foreach ($_GET as $key => $value) {
            ChromePhp::log($key . "=" . $value);
        }
		$table_name = $data['id'];
		unset($data['id']);
        ChromePhp::log($table_name);
        $this->shareddata->model_loader($table_name,$data);
		//print_r($data);
		echo $table_name . " Added Successfully";
        //ChromePhp::log($table_name . " Added Successfully");
	}

	function loadOrganizations() {
        $this->load->model("organization_model");
        $results = $this->organization_model->get_all();
        $results_json = json_encode($results);

        echo $results_json;
    }
	
	public function logout(){
		$this->sess->unsetData($this->sess->account_id);
		$this->sess->redirect_on_session_destroy();
	}
}
