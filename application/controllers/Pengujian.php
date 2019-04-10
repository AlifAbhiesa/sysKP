<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 19:19
 */

class Pengujian extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengujian_model');
        $this->load->library('session');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        if (!empty($username)) {
            $data = array('isi' => 'pages/page_pengujian', 'title' => 'Sys KP');
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->load->view('pages/page_login');
            //Ajie's task
        }
    }


    public function getAll()
    {
        $list = $this->Pengujian_model->get_datatables(); //getAllData
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->idBmbg;
            $row[] = $field->idKp;
            $row[] = $field->nrp;
            $row[] = $field->nama;
            $row[] = $field->judulKp;
            $row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
                '<button onclick="deletePengujian(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pengujian_model->count_all(),
            "recordsFiltered" => $this->Pengujian_model->count_filtered(),
            "data" => $data,
        );
        //JSON output
        echo json_encode($output);
    }
    //add insert code here
    public function addData()
    {
        $idBmbg = $_POST['idBmbg'];
        $idKp = $_POST['idKp'];
        $nrp = $_POST['nrp'];
        $nama = $_POST['nama'];
        $judulKp = $_POST['judulKp'];

        $data = array(
            'idBmbg' => $idBmbg,
            'idKp' => $idKp,
            'nrp' => $nrp,
            'nama' => $nama,
            'judulKp' => $judulKp,


        );

        $result = $this->Pengujian_model->addData($data);

        if ($result > 0) {
            echo "Ok";
        } else {
            echo "Failed";
        }
    }

    public function deleteData()
    {
        $id = $_POST['id'];


        $data = array(
            'active' => 'N',
        );

        $result = $this->Pengujian_model->updateData($id, $data);

        if ($result > 0) {
            echo "Ok";
        } else {
            echo "Failed";
        }
    }
    public function getOne()
    {
        $id = $_POST['id'];


        $data = array(
            'active' => 'N',
        );

        $result = $this->Pengujian_model->getOne($id);

        echo json_encode($result);
    }
    public function updateData()
    {
        $id = $_POST['id'];
        $idBmbg = $_POST['idBmbg'];
        $idKp = $_POST['idKp'];
        $nrp = $_POST['nrp'];
        $nama = $_POST['nama'];
        $judulKp = $_POST['judulKp'];


        $data = array(
            'idBmbg' => $idBmbg,
            'idKp' => $idKp,
            'nrp' => $nrp,
            'nama' => $nama,
            'judulKp' => $judulKp,

        );

        $result = $this->Pengujian_model->updateData($id, $data);

        if ($result > 0) {
            echo "Ok";
        } else {
            echo "Failed";
        }
    }
}
 