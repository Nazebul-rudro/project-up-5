<?php
include_once("../../vendor/autoload.php");
use rudhro\Fontend\Fontend;
$select = new Fontend;
$topproduct = $select->top_product_show();
// print_r($topproduct);
// $dir = $_SERVER['DOCUMENT_ROOT']."/project/public/assets/admin/img/topproduct/";



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
    <div>
        <div class="mt-2">
            <div>
                <h3>Top Product List</h3>
            </div>
            <a href="create.php" class="btn btn-success">Create Product</a>

            <div>
              <table class="table">
                <thead>
                  <tr>
                    <th>sl</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 0;
                  foreach($topproduct as $producut){
                  ?>
                  <tr>
                    <th><?php echo $i++; ?></th>
                    <th><?php echo $producut['pname']; ?></th>
                    <th><?php echo $producut['price']; ?></th>
                    <th><img src="<?php echo "http://localhost:85/project/public/assets/admin/img/topproduct/" . $producut['img'];?>" alt="error" height="20" width="80">
                  </th>
                    <th>
                      <a href="" class="btn btn-warning">Edit</a>
                      <form action="" method="post">
                        <input type="hidden" name="id">
                        <a href="" class="btn btn-danger">Delete</a>
                      </form>
                    </th>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
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