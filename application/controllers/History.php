<?php
class History extends CI_Controller {

	protected $adminname;
    protected $path;

	public function index() {
		$this->checksession();

		// $this->adminname = $this->session->userdata('nickname');
		// $this->path = $this->config->item('base_url');
		
		// if($this->session->userdata('login')!='true')
  //   	{
  //   		header('Location:'.$path.'/welcome');
  //   	}
		// include("public/assets/js/betting.php");
	}
	public function selecthistory() {
		$this->checksession();
		ini_set('date.timezone','Asia/Shanghai');
		$starttime = $this->input->post("start");
		$endtime = $this->input->post("end");
		$this->load->model('history/gethistory');

		$ary = $this->gethistory->getbettotal($this->adminname,$starttime,$endtime);
		foreach ($ary as $key => $value) {
			if(empty($value)){
				$ary[$key] = 0;
			}
		}
		echo json_encode($ary);


	}
	public function checksession() {
		session_start();
		$this->adminname =  $_SESSION['nickname'];

		$this->path = $this->config->item('base_url');
		
		if(empty($_SESSION['login']))
    	{
    		header('Location:'.$path.'/welcome');
    	}
	}

}