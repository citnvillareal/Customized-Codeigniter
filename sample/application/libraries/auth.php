<?php

class Auth
{
    private  $CI;
    
    public function __construct()
    {
       $this->CI =& get_instance(); 
       
       $this->CI->load->model('account_model');
       $this->CI->load->library('session');
    }
    
    public function login($filter_data)
    {
        $row = $this->CI->account_model->login($filter_data);
        
        if($row !== FALSE)
        {
            $this->CI->session->set_userdata('account_id',$row['account_id']);
            return TRUE;
        }
        
        return FALSE;
    }
    
    public function logout()
    {
        $this->CI->session->unset_userdata('account_id');
    }
    
    public function logged_in()
    {
        return ($this->account_id() !== FALSE)?TRUE:FALSE;
    }
    
    public function account_id()
    {
        return $this->CI->session->userdata('account_id');
    }
    
    public function account_data()
    {
        $filter_data = array( "account_id" => $this->account_id() );
        $row = $this->CI->account_model->get_by($filter_data);
        
        return $row;
    }
}

?>
