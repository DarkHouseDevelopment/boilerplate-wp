<section class="homepage-intro content-section">
	<div class="wrap">
		<article>
			<header>
				<h2>
					<?php echo get_sub_field( 'intro_title_1' ) ? get_sub_field( 'intro_title_1' ) : ""; ?>
					<?php echo get_sub_field( 'intro_title_2' ) ? "<span class='script'>".get_sub_field( 'intro_title_2' )."</span>" : ""; ?>
					<?php echo get_sub_field( 'intro_title_3' ) ? get_sub_field( 'intro_title_3' ) : ""; ?>
				</h2>
			</header>
			
			<?php the_sub_field( 'intro_content' ); ?>
		</article>
	</div>
</section>