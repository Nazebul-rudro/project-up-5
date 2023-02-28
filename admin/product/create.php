<?php

include_once("../../vendor/autoload.php");

use rudhro\Fontend\Fontend;


if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
    $fontend = new Fontend;
    $fontend->top_product_store($_POST);
}



?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once("../inc/head.php");
?>
<?php
include_once("../inc/header.php");
?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include_once("../inc/sidebar.php"); ?>
        <div class="col">
            <div>
                <div class="mt-2">
                    <div class="d-flex justify-content-between">
                        <h3>Top Product <a href="index.php" class="text-decoration-none">List</a></h3>
                        <?php
                        if(isset($_SESSION['add_successfully'])){
                        
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?php echo$_SESSION['add_successfully']; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php 
                        session_unset();  
                        }
                        ?>
                    </div>
                    <div class="px-5">
                        <h4 class="text-center">Top Category</h4>
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="mt-2">
                                <label for="p_title">Product Name : </label>
                                <input type="text" name="pname" id="p_title" class="form-control" required>
                            </div>
                            <div class="mt-2">
                                <label for="description">Description : </label>
                                <input type="text" name="description" id="description" class="form-control" required>
                            </div>
                            <div class="mt-2">
                                <label for="price">Price : </label>
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>
                            <div class="mt-2">
                                <label for="img">Image : </label>
                                <input type="file" name="image" id="img" class="form-control" required>
                            </div>
                            <div class="mt-4 d-flex justify-content-center">
                                <input type="submit" value="Add Product" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include_once("../inc/footer.php");
?>

</body>

</html>