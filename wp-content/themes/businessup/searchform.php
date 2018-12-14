<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'businessup' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</div>
	<button type="submit" class="btn btn-theme"><?php esc_attr_e( "Search", 'businessup' ); ?></button>
</form>