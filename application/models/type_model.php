<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Type_model extends CI_Model {
     
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tambah($data)
    {
        if (!empty($data)) {
            if($this->db->simple_query("INSERT INTO `type`(`type`)
                VALUES ('$data[type]')")) {
                $return['msg'][0] = "ok";
                $return['msg'][1] = "Data berhasil ditambahkan.....";
            } else {
                $error = $this->db->error();
                $myJSON = json_encode($error['code'].": ".$error['message']);
                $return['msg'][0] = "err";
                $return['msg'][1] = $myJSON;
            }
        }

        return $return;
    }

    public function getData()
    {
        $i = 1;
        $groupproduct = $this->db->query("SELECT * FROM type");
        $data = [];
        /*foreach($groupproduct->result() as $rowa) {
            $akses = "<center><a href='".base_url().'tiket/edit_type/'.$rowa->id."' class='tooltip-success' data-rel='tooltip' title='Ubah' ><span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a>  <a href='".base_url().'tiket/delete_type/'.$rowa->id."' class='tooltip-error delete-data' data-rel='tooltip' title='Hapus' ><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";

            $row = array();
            $row[] = $i;
            $row[] = $rowa->type;
            $row[] = "<a href='".base_url().'tiket/type/'.$rowa->id."' class='tooltip-success' data-rel='tooltip' title='Daftar Tiket' ><span class='blue'>Daftar Tiket <i class='ace-icon fa fa-book bigger-120'></i></span></a>";
            $row[] = $akses;

            $data['data'][] = $row;
            $i++;
        }*/

        return $groupproduct->result();
    }

    function getById($id){
        return $this->db->get_where('type', ['id' => $id]);
    }

    function updateData($where, $data){
        $this->db->where($where);
        return $this->db->update('type', $data);
    }

    function hapusData($where) {
        $this->db->where($where);
        return $this->db->delete('type');
    }

    function getAll(){
        return $this->db->get('type');
    }

    function hitung()
    {
        return $this->db->from("type")->count_all_results();
    }

}
