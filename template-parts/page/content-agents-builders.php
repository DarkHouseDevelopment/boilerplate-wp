
<section class="content-section">
	<div class="wrap">
		<header style="width:100%">
			<?php if(get_sub_field( 'section_title' )):
				echo "<h2 style='text-align:center;margin:0'>".get_sub_field( 'section_title' )."</h2>";
			endif; ?>
			<h4 class="message print-qmi">
				<a href="/print-quick-move-in-homes/" target="_blank" rel="noopener noreferrer"><i class="fa fa-print"></i> Print All Quick Move-In Homes</a>
			</h4>
		</header>
		<?php $builder_stats = get_option( 'builder_stats' ); ?>
		<?php $neighborhood_stats = get_option( 'neighborhood_stats' ); ?>
		<?php $qmi_builder_counts = get_option( 'qmi_builder_counts' ); ?>
		<?php if(have_rows( 'builders' )):?>
		<article id="builders_list" class="agents-builders">
			<?php
			while(have_rows( 'builders' )): the_row();
				$builder = get_sub_field( 'builder' );
				$builder_id = !empty($builder->post_parent) ? $builder->post_parent : $builder->ID;
				$neighborhood_id = !empty($builder->post_parent) ? $builder->ID : 0;
				$logo = get_field( 'builder_logo', $builder_id );
				$preview_image = get_field( 'builder_hero_image', $builder_id );
				?>
				<div class="builder <?php echo get_field( 'builder_color', $builder_id ); ?> active">
					<div class="logo-block">
						<img src="<?php echo $logo['url'] ?>" alt="<?php echo get_the_title( $builder_id ) . ( !empty($neighborhood_id) ? ' - '.get_the_title( $neighborhood_id ) : '' ); ?>" />
						<?php echo !empty($neighborhood_id) ? "<h4>".get_the_title( $neighborhood_id )."</h4>" : ""; ?>
						<?php if(!empty($neighborhood_id) && !empty($neighborhood_stats[$neighborhood_id])): ?>
							<ul>
								<li>From the <?php echo $neighborhood_stats[$neighborhood_id]['min_price_label']; ?></li>
								<li><?php echo number_format( $neighborhood_stats[$neighborhood_id]['min_square_footage'] ); ?> - <?php echo number_format( $neighborhood_stats[$neighborhood_id]['max_square_footage'] ); ?> Sq. Ft.</li>
								<li><?php echo $neighborhood_stats[$neighborhood_id]['floor_plans']; ?> Floorplans</li>
							</ul>
						<?php else: ?>
							<ul>
								<li>From the <?php echo $builder_stats[$builder_id]['min_price_label']; ?></li>
								<li><?php echo number_format( $builder_stats[$builder_id]['min_square_footage'] ); ?> - <?php echo number_format( $builder_stats[$builder_id]['max_square_footage'] ); ?> Sq. Ft.</li>
								<li><?php echo $builder_stats[$builder_id]['floor_plans']; ?> Floorplans</li>
							</ul>
						<?php endif; ?>
					</div>
					<div class="builder-details">
						<h3><?php echo get_sub_field( 'builder_content_title' ) ?: get_the_title( $builder_id ) . ( !empty($neighborhood_id) ? ' - '.get_the_title( $neighborhood_id ) : '' ); ?></h3>
						<?php echo get_sub_field( 'builder_content' ); ?>
						<div class="builder-links">
							<a href="<?php echo !empty($neighborhood_id) ? get_permalink( $neighborhood_id ) : get_permalink( $builder_id ); ?>" target="_blank">View Builder<i class='icon-right-big'></i></a><br>
							<?php if ( !empty($qmi_builder_counts[$builder_id]) ):
								echo "<a href='/quick-move-in-homes/?builder=".(!empty($neighborhood_id) ? $neighborhood_id : $builder_id)."' target='_blank'>Quick Move-In Homes<i class='icon-right-big'></i></a>";
							endif; ?>
						</div>
					</div>
					<div class="builder-promo-block">
						<?php if(get_sub_field('include_promo')): ?>
							<?php $promo_image = get_sub_field('promo_image') ?: $preview_image; ?>
							<div class="promo-block--image">
								<img src="<?php echo $promo_image['url']; ?>" alt="<?php echo $promo_image['alt']; ?>" />
							</div>
							<?php if(!empty(get_sub_field('promo_cta_link'))): ?>
							<a href="<?php echo get_sub_field('promo_cta_link'); ?>" class="promo-block--cta">
								<h5><?php echo get_sub_field('promo_title'); ?></h5>
								<span><?php echo get_sub_field('promo_cta_text'); ?><i class='icon-right-big'></i></span>
							</a>
							<?php endif; ?>
						<?php else: ?>
							<div class="promo-block--image">
								<img src="<?php echo $preview_image['url']; ?>" alt="<?php echo $preview_image['alt']; ?>" />
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</article>
		<?php endif; ?>
	</div>
</section>
