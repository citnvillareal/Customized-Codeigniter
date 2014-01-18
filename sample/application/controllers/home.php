<?php

class Home extends MY_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $row = $this->auth->account_data();
        
        if(count($row) > 0) {
            echo $row['first_name'].' '.$row['last_name'].', <a href="'.base_url().index_page().'account/logout">Log Out</a>';
        }
    }
}
?>
