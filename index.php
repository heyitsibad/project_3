<?php 
include "header.php";
?>
	

		

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				

				<div class="item-slick1" style="background-image: url(images/slide-04.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women New-Season
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/slide-13.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Winter Collection 2022
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									
									Jackets & Coats 
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Category Cart -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<?php 

				$fetchAllCategory = mysqli_query($con,"SELECT * FROM category");
				while($data = mysqli_fetch_assoc($fetchAllCategory)){
					?>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img style="width: 400px;height:400px" src="Admin_Dashboard/Images/<?php echo $data['c_image'] ?>" alt="IMG-BANNER">

						<a href="category.php?name=<?php echo $data['c_name'] ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3" style="width: 400px;">
							<div class="block1-txt-child1 flex-col-l mx-auto my-auto">
								<span class="block1-name ltext-102 trans-04 p-b-8 text-light">
								<?php echo $data['c_name'] ?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

					<?php 
				}
				?>

				
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">

				<?php 

				$fetchAllCategory = mysqli_query($con,"SELECT * FROM category");
				while($data = mysqli_fetch_assoc($fetchAllCategory)){
					?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $data['c_name'];?>">
						<?php echo $data['c_name'] ?>
					</button>
				

					<?php 
				}
				?>
				</div>	
			</div>

<div class="row isotope-grid ">
				
<!-- Product Php Code Start Here -->

<?php
$fetchAllCategory = mysqli_query($con,"SELECT * FROM product");
while($data = mysqli_fetch_assoc($fetchAllCategory)){
	?> 
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $data['p_category'] ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="Admin_Dashboard/Images/<?php echo $data['p_image'] ?>" alt="IMG-PRODUCT" style="width: 300px;height:400px">

							<a href="product-detail.php?id=<?php echo $data['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $data['p_name'] ?>
								</a>


								<span class="stext-105 cl3">
								<?php echo $data['p_price'] ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 me-5">
									<?php 
										if($data['p_qty'] > 0){
											?>
											<span class="badge rounded-pill bg-primary">In-Stock</span>
											<?php 
										}else{
											?>
											<span class="badge rounded-pill bg-danger">Not Available</span>
											<?php 
										}
									?>
								</a>
								
							</div>
						</div>
					</div>
				</div>
				<?php
				
}
				?>
<!-- Product Php Code End Here -->
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>


	<?php 
		include "footer.php";
	?>