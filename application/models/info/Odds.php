<?php
class Odds extends CI_Model { 
    public function __construct() 
    {
        parent::__construct();
    }
    public function getodds() 
    {
        $query = $this->db->get('odds');
        return $query->result_array();
    }
      
}

?>
