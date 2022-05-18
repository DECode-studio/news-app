<?php

use function PHPUnit\Framework\isEmpty;

defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function addArticle()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $date = date('Ymd_His');
            $article_id = "Article-ID_" . $date;

            $news = array(
                'article_id' => $article_id,
                'article_title' => $this->input->post('txt_title'),
                'article_author' => $_SESSION['user_id'],
                'article_time' => $this->input->post('dt_time'),
                'article_body' => $this->input->post('txt_content')
            );

            $this->db->insert('tbl_article', $news);

            function convert_upload_file_array($upload_files)
            {
                $converted = array();

                foreach ($upload_files as $attribute => $val_array) {
                    foreach ($val_array as $index => $value) {
                        $converted[$index][$attribute] = $value;
                    }
                }
                return $converted;
            }

            if (isset($_FILES['fp_image'])) {
                $image_file = convert_upload_file_array($_FILES['fp_image']);
            }

            foreach ($image_file as $key => $image_data) {
                $image_id = "Image.ID_" . $date . "-" . $key;

                $images = array(
                    'image_id' => $image_id,
                    'image_file' => file_get_contents($image_data['tmp_name']),
                    'data_id' => $article_id
                );

                $this->db->insert('tbl_images', $images);
            }


            // foreach ($image_file->result_array() as $image_data) {
            //     $images = array(
            //         'image_id' => $image_id,
            //         'image_file' => file_get_contents($image_data['tmp_name']),
            //         'data_id' => $article_id
            //     );

            //     $this->db->insert('tbl_images', $images);
            // }

            redirect('admin/news');
        } else {
            redirect('admin/login');
        }
    }

    public function updateArticle()
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $article_id = $this->input->post('txt_edit_id');

            $news = array(
                'article_id' => $article_id,
                'article_title' => $this->input->post('txt_title'),
                'article_author' => $_SESSION['user_id'],
                'article_time' => $this->input->post('dt_time'),
                'article_body' => $this->input->post('txt_content')
            );

            $this->db->where('article_id', $article_id);
            $this->db->update('tbl_article', $news);

            redirect('admin/news');
        } else {
            redirect('admin/login');
        }
    }

    public function deleteArticle($article_id)
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {

            $where = array('article_id' => $article_id);
            $image = array('data_id' => $article_id);

            $this->db->delete('tbl_Article', $where);
            $this->db->delete('tbl_images', $image);

            redirect('admin/news');
        } else {
            redirect('admin/login');
        }
    }
}
