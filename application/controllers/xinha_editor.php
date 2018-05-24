<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Xinha_editor extends CI_Controller
{
    function __construct()
    {
 
        parent::__construct();
        $this->load->helper('xinha');
    }
 
    function index()
    {
       $data['xinha_inclusion'] = javascript_xinha(array('teks'),
                                                   array('ImageManager',
                            'InsertSmiley'),
                            "blue-look");
       $this->load->view('view_xinha', $data);
    }
 
}
?>