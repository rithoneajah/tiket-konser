<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

class Layout extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('tiket_model');
      $this->load->model('booking_model');
      $this->load->model('type_model');
    }

    public function index()
    {
      $bookingCount = $this->booking_model->hitung();
      $tiketCount = $this->tiket_model->hitung();
      $typeCount = $this->type_model->hitung();

      $nimNama = 'Ridwan Ardiansyah - 41516120063';
      $this->load->view('header', ['user' => $nimNama]);
      $this->load->view('menu');
      $this->load->view('home', [
        'user' => $nimNama,
        'bookingCount' => $bookingCount,
        'tiketCount' => $tiketCount,
        'typeCount' => $typeCount
      ]);
      $this->load->view('footer');
    }
}
