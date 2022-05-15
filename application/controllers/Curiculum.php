<?php

use function PHPUnit\Framework\isEmpty;

defined('BASEPATH') or exit('No direct script access allowed');

class Curiculum extends CI_Controller
{
    public function addCuriculum()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $date = date('Ymd.His');
            $curiculum_id = "Curiculum.ID_" . $date;

            $data = array(
                'curiculum_id' => $curiculum_id,
                'curiculum_name' => $this->input->post('txt_name'),
                'curiculum_sks' => $this->input->post('txt_sks')
            );

            $this->db->insert('tbl_curiculum', $data);

            redirect('admin/curiculum');
        } else {
            redirect('admin/login');
        }
    }

    public function updateCuriculum()
    {

        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $curiculum_id = $this->input->post('txt_edit_id');

            $data = array(
                'curiculum_id' => $curiculum_id,
                'curiculum_name' => $this->input->post('txt_edit_name'),
                'curiculum_sks' => $this->input->post('txt_edit_sks')
            );

            $this->db->where('curiculum_id', $curiculum_id);
            $this->db->update('tbl_curiculum', $data);

            redirect('admin/curiculum');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteCuriculum($curiculum_id)
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $where = array('curiculum_id' => $curiculum_id);

            $this->db->delete('tbl_curiculum', $where);
            $this->db->delete('tbl_subject', $where);

            redirect('admin/curiculum');
        } else {
            redirect('admin/login');
        }
    }
}
