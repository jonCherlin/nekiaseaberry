<?php
/**
* Page template used by WarmWinter.
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
    </div>
    <div class="entry">
      <?php the_content(__('Read the rest of this entry &gt;&gt;','WarmWinter')); ?>
      <?php wp_link_pages(array('before' => '<div class="page-link"><strong>'. __( 'Pages:', 'WarmWinter' ) .'</strong>', 'after' => '</div>', 'next_or_number' => 'number')); ?>
    </div>
    <div class="info_bottom">
      <?php comments_popup_link(__('No comment yet', 'WarmWinter'),__('1 comment', 'WarmWinter'),__('% comments', 'WarmWinter'), '',''); ?>
      <?php edit_post_link( __( 'Edit', 'WarmWinter' ), '', ''); ?>
    </div>
    <div class="cb"></div>
  </div>
  <?php endwhile; ?>
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
