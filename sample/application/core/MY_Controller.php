<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Summary
 * -----------------------------------------------------------------------------
 * This extended by your controller class instead of CI_Controller.
 * -----------------------------------------------------------------------------
 * Protected variables available for use:
 * 
 * [1] $data
 * [2] $view
 * [3] $layout
 * [4] $enable_filter_data 
 * 
 *------------------------------------------------------------------------------
 * @package     Codeigniter
 * @subpackage  Helpers
 * @author      NEIL K. VILLAREAL
 * -----------------------------------------------------------------------------
 */

class MY_Controller extends CI_Controller
{
    protected $data = array();
    
    protected $view = NULL;
    
    protected $layout = "_default";
    
    protected $enable_filter_data = FALSE;
    
    
    public function _remap($method, $params = array())
    {   
        if (method_exists($this, $method))
        {
            call_user_func_array(array($this, $method), $params);
        }
        else 
        {
            show_404(strtolower(get_class($this)).'/'.$method);
        }
        
        $this->_load_view($params);
    }
    
    private function _load_view($params) 
    {
        if ($this->view === FALSE) { return; }
        
        $view = ($this->view !== NULL) ? $this->view . '.php' : $this->router->class . '/' . $this->router->method . '.php';
        
        
        if($this->enable_filter_data)
        {
            $this->data = $this->_filter_data($this->data);
        }
        
        
        $this->data["title"] = ucwords(str_replace("_"," ",$this->router->class));
        $this->data["page"] = ucwords(str_replace("_"," ",$this->router->method));
        $this->data["links"] = $this->_create_links($params);
        
        if($this->layout === FALSE){
            $this->load->view($view,$this->data);
        } else {
            $this->data["content"] = $this->load->view($view, $this->data, TRUE);
            $this->load->view("layout/{$this->layout}", $this->data);
        }
    }
    
    private function _create_links($params)
    {
        $class_name = $this->router->class;
        $method_name = $this->router->method;
        
        $link = base_url().index_page().strtolower($class_name)."/".strtolower($method_name);
        
        foreach($params as $param){
            $link .= "/".$param;
        }
    
        $temp = $this->session->userdata("links");
        if(!isset($temp[$class_name]))
        {
            $this->session->unset_userdata("links");
        }
        else
        {
            $links = $this->session->userdata("links");
            $temp = $links[$class_name];
            
            unset($links[$class_name]);
            
            foreach($temp as $method => $val)
            {
                $links[$class_name][$method] = $val;
                if($method == $method_name)
                    break;
            }
        }
        
        $links[$class_name][$method_name] = $link;
        $this->session->set_userdata("links",$links);
        
        return $this->session->userdata("links");
    }
    
    private function _filter_data($data)
    {
        $temp = array();
        
        foreach($data as $key => $value)
        {
            if(is_array($value))
                $temp[$key] = $this->filter_data($value);
            else if(is_object($value))
                $temp[$key] = (object)$this->filter_data($value);
            else    
                $temp[$key] = htmlentities($value);
        }
        
        return $temp;
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
?>
