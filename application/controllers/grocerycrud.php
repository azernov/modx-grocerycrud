<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grocerycrud extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */

        $this->load->library('grocery_CRUD');

    }

	public function index()
    {
        $this->grocery_crud->set_table('modx_site_content');
        $output = $this->grocery_crud->render();
        global $modx;
        foreach($output->css_files as $css_file)
        {
            $modx->regClientCSS($css_file);
        }
        foreach($output->js_files as $js_file)
        {
            $modx->regClientStartupScript($js_file);
        }
        //var_dump($output->js_files);
        //exit();
        $this->load->view('wrapper',$output);
    }


}