<?php
namespace rudhro\Fontend;
use rudhro\Helper; 
class Fontend{

    public function recentbook(){
        // dbconnection
        $dbconn = new Helper;
        $dbconn->dbconnection();
        // sql connection
        $sql = "SELECT * FROM booklists LIMIT 6";
        $stmt = $dbconn->prearesql($sql);
        $result = $stmt->execute();
        if ($result) {
            $data = $stmt->fetchAll();
            return $data;
        }
        
    
    }

    public function topproduct($data){
       // $data = print_r($data);

       @$title =  $data['title'];
       @$pname =  $data['pname'];
       @$description = $data['description'];
       @$price = $data['price'];
       @$image = $data['image']['name'];
       @$tmp_name = $data['image']['tmp_name'];
       @$targetdir = "http://localhost:85/project/public/assets/admin/img/topproduct/";
       @move_uploaded_file($tmp_name, $targetdir.$image);
      
       $adddata = [
        'title' => $title,
        'pname' => $pname,
        'description' => $description,
        'price' => $price,
        'image' => $image,
    ];
     //sql connection;
    $sql = "INSERT INTO topproduct (title, pname, description, price, img) VALUES (:title, :pname, :description, :price, :image)";
    $dbconn = new Helper;
    $dbconn->dbconnection();
    $stmt = $dbconn->prearesql($sql);
    $result = $stmt->execute($adddata);
    return $result;

    }


}

?>