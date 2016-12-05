<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertpage extends CI_Controller {

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
		$this->data = $this->session->userdata('nickname');
		$path = $this->config->item('base_url');
		if($this->session->userdata('login')!='true')
    	{
    		header('Location:'.$path.'/welcome');
    	}
    	$this->load->model('info/board');
    	$data= $this->board->getboard($this->session->userdata('nickname'));
		$this->load->view('/insertpage/insert',$data);
		require("public/assets/js/common.php");
	}
	public function member()
	{
		$this->load->view('/insertpage/member');

	}
	public function opening()
	{
		$infojson = $this->input->post("json");
		$wintype = $this->input->post("wintype");
		$info = json_decode($infojson,true);
		
		if(!in_array($wintype, array("1","2","3","4","5","6","7","8","9","10","11","12",)))
		{
			$json = array('status' => 'no');
			echo json_encode($json);
			exit;
		}
		if($wintype == 1)
		{
			$typeary = 	array("莊");
		}
		if($wintype == 2)
		{
			$typeary = 	array("閒");
		}
		if($wintype == 3)
		{
			$typeary = 	array("和");
		}
		if($wintype == 4)
		{
			$typeary = 	array("莊","莊對","閒對");
		}
		if($wintype == 5)
		{
			$typeary = 	array("莊","莊對");
		}
		if($wintype == 6)
		{
			$typeary = 	array("莊","閒對");
		}
		if($wintype == 7)
		{
			$typeary = 	array("閒","莊對","閒對");
		}
		if($wintype == 8)
		{
			$typeary = 	array("閒","莊對");
		}
		if($wintype == 9)
		{
			$typeary = 	array("閒","閒對");
		}
		if($wintype == 10)
		{
			$typeary = 	array("和","莊對","閒對");
		}
		if($wintype == 11)
		{
			$typeary = 	array("和","莊對");
		}
		if($wintype == 12)
		{
			$typeary = 	array("和","閒對");
		}
		$this->load->model('info/odds');
		$odds= $this->odds->getodds();
		$winary = array();
		$j = 0;
		foreach ($info as $key ) {
			$a = $key["a"];
			$b = $key["b"];
			$c = $key["c"];
			$d = $key["d"];
			$e = $key["e"];
			$aodds = 0;
			$bodds = 0;
			$codds = 0;
			$dodds = 0;
			$eodds = 0;
			$type = array();
			$i = 0;
			
			// 拉出有用到的賠率
			foreach ($odds as $key => $value) {
				if(in_array($value['type'], $typeary))
				{
					$type[$i] = ($odds[$key]);
					$i++;
				}
			}
			// 在賠率內的乘上賠率  
			foreach ($type as $key => $value) {
				if($value['type'] == "莊")
				{
					$aodds = $a*$value["odds"];
				}
				if($value['type'] == "閒")
				{
					$bodds = $b*$value["odds"];
				}
				if($value['type'] == "和")
				{
					$codds = $c*$value["odds"];
				}
				if($value['type'] == "莊對")
				{
					$dodds = $d*$value["odds"];
				}
				if($value['type'] == "閒對")
				{
					$eodds = $e*$value["odds"];
				}
			}
			$win = 0;
			if($aodds == 0)
			{
				$win = $win-$a;
			}
			else
			{
				$win = $win+$aodds;
			}
			if($bodds == 0)
			{
				$win = $win-$b;
			}
			else
			{
				$win = $win+$bodds;
			}
			if($codds == 0)
			{
				$win = $win-$c;
			}
			else
			{
				$win = $win+$codds;
			}
			if($dodds == 0)
			{
				$win = $win-$d;
			}
			else
			{
				$win = $win+$dodds;
			}
			if($eodds == 0)
			{
				$win = $win-$e;
			}
			else
			{
				$win = $win+$eodds;
			}
			$winary[$j] = $win;
			$j++;
		}
		// $status = array();
		// $status['status'] = 'ok';
		// $returnary = array_merge($winary,$status);
		echo json_encode($winary);
	}
	public function count()
	{	
		// $typeary = array();
		// $wintype = $this->input->post("wintype");
		// if(!in_array($wintype, array("1","2","3","4","5","6","7","8","9","10","11","12",)))
		// {
		// 	$json = array('status' => 'no');
		// 	echo json_encode($json);
		// 	exit;
		// }
		// if($wintype == 1)
		// {
		// 	$typeary = 	array("莊");
		// }
		// if($wintype == 2)
		// {
		// 	$typeary = 	array("閒");
		// }
		// if($wintype == 3)
		// {
		// 	$typeary = 	array("和");
		// }
		// if($wintype == 4)
		// {
		// 	$typeary = 	array("莊","莊對","閒對");
		// }
		// if($wintype == 5)
		// {
		// 	$typeary = 	array("莊","莊對");
		// }
		// if($wintype == 6)
		// {
		// 	$typeary = 	array("莊","閒對");
		// }
		// if($wintype == 7)
		// {
		// 	$typeary = 	array("閒","莊對","閒對");
		// }
		// if($wintype == 8)
		// {
		// 	$typeary = 	array("閒","莊對");
		// }
		// if($wintype == 9)
		// {
		// 	$typeary = 	array("閒","閒對");
		// }
		// if($wintype == 10)
		// {
		// 	$typeary = 	array("和","莊對","閒對");
		// }
		// if($wintype == 11)
		// {
		// 	$typeary = 	array("和","莊對");
		// }
		// if($wintype == 12)
		// {
		// 	$typeary = 	array("和","閒對");
		// }

		$member = $this->input->post("member");
		$a = $this->input->post("a");
		$b = $this->input->post("b");
		$c = $this->input->post("c");
		$d = $this->input->post("d");
		$e = $this->input->post("e");
		// $aodds = 0;
		// $bodds = 0;
		// $codds = 0;
		// $dodds = 0;
		// $eodds = 0; 
		$total = $a+$b+$c+$d+$e;
		// $type = array();
		// $i = 0;
		// $this->load->model('info/odds');
		// $odds= $this->odds->getodds();
		// // 拉出有用到的賠率
		// foreach ($odds as $key => $value) {
		// 	if(in_array($value['type'], $typeary))
		// 	{
		// 		$type[$i] = ($odds[$key]);
		// 		$i++;
		// 	}
		// }
		// // 在賠率內的乘上賠率  
		// foreach ($type as $key => $value) {
		// 	if($value['type'] == "莊")
		// 	{
		// 		$aodds = $a*$value["odds"];
		// 	}
		// 	if($value['type'] == "閒")
		// 	{
		// 		$bodds = $b*$value["odds"];
		// 	}
		// 	if($value['type'] == "和")
		// 	{
		// 		$codds = $c*$value["odds"];
		// 	}
		// 	if($value['type'] == "莊對")
		// 	{
		// 		$dodds = $d*$value["odds"];
		// 	}
		// 	if($value['type'] == "閒對")
		// 	{
		// 		$eodds = $e*$value["odds"];
		// 	}
		// }
		// $win = 0;
		// if($aodds == 0)
		// {
		// 	$win = $win-$a;
		// }
		// else
		// {
		// 	$win = $win+$aodds;
		// }
		// if($bodds == 0)
		// {
		// 	$win = $win-$b;
		// }
		// else
		// {
		// 	$win = $win+$bodds;
		// }
		// if($codds == 0)
		// {
		// 	$win = $win-$c;
		// }
		// else
		// {
		// 	$win = $win+$codds;
		// }
		// if($dodds == 0)
		// {
		// 	$win = $win-$d;
		// }
		// else
		// {
		// 	$win = $win+$dodds;
		// }
		// if($eodds == 0)
		// {
		// 	$win = $win-$e;
		// }
		// else
		// {
		// 	$win = $win+$eodds;
		// }
		// 庄(a),庄對(c)贏
		$json = array('status' => 'ok',
						'member' => $member,
						'a' => $a,
						'b' => $b,
						'c' => $c,
						'd' => $d,
						'e' => $e,
						'total' => $total,
						//'win' => $win
			);
		echo json_encode($json);  

	}
	public function showform(){

		
		$this->load->model('info/memberinfo');
		$data['form'] = $this->memberinfo->getmember("",$this->session->userdata('nickname'));
		$this->load->view('/insertpage/show',$data);
		require("public/assets/js/common.php");

	}
	public function insertform(){

		$infojson = $this->input->post("json");
		$win = $this->input->post("win");
		$info = json_decode($infojson,true);
		$i = 0;
		$board = array();
		$this->load->model('info/memberinfo');
		$this->load->model('info/board');
		$this->data = $this->session->userdata('nickname');
		// $this->load->model('admin/login');
		// $membool= $this->login->getmember($member,$password);
		foreach ($info as $key =>$value) {
			$board[$key] = array_merge($info[$key],array("win" =>$win[$key]));
			$member= $value["member"];
			$membool = $this->memberinfo->getmember($member,$this->session->userdata('nickname'));
			$oldwin = $membool['win'];
			$oldlose = $membool['lose'];
			if(empty($membool))
			{
				$this->memberinfo->insertmember($member,$this->session->userdata('nickname'));
				if($win[$i]>0)
				{
					$this->memberinfo->insertwin($win[$i],0,$member);
				}
				if($win[$i]<0)
				{
					$this->memberinfo->insertwin(0,0-$win[$i],$member);
				}

			}
			else
			{
				
				if($win[$i]>0)
				{
					$this->memberinfo->insertwin($win[$i]+$oldwin,$oldlose,$member);
				}
				if($win[$i]<0)
				{
					$this->memberinfo->insertwin($oldwin,$oldlose+(0-$win[$i]),$member);
				}				
			}
			$i++;
		}
		$data= $this->board->getboard($this->session->userdata('nickname'));
		$boardjson = json_encode($board);
		$boardjson = addslashes($boardjson);
		$this->board->insertboard($boardjson,$this->session->userdata('nickname'),isset($data["num"]) ? $data["num"]+1 : 1);
		$status = "ok";
		echo json_encode($status);
	}
	public function deleteboard()
	{
		$this->load->model('info/board');
		$this->board->deleteboard($this->session->userdata('nickname'));
		$this->load->model('info/memberinfo');
		$this->memberinfo->deletemember($this->session->userdata('nickname'));
		$status = "ok";
		echo json_encode($status);
	}
}
