<?php
/*-------------------------------------------------------------------------------*/
/*   AJAX Get Slider List
/*-------------------------------------------------------------------------------*/
function ewic_grab_slider_list_ajax() {
	
	if ( !isset( $_POST['grabslider'] ) ) {
		wp_die();
		} 
		else {
			
			$list = array();
			
			global $post;
			
			$args = array(
  				'post_type' => 'audioplayer',
  				'order' => 'ASC',
				'posts_per_page' => -1,
  				'post_status' => 'publish'
		
				);

				$myposts = get_posts( $args );
				foreach( $myposts as $post ) :	setup_postdata($post);

				$list[$post->ID] = array('val' => $post->ID, 'title' => esc_html(esc_js(the_title(NULL, NULL, FALSE))) );

				endforeach;
				
				}
		
			echo json_encode($list); //Send to Option List ( Array )
			wp_die();


	}

add_action('wp_ajax_ewic_grab_slider_list_ajax', 'ewic_grab_slider_list_ajax');

/*-------------------------------------------------------------------------------*/
/*   Frontend Register JS & CSS
/*-------------------------------------------------------------------------------*/
function ewic_reg_script() {
	wp_register_style( 'ewic-tinymcecss', plugins_url( 'tinymce/tinymce.css' , dirname(__FILE__) ), false, 'all');
	wp_register_script( 'ewic-tinymcejs', plugins_url( 'tinymce/tinymce.js' , dirname(__FILE__) ), false );	
}
add_action( 'admin_init', 'ewic_reg_script' );


//-------------------------------------------------------------------------------------------------	
if ( strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post-new.php' ) || strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post.php' ) ) {
	
// ADD STYLE & SCRIPT
	add_action( 'admin_head', 'ewic_editor_add_init' );
		function ewic_editor_add_init() {
			
			if ( get_post_type( get_the_ID() ) != 'audioplayer' ) {
				
				wp_enqueue_style( 'ewic-tinymcecss' );
				wp_enqueue_script( 'ewic-tinymcejs' );

		?>
        <?php
			}
			
		}
	
// ADD MEDIA BUTOON	
	add_action( 'media_buttons_context', 'ewic_shortcode_button', 1 );
		function ewic_shortcode_button($context) {
			$img = H5AP_PLUGIN_DIR .'img/icn.png';
			$container_id = 'ewicmodal';
			$title = 'Insert Html5 Audio Player';
			$context .= '
			<a class="thickbox button" id="ewic_shortcode_button" title="'.$title.'" style="outline: medium none !important; cursor: pointer;" >
			<img src="'.$img.'" alt="" width="20" height="20" style="position:relative; top:-1px"/>Html5 audio player</a>';
			return $context;
		}	
}


// GENERATE POPUP CONTENT
add_action('admin_footer', 'ewic_popup_content');	
function ewic_popup_content() {

if ( strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post-new.php' ) || strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post.php' ) ) {

if ( get_post_type( get_the_ID() ) != 'audioplayer' ) {
// START GENERATE POPUP CONTENT

?>
<div id="ewicmodal" style="display:none;">
<div id="tinyform" style="width: 550px;">
<form method="post">

<div class="ewic_input" id="ewictinymce_select_slider_div">
<label class="label_option" for="ewictinymce_select_slider">Html5 Audio Player</label>
	<select class="ewic_select" name="ewictinymce_select_slider" id="ewictinymce_select_slider">
    <option id="selectslider" type="text" value="select">- Select Player -</option>
</select>
<div class="clearfix"></div>
</div>

<div class="ewic_button">
<input type="button" value="Insert Shortcode" name="ewic_insert_scrt" id="ewic_insert_scrt" class="button-secondary" />	
<div class="clearfix"></div>
</div>

</form>
</div>
</div>
<?php 
	}
  } //END
}

?>