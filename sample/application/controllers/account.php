<?php

class Account extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function sign_up()
    {
        if($this->input->post())
        {
            $this->load->model('account_model');
            
            $password = $this->input->post('pword');
            
            $data = array(
                            'first_name' => $this->input->post('first_name'),
                            'last_name' => $this->input->post('last_name'),
                            'username' => $this->input->post('uname'),
                            'password' => (($password !== FALSE)?sha1($password):$password),
                            'created' => time()
                    );
            
            $insert_id = $this->account_model->sign_up($data);
            
            $this->data['insert_id'] = $insert_id;
        }
    }
    
    public function login()
    {
        if($this->input->post())
        {
            $this->load->model('account_model');
            
            $password = $this->input->post('password');
            
            $filter_data = array(
                                  'username' => $this->input->post('username'),
                                  'password' => (($password !== FALSE)?sha1($password):"")
                           );
            
            if($this->auth->login($filter_data))
            {
                return redirect("home");
            }
        }
    }
    
    public function logout()
    {
        $this->auth->logout();
        redirect('home');
    }
    
    public function ajax_is_unique_username()
    {
        $this->view = FALSE;
        $username = $this->input->get('uname');
        
        if($username !== FALSE)
        {
            $this->load->model('account_model');
            
            $filter_data = array('username' => $username);
            
            $row = $this->account_model->get_by($filter_data);
            
            if(count($row) == 0)
                echo 'true';
            
            return;
        }
        
        echo 'false';
    }
}
?>
