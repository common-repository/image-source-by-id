<?php
namespace JLTISRC\Inc\Classes;

class JLT_Image_Source{

	public $image_id;

	public function __construct(){
        add_action('admin_menu', array( $this, 'image_src_by_id_menu'));

		// Ajax Part
		add_action('wp_ajax_image_src_by_id', array( $this, 'image_src_by_id' ));
		add_action('wp_ajax_nopriv_image_src_by_id', array( $this, 'image_src_by_id' ));
	}

    public function image_src_by_id_menu() {
        if( current_user_can( 'manage_options' ) ) {
            add_submenu_page(
                'options-general.php',
                'img-src-id',
                'Image Src by ID',
                'manage_options',
                'img-src-by-id',
                array($this, 'image_src_by_id_options')
            );
        }
    }

	public function image_src_by_id() {
		$image_id = sanitize_text_field( $_POST['image_id'] ) ? sanitize_text_field( $_POST['image_id'] ) : "" ;
		$image_src_size = sanitize_text_field( $_POST['image_src_size'] ) ? sanitize_text_field( $_POST['image_src_size'] ) : "";

		if( $image_src_size == "thumbnail" ){
			$thumbnail = wp_get_attachment_image_src( $image_id, 'thumbnail');
			echo 'Image URL: ' . esc_url_raw( $thumbnail[0] ) . '<br><br>';
			echo '<img src="' . esc_url_raw( $thumbnail[0] ) . '">';
		}


		if( $image_src_size == "medium" ){
			$medium_image = wp_get_attachment_image_src( $image_id, 'medium');
			echo 'Image URL: ' . esc_url_raw( $medium_image[0] ) . '<br><br>';
			echo '<img src="' . esc_url_raw( $medium_image[0] ) . '">';
		}


		if( $image_src_size == "medium_large" ){
			$medium_large_image = wp_get_attachment_image_src( $image_id, 'medium_large');
			echo 'Image URL: ' . esc_url_raw( $medium_large_image[0] ) . '<br><br>';
			echo '<img src="' . esc_url_raw( $medium_large_image[0] ) . '">';
		}

		if( $image_src_size == "large" ){
			$large_image = wp_get_attachment_image_src( $image_id, 'large');
			echo 'URL: ' . esc_url_raw( $large_image[0] ) . '<br><br>';
			echo '<img src="' . esc_url_raw( $large_image[0] ) . '">';
		}


		if( $image_src_size == "full" ){
			$full_image = wp_get_attachment_image_src( $image_id, 'full');
			echo 'Image URL: ' . esc_url_raw( $full_image[0] ) . '<br><br>';
			echo '<img src="' . esc_url_raw( $full_image[0] ) . '">';
		}


		if( $image_src_size == "array" ){
			$array_image = wp_get_attachment_image_src( $image_id, 'full');
			echo "<pre>",print_r($array_image, 1), "</pre>";
		}

		die();
	}


	public function image_src_by_id_options(){
		if( ! current_user_can( 'manage_options' ) ) {
			exit();
		} ?>


		<div class="wrap">
			<form method="post" id="image_src_by_form_id">
				<?php wp_nonce_field( '_image_src_by_id_nonce', '_image_src_by_id_nonce' ); ?>
				<fieldset class="options">
					<h2><?php echo esc_html__('Get Image Source by ID', 'image-src-id');?></h2>
					<table class="form-table wp-list-table widefat plugins">
						<tr valign="top">
							<td width="120px">

								<h4>
									<?php echo esc_html__('Image ID', 'image-src-id');?>:
								</h4>
							</td>
							<td>

								<input
									name="image_id"
									type="number"
									id="image_id"
									value=""
									size="60"
									placeholder="Enter your Image ID"
								>

				            </td>

				            <td>
				            	<?php
							        $items = array(
					        			"thumbnail" 	=> "Thumbnail",
					        			"medium"		=> "Medium",
					        			"medium_large"	=> "Medium Large",
					        			"large"			=> "Large",
					        			"full" 			=> "Full Image",
					        			"array"			=> "Array Data"
							        );

							        echo "<select id='image_src_size' name='image_src_size'>";

							        foreach($items as $item=>$value) {
							        	print_r($item);
							            $selected = $item ? 'selected="selected"' : '';
							            echo "<option value='$item' $selected>$value</option>";
							        }
							        echo "</select>";
							    ?>
				            </td>
				            <td>
				        		<input class="button button-primary image_src_by_id_submit" type="button" name="image_src_by_id_submit" value="Get Data" />
				        	</td>

				        	<tr>
					        	<td>
					        		<div id="img_src_id_result"></div>
					        	</td>
					        </tr>
				        </tr>
				    </table>
				    <e>only for website</e>
				</fieldset>
			</form>
		</div>

	<?php }
}