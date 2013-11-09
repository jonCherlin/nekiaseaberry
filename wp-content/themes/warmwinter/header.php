<?php
/**
* Header template used by WarmWinter.
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

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php wp_title(); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php  echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="header_bg">
  <div id="header">
    <?php if (is_home()): ?>
    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="logo">
      <?php bloginfo('name'); ?>
      </a></h1>
    <?php else: ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="logo">
    <?php bloginfo('name'); ?>
    </a>
    <?php endif;?>
    <?php bloginfo( 'description' ); ?>
  </div>
</div>
<div id="nav">
  <?php wp_nav_menu( array( 'container' => 'none', 'theme_location' => 'primary' ,'show_home'=>'1') ); ?>
</div>
<div id="pagetop"></div>
<div id="wrap">
<div id="main">
