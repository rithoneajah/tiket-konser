<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

class Kontak extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');

        $this->load->view('kontak/index', ['user' => $nimNama]);

        $this->load->view('footer');
    }

    public function tentang()
    {
      $nimNama = 'Ridwan Ardiansyah - 41516120063';
      $this->load->view('header', ['user' => $nimNama]);
      $this->load->view('menu');

      $this->load->view('kontak/tentang', ['user' => $nimNama]);

      $this->load->view('footer');
    }
}
