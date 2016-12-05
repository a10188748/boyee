<?php
class Login extends CI_Model { 
      public function __construct() 
      {
            parent::__construct();
      }
 
      public function getdata() 
      {
            $query = $this->db->get('admin');
            return $query;
      }
      public function getmember($member,$password)
      {
      	$sql = "SELECT * FROM admin WHERE account = ? ";
		$memberbool = $this->db->query($sql, $member);
		if($memberbool->result())
		{
			$sql1 = "SELECT * FROM admin WHERE account = ?AND password = ? ";
			$memberbool1 = $this->db->query($sql1, array($member,$password));
			if($memberbool1->result())
			{
			return $memberbool1->result_array();
			}
			else
			{
			return 1;
			}
		}
		else 
		{
			return 0;
		}
      }
      
}

?>