# Codeigniter Starter panel

Codeigniter Starter Panel is a simple and full customizable Administration panel include flexible Authentication mode.

## Sources
* Codeigniter 2.1.4
* Sparks (getsparks.org)
* Template Library (Philsturgeon)
* CSS3 PIE (Jason Johnston)

## Install
1. Copy the project in your web root directory
2. Configure DB Settings in application/config/database.php
3. The first time to access at your application, the migrations run automatically
4. Congratulations the Starter Panel run!
5. Access with **username:** admin **password:** password

## Basic usage
All controllers extends to Admin_controller for restrict access.

### Example

    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Controller_name extends Admin_controller
    {

        public function index()
        {
            $this->load->view('dashboard/welcome_message');
        }
    }

The users table use the following structure:

    CREATE TABLE `users` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `username` varchar(60) NOT NULL,
      `password` varchar(255) NOT NULL,
      `active` tinyint(1) NOT NULL DEFAULT '1',
      `last_login` datetime DEFAULT NULL,
      `last_login_ip` varchar(45) DEFAULT NULL,
      `created_at` datetime DEFAULT NULL,
      `updated_at` datetime DEFAULT NULL,
      PRIMARY KEY (`id`)
    );

After run migration you can alter the users table.