<?php

namespace rudhro\Helper;

namespace rudhro\Maincategory;

use rudhro\Helper;

class Maincategory
{



    public function __construct()
    {
        session_start();
    }

    public function index()
    {

        // database connection
        $db = new Helper;
        $db->dbconnection();
        // sql connection
        $sql = "SELECT booklists.*, categorylists.c_name FROM booklists LEFT JOIN categorylists ON booklists.category_id = categorylists.id";

        // sql prepra
        $stmt = $db->prearesql($sql);
        // excute
        $result = $stmt->execute();
        if ($result) {
            $indexdata = $stmt->fetchAll();
            return $indexdata;
        }
    }

    public function store($storedata, $files)
    {
        @$bookname = $storedata['bookname'];
        @$authorname = $storedata['authorname'];
        @$discription = $storedata['discription'];
        @$price = $storedata['price'];
        @$category_id = $storedata["ct"];
        @$image = $files['image']['name'];
        @$tmp_name = $files['image']['tmp_name'];
        @$targetdir = $_SERVER['DOCUMENT_ROOT'] . "/project/public/assets/admin/img/products/";
        @move_uploaded_file($tmp_name, $targetdir . $image);


        $data = [
            'category_id' => $category_id,
            'bookname' => $bookname,
            'authorname' => $authorname,
            'discription' => $discription,
            'price' => $price,
            'image' => $image,

        ];

        if (!empty($bookname && $authorname && $discription && $price && $category_id && $image)) {
            // databse connection
            $db = new Helper;
            $db->dbconnection();

            // sql connection
            $sql = "INSERT INTO booklists (category_id, bookname, authorname, discription, price, image) VALUES (:category_id, :bookname, :authorname, :discription, :price, :image)";
            // prepare query
            $stmt = $db->prearesql($sql);
            // $stmt= $conn->prepare($sql);
            // execute query
            $stmt->execute($data);
            $_SESSION["ins_success"] = "Insert Successfully";
            header('Location: categorylist.php');
        }
    }

    public function show($id)
    {
        // database connection
        $db = new Helper;
        $db->dbconnection();
        // sql connection
        $sql = "SELECT * FROM booklists WHERE id=$id";
        // sql prepare
        $stmt = $db->prearesql($sql);
        $result = $stmt->execute();
        if ($result) {
            $data = $stmt->fetch();
            return $data;
        }
    }

    public function update($updatedata)
    {
        @$bookname = $updatedata["bookname"];
        @$authorname = $updatedata["authorname"];
        @$discription = $updatedata["discription"];
        @$price = $updatedata["price"];
        @$id = $updatedata['id'];

        $updata = [
            'bookname' => $bookname,
            'authorname' => $authorname,
            'discription' => $discription,
            'price' => $price
        ];
        // database connection
        $db = new Helper;
        $db->dbconnection();
        // sql connection
        $sql = "UPDATE booklists SET bookname=:bookname, authorname=:authorname, discription=:discription, price=:price WHERE id=$id";
        // prepare db to sql
        $result = $db->prearesql($sql);
        $result->execute($updata);


        $_SESSION['ins_update'] = "Update Successfully";

        header('Location: categorylist.php');
    }

    public function updatevalue($id)
    {
        $_SESSION["ins_update"] = "Update successfully";
        // db connection
        $db = new Helper;
        $db->dbconnection();
        // sql connection
        $sql = "SELECT * FROM booklists WHERE id=$id";
        // prepare db to sql
        $stmt = $db->prearesql($sql);
        $result = $stmt->execute();
        if ($result) {
            $data = $stmt->fetch();
            return $data;
        }
    }

    public function deleted($deletedata)
    {
        $id = $deletedata['id'];

        // database connection
        $db = new Helper;
        $db->dbconnection();
        //sql connection
        $sql = "DELETE FROM booklists WHERE id= $id";
        // prepare database to sql 
        $stmt = $db->prearesql($sql);
        // execute query
        $stmt->execute();

        $_SESSION['ins_delete'] = 'Deleted Successfully';

        header('Location: categorylist.php');
    }



    public function addproduct()
    {
        // dbconnection
        $db = new Helper;
        $db->dbconnection();
        // sql connection
        $sql = "SELECT * FROM categorylists";
        // prepare datbase to sql 
        $stmt = $db->prearesql($sql);
        // execute
        $result = $stmt->execute();
        if ($result) {
            $categories = $stmt->fetchAll();
            return $categories;
        }
    }


}
