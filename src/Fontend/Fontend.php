<?php

namespace rudhro\Fontend;

use rudhro\Helper; 
class Fontend{
    // public function __construct()
    // {
    //     session_start();
    // }
    

    public function top_product_store($data){
       // $data = print_r($data);

       @$pname =  $data['pname'];
       @$description = $data['description'];
       @$price = $data['price'];
       @$image = $_FILES['image']['name'];
    //    @$image = uniqid().date("Y-m-d-H-i-s");
       @$tmp_name = $_FILES['image']['tmp_name'];
       @$targetdir = $_SERVER['DOCUMENT_ROOT']."/project/public/assets/admin/img/topproduct/";
       @move_uploaded_file($tmp_name, $targetdir.$image);
    //    echo $targetdir;

if(!empty($pname && $description &&  $price)){
    $adddata = [
        
        'pname' => $pname,
        'description' => $description,
        'price' => $price,
        'image' => $image,
    ];
    
    //  sql connection;
    $sql = "INSERT INTO topproduct ( pname, description, price, img) VALUES ( :pname, :description, :price, :image)";
    $dbconn = new Helper;
    $dbconn->dbconnection();
    $stmt = $dbconn->prearesql($sql);
    $result = $stmt->execute($adddata);
    $_SESSION['add_successfully'] = "Product Add Successfully";    
    return $result;
    
    }

}



public function top_product_show(){
    $db = new Helper;
    $db->dbconnection();
    // sql coneection;
    $sql = "SELECT * FROM topproduct";
    // sql prepar
    $stmt = $db->prearesql($sql);
    $result = $stmt->execute();
    if($result){
        return $stmt->fetchAll();
        

    }

}

    }

?>