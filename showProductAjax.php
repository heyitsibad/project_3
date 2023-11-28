<?php 

include "connection.php";

$fetchAllProduct = mysqli_query($con,"SELECT * FROM product");
while($data = mysqli_fetch_assoc($fetchAllProduct)){

    $isAvailatable = "";
    if($data['p_qty'] > 0){
        $isAvailatable = "<span class='badge rounded-pill bg-primary'>In-Stock</span>";
    }else{
        $isAvailatable = "<span class='badge rounded-pill bg-danger'>Out-Of-Stock</span>";
    }
    
echo "<div class='col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women'>
					
					<div class='block2'>
						<div class='block2-pic hov-img0'>
							<img src='Admin_Dashboard/Images/".$data['p_image']."' alt='IMG-PRODUCT' style='width: 300px;height:400px'>

							<a href='product-detail.php?id=".$data['id']."' class='block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04'>
								Quick View
							</a>
						</div>

						<div class='block2-txt flex-w flex-t p-t-14'>
							<div class='block2-txt-child1 flex-col-l'>
								<a href='product-detail.html' class='stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6'>
								".$data['p_name']."
								</a>


								<span class='stext-105 cl3'>
								".$data['p_price']."
								</span>
							</div>

							<div class='block2-txt-child2 flex-r p-t-3'>
								<a href='#' class='btn-addwish-b2 dis-block pos-relative js-addwish-b2 me-5'>
                                    $isAvailatable
								</a>
								
							</div>
						</div>
					</div>
				</div>";

}

?>
