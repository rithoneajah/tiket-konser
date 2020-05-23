<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Tiket_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tambah($data)
    {
        if (!empty($data)) {
            $id = hexdec(uniqid());
            if($this->db->simple_query("INSERT INTO `tiket`(`id`, `type`, `band`, `image`, `harga`, `date`, `time`)
                VALUES ('$id', '$data[type]', '$data[band]', '$data[image]', '$data[harga]', '$data[date]', '$data[time]')")) {
                $return['msg'][0] = "ok";
                $return['msg'][1] = "Data berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $return['msg'][0] = "err";
                $return['msg'][1] = $myJSON;
            }
        }

        echo json_encode($return);
    }

    public function getData()
    {
        $i = 1;
        $groupproduct = $this->db->query("SELECT * FROM tiket");
        $data = [];
        foreach($groupproduct->result() as $rowa) {
            $akses = "<center><a href='".base_url().'tiket/edit_tiket/'.$rowa->id."' class='tooltip-success' data-rel='tooltip' title='Ubah' ><span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a>  <a href='".base_url().'tiket/delete_tiket/'.$rowa->id."' class='delete-data' data-rel='tooltip' title='Hapus' ><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";

            $row = array();
            $row[] = $i;
            $row[] = $rowa->band;
            $row[] = $rowa->type;
            $row[] = 'Rp. '. number_format($rowa->harga);
            $row[] = date('d/m/Y', strtotime($rowa->date));
            $row[] = $akses;

            $data['data'][] = $row;
            $i++;
        }

        echo json_encode($data);
    }

    function getById($id){
        return $this->db->get_where('tiket', ['id' => $id]);
    }

    function updateData($where, $data){
        $this->db->where($where);
        $this->db->update('tiket', $data);
    }

    function hapusData($where) {
        $this->db->where($where);
        return $this->db->delete('tiket');
    }

    public function getDataType($id)
    {
        $i = 1;
        $groupproduct = $this->db->query("SELECT tiket.id, tiket.band, type.type, tiket.harga, tiket.date FROM tiket  LEFT JOIN type ON type.id = tiket.type WHERE tiket.type = '$id'");
        $data = [];
        foreach($groupproduct->result() as $rowa) {
            $akses = "<center><a href='".base_url().'tiket/edit_tiket/'.$rowa->id."' class='tooltip-success' data-rel='tooltip' title='Ubah' ><span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a>  <a href='".base_url().'tiket/delete_tiket/'.$rowa->id."' class='delete-data' data-rel='tooltip' title='Hapus' ><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";

            $row = array();
            $row[] = $i;
            $row[] = $rowa->band;
            $row[] = $rowa->type;
            $row[] = 'Rp. '. number_format($rowa->harga);
            $row[] = date('d/m/Y', strtotime($rowa->date));
            $row[] = $akses;

            $data['data'][] = $row;
            $i++;
        }

        echo json_encode($data);
    }

    function hitung()
    {
        return $this->db->from("tiket")->count_all_results();
    }

    public function getTypeId($id='')
    {
        return $this->db->get_where('tiket', ['type' => $id]);
    }

    public function listTiket()
    {
        $tiket = $this->db->query("SELECT tiket.id, type.type, band, image, harga, `date`, `time` FROM tiket LEFT JOIN type ON type.id = tiket.type");
        return $tiket;
    }
}
