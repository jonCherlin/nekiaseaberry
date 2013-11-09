<?php
/**
* Footer template used by WarmWinter.
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

<div class="cb"></div>
</div>
<div class="cb"></div>
</div>
<div id="footer">
  <div id="copyright"><?php _e('Designed by ','WarmWinter');?><a href="<?php echo esc_url(__('http://www.wpart.org','WarmWinter')); ?>" title="<?php esc_attr_e('wpart', 'WarmWinter'); ?>" class="red" ><?php printf('wpart'); ?></a> |
    
    
   <?php _e('Powered by','WarmWinter');?> <a href="<?php echo esc_url(__('http://wordpress.org','WarmWinter')); ?>" title="<?php esc_attr_e('WordPress', 'WarmWinter'); ?>" class="red" ><?php printf('WordPress'); ?></a> </div>
</div>
<?php wp_footer(); ?>
</body></html>