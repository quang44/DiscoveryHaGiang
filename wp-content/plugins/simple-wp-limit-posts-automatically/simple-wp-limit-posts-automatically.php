<?php
/*
Plugin Name: Simple WP Limit Posts Automatically
Plugin URI: https://ciphercoin.com
Description: Limit your posts automatically. This way you don't need the use of the more tag. You can limit posts by <em>letter, word or paragraph</em> and apply it to <em>home, categories, archive and search</em>.
Version: 1.0.0
Author: wpdebuglog
Author URI: http://ciphercoin.com
*/

function slpa_replace_content($content)
{
	// Get data from database
	$slpa_post_wordcut  = get_option("slpa_post_wordcut");
	
	$slpa_post_letters  = get_option("slpa_post_letters");
	$slpa_post_linktext = get_option("slpa_post_linktext");
	$slpa_post_ending   = get_option("slpa_post_ending");
	
	$slpa_post_home     = get_option("slpa_post_home");
	$slpa_post_category = get_option("slpa_post_category");
	$slpa_post_archive  = get_option("slpa_post_archive");
	$slpa_post_search   = get_option("slpa_post_search");
	$slpa_striptags     = get_option("slpa_striptags");

	// If post letters are not set, default is set to 300
	if (empty( $slpa_post_letters ) ){
		$slpa_post_letters = 300;
	}
	if ( $slpa_post_wordcut == "Wordcut" ) {
		// Check what options is set
		if ( (is_home() && $slpa_post_home == "on") || (is_category() && $slpa_post_category == "on") || 
			(is_archive() && $slpa_post_archive == "on") || (is_search() && $slpa_post_search == "on") ) {
		
			// Get data to see if more tag is used
			global $post;
			$ismoretag  = explode('<!--',$post->post_content);
			$ismoretag2 = explode('-->', $ismoretag[1]);
			
			if ($slpa_striptags == "on") {
				$content2 = "<p>" . strip_tags($content, '');
			}
		
			// Limit the post by wordwarp to check for more tag
			$prev_content = wordwrap($content, $slpa_post_letters, "[lpa]");
			$cuttext      = explode ('[lpa]', $prev_content);
			$end_string   = substr($cuttext[0], -5);
			$endingp      = "";
			
			// Limit the post by wordwarp
			$prev_content2 = wordwrap($content2, $slpa_post_letters, "[lpa]");
			$cuttext2      = explode ('[lpa]', $prev_content2);
			$end_string2   = substr($cuttext2[0], -5);
			$endingp2 = "";
			
			// If end of p-tag is missing create one
			if ($end_string == "</p>\n") {
				$cuttext[0]=substr($cuttext[0],0,(strlen($cuttext[0])-5));
			}
			// Check if more tag is used
			if ($ismoretag2[0] != "more") {
				if ($slpa_striptags == "on") {
					echo $cuttext2[0]; // Add limited post
				}
				else {
					echo $cuttext[0]; // Add limited post
				}
				// Add link if link text exists
				if ($slpa_post_linktext != ""){
					echo " <a class='slpa-readmore' href='" .get_permalink(). "' rel=\"nofollow\">".utf8_encode($slpa_post_linktext)."</a>";
				}
				echo "</p>";
			}
			else {
				return $content;
			}
		}
		else {
			return $content;
		}
	}else if ($slpa_post_wordcut == "Lettercut") {
		// Check what options is set
		if ( (is_home() && $slpa_post_home == "on") || (is_category() && $slpa_post_category == "on") || (is_archive() && $slpa_post_archive == "on") || (is_search() && $slpa_post_search == "on") ) {
			
			// Get data to see if more tag is used
			global $post;
			$ismoretag = explode('<!--',$post->post_content);
			$ismoretag2 = explode('-->', $ismoretag[1]);
			
			if ($slpa_striptags == "on") {
				$content2 = "<p>" . strip_tags($content, '');
			}
			
			// Limit the post by letter to check for more tag
			$new_string2 = substr($content2, 0,$slpa_post_letters+3);
			$end_string2 = substr($new_string2, -5);
			$endingp = "";
			
			// Limit the post by letter
			$new_string = substr($content, 0,$slpa_post_letters+3);
			$end_string = substr($new_string, -5);
			$endingp    = "";
			
			// If end of p-tag is missing create one
			if ($end_string == "</p>\n") {
				$new_string=substr($new_string,0,(strlen($new_string)-5));
			}

			// Check if more tag is used
			if ($ismoretag2[0] != "more") {
				
				if ($slpa_striptags == "on") {
					echo $new_string2; // Add limited post
				}
				else {
					echo $new_string; // Add limited post
				}
				
				echo $slpa_post_ending; // Add limited ending
				// Add link if link text exists
				if ($slpa_post_linktext != ""){
					echo " <a href='" .get_permalink(). "' rel=\"nofollow\">".utf8_encode($slpa_post_linktext)."</a>";
				}
				echo "</p>";
			}
			else {
				return $content;
			}
		}
		else {
			return $content;
		}
	}
	else if ($slpa_post_wordcut == "Paragraphcut") {
		if ( (is_home() && $slpa_post_home == "on") || (is_category() && $slpa_post_category == "on") || (is_archive() && $slpa_post_archive == "on") || (is_search() && $slpa_post_search == "on") ) {
			$paragraphcut = explode('</p>', $content);
			global $post;
			$ismoretag = explode('<!--',$post->post_content);
			$ismoretag2 = explode('-->', $ismoretag[1]);
			if ($ismoretag2[0] != "more") {
				echo $paragraphcut[0];
				echo $slpa_post_ending;
				if ($slpa_post_linktext != ""){
					echo " <a href='" .get_permalink(). "' rel=\"nofollow\">".utf8_encode($slpa_post_linktext)."</a>";
				}
				echo "</p>";
			}
			else {
				return $content;
			}
		}
		else {
			return $content;
		}
	}
	else {
		return $content;
	}
}
add_filter('the_content','slpa_replace_content');

