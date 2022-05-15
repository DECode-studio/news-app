<?php

use function PHPUnit\Framework\isEmpty;

defined('BASEPATH') or exit('No direct script access allowed');

class Lecture extends CI_Controller
{
    public function addLecture()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $date = date('Ymd.His');
            $lecture_id = "Lecture.ID_" . $date;

            $data = array(
                'lecture_id' => $lecture_id,
                'lecture_name' => $this->input->post('txt_name'),
                'lecture_email' => $this->input->post('txt_email'),
                'lecture_major' => $this->input->post('txt_major'),
                'lecture_employed' => $this->input->post('dt_employed')
            );

            $this->db->insert('tbl_lecture', $data);

            redirect('admin/lectures');
        } else {
            redirect('admin/login');
        }
    }

    public function updateLecture()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $lecture_id = $this->input->post('txt_edit_id');

            $data = array(
                'lecture_id' => $lecture_id,
                'lecture_name' => $this->input->post('txt_edit_name'),
                'lecture_email' => $this->input->post('txt_edit_email'),
                'lecture_major' => $this->input->post('txt_edit_major'),
                'lecture_employed' => $this->input->post('dt_edit_employed')
            );

            $this->db->where('lecture_id', $lecture_id);
            $this->db->update('tbl_lecture', $data);

            redirect('admin/lectures');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteLecture($lecture_id)
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $where = array('lecture_id' => $lecture_id);

            $this->db->delete('tbl_lecture', $where);
            $this->db->delete('tbl_subject', $where);

            redirect('admin/lectures');
        } else {
            redirect('admin/login');
        }
    }
}
