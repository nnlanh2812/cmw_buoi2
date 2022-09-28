<?php
require_once("model/database.php");
require_once("model/danhmuc.php");
require_once("model/mathang.php");

$dm = new DANHMUC();
$danhmuc = $dm->laydanhmuc();

if(isset($_GET["id"]))
	$id = $_GET["id"];
else
	$id = 1;

// lấy thông tin danh mục được chọn
$dmhh = $dm->laydanhmuctheoid($id);



// lấy các mặt hàng thuộc danh mục được chọn
$mh = new MATHANG();
$mathang = $mh->laymathangtheoid($id);

include("inc/top.php");
?>

<!-- ================================== -->
<div class="container">
<div class="row">
<div class="col-sm-9">
<h3><?php echo $mathang["tenmathang"]; ?></h3>
<h4>Giá bán: <span class="text-danger"> <?php echo number_format($mathang["giaban"]) . " đ"; ?></span></h4>
<div><img class="img responsive"  src="<?php echo $mathang["hinhanh"]; ?>"></div>  
<div><a  class="btn btn-danger">Chọn mua</a></div> 
</div>

<div class="col-sm-3 bg-info">
<h3>Tự bổ sung</h3>

</div>
</div>

</div>
<!-- ================================== -->
<?php
include("inc/bottom.php");
?>