function slpa_admin(){ 
    if(isset($_POST['submitted'])){

		if ( ! isset( $_POST['slpa_nonce'] )  || ! wp_verify_nonce( $_POST['slpa_nonce'], 'slpa_save' ) ) {
			wp_die( 'Sorry, your nonce did not verify.' );
		}
		// Get data from input fields
        $wordcut  = isset( $_POST['slpa_post_wordcut'] ) ? sanitize_text_field( $_POST['slpa_post_wordcut'] ) : '';
		$letters  = isset( $_POST['slpa_post_letters'] ) ? (int) $_POST['slpa_post_letters'] : '';
		$linktext = isset( $_POST['slpa_post_linktext'] ) ? sanitize_text_field( $_POST['slpa_post_linktext'] ) : '' ;
		$ending   = isset( $_POST['slpa_post_ending'] ) ? sanitize_text_field( $_POST['slpa_post_ending'] ) : '';
		
		$home      = isset( $_POST['slpa_post_home'] ) ?  sanitize_text_field( $_POST['slpa_post_home'] ) : '';
		$category  = isset( $_POST['slpa_post_category'] ) ?  sanitize_text_field( $_POST['slpa_post_category'] ) : '';
		$archive   = isset( $_POST['slpa_post_archive'] ) ?  sanitize_text_field( $_POST['slpa_post_archive'] ) : '';
		$search    = isset( $_POST['slpa_post_search'] ) ?  sanitize_text_field( $_POST['slpa_post_search']) : '';
		$striptags = isset( $_POST['slpa_striptags'] ) ?  sanitize_text_field( $_POST['slpa_striptags'] ) : '';
		
		update_option("slpa_post_wordcut", $wordcut);
		update_option("slpa_post_letters", $letters);
		update_option("slpa_post_linktext", $linktext);
		update_option("slpa_post_ending", $ending);
		
		update_option("slpa_post_home", $home);
		update_option("slpa_post_category", $category);
		update_option("slpa_post_archive", $archive);
		update_option("slpa_post_search", $search);
		
		update_option("slpa_striptags", $striptags);
		
        //Options updated message
        echo "<div id=\"message\" class=\"updated fade\"><p><strong>Simple WP Limit Post Automatically Options updated.</strong></p></div>";
    }
	?>
    <div class="wrap">
    <h2>Limit Posts Options</h2>
	<?php
		$limitpostby    = get_option("slpa_post_wordcut");
		$input_letters  = get_option("slpa_post_letters");
		$input_linktext = get_option("slpa_post_linktext");
		$input_ending   = get_option("slpa_post_ending");
		$slpa_home      = get_option("slpa_post_home");
		$slpa_category  = get_option("slpa_post_category");
		$slpa_archive   = get_option("slpa_post_archive");
		$slpa_search    = get_option("slpa_post_search");
		$slpa_striptags = get_option("slpa_striptags");
	?>
	
    <form method="post" name="options" action="">
	<h3 style="font-weight: normal;">Limit post by:</h3>
	<table width="100%" style="background:#fff" class="form-table" >
		<tbody>
			<tr>
				<td width="25%"><input type="radio" name="slpa_post_wordcut" value="Lettercut" <?php if ($limitpostby == "Lettercut"){ echo 'checked'; } ?> /> Letter</td>
				<td width="25%"><input type="radio" name="slpa_post_wordcut" value="Wordcut" <?php if ($limitpostby == "Wordcut"){ echo 'checked'; } ?> /> Word</td>
				<td width="25%"><input type="radio" name="slpa_post_wordcut" value="Paragraphcut" <?php if ($limitpostby == "Paragraphcut"){ echo 'checked'; } ?>   /> First paragraph (recommended)</td>
				<td width="25%"><input type="radio" name="slpa_post_wordcut" value="Nocut" <?php if ($limitpostby == "Nocut"){ echo 'checked'; } ?>  /> None</td>  
			</tr>
		</tbody>
	</table>
	<h3 style="font-weight: normal;">Post display:</h3>
	<table class="form-table" style="background:#fff;">
		<tr id="letternumber" <?php if ($limitpostby=="Paragraphcut" || $limitpostby=="Nocut"){ echo 'style="display: none;"'; }?>>
			<th style="padding:15px"> Number of letters</th>
			<td> 
				<input name="slpa_post_letters" type="number" value="<?php echo $input_letters; ?>" />
				(if blank <em>300</em> is set)
			</td>
		</tr>
		<tr>
			<th style="padding:15px"> <strong>Text ending</strong></th> 
			<td><input name="slpa_post_ending" type="text" value="<?php echo $input_ending; ?>" /> </td>			
		</tr>
		<tr>
			<th style="padding:15px"><strong>Read more link text</strong></th>
			<td colspan="4"><input name="slpa_post_linktext" type="text" value="<?php echo $input_linktext; ?>" /> </td>
		</tr>
	</table>
	<h3 style="font-weight: normal;">Automatically limit post in:</h3>
	<table class="form-table" style="background:#fff">
		<tr>
			<td><input type="checkbox" name="slpa_post_home" <?php if($slpa_home == "on"){ echo 'checked'; } ?>/> Home &nbsp;</td>
			<td><input type="checkbox" name="slpa_post_category" <?php if($slpa_category == "on"){ echo 'checked'; } ?>/> Category &nbsp;</td>
			<td><input type="checkbox" name="slpa_post_archive" <?php if($slpa_archive == "on"){ echo 'checked'; } ?>/> Archive &nbsp;</td>
			<td><input type="checkbox" name="slpa_post_search" <?php if($slpa_search == "on"){ echo 'checked'; } ?>/> Search &nbsp;</td>
		</tr>
	</table>
	<h3 style="font-weight: normal;">Avoid break through code errors:</h3>
	<table class="form-table"  style="background:#fff">
		<tr>
			<td><input type="checkbox" name="slpa_striptags" <?php if($slpa_striptags == "on"){ echo 'checked'; } ?>/> Strip tags (disables images, videos, links in post preview)</td>
		</tr>
	</table>
	<br />
	<em>To enable / disable Wordpress default more-tag, go to <a href="options-reading.php">Options / Reading</a></em><br /><br />
	<h2>Usage</h2>
	<p>
		I recommend to use limit by paragraph. That way it limit the posts by <strong>&lt;/p&gt;</strong> tag. <br/>
		"Strip tags" removes the coded tags and just displays the text. 
			That way the images, videos and links are not shown in the page preview. 
			This option prevents code errors when posts are cut. This option only apply to limit by letter or word.
</p>
<p class="submit">
	<?php wp_nonce_field('slpa_save', 'slpa_nonce') ?>
	<input name="submitted" type="hidden" value="yes" />
	<input type="submit" name="Submit" class="button-primary" value="Submit" />
</p>
</form>

</div>

<?php } 

/**
 * Add the options page in the admin panel
 */
function slpa_addpage() {
	add_submenu_page('options-general.php', 'Limit Posts Options', 'Limit Posts Options', 'manage_options', 'simple-wp-limit-posts', 'slpa_admin' );
}
add_action('admin_menu', 'slpa_addpage');
?>