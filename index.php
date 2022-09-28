
<?php

require_once("model/danhmuc.php");
require_once("model/database.php");
require_once("model/mathang.php");

$dm = new DANHMUC();
$danhmuc= $dm->laydanhmuc();

$mh= new MATHANG();
$mathang= $mh->laymathang();

include("inc/top.php");
?>
<!-- ================================== -->
<div class="container">
<?php
foreach($danhmuc as $d){
?>
  <h3><a href="group.php?id=<?php echo $d["id"];?>">SẢN PHẨM <?php echo $d["tendanhmuc"];?> <span class="glyphicon glyphicon-triangle-right"></span></a></h3>
  <div class="row">
    <?php 
      foreach($mathang as $m){ 
        if($m["danhmuc_id"]== $d["id"]){
    ?>
    <div class="col-sm-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <a style="color:white" href="group.php?id=<?php echo $d["id"];?>">
          DANH MỤC
          </a>  
        </div>
        <div class="panel-body"><a href="detail.php?id=<?php echo $m["id"]; ?>"><img src="<?php echo $m["hinhanh"]; ?>" class="img-responsive fake" alt="Tên hàng"></a>
        </div>
        <div class="panel-footer"><a href="detail.php?id=<?php echo $m["id"]; ?>"><?php echo $m["tenmathang"];?></a></div>
      </div>
    </div>   
    <?php 
      } 
    } ?>
    
  </div>
  <?php } ?>
</div>
<!-- ================================== -->
<?php
include("inc/bottom.php");
?>