<?php
if(! defined('BASEPATH'))exit('No direct script access allowed');
/**
 * 
 */
class Statistik extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('tiket_model');
        $this->load->model('booking_model');
        $this->load->model('type_model');
    }

    public function index()
    {
        $this->load->library('FusionCharts');
        $nimNama = 'Ridwan Ardiansyah - 41516120063';

        $objData = $this->olahData();

        $chart = new FusionCharts("column2d", "chart-1" , "700", "400", "chart-container", "json", json_encode($objData));

        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('statistik/index', ['chart' => $chart]);
        $this->load->view('footer');
    }

    public function olahData()
    {

       $data = $this->booking_model->chartBand();
       $datanya = [];
       if (!empty($data)) {
            foreach ($data as $key => $value) {
                $datanya[] = [
                    'label' => $value['band'],
                    'value' => $value['jml']
                ];
            }
       }

       $object = new stdClass();
       $object->caption = "Penjualan TIket";
       $object->subcaption = "berdasarkan BAND";
       $object->xaxisname = "Band";
       $object->yaxisname = "Jumlah";
       $object->numbersuffix = "";
       $object->theme = "fusion";

       $chart = new stdClass();
       $chart->chart = $object;
       $chart->data = $datanya;

       return $chart;
    }
}
?>