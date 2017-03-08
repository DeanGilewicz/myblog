<div class="container_search">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'myblog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'myblog' ); ?>" />
		<button type="submit" class="search-submit button">
			<i class="genericon genericon-search"></i>
		</button>
	</form>
</div>