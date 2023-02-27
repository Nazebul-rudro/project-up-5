<?php
// autoload
include_once("../../vendor/autoload.php");
// use slider
use rudhro\Slider\Slider;

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    // create class
    $sliderstore = new Slider;
    $sliderstore->store($_POST, $_FILES);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once("../inc/head.php") ?>
<?php include_once("../inc/header.php"); ?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include_once("../inc/sidebar.php"); ?>
        <div class="col py-4 mx-3">
            <h2>Add Category ||</h2>
            <div class="mt-5 d-flex justify-content-center">
                <div class="card" style="width: 600px;">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="title">Slider Title</label>
                                <input type="text" name="slider_title" id="title" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="discription">Slider discription</label>
                                <input type="text" name="slider_discription" id="title" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="img">Slider Image</label>
                                <input type="file" name="image" id="" class="form-control">
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <input type="submit" value="Add Slider" class="btn btn-success form-control">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../inc/footer.php"); ?>

</html>