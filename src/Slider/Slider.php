<?php

namespace rudhro\Slider;

use rudhro\Helper;

class Slider
{

    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        // db connection
        $db = new Helper;
        $db->dbconnection();
        // sql connection
        $sql = "SELECT * FROM slider";
        // prepare databse to sql
        $stmt = $db->prearesql($sql);
        // excute
        $result = $stmt->execute();
        if ($result) {
            $indexdata = $stmt->fetchAll();
            return $indexdata;
        }
    }

    public function store($data, $file)
    {

        @$slider_title = $data['slider_title'];
        @$slider_discription = $data['slider_discription'];
        @$img = $file['image']['name'];
        @$tmp_name = $file['image']['tmp_name'];

        $targetdir = $_SERVER['DOCUMENT_ROOT'] . "/project/public/assets/admin/img/uploads_slider/";
        @move_uploaded_file($tmp_name, $targetdir . $img);


        $data = [
            'slider_title' => $slider_title,
            'slider_discription' => $slider_discription,
            'img' => $img,
        ];


        if (!empty($slider_title && $slider_discription && $img)) {
            // db connection
            $db = new Helper;
            $db->dbconnection();
            //    sql connection 
            $sql = "INSERT INTO slider (slider_title, slider_discription, image) VALUES (:slider_title, :slider_discription, :img)";
            // prepare database to sql 
            $stmt = $db->prearesql($sql);
            // execite
            $result =  $stmt->execute($data);
            if ($result) {
                header('Location: indexslider.php');
            }
        }
    }
}
