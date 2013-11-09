<?php
/**
* Index template used by WarmWinter.
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
    <?php 
//This must be in one loop

if(has_post_thumbnail()) { ?>
    <div class="img_layera">
      <div class="img_layerb"></div>
      <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="block">
      <?php the_post_thumbnail('thumbnail');?>
      </a></div>
    <?php }?>
    <h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if(the_title( '', '', false ) !='') the_title(); else echo 'Untitled';?> </a></h2>
    <div class="info_bg"><?php the_author_posts_link(); ?>
      <?php _e('post on ','WarmWinter' ); the_time('F jS, Y'); ?>
      <br />
      <?php _e('Posted in ','WarmWinter' ); the_category(', '); ?>
      <?php the_tags( __( 'Tags:', 'WarmWinter' ), ' , ' , ''); ?>
    </div>
    <div class="entry">
      <?php  if ( has_post_format( 'gallery' )) { ?>
      <a href="<?php echo get_post_format_link( 'gallery' ); ?>" title="<?php _e('View Galleries','WarmWinter');?>">
      <?php _e('     More Galleries
','WarmWinter');?>
      </a>
      <?php }?>
      <?php the_content(__('Read the rest of this entry &gt;&gt;','WarmWinter')); ?>
      <?php wp_link_pages(array('before' => '<div class="page-link"><strong>'. __( 'Pages:', 'WarmWinter' ) .'</strong>', 'after' => '</div>', 'next_or_number' => 'number')); ?>
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
      <?php next_posts_link( __( '&laquo; Older Entries', 'WarmWinter' )) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link(__( 'Newer Entries &raquo;', 'WarmWinter' )) ?>
    </div>
  </div>
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
