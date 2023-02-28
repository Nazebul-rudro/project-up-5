<?php

include_once("../vendor/autoload.php");
use rudhro\Allfontend\Allfontend;

$allfontend = new Allfontend;
$topproducts = $allfontend->topproduct();
print_r($topproducts);

?>

<section>
  <div class="container mt-4">
    <div class="">
      <h3 class="fs-3" style="border-bottom: 4px solid tomato; width:170px;">Top Product</h3>
    </div>
    <div class="row">
    <?php 
    foreach($topproducts as $topproduct){
    ?>
      <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="card">
          <div class="card-body text-center">
            <img src="<?php echo "http://localhost:85/project/public/assets/admin/img/topproduct/" . $producut['img'];?>" alt="" height="200" while="100">
            <div class="">
              <p class="">Lorem ipsum dolor</p>
              <a href="" class="text-decoration-none">Price : $25</a>
              <a href="" class="btn btn-outline-warning">View Details</a>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
      
      
     
      
    </div>

  </div>
</section>