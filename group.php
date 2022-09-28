<?php
require_once("model/database.php");
require_once("model/danhmuc.php");
require_once("model/mathang.php");

$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();

if(isset($_GET["id"]))
	$dmid = $_GET["id"];
else
	$dmid = 1;

// lấy thông tin danh mục được chọn
$dmhh = $dm->laydanhmuctheoid($dmid);



// lấy các mặt hàng thuộc danh mục được chọn
$mh = new MATHANG();
$mathang = $mh->laymathangtheodanhmuc($dmid);

include("inc/top.php");
?>

<!-- ================================== -->
<div class="container">
<div class="row">
<div class="col-sm-9">
<h3>Các sản phẩm thuộc danh mục <?php echo $dmhh["tendanhmuc"]; ?></h3>
<div class="row">
    <?php 
	foreach($mathang as $m){ 
	
	?>
    <div class="col-sm-4">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <a href="detail.php?id=<?php echo $m["id"]; ?>"><?php echo $m["tenmathang"]; ?></a>
          
          </a>  
        </div>
        <div class="panel-body">
			<a href="detail.php?id=<?php echo $m["id"]; ?>"><img src="<?php echo $m["hinhanh"]; ?>" class="img-responsive fake" alt="Tên hàng"></a>
			<div>Giá bán: <span class="text-danger"> <?php echo number_format($m["giaban"]) . " đ"; ?></span></div>
		</div>
        <div class="panel-footer">
			<a href="detail.php?id=<?php echo $m["id"]; ?>" class="btn btn-info" >Xem thêm</a>
			<a class="btn btn-danger">Chọn mua</a>
		</div>
      </div>
    </div>    
    <?php 
	 
	} ?>
    
  </div>


</div>
<div class="col-sm-3">


</div>
</div>

</div>
<!-- ================================== -->
<?php
include("inc/bottom.php");
?>