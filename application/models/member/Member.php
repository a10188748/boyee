<?php
class Member extends CI_Model { 
    public function __construct() 
    {
        parent::__construct();
    }
 
    public function getdata() 
    {
        $query = $this->db->get('admin');
        return $query;
    }
    public function getmemberpoint($group)
    {
      $sql = "SELECT `nickname`,`end_point` FROM `newmember` WHERE `group` = \"$group\"";
              return $this->db->query($sql)->result_array();
    }
    public function getmember($member = "",$group)
    {
        if($member == "")
        {
              $sql = "SELECT * FROM `newmember` WHERE `group` = \"$group\"";
              return $this->db->query($sql)->result_array();
        }
        else
        {
        	$sql = "SELECT * FROM `newmember` WHERE `nickname` = \"$member\" AND `group` = \"$group\"";
  		$memberbool = $this->db->query($sql);
  		return $memberbool->row_array();
        }
		
    }
    public function addmember($member,$group)
    {
      	$sql = "SELECT * FROM `newmember` WHERE `group` = \"$group\" and `nickname` = \"$member\" ";
      	if (empty($this->db->query($sql)->result_array()))
      	{
			$sql = "INSERT INTO `newmember` (`nickname`,`group`) VALUES (\"$member\",\"$group\")";
	  		$this->db->query($sql); 
	  		return "ok";
      	}
      	else
      	{
      		return "no";
      	}
    }
    public function deletemember($member,$group)
    {
      	$sql = "SELECT * FROM `newmember` WHERE `group` = \"$group\" AND `nickname` = \"$member\" ";
      	if (empty($this->db->query($sql)->result_array()))
      	{
      		return "no";
      	}
      	else
      	{
	  		$sql = "DELETE FROM `newmember` WHERE `group` = \"$group\" AND `nickname` = \"$member\"";
	        $this->db->query($sql);
	        return "ok";
	    }
    }
    public function addmemberpoint($member,$group,$point)
    {
      $sql = "SELECT * FROM `newmember` WHERE `group` = \"$group\" AND `nickname` = \"$member\" ";
        // 沒有會員
        if (empty($this->db->query($sql)->result_array()))
        {
          return "no";
        }
        else
        {
          $sql = "SELECT `start_point`,`end_point` FROM `newmember` WHERE `group` = \"$group\" AND `nickname` = \"$member\"";
          // print_r( $this->db->query($sql)->row_array()['start_point']);exit;
          if(empty($this->db->query($sql)->row_array()['start_point']))
          {
            $sql = "UPDATE `newmember` SET `start_point` = \"$point\" ,`end_point` = \"$point\" WHERE `nickname` = \"$member\" AND `group` = \"$group\"";
            $this->db->query($sql);
            return "ok";
          }
          else
           {
              $startpoint = $point+($this->db->query($sql)->row_array()['start_point']);
              $endpoint = $point+($this->db->query($sql)->row_array()['end_point']);
              $sql = "UPDATE `newmember` SET `start_point` = \"$startpoint\", `end_point` = \"$endpoint\" WHERE `nickname` = \"$member\" AND `group` = \"$group\"";
            $this->db->query($sql);
            return "ok";
           } 
           
        }

    }
     public function deletememberpoint($member,$group,$point)
    {
      $sql = "SELECT * FROM `newmember` WHERE `group` = \"$group\" AND `nickname` = \"$member\" ";
        // 沒有會員
        if (empty($this->db->query($sql)->result_array()))
        {
          return "no";
        }
        else
        {
           $sql = "SELECT `start_point`,`end_point` FROM `newmember` WHERE `group` = \"$group\" AND `nickname` = \"$member\"";
           // 沒有儲值金
            if(empty($this->db->query($sql)->row_array()['start_point']))
            {
              return 'no1';
              exit;
            }
            // 儲值金不夠扣
            if($this->db->query($sql)->row_array()['end_point'] < $point)
            {
              return 'no2';
            }

            else
            {
              $startpoint = ($this->db->query($sql)->row_array()['start_point'])-$point;
              $endpoint = ($this->db->query($sql)->row_array()['end_point'])-$point;
              $sql = "UPDATE `newmember` SET `start_point` = \"$startpoint\", `end_point` = \"$endpoint\" WHERE `nickname` = \"$member\" AND `group` = \"$group\"";
            $this->db->query($sql);
            return "ok";
            }
        }
    }
    public function updatememberinfo($group,$id,$win,$lose,$end_point){
      $sql = "UPDATE `newmember` SET `win` = \"$win\" ,`lose` = \"$lose\" ,`end_point` = \"$end_point\" WHERE `id` = \"$id\" AND `group` = \"$group\"";
      $this->db->query($sql);
    }
    public function updatemembercount($group,$name,$point) {
      $sql = "UPDATE `newmember` SET `end_point` = \"$point\" WHERE `nickname` = \"$name\" AND `group` = \"$group\"";
      $this->db->query($sql);
    }
    public function selectmembercountlog($group, $name) {
      $sql = "SELECT * From `member_log` WHERE `nickname` = \"$name\" AND `group` = \"$group\" ORDER BY `date` ASC";
      $memberlog = $this->db->query($sql);
      return $memberlog->result_array();
    }
    //選手log記錄
    public function insertmembercountlog($group, $name, $point, $date, $type) {
      if($type == "up") {
        $sql = "INSERT INTO `member_log` (`nickname`,`group`,`upcount`,`date`) VALUES (\"$name\",\"$group\",\"$point\",\"$date\") ";
      }
      else if($type == "down") {
        $sql = "INSERT INTO `member_log` (`nickname`,`group`,`downcount`,`date`) VALUES (\"$name\",\"$group\",\"$point\",\"$date\") ";
      }
      else if($type == "set"){
        $sql = "INSERT INTO `member_log` (`nickname`,`group`,`setcount`,`date`) VALUES (\"$name\",\"$group\",\"$point\",\"$date\") ";
      }
      else if($type == "name"){
        $sql = "INSERT INTO `member_log` (`nickname`,`group`,`newname`,`oldname`,`date`) VALUES (\"$name\",\"$group\",\"$point\",\"$name\",\"$date\") ";
      }
      $this->db->query($sql);
    }
    //選手更名
    public function editmembername($group, $name, $newname, $type) {
      if($type == "member") {
        $sql = "UPDATE `newmember` SET `nickname` = \"$newname\" WHERE `nickname` = \"$name\" AND `group` = \"$group\"";
      }
      if($type == "log") {
        $sql = "UPDATE `member_log` SET `nickname` = \"$newname\" WHERE `nickname` = \"$name\" AND `group` = \"$group\"";
      }
      $this->db->query($sql);
    }
    public function deletememberlog($name,$group) {
      $sql = "DELETE FROM `member_log` WHERE `group` = \"$group\" AND `nickname` = \"$name\"";
          $this->db->query($sql);
    }
      
}

?>