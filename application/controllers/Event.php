<?php

use function PHPUnit\Framework\isEmpty;

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

    public function index()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
            redirect('admin/events');
        } else {
            redirect('admin/login');
        }
    }

    public function addEvent()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $date = date('Ymd.His');
            $event_id = "Event.ID_" . $date;

            $data = array(
                'event_id' => $event_id,
                'event_title' => $this->input->post('txt_title'),
                'event_time' => $this->input->post('dt_time'),
                'event_detail' => $this->input->post('txt_detail')
            );

            $this->db->insert('tbl_event', $data);

            redirect('admin/events');
        } else {
            redirect('admin/login');
        }
    }

    public function updateEvent()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $event_id = $this->input->post('txt_edit_id');

            $data = array(
                'event_id' => $event_id,
                'event_title' => $this->input->post('txt_edit_title'),
                'event_time' => $this->input->post('dt_edit_time'),
                'event_detail' => $this->input->post('txt_edit_detail')
            );

            $this->db->where('event_id', $event_id);
            $this->db->update('tbl_event', $data);

            redirect('admin/events');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteEvent($event_Id)
    {

        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $where = array('event_Id' => $event_Id);

            $this->db->delete('tbl_event', $where);

            redirect('admin/events');
        } else {
            redirect('admin/login');
        }
    }
}
