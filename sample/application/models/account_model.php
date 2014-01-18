<?php

class Account_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table = 'accounts';
    }
    
    public function sign_up($data)
    {
        $this->validate = 'sign_up';
        return $this->insert($data);
    }
    
    public function login($filter_data)
    {
        $this->validate = 'login';
        $filter_data = $this->validate($filter_data);
        
        if($filter_data !== FALSE)
            return $this->get_by($filter_data);
        
        return FALSE;
    }
}
?>
