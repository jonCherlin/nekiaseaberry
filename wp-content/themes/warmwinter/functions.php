<?php
/**
* Function template used by warmwinter.
*
* Authors: wpart
* Copyright: 2012
* {@link http://www.wpart.org/}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: /licensing/
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package warmwinter.
* @since 1.0
*/

function warmwinter_widgets_init() {   
	register_sidebar(array(
	    'id' => 'sidebar',
		'name' =>  'sidebar',
		'before_widget' => '<li id="%1$s" class="side widget %2$s">', 
		'after_widget' => '</li>',
		'before_title' => '<h3 class="title3">', 
		'after_title' => '</h3>' 
	));
 
}

add_action( 'widgets_init', 'warmwinter_widgets_init');

if ( ! isset( $content_width ) )
	$content_width = 665;

function warmwinter_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
		register_nav_menus( array(
		'primary' =>'Primary Menu',
	) );		
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );
	set_post_thumbnail_size( 200, 118, true );
}
add_action( 'after_setup_theme', 'warmwinter_setup' );


function warmwinter_scripts(){
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'warmwinter_scripts' );



// filter function for wp_title
function warmwinter_filter_wp_title( $old_title, $sep, $sep_location ){
 
// add padding to the sep
$ssep = ' ' . $sep . ' ';
 
// find the type of index page this is
if( is_category() ) $insert = $ssep . 'Category';
elseif( is_tag() ) $insert = $ssep . 'Tag';
elseif( is_author() ) $insert = $ssep . 'Author';
elseif( is_year() || is_month() || is_day() ) $insert = $ssep . 'Archives';
else $insert = NULL;
 
// get the page number we're on (index)
if( get_query_var( 'paged' ) )
$num = $ssep . 'page ' . get_query_var( 'paged' );
 
// get the page number we're on (multipage post)
elseif( get_query_var( 'page' ) )
$num = $ssep . 'page ' . get_query_var( 'page' );
 
// else
else $num = NULL;
 
// concoct and return new title
return get_bloginfo( 'name' ) . $insert . $old_title . $num;
}
add_filter( 'wp_title', 'warmwinter_filter_wp_title', 10, 3 );

?>
