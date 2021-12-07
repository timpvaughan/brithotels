	<?php

	$home_info_box1 = get_field( '_home_info_box1', 'option' );
	$home_info_box2 = get_field( '_home_info_box2', 'option' );
	$home_info_box3 = get_field( '_home_info_box3', 'option' );

	$heading1     = isset( $home_info_box1['heading'] ) ? $home_info_box1['heading'] : '';
	$sub_heading1 = isset( $home_info_box1['sub_heading'] ) ? $home_info_box1['sub_heading'] : '';

	$heading2     = isset( $home_info_box2['heading'] ) ? $home_info_box2['heading'] : '';
	$sub_heading2 = isset( $home_info_box2['sub_heading'] ) ? $home_info_box2['sub_heading'] : '';

	$heading3     = isset( $home_info_box3['heading'] ) ? $home_info_box3['heading'] : '';
	$sub_heading3 = isset( $home_info_box3['sub_heading'] ) ? $home_info_box3['sub_heading'] : '';

	//write_log($london_hotel);
	?>



<div class="black-bg pt100 pb100">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col">
				<div class="next-page">
					<h2>Offers</h2>
					<p>BOOK NOW and enjoy complimentary early check-in*</p><p>* Subject to availability </p>
				</div>
				
						<?php
							$book_now_url = get_field('_book_now', $current_post_id);
						?>
                        <a href="<?php echo $book_now_url; ?>" class="btn centered" target="_blank">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>				
				
			</div>
		</div>
	</div>
</div>

<div class="black-bg pt15 pb170">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
				<div class="info-box color1">
					<?php if($heading1 != ''): ?>
						<h3><?php echo $heading1; ?></h3>
					<?php endif; ?>
					<?php if($sub_heading1 != ''): ?>
						<p><?php echo $sub_heading1; ?></p>
					<?php endif; ?>
					
						<?php
							$book_now_url = get_field('_book_now', $current_post_id);
						?>
                        <a href="<?php echo $book_now_url; ?>" class="btn" target="_blank">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>				
					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="info-box color2">
					<?php if($heading2 != ''): ?>
						<h3><?php echo $heading2; ?></h3>
					<?php endif; ?>
					<?php if($sub_heading2 != ''): ?>
						<p><?php echo $sub_heading2; ?></p>
					<?php endif; ?>
					
						<?php
							$book_now_url = get_field('_book_now', $current_post_id);
						?>
                        <a href="<?php echo $book_now_url; ?>" class="btn" target="_blank">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>				
										
				</div>
			</div>
			<div class="col-lg-4">
				<div class="info-box color3">
					<?php if($heading3 != ''): ?>
						<h3><?php echo $heading3; ?></h3>
					<?php endif; ?>
					<?php if($sub_heading3 != ''): ?>
						<p><?php echo $sub_heading3; ?></p>
					<?php endif; ?>
					
						<?php
							$book_now_url = get_field('_book_now', $current_post_id);
						?>
                        <a href="<?php echo $book_now_url; ?>" class="btn" target="_blank">Book Now <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/book.svg" alt=""></a>				
										
				</div>
			</div>
		</div>
	</div>
</div>