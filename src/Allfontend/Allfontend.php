<?php

namespace rudhro\Allfontend;
include_once("../vendor/autoload.php");
use rudhro\Helper;
class Allfontend{


// category list  ************
public function categorylist(){
    // dbconnection
    $db = new Helper;
    $db->dbconnection();
    // sql connection
    $sql = "SELECT * FROM categorylists LIMIT 8";
    $stmt = $db->prearesql($sql);
    $result = $stmt->execute();
    if($result){
        $categories = $stmt->fetchAll();
        return $categories;
    }
}

// slider *********************
public function sliderpart(){
    $db = new Helper;
    $db->dbconnection();
    $sql = "SELECT * FROM slider";
    $stmt = $db->prearesql($sql);
    $result = $stmt->execute();
    if($result){
        $sliders = $stmt->fetchAll();
        return $sliders;
    }    
}
// Top book ******************
public function topproduct(){
    $db = new Helper;
    $db->dbconnection();
    // sql connection;
    $sql = "SELECT * FROM topproduct LIMIT 6";
    $stmt = $db->prearesql($sql);
    $result = $stmt->execute();
    if($result){
        $topproduct = $stmt->fetchAll();
        return $topproduct;

    }
}


// recemt book **************
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

}
