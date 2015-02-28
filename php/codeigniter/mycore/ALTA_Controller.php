<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends ALTA_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('profile/mdl_profile');
    }

}
