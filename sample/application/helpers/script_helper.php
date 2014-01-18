<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * SUMMARY
 * -----------------------------------------------------------------------------
 * This was loaded automatically. 
 * You can verify it at application/config/autoload.php at line 67.
 * -----------------------------------------------------------------------------
 * Functions available for use:
 * 
 * [1] js - This will set the url of the script tag for javascript.
 * 
 *      Sample Usage:
 *          js("name","location");
 * 
 * [2] render_js - This will render the script tag with the url set at js function.
 *  
 *      Sample Usage:
 *          echo @render_js("name");
 *  
 *      Sample Output:
 *          <script type="text/javascript" src="http://localhost/nvs/location.js"></script>
 * 
 * [3] css - This will set the url and the attribute of the link tag og css.
 * 
 *      Sample Usage [1]:
 *          css("name","location");
 * 
 *      Sample Usage [2]:
 *          css("name","location", "media='all'");
 * 
 * [4] render_css - This will render the style tag with the url and the attribute set at css function.
 * 
 *      Sample Usage:
 *          echo @render_css("name");
 * 
 *      Sample Output [1]:
 *          <link type="text/css" rel="stylesheet"  href="http://localhost/nvs/location.css">
 * 
 *      Sample Output [2]:
 *          <link type="text/css" rel="stylesheet"  href="http://localhost/nvs/location.css" media='all'>
 *------------------------------------------------------------------------------
 * @package     Codeigniter
 * @subpackage  Helpers
 * @author      NEIL K. VILLAREAL
 * -----------------------------------------------------------------------------
 */


    
if ( ! function_exists('js'))
{
    function js($name, $url)
    {        
        $CI = & get_instance();
        $data = $CI->session->userdata("js_{$name}");
        
        if($data !== FALSE) {
            $CI->session->unset_userdata("js_{$name}");
        }
        
        $data[] = array("url" => $url);
        
        $CI->session->set_userdata("js_{$name}", $data);
    }
}



if ( ! function_exists('render_js'))
{
    function render_js($name)
    {
        $CI = & get_instance();
        $script = "";
        
        $data = $CI->session->userdata("js_{$name}");
        
        if($data !== FALSE) { 
            foreach($data as $item){
                $script .= "<script type='text/javascript' src='".base_url().$item['url'].".js'></script>";
                $CI->session->unset_userdata("js_{$name}");
            }
        }
        
        return $script;
    }
}



if ( ! function_exists('css'))
{
    function css($name, $url, $attr = "")
    {
        $CI = & get_instance();
        $name = strtolower($name);
        
        $data = $CI->session->userdata("css_{$name}");
        
        if($data !== FALSE) {
            $CI->session->unset_userdata("css_{$name}");
        }
        
        $data[] = array("url" => $url, "attr" => $attr);

        $CI->session->set_userdata("css_{$name}", $data);
    }
}



if ( ! function_exists('render_css'))
{
    function render_css($name)
    {
        $CI = & get_instance();
        $script = "";
        
        $data = $CI->session->userdata("css_{$name}");              
        
        if($data !== FALSE) { 
            foreach($data as $item){
                $script .= "<link type='text/css' rel='stylesheet'  href='".base_url().$item['url'].".css' ".$item['attr'].">\n";
                $CI->session->unset_userdata("css_{$name}");
            }
        }
        
        return $script;
    }
}
    

/* End of file script_helper.php */
/* Location: ./application/helpers/script_helper.php */
?>
