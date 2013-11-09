<?php
/**
* Single template used by WarmWinter.
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
* @package WarmWinter.
* @since 1.0
*/
get_header(); ?>

<div id="content">
  <?php if ( have_posts() ) :
	while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
      <?php the_title(); ?>
      </a></h1>
    <div class="info_bg"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
      <?php the_author(); ?>
      </a>
      <?php _e('post on ','WarmWinter' ); the_time('F jS, Y'); ?>
      <br />
      <?php _e('Posted in ','WarmWinter' ); the_category(', '); ?>
      <?php the_tags( __( 'Tags:', 'WarmWinter' ), ' , ' , ''); ?>
    </div>
    <div class="entry">
      <?php if (wp_attachment_is_image() ) :?>
      <div class="entry-attachment">
        <?php
$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 image attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image attachment, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
        <p class="attachment">
          <?php previous_image_link( array( 37, 37 )); ?>
          <a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment">
          <?php
							$attachment_width  = apply_filters( 'WarmWinter_attachment_size', 900 );
							$attachment_height = apply_filters( 'WarmWinter_attachment_height', 900 );
							echo wp_get_attachment_image( $post->ID, array( $attachment_width, $attachment_height ) ); // filterable image width with, essentially, no limit for image height.
						?>
          </a>
          <?php next_image_link( array( 37, 37 )); ?>
        </p>
        <div class="cb"></div>
      </div>
    </div>
    <!-- #nav-below -->
    <?php else : ?>
    <?php the_content(__('Read the rest of this entry &gt;&gt;','WarmWinter')); ?>
    <?php wp_link_pages(array('before' => '<div class="page-link"><strong>'. __( 'Pages:', 'WarmWinter' ) .'</strong>', 'after' => '</div>', 'next_or_number' => 'number')); ?>
    <?php endif; ?>
  </div>
  <div class="info_bottom">
    <?php comments_popup_link(__('No comment yet', 'WarmWinter'),__('1 comment', 'WarmWinter'),__('% comments', 'WarmWinter'), '',__('Comments are closed' , 'WarmWinter')); ?>
    <?php edit_post_link( __( 'Edit', 'WarmWinter' ), '', ''); ?>
  </div>
  <div class="cb"></div>
</div>
<?php endwhile; ?>
<div class="navigation">
  <div class="alignleft">
    <?php previous_post_link('&laquo; %link') ?>
  </div>
  <div class="alignright">
    <?php next_post_link('%link &raquo;') ?>
  </div>
</div>
<?php comments_template(); ?>
<?php else : ?>
<h2 class="title2">
  <?php _e('Not Found','WarmWinter');?>
</h2>
<p class="aligncenter">
  <?php _e('Sorry, but you are looking for something that is not here.','WarmWinter');?>
</p>
<?php get_search_form(); ?>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<!-- /content -->
<?php get_footer(); ?>
