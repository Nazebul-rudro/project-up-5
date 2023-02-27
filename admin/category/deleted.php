<?php
// start autoload


include_once("../../vendor/autoload.php");
// use
use rudhro\Maincategory\Maincategory;


if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
  // create class
  $maincategory = new Maincategory;
  $maincategory->deleted($_POST);
  // $id = $_POST['id'];
}
