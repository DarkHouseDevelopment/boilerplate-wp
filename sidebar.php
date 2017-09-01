
<aside class="sidebar" role="complementary">
	<h3>News Archives</h3>
	<div id="monthly_archive" class="styled-select">
		<select name="monthly_archive">
			<option selected="selected" disabled="disabled">By Month</option>
			<?php $args = array(
				'type'            => 'monthly',
				'limit'           => '',
				'format'          => 'option',
				'before'          => '',
				'after'           => '',
				'show_post_count' => false,
				'echo'            => 1,
				'order'           => 'DESC'
			);
			wp_get_archives( $args ); ?>
		</select>
	</div>
	<ul id="category_archive">
		<?php wp_list_categories('title_li=By Category&child_of=2'); ?>
	</ul>
</aside>