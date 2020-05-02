<?php if(! defined('BASEPATH'))exit('No direct script access allowed');

class tiket extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tiket_model');
        $this->load->model('booking_model');
        $this->load->model('type_model');

    }

    public function type($id)
    {

        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/index', ['id' => $id]);
        $this->load->view('footer', ['footer' => 'tiket/javascript_index', 'data' => $id]);
    }

    public function index()
    {
        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/type');
        $this->load->view('footer', ['footer' => 'tiket/javascript_type']);
    }

    public function booking_list()
    {
        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/booking');
        $this->load->view('footer');
        $this->load->view('tiket/javascript_booking');
    }

    public function daftar_tiket()
    {
        echo $this->tiket_model->getData();
    }

    public function daftar_booking()
    {
        echo $this->booking_model->getData();
    }

    public function daftar_type()
    {
        $data = $this->type_model->getData();
        echo json_encode($data);
    }

    public function tiket_type($id)
    {
        echo $this->tiket_model->getDataType($id);
    }

    public function tambah_tiket($id = '')
    {
        $types = $this->type_model->getAll()->result();

        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/tambah_tiket', ['type' => $types, 'id' => $id]);
        $this->load->view('footer');
        $this->load->view('tiket/javascript_tambah_tiket');
    }

    public function edit_tiket($id)
    {
        $data = $this->tiket_model->getById($id)->result();

        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/edit_tiket', ['data' => end($data)]);
        $this->load->view('footer');
        $this->load->view('tiket/javascript_tambah_tiket');
    }

    public function delete_tiket($id)
    {
        /*mengambil data yang ada berdasarkan id*/
        $tiket = $this->tiket_model->getById($id)->result();
        $tiket = end($tiket);

        /*cek apakah data terdapat gambar*/
        if (!empty($tiket->image) && file_exists('uploads/'.$tiket->image)) {
            /*jika gambar ada di storage maka akan dihapus*/
            unlink('./uploads/'.$tiket->image);
        }

        /*menghapus data dari table database*/
        $where = array('id' => $id);
        $this->tiket_model->hapusData($where);

        redirect(base_url() . 'tiket');
    }

    public function proses_tambah_tiket()
    {
        if (!isset($_POST)) {
            show_404();
        }

        $type = $this->input->post('type');
        $band = $this->input->post('band');
        $image = $this->input->post('image');
        $harga = $this->input->post('harga');
        $date = $this->input->post('date');
        $time = $this->input->post('time');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image')){
            $error = array('error' => $this->upload->display_errors());
            print_r('<pre>');
            print_r($error);die;
        } else {
            //file is uploaded successfully
            //now get the file uploaded data 
            $upload_data = $this->upload->data();
            //get the uploaded file name
            $data['type'] = $type;
            $data['band'] = $band;
            $data['image'] = $upload_data['file_name'];
            $data['harga'] = $harga;
            $data['date'] = date('Y-m-d', strtotime($date));
            $data['time'] = $time;
            //store pic data to the db
            $this->tiket_model->tambah($data);
            redirect(base_url() . 'tiket');
        }

        redirect(base_url() . 'tiket/tambah_tiket');
    }

    public function proses_edit_tiket($id)
    {
        if (!isset($_POST)) {
            show_404();
        }

        $tiket = $this->tiket_model->getById($id)->result();
        $tiket = end($tiket);

        $type = $this->input->post('type');
        $band = $this->input->post('band');
        $image = $this->input->post('image');
        $harga = $this->input->post('harga');
        $date = $this->input->post('date');
        $time = $this->input->post('time');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($_FILES['image']['name'] != "") {
            if ( ! $this->upload->do_upload('image')){
                $error = array('error' => $this->upload->display_errors());
                print_r('<pre>');
                print_r($error);die;
            } else {
                if (!empty($tiket->image) && file_exists('uploads/'.$tiket->image)) {
                    unlink('./uploads/'.$tiket->image);
                }

                $upload_data = $this->upload->data();
            }
        } else {
            $upload_data = null;
        }

        $data['type'] = $type;
        $data['band'] = $band;
        if (!empty($upload_data)) {
            $data['image'] = $upload_data['file_name'];
        }
        $data['harga'] = $harga;
        $data['date'] = date('Y-m-d', strtotime($date));
        $data['time'] = $time;
        //store pic data to the db
        $where = [
            'id' => $id
        ];

        $this->tiket_model->updateData($where, $data);
        redirect(base_url() . 'tiket');
    }

    public function tambah_booking()
    {
        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $tiket = $this->db->get('tiket')->result();

        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/tambah_booking', ['tickets' => $tiket]);
        $this->load->view('footer', ['footer' => 'tiket/javascript_tambah_booking']);
    }

    public function proses_tambah_booking()
    {
        if (!isset($_POST)) {
            show_404();
        }

        $id_tiket = $this->input->post('id_tiket');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');

        if (!$id_tiket || !$nama || !$email || !$no_telp){
            print_r('<pre>');
            print_r('lengkapi data!');die;
        } else {
            $data['id_tiket'] = $id_tiket;
            $data['nama'] = $nama;
            $data['email'] = $email;
            $data['no_telp'] = $no_telp;
            //store pic data to the db
            $this->booking_model->tambah($data);
            redirect(base_url() . 'tiket/booking_list');
        }

        redirect(base_url() . 'tiket/tambah_booking');
    }

    public function edit_booking($id)
    {
        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $tiket = $this->db->get('tiket')->result();
        $booking = $this->booking_model->getById($id)->result();
        $booking = end($booking);

        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/edit_booking', ['booking' => $booking, 'tickets' => $tiket]);
        $this->load->view('footer', ['footer' => 'tiket/javascript_edit_booking', 'data' => $booking]);
    }

    public function proses_edit_booking($id)
    {
        if (!isset($_POST)) {
            show_404();
        }
        $booking = $this->booking_model->getById($id)->result();

        $id_tiket = $this->input->post('id_tiket');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');

        if (!$id_tiket || !$nama || !$email || !$no_telp){
            print_r('<pre>');
            print_r('lengkapi data!');die;
        } else {
            $data['id_tiket'] = $id_tiket;
            $data['nama'] = $nama;
            $data['email'] = $email;
            $data['no_telp'] = $no_telp;
            //store pic data to the db
            $where = [
                'id' => $id
            ];
            $this->booking_model->updateData($where, $data);
            redirect(base_url() . 'tiket/booking_list');
        }

        redirect(base_url() . 'tiket/edit_booking');
    }

    public function delete_booking($id)
    {
        /*mengambil data yang ada berdasarkan id*/
        $booking = $this->booking_model->getById($id)->result();
        $booking = end($booking);

        /*cek apakah data terdapat gambar*/
        if (!empty($booking)) {
            /*menghapus data dari table database*/
            $where = array('id' => $id);
            $this->booking_model->hapusData($where);
        }


        redirect(base_url() . 'tiket/booking_list');
    }

    public function tambah_type()
    {
        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/tambah_type');
        $this->load->view('footer', ['footer' => 'tiket/javascript_tambah_type']);
    }

    public function edit_type($id)
    {
        $data = $this->type_model->getById($id)->result();

        $nimNama = 'Ridwan Ardiansyah - 41516120063';
        $this->load->view('header', ['user' => $nimNama]);
        $this->load->view('menu');
        $this->load->view('tiket/edit_type', ['data' => end($data)]);
        $this->load->view('footer');
    }

    public function delete_type()
    {
        $id = $this->input->post('id');
        /*mengambil data yang ada berdasarkan id*/
        $tiket = $this->type_model->getById($id)->result();
        $tiket = end($tiket);

        /*hapus data child*/
        $where = array('type' => $id);
        $this->tiket_model->hapusData($where);

        /*menghapus data dari table database*/
        $where = array('id' => $id);
        $delete = $this->type_model->hapusData($where);
        echo json_encode($delete);
    }

    public function proses_tambah_type()
    {
        if (!isset($_POST)) {
            show_404();
        }

        $type = $this->input->post('type');

        $data['type'] = $type;

        $save = $this->type_model->tambah($data);
        echo json_encode($save);
        // redirect(base_url() . 'tiket');
    }

    public function proses_edit_type($id)
    {
        if (!isset($_POST)) {
            show_404();
        }

        $tiket = $this->type_model->getById($id)->result();
        $tiket = end($tiket);

        $type = $this->input->post('type');

        $data['type'] = $type;

        $where = [
            'id' => $id
        ];

        $edit = $this->type_model->updateData($where, $data);
        echo json_encode($edit);
    }

    public function detail()
    {
        $nimNama = 'Ridwan Ardiansyah - 41516120063';
      $this->load->view('header', ['user' => $nimNama]);
      $this->load->view('menu');
      $this->load->view('tiket/detail');
      $this->load->view('footer');
    }
}
