<?php 

function our_plugin_settings_page(){
    add_submenu_page(
                    'options-general.php',
                    __('Our Settings Page', 'example'), 
                    __('Our Settings Page', 'example'),
                    'manage_options', 
                    'our_settings_page',
                    'our_settings_page_call_back'
    );
}
add_action('admin_menu', 'our_plugin_settings_page');

function our_settings_page_call_back(){
   ?>
   <div id="wpbody">
   	<div id="wpbody-content">
   		<div class="wrap">
			<h1><?php _e('Our example form', 'example'); ?></h1>
   			<?php 
							if(isset($_GET['save_error'])){
								echo '<div style="background: #ff000061; padding: 11px 5px; border-radius: 6px; font-size: 15px;" class="sour_validation_msg">'.urldecode( $_GET['save_error'] ).'</div>';
							}
							if(isset($_GET['save_success'])){
								echo '<div style="background:#00800063; padding: 11px 5px; border-radius: 6px; font-size: 15px;" class="sour_validation_msg">'.urldecode( $_GET['save_success'] ).'</div>';
							}
							
							 $our_settings = get_option( 'our_settings' );
						?>
			<table class="form-table">
   				<tbody>
					<form method="post" action="admin-post.php">
						 <input type="hidden" name="action" value="example_admin_form" />
						<?php wp_nonce_field('our_form_settings_fields_verify'); ?>
						<tr>
							<th>
								<label for="text_field" ><?php _e('Text Field', 'example'); ?>
								</label>
							</th>
							<td>
								<input id="text_field"  name="text_field" value="<?php if(isset($our_settings['text_field'])){ echo $our_settings['text_field']; } ?>" type="text" required >
							</td>
						</tr>
						
						<tr>
							<th>
								<label for="number_field" ><?php _e('Number Field', 'example'); ?>
								</label>
							</th>
							<td>
								<input id="number_field"  name="number_field" value="<?php if(isset($our_settings['number_field'])){ echo $our_settings['number_field']; } ?>" type="number" required >
							</td>
						</tr>
						<tr>
							<th>
								<label for="checkbox_field" ><?php _e('Checkbox Field', 'example'); ?>
								</label>
							</th>
							<td>
								<input id="checkbox_field"  <?php if(isset($our_settings['checkbox_field']) && $our_settings['checkbox_field'] == 'yes' ){ echo 'checked'; } ?>  name="checkbox_field" value="yes" type="checkbox" required >
							</td>
						</tr>
						 
						 <tr>
							<td>
							<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
							</td>
						 </tr>
					</form>
				</tbody>
   			</table>
   		</div>
   	</div>
   </div>
   <?php
}