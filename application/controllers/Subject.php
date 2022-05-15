<?php

use function PHPUnit\Framework\isEmpty;

defined('BASEPATH') or exit('No direct script access allowed');

class Subject extends CI_Controller
{
    public function addSubject()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $date = date('Ymd.His');
            $subject_id = "Subject.ID_" . $date;

            $data = array(
                'subject_id' => $subject_id,
                'lecture_id' => $this->input->post('txt_lecture_id'),
                'curiculum_id' => $this->input->post('cb_curiculum'),
            );

            $this->db->insert('tbl_subject', $data);

            redirect('admin/lectures');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteSubject($subject_id)
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $where = array('subject_id' => $subject_id);

            $this->db->delete('tbl_subject', $where);

            redirect('admin/lectures');
        } else {
            redirect('admin/login');
        }
    }
}
