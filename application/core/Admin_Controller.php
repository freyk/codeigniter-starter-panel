<?php if (! defined('BASEPATH')) exit('No direct script access');

class Admin_Controller extends MY_Controller
{
    private $url_login = 'sessions/login';

    public function __construct()
    {
        parent::__construct();

        // Validate logged user
        $this->is_logged_in();

        // Load Template library
        $this->load->spark('template/1.9.0');

        /* Load layouts */
        $this->template->set_layout('default');

        /* Load optional Partials */
        //$this->template->set_partial('navbar','partials/navbar', FALSE);
        //$this->template->set_partial('breadcrumbs','partials/breadcrumbs', FALSE);
        //$this->template->set_partial('alerts','partials/alerts', FALSE);

        /* Autofill post data when use form_validation Class */
        // foreach ($_POST as $key => $value)
        // {
        //  $this->form_validation->set_rules($key);
        // }

        /* Profiler Mode */
        // $this->output->enable_profiler(TRUE);
    }

    private function is_logged_in()
    {
        if ($this->logged_user === 0)
        {
            // Redirect for AJAX
            if ($this->input->is_ajax_request())
            {
                echo '<script>window.location.reload();</script>';
            }

            // Url to redirect
            redirect($this->url_login);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | This methods you can use in your controllers
    |--------------------------------------------------------------------------
    */

    protected function build_json($data)
    {
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $this->output->set_output(json_encode($data));
    }

    protected function ajax_request()
    {
        if ($this->input->is_ajax_request() === FALSE)
        {
            echo 'Please enable Javascript!';
            exit;
        }
    }

}

/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */