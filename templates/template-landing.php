<?php /* Template Name: Landing Page */ ?>
<?php get_header(); ?>

<main id="content">
	<?php
	$bg_img = get_field('background_image');
	$bg_url = $bg_img['sizes']['background-fullscreen'];

	$primary_color = get_field('primary_color', 'option');
		$secondary_color = get_field('secondary_color', 'option');
		$tertiary_color = get_field('tertiary_color', 'options');

	if (!empty($bg_url)) { ?>
		<div class="welcome-gate short" id="top">
			<div class="hero" style="background-image:url('<?php echo $bg_url ?>')"></div>
			<div class="img-filter" style="background-color:<?php echo $primary_color ?>;"></div>
	<?php } else{ ?>
		<div class="welcome-gate short" id="top" style="background:<?php echo $primary_color ?>;">
	<?php }; ?>
		<div class="container">
			<div class="row">
				<div class="sign sf">
					<h1 id="welcomeTitle" class="pf"><?php the_field('statement'); ?></h1>
				</div>
			</div>
		</div>
		<!-- <a id="scrollLink">
			<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81 31">
			    <g>
			      <path d="M3,1.31l37.3,27.88L77.6,1.31" style="fill: none;stroke: #fff;stroke-width: 3px"/>
			    </g>
			</svg>
		</a> -->
	</div>
	<div class="panel listing">
		<div class="container">
			<div class="row">
				<div class="columns-12 page-callout">
					<?php
					$callout = get_field('page_callout');
					?>
					<h3 class="pf"><?php echo $callout; ?></h3>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
			if( have_rows('item_card') ):
				 while ( have_rows('item_card') ) : the_row();
				  $thumbnail = get_sub_field('thumbnail');
				  $thumbnail_url = $thumbnail['sizes']['large'];
				  $item_title = get_sub_field('item_title');
				  $item_desc = get_sub_field('item_description');
				  $link_text = get_sub_field('link_text');
				  $link_url = get_sub_field('link_url');
				  ?>
					 <div class="listing-card row">
						 <div class="thumbnail columns-5" style="background-image: url('<?php echo $thumbnail_url; ?>');">
						 </div>
						 <div class="item-text columns-7">
							 <h4 class="item-title pf"><?php echo $item_title; ?></h4>
							 <p class="item-exc sf"><?php echo $item_desc; ?></p>
							 <a class="read-more pf" href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
						 </div>
					 </div>
				 <?php
				 endwhile; endif;
			?>
		</div>
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
