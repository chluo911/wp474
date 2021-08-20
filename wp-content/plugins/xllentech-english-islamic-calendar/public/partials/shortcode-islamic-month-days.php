<?php
/**
 * The Template for displaying Islamic Month Days Update form used by shortcode [xllentech-islamic-days] in a page
 *
 * @package     Xllentech English Islamic Calendar
 * @subpackage  Templates
 * @copyright   Copyright (c) 2018, xllentech
 * @since       2.4.0
 */

// Exit if accessed directly
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// shortcode for islamic month days
add_shortcode( 'xllentech-islamic-days', 'xllentech_shortcode_islamic_days' );

// Shortcode implementation function
function xllentech_shortcode_islamic_days() {
	global $wpdb;

	$xc_options = get_option( "xc_options" );
//	if (!is_array($xc_options))
	//	verify_xc_options();
	
	$nonce = wp_create_nonce( 'xc-pro-options-nonce' );

	$islamic_months = explode(",", $xc_options['islamic_months']);

	$month_days_table = $wpdb->prefix . 'month_days'; 

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		
		if ( ! isset( $_POST['xllentech-islamic-days-nonce'] )
				|| ! wp_verify_nonce( $_POST['xllentech-islamic-days-nonce'], 'xllentech-islamic-days-action' ) ) {

		   return __( 'Sorry, Security check failed.' );

		} else {
			$year_number=$_POST["year_number"];	
			$month_number=$_POST["month_number"];	
			$islamic_days=$_POST["islamic_days"];
			$add_pin_received=$_POST["add_pin"];
			
			if( $add_pin_received==$xc_options['xc_page_pin'] && $year_number>=1438 ) {
				
				if( !empty( $_POST["year_number"] ) && !empty($_POST["month_number"]) && !empty($_POST["islamic_days"])
					&& ctype_digit($_POST["year_number"]) && ctype_digit($_POST["month_number"])
						&&	ctype_digit($_POST["islamic_days"]) ) {
					$wpdb->replace( $month_days_table, array( "month_number" => $month_number, "year_number" => $year_number, "days" => $islamic_days ), array("%d", "%d", "%d") );
				}	else {
					_e("Oops, Looks like data entered is not valid, Please make sure you enter numbers only. Please try again.");
				}
			
			//exit( var_dump( $wpdb->last_query ) );
				if( $wpdb->last_error != '' ) {
					$wpdb->print_error();
				}	else {
					_e( "Success! You have successfully updated islamic month days of ". $islamic_months[$month_number] . " ".  $year_number . " to ". $islamic_days . " days.");
				}
			}	else {
					_e( "Oops, Looks life somethings wrong, Transaction failed. Please try again." );
			}
		}
	} elseif ( isset( $_GET['year_number'] ) ) {
		
		$month_number=$_GET["month_number"];
		$islamic_days=$_GET["islamic_days"];
		wp_create_nonce('xllentech-islamic-days-nonce');
		
		?>
		<div class="xllentech-update-islamic-days">
			<form id="islamic-days" method="post" action="#">
				<table><tbody>
					<tr>
						<td><label for="month_number">Month Number:</label></td>
						<td>
							<select name="month_number">
								<option value="1" <?php	if( $month_number == 1 ) { ?> selected <?php } ?>>1 - <?php _e( $islamic_months[1] ); ?></option>
								<option value="2" <?php	if( $month_number == 2 ) { ?> selected <?php } ?>>2 - <?php _e( $islamic_months[2] ); ?></option>
								<option value="3" <?php	if( $month_number == 3 ) { ?> selected <?php } ?>>3 - <?php _e( $islamic_months[3] ); ?></option>
								<option value="4" <?php if( $month_number == 4 ) { ?> selected <?php } ?>>4 - <?php _e( $islamic_months[4] ); ?></option> 
								<option value="5" <?php	if( $month_number == 5 ) { ?> selected <?php } ?>>5 - <?php _e( $islamic_months[5] ); ?></option>
								<option value="6" <?php	if( $month_number == 6 ) { ?> selected <?php } ?>>6 - <?php _e( $islamic_months[6] ); ?></option>
								<option value="7" <?php if( $month_number == 7 ) { ?> selected <?php } ?>>7 - <?php _e( $islamic_months[7] ); ?></option>
								<option value="8" <?php	if( $month_number == 8 ) { ?> selected <?php } ?>>8 - <?php _e( $islamic_months[8] ); ?></option>
								<option value="9" <?php	if( $month_number == 9 ) { ?> selected <?php } ?>>9 - <?php _e( $islamic_months[9] ); ?></option>
								<option value="10" <?php if( $month_number == 10 ) { ?> selected <?php } ?>>10 - <?php _e( $islamic_months[10] ); ?></option>
								<option value="11" <?php if( $month_number == 11 ) { ?> selected <?php } ?>>11 - <?php _e( $islamic_months[11] ); ?></option>
								<option value="12" <?php if( $month_number == 12 ) { ?> selected <?php } ?>>12 - <?php _e( $islamic_months[12] ); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="year_number">Year Number:</label></td><td><input value="<?php _e( $_GET["year_number"] ); ?>" type="number" name="year_number" required></td>
					</tr>
					<tr>
						<td><label for="islamic_days">Number of Days:</label></td>
						<td>
							<select name="islamic_days">
								<option value="29" <?php if( $islamic_days == 29 ) { ?> selected <?php } ?>>29</option>
								<option value="30" <?php if( $islamic_days == 30 ) { ?> selected <?php } ?>>30</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="add_pin">Enter PIN:</label></td>
						<td><input type="number" name="add_pin" required />
						<?php wp_nonce_field( 'xllentech-islamic-days-action', 'xllentech-islamic-days-nonce' ); ?>
						</td>
					</tr>
					<tr>
						<td colspan="2"><center><button>Add to Calendar</button></center></td>
					</tr>
			</tbody>
			</table>
		</form>
	</div>
	<?php
	}	else {
	
	wp_create_nonce('xllentech-islamic-days-nonce');
	?>
	<div class="xllentech-update-islamic-days">
		<form id="islamic-days" method="post" action="#">
			<table>
			<tbody>
				<tr>
					<td><label for="month_number">Month Number:</label></td>
					<td><select name="month_number">
						<option value="1">1 - <?php _e( $islamic_months[1] ); ?></option>
						<option value="2">2 - <?php _e( $islamic_months[2] ); ?></option>
						<option value="3">3 - <?php _e( $islamic_months[3] ); ?></option>
						<option value="4">4 - <?php _e( $islamic_months[4] ); ?></option>
						<option value="5">5 - <?php _e( $islamic_months[5] ); ?></option>
						<option value="6">6 - <?php _e( $islamic_months[6] ); ?></option>
						<option value="7">7 - <?php _e( $islamic_months[7] ); ?></option>
						<option value="8">8 - <?php _e( $islamic_months[8] ); ?></option>
						<option value="9">9 - <?php _e( $islamic_months[9] ); ?></option>
						<option value="10">10 - <?php _e( $islamic_months[10] ); ?></option>
						<option value="11">11 - <?php _e( $islamic_months[11] ); ?></option>
						<option value="12">12 - <?php _e( $islamic_months[12] ); ?></option>
					</select></td>
				</tr>
				<tr>
					<td><label for="year_number">Year Number:</label></td>
					<td><input placeholder="1438" type="number" name="year_number" required /></td>
				</tr>
				<tr>
					<td><label for="islamic_days">Number of Days:</label></td>
					<td><select name="islamic_days">
						<option value="29">29</option>
						<option value="30">30</option></select>
					</td>
				</tr>
				<tr>
					<td><label for="add_pin">Enter PIN:</label></td><td><input type="number" name="add_pin" required />
					<?php wp_nonce_field( 'xllentech-islamic-days-action', 'xllentech-islamic-days-nonce' ); ?></td>
				</tr>
				<tr>
					<td colspan="2"><center><button>Add to Calendar</button></center></td>
				</tr>
			</tbody>
			</table>
		</form>
	</div>
	<?php
	} // End else
} // End function