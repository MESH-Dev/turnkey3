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

	<div class="panel wysiwyg page">
		<div class="container">
			<div class="row">
				<p class="breadcrumbs">
					<?php
					 $current = $post->ID;
					 $parent = $post->post_parent;
					 $grandparent_get = get_post($parent);
					 $grandparent = $grandparent_get->post_parent;
					 ?>
					 <?php if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) {echo get_the_title($grandparent); }else {echo get_the_title($parent); }?>
					 > <?php echo the_title(); ?>
				</p>
				<div class="columns-12 page-callout">
					<?php
					$callout = get_field('page_callout');
					?>
					<h3 class="pf"><?php echo $callout; ?></h3>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php
				$columns = get_field('content_columns');
				$col_count = count($columns);
				$col_class = '';
				if($col_count == 1){
					$col_class = 'columns-12';
				} elseif($col_count == 2){
					$col_class = 'columns-6';
				};
				if(have_rows('content_columns')): while(have_rows('content_columns')) : the_row();
					?>
					<div class="<?php echo $col_class ?> content-col">
						<?php the_sub_field('column'); ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
