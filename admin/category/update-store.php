<?php

// autoload file
include_once("../../vendor/autoload.php");
// use file
use rudhro\Maincategory\Maincategory;

// start conduction
if(isset($_SERVER["REQUEST_METHOD"])== "POST"){
  // define class
  $maincategory = new Maincategory;
  $maincategory->update($_POST);
}
?>