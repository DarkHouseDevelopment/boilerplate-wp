<?php
$id = get_sub_field('section_id')?get_sub_field('section_id'):'sticky-nav-bar';
$className = 'page-block sticky-nav-bar '.get_sub_field('section_class');

// Load values and assign defaults.
$nav_source = get_sub_field( 'nav_source' );
if($nav_source == "menu"):
	$nav_menu = wp_nav_menu ( array( 'menu' => get_sub_field( 'nav_menu' ), 'echo' => false ) );
else:
	$nav_links = get_sub_field( 'custom_links' );
	$nav_menu = "<ul>";
	foreach( $nav_links as $link ):
		$nav_menu .= "<li><a href='".$link['link_url']."'>".$link['link_text']."</a></li>";
	endforeach;
	$nav_menu .= "</ul>";
endif;

$link_color = get_sub_field( 'nav_link_default_color' );
$nav_bar_color = get_sub_field( 'sticky_nav_bar_color' );
$nav_bar_link_color = get_sub_field( 'sticky_nav_link_color' );

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="color:<?php echo $link_color; ?>;">
	<div class="wrap">
		<?php echo $nav_menu; ?>
	</div>
</div>
<style>
	#<?php echo esc_attr( $id ); ?>.is-scrolling { background: <?php echo $nav_bar_color; ?>; color: <?php echo $nav_bar_link_color; ?> !important; }
</style>


<script type="text/javascript">
  jQuery('document').ready(function(){
    stickyNavBarShowOnScrollUp();
  });

  function stickyNavBarShowOnScrollUp(){
    var $body = jQuery('body'),
        $jumpNav = jQuery('.sticky-nav-bar'),
        lastScrollTop = 0,
        lastScrollTopJumpNav = 0;

    console.log("jumpnav script called");

    if($jumpNav.length > 0){
      var $jumpNavHeight = $jumpNav.outerHeight() + $jumpNav.offset().top,
          $pageIntroPos = $jumpNav.offset().top;
          
      console.log("jumpnav found");

      jQuery(window).scroll(function(event){
        var st = jQuery(this).scrollTop();
        if( st > $jumpNavHeight ) {
          $jumpNav.addClass( 'is-scrolling' );
          console.log("jumpnav is scrolling");
        }
        if ( st > lastScrollTopJumpNav ){
          // downscroll
          $jumpNav.removeClass( 'is-scrolling-up' );
        } else if( st < $pageIntroPos ) {
          // at scrolltop
          $jumpNav.removeClass( 'is-scrolling is-scrolling-up' );
        } else {
          // upscroll
          $jumpNav.addClass( 'is-scrolling-up' );
        }
        lastScrollTopJumpNav = st;
      });
    }
  }
</script>