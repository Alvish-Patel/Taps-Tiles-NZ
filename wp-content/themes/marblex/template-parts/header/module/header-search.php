
<a href="javascript:void(0)"  class="pt-tools-serach-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvassearch" ><i class="ti-search"></i></a>

<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvassearch" >


	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		<label>
			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'marblex' ); ?></span>
			<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'marblex' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		</label>
		<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'marblex' ); ?></span></button>
	</form>

</div>

