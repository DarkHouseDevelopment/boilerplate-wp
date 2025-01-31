
<section class="content-section">
	<div class="wrap">
		<header style="width:100%">
			<?php if(get_sub_field( 'section_title' )):
				echo "<h3 style='text-align:center;margin:0'>".get_sub_field( 'section_title' )."</h3>";
			endif; ?>
		</header>
		<?php $builder_stats = get_option( 'builder_stats' ); ?>
		<?php $qmi_builder_counts = get_option( 'qmi_builder_counts' ); ?>
		<?php if(have_rows( 'builders' )):?>
		<article id="builders_list" class="agents-builders">
			<?php
			while(have_rows( 'builders' )): the_row();
				$builder = get_sub_field( 'builder' );
				$logo = get_field( 'builder_logo', $builder );
				$preview_image = get_field( 'builder_hero_image', $builder );
				?>
				<div class="builder <?php echo get_field( 'builder_color', $builder ); ?> active">
					<div class="logo-block">
						<img src="<?php echo $logo['url'] ?>" alt="<?php echo get_the_title( $builder ); ?>" />
					</div>
					<div class="builder-details">
						<h3><?php echo get_the_title( $builder ); ?></h3>
						<p>
							<?php echo number_format( $builder_stats[$builder]['min_square_footage'] ); ?> - <?php echo number_format( $builder_stats[$builder]['max_square_footage'] ); ?> Sq. Ft.<br>
							Priced From the <?php echo $builder_stats[$builder]['min_price_label']; ?> - <?php echo $builder_stats[$builder]['max_price_label']; ?>
						</p>
						<div class="builder-links">
							<a href="<?php echo get_permalink( $builder ); ?>">View Builder<i class='icon-right-big'></i></a><br>
							<?php if ( !empty($qmi_builder_counts[$builder]) ):
								echo "<a href='/quick-move-in-homes/?builder=".$builder."'>Quick Move-In Homes<i class='icon-right-big'></i></a>";
							endif; ?>
						</div>
					</div>
					<div class="builder-promo-block">
						<?php if(get_sub_field('include_promo')): ?>
							<?php $promo_image = get_sub_field('promo_image') ?: $preview_image; ?>
							<div class="promo-block--image">
								<img src="<?php echo $promo_image['url']; ?>" alt="<?php echo $promo_image['alt']; ?>" />
							</div>
							<a href="<?php echo get_sub_field('promo_cta_link'); ?>" class="promo-block--cta">
								<h5><?php echo get_sub_field('promo_title'); ?></h5>
								<span><?php echo get_sub_field('promo_cta_text'); ?><i class='icon-right-big'></i></span>
							</a>
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
