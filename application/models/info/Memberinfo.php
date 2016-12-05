<?php
class Memberinfo extends CI_Model { 
      public function __construct() 
      {
            parent::__construct();
      }
 
      public function getdata() 
      {
            $query = $this->db->get('admin');
            return $query;
      }
      public function getmember($member = "",$group)
      {
            if($member == "")
            {
                  $sql = "SELECT * FROM `member` WHERE `group` = \"$group\"";
                  return $this->db->query($sql)->result_array();
            }
            else
            {
            	$sql = "SELECT * FROM `member` WHERE `nickname` = \"$member\" AND `group` = \"$group\"";
      		$memberbool = $this->db->query($sql);
      		return $memberbool->row_array();
            }
		
      }
      public function insertmember($member,$group)
      {
      	$sql = "INSERT INTO `member` (`nickname`,`group`) VALUES (\"$member\",\"$group\")";
      	$this->db->query($sql);

      }
      public function insertwin($win = 0,$lose = 0,$member)
      {
            $sql = "UPDATE `member` SET `win` = $win ,`lose` = $lose WHERE `nickname` = \"$member\"";
            $this->db->query($sql);

      }
      public function deletemember($group){
            $sql = "DELETE FROM `member` WHERE `group` = '$group'";
            $this->db->query($sql);
      }
      
}

?>