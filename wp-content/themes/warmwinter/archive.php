<?php
/**
* Archive template used by WarmWinter.
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
  <?php if (have_posts()) : ?>
  <h1 class="pagetitle">
    <?php if ( is_day() ) : ?>
    <?php printf( __( 'Daily Archives: <span>%s</span>','WarmWinter'), get_the_date() ); ?>
    <?php elseif ( is_month() ) : ?>
    <?php printf( __( 'Monthly Archives:<span>%s</span>','WarmWinter'), get_the_date('F Y') ); ?>
    <?php elseif ( is_year() ) : ?>
    <?php printf( __( 'Yearly Archives: <span>%s</span>','WarmWinter'),get_the_date('Y')); ?>
    <?php elseif ( is_author() ) : ?>
    <?php printf( __( 'Author Archive','WarmWinter')); ?>
    <?php elseif ( is_category() ) : ?>
    <?php printf( __( 'Category Archive:<span>%s</span>','WarmWinter'), single_cat_title("", false) ); ?>
    <?php elseif ( is_tag() ) : ?>
    <?php printf( __( 'Tag Archive: <span>%s</span>','WarmWinter'),single_tag_title("", false) ); ?>
    <?php else : ?>
    <?php printf( __( 'Blog Archives','WarmWinter') ); ?>
    <?php endif; ?>
  </h1>
  <?php while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
      <?php the_title(); ?>
      </a></h2>
    <div class="info_bg"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
      <?php the_author(); ?>
      </a>
      <?php _e('post on ','WarmWinter' ); the_time('F jS, Y'); ?>
      <br />
      <?php _e('Posted in ','WarmWinter' ); the_category(', '); ?>
      <?php the_tags( __( 'Tags:', 'WarmWinter' ), ' , ' , ''); ?>
    </div>
    <div class="entry">
      <?php the_content(__('Read the rest of this entry &gt;&gt;','WarmWinter')); ?>
      <?php wp_link_pages(array('before' => '<div class="page-link"><strong>'. __( 'Pages:', 'WarmWinter' ) .'</strong> ', 'after' => '</div>', 'next_or_number' => 'number')); ?>
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
