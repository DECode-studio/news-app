<?php

use function PHPUnit\Framework\isEmpty;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function addUser()
    {
        $date = date('Ymd.His');
        $user_id = "User.ID_" . $date;

        $data = array(
            'user_id' => $user_id,
            'user_name' => $this->input->post('txt_name'),
            'user_email' => $this->input->post('txt_email'),
            'user_category' => $this->input->post('cb_category'),
            'user_status' => "offline",
            'user_password' => $this->input->post('txt_password')
        );

        $this->db->insert('tbl_user', $data);

        redirect('admin/users');
    }

    public function updateUser()
    {
        # code...
    }

    public function deleteUser()
    {
        # code...
    }
}
