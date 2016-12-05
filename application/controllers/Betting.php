<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Betting extends CI_Controller {

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
	protected $adminname;
    protected $path;

	public function index()
	{
		
		$this->checksession();
// session_start();
		// $this->data = $this->session->userdata('nickname');
		  // print_r($this->session->all_userdata());
		 // $path = $this->config->item('base_url');
		// setcookie("login", "true", time()+86400);
    		//setcookie("nickname", $membool[0]['account'], time()+86400);
		// echo $_COOKIE["login"];exit;
		// if(empty($_SESSION['login']))
  //   	{
  //   		header('Location:'.$path.'/welcome');
  //   	}
		// if($this->session->userdata('login')!='true')
  //   	{
  //   		header('Location:'.$path.'/welcome');
  //   	}
    	$this->load->model('info/board');
    	//$data= $this->board->getboard($this->session->userdata('nickname'));
    	$this->load->model('member/member');
    	// $data2= $this->member->getmember("",$this->session->userdata('nickname'));
    	$data2= $this->member->getmember("",$this->adminname);
    	//$board = $this->board->getboundcount($this->session->userdata('nickname'));
    	$board = $this->board->getboundcount($this->adminname);
    	$returnary['data'] = $data2;
    	$returnary['board'] = $board;
    	//$returnary['name'] = $this->session->userdata('nickname');
    	$returnary['name'] =  $this->adminname;
    	
    	$this->load->view('/betting/betting',$returnary);

		// include("public/assets/js/betting.php");
	}


	public function insertuser()
	{
		$this->checksession();
		$membername = $this->input->post("insertuser");
		$this->load->model('member/member');
    	// $data= $this->member->addmember($membername,$this->session->userdata('nickname'));
    	$data= $this->member->addmember($membername,$this->adminname);
    	
    	echo $data;
	}
	public function deleteuser()
	{
		$this->checksession();
		$membername = $this->input->post("insertuser");
		$this->load->model('member/member');
    	// $data= $this->member->deletemember($membername,$this->session->userdata('nickname'));
    	$data= $this->member->deletemember($membername,$this->adminname);
    	if($data == 'ok')
    	{
    		$this->member->deletememberlog($membername,$this->adminname);
    	}
    	echo $data;
	}

	public function bet()
	{	
		$this->checksession();
		$start = microtime(true);
		$condition0 = array("c","C","撤");
		$condition = array("梭哈");
		$condition1 = array("莊","庄","z","Z");
		$condition2 = array("閒","闲","x","X");
		$condition3 = array("和","合","h","H");
		$condition4 = array("對子","对子","DZ","dz","dZ","Dz","D","d");
		$condition5 = array("莊對","庄對","莊对","庄对","zd","ZD","Zd","zD");
		$condition6 = array("閒對","闲對","閒对","闲对","xd","XD","Xd","xD");
		$condition7 = array("三寶","三宝","sb","SB","Sb","sB");
		$totalcondition1 = array_merge($condition5,$condition6,$condition7);
		$totalcondition2 = array_merge($condition4);
		$totalcondition3 = array_merge($condition1,$condition2,$condition3);
		$totalcondition = array_merge($totalcondition1,$totalcondition2,$totalcondition3);
		$amount1 =array("一","二","三","四","五","六","七","八","九",);
		$amo1 = array("1","2","3","4","5","6","7","8","9",);
		$amount2 = array("k","K","w","W");
		$amo2 = array("000","000","0000","0000");
		$amount3 = array("拾万","拾萬","拾","百","千","萬","万");
		$amo3 = array("100000","100000","0","00","000","0000","0000");
		
		$info = $this->input->post("insert");
		$output = explode("\n", $info);
		//清除重複名稱
		foreach ($output as $key => $value) {
			$output[$key] = trim($value);
		}
		for($i = 0 ; $i< count($output)-1 ; $i++)
		{

			if($output[$i] == $output[$i+1])
			{
				$output[$i+1] = "";
			}
		}
		$output1 = array_filter($output);
		$output = array();
		$outputcount = 0;
		foreach ($output1 as $key => $value) {
			$output[$outputcount] = $value;
			$outputcount++;
		}

		//清除重複名稱 end
		$returnjson = array();
		$countnum = 0;
		foreach ($output as $mainkey => $value) {
			// 人
			if($mainkey % 2 == 0)
			{
				$value = trim($value);
				$value = str_replace(":", "", $value);
				$name = array('name'=> $value);
			}
			// 投注
			else
			{
				$check = "";
				$echo = str_replace($totalcondition, ",", $value);
				$checkfirst2 = (explode(",",$echo));
				// 撤除
				if(in_array($checkfirst2[0], $condition0))
				{
					$betting = array('a' => 0,
									 'b' => 0,
									 'c' => 0,
									 'd' => 0,
									 'e' => 0
									);
					$returnjson[$countnum] = $name+$betting;
					$countnum ++;
				}
				//x100b200
				elseif(empty($checkfirst2[0]))
				{
					$first1 = array_filter(explode(",", $echo));
					$first2 = str_replace($first1,",", $value);			
					$first3 = array_filter(explode(",", $first2));
					foreach ($first3 as $key => $value) {
						if(!in_array($value,$totalcondition))
						{
							// $return = array('status' => 'no',
							// 				'row' => $mainkey
							// 				);
							// echo json_encode($return);
							// exit;
							$check = "no";
						}
					}
					if($check == "no")
					{
						continue;
					}
					foreach ($amount1 as $key => $value) {
						$echo = str_replace($value,$amo1[$key],$echo);
					}
					foreach ($amount2 as $key => $value) {
						$echo = str_replace($value,$amo2[$key],$echo);
					}
					foreach ($amount3 as $key => $value) {
						$echo = str_replace($value,$amo3[$key],$echo);
					}

					$echo2 = array_filter(explode(",", $echo));

					if(count($first3) != count($echo2))
					{
						$check = "no";
						// $return = array('status' => 'no',
						// 				'row' => $mainkey,
						// 				);
						// echo json_encode($return);
						// exit;
					}
					if($check == "no")
					{
						continue;
					}
					$total = array();
					$count = count($first3);
					for($i = 0 ; $i < $count ; $i++)
					{
							$total[$i*2] = $first3[$i];		
					}
					for($i = 1 ; $i <= $count ; $i++)
					{		
							$total[($i*2)-1] = $echo2[$i];		
					}
					ksort($total);
					$counttotal = count($total);
					$betting = array('a' => 0,
									 'b' => 0,
									 'c' => 0,
									 'd' => 0,
									 'e' => 0
									);
					for($i = 0 ; $i < $counttotal ; $i+=2)
					{
						if(in_array($total[$i], $condition1) ){
							if(in_array($total[$i+1], $condition))
							{
								$betting["a"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["a"] = $betting["a"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition2)){
							if(in_array($total[$i+1], $condition))
							{
								$betting["b"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["b"] = $betting["b"]+$total[$i+1];
							}	
							else
							{
								$check = "no";
							}						
						}
						if(in_array($total[$i], $condition3)){
							if(in_array($total[$i+1], $condition))
							{
								$betting["c"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["c"] = $betting["c"]+$total[$i+1];
							}
							else
							{	
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition4)){
							if(in_array($total[$i+1], $condition))
							{
								$betting["d"] = $total[$i+1];
								$betting["e"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["d"] = $betting["d"]+$total[$i+1];
								$betting["e"] = $betting["e"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition5)){
							if(in_array($total[$i+1], $condition))
							{
								$betting["d"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["d"] = $betting["d"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition6) ){
							if(in_array($total[$i+1], $condition))
							{
								$betting["e"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["e"] = $betting["e"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition7) ){
							if(in_array($total[$i+1], $condition))
							{
								$betting["c"] = $total[$i+1];
								$betting["d"] = $total[$i+1];
								$betting["e"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["c"] = $betting["c"]+$total[$i+1];
								$betting["d"] = $betting["d"]+$total[$i+1];
								$betting["e"] = $betting["e"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
					}
					if($check == "no")
					{
						continue;
					}
					$returnjson[$countnum] = $name+$betting;
					$countnum ++;
					 //print_r($returnjson);
				}

				//100x200b
				else
				{
					$echo  = array_filter(explode(",", $echo));
					 // var_dump($echo);exit;
					// var_dump($value);exit;
					foreach ($echo as $key => $index) {
						$value = str_replace($index,",",$value);
					}
					$totalvalue = array_filter(explode(",", $value));
					foreach ($amount1 as $key => $value) {
						$echo = str_replace($value,$amo1[$key],$echo);
					}
					foreach ($amount2 as $key => $value) {
						$echo = str_replace($value,$amo2[$key],$echo);
					}
					foreach ($amount3 as $key => $value) {
						$echo = str_replace($value,$amo3[$key],$echo);
					}
					if(count($totalvalue) != count($echo))
					{
						// $return = array('status' => 'no',
						// 				'row' => $mainkey,
						// 				);
						// echo json_encode($return);
						// exit;
						$check = "no";
					}
					if($check == "no")
					{
						continue;
					}
					$counttotalvalue = count($totalvalue);
					$total = array();
					// print_r($totalvalue);
					// echo "\n";
					// print_r($echo);
					// exit;
					for($i = 0 ; $i < $counttotalvalue ; $i++)
					{
							$total[$i*2] = $totalvalue[$i+1];		
					}
					for($i = 1 ; $i <= $counttotalvalue ; $i++)
					{		
							$total[($i*2)-1] = $echo[$i-1];		
					}
					ksort($total);
					$counttotal = count($total);
					$betting = array('a' => 0,
									 'b' => 0,
									 'c' => 0,
									 'd' => 0,
									 'e' => 0
									);
					for($i = 0 ; $i < $counttotal ; $i+=2)
					 {
						if(in_array($total[$i], $condition1) ){
							if(in_array($total[$i+1], $condition))
							{
								$betting["a"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["a"] = $betting["a"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition2)){
							if(in_array($total[$i+1], $condition))
							{
								$betting["b"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["b"] = $betting["b"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition3)){
							if(in_array($total[$i+1], $condition))
							{
								$betting["c"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["c"] = $betting["c"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition4)){
							if(in_array($total[$i+1], $condition))
							{
								$betting["d"] = $total[$i+1];
								$betting["e"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["d"] = $betting["d"]+$total[$i+1];
								$betting["e"] = $betting["e"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition5)){
							if(in_array($total[$i+1], $condition))
							{
								$betting["d"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["d"] = $betting["d"]+$total[$i+1];
							}
							else
							{
								$eheck = "no";
							}
						}
						if(in_array($total[$i], $condition6) ){
							if(in_array($total[$i+1], $condition))
							{
								$betting["e"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["e"] = $betting["e"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
						if(in_array($total[$i], $condition7) ){
							if(in_array($total[$i+1], $condition))
							{
								$betting["c"] = $total[$i+1];
								$betting["d"] = $total[$i+1];
								$betting["e"] = $total[$i+1];
							}
							else if(is_numeric($total[$i+1]))
							{
								$betting["c"] = $betting["c"]+$total[$i+1];
								$betting["d"] = $betting["d"]+$total[$i+1];
								$betting["e"] = $betting["e"]+$total[$i+1];
							}
							else
							{
								$check = "no";
							}
						}
					}
					if($check == "no")
					{
						continue;
					}
					$returnjson[$countnum] = $name+$betting;
					$countnum ++;
					// print_r($betting);
				}	
			}	
		}
		//計算剩餘金是否可下注
		$this->load->model('member/member');
		//$data = $this->member->getmemberpoint($this->session->userdata('nickname'));
		$data = $this->member->getmemberpoint($this->adminname);

		 // print_r($this->adminname);exit;
		  // print_r($returnjson);
		foreach ($data as $key => $memberinfo) {
			foreach ($returnjson as $key2 => $info) {
				if($memberinfo["nickname"] == $info["name"])
				{
					//計算總下注(扣除梭哈)
					$totalvalue = 0;
					if($info["a"] != "梭哈")
					{
						$totalvalue = $totalvalue+$info["a"];
					}
					if($info["b"] != "梭哈")
					{
						$totalvalue = $totalvalue+$info["b"];
					}
					if($info["c"] != "梭哈")
					{
						$totalvalue = $totalvalue+$info["c"];
					}
					if($info["d"] != "梭哈")
					{
						$totalvalue = $totalvalue+$info["d"];
					}
					if($info["e"] != "梭哈")
					{
						$totalvalue = $totalvalue+$info["e"];
					}


					if($memberinfo["end_point"] < $totalvalue)
					{
						unset($returnjson[$key2]);
					}
					else if($memberinfo["end_point"] == $totalvalue)
					{
						if($info["a"] === "梭哈")
						{
							//$returnjson[$key2]["a"] = 0;
							unset($returnjson[$key2]);
						}
						if($info["b"] === "梭哈")
						{
							//$returnjson[$key2]["b"] = 0;
							unset($returnjson[$key2]);
						}
						if($info["c"] === "梭哈")
						{
							//$returnjson[$key2]["c"] = 0;
							unset($returnjson[$key2]);
						}
						if($info["d"] === "梭哈")
						{
							//$returnjson[$key2]["d"] = 0;
							unset($returnjson[$key2]);
						}
						if($info["e"] === "梭哈")
						{
							//$returnjson[$key2]["e"] = 0;
							unset($returnjson[$key2]);
						}

					}
					else
					{
						$soha = 0;
						if($info["a"] === "梭哈")
						{
							$returnjson[$key2]["a"] = $memberinfo["end_point"]-$totalvalue;
							$soha++;

						}
						if($info["b"] === "梭哈")
						{
							$returnjson[$key2]["b"] = $memberinfo["end_point"]-$totalvalue;
							$soha++;
						}
						if($info["c"] === "梭哈")
						{
							$returnjson[$key2]["c"] = $memberinfo["end_point"]-$totalvalue;
							$soha++;
						}
						if($info["d"] === "梭哈")
						{
							$returnjson[$key2]["d"] = $memberinfo["end_point"]-$totalvalue;
						}
						if($info["e"] === "梭哈")
						{
							$returnjson[$key2]["e"] = $memberinfo["end_point"]-$totalvalue;
							$soha++;
						}
						//echo $soha;
						if($soha > 1)
						{
							unset($returnjson[$key2]);
						}
					}
					//print_r($returnjson[$key2]);
				}
			}
		}
		$returnjson = array_values($returnjson);
		  // print_r($returnjson);
		$return = array('status' => 'ok',
						'array' => $returnjson,
						);
		$end = microtime(true);
		// echo $end-$start;
		echo json_encode($return);
		exit;
	}
	public function member()
	{	
		// $path = $this->config->item('base_url');
		
		// if($this->session->userdata('login')!='true')
  //   	{
  //   		header('Location:'.$path.'/welcome');
  //   	}
    	$this->checksession();
		// $returnary['name'] = $this->session->userdata('nickname');
		$returnary['name'] = $this->adminname;
		$this->load->model('member/member');
    	// $data2= $this->member->getmember("",$this->session->userdata('nickname'));
    	$data2= $this->member->getmember("",$this->adminname);
    	$returnary['data'] = $data2;
		$this->load->view('/betting/member',$returnary);
		//require("public/assets/js/common.php");
	}
	public function history() {
		// $path = $this->config->item('base_url');
		
		// if($this->session->userdata('login')!='true')
  //   	{
  //   		header('Location:'.$path.'/welcome');
  //   	}
    	$this->checksession();
		// $returnary['name'] = $this->session->userdata('nickname');
		$returnary['name'] = $this->adminname;


		$this->load->view('/betting/history',$returnary);
		//require("public/assets/js/common.php");
	}
	// public function selectboard() {
	// 	$this->load->model('info/board');
	// 	$data = $this->board->();
	// }
	public function insertuserpoint()
	{
		$this->checksession();
		ini_set('date.timezone','Asia/Shanghai');
		$date = date("Y-m-d H:i:s");
		$membername =$this->input->post('insertuser2');
		$point = $this->input->post('insertpoint');
		$this->load->model('member/member');
    	// $data= $this->member->addmemberpoint($membername,$this->session->userdata('nickname'),$point);
    	$data= $this->member->addmemberpoint($membername,$this->adminname,$point);
    	if($data == "no")
    	{
    		echo $data;
    		exit;
    	}
    	$type = "up";
    	// $this->member->insertmembercountlog($this->session->userdata('nickname'), $membername,$point,$date ,$type);
    	$this->member->insertmembercountlog($this->adminname, $membername,$point,$date ,$type);
    	echo $data;
	}
	public function deleteuserpoint()
	{
		$this->checksession();
		ini_set('date.timezone','Asia/Shanghai');
		$date = date("Y-m-d H:i:s");
		$membername =$this->input->post('insertuser2');
		$point = $this->input->post('insertpoint');
		$this->load->model('member/member');
    	// $data= $this->member->deletememberpoint($membername,$this->session->userdata('nickname'),$point);
    	$data= $this->member->deletememberpoint($membername,$this->adminname,$point);
    	if($data == "no" || $data == "no1" || $data == "no2")
    	{
    		echo $data;
    		exit;
    	}
    	$type = "down";
    	// $this->member->insertmembercountlog($this->session->userdata('nickname'), $membername,$point,$date ,$type);
    	$this->member->insertmembercountlog($this->adminname, $membername,$point,$date ,$type);
    	echo $data;
	}
	public function countresult()
	{
		// $num =$this->input->post('num');
		// if(!in_array($num, array("1","2","3","4","5","6","7","8","9","10","11","12",)))
		// {
		// 	$json = array('status' => 'no');
		// 	echo json_encode($json);
		// 	exit;
		// }
		$bet1 = $this->input->post('bet1');
		$bet2 = $this->input->post('bet2');
		$bet3 = $this->input->post('bet3');
		$infoary = $this->input->post('infoary');
		$num = 0;
		// 客戶又改需求....so 再轉一次
		if($bet1 == 1 && $bet2 == 0 && $bet3 == 0)
		{
			$num = 1;
		}
		if($bet1 == 2 && $bet2 == 0 && $bet3 == 0)
		{
			$num = 2;
		}
		if($bet1 == 3 && $bet2 == 0 && $bet3 == 0)
		{
			$num = 3;
		}
		if($bet1 == 1 && $bet2 == 1 && $bet3 == 1)
		{
			$num = 4;
		}
		if($bet1 == 1 && $bet2 == 1 && $bet3 == 0)
		{
			$num = 5;
		}
		if($bet1 == 1 && $bet2 == 0 && $bet3 == 1)
		{
			$num = 6;
		}
		if($bet1 == 2 && $bet2 == 1 && $bet3 == 1)
		{
			$num = 7;
		}
		if($bet1 == 2 && $bet2 == 1 && $bet3 == 0)
		{
			$num = 8;
		}
		if($bet1 == 2 && $bet2 == 0 && $bet3 == 1)
		{
			$num = 9;
		}
		if($bet1 == 3 && $bet2 == 1 && $bet3 == 1)
		{
			$num = 10;
		}
		if($bet1 == 3 && $bet2 == 1 && $bet3 == 0)
		{
			$num = 11;
		}
		if($bet1 == 3 && $bet2 == 0 && $bet3 == 1)
		{
			$num = 12;
		}
		if($num == 0)
		{
			$json = array('status' => 'no');
		 	echo json_encode($json);
		 	exit;
		}
		// 轉換完畢.....
		if($num == 1)
		{
			$typeary = 	array("莊");
		}
		if($num == 2)
		{
			$typeary = 	array("閒");
		}
		if($num == 3)
		{
			$typeary = 	array("和");
		}
		if($num == 4)
		{
			$typeary = 	array("莊","莊對","閒對");
		}
		if($num == 5)
		{
			$typeary = 	array("莊","莊對");
		}
		if($num == 6)
		{
			$typeary = 	array("莊","閒對");
		}
		if($num == 7)
		{
			$typeary = 	array("閒","莊對","閒對");
		}
		if($num == 8)
		{
			$typeary = 	array("閒","莊對");
		}
		if($num == 9)
		{
			$typeary = 	array("閒","閒對");
		}
		if($num == 10)
		{
			$typeary = 	array("和","莊對","閒對");
		}
		if($num == 11)
		{
			$typeary = 	array("和","莊對");
		}
		if($num == 12)
		{
			$typeary = 	array("和","閒對");
		}
		$this->load->model('info/odds');
		$odds= $this->odds->getodds();
		$winary = array();
		$j = 0;
		//print_r($infoary);
		foreach ($infoary as $key => $value) {
			$id = $value[0];
			$a = $value[1];
			$b = $value[2];
			$c = $value[3];
			$d = $value[4];
			$e = $value[5];
			$aodds = 0;
			$bodds = 0;
			$codds = 0;
			$dodds = 0;
			$eodds = 0;
			$win = 0;
			$type = array();
			$i = 0;
			// 拉出有用到的賠率
			foreach ($odds as $key => $value2) {
				if(in_array($value2['type'], $typeary))
				{
					$type[$i] = ($odds[$key]);
					$i++;
				}
			}
			// 在賠率內的乘上賠率  
			foreach ($type as $key => $value) {
				if($value['type'] == "莊")
				{
					$aodds = ceil($a*$value["odds"]);
				}
				if($value['type'] == "閒")
				{
					$bodds = ceil($b*$value["odds"]);
				}
				if($value['type'] == "和")
				{
					$codds = ceil($c*$value["odds"]);
				}
				if($value['type'] == "莊對")
				{
					$dodds = ceil($d*$value["odds"]);
				}
				if($value['type'] == "閒對")
				{
					$eodds = ceil($e*$value["odds"]);
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
			$winary[$j] = array('id' => $id ,
								'win' => $win
								);
			$j++;
		}
		echo json_encode($winary);
	}
	public function saveboard(){
		$this->checksession();
		ini_set('date.timezone','Asia/Shanghai');
		$board =$this->input->post('board');
		$num = $this->input->post('num');
		$total = $this->input->post('total');
		$a = $total[0];
		$b = $total[1];
		$c = $total[2];
		$d = $total[3];
		$e = $total[4];
		if(empty($board)){
			$status = "no";
			echo json_encode($status);
			exit;
		}
		// 取得局數盤數
		$this->load->model('info/board');
		// $boarddata = $this->board->getboundcount($this->session->userdata('nickname'));
		$boarddata = $this->board->getboundcount($this->adminname);
		if($boarddata["num"] != $num)
		{
			$status =  "finish";
			echo json_encode($status);
			exit;
		}
		$boardjson = json_encode($board);
		$boardjson = addslashes($boardjson);
		$this->load->model('member/member');	
		$date = date("Y-m-d H:i:s");
		// $memberdata = $this->member->getmember("",$this->session->userdata('nickname'));
		$memberdata = $this->member->getmember("",$this->adminname);
		foreach ($board as $key => $value) {
			$id = $value[0];
			if($id == "total2")
			{
				continue;
			}
			$point = $value[2];
			$countpoint = $value[3];
			$losepoint = $value[4];
			$win = 0;
			$lose = 0;
			foreach ($memberdata as $key2 => $value2) {
				if($value2["id"] == $id)
				{	
					if($point>0)
					{
						$win = $point+$value2["win"];
						$lose = $value2["lose"];
					}
					else
					{
						$win = $value2["win"];
						$lose = $losepoint;
					}
				}
			}
			
			// 更新member資訊
			// $data = $this->member->updatememberinfo($this->session->userdata('nickname'),$id,$win,$lose,$countpoint);
			$data = $this->member->updatememberinfo($this->adminname,$id,$win,$lose,$countpoint);
		}

		

		// 儲存此局
		// $this->board->saveboard($this->session->userdata('nickname'),$boarddata["game"],$boarddata["num"],$boardjson,$date);
		$this->board->saveboard($this->adminname,$boarddata["game"],$boarddata["num"],$boardjson,$date);
		// 儲存此局總下注數
		// $this->board->saveboard2($this->session->userdata('nickname'),$boarddata["game"],$boarddata["num"],$a,$b,$c,$d,$e,$date);
		$this->board->saveboard2($this->adminname,$boarddata["game"],$boarddata["num"],$a,$b,$c,$d,$e,$date);
		// 更新目前局數
		// $this->board->updateboardnumcount($this->session->userdata('nickname'),$date);
		$this->board->updateboardnumcount($this->adminname,$date);
		$status = "ok";

		echo json_encode($status);
	}
	public function setboard(){
		$this->checksession();
		ini_set('date.timezone','Asia/Shanghai');
		$date = date("Y-m-d H:i:s");
		$this->load->model('info/board');
		$type =$this->input->post('type');
		if($type == "reset"){
			// $this->board->resetboard($this->session->userdata('nickname'),$date);
			$this->board->resetboard($this->adminname,$date);
		}
		if($type == "next"){
			// $this->board->updateboardgamecount($this->session->userdata('nickname'),$date);
			$this->board->updateboardgamecount($this->adminname,$date);
		}
		$status = "ok";
		echo json_encode($status);
	}
	public function selectusercount() {
		$this->checksession();
		$name =$this->input->post('name');
		$this->load->model('member/member');
		// $data = $this->member->getmember($name,$this->session->userdata('nickname'));
		$data = $this->member->getmember($name,$this->adminname);
		// $memberlog = $this->member->selectmembercountlog($this->session->userdata('nickname'),$name);
		$memberlog = $this->member->selectmembercountlog($this->adminname,$name);
		$return = array();
		$return["memberlog"] = $memberlog;
		$return["point"] = $data["end_point"];
		$return["startpoint"] = $data["start_point"];
		echo json_encode($return);
	}
	public function setmembercount() {
		$this->checksession();
		ini_set('date.timezone','Asia/Shanghai');
		$date = date("Y-m-d H:i:s");
		$name = $this->input->post('insertuser4');
		$point = $this->input->post('membercount');
		$this->load->model('member/member');
		// $memberary = $this->member->getmember($name,$this->session->userdata('nickname'));
		$memberary = $this->member->getmember($name,$this->adminname);

		if(empty($memberary["start_point"]))
		{
			$data = "no";
			echo json_encode($data);
			exit;
		}
		if($point == $memberary["end_point"])
		{
			$data = "same";
			echo json_encode($data);
			exit;
		}
		// $this->member->updatemembercount($this->session->userdata('nickname'), $name, $point);
		$this->member->updatemembercount($this->adminname, $name, $point);
		$type = "set";
		// $this->member->insertmembercountlog($this->session->userdata('nickname'), $name,$point,$date ,$type);
		$this->member->insertmembercountlog($this->adminname, $name,$point,$date ,$type);
		$data = "ok";
		echo json_encode($data);
	}
	public function editmembername() {
		$this->checksession();
		ini_set('date.timezone','Asia/Shanghai');
		$date = date("Y-m-d H:i:s");
		$name = $this->input->post('insertuser3');
		$newname = $this->input->post('newname');
		$this->load->model('member/member');
		// $this->member->editmembername($this->session->userdata('nickname'), $name, $newname,"member");
		$this->member->editmembername($this->adminname, $name, $newname,"member");
		$type = "name";
		// $this->member->insertmembercountlog($this->session->userdata('nickname'), $name,$newname,$date ,$type);
		$this->member->insertmembercountlog($this->adminname, $name,$newname,$date ,$type);
		// $this->member->editmembername($this->session->userdata('nickname'), $name, $newname,"log");
		$this->member->editmembername($this->adminname, $name, $newname,"log");
		$data = "ok";
		echo json_encode($data);
	}
	public function checksession() {
		session_start();
		if(empty($_SESSION['nickname'])){
			$this->adminname = "";
		}
		else {
			$this->adminname = $_SESSION['nickname'];
		}
		$this->path = $this->config->item('base_url');;
		if(empty($_SESSION['login']))
    	{
    		header('Location:'.$this->path.'/welcome');
    	}
	}
}
?>