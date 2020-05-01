<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

class layout extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('home', ['user' => $nimNama]);
        $this->load->view('footer');
    }
}
