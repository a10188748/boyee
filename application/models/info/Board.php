<?php
class Board extends CI_Model { 

      public function __construct() 
      {
            parent::__construct();
      }
 	 public function insertboard($boardjson,$group,$num)
      {
      	$sql = "INSERT INTO `board` (`board_json`,`group`,`num`) VALUES (\"$boardjson\",\"$group\",$num)";
      	$this->db->query($sql); 

      }
      public function getboard($group)
      {
      	$sql = "SELECT num,board_json  FROM `board` where `group` = '$group' ORDER BY `num` DESC LIMIT 1";
      	if(empty($this->db->query($sql)->row_array()))
      	{
      		return array('num' => 0);
      	}
      	return $this->db->query($sql)->row_array();

      }
      public function deleteboard($group){

      	$sql = "DELETE FROM `board` WHERE `group` = '$group'";
      	$this->db->query($sql);
      }
      public function getboundcount($group)
      {
            $sql = "SELECT `game` , `num` FROM `board_count` WHERE `group` = '$group' ";
            return $this->db->query($sql)->row_array();
      }
      public function updateboardnumcount($group,$date)
      {
            $sql = "SELECT `num` FROM `board_count` WHERE `group` = '$group' ";
            $data = $this->db->query($sql)->row_array();
            $num = $data["num"]+1;
            $sql2 = "UPDATE `board_count` SET `num` = $num , `update_time` = \"$date\" WHERE `group` = '$group'";
            $this->db->query($sql2);
      }
      public function saveboard($group,$game,$num,$json,$time)
      {
            $sql = "INSERT INTO `newboard` (`group`,`game`,`num`,`board_json`,`update_time`) VALUES (\"$group\",$game,$num,\"$json\",\"$time\")";
            $this->db->query($sql);
      }
      public function resetboard($group,$date)
      {
            $sql = "UPDATE `board_count` SET `game` = 1 , `num` = 1 , `update_time` = \"$date\" WHERE `group` = '$group'";
            $this->db->query($sql);
      }
       public function updateboardgamecount($group,$date)
      {
            $sql = "SELECT `game` FROM `board_count` WHERE `group` = '$group' ";
            $data = $this->db->query($sql)->row_array();
            $game = $data["game"]+1;
            $sql2 = "UPDATE `board_count` SET `game` = $game ,`num` = 1 , `update_time` = \"$date\" WHERE `group` = '$group'";
            $this->db->query($sql2);
      }
      public function saveboard2($group,$game,$num,$a,$b,$c,$d,$e,$time)
      {
            $sql = "INSERT INTO `newboard2` (`group`,`game`,`num`,`a`,`b`,`c`,`d`,`e`,`update_time`) VALUES (\"$group\",$game,$num,\"$a\",\"$b\",\"$c\",\"$d\",\"$e\",\"$time\")";
            $this->db->query($sql);
      }
      public function selectboard($start,$end)
      {
            $sql = "SELECT SUM(`a`),SUM(`b`),SUM(`c`),SUM(`d`),SUM(`e`) FROM `newboard2` WHERE `update_time` >= \"$start\" AND `update_time` <= \"$end\"";
      }
      
}

?>
