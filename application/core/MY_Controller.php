<?php if (! defined('BASEPATH')) exit('No direct script access');

class MY_Controller extends CI_Controller
{
    public $logged_user = 0;

    public function __construct()
    {
        parent::__construct();

        $this->logged_user = $this->users_model->get();

        // Autorun last migration
        $this->load->library('migration');

        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }
}

/* Load the Admin_Controller for extends in all Controllers */
require APPPATH.'core/Admin_Controller.php';