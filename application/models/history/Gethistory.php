<?php
class Gethistory extends CI_Model { 

      public function __construct() 
      {
            parent::__construct();
      }
      public function getbettotal($group,$start,$end) {
      	$end =  date("Y-m-d H:i:s",strtotime($end."+1 day"));
      	$sql = "SELECT sum(`a`) AS '0',sum(`b`) AS '1',sum(`c`) AS '2',sum(`d`) AS '3',sum(`e`) AS '4' FROM `newboard2` WHERE `update_time` >= \"$start\" AND `update_time` <= \"$end\" AND `group` = \"$group\"";
      	 return $this->db->query($sql)->row_array();
      }
}