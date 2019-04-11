<?php
/**
 * Created by IntelliJ IDEA.
 * User: UnixMan
 * Date: 15/03/2019
 * Time: 19:19
 */

class Statistic extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Statistic_model');
        $this->load->library('session');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        if (!empty($username)) {
            $data = array('isi' => 'pages/page_statistic', 'title' => 'Sys KP');
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->load->view('pages/page_login');
            //Ajie's task
        }
    }


    public function getAll()
    {
        $list = $this->Statistic_model->get_datatables(); //getAllData
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->nodosen;
            $row[] = $field->jmlbbg;
            $row[] = $field->jmlpenguji;
            $row[] = '<button onclick="getOne(\'' . $field->id . '\')" id="btnUpdate" data-toggle="tooltip" title="ubah data" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></button>' .
                '<button onclick="deleteStatistic(\'' . $field->id . '\')" data-toggle="tooltip" title="hapus data" class="btn btn-danger btn-xs" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Statistic_model->count_all(),
            "recordsFiltered" => $this->Statistic_model->count_filtered(),
            "data" => $data,
        );
        //JSON output
        echo json_encode($output);
    }
    //add insert code here
    public function addData()
    {
        $nama = $_POST['nama'];
        $nodosen = $_POST['nodosen'];
        $jmlbbg = $_POST['jmlbbg'];
        $jmlpenguji = $_POST['jmlpenguji'];

        $data = array(
            'nama' => $nama,
            'nodosen' => $nodosen,
            'jmlbbg' => $jmlbbg,
            'jmlpenguji' => $jmlpenguji,


        );

        $result = $this->Statistic_model->addData($data);

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

        $result = $this->Statistic_model->updateData($id, $data);

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

        $result = $this->Statistic_model->getOne($id);

        echo json_encode($result);
    }
    public function updateData()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $nodosen = $_POST['nodosen'];
        $jmlbbg = $_POST['jmlbbg'];
        $jmlpenguji = $_POST['jmlpenguji'];


        $data = array(
            'nama' => $nama,
            'nodosen' => $nodosen,
            'jmlbbg' => $jmlbbg,
            'jmlpenguji' => $jmlpenguji,
        );

        $result = $this->Statistic_model->updateData($id, $data);

        if ($result > 0) {
            echo "Ok";
        } else {
            echo "Failed";
        }
    }
}
 