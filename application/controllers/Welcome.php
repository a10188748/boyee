<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		session_start();
		// $this->load->model('admin/login');
		// $membool= $this->login->getdata();
		//print_r($membool);


		 $path = $this->config->item('base_url');
		// if($this->session->userdata('login')=='true')
  //   	{

  //   		header('Location:'.$path.'/betting');
  //   	}
		if(!empty($_SESSION['login']))
    	{

    		header('Location:'.$path.'/betting');
    	}

		$this->load->view('/admin/login');
	}

	public function login()
	{
		session_start();
		$member = $this->input->post("member");
		$password = $this->input->post("password");
		//db
		$this->load->model('admin/login');
		$membool= $this->login->getmember($member,$password);
		if($membool == 0 )	
		{
			$json["status"] = "empty";
		}
		else if($membool == 1 )
		{
			$json["status"] = "no";
		}
		else 
		{
			//存入session  
			// $sessarr = array(
			// 	'nickname' => $membool[0]['account']
			// 	);
   //  		$this->session->set_userdata($sessarr);
   //  		$this->session->set_tempdata('login', 'true', 86400);
   //  		$this->session->set_tempdata('nickname', $membool[0]['account'], 86400);
    		// $_SESSION['cc'] = 'cc';
    		// setcookie("login", "true", time()+86400);
    		// setcookie("nickname", $membool[0]['account'], time()+86400);
   			 $_SESSION['login'] = 'true';
			 $_SESSION['nickname'] = $membool[0]['account'];
			$json["status"] = "ok";
		}
		//$json["status"] = "not";

		echo json_encode($json);
	}
	public function logout()
	{	
		// $sessarr = array(
		// 		'login',
		// 		'nickname'
		// 		);
		// $this->session->unset_userdata($sessarr);	
		session_start();	
		session_unset();

		$path = $this->config->item('base_url');
		header('Location:'.$path.'/betting');
	}
	
}
