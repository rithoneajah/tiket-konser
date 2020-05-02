<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class booking_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tambah($data)
    {
        if (!empty($data)) {
            $tanggal = date('Y-m-d');
            if($this->db->simple_query("INSERT INTO `booking`(`id_tiket`, `nama`, `email`, `no_telp`, `created_date`)
                VALUES ('$data[id_tiket]', '$data[nama]', '$data[email]', '$data[no_telp]', '$tanggal')")) {
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
        $groupproduct = $this->db->query("SELECT booking.id, booking.nama, booking.email, booking.no_telp, tiket.band FROM booking LEFT JOIN tiket ON tiket.id = booking.id_tiket");
        $data = [];
        foreach($groupproduct->result() as $rowa) {
            $akses = "<center><a href='".base_url().'tiket/edit_booking/'.$rowa->id."' class='tooltip-success' data-rel='tooltip' title='Ubah' ><span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a>  <a href='".base_url().'tiket/delete_booking/'.$rowa->id."' class='tooltip-error delete-data' data-rel='tooltip' title='Hapus' ><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";

            $row = array();
            $row[] = $i;
            $row[] = $rowa->nama;
            $row[] = $rowa->email;
            $row[] = $rowa->no_telp;
            $row[] = $rowa->band;
            $row[] = $akses;

            $data['data'][] = $row;
            $i++;
        }

        echo json_encode($data);
    }

    function getById($id){
        return $this->db->get_where('booking', ['id' => $id]);
    }

    function updateData($where, $data){
        $this->db->where($where);
        $this->db->update('booking', $data);
    }

    function hapusData($where) {
        $this->db->where($where);
        $this->db->delete('booking');
    }

    function hitung()
    {
        return $this->db->from("booking")->count_all_results();
    }
}
